<?php
/*
 *  article components.
 *
 * @package    rise
 * @subpackage article
 * @author     kopix
 */
class articleComponents extends sfComponents
{
	/**
	 * Reads all menus to $menu variable
	 * 
	 * @access public
	 * @return void
	 */
	public function executeGenerateLinks()
	{
		$this->menu = RiseMenuPeer::getAllMenus();
	}
}