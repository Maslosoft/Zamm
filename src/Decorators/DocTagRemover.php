<?php

/**
 * This software package is licensed under `AGPL, Commercial` license[s].
 *
 * @package maslosoft/zamm
 * @license AGPL, Commercial
 *
 * @copyright Copyright (c) Peter Maselkowski <pmaselkowski@gmail.com>
 *
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Helpers\FenceHolder;
use Maslosoft\Zamm\Interfaces\Decorators\RendererDecoratorInterface;

/**
 * This removes doc block annotations. This means everything starting with `@` and low case letter.
 *
 * This will prevent doc blocks surrounded by fences (triple `)
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class DocTagRemover extends RendererDecorator implements RendererDecoratorInterface
{

	public function decorate(&$docComment)
	{
		$holder = new FenceHolder();
		$holder->hide($docComment);
		$docComment = preg_replace('~^@[a-z].+$~m', '', $docComment);
		$holder->reveal($docComment);
	}

}
