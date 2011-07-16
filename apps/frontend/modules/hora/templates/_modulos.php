<div id="booklet" style="width: 50%;float:right">                                                                       
<div class="b-load">  
<?php                     
$cont_dias= $dia_activo;
$matriz= $sf_data->getRaw('matriz');

/*
echo "DIA_ACTIVO=".$dia_activo."<br>";
echo "FECHA_LIMI=".$fecha_limite."<br>";
echo "INICIO=".$inicio."<br>";
echo "NOM_MODULOS=".$num_modulos."<br>";    
echo "MATRIZ=".$matriz."<br>";
*/
while(date('Y-m-d',strtotime($cont_dias)) < date('Y-m-d',strtotime($fecha_limite)))
{  
$cont_horas=0;    
$hora=$inicio;
?>
<div style=" width: 100%; height: 100%">                                    
<h6>   
<?php echo $cont_dias."<br><br>";                                                                       
$key= date('Y-m-d',strtotime($cont_dias));

if(array_key_exists($key,$matriz))
{                 
    //echo "HOLA!!!<br>";
    while($cont_horas < $num_modulos)
    {
        $hora= date('H:i:s',strtotime($hora));                        

        if(in_array($hora,$matriz[$key]))
        {                                                         
              echo date("H:i",strtotime($hora)).":TOMADA <br>";                        
        }
        else
        { ?>                      
              <?php echo date("H:i",strtotime($hora)) ?><label id="<?php echo $hora?>" class="<?php echo $cont_dias ?>" style="cursor:pointer;color:#1c94c4">:TOMAR</label>
              <br>                      
        <?php
        }                
        $cont_horas++;
        $hora= date('H:i',strtotime($hora."+1 hours"));
    }
}
else
{
    while($cont_horas < $num_modulos)
    {
        $hora= date('H:i:s',strtotime($hora));                                
        {?>                
              <?php echo date("H:i",strtotime($hora)) ?><label id="<?php echo $hora?>" class="<?php echo $cont_dias ?>" style="cursor:pointer;color:#1c94c4">:TOMAR</label>
              <br>                      
        <?php
        }                
        $cont_horas++;
        $hora= date('H:i',strtotime($hora."+1 hours"));        
    }
}
?>       
</h6>
</div>
<?php
$cont_dias= date('d-m-Y',strtotime($cont_dias."+1 days"));
} ?> 
</div>                                                                         
</div>                                                                                  

<script type="text/javascript">

$(function(){     
var indice= "<?php echo $indice ?>"; 
var indice= parseInt(indice); 
/*if(indice%2==0)
    indice++;
   */

$('#booklet').booklet({
               startingPage:       indice,
               width:              320,
               height:             200,
               hovers:            false,
               speed:              500,
               pageNumbers:        false,
               shadows:            true,
               // display shadows on page animations
               //manual:            false,
               
               shadowTopFwdWidth:  166,
                // shadow width for top forward anim
               shadowTopBackWidth: 166,
                // shadow width for top back anim
               shadowBtmWidth:     50,
               covers:             true
                // shadow width for bottom shadow
               });
//$('#booklet').booklet(indice);               
});
</script>