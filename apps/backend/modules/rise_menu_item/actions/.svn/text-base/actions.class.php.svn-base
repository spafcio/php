<?php

require_once dirname(__FILE__).'/../lib/rise_menu_itemGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/rise_menu_itemGeneratorHelper.class.php';

/**
 * rise_menu_item actions.
 *
 * @package    rise
 * @subpackage rise_menu_item
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class rise_menu_itemActions extends autoRise_menu_itemActions
{
	
	/**
	 * Sets menu_id param filter from attribute menu_id
	 * 
	 * @access	private
	 * @return	void
	 */
	private function setMenuIdFilter()
	{
		$this->setFilters(array('menu_id' => $this->getUser()->getAttribute('menu_id')));
	}

	/**
	 * Autoexecutes setMenuIdFilter method
	 * 
	 * @access	public
	 * @return	void
	 */
	public function preExecute()
	{
		parent::preExecute();
		
		if($this->getUser()->getAttribute('menu_id'))
		{
			$this->setMenuIdFilter();
		}
	}
	
	public function executeIndexByMenuId(sfWebRequest $request)
	{
		$this->getUser()->setAttribute('menu_id', $request->getParameter('menu_id'));
		$this->setMenuIdFilter($request->getParameter('menu_id'));
		$this->forward('rise_menu_item', 'index');
	}
	
	/**
	 * Moves up/down menu item in sorted order
	 * 
	 * @access	public
	 * @param	sfWebRequest $request
	 * @param	$up			If $up param is true, the menu item will be moved up
	 * @return 	void
	 */
	public function listMove(sfWebRequest $request, $up = false)
	{
		$request->setParameter('menu_id', $this->getUser()->getAttribute('menu_id'));
		
		$menu_item = RiseMenuItemPeer::retrieveByPK($request->getParameter('id'));
		
		if($up)
		{
			if(!$menu_item->moveUp())
			{
				$this->getUser()->setFlash('error', 'Element jest pierwszy na liście!', false);
			}
		}
		else
		{
			if(!$menu_item->moveDown())
			{
				$this->getUser()->setFlash('error', 'Element jest ostatni na liście!', false);
			}
		}
		
		$this->forward('rise_menu_item', 'indexByMenuId');
	}

	
	/**
	 * Moves down menu item
	 * 
	 * @access	public
	 * @param	sfWebRequest $request
	 * @return	void
	 */
	public function executeListMoveDown(sfWebRequest $request)
	{
		$this->listMove($request);
	}

	/**
	 * Moves up menu item
	 * 
	 * @access	public
	 * @param	sfWebRequest $request
	 * @return	void
	 */
	public function executeListMoveUp(sfWebRequest $request)
	{
		$this->listMove($request, true);
	}

}