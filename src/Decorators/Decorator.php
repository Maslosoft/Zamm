<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Renderers\IRenderer;
use Maslosoft\Zamm\Zamm;

/**
 * Decorator
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Decorator
{

	/**
	 * Decorators
	 * @var IDecorator[]
	 */
	private $decorators = [];

	/**
	 * Renderer instance
	 * @var IRenderer
	 */
	private $renderer = null;

	/**
	 * Create decorator
	 * @param IRenderer $renderer
	 */
	public function __construct(IRenderer $renderer)
	{
		$zamm = new Zamm();
		foreach ($zamm->decorators as $interface => $decorators)
		{
			if (!$renderer instanceof $interface)
			{
				continue;
			}
			foreach ($decorators as $decorator)
			{
				$this->addDecorator($decorator);
			}
		}
	}

	/**
	 * Add decorator. This will perform uniqueness check.
	 * @param string $className
	 * @return boolean true if added
	 */
	public function addDecorator($className)
	{
		if (isset($this->decorators[$className]))
		{
			return false;
		}
		$decorator = new $className();
		assert($decorator instanceof IDecorator);
		$decorator->setRenderer($this->renderer);
		$this->decorators[$className] = $decorator;

		return true;
	}

	/**
	 * Decorate doc comment
	 * @param string $docComment
	 */
	public function decorate(&$docComment)
	{
		foreach ($this->decorators as $decorator)
		{
			$decorator->decorate($docComment);
		}
	}

}
