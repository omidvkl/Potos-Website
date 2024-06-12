<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package Harika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

while ( have_posts() ) :
	the_post();
	?>

<main id="content" <?php post_class( 'site-main main-max' ); ?> role="main">
	<?php if ( apply_filters( 'harika_page_title', true ) ) : ?>
		<header class="page-header">
			<?php the_title( '<h1 class="entry-title harika-page-title">', '</h1>' ); ?>
		</header>
	<?php endif; ?>
	<div class="default-page-content">
		<?php the_content(); ?>
		<div class="post-tags">
			<?php the_tags( '<span class="tag-links">', null, '</span>' ); ?>
		</div>
		<?php wp_link_pages(); ?>
	</div>

	<?php comments_template(); ?>
</main>

	<?php
endwhile;





