<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Interfaces\DecoratorInterface;
use Maslosoft\Zamm\Interfaces\Decorators\RendererDecoratorInterface;
use Maslosoft\Zamm\Interfaces\Renderers\RendererInterface;
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
	 * @var RendererInterface
	 */
	private $renderer = null;

	/**
	 * Create decorator
	 * @param RendererInterface $renderer
	 */
	public function __construct(RendererInterface $renderer)
	{
		$zamm = new Zamm();
		$this->renderer = $renderer;
		$this->apply($zamm->decorators);
	}

	protected function init(DecoratorInterface $decorator)
	{
		assert($decorator instanceof RendererDecoratorInterface);
		$decorator->setRenderer($this->renderer);
	}

	protected function decorated()
	{
		return $this->renderer;
	}

}
