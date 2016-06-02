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
class Wrapper
{

	public $md;
	public $html;
	private $text = '';
	private $isMd = false;
	private $isHtml = false;

	public function __construct($text)
	{
		unset($this->md);
		unset($this->html);
		$this->text = $text;
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

	/**
	 * Get code for HTML formatting.
	 * @return Wrapper
	 */
	public function html()
	{
		$this->isHtml = true;
		return $this;
	}

	public function __toString()
	{
		if ($this->isMd)
		{
			return <<<TEXT
			
```php
$this->text
```

TEXT;
		}
		if ($this->isHtml)
		{
			$text = htmlspecialchars($this->text);
			return <<<TEXT
<pre>$text</pre>
TEXT;
		}
		return $this->text;
	}

}
