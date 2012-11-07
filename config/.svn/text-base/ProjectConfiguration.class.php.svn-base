<?php

require_once '/home/tomek/sfprojects/rise/lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

/**
 * @package symfony
 * @author tomek
 *
 */
class ProjectConfiguration extends sfProjectConfiguration
{
	/**
	 * (non-PHPdoc)
	 * @see lib/vendor/symfony/lib/config/sfProjectConfiguration#setup()
	 */
	public function setup()
	{
		// for compatibility / remove and enable only the plugins you want
		$this->enableAllPluginsExcept(array('sfDoctrinePlugin', 'sfCompat10Plugin'));
	}
}
