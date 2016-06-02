<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm;

use Maslosoft\Zamm\Interfaces\SourceAccessorInterface;
use UnexpectedValueException;

/**
 * Api Url generator
 * 
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class ApiUrl implements SourceAccessorInterface
{

	use Traits\SourceMagic;

	private static $sources = [];
	private $dotName = '';
	private $source = '';

	public function __construct($className = null, $text = '')
	{
		$this->dotName = str_replace('\\', '.', $className);


		// Many source found, search for proper api source
		$url = '';
//		var_dump(self::$sources);
		$search = self::normalize($className);
		foreach (self::$sources as $url => $ns)
		{
			if (empty($ns))
			{
				continue;
			}
			$pos = strpos($search, $ns);

			if ($pos === false)
			{
				continue;
			}
			if ($pos === 0)
			{
				$this->source = $url;
				break;
			}
		}

		// Last resort url assigning
		if (empty($this->source))
		{
			$this->source = $url;
		}
	}

	/**
	 * Set root url of current project API. This can be relative or absolute url.
	 *
	 * Set url for many projects with namespaces - this allows cross-linking different projects:
	 *
	 * ```
	 * ApiUrl::setRoot([
	 * 		'/mangan/api' => 'Maslosoft\\Mangan\\'
	 * 		'/addendum/api' => 'Maslosoft\\Addendum\\'
	 * ]);
	 * ```
	 *
	 * Could also be used for one project, but might result in wrong url if
	 * used on classes outside of project:
	 *
	 * ```
	 * ApiUrl::setRoot('/mangan/api);
	 * ```
	 *
	 * 
	 * @param string $apiUrl
	 */
	public static function setRoot($apiUrl)
	{
		if (is_string($apiUrl))
		{
			self::$sources[rtrim($apiUrl, '/')] = '';
		}
		elseif (is_array($apiUrl))
		{
			$urls = [];
			foreach ($apiUrl as $url => $ns)
			{
				$urls[rtrim($url, '/')] = self::normalize($ns);
			}
			self::$sources = array_merge(self::$sources, $urls);
		}
		else
		{
			throw new UnexpectedValueException(sprintf('Expected `apiUrl` to be string or array, got `%s`', gettype($apiUrl)));
		}
	}

	public function method($name)
	{
		// https://df.home/zamm/api/class-Maslosoft.Zamm.Decorators.AbstractDecorator.html#_decorate
		return sprintf('%s/class-%s.html#_%s', $this->source, $this->dotName, $name);
	}

	public function property($name)
	{
		// https://df.home/zamm/api/class-Maslosoft.Zamm.Zamm.html#$decorators
		return sprintf('%s/class-%s.html#$%s', $this->source, $this->dotName, $name);
	}

	public static function __callStatic($name, $arguments)
	{
		
	}

	public function __toString()
	{
		return sprintf('%s/class-%s.html', $this->source, $this->dotName);
	}

	/**
	 * Ensure that name starts and ends with slash
	 * @param string $name
	 * @return string
	 */
	private static function normalize($name)
	{
		return sprintf('\\%s\\', trim($name, '\\'));
	}

}
