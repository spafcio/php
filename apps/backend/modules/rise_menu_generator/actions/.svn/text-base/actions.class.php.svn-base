<?php

/**
 * rise_menu_generator actions.
 *
 * @package    rise
 * @subpackage rise_menu_generator
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class rise_menu_generatorActions extends sfActions
{
	
	/**
	 * 
	 * @access	private
	 * @var		object		Instance of defined classes in configure method
	 */
	private $object;
	
	/**
	 * @access	private
	 * @var		string		Title of menu item
	 */
	private $itemTitle;
	
	/**
	 *	@access	private
	 *	@var	object or array		An array of parameters for the route
	 */
	private $routeParams = null;
	
	
	/**
	 * Generates link for selected model object defined in object_name 
	 * parameter from the request. 
	 * 
	 *	@access	public
	 *	@param	sfWebRequest $request
	 *	@return	void
	 */
	public function executeGenerate(sfWebRequest $request)
	{
		$this->success = false;
		$this->error = false;
		$route_name = $request->getParameter('route_name');
		
		if(!$this->configure($request->getParameter('object_name'), $request->getParameter('id')))
		{
			throw new sfException("Defined object_name param is wrong. Object for menu item generating don't exists.");
		}
		
		if($rise_menu_id = $request->getParameter('rise_menu_id'))
		{
			if(is_null($this->routeParams))
			{
				$this->routeParams = $this->object;
			}
			
			if(!$this->success = Rise::generateAndSaveUrl($this->itemTitle, new RiseMenuItem(), $rise_menu_id, $route_name, $this->routeParams))
			{
				$this->error = "Link do wybranej lokalizacji istnieje już w wybranym menu!";
			}
		}
		else
		{
			$this->error = "Nie dokonano wyboru nazwy menu!";
		}

	}

	/**
	 * Configures link which will be generated in this action.
	 * Method needs defined in switch instruction string $object_name.
	 * In case of string $object_name is not defined in switch, method
	 * will try to find object from model.
	 * 
	 * @access	public
	 * @param	string $object_name		Name of object for link generate
	 * @param	$pk						Object primary key value
	 * @return	void
	 */
	public function configure($object_name, $pk)
	{
		switch($object_name)
		{
			case 'article':
				
				$this->object = RiseArticlePeer::retrieveByPK($pk);
				$this->itemTitle = $this->object->getTitle();
				$this->routeParams = array('id' => $this->object->getId(), 'category_slug' => $this->object->getCategorySlug(), 'title_slug' => $this->object->getTitleSlug());
				
				break;
				
			case 'category':
				
				$this->object = RiseCategoryPeer::retrieveByPK($pk);
				$this->itemTitle = $this->object->getName();
				$this->routeParams = array('id' => $this->object->getId(), 'slug' => $this->object->getSlug());
				
				break;
			
			default:

				if(class_exists('Rise'.ucfirst(strtolower($object_name)).'Peer'))
				{
					eval('$this->object = Rise'.ucfirst(strtolower($object_name)).'Peer::retrieveByPK($pk);');
					
					if(method_exists($this->object, 'getTitle'))
					{
						
						$this->itemTitle = $this->object->getTitle();
					
					}
					
					else if(method_exists($this->object, 'getName'))
					{

						$this->itemTitle = $this->object->getTitle();
					
					}
					
					else if(method_exists($this->object, '__toString'))
					{

						$this->itemTitle = $this->object->__toString();
					
					}
					
					else
					{

						$this->itemTitle = 'Undefined title';
					
					}
					
					break;
				}
				
				return false;
		}
		
	}
	
}