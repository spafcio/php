<?php

/**
 * article actions.
 *
 * @package    rise
 * @subpackage article
 * @author     kopix
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class articleActions extends sfActions
{
	/**
	 *  constructor for Article actions
	 *  
	 * @access	public 
	 * @param	$context
	 * @param	$moduleName
	 * @param	$actionName
	 * @return	void
	 */
	public function __construct($context, $moduleName, $actionName)
	{
		parent::__construct($context, $moduleName, $actionName);

		if(sfConfig::get('app_always_read_menu', true)) $this->menu = RiseMenuPeer::getAllMenus();
	}

	/**
	 * Executes index action
	 *
	 * @access	public
	 * @param	sfRequest $request A request object
	 */
	public function executeIndex(sfWebRequest $request)
	{
		$category = RiseCategoryPeer::getWithCategory(sfConfig::get('app_main_category'));

		$this->pager = Rise::getPager($request, $category);
				
		$this->main_of_day = $this->getMainArticleOfDay();
	}

	/**
	 * Executes show action
	 *
	 * @access	public
	 * @param	sfRequest $request A request object
	 */
	public function executeShow(sfWebRequest $request)
	{
		$this->article = $this->getRoute()->getObject();

		$this->userToken = $this->getUser()->getAttribute('comment_token');

		if($this->article->getIsNews()) $behaviourForNews = true;

		$this->forward404Unless($this->article);

		$this->form = new RiseCommentForm();

		$this->form->setDefault('article_id', $this->article->getId());

	}

	/**
	 * Returns associative array 
	 * of all (excepting categories defined in app.yml) RiseCategory objects
	 * 
	 * @access	private
	 * @return	array of RiseCategory objects
	 */
	private function getAllArticlesByCategories()
	{
		return RiseCategoryPeer::getWithCategories();
	}

	/**
	 * Returns the main of day article
	 * 
	 * @access	private
	 * @return	RiseArticle object with main_of_day true option
	 */
	private function getMainCategoryNews()
	{
		return RiseArticlePeer::getMainArticle(RiseArticlePeer::MAIN_OF_NEWS_ONLY, RiseArticlePeer::MAIN_OF_NEWS_ONLY);
	}

	/**
	 * Returns array of main of category articles
	 * 
	 * @access	private
	 * @return	array of RiseArticle objects with main_of_category true option
	 */
	private function getMainArticleOfDay()
	{
		return RiseArticlePeer::getMainArticle(RiseArticlePeer::MAIN_OF_DAY_ONLY);
	}

	/**
	 * Initializes jquery(or in case of turned off javascript php-html) bookmarks system.
	 * On the main page is showed main article with list of main of category articles
	 * and bookmarks with category names above 
	 * 
	 * @return void
	 */
	private function createBookmarks()
	{
		//!TODO Sprawić by system zakładek był bardziej konfigurowalny xD
		
		$this->active_bookmark = sfConfig::get('app_message_of_day_name');
		
		$bookmarks[] = array('title' => sfConfig::get('app_message_of_day_name'), 'href' => $this->generateUrl('homepage'));
		$main_section[] = array('main' => $this->getMainArticleOfDay(), 'list' => $this->getMainCategoryNews(), 'active' => true);

		$categories = $this->getMainCategoryNews();
		
		foreach($categories as $article)
		{
			$main_section[] = array('main' => $article, 'list' => $categories[$article->getCategoryName()]->getNews(sfConfig::get('app_main_news_num')), 'active' => false);

			$bookmarks[] = array('title' => $article->getCategoryName(), 'route' =>  $categories[$article->getCategoryName()], 'href' => $this->generateUrl('nojs_news_show', array('nojs_news' => $article->getCategorySlug())));

		}

		if($this->getRequest()->getParameter('nojs_news'))
		{
			foreach($main_section as $i => $article)
			{
				$main_section[$i]['active'] = false;
				if($article['main']->getCategorySlug() == $this->getRequest()->getParameter('nojs_news'))
				{
					$this->activeBookmark = $article['main']->getCategoryName();
					$main_section[$i]['active'] = true;
					break;
				}
			}
		}
		
		$this->main_section = $main_section;
		$this->bookmarks = $bookmarks;

	}

}