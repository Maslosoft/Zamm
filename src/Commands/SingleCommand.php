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
