<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('solicitud/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_solicitud='.$form->getObject()->getIdSolicitud() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('solicitud/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'solicitud/delete?id_solicitud='.$form->getObject()->getIdSolicitud(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['id_tramite']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_tramite']->renderError() ?>
          <?php echo $form['id_tramite'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['rut']->renderLabel() ?></th>
        <td>
          <?php echo $form['rut']->renderError() ?>
          <?php echo $form['rut'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['user_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['user_id']->renderError() ?>
          <?php echo $form['user_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_pago']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_pago']->renderError() ?>
          <?php echo $form['id_pago'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_hora']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_hora']->renderError() ?>
          <?php echo $form['id_hora'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['id_tipo_licencia']->renderLabel() ?></th>
        <td>
          <?php echo $form['id_tipo_licencia']->renderError() ?>
          <?php echo $form['id_tipo_licencia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['estado']->renderLabel() ?></th>
        <td>
          <?php echo $form['estado']->renderError() ?>
          <?php echo $form['estado'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fecha_ultimo_control']->renderLabel() ?></th>
        <td>
          <?php echo $form['fecha_ultimo_control']->renderError() ?>
          <?php echo $form['fecha_ultimo_control'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['fecha_control']->renderLabel() ?></th>
        <td>
          <?php echo $form['fecha_control']->renderError() ?>
          <?php echo $form['fecha_control'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['restriccion']->renderLabel() ?></th>
        <td>
          <?php echo $form['restriccion']->renderError() ?>
          <?php echo $form['restriccion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['comuna_anterior']->renderLabel() ?></th>
        <td>
          <?php echo $form['comuna_anterior']->renderError() ?>
          <?php echo $form['comuna_anterior'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['porta_licencia']->renderLabel() ?></th>
        <td>
          <?php echo $form['porta_licencia']->renderError() ?>
          <?php echo $form['porta_licencia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['motivo_no_porta_licencia']->renderLabel() ?></th>
        <td>
          <?php echo $form['motivo_no_porta_licencia']->renderError() ?>
          <?php echo $form['motivo_no_porta_licencia'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['es_donante']->renderLabel() ?></th>
        <td>
          <?php echo $form['es_donante']->renderError() ?>
          <?php echo $form['es_donante'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
