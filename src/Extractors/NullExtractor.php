<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Extractors;

/**
 * Empty extractor
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class NullExtractor implements IExtractor
{

	public function getClass()
	{
		return '';
	}

	public function getMethod($name)
	{
		return '';
	}

	public function getProperty($name)
	{
		return '';
	}

	public function setClassName($name)
	{

	}

}
