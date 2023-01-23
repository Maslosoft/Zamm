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
	public const Logo = <<<LOGO
 _____
/__  /  ____ _____ ___  ____ ___
  / /  / __ `/ __ `__ \/ __ `__ \
 / /__/ /_/ / / / / / / / / / / /
/____/\__,_/_/ /_/ /_/_/ /_/ /_/


LOGO;

	public function __construct()
	{
		parent::__construct('Zamm', require __DIR__ . '/../version.php');
	}

	public function getHelp(): string
	{
		return self::Logo . parent::getHelp();
	}

    /**
     * Gets the default commands that should always be available.
     * 
     * @return Command[] An array of default Command instances
     */
	public function getDefaultCommands(): array
	{
		$commands = parent::getDefaultCommands();

		$commands[] = new SingleCommand();

		return $commands;
	}

}
