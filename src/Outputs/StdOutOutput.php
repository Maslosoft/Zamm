<?php

/**
 * This software package is licensed under `AGPL, Commercial` license[s].
 *
 * @package maslosoft/zamm
 * @license AGPL, Commercial
 *
 * @copyright Copyright (c) Peter Maselkowski <pmaselkowski@gmail.com>
 *
 */

namespace Maslosoft\Zamm\Outputs;

use Maslosoft\Zamm\Interfaces\OutputInterface;

/**
 * StdOutOutput
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class StdOutOutput implements OutputInterface
{

	public function output($documentation, $fileName = null)
	{
		echo $documentation;
	}

}
