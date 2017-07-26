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

namespace Maslosoft\Zamm\FileDecorators;

use Maslosoft\Zamm\Decorators\AbstractDecorator;
use Maslosoft\Zamm\Interfaces\ConverterInterface;
use Maslosoft\Zamm\Interfaces\DecoratorInterface;
use Maslosoft\Zamm\Zamm;

/**
 * FileDecorator
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class FileDecorator extends AbstractDecorator
{

	/**
	 * Converter
	 * @var ConverterInterface
	 */
	private $_converter = null;

	public function __construct(ConverterInterface $converter)
	{
		$this->_converter = $converter;
		$zamm = new Zamm();

		$this->apply($zamm->fileDecorators);
	}

	protected function decorated()
	{
		return $this->_converter;
	}

	protected function init(DecoratorInterface $decorator)
	{
		
	}

}
