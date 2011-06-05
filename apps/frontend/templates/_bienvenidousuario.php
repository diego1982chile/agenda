<?php if ($sf_user->isAuthenticated()) : ?>
        <div style="float: right">
<!--            <ul id="login">
                <li style="overflow: hidden"><a href="#">Home</a></li>
                <li><a href="#">Services</a></li>  
            </ul>-->
                Bienvenido <strong><?php echo $sf_user->getGuardUser()->getUsername()  ?> </strong>
                        <a href="<?php echo url_for('sfGuardAuth/signout') ?>">Logout</a>
            </p>
        </div>
        
<?php endif; ?>
<script type="text/javascript">
    $(document).ready(function() { 
        $("#login li").hover(function() {
            $(this).stop().animate({
                marginRight: "-70"
            },250);
            } , function() {
                $(this).stop().animate({
                    marginRight: "0"
                }, 250);
            });
            
    });
</script>