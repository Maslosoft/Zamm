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

namespace Maslosoft\Extractors;

use Maslosoft\Addendum\Addendum;

/**
 * AddendumExtractor
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class AddendumExtractor implements IExtractor
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

	public function setClassName($name)
	{

	}

}
