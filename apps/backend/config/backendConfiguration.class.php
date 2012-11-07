<?php
/**
 * backend configuration
 *
 * @package    rise
 * @subpackage config
 * @author     kopix
 */
class backendConfiguration extends sfApplicationConfiguration
{
	
	/**
	 * An instance of frontend app sfPatternRouting class.
	 * 
	 * @access 	protected
	 * @var		sfPatternRouting
	 */
	protected $frontendRouting = null;

	/**
	 * Generates full frontend url 
	 * 
	 * @access	public
	 * @param	string $name	Name of the route
	 * @param	array $params	Route params
	 * @return  string			Url generated from frontend route defined in routing.yml
	 */
	public function generateFrontendUrl($name, $params = array())
	{
		return 'http://'.$_SERVER['SERVER_NAME'].((sfConfig::get('sf_environment') == 'dev') ? '/frontend_dev.php' : null).$this->getFrontendRouting()->generate($name, $params);
	}

	/**
	 * Returns frontend sfPatternRouting class instance 
	 * 
	 * @access  public
	 * @return	sfPatternRouting
	 */
	public function getFrontendRouting()
	{
		if(!$this->frontendRouting)
		{
			$this->frontendRouting = new sfPatternRouting(new sfEventDispatcher());
			$config = new sfRoutingConfigHandler();
			$routes = $config->evaluate(array(sfConfig::get('sf_apps_dir').'/frontend/config/routing.yml'));
			$this->frontendRouting->setRoutes($routes);
		}
		
		return $this->frontendRouting;
	}

	/**
	 * (non-PHPdoc)
	 * @see lib/vendor/symfony/lib/config/sfApplicationConfiguration#configure()
	 */
	public function configure()
	{		
	}
}