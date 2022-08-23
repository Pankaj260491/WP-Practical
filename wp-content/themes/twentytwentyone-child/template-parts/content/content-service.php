<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<div class="service-posts">
    <?php 
        while (have_posts() ) : the_post();
        $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_ID($post->ID), 'full');
        $alt_text = get_post_meta(get_post_thumbnail_ID($post->ID) , '_wp_attachment_image_alt', true); 
        $postterms = get_the_terms( $post->ID , 'servicetags' );
        $placeholder_img = get_stylesheet_directory_uri() . '/images/placeholder.png';
    ?>
        <div class="service-inner">
            <div class="service-img">
                <img src="<?php if(!empty($thumbnail)) { echo $thumbnail[0]; } else { echo $placeholder_img; } ?>" alt="<?php echo $alt_text; ?>" />
            </div>
            <div class="service-info">
                <?php if ( ! empty( $postterms ) && ! is_wp_error( $postterms ) ) { ?>
                    <div class="service-tag">
                        <ul class="flex flex-start">
                            <?php foreach($postterms as $postterm) { ?>
                                <li><a href="<?php echo get_term_link($postterm->term_id); ?>"><?php echo $postterm->name; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <h2><?php the_title(); ?></h2>
                <p><?php echo get_the_excerpt(); ?></p>
                <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
            </div>
        </div>
    <?php endwhile; wp_reset_query(); ?>
</div>