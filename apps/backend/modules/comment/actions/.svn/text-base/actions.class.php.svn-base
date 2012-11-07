<?php

require_once dirname(__FILE__).'/../lib/commentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/commentGeneratorHelper.class.php';

/**
 * comment actions.
 *
 * @package    rise
 * @subpackage comment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class commentActions extends autoCommentActions
{

	/**
	 * Batch publish/unpublish selected comments
	 * 
	 * @access	public
	 * @param	sfWebRequest $request 	Instance of sfWebRequest class
	 * @param	bool $unpublish			If value is true comments will be unpublished 
	 * 
	 * @return	void
	 */
	public function executeBatchPublish(sfWebRequest $request, $unpublish = false)
	{
		$comments = RiseCommentPeer::retrieveByPKs($request->getParameter('ids'));
		foreach($comments as $comment)
		{
			$comment->publish(!$unpublish);
		}
		$this->redirect('@rise_comment');
	}

	/**
	 * Runs executeBatchPublish method with false $unpublish parameter
	 * 
	 * @access	public
	 * @param	sfWebRequest $request
	 * @return	void
	 */
	public function executeBatchUnpublish(sfWebRequest $request)
	{
		$this->executeBatchPublish($request, false);
	}
	
	/**
	 * Runs executeListPublish method with false $unpublish parameter
	 * 
	 * @access	public
	 * @param	sfWebRequest $request
	 * @return	void
	 */
	public function executeListUnpublish(sfWebRequest $request)
	{
		$this->executeListPublish($request, false);
	}
	
	
	/**
	 * Batch publish/unpublish selected comment
	 *
	 * @access	public
	 * @param	sfWebRequest $request 	Instance of sfWebRequest class
	 * @param	bool $unpublish			If value is true comment will be unpublished
	 *
	 * @return	void
	 */
	public function executeListPublish(sfWebRequest $request, $unpublish = false)
	{
		$comment = RiseCommentPeer::retrieveByPK($request->getParameter('id'));
		$comment->publish(!$unpublish);
		$this->redirect('@rise_comment');
	}

}