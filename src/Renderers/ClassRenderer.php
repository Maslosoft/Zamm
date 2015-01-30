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
 * ClassRenderer
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class ClassRenderer extends BaseRenderer implements IRenderer, IClassRenderer
{


	public function __toString()
	{
		return '';
	}

}
