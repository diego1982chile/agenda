<?php

/**
 * hora actions.
 *
 * @package    agenda
 * @subpackage hora
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class horaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }
  
  public function executePaso2(sfWebRequest $request)
  {
    // Setear disponibilidad 
    // Verificar hora
    $this->formsignin = new sfGuardFormSignin();
    date_default_timezone_set('America/Santiago');        
    
    $this->dia_activo=date('d-m-Y'); // dia actual --> Candidato a dia activo
    $this->fecha_limite=date('d-m-Y',strtotime($this->dia_activo."+".sfConfig::get('app_hora_lim_fecha_atencion')." days"));
    $this->hora_activa=date('H:i');  // Hora actual --> candidata a hora activa              
    
    // Obtener días no laborales
    
    $this->dias_no_laborales = Doctrine_Core::getTable('DiaNoLaboral')
        ->createQuery('a')  
        ->select('fecha_no_laboral')
        ->where('a.fecha_no_laboral >=?',date('Y-m-d',strtotime($this->dia_activo)))
        ->andWhere('a.fecha_no_laboral <=?',date('Y-m-d',strtotime($this->fecha_limite)))
        ->execute();
    
    $caso=0;
    
    /* Si se sobrepasa horario de atencion, el calendario pasa al siguiente dia, y la hora activa
    a la primera hora de atención del dia siguiente*/    
    if($this->hora_activa > date('H:i',strtotime(sfConfig::get('app_hora_inicio')."+".sfConfig::get('app_hora_modulos')." hours")))
    {                    
        $caso= 1;
    }    
    
    // Si se sobrepasa horario de actividad, el calendario disponible pasa al dia subsiguiente
    
    if($this->hora_activa > sfConfig::get('app_hora_lim_horario_atencion')){            
        $caso= 2;
    }    
        
   switch ($caso)
   {
       case 1:
           $this->dia_activo=date('d-m-Y',strtotime($this->dia_activo."+1 days"));
           $this->hora_activa=date('H:i',strtotime(sfConfig::get('app_hora_inicio')));
           break;       
       case 2:
           $this->dia_activo=date('d-m-Y',strtotime($this->dia_activo."+2 days"));
           $this->hora_activa=date('H:i',strtotime(sfConfig::get('app_hora_inicio')));
           break;
   }    
    
    $this->dias_no_disponibles= array();
    
    foreach ($this->dias_no_laborales as $dia):
        array_push($this->dias_no_disponibles,date('d-m-Y',strtotime($dia->fecha_no_laboral)));
        // Si el día activo coincide con un dia no disponible, el calendario pasa al siguiente dia, 
        // y la hora activa a la primera hora de atención del dia siguiente
        if(date('Y-m-d',strtotime($this->dia_activo))==$dia->fecha_no_laboral) 
        {           
            $this->dia_activo=date('d-m-Y',strtotime($this->dia_activo."+1 days"));
            $this->hora_activa=date('H:i',  strtotime(sfConfig::get('app_hora_inicio')));            
        }
    endforeach;      
    
    // Dar formato de fecha compatible con datepicker y codificar a json
    $this->dias_no_disponibles= json_encode($this->dias_no_disponibles);
    
  // Obtener dias copados
  
  $this->horas_dias = Doctrine_Core::getTable('Hora')
    ->createQuery('a')  
    ->select('fecha_hora, count(*) as cantidad')
    ->where('fecha_hora >=?',date('Y-m-d',strtotime($this->dia_activo)))
    ->andWhere('fecha_hora <=?',date('Y-m-d',strtotime($this->fecha_limite)))
    ->addGroupBy('fecha_hora')
    ->execute();         
    
    $this->dias_no_disponibles2= array();        
    
    foreach ($this->horas_dias as $dia):
    // Si el número de solicitudes iguala o excede el numero de modulos disponibles, insertar el dia
        if($dia->cantidad>=sfConfig::get('app_hora_modulos'))
        {
            echo $dia->fecha_hora."<br>";
            array_push($this->dias_no_disponibles2,date('d-m-Y',strtotime($dia->fecha_hora)));
            // Si el día activo coincide con un dia copado, el calendario pasa al siguiente dia, 
            // y la hora activa a la primera hora de atención del dia siguiente            
            if(date('Y-m-d',strtotime($this->dia_activo))==$dia->fecha_hora) 
            {                                           
                $this->dia_activo=date('d-m-Y',strtotime($this->dia_activo."+1 days"));
                $this->hora_activa=date('H:i',strtotime(sfConfig::get('app_hora_inicio')));            
            }
        }
    endforeach;      
       
    
    // Dar formato de fecha compatible con datepicker y codificar a json
    $this->dias_no_disponibles2= json_encode($this->dias_no_disponibles2);                   
    
    $this->dias_no_disponibles3= array();
    
    $dia_actual= $this->dia_activo;
    
    while (date("Y-m-d", strtotime($dia_actual)) != date("Y-m-d", strtotime($this->fecha_limite))) 
    {
        $day_index = date("w", strtotime($dia_actual));
        if ($day_index == 0 || $day_index == 6) {
             array_push($this->dias_no_disponibles3,date('d-m-Y',strtotime($dia_actual)));
        }
        $dia_actual = date("Y-m-d", strtotime($dia_actual))."+1 days";
    }        
    
    // Dar formato de fecha compatible con datepicker y codificar a json
    $this->dias_no_disponibles3= json_encode($this->dias_no_disponibles3);                   
            
    // Construir modulos disponibles en base a las horas tomadas para el rango de fechas actual
    
    $this->horas = Doctrine_Core::getTable('Hora')
    ->createQuery('a')      
    ->where('fecha_hora>=?',date('Y-m-d',strtotime($this->dia_activo)))
    ->andWhere('fecha_hora <=?',date('Y-m-d',strtotime($this->fecha_limite)))
    ->orderBy('fecha_hora')                    
    ->execute();
    
    $this->horas_tomadas= array();                   
    
    foreach ($this->horas as $hora):    
        array_push($this->horas_tomadas,$hora);                        
    endforeach;        
    
    $cont_horas=0;
    $this->matriz= array();
    $cantidad_horas=count($this->horas_tomadas);    
    
    while($cont_horas<$cantidad_horas)
    {
        $dia_actual=$this->horas_tomadas[$cont_horas]->fecha_hora;                
        $dia_sig=$dia_actual;
        $horas_pedidas= array();                
        
            // Obtiene las horas pedidas para el dia actual
            while($dia_sig==$dia_actual):
                array_push($horas_pedidas,$this->horas_tomadas[$cont_horas]->hora_ini);            
                $cont_horas++;            
                if($cont_horas<$cantidad_horas)
                {                
                    $dia_sig=$this->horas_tomadas[$cont_horas]->fecha_hora;
                }
                else
                {
                    break;
                }            
            endwhile;

        $this->matriz[$dia_actual]=$horas_pedidas;
    }
    $this->inicio =sfConfig::get('app_hora_inicio');                  
    $this->intervalo=sfConfig::get('app_hora_intervalo_horas');
    $this->num_modulos=sfConfig::get('app_hora_modulos');                                      
    $this->indice =0;
  }

  public function executeTomar_hora(sfWebRequest $request)
  {         
    $this->forwardUnless($hora_tomada = $request->getParameter('hora'), 'hora', '1');                
    $this->forwardUnless($dia = $request->getParameter('dia'), 'hora', '2');                
    $this->forwardUnless($dia_activo = $request->getParameter('dia_activo'), 'hora', '3');
    $this->forwardUnless($fecha_limite = $request->getParameter('fecha_limite'), 'hora', '4');
    //$this->forwardUnless($indice = $request->getParameter('indice'), 'hora', '5');    
    $indice = $request->getParameter('indice');
        
    $this->dia_activo=$dia_activo;
    $this->fecha_limite=$fecha_limite;
    $this->inicio =sfConfig::get('app_hora_inicio');                  
    $this->intervalo=sfConfig::get('app_hora_intervalo_horas');  
    $this->num_modulos=sfConfig::get('app_hora_modulos');                                      
    $this->indice=$indice;                                      
    
    $this->dia_activo= str_replace('/', '-',$this->dia_activo);
    $this->fecha_limite= str_replace('/', '-',$this->fecha_limite);    
    //return $this->renderText("HOLA");
    // Insertar la hora en la BD    
    
    $hora = new Hora();
    $hora->setHoraIni($hora_tomada);    
    $hora->setFechaHora(date('Y-m-d',strtotime($dia)));
    $hora->setTipo(0);    
    $hora->save();           
    
    // Construir modulos disponibles en base a las horas tomadas para el rango de fechas actual
    
    $this->horas = Doctrine_Core::getTable('Hora')
    ->createQuery('a')      
    ->where('fecha_hora>=?',date('Y-m-d',strtotime($this->dia_activo)))
    ->andWhere('fecha_hora <=?',date('Y-m-d',strtotime($this->fecha_limite)))
    ->orderBy('fecha_hora')                    
    ->execute();
    
    $this->horas_tomadas= array();                   
    
    foreach ($this->horas as $hora):    
        array_push($this->horas_tomadas,$hora);                        
    endforeach;        
    
    $cont_horas=0;
    //$this->matriz= array(''=>array());
    $this->matriz= array();
    $cantidad_horas=count($this->horas_tomadas);    
    
    while($cont_horas<$cantidad_horas)
    {
        $dia_actual=$this->horas_tomadas[$cont_horas]->fecha_hora;                
        $dia_sig=$dia_actual;
        $horas_pedidas= array();                
        
            // Obtiene las horas pedidas para el dia actual
            while($dia_sig==$dia_actual):
                array_push($horas_pedidas,$this->horas_tomadas[$cont_horas]->hora_ini);            
                $cont_horas++;            
                if($cont_horas<$cantidad_horas)
                {                
                    $dia_sig=$this->horas_tomadas[$cont_horas]->fecha_hora;
                }
                else
                {
                    break;
                }            
            endwhile;

        $this->matriz[$dia_actual]=$horas_pedidas;
    }                         
    
    return $this->renderPartial('hora/modulos', array('matriz' => $this->matriz,
                                                      'dia_activo' => $this->dia_activo, 
                                                      'inicio' => $this->inicio, 
                                                      'fecha_limite' => $this->fecha_limite,
                                                      'num_modulos' => $this->num_modulos,
                                                      'indice' => $this->indice));
   }    
}
