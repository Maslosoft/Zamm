<?php

/**
 * This software package is licensed under New BSD license.
 *
 * @package maslosoft/zamm
 * @licence New BSD
 *
 * @copyright Copyright (c) Peter Maselkowski <pmaselkowski@gmail.com>
 *
 */

namespace Maslosoft\Zamm\Extractors;

use Maslosoft\Addendum\Addendum;

/**
 * Extract doc comments from class
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class AddendumExtractor extends BaseExtractor implements IExtractor
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
