<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Maslosoft\Zamm\Extractors;

/**
 * This extractor simulates extracting. It just return some predefined doc comments.
 *
 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
 */
class MockExtractor extends BaseExtractor implements IExtractor
{

	public function getClass()
	{
		return <<<COMMENT
		/**
		 * This is mock class comment.
		 * Normally it should contain general description.
		 * But this one contains only dummy tex and:
		 * <ul>
		 *		<li>some php doc</li>
		 *		<li>some html</li>
		 *		<li>some annotation</li>
		 * </ul>
		 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
		 * @since 1.0.2
		 * @Target('class')
		 */
COMMENT;
	}

	public function getMethod($name)
	{
		
	}

	public function getProperty($name)
	{

	}

}
