<?php

/**
 * Class inherits from RiseBackendFormProcessing and defines own inProcessForm
 * method for articles form processing.
 * 
 * @package		symfony
 * @subpackage	additional
 * @author		tomek
 * @see			lib/RiseBackendFormProcessing.class.php
 *
 */
class RiseBackendArticleFormProcess extends RiseBackendFormProcessing
{
	/**
	 * (non-PHPdoc)
	 * @see lib/RiseBackendFormProcessing#inProcessForm()
	 * @return bool
	 */
	protected function inProcessForm(sfWebRequest $request, sfForm $form, $params = array())
	{
		parent::inProcessForm($request, $form, $params);

		$this->redirectRoute = 'rise_article';

		$rise_article = $this->riseObject;

		$riseArticleFromRequest = $request->getParameter($form->getName());

		if(isset($riseArticleFromRequest['rise_menu_id']) && isset($riseArticleFromRequest['menu_generate']))
		{
			if(!Rise::generateAndSaveUrl($rise_article->getTitle(), new RiseMenuItem(), $riseArticleFromRequest['rise_menu_id'], 'article_show', array('id' => $rise_article->getId(), 'category_slug' => $rise_article->getCategorySlug(), 'title_slug' => $rise_article->getTitleSlug())))
			{
				return false;
			}
		}

		return true;
	}
}