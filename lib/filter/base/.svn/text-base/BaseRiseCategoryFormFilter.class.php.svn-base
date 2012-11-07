<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * RiseCategory filter form base class.
 *
 * @package    rise
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRiseCategoryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                         => new sfWidgetFormFilterInput(),
      'slug'                         => new sfWidgetFormFilterInput(),
      'rise_category_affiliate_list' => new sfWidgetFormPropelChoice(array('model' => 'RiseAffiliate', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'                         => new sfValidatorPass(array('required' => false)),
      'slug'                         => new sfValidatorPass(array('required' => false)),
      'rise_category_affiliate_list' => new sfValidatorPropelChoice(array('model' => 'RiseAffiliate', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rise_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addRiseCategoryAffiliateListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(RiseCategoryAffiliatePeer::CATEGORY_ID, RiseCategoryPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(RiseCategoryAffiliatePeer::AFFILIATE_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(RiseCategoryAffiliatePeer::AFFILIATE_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'RiseCategory';
  }

  public function getFields()
  {
    return array(
      'id'                           => 'Number',
      'name'                         => 'Text',
      'slug'                         => 'Text',
      'rise_category_affiliate_list' => 'ManyKey',
    );
  }
}
