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

use Maslosoft\Extractors\AddendumExtractor;
use Maslosoft\Extractors\IExtractor;
use Maslosoft\Zamm\Renderers\ClassRenderer;
use Maslosoft\Zamm\Renderers\MethodRenderer;
use Maslosoft\Zamm\Renderers\PropertyRenderer;

/**
 * PHP Doc extractor for code fragments
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Zamm
{

	/**
	 * Extractor instance
	 * @var IExtractor
	 */
	private $extractor = null;

	public function __construct($className)
	{
		/**
		 * TODO Make extractor configurable
		 */
		$this->extractor = new AddendumExtractor($className);
	}

	public function method($name)
	{
		return new MethodRenderer($this->extractor, $name);
	}

	public function property($name)
	{
		return new PropertyRenderer($this->extractor, $name);
	}

	/**
	 *
	 * @return ClassRenderer
	 */
	public function __toString()
	{
		return new ClassRenderer($this->extractor);
	}

}
