<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
