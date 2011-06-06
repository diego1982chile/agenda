<?php use_helper('I18N') ?>

<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table>
      
    <tbody>
      <tr>
          <th><?php echo $form['username']->renderLabel() ?></th>
          <td>
              <?php echo $form['username']->renderError() ?>
              <?php echo $form['username'] ?>
          </td>
      </tr>
      <tr>
      <th><?php echo $form['password']->renderLabel() ?></th>
          <td>
              <?php echo $form['password']->renderError() ?>
              <?php echo $form['password'] ?>
          </td>
      </tr>
      <tr>
      <th><?php echo $form['remember']->renderLabel() ?></th>
          <td>
              <?php echo $form['remember']->renderError() ?>
              <?php echo $form['remember'] ?>
              <?php echo $form['_csrf_token'] ?>
          </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="<?php echo __('Signin', null, 'sf_guard') ?>" />
          
          <?php $routes = $sf_context->getRouting()->getRoutes() ?>
          <?php if (isset($routes['sf_guard_forgot_password'])): ?>
            <a href="<?php echo url_for('@sf_guard_forgot_password') ?>"><?php echo __('Forgot your password?', null, 'sf_guard') ?></a>
          <?php endif; ?>

          <?php if (isset($routes['sf_guard_register'])): ?>
            &nbsp; <a href="<?php echo url_for('@sf_guard_register') ?>"><?php echo __('Want to register?', null, 'sf_guard') ?></a>
          <?php endif; ?>
        </td>
      </tr>
    </tfoot>
  </table>
</form>