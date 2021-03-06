<?php
/**
 * The template for displaying single pages.
 *
 * @package lean
 * @version	1.4.1
 * @since 	1.0
 */
?>
<?php get_header(); ?>
<?php $presentation_options = get_option( 'theme_presentation_options' ); ?>

<div id="wrapper">
	<div class="container">
		<div class="row">

            <section id="main" class="<?php echo get_section_class(); ?>" role="main">

                <?php if( ! is_front_page() ) { ?>
                        <?php get_template_part( 'breadcrumbs' ); ?>
                <?php } // end if ?>

                <?php if ( have_posts() ) { ?>
                    <?php while ( have_posts() ) { ?>
                        <?php the_post(); ?>
                        <article id="post-<?php the_ID(); ?> format-standard" <?php post_class( 'post panel panel-default' ); ?>>
                            <div id="content-<?php the_ID(); ?>" class="entry-content clearfix">
                                <div class="content">
                                    <?php the_content(); ?>
                                </div><!-- /.entry-content -->
                            </div><!-- /.entry-content -->
                        </article> <!-- /#post -->
                    <?php } // end while ?>
                <?php } // end if ?>
                <?php comments_template( '', true ); ?>
            </section><!-- /#main -->

            <?php get_sidebar(); ?>

		</div><!--/ row -->
	</div><!--/container -->
</div> <!-- /#wrapper -->
<?php get_footer(); ?>