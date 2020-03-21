<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Elegant_Pink
 */

if ( ! function_exists( 'elegant_pink_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function elegant_pink_posted_on() { ?>
    <ul class="entry-meta">
        <li>
            <a href="<?php the_permalink(); ?>" class="posted-on">
                <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                    <?php echo get_the_date('j F Y'); ?>
                </time>
        </a></li>
        <li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" class="author vcard"><?php the_author();?></a></li>
        <?php  
            if( is_single() && 'post' === get_post_type() ){
                $categories_list = get_the_category_list( esc_html__( ', ', 'elegant-pink' ) );
                if ( $categories_list && elegant_pink_categorized_blog() ) {
                   echo '<li>' . $categories_list . '</li>';
                }
                
                $tags_list = get_the_tag_list( '', esc_html__( ', ', 'elegant-pink' ) );
                if ( $tags_list ) {
                    echo '<li>' . $tags_list . '</li>';
                }
            }
        ?> 
    </ul>
<?php
}
endif;

if ( ! function_exists( 'elegant_pink_category' ) ) :
	
function elegant_pink_category(){
    /* translators: used between list items, there is a space after the comma */
    $categories_list = get_the_category_list( esc_html__( ', ', 'elegant-pink' ) );
    if ( $categories_list && elegant_pink_categorized_blog() ) {
        echo '<div class="category">' . $categories_list . '</div>';
    }
}
endif;

if ( ! function_exists( 'elegant_pink_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function elegant_pink_entry_footer() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'elegant-pink' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function elegant_pink_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'elegant_pink_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'elegant_pink_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so elegant_pink_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so elegant_pink_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in elegant_pink_categorized_blog.
 */
function elegant_pink_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'elegant_pink_categories' );
}
add_action( 'edit_category', 'elegant_pink_category_transient_flusher' );
add_action( 'save_post',     'elegant_pink_category_transient_flusher' );
