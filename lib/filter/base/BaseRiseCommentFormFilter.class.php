<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RiseComment filter form base class.
 *
 * @package    rise
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRiseCommentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'article_id' => new sfWidgetFormPropelChoice(array('model' => 'RiseArticle', 'add_empty' => true)),
      'author'     => new sfWidgetFormFilterInput(),
      'email'      => new sfWidgetFormFilterInput(),
      'content'    => new sfWidgetFormFilterInput(),
      'is_public'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'token'      => new sfWidgetFormFilterInput(),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'article_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RiseArticle', 'column' => 'id')),
      'author'     => new sfValidatorPass(array('required' => false)),
      'email'      => new sfValidatorPass(array('required' => false)),
      'content'    => new sfValidatorPass(array('required' => false)),
      'is_public'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'token'      => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('rise_comment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RiseComment';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'article_id' => 'ForeignKey',
      'author'     => 'Text',
      'email'      => 'Text',
      'content'    => 'Text',
      'is_public'  => 'Boolean',
      'token'      => 'Text',
      'created_at' => 'Date',
    );
  }
}
