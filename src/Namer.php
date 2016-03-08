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

use Maslosoft\Zamm\Interfaces\SourceAccessorInterface;

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
	private $_className = '';

	public function __construct($className = null)
	{
		$this->_className = $className;
	}

	public function method($name)
	{
		return sprintf('%s::%s()', $this->_className, $name);
	}

	public function property($name)
	{
		return sprintf('%s::%s', $this->_className, $name);
	}

	public static function __callStatic($name, $arguments)
	{
		return sprintf('%s', $name);
	}

	public function __toString()
	{
		return $this->_className;
	}

}
