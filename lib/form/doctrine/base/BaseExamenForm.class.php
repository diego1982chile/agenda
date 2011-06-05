<?php

/**
 * Examen form base class.
 *
 * @method Examen getObject() Returns the current form's model object
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExamenForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_examen'          => new sfWidgetFormInputHidden(),
      'nombre_examen'      => new sfWidgetFormInputText(),
      'descripcion_examen' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_examen'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_examen')), 'empty_value' => $this->getObject()->get('id_examen'), 'required' => false)),
      'nombre_examen'      => new sfValidatorString(array('max_length' => 40)),
      'descripcion_examen' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('examen[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Examen';
  }

}
