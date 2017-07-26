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

namespace Maslosoft\Zamm;

use Maslosoft\Zamm\Traits\SourceMagic;

/**
 * This simply return names of methods and properties, without class name or short class name.
 * This is helper for IDE's.
 * Use this together with @var type hint.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class ShortNamer extends Namer
{

	use SourceMagic;

	protected function _method($name)
	{
		return sprintf('%s()', $name);
	}

	public function _property($name)
	{
		return sprintf('$%s', $name);
	}

	protected function _type()
	{
		return $this->info->getShortName();
	}

}
