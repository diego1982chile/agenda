<?php if ($sf_user->isAuthenticated()) : ?>
<div style="float: right">
    <ul class="sf-menu">
        <li>
            <a href="#">Bienvenido <strong style="color: blueviolet"><?php echo $sf_user->getGuardUser()->getUsername()  ?> </strong></a>
            <ul>
                <li><a href="#">Editar tus datos</a></li>
                <li><a href="<?php echo url_for('sfGuardAuth/signout') ?>">Salir/Cerrar sesion</a></li>
            </ul>
        </li>
    </ul>
</div>        
<?php endif; ?>