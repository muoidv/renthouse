<?php

/**
 * PosCategory form base class.
 *
 * @method PosCategory getObject() Returns the current form's model object
 *
 * @package    OpenPNE
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePosCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'name_table'  => new sfWidgetFormInputText(),
      'code'        => new sfWidgetFormInputText(),
      'parent_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PosCategory'), 'add_empty' => true)),
      'type'        => new sfWidgetFormInputText(),
      'file_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('File'), 'add_empty' => true)),
      'order'       => new sfWidgetFormInputText(),
      'detail_name' => new sfWidgetFormInputText(),
      'view_flag'   => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'name_table'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'code'        => new sfValidatorString(array('max_length' => 100)),
      'parent_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PosCategory'), 'required' => false)),
      'type'        => new sfValidatorInteger(array('required' => false)),
      'file_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('File'), 'required' => false)),
      'order'       => new sfValidatorInteger(array('required' => false)),
      'detail_name' => new sfValidatorString(array('max_length' => 255)),
      'view_flag'   => new sfValidatorInteger(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'PosCategory', 'column' => array('code')))
    );

    $this->widgetSchema->setNameFormat('pos_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PosCategory';
  }

}
