<?php

/**
 * Tramite form.
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TramiteSelectForm extends BaseTramiteForm
{
  public function configure()
  {
      unset(
      $this['descripcion_tramite']
    );
      
      $this->widgetSchema['nombre_tramite'] = new sfWidgetFormDoctrineChoice(array(
        'model'     => 'Tramite',
        'add_empty' => 'Seleccione Tramite',
        'label' => 'Tramite',
        ));
  }
}
