<?php

require_once dirname(__FILE__).'/../lib/articleGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/articleGeneratorHelper.class.php';

/**
 * article actions.
 *
 * @package    rise
 * @subpackage article
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class articleActions extends autoArticleActions
{

	/**
	 *  Method using in RiseFormProcess classes. Returns the dispatcher.
	 *  
	 *  @access		public
	 *  @return		sfEventDispatcher
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
	 * @see	cache/backend/dev/modules/autoArticle/actions/autoArticleActions#processForm()
	 */
	protected function processForm(sfWebRequest $request, sfForm $form)
	{

		$rise_backend_form_process = new RiseBackendArticleFormProcess($this);

		$rise_backend_form_process->processForm($request, $form);

	}


	/**
	 * Batch publish/unpublish selected articles
	 * 
	 * @access	public
	 * @param	sfWebRequest $request 	Instance of sfWebRequest class
	 * @param	bool $unpublish			If value is true articles will be unpublished 
	 * @return	void
	 */
	public function executeBatchPublish(sfWebRequest $request, $unpublish = false)
	{
		$ids = $request->getParameter('ids');

		$articles = RiseArticlePeer::retrieveByPKs($ids);

		foreach($articles as $article)
		{
			$article->publish(!$unpublish);
		}

		$this->getUser()->setFlash('notice', 'Articles have been updated successfully,');

		$this->redirect('@rise_article');
	}

	/**
	 * Runs executeBatchPublish method with false $unpublish parameter
	 * 
	 * @access	public
	 * @param	sfWebRequest $request instance of sfWebRequest object
	 * @return	void
	 */
	public function executeBatchUnpublish(sfWebRequest $request)
	{
		$this->executeBatchPublish($request, true);
	}

	/**
	 * Publish/unpublish selected article
	 * 
	 * @access	public
	 * @param	sfWebRequest $request
	 * @param	bool $unpublish			If value is true article will be unpublished
	 * @return	void
	 */
	public function executeListPublish(sfWebRequest $request, $unpublish = false)
	{
		$article = RiseArticlePeer::retrieveByPK($request->getParameter('id'));
		$article->publish(!$unpublish);
		$this->redirect('@rise_article');
	}

	/**
	 * Runs executeListPublish method with false $unpublish parameter
	 * 
	 * @param	sfWebRequest $request
	 * @return	void
	 */
	public function executeListUnpublish(sfWebRequest $request)
	{
		$this->executeListPublish($request, true);
	}

}