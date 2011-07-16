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
      'id_solicitud' => new sfWidgetFormFilterInput(),
      'fecha_hora'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'hora_ini'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipo'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_solicitud' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
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
      'id_solicitud' => 'Number',
      'fecha_hora'   => 'Date',
      'hora_ini'     => 'Text',
      'tipo'         => 'Text',
    );
  }
}
