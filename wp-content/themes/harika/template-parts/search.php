<?php
/**
 * The template for displaying search results.
 *
 * @package Harika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<main id="content" class="site-main archive search main-max" role="main">
	<?php if ( apply_filters( 'harika_page_title', true ) ) : ?>
		<header class="page-header">
			<h1 class="entry-title harika-page-title">
				<?php esc_html_e( 'نتایج جستجو برای: ', 'harika' ); ?>
				<span><?php echo get_search_query(); ?></span>
			</h1>
		</header>
	<?php endif; ?>
	<?php if(have_posts()) : ?>
	<div class="harika-flex-row<?php if(harika_get_setting( 'harika_archive_pages_sidebar_display' ) !== 'yes') { echo ' no-sidebar';} ?>">
		<div class="main-col">
			<div class="page-content">
				<?php
				while ( have_posts() ) :
					the_post();
					$post_link = get_permalink();
					?>
					<article class="post">
						<?php if (has_post_thumbnail() ): ?>
						<div class="image"><?php printf( '<a href="%s">%s</a>', esc_url( $post_link ), get_the_post_thumbnail( $post, 'large' ) ); ?></div>
						<?php endif; ?>
						<div class="content">
							<?php
							printf( '<h2 class="%s"><a href="%s">%s</a></h2>', 'entry-title', esc_url( $post_link ), wp_kses_post( get_the_title() ) );
							the_excerpt();
							?>
							
							<?php if(harika_get_setting( 'harika_archive_pages_meta_date_display' ) == 'yes' or harika_get_setting( 'harika_archive_pages_meta_comments_count_display' ) == 'yes' or harika_get_setting( 'harika_archive_pages_meta_categories_display' ) == 'yes') : ?>
							<div class="archive-meta">

								<?php if(harika_get_setting( 'harika_archive_pages_meta_categories_display' ) == 'yes') : ?>
								<div class="categories">
								<?php
									if ( get_post_type( get_the_ID() ) == 'page' ) :
										echo '<a class="cat">صفحه</a>';
									;else :
										$categories = get_the_category();
										$separator = ' ';
										$output = '';
										if ( ! empty( $categories ) ) {
											foreach( $categories as $category ) {
												$output .= '<a class="cat" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'نمایش همه پست های %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
											}
											echo trim( $output, $separator );
										}
									endif;
									?>
								</div>
								<?php endif; ?>

								<?php if(harika_get_setting( 'harika_archive_pages_meta_date_display' ) == 'yes' or harika_get_setting( 'harika_archive_pages_meta_comments_count_display' ) == 'yes') : ?>
								<div class="meta">

									<?php if(harika_get_setting( 'harika_archive_pages_meta_date_display' ) == 'yes') : ?>
									<span class="date"><i class="date-icon"></i> <?php echo get_the_date(); ?></span>
									<?php endif; ?>

									<?php if(harika_get_setting( 'harika_archive_pages_meta_comments_count_display' ) == 'yes' && get_post_type( get_the_ID() ) != 'page') : ?>
									<span class="comments-count"><i class="comments-icon"></i> <?php echo get_comments_number(); ?> دیدگاه</span>
									<?php endif; ?>

								</div>
								<?php endif; ?>
								
							</div>
							<?php endif; ?>

						</div>
					</article>
					
				<?php endwhile; ?>
				
			</div>
			<?php
			global $wp_query;
			if ( $wp_query->max_num_pages > 1 ) : ?>
			<div class="harika-box pagination-box">
				<nav class="pagination" role="navigation">
					<?php echo paginate_links(); ?>
				</nav>
			</div>
			<?php endif; ?>
		</div>

		<?php if(harika_get_setting( 'harika_archive_pages_sidebar_display' ) == 'yes') : ?>
		<div class="sidebar-col">
			<?php get_sidebar('blog-sidebar'); ?>
			<?php dynamic_sidebar('blog-sidebar'); ?>
		</div>
		<?php endif; ?>

	</div>
	<?php else : ?>
		<div class="search-no-content">
			<p>هیچ اطلاعاتی در رابطه با <span><?php echo get_search_query(); ?></span> یافت نشد؛ لطفا از کلمات دیگری استفاده کنید.</p>
			<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
				<label>
					<span class="screen-reader-text">جستجو برای :</span>
					<input type="search" class="search-field" placeholder="جستجو …" value="<?php echo get_search_query() ?>" name="s" title="جستجو برای :" />
				</label>
				<input type="submit" class="search-submit" value="جستجو" />
			</form>
		</div>
	
	<?php endif; ?>

	<?php wp_link_pages(); ?>

</main>
