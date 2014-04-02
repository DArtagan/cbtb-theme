<?php
/** 
 * Template Name: Blog
 */

get_header(); ?>
<div id="inner_page">
	<div id="inside_inner_page">
		<div id="container">
			<div id="content" role="main">
        <h1 class="entry-title">Blog</h1>
        <?php 
          $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
          $the_query = new WP_Query( 'paged=' . $paged ); 
        ?>
        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
            <?php the_excerpt(); ?>
          </div>
          <div class="pagination">
            <?php
              previous_posts_link( 'Newer →' );
              next_posts_link( '← Older', $the_query->max_num_pages );
              wp_reset_postdata(); 
            ?>
          </div>
        <?php endwhile; else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->
	</div><!-- #inside_inner_page -->  
</div><!-- #inner_page -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
