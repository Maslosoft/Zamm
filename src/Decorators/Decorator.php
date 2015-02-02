<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Interfaces\IDecorator;
use Maslosoft\Zamm\Renderers\IRenderer;
use Maslosoft\Zamm\Zamm;

/**
 * Decorator
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Decorator extends AbstractDecorator
{


	/**
	 * Renderer instance
	 * @var IRenderer
	 */
	private $renderer = null;

	/**
	 * Create decorator
	 * @param IRenderer $renderer
	 */
	public function __construct(IRenderer $renderer)
	{
		$zamm = new Zamm();
		$this->renderer = $renderer;
		$this->apply($zamm->decorators);
	}

	protected function init(IRendererDecorator $decorator)
	{
		$decorator->setRenderer($this->renderer);
	}

	protected function decorated()
	{
		return $this->renderer;
	}

}
