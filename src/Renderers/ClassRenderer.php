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

use Maslosoft\Zamm\Interfaces\Renderers\ClassRendererInterface;
use Maslosoft\Zamm\Interfaces\Renderers\RendererInterface;

/**
 * ClassRenderer
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class ClassRenderer extends BaseRenderer implements RendererInterface, ClassRendererInterface
{

	public function __toString()
	{
		return '';
	}

}
