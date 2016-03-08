<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Extractors;

use Maslosoft\Zamm\Interfaces\Extractors\ExtractorInterface;

/**
 * BaseExtractor
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
abstract class BaseExtractor implements ExtractorInterface
{

	/**
	 *
	 * @var string
	 */
	private $className = '';

	public function setClassName($name)
	{
		$this->className = $name;
	}

	public function getClassName()
	{
		return $this->className;
	}

}
