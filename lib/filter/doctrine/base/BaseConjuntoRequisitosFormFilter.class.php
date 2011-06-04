<?php

/**
 * ConjuntoRequisitos filter form base class.
 *
 * @package    agenda
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseConjuntoRequisitosFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
    ));

    $this->setValidators(array(
    ));

    $this->widgetSchema->setNameFormat('conjunto_requisitos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConjuntoRequisitos';
  }

  public function getFields()
  {
    return array(
      'id_requisito'     => 'Number',
      'id_tramite'       => 'Number',
      'id_tipo_licencia' => 'Number',
    );
  }
}
