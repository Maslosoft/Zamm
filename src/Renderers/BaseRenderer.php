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

namespace Maslosoft\Zamm\Renderers;

use Maslosoft\Zamm\Interfaces\Extractors\ExtractorInterface;
use Maslosoft\Zamm\Interfaces\Renderers\RendererInterface;

/**
 * BaseRenderer
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
abstract class BaseRenderer implements RendererInterface
{

	/**
	 * Extractor
	 * @var ExtractorInterface
	 */
	protected $extractor;

	/**
	 * Extracted element name
	 * @var string
	 */
	protected $name = '';

	public function __construct(ExtractorInterface $extractor, $name = null)
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
