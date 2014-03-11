<?php
/**
 * Template Name: Archives
 *
 * The template for display all categories and all posts in ascending order.
 *
 * @package lean
 * @version	1.0
 * @since 	1.0
 */
?>
<?php get_header(); ?>
<?php $presentation_options = get_option( 'theme_presentation_options' ); ?>
<div class="row crumbs">
<div class="container crumbs">
<?php get_template_part( 'breadcrumbs' ); ?>
</div><!-- /crumbs -->
</div><!-- /row crumbs -->
    <div id="wrapper">
        <div class="container">
            <div class="row">

                <section id="main"
                         role="main"
                         class="col-12
                        <?php echo 'full_width_layout' == $presentation_options['layout'] ? 'col-md-12' : 'col-md-8 col-sm-8'; ?>
                        <?php echo 'left_sidebar_layout' == $presentation_options['layout'] ? ' col-md-push-4' : ''; ?>">

                    <?php if ( have_posts() ) { ?>
                        <?php while ( have_posts() ) { ?>
                            <?php the_post(); ?>
                            <article id="post-<?php the_ID(); ?> format-standard" <?php post_class( 'post panel panel-default' ); ?>>
                                <div id="content-<?php the_ID(); ?>" class="entry-content clearfix">
                                    <div class="content">
                                        <?php the_content(); ?>

                                        <h2 id="posts"><span class="fa fa-calendar"></span> <?php _e( 'All Posts', TRANSLATION_KEY); ?></h2>

                                        <?php

                                        /* Budget web hosts make it difficult to pull back a lot of posts.
                                         * To combat this, we're going to introduce pagination into the
                                         * 'All Posts' section.
                                         */
                                        $display_count = 2;
                                        $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
                                        $offset = ( $page - 1 ) * $display_count;

                                        $args = array(
                                            'post_type'				=>	'post',
                                            'orderby'				=>	'date',
                                            'order'					=>	'desc',
                                            'post_status'			=>	'publish',
                                            'ignore_sticky_posts'	=>	true,
                                            'posts_per_page'		=>	500,
                                            'number'     			=>  $display_count,
                                            'page'       			=>  $page,
                                            'offset'     			=>  $offset
                                        );
                                        $post_query = new WP_Query( $args );

                                        if( $post_query->have_posts() ) { ?>
                                            <p>
                                            <?php while( $post_query->have_posts() ) { ?>
                                                <?php $post_query->the_post(); ?>
                                                <ul class="archive-list-posts">
                                                    <li>
                                                        <span class="archive-title">
                                                            <a href="<?php echo get_permalink(); ?>">
                                                                <?php echo get_the_title(); ?>
                                                            </a>
                                                        </span>
                                                        &nbsp;&mdash;&nbsp;
                                                        <span class="archive-date">
                                                            <?php echo get_the_time( get_option( 'date_format' ), get_the_ID() ); ?>
                                                        </span>

                                                    </li>
                                                </ul>
                                            <?php } // end while ?>

                                            <ul id="archives-post-pager" class="pager">
                                                <li class="previous">
                                                    <?php previous_posts_link( '<span class="fa fa-cheveron-left"></span> Previous Posts', $post_query->max_num_pages ); ?>
                                                </li>
                                                <li class="next">
                                                    <?php next_posts_link( 'Next Posts <span class="fa fa-cheveron-right"></span>', $post_query->max_num_pages ); ?>
                                                </li>
                                            </ul><!-- /.pager -->

                                            <?php wp_reset_postdata(); ?>

                                            </p>
                                        <?php } else { ?>
                                            <p><?php _e( 'You have no posts.', TRANSLATION_KEY ); ?></p>
                                        <?php } // end if ?>

                                        <h2 id="pages"><span class="fa fa-list-alt"></span> <?php _e( 'All Pages', TRANSLATION_KEY); ?></h2>

                                        <?php
                                        $args = array(
                                            'post_type'			=>	'page',
                                            'orderby'			=>	'date',
                                            'order'				=>	'desc',
                                            'post_status'		=>	'publish',
                                            'posts_per_page'	=>	500
                                        );
                                        $post_query = new WP_Query( $args );

                                        if( $post_query->have_posts() ) { ?>
                                            <p>
                                            <?php
                                            while( $post_query->have_posts() ) {
                                                $post_query->the_post(); ?>
                                                <ul class="archive-list-pages clearfix">
                                                    <li>
                                                        <span class="archive-title">
                                                            <a href="<?php echo get_permalink(); ?>">
                                                                <?php echo get_the_title(); ?>
                                                            </a>
                                                        </span>
                                                    </li>
                                                </ul>
                                            <?php } // end while
                                            wp_reset_postdata();
                                            ?>
                                            </p>
                                        <?php } else { ?>
                                            <p><?php _e( 'You have no pages.', TRANSLATION_KEY ); ?></p>
                                        <?php } // end if ?>

                                        <h2 id="categories"><span class="fa fa-list"></span> <?php _e( 'All Categories', TRANSLATION_KEY); ?></h2>
                                        <?php $categories = get_categories( 'hide_empty=1' ); ?>
                                        <?php if( count( $categories) > 0 ) { ?>
                                            <p>
                                            <ul class="archive-list-categories clearfix">
                                                <?php foreach( $categories as $category ) { ?>
                                                    <li><a href="<?php echo get_category_link( $category->cat_ID ); ?>"><?php echo $category->cat_name; ?></a></li>
                                                <?php } // end foreach ?>
                                            </ul>
                                            </p>
                                        <?php } else { ?>
                                            <p><?php _e( 'You have no categories.', TRANSLATION_KEY); ?></p>
                                        <?php } // end if/else ?>


                                    </div><!-- /.entry-content -->
                                </div><!-- /.entry-content -->
                            </article> <!-- /#post -->
                        <?php } // end while ?>
                    <?php } // end if ?>
                </section><!-- /#main -->

                <?php get_sidebar(); ?>

            </div><!--/ row -->
        </div><!--/container -->
    </div> <!-- /#wrapper -->
<?php get_footer(); ?>