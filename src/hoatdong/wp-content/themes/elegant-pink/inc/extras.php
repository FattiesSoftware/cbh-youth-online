<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Elegant_Pink
 */

/**
* Adds custom classes to the array of body classes.
*
* @param array $classes Classes for the body element.
* @return array
*/
function elegant_pink_body_classes( $classes ) {
	global $post;
    // Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
    
    // Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
    
    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
		$classes[] = 'custom-background-color';
	}
    
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

    if( is_page() ){
        $sidebar_layout = get_post_meta( $post->ID, 'elegant_pink_sidebar_layout', true );
        if( $sidebar_layout == 'no-sidebar' )
		$classes[] = 'full-width';
    }
    
    if( ! is_active_sidebar( 'right-sidebar' ) ) {
		$classes[] = 'full-width';	
	}
    
	return $classes;
}
add_filter( 'body_class', 'elegant_pink_body_classes' );

/**
* Adds custom classes to the array of post classes.
*
* @param array $classes Classes for the post element.
* @return array
*/
function elegant_pink_post_classes( $classes ) {
    $classes[] = 'latest_post';
    
    return $classes;
}
add_filter( 'post_class', 'elegant_pink_post_classes' );

/**
 * Callback for Social Links 
 */
 function elegant_pink_social_cb(){
    $facebook    = get_theme_mod( 'elegant_pink_facebook' );
    $twitter     = get_theme_mod( 'elegant_pink_twitter' );
    $google_plus = get_theme_mod( 'elegant_pink_google_plus' );
    $linkedin    = get_theme_mod( 'elegant_pink_linkedin' );
    $youtube     = get_theme_mod( 'elegant_pink_youtube' );
    $instagram   = get_theme_mod( 'elegant_pink_instagram' );
    $pinterest   = get_theme_mod( 'elegant_pink_pinterest' );
    $ok          = get_theme_mod( 'elegant_pink_ok' );
    $vk          = get_theme_mod( 'elegant_pink_vk' );
    $xing        = get_theme_mod( 'elegant_pink_xing' );
    
    if( $facebook || $twitter || $google_plus || $linkedin || $youtube || $instagram || $pinterest || $ok || $vk || $xing  ){
    ?>
    <ul class="social-networks">
		<?php if( $facebook ){?>
            <li><a href="<?php echo esc_url( $facebook );?>" target="_blank" title="<?php esc_html_e( 'Facebook', 'elegant-pink' ); ?>"><span class="fa fa-facebook"></span></a></li>
		<?php } if( $twitter ){?>    
            <li><a href="<?php echo esc_url( $twitter );?>" target="_blank" title="<?php esc_html_e( 'Twitter', 'elegant-pink' ); ?>"><span class="fa fa-twitter"></span></a></li>
		<?php } if( $google_plus ){?>
            <li><a href="<?php echo esc_url( $google_plus );?>" target="_blank" title="<?php esc_html_e( 'Google Plus', 'elegant-pink' ); ?>"><span class="fa fa-google-plus"></span></a></li>
		<?php } if( $linkedin ){?>
            <li><a href="<?php echo esc_url( $linkedin );?>" target="_blank" title="<?php esc_html_e( 'LinkedIn', 'elegant-pink' ); ?>"><span class="fa fa-linkedin"></span></a></li>
		<?php } if( $youtube ){?>
            <li><a href="<?php echo esc_url( $youtube );?>" target="_blank" title="<?php esc_html_e( 'YouTube', 'elegant-pink' ); ?>"><span class="fa fa-youtube"></span></a></li>
		<?php } if( $instagram ){?>
            <li><a href="<?php echo esc_url( $instagram );?>" target="_blank" title="<?php esc_html_e( 'Instagram', 'elegant-pink' ); ?>"><span class="fa fa-instagram"></span></a></li>
        <?php } if( $pinterest ){?>
            <li><a href="<?php echo esc_url( $pinterest );?>" target="_blank" title="<?php esc_html_e( 'Pinterest', 'elegant-pink' ); ?>"><span class="fa fa-pinterest-p"></span></a></li>            
        <?php } if( $ok ){ ?>
            <li><a href="<?php echo esc_url( $ok ); ?>" target="_blank" title="<?php esc_attr_e( 'OK', 'elegant-pink' );?>"><span class="fa fa-odnoklassniki"></span></a></li>
        <?php } if( $vk ){ ?>
            <li><a href="<?php echo esc_url( $vk ); ?>" target="_blank" title="<?php esc_attr_e( 'VK', 'elegant-pink' );?>"><span class="fa fa-vk"></span></a></li>     
        <?php } if( $xing ){ ?>
            <li><a href="<?php echo esc_url( $xing ); ?>" target="_blank" title="<?php esc_attr_e( 'Xing', 'elegant-pink' );?>"><span class="fa fa-xing"></span></a></li>
        <?php } ?>
	</ul>
    <?php
    }
}
add_action( 'elegant_pink_social', 'elegant_pink_social_cb' );

