<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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

	public function __construct($className)
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
