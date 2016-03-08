<?php

/**
 * This software package is licensed under `AGPL, Commercial` license[s].
 *
 * @package maslosoft/zamm
 * @license AGPL, Commercial
 *
 * @copyright Copyright (c) Peter Maselkowski <pmaselkowski@gmail.com>
 *
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Interfaces\Decorators\RendererDecoratorInterface;
use Maslosoft\Zamm\Meta\TagMeta;

/**
 * This adds special zamm tags. It's usage is secret.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class ZammTags extends RendererDecorator implements RendererDecoratorInterface
{

	const Open = '<!-- ZAMM:';
	const Close = ':ZAMM -->';

	/**
	 * Add ZAMM tags
	 * @param string $docComment
	 */
	public function decorate(&$docComment)
	{
		$docComment = sprintf("%s\n%s\n%s", $this->open(), $docComment, $this->close());
	}

	private function open()
	{
		return sprintf("%s%s", self::Open, (new TagMeta($this->getRenderer()))->toJson());
	}

	private function close()
	{
		return self::Close;
	}

}
