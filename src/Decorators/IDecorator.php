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

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Renderers\IRenderer;

/**
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
interface IDecorator
{

	public function setRenderer(IRenderer $renderer);

	public function getRenderer();

	public function decorate(&$docComment);
}
