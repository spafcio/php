<?php

/**
 * category actions.
 *
 * @package    rise
 * @subpackage category
 * @author     kopix
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class categoryActions extends sfActions
{
	/**
	 * Executes index action
	 *
	 * @access	public
	 * @param	sfRequest $request A request object
	 */
	public function executeShow(sfWebRequest $request)
	{
		$this->menu = RiseMenuPeer::getAllMenus();
		$this->forward404Unless($this->menu);
		$this->category = $this->getRoute()->getObject();
		$articles = $this->category->getCategoryNews();
		$main = null;
		foreach($articles as $i => $article)
		{
			if($article->getIsMainOfCategory())
			{
				$main = $article;
				unset($articles[$i]);
				break;
			}
		}
		if($main) array_unshift($articles, $main);
		$this->mainArticle = $articles[0];
		unset($articles[0]);
		$this->articles = $articles;
	}
}