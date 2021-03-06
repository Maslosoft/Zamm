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

namespace Maslosoft\Zamm\Widgets;

/**
 * This will display HTML table containing documentation
 * for classes top doc block in selected namespace.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class NamespaceDocs extends AbstractWidget
{

	private $class = null;

	public function __construct($class)
	{
		$this->class = $class;
	}

	public function __toString()
	{
		return $this->render('namespace-docs', ['class' => $this->class]) . "\n\n";
	}

}
