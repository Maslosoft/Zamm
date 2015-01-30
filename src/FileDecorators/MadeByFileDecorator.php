<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\FileDecorators;

use Maslosoft\Zamm\Zamm;

/**
 * Add a little information about documentation utility used here.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class MadeByFileDecorator implements IFileDecorator
{

	public function decorate(&$docComment)
	{
		$docComment = implode("\n", [$docComment, Zamm::MadeBy]);
	}

}
