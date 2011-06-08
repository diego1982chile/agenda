<?php

/**
 * Pago filter form base class.
 *
 * @package    agenda
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePagoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_solicitud' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SolicitudLicencia'), 'add_empty' => true)),
      'fecha'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'monto'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_solicitud' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('SolicitudLicencia'), 'column' => 'id_solicitud')),
      'fecha'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'monto'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('pago_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pago';
  }

  public function getFields()
  {
    return array(
      'id_pago'      => 'Number',
      'id_solicitud' => 'ForeignKey',
      'fecha'        => 'Date',
      'monto'        => 'Number',
    );
  }
}
