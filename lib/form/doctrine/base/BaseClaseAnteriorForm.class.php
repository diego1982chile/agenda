<?php

/**
 * ClaseAnterior form base class.
 *
 * @method ClaseAnterior getObject() Returns the current form's model object
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseClaseAnteriorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_solicitud'     => new sfWidgetFormInputHidden(),
      'id_tipo_licencia' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_solicitud'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_solicitud')), 'empty_value' => $this->getObject()->get('id_solicitud'), 'required' => false)),
      'id_tipo_licencia' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_tipo_licencia')), 'empty_value' => $this->getObject()->get('id_tipo_licencia'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('clase_anterior[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ClaseAnterior';
  }

}
