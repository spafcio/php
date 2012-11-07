<?php

class RiseAffiliate extends BaseRiseAffiliate
{
	
	public function __toString()
	{
		return $this->getToken();
	}
}
