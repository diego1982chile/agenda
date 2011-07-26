<!--<style>
	#demo-frame > div.demo { padding: 10px !important; }
	#feedback { font-size: 1.4em; }
	#modulos .ui-selecting { background: #FECA40; }
	#modulos .ui-selected { background: #F39814; color: white; }
	#modulos { list-style-type: none; margin: 0; padding: 0; width: 10%; }
        #modulos li { margin: 3px; padding: 0.4em; font-size: 1em; height: 12px; background: #ccccff; }
        #droppable { width: 100px; height: 150px; padding: 0.5em; float: left; margin: 10px; }                
</style>-->

<!--<div id="content_wrap" class="content_bg_sidebar">
            <div class="corners_bottom_sidebar"></div> end .corners_bottom_nosidebar 
            <div class="corners_top_sidebar"></div> end .corners_top_nosidebar -->
   
    
<div id="tabs">        
	<ul>
		<li><a href="#tabs-1">Configuración parámetros</a></li>
		<li><a href="#tabs-2">Habilitar/Deshabilitar dias/horas</a></li>		
	</ul>
	<div id="tabs-1" style=" min-height: 300px">
            <!--div id="sliders"-->
            <div class="clear"></div>
            
            <div id="content"> 
            <div class="demo">
            <h3>Ventana fechas disponibilidad:</h3>
              <table style=" width: 100%;margin-left: 0em; margin-right: 0em">
                    <thead>                        
                        <th style=" text-align: center">0sem</th>
                        <th style=" text-align: center">1sem</th>                        
                        <th style=" text-align: center">2sem</th>
                        <th style=" text-align: center">3sem</th>
                        <th style=" text-align: center">4sem</th>
                        <th style=" text-align: center">5sem</th>
                        <th style=" text-align: center">6sem</th>
                        <th style=" text-align: center">7sem</th>
                        <th style=" text-align: center">8sem</th>
                        <th style=" text-align: center">9sem</th>                                                              
                    </thead>
                </table>  
            </div>          
            <div id="slider-range-min1" style=" margin-left: 1.8em; margin-right: 1.8em"></div>           
            <div align="center"></div>            
            
           
            <div class="demo">
                <br>
                <h3>Rango horas disponibilidad</h3>
                <table style=" width: 100%; font-size: 0.9em">
                    <thead>
                        <th style=" text-align: center">08:00</th>
                        <th style=" text-align: center">09:00</th>
                        <th style=" text-align: center">10:00</th>
                        <th style=" text-align: center">11:00</th>
                        <th style=" text-align: center">12:00</th>
                        <th style=" text-align: center">13:00</th>
                        <th style=" text-align: center">14:00</th>
                        <th style=" text-align: center">15:00</th>
                        <th style=" text-align: center">16:00</th>
                        <th style=" text-align: center">17:00</th>
                        <th style=" text-align: center">18:00</th>
                        <th style=" text-align: center">19:00</th>
                        <th style=" text-align: center">20:00</th>
                    </thead>
                </table>              
            <div id="slider-range" style=" margin-left: 1.5em; margin-right: 1.5em">                
            </div>         
                <br>
            </div><!-- End demo -->
                        
            <div class="demo">
            <h3>Periodo de atención:</h3>
              <table style=" width: 100%;margin-left: 0em; margin-right: 0em">
                    <thead>                        
                        <th style=" text-align: center">00'</th>
                        <th style=" text-align: center">10'</th>
                        <th style=" text-align: center">20'</th>
                        <th style=" text-align: center">30'</th>
                        <th style=" text-align: center">40'</th>
                        <th style=" text-align: center">50'</th>
                        <th style=" text-align: center">60'</th>
                        <th style=" text-align: center">70'</th>
                        <th style=" text-align: center">80'</th>
                        <th style=" text-align: center">90'</th>                                      
                    </thead>
                </table>              
            <div id="slider-range-min" style=" margin-left: 1.8em; margin-right: 1.8em"></div>                        
            </div><!-- End demo -->
            </div>            
            <div id="sidebar">               
                  <div id="modulos" style="width:100%;height: 250px">
                  </div>                                                 
            </div>                
            <div class="clear"></div>                            
            <div align="right">
                   <button id="boton_guardar">Guardar</button>
                   <button id="boton_cancelar">Cancelar</button>
            </div>
           
       </div><!-- End demo -->	
	<div id="tabs-2">
            <div id="calendario" style="float:left;width: 40%"></div>                
	</div>	
</div>                                                                                       
</div>              


