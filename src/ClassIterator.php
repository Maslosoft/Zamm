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

use ArrayAccess;
use Exception;
use Maslosoft\Zamm\Interfaces\SourceAccessorInterface;

/**
 * @property public
 * @property protected
 * @property private
 * @property
 */
class ClassIterator implements ArrayAccess
{

	const AccessPublic = 'public';
	const AccessProtected = 'protected';
	const AccessPrivate = 'private';

	/**
	 * Working class name
	 * @var string
	 */
	private $_className = '';

	/**
	 * $filter could be [public, methods], [public], [protected properties]
	 */
	public function __construct(SourceAccessorInterface $accessor)
	{
		$this->_className = $className;
		throw new Exception("DRAFT, pleas do not use " . __CLASS__);
	}

	public function __get($name)
	{
		$this->resetFilter();
		switch ($name)
		{
			case self::AccessPublic:
				// set filter
				break;
			///...
		}
		return $this;
	}

	public function __call($name, $arguments)
	{
		// Same as __get, but $arguments should contain additional filter:
		// a. regexp
		// b. filter class
		return $this;
	}

	public function offsetExists($offset)
	{

	}

	public function offsetGet($offset)
	{

	}

	public function offsetSet($offset, $value)
	{

	}

	public function offsetUnset($offset)
	{

	}

	// Array access implementation should return methods
}
