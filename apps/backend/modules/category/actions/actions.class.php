<?php
require_once dirname(__FILE__).'/../lib/categoryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/categoryGeneratorHelper.class.php';

/**
 * category actions.
 *
 * @package    rise
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class categoryActions extends autoCategoryActions
{
	/**
	 *  Method using in RiseFormProcess classes. Returns the dispatcher.
	 *	@access	public
	 *  @return	sfEventDispatcher
	 */
	public function getDispatcher()
	{
		return $this->dispatcher;
	}
	
	/**
	 * Implements risecms own form processing
	 * 
	 * @access	protected
	 * @param	sfWebRequest $request instance of sfWebRequest object
	 * @param	sfForm $form instace of sfForm object
	 * 
	 * @see	cache/backend/dev/modules/autoCategory/actions/autoCategoryActions#processForm()
	 */
	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$rise_backend_form_process = new RiseBackendCategoryFormProcess($this);
		$rise_backend_form_process->processForm($request, $form);
	}
}