<?php global $data;?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php wp_title(); ?></title>  
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo esc_url( get_template_directory_uri() )  ?>/css/grid.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo esc_url( get_template_directory_uri() )  ?>/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo esc_url( get_template_directory_uri() )  ?>/css/circle.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo esc_url( get_template_directory_uri() )  ?>/css/animate.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo esc_url( get_template_directory_uri() )  ?>/css/lightbox.css" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() )  ?>/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() )  ?>/js/lightbox.js"></script>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() )  ?>/js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() )  ?>/js/tooltip.js"></script>
    <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() )  ?>/js/js.js"></script>
    
    <?php wp_head(); ?>
    <?php if($data['google_analytics'] != ''){ echo $data['google_analytics']; } ?>
    <style>
    <?php 
      if($data['css_text']){ echo $data['css_text'];} 
      if ($data['switch_bg'] != '0') : ?>
        body{background-image:  url("<?php echo $data['custom_bg']; ?>");}

      <?php endif;
      ?>
    </style>
    <?php if($data['js_text']){ echo '<script>'.$data['js_text'].'</script>'; } ?>
    <script>
      $(document).ready(function(){
    /*$(".bg").hover(function(){
        $(this).css("margin-top", "-50px !impotant");
        }, function(){
        $(this).css("background-color", "pink");
    });*/
});
    </script>
  </head> 

  <body <?php body_class( ); ?>  id="voltarTopo">
  <!--- HEADER START -->

  <?php if(is_front_page()){ ?>
  <div class="container no-padding-top" id="banner-home" >
    <div class="section">
      <div class="col-7 no-margin">
        <?php 
        if ($data['banner_home'] == 1) :
          echo do_shortcode( '[banner_slider]' );
        endif;
      ?>
      </div> 
      <div class="col-5 no-margin">
        <section class="section header-widget">
          <div class="col-6 bg blue no-margin">
            <img src="<?php echo esc_url( get_template_directory_uri() )  ?>/images/mamadeira.png" class="icon-header mamadeira" alt="Mamadeira">
            
            <?php dynamic_sidebar( 'header-widget-area' ); ?>
          </div>
          <div class="col-6 bg blue2 no-margin">
            <img src="<?php echo esc_url( get_template_directory_uri() )  ?>/images/coracao.png" class="icon-header coracao" alt="coração">
            <?php dynamic_sidebar( 'header-widget-area2' ); ?>
          </div>
        </section>
        <section class="section header-widget">
          <div class="col-6 bg rosa no-margin">
            <img src="<?php echo esc_url( get_template_directory_uri() )  ?>/images/gravidez.png" class="icon-header" alt="gravidez">
            <?php dynamic_sidebar( 'header-widget-area3' ); ?>
          </div>
          <div class="col-6 bg rosa2 no-margin">
            <img src="<?php echo esc_url( get_template_directory_uri() )  ?>/images/dicas.png" class="icon-header" alt="dicas">
            <?php dynamic_sidebar( 'header-widget-area4' ); ?>
          </div>
        </section>
      </div>
    </div>
  </div>
  <?php } 
  if(!is_front_page()): ?>
   <div class="no-padding-top header-internas" style="" >
    </div>
  <?php endif;?>
  
  <div class="container">
    <?php if($data['media_logo'] != ''){ ?> <div id="logo"><a href="<?php echo esc_url( home_url() ) ?>"><img src="<?php echo $data['media_logo'] ?>" alt="Promillus" /></a></div> <?php } else{ ?>
        <div id="logo"><a href="<?php bloginfo('url');?>"><?php bloginfo('name');?></a></div> 
      <?php } ?>
  </div>
  <header id="header">
    <div class="container no-padding-top">
      <nav id="menu" class="default ">
        
          <?php wp_nav_menu( array( 'theme_location' => 'header-menu','container_class' => 'menu', 'menu_class'      => '' ) ); ?>
      </nav>
    </div>
  </header>   
  <!-- HEADER END --> 
  