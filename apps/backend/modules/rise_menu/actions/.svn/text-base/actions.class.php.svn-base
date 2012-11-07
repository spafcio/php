<?php

require_once dirname(__FILE__).'/../lib/rise_menuGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/rise_menuGeneratorHelper.class.php';

/**
 * rise_menu actions.
 *
 * @package    rise
 * @subpackage rise_menu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class rise_menuActions extends autoRise_menuActions
{
	
	/**
	 * Redirects to list of menu items filtered by selected menu_id
	 * 
	 * @access	public
	 * @param	sfWebRequest $request
	 * @return	void
	 */
	public function executeListShowItems(sfWebRequest $request)
	{
		$this->redirect($this->generateUrl('list_menu_items_by_id', array('menu_id' => $request->getParameter('id'))));
	}
}