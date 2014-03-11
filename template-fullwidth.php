<?php
/**
 * Template Name: Full-Width Template
 *
 * The template for rendering pages without sidebars.
 *
 * @package lean
 * @version	1.
 * @since 	1.0
 */
?>
<?php get_header(); ?>
<div class="row crumbs">
<div class="container crumbs">
<?php get_template_part( 'breadcrumbs' ); ?>
</div><!-- /crumbs -->
</div><!-- /row crumbs -->
    <div id="wrapper">
        <div class="container">
            <div class="row">
                 <section id="main" class="col-12 col-md-12" role="main">

                    <?php if ( have_posts() ) { ?>
                        <?php while ( have_posts() ) { ?>
                            <?php the_post(); ?>
                            <article id="post-<?php the_ID(); ?> format-standard" <?php post_class( 'post panel panel-default' ); ?>>
                                <div id="content-<?php the_ID(); ?>" class="entry-content">
                                    <?php the_content(); ?>
                                </div><!-- /.entry-content -->
                            </article> <!-- /#post -->
                        <?php } // end while ?>
                    <?php } // end if ?>
                    <?php comments_template( '', true ); ?>
                </section><!-- /#main -->

            </div><!--/row -->
        </div><!-- /container -->
    </div> <!-- /#wrapper -->
<?php get_footer(); ?>