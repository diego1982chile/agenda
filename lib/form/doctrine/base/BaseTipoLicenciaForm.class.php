<?php

/**
 * TipoLicencia form base class.
 *
 * @method TipoLicencia getObject() Returns the current form's model object
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTipoLicenciaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_tipo_licencia'          => new sfWidgetFormInputHidden(),
      'nombre_tipo_licencia'      => new sfWidgetFormInputText(),
      'descripcion_tipo_licencia' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id_tipo_licencia'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_tipo_licencia')), 'empty_value' => $this->getObject()->get('id_tipo_licencia'), 'required' => false)),
      'nombre_tipo_licencia'      => new sfValidatorString(array('max_length' => 20)),
      'descripcion_tipo_licencia' => new sfValidatorString(array('max_length' => 512, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tipo_licencia[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TipoLicencia';
  }

}
