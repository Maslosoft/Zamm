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
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
interface IRenderer
{

	public function __construct(IExtractor $extractor, $name = null);

	public function getClassName();

	public function getName();

	public function __toString();
}
