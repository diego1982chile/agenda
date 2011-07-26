<?php if (!$sf_user->isAuthenticated()) : ?>
            
            <div id="sidebar">
                <div class="sidebar_box top_margin">
                    <h2><?php echo image_tag('contact_icon.png') ?>Inicio Sesión</h2>
                    <br />
                    
                    
                    <form action="<?php echo url_for('guard/login') ?>" method="post">
                      <table>
                        <?php echo $formsignin->renderGlobalErrors() ?>
                        <tbody>
                          <tr>
                              <th><?php echo $formsignin['username']->renderLabel() ?></th>
                              <td>
                                  <?php echo $formsignin['username']->renderError() ?>
                                  <?php echo $formsignin['username'] ?>
                              </td>
                          </tr>
                          <tr>
                          <th><?php echo $formsignin['password']->renderLabel() ?></th>
                              <td>
                                  <?php echo $formsignin['password']->renderError() ?>
                                  <?php echo $formsignin['password'] ?>
                              </td>
                          </tr>
                          <tr>
                          <th><?php echo $formsignin['remember']->renderLabel() ?></th>
                              <td>
                                  <?php echo $formsignin['remember']->renderError() ?>
                                  <?php echo $formsignin['remember'] ?>
                                  <?php echo $formsignin['_csrf_token'] ?>
                              </td>
                          </tr>                          
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="2">
                              <input type="submit" value="Signin">
                            </td>
                          </tr>
                        </tfoot>
                      </table>
                    </form>     
                </div>
            </div>




            
            <?php else: ?>
<!--            <div id="sidebar">
                <div class="sidebar_box top_margin">
                    <p>
                        Bienvenido <strong><?php echo $sf_user->getGuardUser()->getUsername()  ?> </strong>
                    </p>
                    <a href="<?php echo url_for('sfGuardAuth/signout') ?>">Logout</a>
                </div>
            </div>-->
                
            <?php endif; ?>