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
    $this->form = new SolicitudLicenciaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SolicitudLicenciaForm();

    $this->processForm($request, $this->form);

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
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $solicitud_licencia = $form->save();

      $this->redirect('solicitud/edit?id_solicitud='.$solicitud_licencia->getIdSolicitud());
    }
  }
}
