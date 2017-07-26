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
use Maslosoft\Zamm\Zamm;

/**
 * Add a little information about documentation utility used here.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class MadeByFileDecorator implements FileDecoratorInterface
{

	public function decorate(&$docComment)
	{
		if (false === strstr($docComment, Zamm::MadeBy))
		{
			$docComment = implode("\n\n", [$docComment, Zamm::MadeBy]);
		}
	}

}
