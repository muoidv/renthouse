<?php

/**
 * PosComment form base class.
 *
 * @method PosComment getObject() Returns the current form's model object
 *
 * @package    OpenPNE
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePosCommentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'pos_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pos'), 'add_empty' => false)),
      'content'         => new sfWidgetFormTextarea(),
      'member_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => false)),
      'file_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('File'), 'add_empty' => true)),
      'website'         => new sfWidgetFormInputText(),
      'claim_status'    => new sfWidgetFormInputText(),
      'status'          => new sfWidgetFormInputText(),
      'pos_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PosCategory'), 'add_empty' => true)),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'pos_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pos'))),
      'content'         => new sfValidatorString(array('max_length' => 2147483647)),
      'member_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'))),
      'file_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('File'), 'required' => false)),
      'website'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'claim_status'    => new sfValidatorInteger(array('required' => false)),
      'status'          => new sfValidatorInteger(array('required' => false)),
      'pos_category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PosCategory'), 'required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('pos_comment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PosComment';
  }

}
