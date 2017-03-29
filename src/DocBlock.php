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

use Exception;
use Maslosoft\Zamm\Decorators\AnnotationRemover;
use Maslosoft\Zamm\Decorators\DocTagRemover;
use Maslosoft\Zamm\Decorators\StarRemover;
use Maslosoft\Zamm\Helpers\DocWrapper;
use Maslosoft\Zamm\Interfaces\SourceAccessorInterface;
use Maslosoft\Zamm\Traits\SourceMagic;
use ReflectionClass;

/**
 * DocBlock
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class DocBlock implements SourceAccessorInterface
{

	use SourceMagic;

	/**
	 *
	 * @var ReflectionClass
	 */
	private $info = null;

	public function __construct($className = null)
	{
		$this->info = new ReflectionClass($className);
	}

	/**
	 * Get doc comment for method.
	 * @param string $name
	 * @return DocWrapper
	 */
	public function method($name)
	{
		assert($this->info->hasMethod($name));
		return $this->decorate($this->info->getMethod($name)->getDocComment());
	}

	/**
	 * Get doc comment for property.
	 * @param string $name
	 * @return DocWrapper
	 */
	public function property($name)
	{
		assert($this->info->hasProperty($name));
		return $this->decorate($this->info->getProperty($name)->getDocComment());
	}

	public static function __callStatic($name, $arguments)
	{

	}

	public function __toString()
	{
		return (string) $this->decorate($this->info->getDocComment());
	}

	private function decorate($docBlock)
	{

		try
		{
			$decorators = [
				new StarRemover(),
				new DocTagRemover(),
				new AnnotationRemover()
			];
			foreach ($decorators as $decorator)
			{
				$decorator->decorate($docBlock);
			}
		}
		catch (Exception $ex)
		{
			return $ex->getMessage();
		}
		return new DocWrapper($docBlock);
	}

}
