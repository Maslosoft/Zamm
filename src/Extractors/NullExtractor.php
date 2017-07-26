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

namespace Maslosoft\Zamm\Extractors;

use Maslosoft\Zamm\Interfaces\Extractors\ExtractorInterface;

/**
 * Empty extractor
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class NullExtractor extends BaseExtractor implements ExtractorInterface
{

	public function getClass()
	{
		return '';
	}

	public function getMethod($name)
	{
		return '';
	}

	public function getProperty($name)
	{
		return '';
	}

}
