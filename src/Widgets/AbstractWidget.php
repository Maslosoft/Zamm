<?php

namespace Maslosoft\Zamm\Widgets;

use Maslosoft\MiniView\MiniView;

/**
 * AbstractWidget
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
abstract class AbstractWidget
{

	/**
	 * Mini view instance
	 * @var MiniView
	 */
	private $view = null;

	/**
	 *
	 * @return MiniView
	 */
	public function getView()
	{
		if (empty($this->view))
		{
			$this->view = new MiniView($this);
		}
		return $this->view;
	}

	/**
	 * 
	 * @param string $view
	 * @param mixed $data
	 * @return string
	 */
	public function render($view, $data = [])
	{
		return $this->getView()->render($view, $data, true);
	}

}
