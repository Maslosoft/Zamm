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
