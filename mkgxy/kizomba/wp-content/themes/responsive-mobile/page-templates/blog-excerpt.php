<?php
/**
 * Template Name: Blog Excerpt (summary)
 *
 * Template for pages
 *
 * @package      responsive_mobile
 * @license      license.txt
 * @copyright    2014 CyberChimps Inc
 * @since        0.0.1
 *
 * Please do not edit this file. This file is part of the responsive_mobile Framework and all modifications
 * should be made in a child theme.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

get_header(); ?>

	<div id="content-blog-excerpt" class="content-area">
		<main id="main" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">

			<?php get_template_part( 'template-parts/loop-header' ); ?>

			<?php
			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			} else {
				$paged = 1;
			}
			$blog_query = new WP_Query( array(
				'post_type' => 'post',
				'paged'     => $paged
			) );
			?>

			<?php if ( $blog_query->have_posts() ) : ?>

				<?php /* Start the Loop */ ?>
				<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'excerpt' ); ?>

				<?php endwhile; ?>

				<?php if ( $blog_query->max_num_pages > 1 ) :
					?>
					<nav class="navigation">
						<div class="nav-previous"><?php next_posts_link( __( '&#8249; Older posts', 'responsive-mobile' ), $blog_query->max_num_pages ); ?></div>
						<div class="nav-next"><?php previous_posts_link( __( 'Newer posts &#8250;', 'responsive-mobile' ), $blog_query->max_num_pages ); ?></div>
					</nav><!-- end of .navigation -->
				<?php
				endif;

				wp_reset_postdata();

			else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

			<?php wp_reset_postdata(); ?>

		</main><!-- #main -->
		<?php get_sidebar(); ?>
	</div><!-- #content-blog -->

<?php get_footer(); ?>