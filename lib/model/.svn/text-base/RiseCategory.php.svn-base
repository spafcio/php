<?php

class RiseCategory extends BaseRiseCategory
{

	public function __toString()
	{
		return $this->getName();
	}
	/**
	 * Returns a Criteria object for RiseArticle select
	 *
	 * @return Criteria
	 */
	private function getCriteriaForSelect()
	{
		$criteria = RiseArticlePeer::getArticleCriteria();
		$criteria->add(RiseArticlePeer::CATEGORY_ID, $this->getId());
		return $criteria;
	}

	/**
	 * Returns all RiseArticle objects for actually category 
	 *
	 * @return array of RiseArticle objects
	 */
	public function getAll()
	{
		$criteria = $this->getCriteriaForSelect();
		return RiseArticlePeer::doSelect($criteria);
	}

	/**
	 * Returns an array of RiseArticle objects with true/false is_news field 
	 *
	 * @param	int $limit
	 * @param	bool $news
	 * @return	array of RiseArticle objects
	 */
	public function getArticles($limit = 5, $news = false)
	{
		$criteria = $this->getCriteriaForSelect();
		$criteria->add(RiseArticlePeer::IS_NEWS, $news);
		$criteria->setLimit($limit);
		return RiseArticlePeer::doSelectJoinRiseCategory($criteria);
	}

	/**
	 * Returns an array of RiseArticle objects with false is_news field 
	 *
	 * @param int $limit
	 * @return array of Article objects marked as News
	 */
	public function getNews($limit = 5)
	{
		return $this->getArticles($limit, true);
	}

	/**
	 * Returns prepared Criteria object depends on array $params param.
	 * 
	 * That array can has max 3 fields which have bool value:
	 * 		-IS_NEWS				retrieve only articles with is_news (bool)value field
	 * 		-IS_MAIN_OF_CATEGORY	retrieve only articles with is_main_of_category (bool)value field
	 * 		-IS_MAIN_OF_DAY			retrieve only articles with is_main_of_day (bool)value field
	 * If it's no fields Criteria object won't define any conditionals and retrieve all RiseArticle objects.
	 * 
	 * 
	 * @param	array $params
	 * @return	Criteria object
	 */
	public function getCategoryCriteria($params = array())
	{
		if(!count($params))
		{
			$params = array('IS_NEWS' => true, 'IS_MAIN_OF_CATEGORY' => false, 'IS_MAIN_OF_DAY' => false);
		}
		
		$criteria = $this->getCriteriaForSelect();

		isset($params['IS_NEWS']) ? $criteria->add(RiseArticlePeer::IS_NEWS, $params['IS_NEWS']) : null;
		isset($params['IS_MAIN_OF_CATEGORY']) ? $criteria->add(RiseArticlePeer::IS_MAIN_OF_CATEGORY, $params['IS_MAIN_OF_CATEGORY']) : null;
		isset($params['IS_MAIN_OF_DAY']) ? $criteria->add(RiseArticlePeer::IS_MAIN_OF_DAY, $params['IS_MAIN_OF_DAY']) : null;
		
		return $criteria;
	}

	/**
	 * Returns an array of RiseArticle objects with is_news true field
	 *
	 * @return array of RiseArticle objects
	 */
	public function getCategoryNews()
	{
		return RiseArticlePeer::doSelect($this->getCategoryCriteria(array('IS_NEWS' => true)));
	}

}