/**
 * Callback function for Home Page Slider 
 */
function elegant_pink_slider_cb(){
    $slider_caption  = get_theme_mod( 'elegant_pink_slider_caption', '1' );
    $slider_readmore = get_theme_mod( 'elegant_pink_slider_readmore', __( 'Read More', 'elegant-pink' ) );
    $slider_type     = get_theme_mod( 'elegant_pink_slider_type', 'category' );
    $slider_cat      = get_theme_mod( 'elegant_pink_slider_cat' );
    $slider_post1    = get_theme_mod( 'elegant_pink_slider_post1' );
    $slider_post2    = get_theme_mod( 'elegant_pink_slider_post2' );
    $slider_post3    = get_theme_mod( 'elegant_pink_slider_post3' );
    $slider_char     = get_theme_mod( 'elegant_pink_slider_char', 100 );
    
    $sliders = array( $slider_post1, $slider_post2, $slider_post3 );	    
	$sliders = array_diff( array_unique( $sliders ), array('') );
    
    if( ( $slider_type == 'category' ) && $slider_cat ){
        $qry = new WP_Query( array(
            'post_type'     => 'post',
            'post_status'   => 'publish',
            'posts_per_page'=> -1,
            'cat'           => $slider_cat,
        ));
        if( $qry->have_posts() ){ ?>
        <div class="slideshow">
            <div id="imageGallery" class="owl-carousel owl-theme">
            <?php
            while( $qry->have_posts() ){
                $qry->the_post();                
                ?>
                <div>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'elegant-pink-slider', array( 'itemprop' => 'image' ) ); ?></a>
    				<?php if( $slider_caption ){ ?>
                    <div class="banner-text">
    					<div class="text">
    						<?php elegant_pink_category(); ?>    						
                            <strong class="title"><?php the_title(); ?></strong>
    						<?php 
                            if( has_excerpt() ){
                                the_excerpt();  
    						}else{ ?>
                                <p><?php echo elegant_pink_truncate( get_the_content(), $slider_char ); ?></p>
                            <?php
                            }
    						?>
                            <a href="<?php the_permalink();?>" class="btn-readmore"><?php echo esc_attr( $slider_readmore ); ?></a>
    					</div>
    				</div>
                    <?php } ?>
                </div>
                <?php                
            }
            wp_reset_postdata();
            ?>
            </div>
        </div>
        <?php
        }
    }
    
    if( ( $slider_type == 'post' ) && $sliders ){
        $qry = new WP_Query( array(
            'post_type'   => 'post',
            'post_status' => 'publish',
            'post__in'    => $sliders,
            'orderby'     => 'post__in'
        ));
        if( $qry->have_posts() ){ ?>
        <div class="slideshow">
            <div id="imageGallery" class="owl-carousel owl-theme">
            <?php
            while( $qry->have_posts() ){
                $qry->the_post();                
                ?>
                <div>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'elegant-pink-slider', array( 'itemprop' => 'image' ) ); ?></a>
    				<?php if( $slider_caption ){ ?>
                    <div class="banner-text">
    					<div class="text">
    						<?php elegant_pink_category(); ?>
    						<strong class="title"><?php the_title(); ?></strong>
    						<?php 
                            if( has_excerpt() ){
                                the_excerpt();  
    						}else{ ?>
                                <p><?php echo elegant_pink_truncate( get_the_content(), $slider_char ); ?></p>
                            <?php
                            }
    						?>
    						<a href="<?php the_permalink();?>" class="btn-readmore"><?php echo esc_attr( $slider_readmore ); ?></a>
    					</div>
    				</div>
                    <?php }?>
                </div>
                <?php                
            }
            wp_reset_postdata(); 
            ?>
            </div>
        </div>
        <?php
        }        
    }
}
add_action( 'elegant_pink_slider', 'elegant_pink_slider_cb' );

