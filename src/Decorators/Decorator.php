<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Renderers\IRenderer;

/**
 * Decorator
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Decorator implements IDecorator
{

	private $decorators = [];

	public function __construct(IRenderer $renderer)
	{
		;
	}

	public function decorate(&$docComment)
	{

	}

}
