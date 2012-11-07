<?php

/**
 * RiseCategory form.
 *
 * @package    rise
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class RiseCategoryForm extends BaseRiseCategoryForm
{
	/**
	 * (non-PHPdoc)
	 * @see lib/vendor/symfony/lib/form/sfForm#configure()
	 */
	public function configure()
	{
		$this->widgetSchema['menu_generate'] = new sfWidgetFormInputCheckbox();
		$this->widgetSchema['rise_menu_id'] = new sfWidgetFormPropelChoice(array('add_empty' => '', 'model' => 'RiseMenu'));
		$this->validatorSchema['rise_menu_id'] = new sfValidatorPropelChoice(array('model' => 'RiseMenu', 'column' => 'id', 'required' => false));
		$this->validatorSchema['menu_generate'] = new sfValidatorBoolean();
	}
}
