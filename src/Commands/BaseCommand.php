<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
