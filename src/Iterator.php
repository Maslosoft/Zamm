<?php

/**
 * This software package is licensed under `AGPL, Commercial` license[s].
 *
 * @package maslosoft/zamm
 * @license AGPL, Commercial
 *
 * @copyright Copyright (c) Peter Maselkowski <pmaselkowski@gmail.com>
 * @link https://maslosoft.com/zamm/
 */

namespace Maslosoft\Zamm;

use DirectoryIterator;
use Maslosoft\Addendum\Utilities\ClassChecker;
use ReflectionClass;
use ReflectionProperty;

/**
 * Iterator
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Iterator
{

	/**
	 * Iterate over classes in same folder.
	 * @param string $class
	 * @return string[]
	 */
	public static function ns($class)
	{
		$info = new ReflectionClass($class);
		$path = dirname($info->getFileName());
		$ns = $info->getNamespaceName();
		$classNames = [];
		foreach (new DirectoryIterator($path) as $fileInfo)
		{
			$name = $fileInfo->getFilename();

			// Only files
			if (!$fileInfo->isFile())
			{
				continue;
			}

			// Only php
			if (!preg_match('~\.php$~', $name))
			{
				continue;
			}
			$fqn = sprintf('%s\%s', $ns, basename($name, '.php'));
			if (!ClassChecker::exists($fqn))
			{
				continue;
			}
			$classNames[] = $fqn;
		}
		sort($classNames);
		return $classNames;
	}

	/**
	 * Iterate over *public* class methods
	 * @param string $class
	 * @return string[]
	 */
	public static function methods($class)
	{
		$info = new ReflectionClass($class);

		$methods = [];
		foreach ($info->getMethods(ReflectionProperty::IS_PUBLIC) as $method)
		{
			$methods[] = $method->name;
		}

		/**
		 * Sort methods that:
		 * * Getters and setters are first
		 * * Getters and setters are side-by-side to each other counterpart
		 */
		$sort = function($a, $b)
		{
			// Whether is getter or setter
			$isAGS = false;
			$isBGS = false;
			// Whether is getter
			$isAG = false;
			$isBG = false;
			// Whether is setter
			$isAS = false;
			$isBS = false;
			// Check if it's getter or setter
			if (preg_match('~^[gs]et[A-Z0-9]~', $a))
			{
				if(preg_match('~^get[A-Z0-9]~', $a))
				{
					$isAG = true;
				}
				else
				{
					$isAS = true;
				}
				$a = substr($a, 3);
				$isAGS = true;
			}
			// Check if it's getter or setter
			if (preg_match('~^[gs]et[A-Z0-9]~', $b))
			{
				if(preg_match('~^get[A-Z0-9]~', $b))
				{
					$isBG = true;
				}
				else
				{
					$isBS = true;
				}
				$b = substr($b, 3);
				$isBGS = true;
			}
			if($isAGS && !$isBGS)
			{
				return -1;
			}
			if(!$isAGS && $isBGS)
			{
				return 1;
			}
			if ($a == $b)
			{
				if($isAGS && $isBGS)
				{
					if($isAG && $isBS)
					{
						return -1;
					}
					if($isBG && $isAS)
					{
						return 1;
					}
				}
				return 0;
			}
			return ($a < $b) ? -1 : 1;
		};
		usort($methods, $sort);

		return $methods;
	}

	/**
	 * Iterate over *public* class properties
	 * @param string $class
	 * @return string[]
	 */
	public static function properties($class)
	{
		$info = new ReflectionClass($class);

		$properties = [];
		foreach ($info->getProperties(ReflectionProperty::IS_PUBLIC) as $property)
		{
			$properties[] = $property->name;
		}
		sort($properties);
		return $properties;
	}

}
