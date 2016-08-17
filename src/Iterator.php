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
		$info = new \ReflectionClass($class);
		$path = dirname($info->getFileName());
		$ns = $info->getNamespaceName();
		$classNames = [];
		foreach (new \DirectoryIterator($path) as $fileInfo)
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

}
