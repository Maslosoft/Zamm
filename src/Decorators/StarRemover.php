<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Decorators;

/**
 * Remove stars `*` which surrounds php doc comments, like this one.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class StarRemover extends RendererDecorator implements IRendererDecorator
{
	public function decorate(&$docComment)
	{
		
	}

}
