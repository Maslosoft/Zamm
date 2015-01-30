<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\FileDecorators;

use Maslosoft\Zamm\Converters\IConverter;
use Maslosoft\Zamm\Decorators\AbstractDecorator;
use Maslosoft\Zamm\Interfaces\IDecorator;
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
	 * @var IConverter
	 */
	private $_converter = null;

	public function __construct(IConverter $converter)
	{
		$this->_converter = $converter;
		$zamm = new Zamm();

		$this->apply($zamm->fileDecorators);
	}

	protected function decorated()
	{
		return $this->_converter;
	}

	protected function init(IDecorator $decorator)
	{
		
	}

}
