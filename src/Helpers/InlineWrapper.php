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

	private $text = '';
	private $link = '';
	private $isMd = false;
	private $isHtml = false;

	public function __construct($text, $link = '')
	{
		$this->text = $text;
		$this->link = $link;
	}

	public function __get($name)
	{
		return $this->$name();
	}

	public function md()
	{
		$this->isMd = true;
		return $this;
	}

	public function html()
	{
		$this->isHtml = true;
		return $this;
	}

	public function __toString()
	{
		if ($this->isMd)
		{
			return $this->wrap("`$this->text`");
		}
		if ($this->isHtml)
		{
			return $this->wrap("<code>$this->text</code>");
		}
		return $this->wrap($this->text);
	}

	private function wrap($text)
	{
		if ($this->link)
		{
			if ($this->isMd)
			{
				return sprintf('[%s](%s)', $text, $this->link);
			}
//			if ($this->isHtml)
//			{
			return sprintf('<a href="%s" class="api-link">%s</a>', $this->link, $text);
//			}
		}
		return $text;
	}

}
