<?php

/**
 * RiseAffiliate form base class.
 *
 * @package    rise
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRiseAffiliateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                           => new sfWidgetFormInputHidden(),
      'url'                          => new sfWidgetFormInput(),
      'email'                        => new sfWidgetFormInput(),
      'token'                        => new sfWidgetFormInput(),
      'is_active'                    => new sfWidgetFormInputCheckbox(),
      'created_at'                   => new sfWidgetFormDateTime(),
      'rise_category_affiliate_list' => new sfWidgetFormPropelChoiceMany(array('model' => 'RiseCategory')),
    ));

    $this->setValidators(array(
      'id'                           => new sfValidatorPropelChoice(array('model' => 'RiseAffiliate', 'column' => 'id', 'required' => false)),
      'url'                          => new sfValidatorString(array('max_length' => 255)),
      'email'                        => new sfValidatorString(array('max_length' => 255)),
      'token'                        => new sfValidatorString(array('max_length' => 255)),
      'is_active'                    => new sfValidatorBoolean(),
      'created_at'                   => new sfValidatorDateTime(array('required' => false)),
      'rise_category_affiliate_list' => new sfValidatorPropelChoiceMany(array('model' => 'RiseCategory', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'RiseAffiliate', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('rise_affiliate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RiseAffiliate';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['rise_category_affiliate_list']))
    {
      $values = array();
      foreach ($this->object->getRiseCategoryAffiliates() as $obj)
      {
        $values[] = $obj->getCategoryId();
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
    $c->add(RiseCategoryAffiliatePeer::AFFILIATE_ID, $this->object->getPrimaryKey());
    RiseCategoryAffiliatePeer::doDelete($c, $con);

    $values = $this->getValue('rise_category_affiliate_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new RiseCategoryAffiliate();
        $obj->setAffiliateId($this->object->getPrimaryKey());
        $obj->setCategoryId($value);
        $obj->save();
      }
    }
  }

}
