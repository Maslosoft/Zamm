<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Converters;

use Maslosoft\MiniView\MiniView;
use Maslosoft\Zamm\FileDecorators\FileDecorator;
use Maslosoft\Zamm\Outputs\IOutput;

/**
 * Convert PHP documentation file into md
 * 
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class PhpConverter implements IConverter
{
	/**
	 *
	 * @var MiniView
	 */
	private $view = null;

	/**
	 * File decorator
	 * @var FileDecorator
	 */
	private $decorator = null;

	/**
	 *
	 * @var string
	 */
	private $_fileName;

	/**
	 *
	 * @var string
	 */
	private $_tempName;

	private $_doc = '';

	public function __construct()
	{
		$this->decorator = new FileDecorator($this);
	}

	public function input($documentation, $fileName)
	{
		$this->decorator->decorate($documentation);

		$this->_tempName = sprintf('%s.tmp', $this->_fileName);
		$this->_fileName = $fileName;
		$this->view = new MiniView($this, dirname($this->_tempName));
		$this->_doc = $this->view->render(basename($this->_tempName), [], true);
	}

	public function output(IOutput $output)
	{
		$outputName = preg_replace('~\.php~', '', $this->_fileName);
		$output->output($this->_doc, $outputName);
	}

}
