<div id="content_wrap" class="content_bg_sidebar">
            <div class="corners_bottom_sidebar"></div><!-- end .corners_bottom_nosidebar -->
            <div class="corners_top_sidebar"></div><!-- end .corners_top_nosidebar -->     
            <div class="clear"></div><!-- end .clear --> 
            
            <div id="content">
                <h3>Seleccione el Tramite</h3>
                <table width="30%">
                    <tbody>
                        <tr>
                            <th>Tipo Tramite</th>
<!--                            <th>Tipo Licencia</th>-->
                        </tr>                        
                        <?php foreach ($tramites as $tramite): ?>
                        <tr>
                            <td><?php echo $tramite->getNombreTramite() ?></td>
                        </tr>
                        <?php endforeach; ?>
                        
                        
<!--                        <tr>
                            <td><label>Primera Licencia <input type="radio" name="tramite" style="float: right" checked="true" /></label></td>
                            <td><label>CLASE A <input type="radio" name="licencia" style="float: right" checked="true" /></label></td>
                        </tr>
                        <tr>
                            <td><label>Renovación Licencia <input type="radio" name="tramite" style="float: right" /></label></td>
                            <td><label>CLASE B <input type="radio" name="licencia" style="float: right" /></label></td>
                        </tr>-->
                    </tbody>
                </table>
                <table width="30%">
                    <tr>
                        <th>Tipo Licencia</th>
                    </tr>
                    
                    <?php foreach ($requisitos as $requisito): ?>
                        <tr>
                            <td><?php echo $requisito->getNombreRequisito() ?></td>
                        </tr>
                    <?php endforeach; ?>
                    
                </table>
                <br />
                <h4>Los Requisitos son:</h4>
                <ol>
                    <li>El meji debe mascarla</li>
                    <li>R2</li>
                    <li>R3</li>
                    <li>R4</li>
                    <li>R5</li>
                </ol>
                <h4>Además debe pasar estos examenes::</h4>
                <ol>
                    <li>E1</li>
                    <li>E2</li>
                    <li>E3</li>
                    <li>E4</li>
                    <li>E5</li>
                </ol>
                
                
                
            </div>
            <div id="sidebar">
                <div class="sidebar_box top_margin">
                    <h2><?php echo image_tag('contact_icon.png') ?>Login</h2>
                    <br />
                    <table>
                        <tr>
                            <td style="padding-right: 15px"><strong>Usuario:</strong></td>
                            <td><input type="text" size="12" /></td>
                        </tr>
                        <tr>
                            <td style="padding-right: 15px"><strong>Contraseña:</strong></td>
                            <td><input type="text" size="12" /></td>
                        </tr>     
                    </table>
                </div>
            </div>
            
            
            <div class="clear"></div>
        </div>



<h1>Tramites List</h1>

<table>
  <thead>
    <tr>
      <th>Id tramite</th>
      <th>Nombre tramite</th>
      <th>Descripcion tramite</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tramites as $tramite): ?>
    <tr>
      <td><a href="<?php echo url_for('tramite/edit?id_tramite='.$tramite->getIdTramite()) ?>"><?php echo $tramite->getIdTramite() ?></a></td>
      <td><?php echo $tramite->getNombreTramite() ?></td>
      <td><?php echo $tramite->getDescripcionTramite() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('tramite/new') ?>">New</a>
