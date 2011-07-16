<style type="text/css" title="currentStyle">			
    .ui-datepicker { width: 20em; }    
</style>	

            <?php include_partial('global/is_sidebar') ?>     
            
            <div id="content">
               <h2>Sistema de Agenda Para Licencias de Conducir</h2>
                <br />                          
                <div id="calendario" style="float:left">                                                                 
                </div>                
                <div id="modulos1">
                <?php include_partial('hora/modulos', array('matriz' => $matriz,
                                                       'dia_activo' => $dia_activo, 
                                                       'inicio' => $inicio, 
                                                       'fecha_limite' => $fecha_limite,
                                                       'num_modulos' => $num_modulos,
                                                       'indice' => $indice)) ?>
                </div>
            </div>

            <?php include_partial('global/formlogin', array('formsignin' => $formsignin)) ?>

            <div class="clear"></div>
            </div>
            
<script type="text/javascript">            
    /*    
    Cufon.replace('h1,p,.b-counter');
    Cufon.replace('.book_wrapper a', {hover:true});
    Cufon.replace('.title', {textShadow: '1px 1px #C59471', fontFamily:'ChunkFive'});
    Cufon.replace('.reference a', {textShadow: '1px 1px #C59471', fontFamily:'ChunkFive'});
    Cufon.replace('.loading', {textShadow: '1px 1px #000', fontFamily:'ChunkFive'});
    */    
      $(function(){                     
            var min= "<?php echo date('d/m/Y',strtotime($dia_activo)); ?>";
            var max= "<?php echo date('d/m/Y',strtotime($fecha_limite)); ?>";                         
            //alert("dia activo="+min);
            var dateList1= $.parseJSON('<?php echo $sf_data->getRaw('dias_no_disponibles') ?>');
            var dateList2= $.parseJSON('<?php echo $sf_data->getRaw('dias_no_disponibles2') ?>');                        
            var dateList3= $.parseJSON('<?php echo $sf_data->getRaw('dias_no_disponibles3') ?>'); 
            var dateList= dateList1.concat(dateList2).concat(dateList3);                                     
            var indice=0;
            
            $('#calendario').datepicker({                                     
            //defaultDate: $.datepicker.parseDate("dd/mm/yy",'12/06/2011'),
            currentText: 'Now',            
            minDate: min,
            maxDate: max,
            //showCurrentAtPos: 3,
            beforeShowDay:                            
                function(dateToShow){                                 
                return [ //$.inArray($.datepicker.formatDate('dd/mm/yy', dateToShow),dateList) == -1 ? [true, ''] : [true, 'css-class-to-highlight', 'tool-tip-text'];
                    ($.inArray($.datepicker.formatDate('dd/mm/yy', dateToShow),dateList) == -1),'css-class-to-highlight',''];                                
                },               
            onSelect: function(dateText,ins){                
                var fechaSeleccionada= convertFecha(dateText.toString());  
                var fechaInicial= convertFecha(min.toString());                                                      
                indice= (Date.parse(fechaSeleccionada)-Date.parse(fechaInicial))/(24*60*60*1000);                
                $('#booklet').booklet(indice);                
                }                
            });                                               
            
           $('#modulos1 label').live('click',function() {              
              var hora= $(this).attr('id');
              var dia= $(this).attr('class');              
              var fechaSeleccionada= convertFecha2(dia.toString());                
              var fechaInicial= convertFecha(min.toString());                     
              indice= (Date.parse(fechaSeleccionada)-Date.parse(fechaInicial))/(24*60*60*1000);                                            
              //alert("INDICE="+indice);
              $('#modulos1').load('inicio/tomar_hora',{hora: hora, 
                                                       dia: dia, 
                                                       dia_activo: min, 
                                                       fecha_limite: max,
                                                       indice: indice});                                
            });                                          
     });
     
        function convertFecha(fechaIn)
        {
            var arreglo= new Array();            
            arreglo= fechaIn.split("/");            
            var fechaOut=arreglo[1]+"/"+arreglo[0]+"/"+arreglo[2];
            return fechaOut;                
        }
        
        function convertFecha2(fechaIn)
        {
            var arreglo= new Array();            
            arreglo= fechaIn.split("-");            
            var fechaOut=arreglo[1]+"/"+arreglo[0]+"/"+arreglo[2];
            return fechaOut;                
        }
  </script>