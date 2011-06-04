<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <script type="text/javascript">
		// initialise plugins
		jQuery(function(){
			jQuery('ul.sf-menu').superfish();
		});
    </script>
  </head>
  <body>
      <div id="main-container">
          <div id="header">
            <a href="index.html" name="top" class="logo_link"></a>
          </div><!-- end #header -->
          
          <div id="menu_wrap">
        <ul class="sf-menu">
            <li>
                <a href="<?php echo url_for('inicio/index') ?>" class="current">Inicio</a>
            </li>
             <li>
                <a href="<?php echo url_for('tramite/index') ?>">Tramites</a>
                <ul>
                    <li><a href="404.html">Primera Licencia</a></li>
                    <li><a href="#">Renovación</a></li>
                    <li><a href="#">Duplicado</a></li>
                    <li><a href="#">Control</a></li>
                    <li><a href="#">Cambio Domicilio</a></li>
                </ul>
            </li>
            
            <li>
                <a href="portfolio.html">Portfolio</a>
                <ul>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Prints</a></li>
                    <li><a href="#">Branding</a></li>
                    <li><a href="#">Photography</a></li>
                    <li><a href="#">Another Service</a></li>
                </ul>
            </li>
            <li>
                <a href="blog.html">Blog</a>
            </li>
            <li>
                <a href="contact.html">Contact</a>
            </li>	
		</ul><!-- end .sf-menu -->
    
        <div id="free_for_job"></div><!-- end #free_for_job -->
        </div><!-- end #menu_wrap -->
        
        <div id="small_banner_wrap" class="banner_about">
		Departamento de Licencias de Conducir
        </div><!-- end #banner_wrap -->
        
        <?php echo $sf_content ?>
        
        
      </div>
    
  </body>
</html>
