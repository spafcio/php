<?php

class RiseMenuItem extends BaseRiseMenuItem
{

	/**
	 * Moves up RiseMenuItem in order
	 * 
	 * @return void
	 */
	public function moveUp()
	{
		return $this->move('up');
	}

	/**
	 * Moves down RiseMenuItem in order
	 * 
	 * @return void
	 */
	public function moveDown()
	{
		return $this->move('down');
	}

	
	/**
	 * Moves up/down RiseMenuItem in order
	 * 
	 * @param	string $direction	'up' or 'down' defines moving direction
	 * @param	int $place			Concrete numeric place in RiseMenuItems order	
	 * @return 	bool				If moving executes succesfully method returns true
	 */
	public function move($direction = null, $place = null)
	{
		if($this->getOrder() && !$this->isNew())
		{
			switch ($direction)
			{
				case 'up':
					$place = $this->getOrder()-1;
					break;

				case 'down':
					$place = $this->getOrder()+1;
					break;

				default:
					if(!$place)
					{
						return false;
					}
			}


			$criteria = RiseMenuItemPeer::getAllMenuItemsCriteria($this->getMenuId());
			$criteria->add(RiseMenuItemPeer::ORDER, $place);

			$menu_item = RiseMenuItemPeer::doSelectOne($criteria);

			if($menu_item)
			{
				$order = $this->getOrder();
				$this->setOrder($menu_item->getOrder());
				$menu_item->setOrder(($order));

				$this->save();
				$menu_item->save();
				return true;
			}

			return false;
		}

	}

	/**
	 * Retrieves RiseMenuItem objects for this category in specific order. 
	 * 
	 * @return array of RiseMenuItem objects
	 */
	private function getMenuItemPeerForGenerateResults()
	{
		$criteria = RiseMenuItemPeer::getAllMenuItemsCriteria($this->getMenuId());
		$criteria->clearOrderByColumns();
		$criteria->addAscendingOrderByColumn(RiseMenuItemPeer::ORDER);
		return RiseMenuItemPeer::doSelect($criteria);
	}

	/**
	 * Deletes object maintaining order in other objects
	 * 
	 * @see lib/model/om/BaseRiseMenuItem#delete()
	 */
	public function delete(PropelPDO $con = null)
	{
		$results = $this->getMenuItemPeerForGenerateResults();

		foreach($results as $i => $result)
		{
			if($result->getId() == $this->getId())
			{
				unset($results[$i]);
			}
		}
		
		sort($results);
			
		$this->reorder($results);
			
		parent::delete($con);
	}

	/**
	 * Reorders all RiseMenuItem objects
	 * 
	 * @param array $results
	 * @return void
	 */
	public function reorder($results = null)
	{
		if(is_null($results))
		{
			$results = $this->getMenuItemPeerForGenerateResults();
		}

		foreach($results as $i => $result)
		{
			$result->setOrder($i+1);
			$result->save();
		}
	}

	/**
	 * (non-PHPdoc)
	 * @see lib/model/om/BaseRiseMenuItem#save()
	 */
	public function save(PropelPDO $con = null)
	{
		if(is_null($this->getOrder()) && $this->getMenuId())
		{
			$results = $this->getMenuItemPeerForGenerateResults();

			if(!count($results))
			{
				$this->setOrder(1);
			}
			else
			{
				$this->reorder($results);

				$this->setOrder($results[count($results)-1]->getOrder()+1);
			}
		}

		parent::save($con);
	}
}