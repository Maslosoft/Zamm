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
 * Base class for widgets to simplify development. It
 * provides pre-configured view.
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
