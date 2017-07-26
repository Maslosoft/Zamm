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

use Maslosoft\Addendum\Addendum;
use Maslosoft\Zamm\Interfaces\Extractors\ExtractorInterface;

/**
 * Extract doc comments from class
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class AddendumExtractor extends BaseExtractor implements ExtractorInterface
{

	public function __construct()
	{
		new Addendum();
	}

	public function getClass()
	{
		
	}

	public function getMethod($name)
	{
		
	}

	public function getProperty($name)
	{
		
	}

}