<div class="clear"></div> 
</div>                        

   <script>
             
        var min=0;
        var max=4;
        var periodo=30;

        $(function() {				
           render_modulos(min+8,max+8,periodo);                        
        });

	$(function() {            
            
                $( "#slider-range-min1" ).slider({
			range: "min",			
			min: 0,
			max: 9,
                        value: 4,       
			//values: [ 0, 12 ],                                                
			slide: function( event, ui ) {				                                
			}
		});
            
		$("#slider-range").slider({
			range: true,
			min: 0,
			max: 12,                        
			values: [ 0, 4 ],                        
			slide: function( event, ui ) {	                                
                                min= ui.values[ 0 ];
                                max= ui.values[ 1 ];                                                                                                
                                render_modulos(min+8,max+8,periodo);                                
			}                       
		});				
                
                $( "#slider-range-min" ).slider({
			range: "min",			
			min: 0,
			max: 9,
                        value: 3,       
			//values: [ 0, 12 ],                                                
			slide: function( event, ui ) {	
                            periodo=ui.value*10;
                            render_modulos(min+8,max+8,periodo);                                                             
			}
		});		
	});                        
        
        function render_modulos(hora_ini,hora_fin,periodo){
        
        var ini= new Date(0,0,0,hora_ini,0,0,0);            
        var fin= new Date(0,0,0,hora_fin,0,0,0);                                    
        var html="<table id='tabla_modulos' class='display'><thead><tr><th style='width:50%'>MODULO</th><th style='width:50%'>HORA</th></tr></thead><tbody>";
       
        //alert(periodo);
        var cont=1;    
        
            while(ini<fin)
            {                
                //$('#modulos').html("<ol>");
                html= html.concat("<tr><td>"+"MOD_"+cont+"</td><td>"+ini.toString().substr(16,5)+"</td></tr>");                
                ini.setMinutes(ini.getMinutes()+periodo);                
                cont++;
               // alert(ini);
            }
            
            html.concat("</tbody></table>");
            $('#modulos').html(html);
            $('#tabla_modulos').dataTable({
                "bJQueryUI": true,
		"bPaginate": true,
		//"sScrollY": "180px",
		//"sPaginationType": "full_numbers",
                "bLengthChange": false,
		"bFilter": false,
                "bSort": false, 
                "iDisplayLength": 8,
                "bInfo": true,
                "oLanguage":{
                "sEmptyTable": "Procesando...",
                "sInfoEmpty": "No hay registros para mostrar",
                "sProcessing": "",
                "sZeroRecords": "No hay registros para mostrar",
                "sLoadingRecords": "Por favor espere - CARGANDO...",
                "sSearch": "Buscar:",
                "sInfo": "_TOTAL_ Módulos (_START_ a _END_)",
                "sDom": '<"head-toolbar  fg-toolbar ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix"lfr>t<"F"ip>'
                }
            }            
            );
            
            $(".fg-toolbar ui-toolbar ui-widget-header ui-corner-tl ui-corner-tr ui-helper-clearfix").html('<b>MODULOS</b>');            
        }
        
        $('#boton_guardar').click(function(){
            var inicio=$("#slider-range").slider("values",0)+8;
            var modulos=$("#tabla_modulos").dataTable().fnSettings().fnRecordsTotal();
            var intervalo_horas=$("#slider-range-min").slider("value");
            var lim_fecha_atencion=$("#slider-range-min1").slider("value")*7;            
        
            alert("inicio="+inicio);
            alert("modulos="+modulos);
            alert("intervalo_horas="+intervalo_horas);
            alert("lim_fecha_atencion="+lim_fecha_atencion);            
            
            $('#tabla_modulos').load("<?php echo url_for('configuracion/guardar_parametros') ?>",
                                                    {inicio: inicio, 
                                                     modulos: modulos, 
                                                     intervalo_horas: intervalo_horas, 
                                                     lim_fecha_atencion: lim_fecha_atencion});
           
                                                    
        });
        
        $(function() {
		$( "#tabs" ).tabs();
	});
        
        $('#boton_guardar').button();
        $('#boton_cancelar').button();
	
        var min= "<?php echo date('d/m/Y',strtotime($dia_activo)); ?>";
            var max= "<?php echo date('d/m/Y',strtotime($fecha_limite)); ?>";                         
            //alert("dia activo="+min);
            var dateList1= $.parseJSON('<?php echo $sf_data->getRaw('dias_no_disponibles') ?>');
            var dateList2= $.parseJSON('<?php echo $sf_data->getRaw('dias_no_disponibles2') ?>');                        
            var dateList3= $.parseJSON('<?php echo $sf_data->getRaw('dias_no_disponibles3') ?>'); 
            var dateList= dateList1.concat(dateList2).concat(dateList3);                                     
            var indice=0;
            
            alert(dateList);
        
        $('#calendario').datepicker({                                     
            //defaultDate: $.datepicker.parseDate("dd/mm/yy",'12/06/2011'),
            currentText: 'Now',            
            minDate: min,
            maxDate: max,
            //showCurrentAtPos: 3,
            beforeShowDay:                            
                function(dateToShow){                                 
                return [ //$.inArray($.datepicker.formatDate('dd/mm/yy', dateToShow),dateList) == -1 ? [true, ''] : [true, 'css-class-to-highlight', 'tool-tip-text'];
                    ($.inArray($.datepicker.formatDate('dd/mm/yy', dateToShow),dateList) <= -1),'css-class-to-highlight',''];                                
                },               
            onSelect: function(dateText,ins){                
                var fechaSeleccionada= convertFecha(dateText.toString());  
                var fechaInicial= convertFecha(min.toString());                                                      
                indice= (Date.parse(fechaSeleccionada)-Date.parse(fechaInicial))/(24*60*60*1000);                
                $('#booklet').booklet(indice);                
                }                
            });                                               
        
    </script>
        