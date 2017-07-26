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

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Interfaces\Decorators\RendererDecoratorInterface;

/**
 * Remove stars `*` which surrounds php doc comments, like this one.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class StarRemover extends RendererDecorator implements RendererDecoratorInterface
{

	public function decorate(&$docComment)
	{
		$docComment = trim($docComment);

		// Remove leading slash
		$docComment = preg_replace('~^/~ms', '', $docComment);

		// Remove trailing slash
		$docComment = preg_replace('~/$~ms', '', $docComment);

		// Remove stars and one space
		$docComment = preg_replace('~^\s*\**~ms', '', $docComment);

		// Remove leading spaces. Other whitespace must be preserved.
		$docComment = preg_replace('~^ {1}~ms', '', $docComment);
	}

}
