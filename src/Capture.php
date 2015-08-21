<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm;

/**
 * Capture part of php code for later use.
 * This is intended for parts of code which should be evaluated,
 * for instance for HTML widgets.
 *
 * Just after evluation or later, executing code can be captured and
 * displayed on HTML page.
 *
 * Example:
 * ```php
 * Capture::open();
 * echo 'Hi World!';
 * Capture::close();
 * ```
 * Above coge is executed, moreover php code is now available in `Capture` class,
 * and can be salvaged by `get`:
 * ```php
 * echo Capute::get(); //echo 'Hi World!';
 * ```
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Capture
{

	private static $snippets = [];
	private static $idCounter = 0;
	private static $isOpen = false;
	private static $currentId = 0;
	private static $currentFile = '';
	private static $currentLine = '';

	/**
	 * Open PHP capturing block
	 *
	 * @param type $id
	 */
	public static function open($id = null)
	{
		if (self::$isOpen)
		{
			throw new Exception('Capture is already open, close block before capturing another snippet');
		}
		if (null === $id)
		{
			$id = self::$idCounter++;
		}
		self::$isOpen = true;
		$trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
		self::$currentId = $id;
		self::$currentFile = $trace['file'];
		self::$currentLine = $trace['line'];
	}

	/**
	 * Close php capturing block
	 *
	 */
	public static function close()
	{
		if (!self::$isOpen)
		{
			throw new Exception('Capture is not open, open closing capturing block');
		}
		self::$isOpen = false;
		$lines = file(self::$currentFile);
		$trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
		$fragment = array_slice($lines, self::$currentLine, $trace['line'] - self::$currentLine);
		return self::$snippets[self::$currentId] = implode(PHP_EOL, $fragment);
	}

	/**
	 * Get last snipped or choosen by id.
	 * @param type $id
	 */
	public static function get($id = null)
	{
		if (self::$isOpen)
		{
			throw new Exception('Capture open, close block before getting snippet');
		}
		if (null === $id)
		{
			$id = self::$currentId;
		}
		return self::$snippets[$id];
	}

	/**
	 * Get captured PHP block, additionally wrapped by markdown
	 * fenced PHP code mark. This can be directly outputted to md file.
	 * @param type $id
	 */
	public static function getMd($id = null)
	{
		return sprintf("```php\n%s\n```", self::get($id));
	}

	/**
	 * Get captured PHP block, additionally wrapped by html pre and code tags.
	 * This can be directly outputted to HTML file.
	 * @param type $id
	 */
	public static function getHtml($id = null)
	{
		return sprintf("<pre><code>\n%s\n</code></pre>", self::get($id));
	}

}
