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

use Maslosoft\Extractors\IExtractor;

/**
 * MethodRenderer
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class MethodRenderer extends BaseRenderer implements IRenderer, IMethodRenderer
{

	public function __toString()
	{

	}

	public function params()
	{
		return new ParamsRenderer($this->extractor, $this->name);
	}

}
