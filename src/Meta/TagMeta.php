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

namespace Maslosoft\Zamm\Meta;

use Maslosoft\Zamm\Decorators\ZammTags;
use Maslosoft\Zamm\Interfaces\Renderers\RendererInterface;

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
	 * @param RendererInterface $renderer
	 */
	public function __construct(RendererInterface $renderer)
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
