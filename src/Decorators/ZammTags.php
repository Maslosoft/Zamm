<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Meta\TagMeta;

/**
 * This adds special zamm tags. It's usage is secret.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class ZammTags extends RendererDecorator implements IRendererDecorator
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
