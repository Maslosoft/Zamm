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

use Maslosoft\Zamm\Helpers\FenceHolder;
use Maslosoft\Zamm\Interfaces\Decorators\RendererDecoratorInterface;

/**
 * This removes annotations. This means everything starting with `@` and capital letter.
 *
 * This will prevent annotations surrounded by fences (triple `).
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class AnnotationRemover extends RendererDecorator implements RendererDecoratorInterface
{

	public function decorate(&$docComment)
	{
		$holder = new FenceHolder();
		$holder->hide($docComment);
		$docComment = preg_replace('~^@[A-Z].+$~m', '', $docComment);
		$holder->reveal($docComment);
	}

}
