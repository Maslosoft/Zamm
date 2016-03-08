<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
