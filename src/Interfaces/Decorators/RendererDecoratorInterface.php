<?php

/**
 * This software package is licensed under `AGPL, Commercial` license[s].
 *
 * @package maslosoft/zamm
 * @license AGPL, Commercial
 *
 * @copyright Copyright (c) Peter Maselkowski <pmaselkowski@gmail.com>
 * @link https://maslosoft.com/zamm/
 */

namespace Maslosoft\Zamm\Interfaces\Decorators;

use Maslosoft\Zamm\Interfaces\DecoratorInterface;
use Maslosoft\Zamm\Interfaces\Renderers\RendererInterface;

/**
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
interface RendererDecoratorInterface extends DecoratorInterface
{

	public function setRenderer(RendererInterface $renderer);

	public function getRenderer();
}
