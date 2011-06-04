<?php

/**
 * Tramite form base class.
 *
 * @method Tramite getObject() Returns the current form's model object
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTramiteForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_tramite'          => new sfWidgetFormInputHidden(),
      'nombre_tramite'      => new sfWidgetFormInputText(),
      'descripcion_tramite' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_tramite'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_tramite')), 'empty_value' => $this->getObject()->get('id_tramite'), 'required' => false)),
      'nombre_tramite'      => new sfValidatorString(array('max_length' => 40)),
      'descripcion_tramite' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tramite[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tramite';
  }

}
