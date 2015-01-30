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

use Maslosoft\Zamm\Extractors\IExtractor;

/**
 * BaseRenderer
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
abstract class BaseRenderer implements IRenderer
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

	public function getClassName()
	{
		return $this->extractor->getClassName();
	}

	public function getName()
	{
		return $this->name;
	}

}
