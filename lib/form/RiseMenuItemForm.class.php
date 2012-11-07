<?php

/**
 * RiseMenuItem form.
 *
 * @package    rise
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class RiseMenuItemForm extends BaseRiseMenuItemForm
{
	/**
	 * (non-PHPdoc)
	 * @see lib/vendor/symfony/lib/form/sfForm#configure()
	 */
	public function configure()
	{
		$this->widgetSchema['rel_choice'] = new sfWidgetFormSelectRadio(array('choices' => array('Artykuł', 'Kategoria')));
			
		$this->validatorSchema['rel_choice'] = new sfValidatorChoice(array('choices' => array('Artykuł', 'Kategoria')));
	}
}
