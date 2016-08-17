<?php

/**
 * This software package is licensed under `AGPL, Commercial` license[s].
 *
 * @package maslosoft/zamm
 * @license AGPL, Commercial
 *
 * @copyright Copyright (c) Peter Maselkowski <pmaselkowski@gmail.com>
 *
 */

namespace Maslosoft\Zamm;

use Maslosoft\Zamm\Helpers\InlineWrapper;
use Maslosoft\Zamm\Interfaces\SourceAccessorInterface;
use ReflectionClass;

/**
 * This simply return names of methods and properties.
 * This is helper for IDE's.
 * Use this together with @var type hint.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Namer implements SourceAccessorInterface
{

	use Traits\SourceMagic;

	/**
	 * Working class name
	 * @var string
	 */
	protected $className = '';
	protected $info = null;

	/**
	 *
	 * @var ApiUrl
	 */
	protected $link = null;

	public function __construct($className = null)
	{
		$this->className = $className;
		$this->info = new ReflectionClass($this->className);
		$this->link = new ApiUrl($className);
	}

	/**
	 * Set wrapper defaults
	 * @return InlineWrapper
	 */
	public static function defaults()
	{
		return InlineWrapper::defaults();
	}

	public function __get($name)
	{
		// This is to get class name formatted, without invoking property()
		if ($name === 'md' || $name === 'html' || $name === 'short')
		{
			if (!$this->info->hasProperty($name))
			{
				return (new InlineWrapper($this->_type(), (string) $this->link))->$name;
			}
		}
		return $this->_get($name);
	}

	/**
	 *
	 * @param string $name
	 * @return InlineWrapper
	 */
	public function method($name)
	{
		assert($this->info->hasMethod($name));
		$link = $this->link->method($name);
		return new InlineWrapper($this->_method($name), $link);
	}

	protected function _method($name)
	{
		return sprintf('%s::%s()', $this->className, $name);
	}

	/**
	 *
	 * @param string $name
	 * @return InlineWrapper
	 */
	public function property($name)
	{
		assert($this->info->hasProperty($name));
		$link = $this->link->property($name);
		return new InlineWrapper($this->_property($name), $link);
	}

	protected function _property($name)
	{
		return sprintf('%s::%s', $this->className, $name);
	}

	public static function __callStatic($name, $arguments)
	{
		return new InlineWrapper(sprintf('%s', $name));
	}

	protected function _type()
	{
		return $this->className;
	}

	public function __toString()
	{
		$link = (string) $this->link;
		return (string) new InlineWrapper($this->_type(), $link);
	}

}
