<?php

/**
 * Requisito filter form base class.
 *
 * @package    agenda
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseRequisitoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_requisito'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_requisito' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_requisito'      => new sfValidatorPass(array('required' => false)),
      'descripcion_requisito' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('requisito_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Requisito';
  }

  public function getFields()
  {
    return array(
      'id_requisito'          => 'Number',
      'nombre_requisito'      => 'Text',
      'descripcion_requisito' => 'Text',
    );
  }
}
