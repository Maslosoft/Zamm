<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm;

/**
 * Api Url generator
 * 
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class ApiUrl implements Interfaces\SourceAccessorInterface
{

	use Traits\SourceMagic;

	private static $source = '';
	private $dotName = '';

	public function __construct($className = null, $text = '')
	{
		$this->dotName = str_replace('\\', '.', $className);
	}

	/**
	 * Set root url of current project API. This can be relative or absolute url.
	 *
	 * Example:
	 *
	 * ```
	 * ApiUrl::setRoot('/mangan/api);
	 * ```
	 *
	 * @param string $apiUrl
	 */
	public static function setRoot($apiUrl)
	{
		self::$source = rtrim($apiUrl, '/');
	}

	public function method($name)
	{
		// https://df.home/zamm/api/class-Maslosoft.Zamm.Decorators.AbstractDecorator.html#_decorate
		return sprintf('%s/class-%s.html#_%s', self::$source, $this->dotName, $name);
	}

	public function property($name)
	{
		// https://df.home/zamm/api/class-Maslosoft.Zamm.Zamm.html#$decorators
		return sprintf('%s/class-%s.html#$%s', self::$source, $this->dotName, $name);
	}

	public static function __callStatic($name, $arguments)
	{
		
	}

	public function __toString()
	{
		return sprintf('%s/class-%s.html', self::$source, $this->dotName);
	}

}
