<?php

/**
 * This software package is licensed under New BSD license.
 *
 * @package maslosoft/zamm
 * @licence New BSD
 *
 * @copyright Copyright (c) Peter Maselkowski <pmaselkowski@gmail.com>
 *
 */

namespace Maslosoft\Zamm\Renderers;

use Maslosoft\Zamm\Interfaces\Renderers\PropertyRendererInterface;
use Maslosoft\Zamm\Interfaces\Renderers\RendererInterface;

/**
 * PropertyRenderer
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class PropertyRenderer extends BaseRenderer implements RendererInterface, PropertyRendererInterface
{

	public function type()
	{
		return new PropertyTypeRenderer($this->extractor, $this->name);
	}

	public function __toString()
	{
		
	}

}
