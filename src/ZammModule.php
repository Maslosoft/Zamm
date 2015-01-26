<?php

/**
 * This SOFTWARE PRODUCT is protected by copyright laws and international copyright treaties,
 * as well as other intellectual property laws and treaties.
 * This SOFTWARE PRODUCT is licensed, not sold.
 * For full licence agreement see enclosed LICENCE.html file.
 *
 * @licence LICENCE.html
 * @copyright Copyright (c) Piotr Masełkowski <pmaselkowski@gmail.com>
 * @copyright Copyright (c) Maslosoft
 * @link http://maslosoft.com/
 */

namespace Maslosoft\Zamm;

use Maslosoft\Ilmatar\Components\WebModule;

/**
 * MenulisModule
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class ZammModule extends WebModule
{
	public $projects = [];
	
	public function hasProject($name)
	{
		return isset($this->projects[$name]);
	}

}
