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

use Maslosoft\Ilmatar\Modules\Ua\Signals\AccountMenuItems;
use Maslosoft\Ilmatar\Widgets\Security\AdminMenuItems;

/**
 * Class for header applier
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class ZammSlots
{

	/**
	 * @SlotFor(Maslosoft\Ilmatar\Widgets\Security\AdminMenuItems)
	 * @param AdminMenuItems $signal
	 */
	public function reactOn(AdminMenuItems $signal)
	{
		$signal->item = [
			'url' => '/zamm',
			'active' => $signal->moduleId == 'zamm',
			'items' => [
				'/zamm',
			]
		];
	}

	/**
	 * @SlotFor(Maslosoft\Ilmatar\Modules\Ua\Signals\AccountMenuItems)
	 * @param AccountMenuItems $signal
	 */
	public function reactOnAccountMenu(AccountMenuItems $signal)
	{
//		$signal->item = [
//			'url' => '/content/myBlog',
//			'label' => tx('My blog')
//		];
	}
}
