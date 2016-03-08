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

namespace Maslosoft\Zamm\Interfaces\Renderers;

use Maslosoft\Zamm\Interfaces\Extractors\ExtractorInterface;

/**
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
interface RendererInterface
{

	public function __construct(ExtractorInterface $extractor, $name = null);

	public function getClassName();

	public function getName();

	public function __toString();
}
