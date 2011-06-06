<?php

/**
 * TipoLicencia filter form base class.
 *
 * @package    agenda
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTipoLicenciaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_tipo_licencia'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_tipo_licencia' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_tipo_licencia'      => new sfValidatorPass(array('required' => false)),
      'descripcion_tipo_licencia' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_licencia_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoLicencia';
  }

  public function getFields()
  {
    return array(
      'id_tipo_licencia'          => 'Number',
      'nombre_tipo_licencia'      => 'Text',
      'descripcion_tipo_licencia' => 'Text',
    );
  }
}
