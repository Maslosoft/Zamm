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
		return '';
	}

}
