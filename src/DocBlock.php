<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm;

use Exception;
use Maslosoft\Zamm\Decorators\AnnotationRemover;
use Maslosoft\Zamm\Decorators\DocTagRemover;
use Maslosoft\Zamm\Decorators\StarRemover;
use Maslosoft\Zamm\Interfaces\SourceAccessorInterface;
use ReflectionClass;

/**
 * DocBlock
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class DocBlock implements SourceAccessorInterface
{

	use Traits\SourceMagic;

	/**
	 *
	 * @var ReflectionClass
	 */
	private $info = null;

	public function __construct($className = null)
	{
		$this->info = new ReflectionClass($className);
	}

	public function method($name)
	{
		assert($this->info->hasMethod($name));
		return $this->decorate($this->info->getMethod($name)->getDocComment());
	}

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
		return $this->decorate($this->info->getDocComment());
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
		return $docBlock;
	}

}
