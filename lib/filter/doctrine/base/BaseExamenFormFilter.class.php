<?php

/**
 * Examen filter form base class.
 *
 * @package    agenda
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExamenFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre_examen'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'descripcion_examen' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre_examen'      => new sfValidatorPass(array('required' => false)),
      'descripcion_examen' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('examen_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Examen';
  }

  public function getFields()
  {
    return array(
      'id_examen'          => 'Number',
      'nombre_examen'      => 'Text',
      'descripcion_examen' => 'Text',
    );
  }
}
