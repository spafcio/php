<?php

/**
 * Class inherits from RiseBackendFormProcessing and defines own inProcessForm
 * method for categories form processing.
 * 
 * @package		symfony
 * @subpackage	additional
 * @author		tomek
 * @see			lib/RiseBackendFormProcessing.class.php
 *
 */
class RiseBackendCategoryFormProcess extends RiseBackendFormProcessing
{
	
	/**
	 * (non-PHPdoc)
	 * @see lib/RiseBackendFormProcessing#inProcessForm()
	 * @return bool
	 */
	protected function inProcessForm(sfWebRequest $request, sfForm $form, $params = array())
	{
		parent::inProcessForm($request, $form, $params);
		
		$this->redirectRoute = 'rise_category';

		$rise_category = $this->riseObject;
		
		$riseCategoryFromRequest = $request->getParameter($form->getName());

		if(isset($riseCategoryFromRequest['rise_menu_id']) && isset($riseCategoryFromRequest['menu_generate']))
		{
			if(!Rise::generateAndSaveUrl($rise_category->getName(), new RiseMenuItem(), $riseCategoryFromRequest['rise_menu_id'], 'category_show', array('id' => $rise_category->getId(), 'slug' => $rise_category->getSlug())))
			{
				return false;
			}
		}
		
		return true;
	}
}