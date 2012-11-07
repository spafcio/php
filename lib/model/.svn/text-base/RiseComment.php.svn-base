<?php

class RiseComment extends BaseRiseComment
{
	public function getCategorySlug()
	{
		return $this->getRiseArticle()->getCategorySlug();
	}
	
	public function getTitleSlug()
	{
		return $this->getRiseArticle()->getTitleSlug();
	}
		
	public function getTitle()
	{
		return $this->getRiseArticle()->getTitle();
	}
	
	public function save(PropelPDO $con = null)
	{
		if(!$this->getToken())
		{
			$this->setToken(md5(rand(1111,9999).uniqid()));
		}
		
		parent::save($con);
	}
}