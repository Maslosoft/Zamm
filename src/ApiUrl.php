<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm;

use Maslosoft\Zamm\Interfaces\SourceAccessorInterface;
use Maslosoft\Zamm\Traits\SourceMagic;
use UnexpectedValueException;

/**
 * Api Url generator
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class ApiUrl implements SourceAccessorInterface
{

	use SourceMagic;

	private static $sources = [];
	private $dotName = '';
	private $source = '';
	private $className = '';

	public function __construct($className = null, $text = '')
	{
		$this->dotName = str_replace('\\', '.', $className);

		$this->className = $className;
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
			self::$sources[rtrim($apiUrl, '/')] = [];
		}
		elseif (is_array($apiUrl))
		{
			$urls = [];
			foreach ($apiUrl as $url => $ns)
			{
				if (!is_array($ns))
				{
					$ns = [$ns];
				}
				foreach ($ns as $nsIndex => $oneNs)
				{
					$ns[$nsIndex] = self::normalize($oneNs);
				}
				$urls[rtrim($url, '/')] = $ns;
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
		return sprintf('%s/class-%s.html#_%s', $this->resolveSource($this->resolveMethodClass($name)), $this->dotName, $name);
	}

	public function property($name)
	{
		// https://df.home/zamm/api/class-Maslosoft.Zamm.Zamm.html#$decorators
		return sprintf('%s/class-%s.html#$%s', $this->resolveSource($this->resolvePropertyClass($name)), $this->dotName, $name);
	}

	public static function __callStatic($name, $arguments)
	{

	}

	public function __toString()
	{
		return sprintf('%s/class-%s.html', $this->resolveSource($this->className), $this->dotName);
	}

	/**
	 * TODO: Resolve real class where property was defined
	 * @param string $name Property name
	 * @return string
	 */
	private function resolvePropertyClass($name)
	{
		return $this->className;
	}

	/**
	 * TODO: Resolve real class where method was defined
	 * @param string $name Method name
	 * @return string
	 */
	private function resolveMethodClass($name)
	{
		return $this->className;
	}

	private function resolveSource($className)
	{
		// Many sources found, search for proper api source
		$url = '';
		$source = '';
		$search = self::normalize($className);
		foreach (self::$sources as $url => $nss)
		{
			foreach ($nss as $ns)
			{
				if (empty($ns) || !is_string($url))
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
					$source = $url;
					break;
				}
			}
		}

		// Last resort url assigning
		if (empty($source))
		{
			$source = $url;
		}
		return $source;
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
