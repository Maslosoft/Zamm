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
