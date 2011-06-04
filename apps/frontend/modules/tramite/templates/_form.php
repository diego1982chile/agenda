<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('tramite/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_tramite='.$form->getObject()->getIdTramite() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('tramite/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'tramite/delete?id_tramite='.$form->getObject()->getIdTramite(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nombre_tramite']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre_tramite']->renderError() ?>
          <?php echo $form['nombre_tramite'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['descripcion_tramite']->renderLabel() ?></th>
        <td>
          <?php echo $form['descripcion_tramite']->renderError() ?>
          <?php echo $form['descripcion_tramite'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
