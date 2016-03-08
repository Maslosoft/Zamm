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
