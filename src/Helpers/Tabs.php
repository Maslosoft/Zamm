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
 * Tabs
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Tabs
{

	public static function trim(&$lines)
	{
		$string = false;
		if(is_string($lines))
		{
			$string = true;
			$lines = explode(PHP_EOL, $lines);
		}
		// Trim empty tabs columns
		$minTabs = 666;
		foreach ($lines as $line)
		{
			$matches = [];
			preg_match("~^\t+~", $line, $matches);
			if (!isset($matches[0]))
			{
				continue;
			}
			$minTabs = min([$minTabs, strlen($matches[0])]);
		}
		if ($minTabs < 666)
		{
			foreach ($lines as &$line)
			{
				$line = preg_replace("~^\t{{$minTabs}}~", '', $line);
			}
		}
		if($string)
		{
			$lines = implode(PHP_EOL, $lines);
		}
	}

}
