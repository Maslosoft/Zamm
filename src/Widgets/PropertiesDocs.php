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

	private $class = null;

	public function __construct($class)
	{
		$this->class = $class;
	}

	public function __toString()
	{
		return $this->render('properties-docs', ['class' => $this->class]);
	}

}
