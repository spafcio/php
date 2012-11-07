<?php

/**
 * RiseMenuItem form base class.
 *
 * @package    rise
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRiseMenuItemForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'menu_id'     => new sfWidgetFormPropelChoice(array('model' => 'RiseMenu', 'add_empty' => false)),
      'order'       => new sfWidgetFormInput(),
      'title'       => new sfWidgetFormInput(),
      'url'         => new sfWidgetFormInput(),
      'article_id'  => new sfWidgetFormPropelChoice(array('model' => 'RiseArticle', 'add_empty' => true)),
      'category_id' => new sfWidgetFormPropelChoice(array('model' => 'RiseCategory', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'RiseMenuItem', 'column' => 'id', 'required' => false)),
      'menu_id'     => new sfValidatorPropelChoice(array('model' => 'RiseMenu', 'column' => 'id')),
      'order'       => new sfValidatorInteger(array('required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'url'         => new sfValidatorString(array('max_length' => 255)),
      'article_id'  => new sfValidatorPropelChoice(array('model' => 'RiseArticle', 'column' => 'id', 'required' => false)),
      'category_id' => new sfValidatorPropelChoice(array('model' => 'RiseCategory', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rise_menu_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RiseMenuItem';
  }


}
