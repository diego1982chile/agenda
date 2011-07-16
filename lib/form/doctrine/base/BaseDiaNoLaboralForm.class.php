<?php

/**
 * DiaNoLaboral form base class.
 *
 * @method DiaNoLaboral getObject() Returns the current form's model object
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDiaNoLaboralForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_dia_no_laboral' => new sfWidgetFormInputHidden(),
      'user_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'fecha_no_laboral'  => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id_dia_no_laboral' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id_dia_no_laboral')), 'empty_value' => $this->getObject()->get('id_dia_no_laboral'), 'required' => false)),
      'user_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'fecha_no_laboral'  => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('dia_no_laboral[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'DiaNoLaboral';
  }

}
