<?php

/**
 * This software package is licensed under New BSD license.
 *
 * @package maslosoft/zamm
 * @licence New BSD
 *
 * @copyright Copyright (c) Peter Maselkowski <pmaselkowski@gmail.com>
 *
 */

namespace Maslosoft\Zamm\Renderers;

use Maslosoft\Extractors\IExtractor;

/**
 * BaseRenderer
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
abstract class BaseRenderer
{

	/**
	 * Extractor
	 * @var IExtractor
	 */
	protected $extractor;

	/**
	 * Extracted element name
	 * @var string
	 */
	protected $name = '';

	public function __construct(IExtractor $extractor, $name = null)
	{
		$this->extractor = $extractor;
		$this->name = $name;
	}

}
