<?php
/**
 * Template Name: Homepage Template
 *
 * The template for rendering the homepage.
 *
 * @package lean
 * @version	1.0
 * @since 	1.0
 */
?>
<?php get_header(); ?>

    <div id="wrapper">
        <div class="container">
            <div class="row">
                <section id="main" class="col-md-12 clearfix" role="main">

                    <?php get_template_part( 'breadcrumbs' ); ?>

                    <?php if ( have_posts() ) { ?>
                        <?php while ( have_posts() ) { ?>
                            <?php the_post(); ?>
                            <article id="post-<?php the_ID(); ?> format-standard" <?php post_class( 'post panel panel-default' ); ?>>
	                            <div class="jumbotron">
		                            <h1><?php the_title(); ?></h1>
		                            <div id="content-<?php the_ID(); ?>" class="entry-content">
                                    	<?php the_content(); ?>
									</div><!-- /.entry-content -->
	                            </div><!-- /jumbotron -->
                                <div class="row homepage">
									  <div class="col-sm-6 col-md-4">
									    <div class="thumbnail">
										    <div class="thumb-image">
										   	 <img class="img-responsive" src="<?php global $post; $thumbs = get_post_meta( $post->ID, '_wpb_thumbs_image1', true ); echo $thumbs; ?>" alt="<?php echo get_the_title($ID); ?>">
										    </div><!-- /thumb-image -->
									      <div class="caption">
									      <?php global $post; $thumbs = get_post_meta( $post->ID, '_wpb_thumbs_title1', true );?>
									        <h3><?php echo $thumbs; ?></h3>
									        <?php global $post; $thumbs = get_post_meta( $post->ID, '_wpb_thumbs_des1', true );?>
									        <p class="intro"><?php echo $thumbs; ?></p>
									         <?php global $post; $thumbs = get_post_meta( $post->ID, '_wpb_thumbs_link1', true );?>
									        <p><a href="/griffin/<?php echo $thumbs; ?>" class="btn btn-primary" role="button">Learn more</a></p>
									      </div><!-- /caption -->
									    </div><!-- /thumbnail -->
									  </div><!-- /col -->
									  <div class="col-sm-6 col-md-4">
									    <div class="thumbnail">
									    <div class="thumb-image clearfix">
									    <img class="img-responsive" src="<?php global $post; $thumbs = get_post_meta( $post->ID, '_wpb_thumbs_image2', true ); echo $thumbs; ?>" alt="<?php echo get_the_title($ID); ?>">
									    </div><!-- /thumb-image -->
									      <div class="caption">
									      <?php global $post; $thumbs = get_post_meta( $post->ID, '_wpb_thumbs_title2', true );?>
									        <h3><?php echo $thumbs; ?></h3>
									        <?php global $post; $thumbs = get_post_meta( $post->ID, '_wpb_thumbs_des2', true );?>
									        <p class="intro"><?php echo $thumbs; ?></p>
									         <?php global $post; $thumbs = get_post_meta( $post->ID, '_wpb_thumbs_link2', true );?>
									        <p><a href="/griffin/<?php echo $thumbs; ?>" class="btn btn-primary" role="button">Learn more</a></p>
									      </div><!-- /caption -->
									    </div><!-- /thumbnail -->
									  </div><!-- /col -->
									  <div class="col-sm-6 col-md-4">
									    <div class="thumbnail">
									    <div class="thumb-image">
									    <img class="img-responsive" src="<?php global $post; $thumbs = get_post_meta( $post->ID, '_wpb_thumbs_image3', true ); echo $thumbs; ?>" alt="<?php echo get_the_title($ID); ?>">
									    </div><!-- /thumb-image -->
									      <div class="caption">
									      <?php global $post; $thumbs = get_post_meta( $post->ID, '_wpb_thumbs_title3', true );?>
									        <h3><?php echo $thumbs; ?></h3>
									        <?php global $post; $thumbs = get_post_meta( $post->ID, '_wpb_thumbs_des3', true );?>
									        <p class="intro"><?php echo $thumbs; ?></p>
									         <?php global $post; $thumbs = get_post_meta( $post->ID, '_wpb_thumbs_link3', true );?>
									        <p><a href="/griffin/<?php echo $thumbs; ?>" class="btn btn-primary" role="button">Learn more</a></p>
									      </div><!-- /caption -->
									    </div><!-- /thumbnail -->
									  </div><!-- /col -->
									</div><!-- /row -->
                                <hr>
                                <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading highlight"><span class=" text-muted"><?php global $post; $jason = get_post_meta( $post->ID, '_wpb_jason_title1', true ); echo $jason; ?></span> <?php global $post; $jason = get_post_meta( $post->ID, '_wpb_jason_title2', true ); echo $jason; ?></h2>
          <p class="lead"><?php global $post; $jason = get_post_meta( $post->ID, '_wpb_jason_des', true ); echo $jason; ?></p>
          <p><a href="/griffin/about" class="btn btn-primary" role="button">Learn more</a></p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-responsive" src="<?php global $post; $jason = get_post_meta( $post->ID, '_wpb_jason_image', true ); echo $jason; ?>" alt="<?php echo get_the_title($ID); ?>">
        </div>
      </div>
                            </article> <!-- /#post -->
                        <?php } // end while ?>
                    <?php } // end if ?>
                    <?php comments_template( '', true ); ?>
                </section><!-- /#main -->

            </div><!--/row -->
        </div><!-- /container -->
    </div> <!-- /#wrapper -->
<?php get_footer(); ?>