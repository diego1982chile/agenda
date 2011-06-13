<?php

/**
 * SolicitudLicencia form.
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SolicitudLicenciaForm extends BaseSolicitudLicenciaForm
{
  public function configure()
  {
//      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(), array('disabled' => 'disabled'));
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('value' => $this->getOption('nombre')));
      $this->validatorSchema['nombre'] = new sfValidatorString(array('max_length' => 100, 'required' => true));
      $this->widgetSchema['paterno'] = new sfWidgetFormInputText(array(),array('value' => $this->getOption('paterno')));
      $this->validatorSchema['paterno'] = new sfValidatorString(array('max_length' => 40, 'required' => true));
      $this->widgetSchema['materno'] = new sfWidgetFormInputText(array(),array('value' => $this->getOption('materno')));
      $this->validatorSchema['materno'] = new sfValidatorString(array('max_length' => 40, 'required' => true));
      $this->widgetSchema['fecha_control'] = new sfWidgetFormInputText(array(), array('readonly' => 'readonly'));
      
      $this->widgetSchema['fecha_ultimo_control'] = new sfWidgetFormInputText(array(), array());
      $this->validatorSchema['fecha_ultimo_control'] = new sfValidatorString(array('max_length' => 15, 'required' => true));
      
      $this->widgetSchema['comuna_anterior'] = new sfWidgetFormChoice(array(
          'choices'  => Doctrine_Core::getTable('SolicitudLicencia')->getComunas()
          ));
      $this->widgetSchema['porta_licencia'] = new sfWidgetFormChoice(array(
          'choices'  => array('1' => 'Si', '0' => 'No'),
          'expanded' => true,
          ));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
      
      
      
      
      
      
      
      $this->widgetSchema->moveField('nombre','after','rut');
      $this->widgetSchema->moveField('paterno','after','nombre');
      $this->widgetSchema->moveField('materno','after','paterno');
      $this->widgetSchema->moveField('id_tipo_licencia','after','id_tramite');
      
      unset(
          $this['id_pago'], 
          $this['id_hora'],
          $this['estado'],
          $this['restriccion'],
          $this['motivo_no_porta_licencia'],
          $this['es_donante'],
          $this['estado']
              );
      
      
      $this->widgetSchema->setLabels(array(
          'id_tramite'              => 'Tipo de Tramite',
          'rut'                     => 'RUT',
          'id_tipo_licencia'        => 'Licencia a Tramitar',
          'fecha_ultimo_control'    => 'Ultimo Control',
          'paterno'                 => 'Apellido Paterno',
          'materno'                 => 'Apellido Materno',
          'fecha_control'           => 'Fecha Control',
        ));
  }
}
