<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\FileDecorators;

use Maslosoft\Zamm\Meta\PhpToken;

/**
 * Ignore `Ignore::open` / `Ignore::close` tags
 * This ensures that ignored parts of php code will not be processed by PHP interpreter.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class IgnoreFileDecorator implements IFileDecorator
{

	public function decorate(&$docComment)
	{
		foreach (token_get_all($docComment) as $data)
		{
			$token = new PhpToken($data);
		}
	}

}
