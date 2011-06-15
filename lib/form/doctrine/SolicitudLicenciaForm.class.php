<?php

/**
 * SolicitudLicencia form.
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SolicitudLicenciaForm extends BaseSolicitudLicenciaForm {
    protected $fechas = array();

    public function configure() {
        $this->widgetSchema['nombre'] = new sfWidgetFormInputText();
        $this->validatorSchema['nombre'] = new sfValidatorString(array('max_length' => 100, 'required' => true));

        $this->widgetSchema['paterno'] = new sfWidgetFormInputText();
        $this->validatorSchema['paterno'] = new sfValidatorString(array('max_length' => 40, 'required' => true));

        $this->widgetSchema['materno'] = new sfWidgetFormInputText();
        $this->validatorSchema['materno'] = new sfValidatorString(array('max_length' => 40, 'required' => true));

        $this->widgetSchema['fecha_control'] = new sfWidgetFormInputText(array(), array('readonly' => 'readonly'));
        $this->validatorSchema['fecha_control'] = new sfValidatorDate(
                        array('date_format' => '/(\d{2})\/(\d{2})\/(\d{4})/'),
                        array(
                            'required' => 'Requerido',
                            'invalid' => 'Inválido',
                            'bad_format' => 'La Fecha "%value%" debe tener formato dd/mm/aaaa'
                ));

        $this->widgetSchema['fecha_ultimo_control'] = new sfWidgetFormInputText(array(), array());
        $this->validatorSchema['fecha_ultimo_control'] = new sfValidatorDate(
                        array('date_format' => '/(\d{2})\/(\d{2})\/(\d{4})/'),
                        array(
                            'required' => 'Requerido',
                            'invalid' => 'Inválido',
                            'bad_format' => 'La Fecha "%value%" debe tener formato dd/mm/aaaa'
                ));


        $this->widgetSchema['comuna_anterior'] = new sfWidgetFormChoice(array(
                    'choices' => Doctrine_Core::getTable('SolicitudLicencia')->getComunas()
                ));
        $this->validatorSchema['comuna_anterior'] = new sfValidatorChoice(array(
                    'choices' => array_keys(Doctrine_Core::getTable('SolicitudLicencia')->getComunas()),
                ));


        $this->widgetSchema['porta_licencia'] = new sfWidgetFormChoice(array(
                    'choices' => array('1' => 'Si', '0' => 'No'),
                    'expanded' => true,
                ));
        $this->validatorSchema['porta_licencia'] = new sfValidatorChoice(
                        array(
                            'choices' => array_keys(array('1' => 'Si', '0' => 'No')),
                        ),
                        array('required' => 'Debe elegir una opción')
        );


        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();

        $this->widgetSchema['restriccion'] = new sfWidgetFormChoice(array(
                    'choices' => array('1' => 'Si', '0' => 'No'),
                    'expanded' => true,
                ));


        $this->widgetSchema['es_donante'] = new sfWidgetFormChoice(array(
                    'choices' => array('1' => 'Si', '0' => 'No'),
                    'expanded' => true,
                ));
        $this->validatorSchema['es_donante'] = new sfValidatorChoice(
                        array(
                            'choices' => array_keys(array('1' => 'Si', '0' => 'No')),
                        ),
                        array('required' => 'Debe elegir una opción')
        );



        $this->widgetSchema['motivo_no_porta_licencia'] = new sfWidgetFormTextarea(array(), array('rows' => 2));




        $this->widgetSchema->moveField('nombre', 'after', 'rut');
        $this->widgetSchema->moveField('paterno', 'after', 'nombre');
        $this->widgetSchema->moveField('materno', 'after', 'paterno');
        $this->widgetSchema->moveField('id_tipo_licencia', 'after', 'id_tramite');
        $this->widgetSchema->moveField('restriccion', 'after', 'porta_licencia');
        $this->widgetSchema->moveField('motivo_no_porta_licencia', 'after', 'porta_licencia');

        unset(
                $this['id_pago'], $this['id_hora'], $this['estado']
        );


        $this->widgetSchema->setLabels(array(
            'id_tramite' => 'Tipo de Tramite',
            'rut' => 'RUT',
            'id_tipo_licencia' => 'Licencia a Tramitar',
            'fecha_ultimo_control' => 'Ultimo Control',
            'paterno' => 'Apellido Paterno',
            'materno' => 'Apellido Materno',
            'fecha_control' => 'Fecha Control',
            'motivo_no_porta_licencia' => 'Motivo de no tener licencia',
            'porta_licencia' => '¿Porta la licencia?',
            'restriccion' => '¿Tiene restricción?',
            'es_donante' => '¿Es donante?',
        ));
    }
    
    public function bind(array $taintedValues = null, array $taintedFiles = null){        
        $this->fechas['fecha_ultimo_control'] = $taintedValues['fecha_ultimo_control'];
        $this->fechas['fecha_control'] = $taintedValues['fecha_control'];
        
        if (preg_match("/(\d{2})\/(\d{2})\/(\d{4})/", $taintedValues['fecha_ultimo_control'])) {
            list($d1, $m1, $a1) = explode('/', $taintedValues['fecha_ultimo_control']);
            $taintedValues['fecha_ultimo_control'] = date('Y-m-d', mktime(0, 0, 0, $m1, $d1, $a1));
        }

        if (preg_match("/(\d{2})\/(\d{2})\/(\d{4})/", $taintedValues['fecha_control'])) {
            list($d1, $m1, $a1) = explode('/', $taintedValues['fecha_control']);
            $taintedValues['fecha_control'] = date('Y-m-d', mktime(0, 0, 0, $m1, $d1, $a1));
        }
        parent::bind($taintedValues, $taintedFiles);
    }
    
    public function isValid(){
        if(!parent::isValid()){
            $this->values['fecha_ultimo_control'] = $this->fechas['fecha_ultimo_control'];
            $this->values['fecha_control'] = $this->fechas['fecha_control'];  
        }
        return parent::isValid();
    }

//    public function doSave($con = null) {
//        //CAMBIAMOS LAS FECHAS A FORMATO MYSQL SI CORRESPONDE
//        if (preg_match("/(\d{2})\/(\d{2})\/(\d{4})/", $this->values['fecha_ultimo_control'])) {
//            list($d1, $m1, $a1) = explode('/', $this->values['fecha_ultimo_control']);
//            $this->values['fecha_ultimo_control'] = date('Y-m-d', mktime(0, 0, 0, $m1, $d1, $a1));
//            $this->values['estado'] = 'ultima si';
//        }
//        else $this->values['estado'] = 'ultima no'.$this->values['fecha_ultimo_control'];
//        if (preg_match("/(\d{2})\/(\d{2})\/(\d{4})/", $this->values['fecha_control'])) {
//            list($d1, $m1, $a1) = explode('/', $this->values['fecha_control']);
//            $this->values['fecha_control'] = date('Y-m-d', mktime(0, 0, 0, $m1, $d1, $a1));
//        }      
//        
//        parent::doSave($con);
//    }
    
    public function valor($s){
        return $this->values[$s];
    }

}
