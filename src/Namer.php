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
	private $className = '';
	private $info = null;

	public function __construct($className = null)
	{
		$this->className = $className;
		$this->info = new ReflectionClass($this->className);
	}
	
	public function __get($name)
	{
		if($name == 'md' || $name == 'html')
		{
			if(!$this->info->hasProperty($name))
			{
				return (new InlineWrapper($this->className))->$name;
			}
		}
		return parent::__get($name);
	}

	public function method($name)
	{
		assert($this->info->hasMethod($name));
		return new InlineWrapper(sprintf('%s::%s()', $this->className, $name));
	}

	public function property($name)
	{
		assert($this->info->hasProperty($name));
		return new InlineWrapper(sprintf('%s::%s', $this->className, $name));
	}

	public static function __callStatic($name, $arguments)
	{
		return new InlineWrapper(sprintf('%s', $name));
	}

	public function __toString()
	{
		return $this->className;
	}

}
