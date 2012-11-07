<?php

/**
 * comment actions.
 *
 * @package    rise
 * @subpackage comment
 * @author     kopix
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class commentActions extends sfActions
{

	/**
	 * Executes index action
	 * 
	 * @param sfWebRequest $request
	 * @return void
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$this->rise_comment_list = RiseCommentPeer::doSelect(new Criteria());

	}

	/**
	 * Executes show action
	 * 
	 * @param sfWebRequest $request
	 * @return void
	 */
	public function executeShow(sfWebRequest $request)
	{
		$this->rise_comment = RiseCommentPeer::retrieveByPk($request->getParameter('id'));
		$this->forward404Unless($this->rise_comment);
	}

	/**
	 * Executes new action
	 * 
	 * @param sfWebRequest $request
	 * @return void
	 */
	public function executeNew(sfWebRequest $request)
	{
		$this->form = new RiseCommentForm();

		$this->form->setDefault('article_id', $request->getParameter('id'));

		$this->forward404();

	}

	/**
	 * Executes create action.
	 * 
	 * @param sfWebRequest $request
	 * @return void
	 */
	public function executeCreate(sfWebRequest $request)
	{
		$this->forward404Unless($request->isMethod('post'));

		$this->form = new RiseCommentForm();

		$this->processForm($request, $this->form);

	}

	/**
	 * Executes delete action.
	 * Only comment owner can delete comment.
	 * 
	 * @param sfWebRequest $request
	 * @return void
	 */
	public function executeDelete(sfWebRequest $request)
	{

		$this->forward404Unless($rise_comment = RiseCommentPeer::retrieveByPk($request->getParameter('id')), sprintf('Object rise_comment does not exist (%s).', $request->getParameter('id')));

		$generatedUrl = $this->generateUrl('article_show', array('id' => $rise_comment->getArticleId(), 'category_slug' => $rise_comment->getCategorySlug(), 'title_slug' => $rise_comment->getTitleSlug()));

		if($this->getUser()->getAttribute('comment_token') == $rise_comment->getToken())
		{
			$rise_comment->delete();
		}
		else
		{
			$this->forward404('Błąd autoryzacji właściciela komentarza. Sprawdź czy masz włączoną obsługe cookies, jeżeli błąd pojawia się nadal skontaktuj się z administratorem.');
		}
		
		if($request->isXmlHttpRequest())
		{
			return $this->renderText('Komentarz usunięty pomyślnie!');
		}

		$this->redirect($generatedUrl);
	}

	/**
	 * Rebuilded processForm method, which can check comment owner and
	 * render no-moderated comment.
	 * 
	 * Method handle CRUD processes related to comments.
	 * 
	 * @param sfWebRequest $request
	 * @param sfForm $form
	 * @return void
	 */
	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

		if ($form->isValid())
		{

			$this->rise_comment = $rise_comment = $form->save();

			$this->getUser()->setAttribute('comment_token', $rise_comment->getToken());

			if($request->isXmlHttpRequest())
			{
				return $this->renderPartial('comment/no-moderated', array(
				'article' => $this->article = RiseArticlePeer::retrieveByPK($rise_comment->getArticleId()),
				'userToken' => $this->userToken = $this->getUser()->getAttribute('comment_token')
				));
			}
			
			$notice = 'Komentarz dodany pomyślnie. Po przejściu przez proces moderacji pojawi się na stronie.';

			$this->getUser()->setFlash('notice', $notice);
				
			$this->redirect($this->generateUrl('article_show', array('id' => $rise_comment->getArticleId(), 'category_slug' => $rise_comment->getCategorySlug(), 'title_slug' => $rise_comment->getTitleSlug())));

		}
		else
		{

			$rise_comment = $request->getParameter('rise_comment');

			$rise_article = RiseArticlePeer::retrieveByPK($rise_comment['article_id']);

			$request->setParameter('from_comment_article_id', $rise_comment['article_id']);

			$request->setParameter('comment_form', $form);

			if($request->isXmlHttpRequest())
			{
				return $this->renderText('ERROR!');
			}
			$this->forward('article', 'show');

		}

	}
}