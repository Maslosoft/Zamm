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

namespace Maslosoft\Zamm\Helpers;

use Parsedown;

/**
 * This will render markdown to html if requsted
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class DocWrapper extends Wrapper
{

	public function __toString()
	{

		// Do not call parent
		if ($this->isHtml)
		{
			return (new Parsedown)->text($this->text);
		}
		return $this->text;
	}

}
