<?php

/**
 * Requisito form base class.
 *
 * @method Requisito getObject() Returns the current form's model object
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRequisitoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_requisito'          => new sfWidgetFormInputHidden(),
      'nombre_requisito'      => new sfWidgetFormInputText(),
      'descripcion_requisito' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_requisito'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_requisito')), 'empty_value' => $this->getObject()->get('id_requisito'), 'required' => false)),
      'nombre_requisito'      => new sfValidatorString(array('max_length' => 40)),
      'descripcion_requisito' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('requisito[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Requisito';
  }

}
