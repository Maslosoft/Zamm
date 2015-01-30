<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Interfaces\IDecorator;

/**
 * Abstract class implementgin common decorator methods
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
abstract class AbstractDecorator
{

	/**
	 * Decorators
	 * @var IDecorator[]
	 */
	private $decorators = [];

	/**
	 * Apply decorators configuration.
	 * Schema is described in Zamm class
	 * @param string[][] $decoratorsConfig
	 */
	protected function apply($decoratorsConfig)
	{
		foreach ($decoratorsConfig as $interface => $decorators)
		{
			if (!$this->decorated() instanceof $interface)
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
		$this->decorators[$className] = $decorator;

		return true;
	}

	abstract protected function init(IDecorator $decorator);

	/**
	 * Decorated entity
	 * @return object
	 */
	abstract protected function decorated();

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
