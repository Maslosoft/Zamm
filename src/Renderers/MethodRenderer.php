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

use Maslosoft\Zamm\Decorators\Decorator;

/**
 * MethodRenderer
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class MethodRenderer extends BaseRenderer implements IRenderer, IMethodRenderer
{

	public function __toString()
	{
		$docComment = $this->extractor->getMethod($this->name);
		(new Decorator($this))->decorate($docComment);
		return $docComment;
	}

	public function params()
	{
		return new ParamsRenderer($this->extractor, $this->name);
	}

}
