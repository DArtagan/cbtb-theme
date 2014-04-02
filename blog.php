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
        <?php if ( $wp_query->max_num_pages > 1 ) : ?>
          <div id="nav-above" class="navigation">
            <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
            <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
          </div><!-- #nav-above -->
        <?php endif; ?>

        <?php $the_query = new WP_Query( "posts_per_page=10" ); ?>
        <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
            <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
            <?php the_excerpt(); ?>
          </div>
        <?php endwhile; else: ?>
          <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
        <?php wp_reset_query(); ?>

        <?php if (  $wp_query->max_num_pages > 1 ) : ?>
          <div id="nav-below" class="navigation">
            <div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
            <div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
          </div><!-- #nav-below -->
        <?php endif; ?>
			</div><!-- #content -->
		</div><!-- #container -->
	</div><!-- #inside_inner_page -->  
</div><!-- #inner_page -->
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
