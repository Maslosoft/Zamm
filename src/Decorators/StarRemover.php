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
 * Remove stars `*` which surrounds php doc comments, like this one.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class StarRemover extends RendererDecorator implements RendererDecoratorInterface
{

	public function decorate(&$docComment)
	{
		
	}

}
