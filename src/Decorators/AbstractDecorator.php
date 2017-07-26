<?php

/**
 * This software package is licensed under `AGPL, Commercial` license[s].
 *
 * @package maslosoft/zamm
 * @license AGPL, Commercial
 *
 * @copyright Copyright (c) Peter Maselkowski <pmaselkowski@gmail.com>
 * @link https://maslosoft.com/zamm/
 */

namespace Maslosoft\Zamm\Decorators;

use Maslosoft\Zamm\Interfaces\DecoratorInterface;

/**
 * Abstract class implementgin common decorator methods
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
abstract class AbstractDecorator
{

	/**
	 * Decorators
	 * @var DecoratorInterface[]
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
		assert($decorator instanceof DecoratorInterface);
		$this->decorators[$className] = $decorator;

		return true;
	}

	abstract protected function init(DecoratorInterface $decorator);

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
