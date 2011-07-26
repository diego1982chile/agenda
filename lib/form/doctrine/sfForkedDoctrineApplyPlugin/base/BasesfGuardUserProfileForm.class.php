<?php

/**
 * sfGuardUserProfile form base class.
 *
 * @method sfGuardUserProfile getObject() Returns the current form's model object
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfGuardUserProfileForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'user_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'email_new'        => new sfWidgetFormInputText(),
      'nombres'          => new sfWidgetFormInputText(),
      'apellido_paterno' => new sfWidgetFormInputText(),
      'apellido_materno' => new sfWidgetFormInputText(),
      'rut'              => new sfWidgetFormInputText(),
      'validate_at'      => new sfWidgetFormDateTime(),
      'validate'         => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'email_new'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nombres'          => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'apellido_paterno' => new sfValidatorString(array('max_length' => 70, 'required' => false)),
      'apellido_materno' => new sfValidatorString(array('max_length' => 70, 'required' => false)),
      'rut'              => new sfValidatorString(array('max_length' => 11, 'required' => false)),
      'validate_at'      => new sfValidatorDateTime(array('required' => false)),
      'validate'         => new sfValidatorString(array('max_length' => 33, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('user_id'))),
        new sfValidatorDoctrineUnique(array('model' => 'sfGuardUserProfile', 'column' => array('email_new'))),
      ))
    );

    $this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }

}
