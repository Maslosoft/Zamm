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

namespace Maslosoft\Zamm\Interfaces\Extractors;

/**
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
interface ExtractorInterface
{

	public function setClassName($name);

	public function getClassName();

	public function getClass();

	public function getMethod($name);

	public function getProperty($name);
}
