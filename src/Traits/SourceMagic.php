<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Traits;

use Maslosoft\Zamm\Interfaces\ISourceAccessor;

/**
 * GetSet
 * @see ISourceAccessor
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
trait SourceMagic
{

	public function __get($name)
	{
		return $this->property($name);
	}

	public function __call($name, $arguments)
	{
		return $this->method($name);
	}

	abstract public function method($name);

	abstract public function property($name);

}
