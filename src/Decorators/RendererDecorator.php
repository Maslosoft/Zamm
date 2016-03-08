<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Interfaces\Decorators\RendererDecoratorInterface;
use Maslosoft\Zamm\Interfaces\Renderers\RendererInterface;

/**
 * BaseDecorator
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
abstract class RendererDecorator implements RendererDecoratorInterface
{

	/**
	 * Renderer instance
	 * @var RendererInterface
	 */
	private $_renderer = null;

	/**
	 * Get renderer instance
	 * @return RendererInterface
	 */
	public function getRenderer()
	{
		return $this->_renderer;
	}

	public function setRenderer(RendererInterface $renderer)
	{
		$this->_renderer = $renderer;
	}

}
