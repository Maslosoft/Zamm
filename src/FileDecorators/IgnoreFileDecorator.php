<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\FileDecorators;

use Maslosoft\Zamm\Meta\PhpToken;

/**
 * IgnoreFileDecorator
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class IgnoreFileDecorator implements IFileDecorator
{
	public function decorate($documentation)
	{
		foreach(token_get_all($documentation) as $data)
		{
			$token = new PhpToken($data);
		}
	}

}
