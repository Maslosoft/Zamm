<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm;

/**
 * ApiLink
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class ApiLink implements Interfaces\SourceAccessorInterface
{

	use Traits\SourceMagic;

	private static $source = '';
	private $dotName = '';

	public function __construct($className = null, $text = '')
	{
		$this->dotName = str_replace('\\', '.', $className);
	}

	public function method($name, $text = '')
	{
		// https://df.home/zamm/api/class-Maslosoft.Zamm.Decorators.AbstractDecorator.html#_decorate
		$href = sprintf('%s/class-%s.html#_%s', self::$source, $this->dotName, $name);
		return sprintf('<a href="%s">%s</a>', $href, $name);
	}

	public function property($name, $text = '')
	{
		// https://df.home/zamm/api/class-Maslosoft.Zamm.Zamm.html#$decorators
		$href = sprintf('%s/class-%s.html#$%s', self::$source, $this->dotName, $name);
		return sprintf('<a href="%s">%s</a>', $href, $name);
	}

	public static function __callStatic($name, $arguments)
	{
		
	}

}
