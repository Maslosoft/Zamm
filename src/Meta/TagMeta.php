<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Meta;

use Maslosoft\Zamm\Renderers\IRenderer;

/**
 * TagMeta
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class TagMeta
{

	public $className = '';
	public $name = '';
	public $interfaces = '';

	public function __construct(IRenderer $renderer)
	{
		$this->interfaces = class_implements($renderer);
		$this->className = $renderer->getClassName();
		$this->name = $renderer->getName();
	}

	public function toJson()
	{
		return json_encode($this, JSON_FORCE_OBJECT);
	}

}
