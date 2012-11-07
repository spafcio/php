<?php

class RiseArticle extends BaseRiseArticle
{

	/**
	 *
	 * @return string	string which is returned if someone use echo/print/sprintf function on object
	 */
	public function __toString()
	{
		sfProjectConfiguration::getActive()->loadHelpers('Text');
		return truncate_text($this->getTitle(), 30, '...', true);
	}

	/**
	 * Get the value of the [name] field of article category
	 *
	 * @return string
	 */
	public function getCategoryName()
	{
		return $this->getRiseCategory()->getName();
	}

	/**
	 * Get the value of the [slug] field of article category
	 *
	 * @return string
	 */
	public function getCategorySlug()
	{
		return $this->getRiseCategory()->getSlug();

	}

	/**
	 * Get the slugged value of the [title] field of article category
	 *
	 * @return string
	 */
	public function getTitleSlug()
	{
		return Rise::slugify($this->getTitle());
	}


	/**
	 * Publish/unpublish article
	 *
	 * @param	bool $option	If set to false article will be unpublished
	 * @return	void
	 */
	public function publish($option = true)
	{
		$this->setIsPublic($option);
		$this->save();
	}


	/**
	 * Saves current RiseArticle object.
	 *
	 *
	 * @see lib/model/om/BaseRiseArticle#save()
	 */
	public function save(PropelPDO $con = null)
	{
		if($this->isNew() || !$this->getToken())
		{
			$this->setToken(md5(uniqid().rand(1111,9999)));
		}
		if($this->getIsMainOfCategory() && $this->getIsMainOfDay())
		{
			$this->setIsMainOfCategory(false);
			$this->setIsMainOfDay(false);
		}

		if($this->getIsMainOfDay())
		{
			$criteria = new Criteria();
			$criteria->add(RiseArticlePeer::IS_MAIN_OF_DAY, true);
				
			$results = RiseArticlePeer::doSelect($criteria);
				
			if(is_array($results))
			{
				foreach($results as $result)
				{
					$result->setIsMainOfDay(false);
				}
			}
		}

		parent::save($con);
	}


	/**
	 * Deletes current RiseArticle object.
	 * 
	 * @see lib/model/om/BaseRiseArticle#delete()
	 */
	public function delete(PropelPDO $con = null)
	{
		$index = RiseArticlePeer::getLuceneIndex();

		foreach ($index->find('pk:'.$this->getId()) as $hit)
		{
			$index->delete($hit->id);
		}

		return parent::delete($con);
	}
	
	
	/**
	 * Updates index of LuceneSearch.
	 * 
	 * @return void
	 */
	public function updateLuceneIndex()
	{
		
		$index = RiseArticlePeer::getLuceneIndex();

		// remove existing entries
		foreach ($index->find('pk:'.$this->getId()) as $hit)
		{
			$index->delete($hit->id);
		}

		// don't index expired and non-activated jobs
		if (!$this->getIsPublic() || $this->getIsIntrash())
		{
			return;
		}

		$doc = new Zend_Search_Lucene_Document();

		// store article primary key to identify it in the search results
		$doc->addField(Zend_Search_Lucene_Field::Keyword('pk', $this->getId()));

		// index article fields
		$doc->addField(Zend_Search_Lucene_Field::UnStored('title', $this->getTitle(), 'utf-8'));
		$doc->addField(Zend_Search_Lucene_Field::UnStored('content', $this->getContent(), 'utf-8'));
		$doc->addField(Zend_Search_Lucene_Field::UnStored('root', $this->getRoot(), 'utf-8'));
		$doc->addField(Zend_Search_Lucene_Field::UnStored('short_content', $this->getShort(), 'utf-8'));

		// add article to the index
		$index->addDocument($doc);
		$index->commit();
	}
	

	/**
	 * Returns peer of RiseComment objects related to current article
	 *
	 * @param	int $limit
	 * @return	array of RiseComment
	 */
	public function getComments($limit = 5)
	{
		$criteria = new Criteria();
		$criteria->addDescendingOrderByColumn(RiseCommentPeer::CREATED_AT);
		$criteria->add(RiseCommentPeer::ARTICLE_ID, $this->getId());
		$criteria->add(RiseCommentPeer::IS_PUBLIC, true);

		return RiseCommentPeer::doSelect($criteria);
	}

	/**
	 * Returns a comment with concrete token.
	 *
	 * @param	string $token
	 * @return	RiseComment
	 */
	public function getCommentByToken($token)
	{
		$criteria = $this->getCommentsCriteria();
		$criteria->add(RiseCommentPeer::TOKEN, $token);
		$criteria->add(RiseCommentPeer::IS_PUBLIC, false);
		return RiseCommentPeer::doSelectOne($criteria);
	}

	/**
	 * Returns prepared Criteria object for select comments related to this article.
	 * 
	 * @return Criteria
	 */
	private function getCommentsCriteria()
	{
		$criteria = new Criteria();
		$criteria->addDescendingOrderByColumn(RiseCommentPeer::CREATED_AT);
		$criteria->add(RiseCommentPeer::ARTICLE_ID, $this->getId());
		$criteria->add(RiseCommentPeer::IS_PUBLIC, true);

		return $criteria;
	}
	
	/**
	 * Counts number of comments and returns it.
	 * 
	 * @return int
	 */
	public function countComments()
	{
		return RiseCommentPeer::doCount($this->getCommentsCriteria());
	}
	
}