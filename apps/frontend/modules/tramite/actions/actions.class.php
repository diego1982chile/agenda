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
    $this->formsignin = new sfGuardFormSignin();
    $this->tramiteselect = new TramiteSelectForm();
    $this->tipolicenciaselect = new TipoLicenciaSelectForm();
  }
  public function executeCargar_requisitos(sfWebRequest $request)
  {
      $this->forwardUnless($id_licencia = $request->getParameter('id_licencia'), 'tramite', 'index');
      $this->forwardUnless($id_tramite = $request->getParameter('id_tramite'), 'tramite', 'index');

      $q = Doctrine_Query::create()
        ->from('Requisito r')
        ->innerJoin('r.ConjuntoRequisitos cr')
        ->Where('cr.id_tramite = ? AND cr.id_tipo_licencia = ?', array($id_tramite, $id_licencia));
      $requisitos = $q->execute();
      return $this->renderPartial('tramite/listarequisitos', array('requisitos' => $requisitos));
      
  }
  public function executeCargar_examenes(sfWebRequest $request)
  {
      $this->forwardUnless($id_licencia = $request->getParameter('id_licencia'), 'tramite', 'index');
      $this->forwardUnless($id_tramite = $request->getParameter('id_tramite'), 'tramite', 'index');
      
      $q = Doctrine_Query::create()
        ->from('Examen e')
        ->innerJoin('e.ConjuntoExamenes ce')
        ->Where('ce.id_tramite = ? AND ce.id_tipo_licencia = ?', array($id_tramite, $id_licencia));
      $examenes = $q->execute();
      return $this->renderPartial('tramite/listaexamenes', array('examenes' => $examenes));
      
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
