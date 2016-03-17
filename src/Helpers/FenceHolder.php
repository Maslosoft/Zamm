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

namespace Maslosoft\Zamm\Helpers;

/**
 * This class hides fenced code from processing,
 * by replacing fenced fragments with placeholder,
 * and then this can also bring fenced fragments back.
 *
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class FenceHolder
{

	private $fences = [];

	public function hide(&$docBlock)
	{
		$matches = [];
		preg_match_all('~(```.*?```)~ms', $docBlock, $matches);
		if (empty($matches[0]))
		{
			return;
		}
		$i = 0;

		// Collect matches
		foreach ($matches[0] as $match)
		{
			$key = sprintf('~%s@%s~', __CLASS__, $i++);
			$this->fences[$key] = $match;
		}

		$docBlock = str_replace(array_values($this->fences), array_keys($this->fences), $docBlock);
	}

	public function reveal(&$docBlock)
	{
		if (empty($this->fences))
		{
			return;
		}
		$docBlock = str_replace(array_keys($this->fences), array_values($this->fences), $docBlock);
	}

}
