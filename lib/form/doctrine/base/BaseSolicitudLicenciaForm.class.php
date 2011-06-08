<?php

/**
 * SolicitudLicencia form base class.
 *
 * @method SolicitudLicencia getObject() Returns the current form's model object
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSolicitudLicenciaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_solicitud'             => new sfWidgetFormInputHidden(),
      'id_tramite'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tramite'), 'add_empty' => false)),
      'rut'                      => new sfWidgetFormInputText(),
      'user_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'id_pago'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pago'), 'add_empty' => true)),
      'id_hora'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Hora'), 'add_empty' => true)),
      'id_tipo_licencia'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoLicencia'), 'add_empty' => false)),
      'estado'                   => new sfWidgetFormInputText(),
      'fecha_ultimo_control'     => new sfWidgetFormDate(),
      'fecha_control'            => new sfWidgetFormDate(),
      'restriccion'              => new sfWidgetFormInputText(),
      'comuna_anterior'          => new sfWidgetFormInputText(),
      'porta_licencia'           => new sfWidgetFormInputText(),
      'motivo_no_porta_licencia' => new sfWidgetFormInputText(),
      'es_donante'               => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_solicitud'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_solicitud')), 'empty_value' => $this->getObject()->get('id_solicitud'), 'required' => false)),
      'id_tramite'               => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tramite'))),
      'rut'                      => new sfValidatorString(array('max_length' => 10)),
      'user_id'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'id_pago'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Pago'), 'required' => false)),
      'id_hora'                  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Hora'), 'required' => false)),
      'id_tipo_licencia'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TipoLicencia'))),
      'estado'                   => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'fecha_ultimo_control'     => new sfValidatorDate(array('required' => false)),
      'fecha_control'            => new sfValidatorDate(array('required' => false)),
      'restriccion'              => new sfValidatorInteger(array('required' => false)),
      'comuna_anterior'          => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'porta_licencia'           => new sfValidatorInteger(array('required' => false)),
      'motivo_no_porta_licencia' => new sfValidatorString(array('max_length' => 200, 'required' => false)),
      'es_donante'               => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('solicitud_licencia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SolicitudLicencia';
  }

}
