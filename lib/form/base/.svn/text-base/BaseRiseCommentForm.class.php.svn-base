<?php

/**
 * RiseComment form base class.
 *
 * @package    rise
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRiseCommentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'article_id' => new sfWidgetFormPropelChoice(array('model' => 'RiseArticle', 'add_empty' => false)),
      'author'     => new sfWidgetFormInput(),
      'email'      => new sfWidgetFormInput(),
      'content'    => new sfWidgetFormTextarea(),
      'is_public'  => new sfWidgetFormInputCheckbox(),
      'token'      => new sfWidgetFormInput(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'RiseComment', 'column' => 'id', 'required' => false)),
      'article_id' => new sfValidatorPropelChoice(array('model' => 'RiseArticle', 'column' => 'id')),
      'author'     => new sfValidatorString(array('max_length' => 255)),
      'email'      => new sfValidatorString(array('max_length' => 255)),
      'content'    => new sfValidatorString(),
      'is_public'  => new sfValidatorBoolean(),
      'token'      => new sfValidatorString(array('max_length' => 255)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'RiseComment', 'column' => array('token')))
    );

    $this->widgetSchema->setNameFormat('rise_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RiseComment';
  }


}
