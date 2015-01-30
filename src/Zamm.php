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

use Maslosoft\EmbeDi\EmbeDi;
use Maslosoft\Zamm\Converters\IConverter;
use Maslosoft\Zamm\Converters\PhpConverter;
use Maslosoft\Zamm\Decorators\StarRemover;
use Maslosoft\Zamm\Extractors\AddendumExtractor;
use Maslosoft\Zamm\Extractors\IExtractor;
use Maslosoft\Zamm\Extractors\NullExtractor;
use Maslosoft\Zamm\FileDecorators\IFileDecorator;
use Maslosoft\Zamm\FileDecorators\IgnoreFileDecorator;
use Maslosoft\Zamm\Interfaces\ISourceAccessor;
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
class Zamm implements ISourceAccessor
{

	use Traits\SourceMagic;

	const Version = '1.0.0';
	const DefaultInstanceId = 'zamm';

	/**
	 * Configuration of decorators.
	 * This should be array with keys of renderer interface names and values of decorator classes.
	 * @var string[][]
	 */
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
	 * Configuration of file decorators.
	 * This should be array with keys of converter names and values of file decorator classes.
	 * @var string[][]
	 */
	public $fileDecorators = [
		// All file decorators
		IFileDecorator::class => [
		],
		// PHP converter decorators
		PhpConverter::class => [
			IgnoreFileDecorator::class
		]
	];

	/**
	 * Converters
	 * Array of class names of converters. These will be applied in order specified here, to all files.
	 * All converters should implement `IConverter` interface.
	 * @see IConverter
	 * @var string[]
	 */
	public $converters = [
		PhpConverter::class
	];

	/**
	 * Extractor class name.
	 * This class will be used to extract source fragments. Defaults to `AddendumExtractor`.
	 * It implements `IExtractor` interface.
	 * @see AddendumExtractor
	 * @see IExtractor
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

	/**
	 * EmbeDi instance
	 * @var EmbeDi
	 */
	private $_id = null;

	public function __construct($className = null)
	{
		$this->_className = $className;
		$this->_di = new EmbeDi(self::DefaultInstanceId);
		$this->_di->configure($this);
	}

	public function init()
	{
		$this->_di->store($this);
	}

	public function methods()
	{
		/**
		 * TODO Return all method names
		 */
	}

	public function properties()
	{
		/**
		 * TODO Return all property names
		 */
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

	public static function __callStatic($name, $arguments)
	{
		$className = get_called_class();
		return new MethodRenderer((new Zamm($className))->getExtractor(), $name);
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
