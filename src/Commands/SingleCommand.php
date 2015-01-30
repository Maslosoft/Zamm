<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * SingleCommand
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class SingleCommand extends BaseCommand
{

	protected function configure()
	{
		parent::configure();
		$this->setName("doc:single");
		$this->setDescription("Convert single file");
		$this->setHelp(<<<EOT
The <info>doc:single</info> command converts single file according to <info>--input</info> and <info>--output</info> params.
EOT
		);
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		//...
	}

}
