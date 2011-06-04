<?php

/**
 * tramite actions.
 *
 * @package    agenda
 * @subpackage tramite
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tramiteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tramites = Doctrine_Core::getTable('Tramite')
      ->findAll();

    $this->requisitos = Doctrine_Core::getTable('Requisito')
      ->createQuery('a')
      ->execute();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TramiteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TramiteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tramite = Doctrine_Core::getTable('Tramite')->find(array($request->getParameter('id_tramite'))), sprintf('Object tramite does not exist (%s).', $request->getParameter('id_tramite')));
    $this->form = new TramiteForm($tramite);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tramite = Doctrine_Core::getTable('Tramite')->find(array($request->getParameter('id_tramite'))), sprintf('Object tramite does not exist (%s).', $request->getParameter('id_tramite')));
    $this->form = new TramiteForm($tramite);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tramite = Doctrine_Core::getTable('Tramite')->find(array($request->getParameter('id_tramite'))), sprintf('Object tramite does not exist (%s).', $request->getParameter('id_tramite')));
    $tramite->delete();

    $this->redirect('tramite/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tramite = $form->save();

      $this->redirect('tramite/edit?id_tramite='.$tramite->getIdTramite());
    }
  }
}
