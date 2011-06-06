<?php

/**
 * TipoLicencia form.
 *
 * @package    agenda
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TipoLicenciaSelectForm extends BaseTipoLicenciaForm
{
  public function configure()
  {
      unset(
      $this['descripcion_tipo_licencia']
    );
      
      $this->widgetSchema['nombre_tipo_licencia'] = new sfWidgetFormDoctrineChoice(array(
        'model'     => 'TipoLicencia',
        'add_empty' => 'Seleccione Licencia',
        'label' => 'Licencia',
        ));
  }
}
