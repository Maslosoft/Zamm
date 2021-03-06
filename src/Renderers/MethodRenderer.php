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

use Maslosoft\Zamm\Decorators\Decorator;
use Maslosoft\Zamm\Interfaces\Renderers\MethodRendererInterface;
use Maslosoft\Zamm\Interfaces\Renderers\RendererInterface;

/**
 * MethodRenderer
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class MethodRenderer extends BaseRenderer implements RendererInterface, MethodRendererInterface
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
