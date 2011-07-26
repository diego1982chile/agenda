            <?php include_partial('global/is_sidebar') ?>           
            
            
            
            <div id="content">
                <?php if ($sf_user->hasFlash('notice')): ?>
                <div class="ui-state-highlight ui-corner-all" style="padding: 10px"> 
                    <p style="padding: 0px"><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
                    <strong><?php echo $sf_user->getFlash('notice') ?></strong></p>                    
                </div>
                <br />
                <?php endif; ?>
                <h2>AHORRE TIEMPO:</h2>
                <p>Aquí podrá pedir horas de atención, pagar sus tramites y ahorrar valioso tiempo sin necesidad de hacer las filas o colas de siempre.</p>
                <h3>EN ESTA WEB USTED, PODRÁ:</h3>
                <ul>
                    <li>Pedir hora para obtener(o cambiar) su licencia de conducir</li>
                    <li>Pagar las licencias de conducir online</li>
                    <li>Ver requisitos, exámenes y precios necesarios para obtener las licencias</li>
                    <li>Obtener toda la información que necesite</li>
                </ul>               
            </div>
            
            <?php include_partial('global/formlogin', array('formsignin' => $formsignin)) ?>
            
            
            <div class="clear"></div>
        </div>

