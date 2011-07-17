<?php

/**
 * inicio actions.
 *
 * @package    agenda
 * @subpackage inicio
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class inicioActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->formsignin = new sfGuardFormSignin();
  }
  public function executeMail(sfWebRequest $request)
  {
      $this->getMailer()->composeAndSend('jonsxaero@gmail.com', 'jonsxaero@gmail.com', 'Subject', 'Body');
      return $this->renderText('mail');
  }
  
}
