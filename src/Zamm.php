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
use Maslosoft\Extractors\NullExtractor;
use Maslosoft\Zamm\Decorators\StarRemover;
use Maslosoft\Zamm\Renderers\ClassRenderer;
use Maslosoft\Zamm\Renderers\IClassRenderer;
use Maslosoft\Zamm\Renderers\IMethodRenderer;
use Maslosoft\Zamm\Renderers\IPropertyRenderer;
use Maslosoft\Zamm\Renderers\IRenderer;
use Maslosoft\Zamm\Renderers\MethodRenderer;
use Maslosoft\Zamm\Renderers\PropertyRenderer;

/**
 * PHP Doc extractor for code fragments
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Zamm
{

	public $decorators = [
		// All around decorators
		IRenderer::class => [
			StarRemover::class
		],
		// Class decorators
		IClassRenderer::class => [
		],
		// Property decorators
		IPropertyRenderer::class => [
		],
		// Method decorators
		IMethodRenderer::class => [
		],
	];

	/**
	 * Extractor class
	 * @var string
	 */
	public $extractor = AddendumExtractor::class;

	/**
	 * Extractor instance
	 * @var IExtractor
	 */
	private $_extractor = null;

	/**
	 * Working class name
	 * @var string|null
	 */
	private $_className = '';

	public function __construct($className = null)
	{
		$this->_className = $className;
	}

	public function init()
	{
		if(null === $className)
		{
			$extractor = NullExtractor::class;
		}
		else
		{
			$extractor = $this->extractor;
		}
		$this->setExtractor(new $extractor());
		$this->_extractor->setClassName($className);
	}

	public function method($name)
	{
		return new MethodRenderer($this->_extractor, $name);
	}

	public function property($name)
	{
		return new PropertyRenderer($this->_extractor, $name);
	}

	public function setExtractor(IExtractor $extractor)
	{
		$this->_extractor = $extractor;
	}

	public function getExtractor()
	{
		return $this->_extractor;
	}

	/**
	 *
	 * @return ClassRenderer
	 */
	public function __toString()
	{
		return new ClassRenderer($this->_extractor);
	}

}
