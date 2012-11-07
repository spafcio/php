<?php

/**
 * RiseMenu form base class.
 *
 * @package    rise
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRiseMenuForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInput(),
      'title'        => new sfWidgetFormInput(),
      'is_activated' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'RiseMenu', 'column' => 'id', 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 255)),
      'title'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'is_activated' => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setNameFormat('rise_menu[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RiseMenu';
  }


}
