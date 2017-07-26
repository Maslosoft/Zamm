<?php

namespace Maslosoft\Zamm\Widgets;

use Maslosoft\MiniView\MiniView;

/**
 * This will display HTML table containing documentation
 * for all properties of a class.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class PropertiesDocs extends AbstractWidget
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
		return $this->render('properties-docs', ['class' => $this->class]) . "\n\n";
	}

}
