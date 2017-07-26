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

namespace Maslosoft\Zamm\FileDecorators;

use Maslosoft\Zamm\Interfaces\FileDecoratorInterface;
use Maslosoft\Zamm\Meta\PhpToken;

/**
 * Ignore `Ignore::open` / `Ignore::close` tags
 * This ensures that ignored parts of php code will not be processed by PHP interpreter.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class IgnoreFileDecorator implements FileDecoratorInterface
{

	public function decorate(&$docComment)
	{
		foreach (token_get_all($docComment) as $data)
		{
			$token = new PhpToken($data);
		}
	}

}
