<?php include_partial('global/is_sidebar') ?>
            
            <div id="content">
                <h3>Seleccione el Tramite y Licencia</h3>
                <br />
                <br />
                <?php echo $tramiteselect ?> <br />
                <?php echo $tipolicenciaselect ?>
                <br />
                <br />                
                <div id="requisitos"></div>                
                <div id="examenes"></div>
                
                
                
            </div>
            <?php include_partial('global/formlogin', array('formsignin' => $formsignin)) ?>
            
            
            <div class="clear"></div>
        </div>

  <script type="text/javascript">
      $(document).ready(function() {
          $('#tramite_nombre_tramite').change(function (){
              var id_licencia = $('#tipo_licencia_nombre_tipo_licencia').val();
              var id_tramite = $(this).val();
              if(id_licencia != '' && id_tramite != ''){
                  
                  $('#requisitos').load('tramite/cargar_requisitos',
                  {id_licencia:id_licencia,id_tramite:id_tramite});
                  $('#examenes').load('tramite/cargar_examenes',
                  {id_licencia:id_licencia,id_tramite:id_tramite});
              }
              else{
                  $('#requisitos').html('');
                  $('#examenes').html('');
              }
          });
          $('#tipo_licencia_nombre_tipo_licencia').change(function (){
              var id_tramite = $('#tramite_nombre_tramite').val();
              var id_licencia = $(this).val();
              if(id_licencia != '' && id_tramite != ''){
                  
                  $('#requisitos').load('tramite/cargar_requisitos',
                  {id_licencia:id_licencia,id_tramite:id_tramite});
                  $('#examenes').load('tramite/cargar_examenes',
                  {id_licencia:id_licencia,id_tramite:id_tramite});
              }
              else{
                  $('#requisitos').html('');
                  $('#examenes').html('');
              }
          });
      });
  </script>