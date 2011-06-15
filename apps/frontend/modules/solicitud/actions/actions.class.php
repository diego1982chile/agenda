<?php

/**
 * solicitud actions.
 *
 * @package    agenda
 * @subpackage solicitud
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class solicitudActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->solicitud_licencias = Doctrine_Core::getTable('SolicitudLicencia')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->forwardIf(!$this->getUser()->isAuthenticated(), 'solicitud', 'erroruser');
//    $this->getUser()->setCulture('es_CL');
    
    $this->form = new SolicitudLicenciaForm();
    
    $nombre = $this->getUser()->getProfile()->getNombres();
    $paterno = $this->getUser()->getProfile()->getApellidoPaterno();
    $materno = $this->getUser()->getProfile()->getApellidoMaterno();
    $this->form->setDefaults(array(
        'user_id' => $this->getUser()->getGuardUser()->getId(),
        'rut' => $this->getUser()->getProfile()->getRut(),
        'nombre' => $nombre,
        'paterno' => $paterno,
        'materno' => $materno,    
        'fecha_control' => date('d/m/Y', time() + 86400 * 10), 
        'porta_licencia' => '0',    
        'restriccion' => '0',    
        'es_donante' => '1',    
        ));
  }
  public function executeErroruser(sfWebRequest $request)
  {
      $this->formsignin = new sfGuardFormSignin();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));
//    $this->getUser()->setCulture('es_CL');

    $this->form = new SolicitudLicenciaForm();
    
    $this->form->bind($request->getParameter($this->form->getName()), $request->getFiles($this->form->getName()));
    
    
    if ($this->form->isValid())
    {
        $this->form->getObject()->setEstado('1');
        $solicitud_licencia = $this->form->save();
        $this->getUser()->setFlash('notice', 'Su solicitud ha sido ingresada exitosamente');
        $this->redirect('inicio/index');
    }
    
    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($solicitud_licencia = Doctrine_Core::getTable('SolicitudLicencia')->find(array($request->getParameter('id_solicitud'))), sprintf('Object solicitud_licencia does not exist (%s).', $request->getParameter('id_solicitud')));
    $this->form = new SolicitudLicenciaForm($solicitud_licencia);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($solicitud_licencia = Doctrine_Core::getTable('SolicitudLicencia')->find(array($request->getParameter('id_solicitud'))), sprintf('Object solicitud_licencia does not exist (%s).', $request->getParameter('id_solicitud')));
    $this->form = new SolicitudLicenciaForm($solicitud_licencia);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($solicitud_licencia = Doctrine_Core::getTable('SolicitudLicencia')->find(array($request->getParameter('id_solicitud'))), sprintf('Object solicitud_licencia does not exist (%s).', $request->getParameter('id_solicitud')));
    $solicitud_licencia->delete();

    $this->redirect('solicitud/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $values = $request->getParameter($form->getName());
    
    
    $form->bind($values, $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $solicitud_licencia = $form->save();

      $this->redirect('solicitud/edit?id_solicitud='.$solicitud_licencia->getIdSolicitud());
    }
  }
}
