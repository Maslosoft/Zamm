<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Decorators;

/**
 * This removes annotations. This means everything starting with `@` and capital letter
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class AnnotationRemover extends BaseDecorator implements IDecorator
{

	public function decorate(&$docComment)
	{

	}

}