if( ! function_exists( 'elegant_pink_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
*/
function elegant_pink_change_comment_form_default_fields( $fields ){    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><label class="screen-reader-text" for="author">' . esc_html__( 'Name*', 'elegant-pink' ) . '</label><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'elegant-pink' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><label class="screen-reader-text" for="email">' . esc_html__( 'Email*', 'elegant-pink' ) . '</label><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'elegant-pink' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><label class="screen-reader-text" for="url">' . esc_html__( 'Website', 'elegant-pink' ) . '</label><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'elegant-pink' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;    
}
endif;
add_filter( 'comment_form_default_fields', 'elegant_pink_change_comment_form_default_fields' );

if( ! function_exists( 'elegant_pink_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
*/
function elegant_pink_change_comment_form_defaults( $defaults ){    
    $defaults['comment_field'] = '<p class="comment-form-comment"><label class="screen-reader-text" for="comment">' . esc_html__( 'Comment', 'elegant-pink' ) . '</label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment*', 'elegant-pink' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    $defaults['title_reply'] = esc_html__( 'Leave a Reply', 'elegant-pink' );
    return $defaults;    
}
endif;
add_filter( 'comment_form_defaults', 'elegant_pink_change_comment_form_defaults' );

/**
 * Callback function for Comment List
 * 
 * @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
 */
function elegant_pink_theme_comment( $comment, $args, $depth ){
    if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="http://schema.org/UserComments">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
	<?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="http://schema.org/Person">%s</b> <span class="says">says:</span>', 'elegant-pink' ), get_comment_author_link() ); ?>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'elegant-pink' ); ?></em>
		<br />
	<?php endif; ?>

	<div class="comment-meta commentmetadata">
    <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		<time>
        <?php echo get_comment_date(); ?>
        </time>
    </a>
	</div>
    
    <div class="comment-content"><?php comment_text(); ?></div>
    
	<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

/**
 * Custom Pagination
*/
function elegant_pink_pagination(){
    $pagination = get_theme_mod( 'elegant_pink_pagination_type', 'default' );
    
    switch( $pagination ){
        case 'default': // Default Pagination
        
        the_posts_navigation();
        
        break;
        
        case 'load_more': // Load More Button
        
        echo '<div class="pagination"></div>';
        
        break;
        
        default:
        
        the_posts_navigation();
        
        break;
    }   
}

/**
 * Custom CSS
*/
if ( function_exists( 'wp_update_custom_css_post' ) ) {
    // Migrate any existing theme CSS to the core option added in WordPress 4.7.
    $css = get_theme_mod( 'elegant_pink_custom_css' );
    if ( $css ) {
        $core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
        $return = wp_update_custom_css_post( $core_css . $css );
        if ( ! is_wp_error( $return ) ) {
            // Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
            remove_theme_mod( 'elegant_pink_custom_css' );
        }
    }
} else {
    // Back-compat for WordPress < 4.7.
    function elegant_pink_custom_css(){
        $custom_css = get_theme_mod( 'elegant_pink_custom_css' );
        if( !empty( $custom_css ) ){
    		echo '<style type="text/css">';
    		echo wp_strip_all_tags( $custom_css );
    		echo '</style>';
    	}
    }
    add_action( 'wp_head', 'elegant_pink_custom_css', 100 );
}

if ( ! function_exists( 'elegant_pink_excerpt_more' ) ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function elegant_pink_excerpt_more($more) {
	return is_admin() ? $more : ' &hellip; ';
}
add_filter( 'excerpt_more', 'elegant_pink_excerpt_more' );
endif;

if ( ! function_exists( 'elegant_pink_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function elegant_pink_excerpt_length( $length ) {
	return is_admin() ? $length : 15;
}
add_filter( 'excerpt_length', 'elegant_pink_excerpt_length', 999 );
endif;

/**
 * Footer Credits 
*/
function elegant_pink_footer_credit(){
    $copyright_text = get_theme_mod( 'elegant_pink_footer_copyright_text' );

    $text  = '<div class="site-info"><span>';
    if( $copyright_text ){
        $text .=  wp_kses_post( $copyright_text );
    }else{
        $text .=  esc_html__( 'Copyright &copy; ', 'elegant-pink' ) . date_i18n( esc_html__( 'Y', 'elegant-pink' ) ); 
        $text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>.</span>';
    }
    $text .= '</span>';
    $text .= '<span>';
    $text .= esc_html__( 'Elegant Pink ', 'elegant-pink' );
    $text .= '</span><span>';
    $text .= esc_html__( 'Developed By ', 'elegant-pink' );
    $text .= '<a href="' . esc_url( 'https://rarathemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Rara Theme', 'elegant-pink' ) .'</a>';
    $text .= '</span><span>';
    $text .= sprintf( esc_html__( 'Powered by: %s', 'elegant-pink' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'elegant-pink' ) ) .'" target="_blank" rel="nofollow">WordPress</a>' );
    $text .= '</span>';
    if( function_exists( 'get_the_privacy_policy_link' ) ){
        $text .= get_the_privacy_policy_link( '<span>', '</span>' );    
    }    
    $text .= '</div>';
    echo apply_filters( 'elegant_pink_footer_text', $text );    
}
add_action( 'elegant_pink_footer', 'elegant_pink_footer_credit' );

/**
 * Return sidebar layouts for pages
*/
function elegant_pink_sidebar_layout(){
    global $post;
    
    if( ! empty( $post ) ){
        if( get_post_meta( $post->ID, 'elegant_pink_sidebar_layout', true ) ){
            return get_post_meta( $post->ID, 'elegant_pink_sidebar_layout', true );    
        }else{
            return 'right-sidebar';
        }
    }
}

/**
 * Query Jetpack activation
*/
function is_jetpack_activated( $gallery = false ){
	if( $gallery ){
        return ( class_exists( 'jetpack' ) && Jetpack::is_module_active( 'tiled-gallery' ) ) ? true : false;
	}else{
        return class_exists( 'jetpack' ) ? true : false;
    }           
}

/**
 * Return Striptags from the content.
*/
function elegant_pink_truncate( $content, $letter_count ){
	$striped_content = strip_shortcodes( $content );
	$striped_content = strip_tags( $striped_content );
	$excerpt         = mb_substr( $striped_content, 0, $letter_count );
	
    if( $striped_content > $excerpt ){
		$excerpt .= '...';
	}
	
    return $excerpt;
}

if( ! function_exists( 'elegant_pink_single_post_schema' ) ) :
/**
 * Single Post Schema
 *
 * @return string
 */
function elegant_pink_single_post_schema() {
    if ( is_singular( 'post' ) ) {
        global $post;
        $custom_logo_id = get_theme_mod( 'custom_logo' );

        $site_logo   = wp_get_attachment_image_src( $custom_logo_id , 'kalon-pro-schema' );
        $images      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        $excerpt     = elegant_pink_escape_text_tags( $post->post_excerpt );
        $content     = $excerpt === "" ? mb_substr( elegant_pink_escape_text_tags( $post->post_content ), 0, 110 ) : $excerpt;
        $schema_type = ! empty( $custom_logo_id ) && has_post_thumbnail( $post->ID ) ? "BlogPosting" : "Blog";

        $args = array(
            "@context"  => "http://schema.org",
            "@type"     => $schema_type,
            "mainEntityOfPage" => array(
                "@type" => "WebPage",
                "@id"   => get_permalink( $post->ID )
            ),
            "headline"  => ( function_exists( '_wp_render_title_tag' ) ? wp_get_document_title() : wp_title( '', false, 'right' ) ),
            "image"     => array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            ),
            "datePublished" => get_the_time( DATE_ISO8601, $post->ID ),
            "dateModified"  => get_post_modified_time(  DATE_ISO8601, __return_false(), $post->ID ),
            "author"        => array(
                "@type"     => "Person",
                "name"      => elegant_pink_escape_text_tags( get_the_author_meta( 'display_name', $post->post_author ) )
            ),
            "publisher" => array(
                "@type"       => "Organization",
                "name"        => get_bloginfo( 'name' ),
                "description" => get_bloginfo( 'description' ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            ),
            "description" => ( class_exists('WPSEO_Meta') ? WPSEO_Meta::get_value( 'metadesc' ) : $content )
        );

        if ( has_post_thumbnail( $post->ID ) ) :
            $args['image'] = array(
                "@type"  => "ImageObject",
                "url"    => $images[0],
                "width"  => $images[1],
                "height" => $images[2]
            );
        endif;

        if ( ! empty( $custom_logo_id ) ) :
            $args['publisher'] = array(
                "@type"       => "Organization",
                "name"        => get_bloginfo( 'name' ),
                "description" => get_bloginfo( 'description' ),
                "logo"        => array(
                    "@type"   => "ImageObject",
                    "url"     => $site_logo[0],
                    "width"   => $site_logo[1],
                    "height"  => $site_logo[2]
                )
            );
        endif;

        echo '<script type="application/ld+json">' , PHP_EOL;
        echo wp_json_encode( $args, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) , PHP_EOL;
        echo '</script>' , PHP_EOL;
    }
}
endif;
add_action( 'wp_head', 'elegant_pink_single_post_schema' );

if( ! function_exists( 'elegant_pink_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 *
 * @return string
 */
function elegant_pink_escape_text_tags( $text ) {
    return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;

if( ! function_exists( 'wp_body_open' ) ) :
/**
 * Fire the wp_body_open action.
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
*/
function wp_body_open() {
	/**
	 * Triggered after the opening <body> tag.
    */
	do_action( 'wp_body_open' );
}
endif;