<?php
/** 
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 * Template Name: Homepage
 */

get_header(); ?>
<div id="inner_page">
	<div id="inside_inner_page">


		<div id="container">
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php //edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

				<?php //comments_template( '', true ); ?>

<?php endwhile; ?>

			</div><!-- #content -->
		</div><!-- #container -->
	</div><!-- #inside_inner_page -->  
</div><!-- #inner_page -->
<div id="blog_box">
	<div id="blog_inner_box">
	    <h1 class="entry-title">Latest News</h1>
			<?php query_posts( array('cat' => 1, 'showposts' => 1) ); ?>
    		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
           		<h2 class="entry-title"><?php the_title(); ?></h2>
            
				<?php the_excerpt(); ?>

            
            <?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
            <?php
            		//Reset Query
					wp_reset_query();
					
			?>
    </div><!-- #blog_inner_box -->
</div><!-- #blog_box -->
    
<div id="facebook_box">
    <div id="facebook_inner_box">
 	   			<?php query_posts( array('page_id' => 82) ); ?>
    		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            
            
				<?php the_content(); ?>

            
            <?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
			<?php endif; ?>
            <?php
            		//Reset Query
					wp_reset_query();
					
			?>
    </div><!-- #facebook_inner_box -->
</div><!-- #facebook_box -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
