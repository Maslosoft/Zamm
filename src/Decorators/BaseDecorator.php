<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Renderers\IRenderer;

/**
 * BaseDecorator
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
abstract class BaseDecorator implements IDecorator
{

	/**
	 * Renderer instance
	 * @var IRenderer
	 */
	private $_renderer = null;

	/**
	 * Get renderer instance
	 * @return IRenderer
	 */
	public function getRenderer()
	{
		return $this->_renderer;
	}

	public function setRenderer(IRenderer $renderer)
	{
		$this->_renderer = $renderer;
	}

}
