<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Interfaces;

use Maslosoft\Zamm\Interfaces\OutputInterface;

/**
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
interface ConverterInterface
{

	/**
	 *
	 * @param string $documentation
	 * @return ConverterInterface
	 */
	public function input($documentation, $fileName);

	/**
	 * @return string file name
	 */
	public function output(OutputInterface $output);
}
