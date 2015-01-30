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

namespace Maslosoft\Zamm\Extractors;

/**
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
interface IExtractor
{

	public function setClassName($name);

	public function getClassName();

	public function getClass();

	public function getMethod($name);

	public function getProperty($name);
}
