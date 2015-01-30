<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Meta;

use Maslosoft\Zamm\Decorators\ZammTags;
use Maslosoft\Zamm\Renderers\IRenderer;

/**
 * TagMeta
 * @see ZammTags
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class TagMeta
{

	/**
	 * Current working class name
	 * @var string
	 */
	public $className = '';

	/**
	 * Current method or property name
	 * @var string
	 */
	public $name = '';

	/**
	 * Implemented renderer interfaces
	 * @var string[]
	 */
	public $interfaces = [];

	/**
	 * Class constructor
	 * @param IRenderer $renderer
	 */
	public function __construct(IRenderer $renderer)
	{
		$this->interfaces = class_implements($renderer);
		$this->className = $renderer->getClassName();
		$this->name = $renderer->getName();
	}

	/**
	 * Convert to json
	 * @return string
	 */
	public function toJson()
	{
		return json_encode($this, JSON_FORCE_OBJECT);
	}

}
