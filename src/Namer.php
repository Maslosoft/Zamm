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
use Maslosoft\Zamm\Traits\SourceMagic;
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

	use SourceMagic;

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
				return (new InlineWrapper($this->_type(), (string) $this->link, $this->getTitle()))->$name;
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
		assert($this->info->hasMethod($name), "Tried to get non existing method: `$name` info of " . $this->_type());
		$link = $this->link->method($name);
		return new InlineWrapper($this->_method($name), $link, $this->getTitle("$name()"));
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
		// Workaround for __getting html link for type.
		// Should be trapped in __get, but it doesn't always do.
		if ($name === 'md' || $name === 'html' || $name === 'short')
		{
			if (!$this->info->hasProperty($name))
			{
				return (new InlineWrapper($this->_type(), (string) $this->link, $this->getTitle()))->$name;
			}
		}


		assert($this->info->hasProperty($name));
		$link = $this->link->property($name);
		return new InlineWrapper($this->_property($name), $link, $this->getTitle($name));
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
		return (string) new InlineWrapper($this->_type(), $link, $this->getTitle());
	}

	private function getTitle($name = '')
	{
		if (!empty($name))
		{
			return sprintf('%s::%s', $this->info->name, $name);
		}
		return $this->info->name;
	}

}
