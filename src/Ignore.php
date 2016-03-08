<?php

/**
 * This software package is licensed under `AGPL, Commercial` license[s].
 *
 * @package maslosoft/zamm
 * @license AGPL, Commercial
 *
 * @copyright Copyright (c) Peter Maselkowski <pmaselkowski@gmail.com>
 *
 */

namespace Maslosoft\Zamm;

/**
 * Ignore documentation code fragments.
 * Some parts of documentation can contain php code snippets.
 * This would be processed by Zamm. Use this class to ignore those parts.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Ignore
{
	/**
	 * Open php part ignored by php interpreter.
	 * All php code after this tag and before `close` tag will be treated as plain text.
	 * It will not be interpreted by php.
	 * @todo Implement this
	 */
	public static function open()
	{
		
	}
	
	/**
	 * Close php part ignored by php interpreter.
	 * @todo Implement this
	 */
	public static function close()
	{
		
	}
}
