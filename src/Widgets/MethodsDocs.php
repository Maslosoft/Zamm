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

use Maslosoft\MiniView\MiniView;

/**
 * This will display HTML table containing documentation
 * for all pubic methods of a class.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class MethodsDocs extends AbstractWidget
{
	/**
	 * Provide title to display above this widget's
	 * generated table.
	 *
	 * @var string
	 */
	public $title = '';
	private $class = null;

	public function __construct($class)
	{
		$this->class = $class;
	}

	public function __toString()
	{
		return $this->render('methods-docs', ['class' => $this->class]) . "\n\n";
	}

}
