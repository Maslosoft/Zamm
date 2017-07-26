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

namespace Maslosoft\Zamm\Outputs;

use Maslosoft\Zamm\Interfaces\OutputInterface;

/**
 * FileOutput
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class FileOutput implements OutputInterface
{

	public function output($documentation, $fileName)
	{
		file_put_contents($fileName, $documentation);
	}

}
