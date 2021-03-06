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

namespace Maslosoft\Zamm\File;

use Maslosoft\Zamm\Interfaces\ConverterInterface;
use SplFileInfo;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo as SfFileInfo;

/**
 * Applier
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Applier
{

	/**
	 * Array of directories
	 * @var string[]
	 */
	private $_dirs = [];

	/**
	 * Array of files
	 * @var string
	 */
	private $_files = [];

	/**
	 * Output folder
	 * @var string
	 */
	private $_output = '';

	public function __construct(array $input, $output)
	{
		$this->_output = $output;
		foreach ($input as $entry)
		{
			$info = new SplFileInfo($entry);
			if ($info->isFile())
			{
				$this->_files[] = $info->getPathname();
				continue;
			}
			$this->_dirs[] = $info->getPathname();
		}
	}

	public function apply(array $converters)
	{
		$finder = new Finder();

		foreach ($finder->files()->name('*.php')->ignoreVCS(true)->in($this->_dirs) as $info)
		{
			/* @var $info SfFileInfo */
			$this->_apply($info->get, $converters);
		}
	}

	private function _apply($src, array $converters)
	{
		foreach ($converters as $converter)
		{
			/* @var $converter ConverterInterface */
			$converter->input($src)->output($this->_output);
		}
	}

}
