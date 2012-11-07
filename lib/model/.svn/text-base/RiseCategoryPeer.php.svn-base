<?php

class RiseCategoryPeer extends BaseRiseCategoryPeer
{

	/**
	 * Gets all articles grouped in associative table by categories
	 * 
	 * @param $category
	 * @return array of RiseCategory objects
	 */
	static public function getWithCategories($categories = null)
	{
		$criteria = new Criteria();
		if(!is_null($categories))
		{
			if(!is_array($categories))
			{
				return self::getWithCategory($categories);
			}

			foreach($categories as $category)
			{
				$criteria->addOr(self::NAME, $category);
			}

			return self::prepare(array_reverse(self::doSelect($criteria)));
		}

		if(is_array(sfConfig::get('app_excepting_categories'))){
			foreach(sfConfig::get('app_excepting_categories') as $excepting)
			{
				$criteria->add(self::NAME, $excepting, Criteria::NOT_EQUAL);
			}
		}
		$criteria->addJoin(self::ID, RiseArticlePeer::CATEGORY_ID);
		$criteria->setDistinct();
		return self::prepare(self::doSelect($criteria));
	}
	
	/**
	 * Gets all articles of category defined in $category param
	 * @param string $category
	 * @return RiseArticle
	 */
	static public function getWithCategory($category)
	{
		$criteria = new Criteria();
		
		if(is_array($category))
		{
			$category = $category[0];
		}
		
		$criteria->add(self::NAME, $category);
		return self::doSelectOne($criteria);
	}

	/**
	 * Creates an associative array from propel doSelect results
	 * 
	 * @param array of RiseCategory objects $data
	 * @return array
	 */
	static private function prepare(array $data)
	{
		$ret = array();

		foreach($data as $row)
		{
			$ret[$row->getName()] = $row;
		}

		return array_merge($ret, $data);
	}

}