<?php

/**
 * This SOFTWARE PRODUCT is protected by copyright laws and international copyright treaties,
 * as well as other intellectual property laws and treaties.
 * This SOFTWARE PRODUCT is licensed, not sold.
 * For full licence agreement see enclosed LICENCE.html file.
 *
 * @licence LICENCE.html
 * @copyright Copyright (c) Piotr Masełkowski <pmaselkowski@gmail.com>
 * @copyright Copyright (c) Maslosoft
 * @link http://maslosoft.com/
 */

namespace Maslosoft\Zamm\Components;

use CBaseUrlRule;
use Yii;

/**
 * PageUrlRule
 * @copyright (c) 2013, Piotr Maselkowski
 * @author Piotr
 */
class PageUrlRule extends CBaseUrlRule
{

	public function createUrl($manager, $route, $params, $ampersand)
	{
		return false;
	}

	public function parseUrl($manager, $request, $pathInfo, $rawPathInfo)
	{
		$parts = preg_split('~/~', $pathInfo, PREG_SPLIT_NO_EMPTY);	
		if(count($parts) < 2)
		{
			return false;
		}
		
		$srcPrefix = array_shift($parts);
		$project = array_shift($parts);
		
		$prefix = tx('docs', 'zamm.url.rule');
		
		if($srcPrefix !== $prefix)
		{
			return false;
		}
		
		$module = Yii::app()->getModule('zamm');
		
		if(!$module->hasDocs($project))
		{
			return false;
		}

		// Match and set language
		$matches = [];

		$lang = Yii::app()->defaultLanguage;

		if (strlen($pathInfo) == 2 || preg_match('~^[a-z]{2}_[a-z]{2}$~', $pathInfo))
		{
			$lang = $pathInfo;
		}
		else
		{
			if (preg_match('~^[a-z]{2}_[a-z]{2}\b$~', $pathInfo))
			{
				preg_match_all('~^[a-z]{2}_[a-z]{2}\b~', $pathInfo, $matches);
			}
			else
			{
				preg_match_all('~^[a-z]{2}\b~', $pathInfo, $matches);
			}
		}

		if (!empty($matches[0][0]))
		{
			$lang = $matches[0][0];
		}
		Yii::app()->language = $lang;

		// Remove language part from url
		$pattern = sprintf('~^%s/~', $lang);
		$url = preg_replace($pattern, '', $pathInfo);


		// Use cursor and findAll for maximum performance
		// https://blog.serverdensity.com/checking-if-a-document-exists-mongodb-slow-findone-vs-find/

		// If found use page view route
		$route = sprintf('zamm/docs/view/project/%s/path/%s', $project, $pathInfo);
		return $route;
	}

}
