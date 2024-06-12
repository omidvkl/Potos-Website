<?php
/**
 * The template for displaying singular post-types: posts, pages and user-defined custom post types.
 *
 * @package Harika
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

while ( have_posts() ) : the_post();


if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'single' ) ) {

	
	
	if(get_post_meta($post->ID, 'harika-meta-single-select', true ) !== 'default' and get_post_meta($post->ID, 'harika-meta-single-select', true ) !== ''){
		echo do_shortcode('[HARIKA_INSERT_TPL id="'.get_post_meta($post->ID, 'harika-meta-single-select', true ).'"]');
	} else if(harika_get_setting( 'harika_single_layout_select' ) !== '' and harika_get_setting( 'harika_single_layout_select' ) !== '0'){
		echo do_shortcode('[HARIKA_INSERT_TPL id="'.harika_get_setting( 'harika_single_layout_select' ).'"]');
	} else {


?>

<main id="content" <?php post_class( 'site-main main-max' ); ?> role="main">
	<?php if ( apply_filters( 'harika_page_title', true ) ) : ?>
		<?php if ( has_post_thumbnail() ) : ?>
		<header class="post-single-header">
			<div class="featured-image">
    	        <?php
    	        the_post_thumbnail('single-image');
				the_title( '<h1 class="entry-title">', '</h1>' );
				?>
				<div id="open-share-box" class="share-post default">
					<i class="<?php echo harika_get_setting( 'harika_post_single_share_icon' )['value']; ?>"></i>
				</div>
				<span id="share-box-back" class="default"></span>
                <div id="share-box" class="social-share default">
                    <div class="info">
                        
                        <h5 class="modal-title" id="shareModalLabel">اشتراک گذاری</h5>
                        
                        <button id="close-share-box" type="button" class="close default" data-dismiss="modal" aria-label="Close">
                            <i class="fa-regular fa-xmark"></i>
                        </button>
                        
                    </div>
                    <div class="share-body">
                        <p>با استفاده از روش‌های زیر می‌توانید این صفحه را با دوستان خود به اشتراک بگذارید.</p>
                        <div class="socials">
                            <a class="share_button_facebook" target="_blank" href="http://www.facebook.com/share.php?u=<?php esc_url(the_permalink());?>title=<?php echo get_the_title(); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                            <a class="share_button_twitter" target="_blank" href="http://twitter.com/intent/tweet?status=<?php echo get_the_title(); ?>+<?php esc_url(the_permalink());?>"><i class="fa-brands fa-twitter"></i></a>
                            <a class="share_button_linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php esc_url(the_permalink());?>&title=<?php echo get_the_title(); ?>&source=<?php echo esc_url(home_url('/'));?>"><i class="fa-brands fa-linkedin-in"></i></a>
                            <a class="share_button_pinterest" target="_blank" href="http://pinterest.com/pin/create/bookmarklet/?url=<?php esc_url(the_permalink());?>&is_video=false&description=<?php echo get_the_title(); ?>"><i class="fa-brands fa-pinterest-p"></i></a>
                            <a class="share_button_telegram" target="_blank" href="https://t.me/share/url?url=<?php esc_url(the_permalink());?>"><i class="fa-brands fa-telegram"></i></a>
                            <a class="share_button_whatsapp" target="_blank" href="https://api.whatsapp.com/send?text=<?php echo get_the_title(); ?>%20<?php esc_url(the_permalink());?>"><i class="fa-brands fa-whatsapp"></i></a>
                            <a class="share_button_mailto" target="_blank" href="mailto:<?php esc_url(the_permalink());?>"><i class="fa-regular fa-envelope"></i></a>
                        </div>
                    </div>
                    <div class="filed-link dir-ltr copy-text">
                        <label for="shareLink" class="input-prepend">
                            <i class="fa-regular fa-link"></i>
                        </label>
    
                        <input id="shareLink" type="text" value="<?php esc_url(the_permalink());?>" readonly="">
    
                        <span class="copy-text-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="کپی لینک">
                            <i class="fa-regular fa-copy"></i>
                        </span>
                    </div>
                </div>
			</div>
		</header>
		<?php
		;else : ?>
		<header class="page-header">
			<?php the_title( '<h1 class="entry-title harika-page-title">', '</h1>' ); ?>
		</header>
		<?php endif; ?>
			
		
	<?php endif; ?>
	<div class="single-meta">
		<div class="meta">

			<?php if(harika_get_setting( 'harika_post_single_meta_author_display' ) == 'yes') : ?>
				<span class="author"><?php echo get_avatar( get_the_author_meta('user_email'), '34', '' ); ?> توسط: <?php the_author_posts_link(); ?></span>
			<?php endif; ?>

			<?php if(harika_get_setting( 'harika_post_single_meta_date_display' ) == 'yes') : ?>
				<span class="date"><i class="date-icon"></i> تاریخ انتشار: <?php echo get_the_date(); ?></span>
			<?php endif; ?>

			<?php if(harika_get_setting( 'harika_post_single_meta_comments_count_display' ) == 'yes') : ?>
				<span class="comments-count"><i class="comments-icon"></i> <?php echo get_comments_number(); ?> دیدگاه</span>
			<?php endif; ?>

		</div>
		<?php if(harika_get_setting( 'harika_post_single_meta_categories_display' ) == 'yes') : ?>
			<div class="categories">
				<?php 
				$categories = get_the_category();
				$separator = ' ';
				$output = '';
				if ( ! empty( $categories ) ) {
					foreach( $categories as $category ) {
						$output .= '<a class="cat" href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'نمایش همه پست های %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
					}
					echo trim( $output, $separator );
				}
				?>
			</div>
		<?php endif; ?>
	</div>
	<div class="harika-flex-row<?php if(harika_get_setting( 'harika_post_single_sidebar_display' ) !== 'yes') { echo ' no-sidebar';} ?>">
		<div class="main-col">
			<div class="page-content">
				<?php the_content(); ?>

				<?php if(harika_get_setting( 'harika_post_single_meta_tags_display' ) == 'yes' && has_tag())  : ?>
					<div class="post-tags">
						<?php the_tags( '<span class="tag-links">', null, '</span>' ); ?>
					</div>
					<?php endif; ?>

				<?php wp_link_pages(); ?>
			</div>

			<?php comments_template(); ?>
		</div>

		<?php if(harika_get_setting( 'harika_post_single_sidebar_display' ) == 'yes') : ?>
		<div class="sidebar-col">
			<?php get_sidebar('blog-sidebar'); ?>
			<?php dynamic_sidebar('blog-sidebar'); ?>
		</div>
		<?php endif; ?>

	</div>

</main>

	<?php
		}
	

	
	
	}
endwhile;





