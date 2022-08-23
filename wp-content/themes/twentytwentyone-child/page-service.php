<?php
/**
 * Template Name: Service Template
*/
get_header();
  
?>
<section class="bannersect flex">
    <div class="container">
        <h1><?php the_title(); ?></h1>
        <div class="breadcrumb">
            <ul class="flex flex-start">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li><?php the_title(); ?></li>
            </ul>
        </div>
    </div>
</section>
<section class="service-sect inlineblock">
    <div class="container">
        <div class="service-list-inner">
            <?php 
                $catargs = array( 'hide_empty' => false);
                $catterms = get_terms( 'servicecategories', $catargs );
                if ( ! empty( $catterms ) && ! is_wp_error( $catterms ) ) {
            ?>
                <ul class="flex flex-start catterms">
                    <li><a href="<?php echo get_permalink(2); ?>" class="active" >All</a></li>
                    <?php foreach ( $catterms as $term ) { $termid = $term->term_id; ?>
                        <li><a href="<?php echo get_term_link($termid); ?>"><?php echo $term->name; ?></a></li>
                    <?php } ?>
                </ul>  
            <?php } 
                $tagargs = array( 'hide_empty' => false);
                $tagterms = get_terms( 'servicetags', $tagargs );
                if ( ! empty( $tagterms ) && ! is_wp_error( $tagterms ) ) {
            ?>
                <ul class="flex flex-start tagterms">
                    <?php foreach ( $tagterms as $term ) { $termid = $term->term_id; ?>
                        <li><a href="<?php echo get_term_link($termid); ?>"><?php echo $term->name; ?></a></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <?php 
            wp_reset_query();
            $default_posts_per_page = get_option( 'posts_per_page' );
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array(
              'post_type' => 'services',
              'posts_per_page' => $default_posts_per_page,
              'post_status' => 'publish',
              'orderby' => 'date',
              'order' => 'DESC',
              'paged' => $paged
            );
            $loop = new WP_Query($args);
            if($loop->have_posts()) :
        ?>
            <div class="service-posts">
                <?php 
                    while ($loop->have_posts() ) : $loop->the_post();
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
            <div class="blogpagi inlineblock">
              <?php 
                global $loop;
                $big = 999999999;
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $loop->max_num_pages,
                    'prev_text'    => __(''),
                    'next_text'    => __(''),
                ));
              ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php get_footer(); ?>
