<?php

/**
 * ConjuntoRequisitos form base class.
 *
 * @method ConjuntoRequisitos getObject() Returns the current form's model object
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseConjuntoRequisitosForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_requisito'     => new sfWidgetFormInputHidden(),
      'id_tramite'       => new sfWidgetFormInputHidden(),
      'id_tipo_licencia' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id_requisito'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_requisito')), 'empty_value' => $this->getObject()->get('id_requisito'), 'required' => false)),
      'id_tramite'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_tramite')), 'empty_value' => $this->getObject()->get('id_tramite'), 'required' => false)),
      'id_tipo_licencia' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_tipo_licencia')), 'empty_value' => $this->getObject()->get('id_tipo_licencia'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('conjunto_requisitos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConjuntoRequisitos';
  }

}
