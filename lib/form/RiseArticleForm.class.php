<?php

/**
 * RiseArticle form.
 *
 * @package    rise
 * @subpackage form
 * @author     kopix
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class RiseArticleForm extends BaseRiseArticleForm
{
	
	/**
	 * Sets checked menu_generate field
	 * 
	 * @access public
	 * @return void
	 */
	public function markMenuGenerateField()
	{
		$this->widgetSchema['menu_generate'] = new sfWidgetFormInputCheckbox(array(), array('checked' => true));
	}
	
	
	/**
	 * (non-PHPdoc)
	 * @see lib/vendor/symfony/lib/form/sfForm#configure()
	 */
	public function configure()
	{
		unset(
		$this['created_at'],
		$this['expires_at'],
		$this['updated_at'],
		$this['token']
		);
		
		$this->widgetSchema['menu_generate'] = new sfWidgetFormInputCheckbox();
		
		$this->widgetSchema['rise_menu_id'] = new sfWidgetFormPropelChoice(array('add_empty' => '', 'model' => 'RiseMenu'));
				
		$this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Article image',
      'file_src'  => '/uploads/articles/'.$this->getObject()->getImage(),
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
		));
		
		$this->validatorSchema['rise_menu_id'] = new sfValidatorPropelChoice(array('model' => 'RiseMenu', 'column' => 'id', 'required' => false));
		$this->validatorSchema['menu_generate'] = new sfValidatorBoolean();

		$this->validatorSchema['image'] = new sfValidatorFile(array(
		'required' => false,
		'path' => sfConfig::get('sf_upload_dir').'/articles',
		'mime_types' => 'web_images',
		));
		
		$this->validatorSchema['image_delete'] = new sfValidatorPass();
	}
}