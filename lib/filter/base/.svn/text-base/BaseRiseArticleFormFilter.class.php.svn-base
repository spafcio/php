<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RiseArticle filter form base class.
 *
 * @package    rise
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRiseArticleFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'         => new sfWidgetFormPropelChoice(array('model' => 'RiseCategory', 'add_empty' => true)),
      'title'               => new sfWidgetFormFilterInput(),
      'image'               => new sfWidgetFormFilterInput(),
      'short'               => new sfWidgetFormFilterInput(),
      'content'             => new sfWidgetFormFilterInput(),
      'author'              => new sfWidgetFormFilterInput(),
      'is_main_of_category' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_main_of_day'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_news'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_public'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_intrash'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'token'               => new sfWidgetFormFilterInput(),
      'root'                => new sfWidgetFormFilterInput(),
      'created_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'updated_at'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'category_id'         => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RiseCategory', 'column' => 'id')),
      'title'               => new sfValidatorPass(array('required' => false)),
      'image'               => new sfValidatorPass(array('required' => false)),
      'short'               => new sfValidatorPass(array('required' => false)),
      'content'             => new sfValidatorPass(array('required' => false)),
      'author'              => new sfValidatorPass(array('required' => false)),
      'is_main_of_category' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_main_of_day'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_news'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_public'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_intrash'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'token'               => new sfValidatorPass(array('required' => false)),
      'root'                => new sfValidatorPass(array('required' => false)),
      'created_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('rise_article_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RiseArticle';
  }

  public function getFields()
  {
    return array(
      'id'                  => 'Number',
      'category_id'         => 'ForeignKey',
      'title'               => 'Text',
      'image'               => 'Text',
      'short'               => 'Text',
      'content'             => 'Text',
      'author'              => 'Text',
      'is_main_of_category' => 'Boolean',
      'is_main_of_day'      => 'Boolean',
      'is_news'             => 'Boolean',
      'is_public'           => 'Boolean',
      'is_intrash'          => 'Boolean',
      'token'               => 'Text',
      'root'                => 'Text',
      'created_at'          => 'Date',
      'updated_at'          => 'Date',
    );
  }
}
