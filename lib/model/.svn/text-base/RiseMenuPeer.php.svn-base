<?php

class RiseMenuPeer extends BaseRiseMenuPeer
{
	
	/**
	 * Returns an associative array of RiseMenuItem objects for each category
	 * except those which are defined in app.yml.
	 * 
	 * @return array	schema: (key => value) as (string category_name => array of RiseMenuItem objects)
	 */
	static public function getAllMenus()
	{
		$criteria = new Criteria();
		$criteria->addAscendingOrderByColumn(self::ID);
		return RiseMenuItemPeer::getForMenus(self::doSelect($criteria));
	}
	
	/**
	 * Returns an array of RiseMenuItem objects for given category.
	 * 
	 * @param	string $menu_name
	 * @return	array
	 */
	static public function getMenu($menu_name)
	{
		$criteria = new Criteria();
		$criteria->add(self::NAME, $menu_name);
		$results = RiseMenuItemPeer::getForMenus(self::doSelect($criteria));
		return $results[0];
	}
	
	/**
	 * Returns an associative array of RiseMenuItem objects for given categories.
	 * 
	 * @param	string $menu_name1 [, string $menu_name2, string $...]
	 * @return	array	schema: (key => value) as (string category_name => array of RiseMenuItem objects)
	 */
	static public function getMenus()
	{	
		$criteria = new Criteria();
		if(func_num_args())
		{
			$args = array();
			foreach(func_get_args() as $arg)
			{
				if(!is_array($arg)) $args[] = $arg;
				else $args = array_merge($args, $arg);				
			}
			foreach($args as $arg) $criteria->addOr(self::NAME, $arg);
			
			$results = RiseMenuItemPeer::getForMenus(self::doSelect($criteria));
			
			if(count($results) == 1) return $results[$args[0]];
			
			return $results;
		}
		
		return false;
	}

}