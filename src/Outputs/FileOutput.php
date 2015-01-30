<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Outputs;

/**
 * FileOutput
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class FileOutput implements IOutput
{
	public function output($documentation, $fileName)
	{
		file_put_contents($fileName, $documentation);
	}

}
