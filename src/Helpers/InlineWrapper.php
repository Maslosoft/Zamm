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
 * Wrapper
 * @property Wrapper $md Get markdown wrapped code
 * @property Wrapper $html Get html `pre` wrapped code
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class InlineWrapper
{

	protected $setup = false;
	private $text = '';
	private $link = '';
	private $isMd = false;
	private $isHtml = false;
	private $isRaw = false;
	private static $def = [];

	public function __construct($text = '', $link = '', $title = '')
	{
		$this->text = $text;
		$this->link = $link;
		$this->title = $title;
		foreach (self::$def as $flag => $value)
		{
			$this->$flag = $value;
		}
	}

	public static function defaults()
	{
		// TODO Allow settings defaults
		// See: https://github.com/Maslosoft/Zamm/issues/4
		$wrapper = new static;
		$wrapper->setup = true;
		return $wrapper;
	}

	public function __get($name)
	{
		return $this->$name();
	}

	public function md($value = true)
	{
		$this->setFlag('isMd', $value);
		$this->setFlag('isHtml', !$value);
		return $this;
	}

	public function html($value = true)
	{
		$this->setFlag('isHtml', $value);
		$this->setFlag('isMd', !$value);
		return $this;
	}

	/**
	 * Strip leading $ from variables and trailing () from methods
	 * @return InlineWrapper
	 */
	public function raw($value = true)
	{
		$this->setFlag('isRaw', $value);
		return $this;
	}

	public function __toString()
	{
		if ($this->isRaw)
		{
			$text = trim($this->text, '$()');
		}
		else
		{
			$text = $this->text;
		}
		if ($this->isMd)
		{
			return $this->wrap("`$text`");
		}
		if ($this->isHtml)
		{
			return $this->wrap("<code>$text</code>");
		}
		return $this->wrap($this->text);
	}

	private function wrap($text)
	{
		if ($this->link)
		{
			if ($this->isMd)
			{
				return sprintf('[%s](%s "%s")', $text, $this->link, $this->title);
			}
			return sprintf('<a href="%s" class="api-link" title="%s">%s</a>', $this->link, $this->title, $text);
		}
		return $text;
	}

	private function setFlag($flag, $value = true)
	{
		$this->$flag = $value;
		if ($this->setup)
		{
			self::$def[$flag] = $value;
		}
	}

}
