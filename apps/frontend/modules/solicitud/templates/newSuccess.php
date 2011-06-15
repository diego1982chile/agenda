<?php include_partial('global/is_sidebar') ?>
<div id="content">
    
    
    <?php include_partial('form', array('form' => $form)) ?>
    
    
</div>
<div class="clear"></div>
</div>
<script type="text/javascript">
    $("#solicitud_licencia_fecha_ultimo_control").datepicker($.datepicker.regional['es'], {        
        minDate: -1,
        maxDate: 1
    });
</script>

