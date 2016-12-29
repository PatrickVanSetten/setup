<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title ><?php wp_title( '|', true, 'right' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php wp_head(); ?>
<script src="<?= get_template_directory_uri()?>/assets/js/modernizr.custom.js"></script>       
</head>
<body <?php body_class( $class ); ?>>
    
<section id="navbar" class="pan hidden-sm hidden-xs">
    <div class="adressbarright widthcalc"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-4 brand">
                <a class="logo" href="/"><img src="<?= get_template_directory_uri()?>/assets/img/logo.svg" alt="Logo"/></a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 hidden-xs adressbartop">
                <span>Marktstraat 59, 3925 JP Scherpenzeel</span>
                <?php wp_nav_menu(array('container' => false, 'theme_location' => 'secondary', 'items_wrap' => '%3$s', 'depth' => 0));?>
            </div>
            <div class="menuwrapper text-right">
                <?php wp_nav_menu(array('container' => false, 'theme_location' => 'primary', 'items_wrap' => '%3$s', 'depth' => 0));?>
            </div>
        </div>
    </div>
</section>    
    
<section id="mobile-header" class="ptn pbn navbar-fixed-top">
    <div class="container-fluid">
        <div class="brand">
            <a class="logo" href="/"><img src="<?= get_template_directory_uri()?>/assets/img/logo.svg" alt="Logo"/></a>
        </div>
        <button id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
    <div id="mobile-nav" class="ptn pbn">
        <div class="table-cell">
            <?php wp_nav_menu(array('container' => false, 'theme_location' => 'primary', 'items_wrap' => '%3$s', 'depth' => 0));?>
        </div>
    </div>
</section>

<section id="crumble-path" class="pan">
     <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                 <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('
                    <p id="breadcrumbs">','</p>
                    ');
                    }
                ?>
            </div>
        </div>
    </div>
</section>

    
<?php if ( is_page_template( 'single-teams.php' ) ) { ?>
        
<?php 
    $thumb1 = get_field('teamfoto'); 
    $image1 = vt_resize( $thumb1, '', 1600, 1200, true );
?>
<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <div class="image" style="background-image:url('<?php echo $image1[url]; ?>')"></div>
            </div>
        </div>
    </div>
</header>

<?php } else { ?>
    
<?php } ?>  
    
