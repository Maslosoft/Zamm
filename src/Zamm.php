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

use Maslosoft\Zamm\Decorators\StarRemover;
use Maslosoft\Zamm\Extractors\AddendumExtractor;
use Maslosoft\Zamm\Extractors\IExtractor;
use Maslosoft\Zamm\Extractors\NullExtractor;
use Maslosoft\Zamm\Renderers\ClassRenderer;
use Maslosoft\Zamm\Renderers\IClassRenderer;
use Maslosoft\Zamm\Renderers\IMethodRenderer;
use Maslosoft\Zamm\Renderers\IPropertyRenderer;
use Maslosoft\Zamm\Renderers\IRenderer;
use Maslosoft\Zamm\Renderers\MethodRenderer;
use Maslosoft\Zamm\Renderers\PropertyRenderer;

/**
 * Zamm: PHP Doc extractor for code fragments
 * This class allows extracting code fragments into documentation.
 * It is designed to be IDE friendly. It should autocomplete and automatically reflect code refactors if properly used.
 * This documentation is also processed with Zamm.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Zamm
{

	const Version = '1.0.0';

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
		
	}

	public function method($name)
	{
		return new MethodRenderer($this->getExtractor(), $name);
	}

	public function property($name)
	{
		return new PropertyRenderer($this->getExtractor(), $name);
	}

	public function setExtractor(IExtractor $extractor)
	{
		$this->_extractor = $extractor;
	}

	public function getExtractor()
	{
		if (null === $this->_extractor)
		{

			if (!$this->_className)
			{
				$extractorClass = NullExtractor::class;
			}
			else
			{
				$extractorClass = $this->extractor;
			}
			$extractor = new $extractorClass();
			$extractor->setClassName($this->_className);
			$this->_extractor = $extractor;
		}
		return $this->_extractor;
	}

	/**
	 *
	 * @return ClassRenderer
	 */
	public function __toString()
	{
		return (string) new ClassRenderer($this->getExtractor());
	}

}
