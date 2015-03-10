<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Interfaces\IDecorator;
use Maslosoft\Zamm\Renderers\IRenderer;

/**
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
interface IRendererDecorator extends IDecorator
{

	public function setRenderer(IRenderer $renderer);

	public function getRenderer();
}