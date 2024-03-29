<?php

/**
 * MessageFile form base class.
 *
 * @method MessageFile getObject() Returns the current form's model object
 *
 * @package    OpenPNE
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMessageFileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'message_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SendMessageData'), 'add_empty' => false)),
      'file_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('File'), 'add_empty' => false)),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'message_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SendMessageData'))),
      'file_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('File'))),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('message_file[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MessageFile';
  }

}
