<?php

/**
 * Pago form base class.
 *
 * @method Pago getObject() Returns the current form's model object
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePagoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_pago'      => new sfWidgetFormInputHidden(),
      'id_solicitud' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SolicitudLicencia'), 'add_empty' => false)),
      'fecha'        => new sfWidgetFormDate(),
      'monto'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id_pago'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_pago')), 'empty_value' => $this->getObject()->get('id_pago'), 'required' => false)),
      'id_solicitud' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SolicitudLicencia'))),
      'fecha'        => new sfValidatorDate(array('required' => false)),
      'monto'        => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pago[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pago';
  }

}
