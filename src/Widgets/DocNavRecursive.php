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

namespace Maslosoft\Zamm\Widgets;


use Maslosoft\Staple\Widgets\SubNavRecursive;

/**
 * This widget will display recursive tree of sub pages
 * relative to current page.
 * @package Maslosoft\Zamm\Widgets
 */
class DocNavRecursive extends SubNavRecursive
{
	public $title = '';

	public function __construct($options = [])
	{
		if(is_string($options))
		{
			$this->title = $options;
			$options = [];
		}
		$root = __DIR__;
		if(empty($options['root']))
		{
			$trace = debug_backtrace(null, 1);
			$root = dirname($trace[0]['file']);
		}
		$defaults = [
			'root' => $root,
			'path' => '.',
			'skipLevel' => 1
		];
		foreach ($defaults as $name => $value)
		{
			if (!array_key_exists($name, $options))
			{
				$options[$name] = $value;
			}
		}
		parent::__construct($options);
	}

	public function __toString()
	{
		$prefix = '';
		if($this->title)
		{
			$prefix = '<h3>' . $this->title . '</h3>' . "\n";
		}
		return $prefix . parent::__toString() . "\n\n";
	}
}