<?php

class RiseMenuItemPeer extends BaseRiseMenuItemPeer
{
	
	/**
	 * Returns all menu items for given menu_id.
	 * 
	 * @param int $menuId
	 * @return array of RiseMenuItem objects
	 */
	static public function getAllMenuItems($menuId){
		
		return self::doSelect(self::getAllMenuItemsCriteria($menuId));
	}
	
	/**
	 * Returns prepared Criteria object for RiseMenuItems select.
	 * 
	 * @param int $menuId
	 * @return Criteria
	 */
	static public function getAllMenuItemsCriteria($menuId)
	{
		$criteria = new Criteria();
		$criteria->add(self::MENU_ID, $menuId);
		$criteria->addAscendingOrderByColumn(self::ORDER);
		return $criteria;
	}
	
	/**
	 * Returns an associative array with keys as menu name
	 * and values as array of all RiseMenuItems related to this menu name
	 * 
	 * @param array $menus
	 * @return array
	 */
	static public function getForMenus(array $menus){
	
		foreach($menus as $menu)
		{
			$items[$menu->getName()] = self::getAllMenuItems($menu->getId());
		}
		
		return $items;
		
	}

	/**
	 * Checks if the RiseMenuItem with given $url and $menuId params are in the database
	 * 
	 * @param	string $url
	 * @param	int $menuId
	 * @return	bool
	 */
	static public function check($url, $menuId)
	{
		$criteria = new Criteria();
		$criteria->add(self::URL, $url);
		$criteria->add(self::MENU_ID, $menuId);
		
		return self::doSelect($criteria);
	}
}