<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
