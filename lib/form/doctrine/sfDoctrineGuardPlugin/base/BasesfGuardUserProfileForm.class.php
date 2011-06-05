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
      'nombres'          => new sfWidgetFormInputText(),
      'apellido_paterno' => new sfWidgetFormInputText(),
      'apellido_materno' => new sfWidgetFormInputText(),
      'fecha_nacimiento' => new sfWidgetFormDateTime(),
      'direccion'        => new sfWidgetFormInputText(),
      'telefono'         => new sfWidgetFormInputText(),
      'telefono_celular' => new sfWidgetFormInputText(),
      'estado_civil'     => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'nombres'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'apellido_paterno' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'apellido_materno' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'fecha_nacimiento' => new sfValidatorDateTime(array('required' => false)),
      'direccion'        => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'telefono'         => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'telefono_celular' => new sfValidatorString(array('max_length' => 15, 'required' => false)),
      'estado_civil'     => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

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
