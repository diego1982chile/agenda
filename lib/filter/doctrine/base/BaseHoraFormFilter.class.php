<?php

/**
 * Hora filter form base class.
 *
 * @package    agenda
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseHoraFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_solicitud' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SolicitudLicencia'), 'add_empty' => true)),
      'fecha_hora'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'hora_ini'     => new sfWidgetFormFilterInput(),
      'tipo'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_solicitud' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SolicitudLicencia'), 'column' => 'id_solicitud')),
      'fecha_hora'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'hora_ini'     => new sfValidatorPass(array('required' => false)),
      'tipo'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('hora_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Hora';
  }

  public function getFields()
  {
    return array(
      'id_hora'      => 'Number',
      'id_solicitud' => 'ForeignKey',
      'fecha_hora'   => 'Date',
      'hora_ini'     => 'Text',
      'tipo'         => 'Text',
    );
  }
}
