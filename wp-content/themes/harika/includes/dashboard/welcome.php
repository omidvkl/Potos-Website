<?php
if(!defined('ABSPATH')){ exit; }

function harika_welcome_page() {

    $theme = wp_get_theme();
    $base_config = array(
        'theme_name' => $theme->name,
        'theme_version' => $theme->version,
        'php_max_input_vars' => 'https://configwp.ir/max-input-vars/',
        'php_max_execution_time' => 'https://mizbanfa.net/blog/cms/wordpress/fix-maximum-execution-time-exceeded-in-wordpress/',
    );
    ?>

    <div class="harika-dashboard-wrap">

        <h1>
            <?php
                echo sprintf(
                    esc_html__( 'قالب هاریکا نسخه %1$s', 'harika' ),
                    sprintf($base_config['theme_version']),
                )
            ?>
        </h1>
        <div class="about-text">

            <?php
                echo sprintf(
                    esc_html__( 'بابت خرید قالب هاریکا از شما متشکریم! جهت دریافت پشتیبانی می توانید از طریق سایت %1$s اقدام بفرمایید. همچنین اگر از کیفیت قالب و پشتیبانی راضی هستید، با امتیاز 5 ستاره از تیم ما حمایت کنید.', 'harika' ),
                    sprintf(
                        '<a href="https://www.rtl-theme.com/harika-wordpress-theme/support/" target="_blank"><strong>%1$s</strong></a>',
                    esc_html__( 'راست چین', 'harika' )
                    ),
                )
            ?>
        </div>
        <div class="harika-logo"><img src="<?php echo get_template_directory_uri() . '/assets/images/fav2.png'; ?>" alt=""></div>

        <div class="harika-dashboard-buttons">
            <a href="https://webdev-demo.ir/harika/documentation/" target="_blank"><?php esc_html_e('فایل راهنمای قالب', 'harika'); ?></a>
            <a href="https://www.aparat.com/wordpressim" target="_blank"><?php esc_html_e('ویدیو های آموزشی', 'harika'); ?></a>
            <a href="https://www.rtl-theme.com/harika-wordpress-theme/support/" target="_blank"><?php esc_html_e('دریافت پشتیبانی', 'harika'); ?></a>
            <a href="https://www.rtl-theme.com/author/web-developer/products/" target="_blank" class="colorful"><?php esc_html_e('سایر محصولات ما!', 'harika'); ?></a>
        </div>

        <div class="about-text">
            <p class="description">
                <?php
                    echo sprintf(
                        esc_html__( 'طراحی شده توسط %1$s، جهت ارائه در سایت راست چین.', 'harika' ),
                        sprintf(
                            '<a href="https://www.rtl-theme.com/author/web-developer/products/" target="_blank">%1$s</a>',
                        esc_html__( 'توسعه دهنده وب', 'harika' )
                        ),
                    )
                ?>
            </p>
        </div>

        <div class="harika-dashboard-setting-buttons">
            <span><?php esc_html_e('جهت ورود به پنل تنظیمات قالب روی دکمه مقابل کلیک کنید.', 'harika'); ?></span>
            <a href="<?php echo wp_nonce_url( 'post.php?post=' . get_option( 'elementor_active_kit' ) . '&action=elementor' ); ?>" target="_blank"><?php esc_html_e('پنل تنظیمات', 'harika'); ?></a>
        </div>


        <div class="harika-dashboard-get-data">
        <!-- start: .harika-system -->
        <div class="harika-system">
            <h3><?php esc_html_e('توضیحات کوتاه', 'harika'); ?></h3>
            <div class="tozihat">
                <p>
                        
                    <?php esc_html_e('قالب هاریکا یک قالب کاملا ایرانی وردپرس است که بر پایه المنتور طراحی شده و نیازمند نصب و فعالسازی المنتور و المنتور پرو می باشد.', 'harika'); ?><br><br>
                    <?php esc_html_e('برای بهینه سازی قالب می توانید از افزونه wp rocket استفاده کنید.', 'harika'); ?><br><br>
                    <?php esc_html_e('و در نهایت بسیار خوشحالیم که قالب ما را برای راه اندازی وب سایت خود انتخاب کرده اید و تمام تلاش خود را جهت راه اندازی هر چه بهتر برای شما خواهیم کرد.', 'harika'); ?><br><br>
                    <?php esc_html_e('حتی اگر سوالی خارج از پشتیبانی دارید، راحت باشید و با ما در میان بگذارید. خوشحال میشیم که کمکتون کنیم. ارادت!', 'harika'); ?>
                    
                </p>
            </div>
        </div>
        <!-- end: .harika-system -->

        <!-- start: .harika-system -->
        <div class="harika-system">
            <h3><?php esc_html_e('وضعیت سیستم', 'harika'); ?></h3>
            <table class="system-status-table widefat">
                <tbody>
                    <tr>
                        <td><?php esc_html_e('نسخه وردپرس', 'harika'); ?></td>
                        <td><?php bloginfo('version'); ?></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('زبان', 'harika'); ?></td>
                        <td><?php echo get_locale() ?></td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('نسخه PHP', 'harika'); ?></td>
                        <td>
                            <?php
                            $php_version = phpversion();
                            if ( version_compare( $php_version, '0', '<' ) ) {
                                echo '<mark class="error">'.__('برای کارآمدی قالب و امنیت بالا مورد نیاز است که از نسخه PHP 7.4 استفاده کنید.', 'harika').' ?></mark>';
                            } else if ( version_compare( $php_version, '100', '>' ) ) {
                                echo '<mark class="error">'.__('برای کارآمدی قالب و امنیت بالا مورد نیاز است که از نسخه PHP 7.4 استفاده کنید.', 'harika').' ?></mark>';
                            } else {
                                echo '<mark class="green">' . esc_html( $php_version ) . '</mark>';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('محدودیت حافظه وردپرس', 'harika'); ?></td>
                        <td>
                            <?php
                            $memory = harika_let_to_num( WP_MEMORY_LIMIT );
                            if ( $memory < 268435456 ) {
                                echo '<mark class="error">'.__('مقدار وردپرس:', 'harika').''. WP_MEMORY_LIMIT .'<br>'. __('مورد نیاز است که محدودیت حافظه خود را حداقل روی 256M تنظیم کنید.', 'harika').'</mark><br>';
                                echo '<a href="https://www.rtl-theme.com/blog/increasing-php-memory-limit/" target="_blank" rel="nofollow">'.__('نحوه افزایش حافظه', 'harika').'</a>';
                            } else {
                                echo '<mark class="green">' . size_format( $memory ) . '</mark>';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('حداکثر زمان اجرای PHP', 'harika'); ?></td>
                        <td>
                            <?php
                            $max_input = ini_get('max_execution_time');
                            if ( $max_input < 300 ) {
                                echo '<mark class="error">'.__('مقدار سرور:', 'harika').' '.$max_input.'<br>';
                                echo __('مورد نیاز است که max_execution_time خود را حداقل روی 300 تنظیم کنید.', 'harika').'</mark><br>';
                                echo '<a href="'.$base_config['php_max_execution_time'].'" target="_blank">'.__('نحوه افزایش max_execution_time', 'harika').'</a>';
                            } else {
                                echo '<mark class="green">' . $max_input . '</mark>';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('حداکثر متغییر های ورودی PHP', 'harika'); ?></td>
                        <td>
                            <?php
                            $max_input = ini_get('max_input_vars');
                            if ( $max_input < 1000 ) {
                                echo '<mark class="error">'.__('مقدار وردپرس:', 'harika').' '.$max_input .'<br>';
                                echo __('مورد نیاز است که max_input_vars حداقل روی 1000 تنظیم شود.', 'harika').'</mark><br>';
                                echo '<a href="'.$base_config['php_max_input_vars'].'" target="_blank">'.__('نحوه افزایش max_input_vars', 'harika').'</a>';
                            } else {
                                echo '<mark class="green">' . $max_input . '</mark>';
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?php esc_html_e('اطلاعات سرور', 'harika'); ?></td>
                        <td><?php echo esc_html( $_SERVER['SERVER_SOFTWARE'] ); ?></td>
                    </tr>

                </tbody>		
            </table>
        </div>
        <!-- end: .harika-system -->

        </div>

    </div>

    <?php
}