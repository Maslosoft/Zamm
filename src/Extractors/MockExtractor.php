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
		return <<<COMMENT
		/**
		 * This is mock method $name comment.
		 * Normally it should contain method description.
		 * But this one contains only dummy tex and:
		 * <ul>
		 *		<li>some method php doc</li>
		 *		<li>some html</li>
		 *		<li>some method annotations</li>
		 * </ul>
		 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
		 * @since 1.0.2
		 * @Target('method')
		 * @param int \$id Identifier of user in mock method
		 * @param string \$name Name of user in mock method
		 */
COMMENT;
	}

	public function getProperty($name)
	{
		return <<<COMMENT
		/**
		 * This is mock property $name comment.
		 * Normally it should contain property description.
		 * But this one contains only dummy tex and:
		 * <ul>
		 *		<li>some property php doc</li>
		 *		<li>some html</li>
		 *		<li>some property annotations</li>
		 * </ul>
		 * @author Piotr Maselkowski <pmaselkowski at gmail.com>
		 * @since 1.0.2
		 * @Target('field')
		 * @var int Identifier of user in mock property
		 */
COMMENT;
	}

}
