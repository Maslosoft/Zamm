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

namespace Maslosoft\Zamm;

use Maslosoft\Zamm\Helpers\Tabs;
use Maslosoft\Zamm\Helpers\Wrapper;
use Maslosoft\Zamm\Interfaces\SourceAccessorInterface;
use ReflectionClass;
use ReflectionProperty;

/**
 * Source extractor for code fragments.
 * This class extracts source code for specified code elements.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Source implements SourceAccessorInterface
{

	use Traits\SourceMagic;

	/**
	 * Reflection information
	 * @var ReflectionClass
	 */
	private $info = null;

	/**
	 * Source as array
	 * @var string[]
	 */
	private $source = [];

	public function __construct($className = null)
	{
		$this->info = new ReflectionClass($className);
		$this->source = file($this->info->getFileName());
	}

	/**
	 * Should return source of working class
	 */
	public function __toString()
	{
		return $this->getTypeSource();
	}

	public static function __callStatic($name, $arguments)
	{
		
	}

	/**
	 * Get source code of method
	 * @param string $name
	 * @return Wrapper
	 */
	public function method($name)
	{
		$method = $this->info->getMethod($name);
		$code = $this->getMethodSource($method->getStartLine(), $method->getEndLine());
		$result = [];
		$comment = $method->getDocComment();
		Tabs::trim($comment);
		$result[] = $comment . PHP_EOL;
		$result[] = $code . PHP_EOL;
		return new Wrapper(implode('', $result));
	}

	/**
	 * Get source code of property
	 * @param string $name
	 * @return Wrapper
	 */
	public function property($name)
	{
		$property = $this->info->getProperty($name);
		$code = $this->getPropertySource($property);
		$result = [];
		$comment = $property->getDocComment();
		Tabs::trim($comment);
		$result[] = $comment . PHP_EOL;
		$result[] = $code . PHP_EOL;

		return new Wrapper(implode('', $result));
	}

	private function getMethodSource($start, $end)
	{
		// Assume blank line after method name
		// So start one line above
		if (preg_match('~^\s*\{~', $this->source[$start]))
		{
			$start--;
		}
		$source = array_values($this->source);
		$result = array_splice($source, $start, $end - $start);
		Tabs::trim($result);
		return implode('', $result);
	}

	public function getPropertySource(ReflectionProperty $property)
	{
		$name = [];

		switch (true)
		{
			case $property->isPublic():
				$name[] = 'public';
				break;
			case $property->isProtected():
				$name[] = 'public';
				break;
			case $property->isPrivate():
				$name[] = 'public';
				break;
		}
		if ($property->isStatic())
		{
			$name[] = 'static';
		}
		$name[] = sprintf('$%s', $property->name);

		return implode(' ', $name) . ';';
	}

	private function getTypeSource()
	{
		return '';
	}

}
