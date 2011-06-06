<?php

/**
 * Tramite filter form base class.
 *
 * @package    agenda
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTramiteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_tramite'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_tramite' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_tramite'      => new sfValidatorPass(array('required' => false)),
      'descripcion_tramite' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tramite_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tramite';
  }

  public function getFields()
  {
    return array(
      'id_tramite'          => 'Number',
      'nombre_tramite'      => 'Text',
      'descripcion_tramite' => 'Text',
    );
  }
}
