<?php

namespace Maslosoft\Zamm\Widgets;

use Maslosoft\MiniView\MiniView;

/**
 * This will display HTML table containing documentation
 * for all properties of a class.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class PropertiesDocs
{

	private $class = null;

	/**
	 * Mini view instance
	 * @var MiniView
	 */
	private $view = null;

	public function __construct($class)
	{
		$this->class = $class;
		$this->view = new MiniView($this);
	}

	public function __toString()
	{
		return $this->view->render('properties-docs', ['class' => $this->class], true);
	}

}
