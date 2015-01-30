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

namespace Maslosoft\Zamm\Interfaces;

/**
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
interface IDecorator
{

	public function decorate(&$docComment);
}
