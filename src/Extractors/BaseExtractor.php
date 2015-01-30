<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Extractors;

/**
 * BaseExtractor
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
abstract class BaseExtractor implements IExtractor
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
