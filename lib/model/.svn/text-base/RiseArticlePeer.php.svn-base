<?php

class RiseArticlePeer extends BaseRiseArticlePeer
{
	/**
	 * Defines main article constant
	 * 
	 * @var int
	 */
	const MAIN_OF_DAY_ONLY = 1;

	/**
	 * Defines main articles for category constant
	 * 
	 * @var int
	 */
	const MAIN_OF_NEWS_ONLY = 2;

	/**
	 * Defines both (main article and main articles for category)
	 * 
	 * @var int
	 */
	const MAIN_ALL = 3;


	/**
	 * 
	 * @var bool
	 */
	private static $limitedByCategories = false;

	/**
	 * Stores array of RiseArticle objects with main_of_news true field
	 * 
	 * @var bool/array of RiseArticle
	 */
	private static $main_category_news = false;

	/**
	 * Stores RiseArticle object with main_of_day true field
	 * 
	 * @var bool/RiseArticle
	 */
	private static $main_article_of_day = false;

	/**
	 *
	 * @param	Criteria $criteria 		A propel Criteria object
	 * @return	Criteria				A prepared propel Criteria object to select RiseArticle objects
	 */
	public static function getArticleCriteria(Criteria $criteria = null)
	{
		if(is_null($criteria))
		{
			$criteria = new Criteria();
		}
		$criteria->add(self::IS_PUBLIC, true);
		$criteria->add(self::IS_INTRASH, false);
		$criteria->addAscendingOrderByColumn(self::CREATED_AT);
		return $criteria;
	}


	/**
	 * Returns an array of RiseArticle objects with true main_of_news field
	 *
	 * @param	$level					Level for categorize article hierarchy
	 * @return	array of RiseArticle
	 */
	private static function getMainOfNews($criteria, $limit)
	{
		if(!self::$main_category_news)
		{
			$criteria->add(self::IS_MAIN_OF_DAY, false);
			$criteria->add(self::IS_MAIN_OF_CATEGORY, true);
			if(self::$limitedByCategories)
			{
				$criteria->setLimit($limit);
				return self::doSelectJoinRiseCategory($criteria);
			}
			self::$main_category_news = self::limitMainOfCategory(self::doSelectJoinRiseCategory($criteria), $limit);
		}
		
		return self::$main_category_news;
	}

	/**
	 * Returns a RiseArticle object with true main_of_day field
	 * 
	 * @param	Criteria $criteria
	 * @return	RiseArticle
	 */
	private static function getMainOfDay($criteria)
	{
		if(!self::$main_article_of_day)
		{
			$criteria->add(self::IS_MAIN_OF_CATEGORY, false);
			$criteria->add(self::IS_MAIN_OF_DAY, true);
			$criteria->setLimit(1);
			$result = self::doSelectJoinRiseCategory($criteria);
			self::$main_article_of_day = $result[0] ? $result[0] : null;
		}

		return self::$main_article_of_day;
	}

	/**
	 * Additionaly limits peer of RiseArticle objects with true main_of_category field
	 * 
	 * @param	array of RiseArticle objects $results
	 * @param	int $limit
	 * @return	limited array of RiseArticle objects
	 */
	private static function limitMainOfCategory($results, $limit)
	{
		$categoryStack = array();

		foreach($results as $i => $result)
		{
			if(!in_array($result->getCategoryId(), $categoryStack))
			{
				$categoryStack[] = $result->getCategoryId();
			}
			else
			{
				unset($results[$i]);
			}
		}

		if(count($results) > $limit) $results = array_slice($results, 0, $limit);

		return $results;
	}

	/**
	 * Returns a result of one or both private static methods defined before
	 * In case of level = MAIN_ALL the main article will be connected 
	 * with main category articles and locate at the begining
	 * (first element of the array). If level = MAIN_OF_NEWS or MAIN_OF_DAY method
	 * returns only results of getMainOfNews or getMainOfDay method.
	 * 
	 * @param	$level
	 * @param	int $limit
	 * @param	array $categories
	 * @return	array of RiseArticle objects or one RiseArticle object
	 */
	public static function getMainArticle($level = self::MAIN_ALL, $limit = 1, $categories = array())
	{
		if(!is_integer($limit) || $limit <= 0) return null;

		$criteria = self::getArticleCriteria();
//		$criteria->add(self::IS_NEWS, true);

		if(count($categories) && $level != self::MAIN_OF_DAY_ONLY)
		{
			$limit = $limit * count($categories);
			self::$limitedByCategories = true;
		}

		if($level == self::MAIN_OF_DAY_ONLY)
		{
			return self::getMainOfDay($criteria);
		}
		elseif($level == self::MAIN_OF_NEWS_ONLY)
		{
			return self::getMainOfNews($criteria, $limit);
		}

		$results = self::getMainOfNews($criteria, $limit);

		$mainOfDay = self::getMainOfDay($criteria);
		$mainOfDay->getRiseCategory()->setName(sfConfig::get('app_message_of_day_name'));
		$mainOfDay->getRiseCategory()->setSlug(Rise::slugify(sfConfig::get('app_message_of_day_name')));

		array_unshift($results, $mainOfDay);

		return $results;
	}
	
}