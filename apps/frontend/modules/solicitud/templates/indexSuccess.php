<h1>Solicitud licencias List</h1>

<table>
  <thead>
    <tr>
      <th>Id solicitud</th>
      <th>Id tramite</th>
      <th>Rut</th>
      <th>User</th>
      <th>Id pago</th>
      <th>Id hora</th>
      <th>Id tipo licencia</th>
      <th>Estado</th>
      <th>Fecha ultimo control</th>
      <th>Fecha control</th>
      <th>Restriccion</th>
      <th>Comuna anterior</th>
      <th>Porta licencia</th>
      <th>Motivo no porta licencia</th>
      <th>Es donante</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($solicitud_licencias as $solicitud_licencia): ?>
    <tr>
      <td><a href="<?php echo url_for('solicitud/edit?id_solicitud='.$solicitud_licencia->getIdSolicitud()) ?>"><?php echo $solicitud_licencia->getIdSolicitud() ?></a></td>
      <td><?php echo $solicitud_licencia->getIdTramite() ?></td>
      <td><?php echo $solicitud_licencia->getRut() ?></td>
      <td><?php echo $solicitud_licencia->getUserId() ?></td>
      <td><?php echo $solicitud_licencia->getIdPago() ?></td>
      <td><?php echo $solicitud_licencia->getIdHora() ?></td>
      <td><?php echo $solicitud_licencia->getIdTipoLicencia() ?></td>
      <td><?php echo $solicitud_licencia->getEstado() ?></td>
      <td><?php echo $solicitud_licencia->getFechaUltimoControl() ?></td>
      <td><?php echo $solicitud_licencia->getFechaControl() ?></td>
      <td><?php echo $solicitud_licencia->getRestriccion() ?></td>
      <td><?php echo $solicitud_licencia->getComunaAnterior() ?></td>
      <td><?php echo $solicitud_licencia->getPortaLicencia() ?></td>
      <td><?php echo $solicitud_licencia->getMotivoNoPortaLicencia() ?></td>
      <td><?php echo $solicitud_licencia->getEsDonante() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('solicitud/new') ?>">New</a>
