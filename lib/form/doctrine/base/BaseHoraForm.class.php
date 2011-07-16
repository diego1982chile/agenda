<?php

/**
 * Hora form base class.
 *
 * @method Hora getObject() Returns the current form's model object
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseHoraForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_hora'      => new sfWidgetFormInputHidden(),
      'id_solicitud' => new sfWidgetFormInputText(),
      'fecha_hora'   => new sfWidgetFormDate(),
      'hora_ini'     => new sfWidgetFormTime(),
      'tipo'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_hora'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_hora')), 'empty_value' => $this->getObject()->get('id_hora'), 'required' => false)),
      'id_solicitud' => new sfValidatorInteger(array('required' => false)),
      'fecha_hora'   => new sfValidatorDate(),
      'hora_ini'     => new sfValidatorTime(),
      'tipo'         => new sfValidatorString(array('max_length' => 20, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('hora[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Hora';
  }

}
