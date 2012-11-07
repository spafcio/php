<?php

/**
 * RiseComment form.
 *
 * @package    rise
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class RiseCommentForm extends BaseRiseCommentForm
{

	/**
	 * Removes redundant fields
	 * 
	 * @access protected
	 * @return void
	 */
	protected function removeFields()
	{
		unset($this['created_at'], $this['token'], $this['is_public']);
		$this->widgetSchema['article_id'] = new sfWidgetFormInputHidden();
	}

	/**
	 * (non-PHPdoc)
	 * @see lib/vendor/symfony/lib/form/sfForm#configure()
	 */
	public function configure()
	{
		$this->removeFields();
		$this->validatorSchema['email'] = new sfValidatorEmail();

	}
}