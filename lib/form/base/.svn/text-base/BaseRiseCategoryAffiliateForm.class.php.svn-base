<?php

/**
 * RiseCategoryAffiliate form base class.
 *
 * @package    rise
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseRiseCategoryAffiliateForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'  => new sfWidgetFormInputHidden(),
      'affiliate_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'category_id'  => new sfValidatorPropelChoice(array('model' => 'RiseCategory', 'column' => 'id', 'required' => false)),
      'affiliate_id' => new sfValidatorPropelChoice(array('model' => 'RiseAffiliate', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('rise_category_affiliate[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RiseCategoryAffiliate';
  }


}
