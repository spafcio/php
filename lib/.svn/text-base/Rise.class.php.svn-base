<?php

/**
 * Class includes additional tools as methods using in different places of application. 
 * 
 * @package		symfony
 * @subpackage	additional
 * @author		tomek
 *
 */
class Rise
{
	
	/**
	 * Adapts given text to url format:
	 * 	- replaces non letter or digits by -
	 * 	- trims
	 *  - transforms to lowercase
	 *  - transliterates
	 *  - removes unwanted characters
	 * 
	 * @param	string $text
	 * @return	string
	 */
	static public function slugify($text)
	{

		// replace polish letters
		$pl_signs = array(
			
			'ą' => 'a',
			'ć' => 'c',
			'ę' => 'e',
			'ó' => 'o',
			'ś' => 's',
			'ż' => 'z',
			'ź' => 'z',

		);

		foreach($pl_signs as $sign => $letter)
		{
			$text = str_replace($sign, $letter, $text);
		}

		// replace non letter or digits by -
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);

		// trim
		$text = trim($text, '-');

		// transliterate
		if (function_exists('iconv'))
		{
			$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		}

		// lowercase
		$text = strtolower($text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		if (empty($text))
		{
			return 'n-a';
		}

		return $text;
	}

	/**
	 * Generates frontend url and stores it in a database.
	 * 
	 * @param string $item_title			Title of menu item.
	 * @param RiseMenuItem $menu_item		Instance of RiseMenuItem object.
	 * @param int $rise_menu_id				RiseMenu [id] field value.
	 * @param string $route_name			Name of the route defined in frontend/config/routing.yml.
	 * @param array $route_params			Array of route parameters.
	 * 
	 * @return bool
	 */
	static public function generateAndSaveUrl($item_title, RiseMenuItem $menu_item, $rise_menu_id, $route_name, $route_params)
	{
		$url = sfProjectConfiguration::getActive()->generateFrontendUrl($route_name, $route_params);

		if(!RiseMenuItemPeer::check($url, $rise_menu_id))
		{
			$menu_item->setRiseMenu(RiseMenuPeer::retrieveByPK($rise_menu_id));
			$menu_item->setTitle($item_title);
			$menu_item->setUrl($url);
			$menu_item->save();
			return true;
		}

		return false;
	}


	/**
	 * Returns prepared sfPropelPager object
	 * 
	 * @see		/lib/model/RiseCategory.php	->	getCategoryCriteria method
	 * @param	sfWebRequest $request
	 * @param	RiseCategory $category
	 * @param	array $params				Params passed to RiseCategory->getCategoryCriteria method which returned results 
	 * @return	Instance of sfPropelPager.
	 */
	static public function getPager(sfWebRequest $request, RiseCategory $category, $params = array())
	{
		$pager = new sfPropelPager('RiseArticle', sfConfig::get('app_max_articles_on_category'));
		$pager->setCriteria($category->getCategoryCriteria($params));
		$pager->setPage($request->getParameter('page', 1));
		$pager->init();
		return $pager;
	}
	
	/**
	 * Checks if the cookies are switch on in user's browser.
	 * 
	 * @return	bool
	 */
	static public function checkCookies()
	{
		$storage_options = sfContext::getInstance()->getStorage()->getOptions();
			
		return (bool) sfContext::getInstance()->getRequest()->getCookie($storage_options['session_name']);
	}
}