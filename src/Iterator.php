<?php

/**
 * This software package is licensed under `AGPL, Commercial` license[s].
 *
 * @package maslosoft/zamm
 * @license AGPL, Commercial
 *
 * @copyright Copyright (c) Peter Maselkowski <pmaselkowski@gmail.com>
 *
 */

namespace Maslosoft\Zamm;

use DirectoryIterator;
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
			$classNames[] = sprintf('%s\%s', $ns, basename($name, '.php'));
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
		sort($methods);
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
