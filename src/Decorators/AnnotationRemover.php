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

use Maslosoft\Zamm\Interfaces\Decorators\RendererDecoratorInterface;

/**
 * This removes annotations. This means everything starting with `@` and capital letter
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class AnnotationRemover extends RendererDecorator implements RendererDecoratorInterface
{

	public function decorate(&$docComment)
	{
		
	}

}
