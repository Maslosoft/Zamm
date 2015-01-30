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
		$this->setName("doc:make");
		$this->setDescription("Convert documentation");
		$this->setHelp(<<<EOT
The <info>doc:make</info> command convert one or more directories or files
EOT
		);
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
//		$zamm = new \Maslosoft\Zamm\Zamm();
//		(new \Maslosoft\Zamm\File\Applier($input, $output))->apply();
	}

}
