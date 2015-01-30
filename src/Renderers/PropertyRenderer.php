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

/**
 * PropertyRenderer
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class PropertyRenderer extends BaseRenderer implements IRenderer, IPropertyRenderer
{

	public function type()
	{
		return new PropertyTypeRenderer($this->extractor, $this->name);
	}

	public function __toString()
	{
		
	}

}
