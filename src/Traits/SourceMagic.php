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

namespace Maslosoft\Zamm\Traits;

use Maslosoft\Zamm\Interfaces\SourceAccessorInterface;

/**
 * GetSet
 * @see SourceAccessorInterface
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
trait SourceMagic
{

	public function __get($name)
	{
		return $this->_get($name);
	}

	protected function _get($name)
	{
		return $this->property($name);
	}

	public function __call($name, $arguments)
	{
		return $this->_call($name);
	}

	public function _call($name)
	{
		return $this->method($name);
	}

	abstract public function method($name);

	abstract public function property($name);
}
