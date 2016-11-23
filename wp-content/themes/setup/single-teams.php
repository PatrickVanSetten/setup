<?php
/**
 * Template Name: Teampagina
 */
get_header(); ?>

<header>
    <div class="container-fluid">
        <div class="intro-wrapper">
            <div class="intro-title"><?php the_field('subtitle'); ?></div>
            <h1><?php the_title(); ?></h1>
            <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
        </div>
    </div>
</header>

<section id="projecten" class="">
    <div class="container-fluid">
        <div class="intro-wrapper">
            <div class="intro-title"><?php the_field('subtitle'); ?></div>
            <h1><?php the_title(); ?></h1>
            <?php while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; // end of the loop. ?>
        </div>
    </div>
</section>
      
<?php get_footer();?>