<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/*
 * Template Name: طرح جعبه ای با سایدبار
 */

get_header();

while ( have_posts() ) : the_post();
?>

<main id="content" <?php post_class( 'site-main page-box-sidebar-template main-max' ); ?> role="main">
	<?php if ( apply_filters( 'harika_page_title', true ) ) : ?>
		<header class="page-header">
			<?php the_title( '<h1 class="entry-title harika-page-title">', '</h1>' ); ?>
		</header>
	<?php endif; ?>
    <div class="harika-flex-row">
		<div class="main-col">
            <div class="page-content">
                <?php the_content(); ?>
                <div class="post-tags">
                    <?php the_tags( '<span class="tag-links">', null, '</span>' ); ?>
                </div>
                <?php wp_link_pages(); ?>
            </div>
			<?php comments_template(); ?>
        </div>
		<div class="sidebar-col">
			<?php get_sidebar('blog-sidebar'); ?>
			<?php dynamic_sidebar('blog-sidebar'); ?>
		</div>

	
</main>

	<?php
endwhile;


get_footer();



