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

namespace Maslosoft\Zamm;

use Maslosoft\Zamm\Interfaces\SourceAccessorInterface;

/**
 * Source extractor for code fragments.
 * This class extracts source code for specified code elements.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Source implements SourceAccessorInterface
{

	use Traits\SourceMagic;

	public function __construct($className = null)
	{
		
	}

	public function method($name)
	{
		
	}

	public function property($name)
	{

	}

	public static function __callStatic($name, $arguments)
	{
		
	}

}
