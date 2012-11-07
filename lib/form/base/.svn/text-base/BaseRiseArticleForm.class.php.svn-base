<?php

/**
 * RiseArticle form base class.
 *
 * @package    rise
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRiseArticleForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                  => new sfWidgetFormInputHidden(),
      'category_id'         => new sfWidgetFormPropelChoice(array('model' => 'RiseCategory', 'add_empty' => false)),
      'title'               => new sfWidgetFormInput(),
      'image'               => new sfWidgetFormInput(),
      'short'               => new sfWidgetFormInput(),
      'content'             => new sfWidgetFormTextarea(),
      'author'              => new sfWidgetFormInput(),
      'is_main_of_category' => new sfWidgetFormInputCheckbox(),
      'is_main_of_day'      => new sfWidgetFormInputCheckbox(),
      'is_news'             => new sfWidgetFormInputCheckbox(),
      'is_public'           => new sfWidgetFormInputCheckbox(),
      'is_intrash'          => new sfWidgetFormInputCheckbox(),
      'token'               => new sfWidgetFormInput(),
      'root'                => new sfWidgetFormInput(),
      'created_at'          => new sfWidgetFormDateTime(),
      'updated_at'          => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                  => new sfValidatorPropelChoice(array('model' => 'RiseArticle', 'column' => 'id', 'required' => false)),
      'category_id'         => new sfValidatorPropelChoice(array('model' => 'RiseCategory', 'column' => 'id')),
      'title'               => new sfValidatorString(array('max_length' => 255)),
      'image'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'short'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content'             => new sfValidatorString(),
      'author'              => new sfValidatorString(array('max_length' => 255)),
      'is_main_of_category' => new sfValidatorBoolean(),
      'is_main_of_day'      => new sfValidatorBoolean(),
      'is_news'             => new sfValidatorBoolean(),
      'is_public'           => new sfValidatorBoolean(),
      'is_intrash'          => new sfValidatorBoolean(),
      'token'               => new sfValidatorString(array('max_length' => 255)),
      'root'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'          => new sfValidatorDateTime(array('required' => false)),
      'updated_at'          => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'RiseArticle', 'column' => array('token')))
    );

    $this->widgetSchema->setNameFormat('rise_article[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RiseArticle';
  }


}
