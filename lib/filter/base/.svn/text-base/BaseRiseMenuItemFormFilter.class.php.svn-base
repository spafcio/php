<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RiseMenuItem filter form base class.
 *
 * @package    rise
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRiseMenuItemFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'menu_id'     => new sfWidgetFormPropelChoice(array('model' => 'RiseMenu', 'add_empty' => true)),
      'order'       => new sfWidgetFormFilterInput(),
      'title'       => new sfWidgetFormFilterInput(),
      'url'         => new sfWidgetFormFilterInput(),
      'article_id'  => new sfWidgetFormPropelChoice(array('model' => 'RiseArticle', 'add_empty' => true)),
      'category_id' => new sfWidgetFormPropelChoice(array('model' => 'RiseCategory', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'menu_id'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RiseMenu', 'column' => 'id')),
      'order'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'title'       => new sfValidatorPass(array('required' => false)),
      'url'         => new sfValidatorPass(array('required' => false)),
      'article_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RiseArticle', 'column' => 'id')),
      'category_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'RiseCategory', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('rise_menu_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RiseMenuItem';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'menu_id'     => 'ForeignKey',
      'order'       => 'Number',
      'title'       => 'Text',
      'url'         => 'Text',
      'article_id'  => 'ForeignKey',
      'category_id' => 'ForeignKey',
    );
  }
}
