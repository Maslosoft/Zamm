<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Interfaces\Decorators\RendererDecoratorInterface;

/**
 * This removes annotations. This means everything starting with `@` and low case letter
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class DocTagRemover extends RendererDecorator implements RendererDecoratorInterface
{

	public function decorate(&$docComment)
	{
		
	}

}
