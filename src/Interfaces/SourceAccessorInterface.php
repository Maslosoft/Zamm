<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Interfaces;

/**
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
interface SourceAccessorInterface
{

	public function __construct($className = null);

	public static function __callStatic($name, $arguments);

	public function method($name);

	public function property($name);
}
