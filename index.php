<?php get_header(); ?>
<div class="header-img-pc"><img src="<?php echo get_template_directory_uri(); ?>/images/header.png" alt=""></div>
<div class="header-img-sp"><img src="<?php echo get_template_directory_uri(); ?>/images/header-sp.png" alt=""></div>

<div id="content">

<div class="wrap">

    <?php
    if( !( is_home() || is_front_page() ) ){
      // パンくず
      bzb_breadcrumb();

    } ?>
  <div id="main" <?php bzb_layout_main(); ?> role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
    <div class="main-inner">


    <?php if( !( is_home() || is_front_page() ) ){?>

      <section class="cat-content">
        <header class="cat-header">
          <h1 class="post-title" ><?php bzb_title(); ?></h1>
        </header>
      </section>

    <?php } ?>

    <div class="post-loop-wrap">
    <?php
			if ( have_posts() ) :

				while ( have_posts() ) : the_post();

    ?>
    <article id="post-<?php echo the_ID(); ?>" <?php post_class(); ?> >

      <header class="post-header">
        <ul class="post-meta list-inline">
          <li class="date updated"><i class="fa fa-clock-o"></i> <?php the_time('Y.m.d');?></li>
        </ul>
      </header>

      <section class="post-content">

        <?php if( get_the_post_thumbnail() ) { ?>
        <div class="post-thumbnail">
          <a href="<?php the_permalink(); ?>" rel="nofollow"><?php the_post_thumbnail('large'); ?></a>
        </div>
        <?php } ?>

        <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php esc_html(the_title()); ?></a></h2>

      </section>

    </article>

    <?php

				endwhile;

			else :
		?>

    <article id="post-404"class="cotent-none post">
      <section class="post-content">
        <?php echo get_template_part('content', 'none'); ?>
      </section>
    </article>

    <?php
			endif;
		?>

<?php if (function_exists("pagination")) {
    pagination($wp_query->max_num_pages);
} ?>

    </div><!-- /post-loop-wrap -->



    </div><!-- /main-inner -->
  </div><!-- /main -->

<?php get_sidebar(); ?>

</div><!-- /wrap -->

</div><!-- /content -->

<?php get_footer(); ?>


