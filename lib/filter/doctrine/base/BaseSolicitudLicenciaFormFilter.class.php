<?php

/**
 * SolicitudLicencia filter form base class.
 *
 * @package    agenda
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSolicitudLicenciaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_tramite'               => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tramite'), 'add_empty' => true)),
      'rut'                      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'user_id'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'id_pago'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Pago'), 'add_empty' => true)),
      'id_hora'                  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Hora'), 'add_empty' => true)),
      'id_tipo_licencia'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TipoLicencia'), 'add_empty' => true)),
      'estado'                   => new sfWidgetFormFilterInput(),
      'fecha_ultimo_control'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'fecha_control'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'restriccion'              => new sfWidgetFormFilterInput(),
      'comuna_anterior'          => new sfWidgetFormFilterInput(),
      'porta_licencia'           => new sfWidgetFormFilterInput(),
      'motivo_no_porta_licencia' => new sfWidgetFormFilterInput(),
      'es_donante'               => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_tramite'               => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tramite'), 'column' => 'id_tramite')),
      'rut'                      => new sfValidatorPass(array('required' => false)),
      'user_id'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'id_pago'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Pago'), 'column' => 'id_pago')),
      'id_hora'                  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Hora'), 'column' => 'id_hora')),
      'id_tipo_licencia'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TipoLicencia'), 'column' => 'id_tipo_licencia')),
      'estado'                   => new sfValidatorPass(array('required' => false)),
      'fecha_ultimo_control'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fecha_control'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'restriccion'              => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'comuna_anterior'          => new sfValidatorPass(array('required' => false)),
      'porta_licencia'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'motivo_no_porta_licencia' => new sfValidatorPass(array('required' => false)),
      'es_donante'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('solicitud_licencia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SolicitudLicencia';
  }

  public function getFields()
  {
    return array(
      'id_solicitud'             => 'Number',
      'id_tramite'               => 'ForeignKey',
      'rut'                      => 'Text',
      'user_id'                  => 'ForeignKey',
      'id_pago'                  => 'ForeignKey',
      'id_hora'                  => 'ForeignKey',
      'id_tipo_licencia'         => 'ForeignKey',
      'estado'                   => 'Text',
      'fecha_ultimo_control'     => 'Date',
      'fecha_control'            => 'Date',
      'restriccion'              => 'Number',
      'comuna_anterior'          => 'Text',
      'porta_licencia'           => 'Number',
      'motivo_no_porta_licencia' => 'Text',
      'es_donante'               => 'Number',
    );
  }
}
