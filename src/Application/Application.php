<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Application;

use Maslosoft\Zamm\Commands\SingleCommand;
use Maslosoft\Zamm\Zamm;
use Symfony\Component\Console\Application as ConsoleApplication;
use Symfony\Component\Console\Command\Command;

/**
 * Application
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class Application extends ConsoleApplication
{

	/**
	 * Logo
	 * font: slant
	 */
	const Logo = <<<LOGO
 _____
/__  /  ____ _____ ___  ____ ___
  / /  / __ `/ __ `__ \/ __ `__ \
 / /__/ /_/ / / / / / / / / / / /
/____/\__,_/_/ /_/ /_/_/ /_/ /_/


LOGO;

	public function __construct()
	{
		parent::__construct('Zamm', Zamm::Version);
	}

	public function getHelp()
	{
		return self::Logo . parent::getHelp();
	}

    /**
     * Gets the default commands that should always be available.
     * 
     * @return Command[] An array of default Command instances
     */
	public function getDefaultCommands()
	{
		$commands = parent::getDefaultCommands();

		$commands[] = new SingleCommand();

		return $commands;
	}

}
