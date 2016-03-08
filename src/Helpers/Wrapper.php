<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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

	private $text = '';
	private $isMd = false;
	private $isHtml = false;

	public function __construct($text)
	{
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
			return <<<TEXT
<pre>
$this->text
</pre>
TEXT;
		}
		return $this->text;
	}

}
