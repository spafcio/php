<?php

/**
 * RiseCategory form base class.
 *
 * @package    rise
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRiseCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                           => new sfWidgetFormInputHidden(),
      'name'                         => new sfWidgetFormInput(),
      'slug'                         => new sfWidgetFormInput(),
      'rise_category_affiliate_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'RiseAffiliate')),
    ));

    $this->setValidators(array(
      'id'                           => new sfValidatorPropelChoice(array('model' => 'RiseCategory', 'column' => 'id', 'required' => false)),
      'name'                         => new sfValidatorString(array('max_length' => 255)),
      'slug'                         => new sfValidatorString(array('max_length' => 255)),
      'rise_category_affiliate_list' => new sfValidatorPropelChoiceMany(array('model' => 'RiseAffiliate', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rise_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RiseCategory';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['rise_category_affiliate_list']))
    {
      $values = array();
      foreach ($this->object->getRiseCategoryAffiliates() as $obj)
      {
        $values[] = $obj->getAffiliateId();
      }

      $this->setDefault('rise_category_affiliate_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveRiseCategoryAffiliateList($con);
  }

  public function saveRiseCategoryAffiliateList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['rise_category_affiliate_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (is_null($con))
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(RiseCategoryAffiliatePeer::CATEGORY_ID, $this->object->getPrimaryKey());
    RiseCategoryAffiliatePeer::doDelete($c, $con);

    $values = $this->getValue('rise_category_affiliate_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new RiseCategoryAffiliate();
        $obj->setCategoryId($this->object->getPrimaryKey());
        $obj->setAffiliateId($value);
        $obj->save();
      }
    }
  }

}
