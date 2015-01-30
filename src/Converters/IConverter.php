<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Converters;

/**
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
interface IConverter
{
	/**
	 *
	 * @param string $documentation
	 * @return IConverter
	 */
	public function input($documentation);
	
	/**
	 * @return string name
	 */
	public function output();
}
