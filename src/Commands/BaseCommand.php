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

namespace Maslosoft\Zamm\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * BaseCommand
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
abstract class BaseCommand extends Command
{

	protected function configure()
	{
		$this->setDefinition([
			new InputArgument('input', InputArgument::IS_ARRAY, 'Input file or folder', ['docs']),
			new InputOption('output', 'o', InputOption::VALUE_REQUIRED, 'Output folder', 'docs'),
		]);
	}

}
