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

namespace Maslosoft\Zamm\Extractors;

use Maslosoft\Zamm\Interfaces\Extractors\ExtractorInterface;

/**
 * BaseExtractor
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
abstract class BaseExtractor implements ExtractorInterface
{

	/**
	 *
	 * @var string
	 */
	private $className = '';

	public function setClassName($name)
	{
		$this->className = $name;
	}

	public function getClassName()
	{
		return $this->className;
	}

}
