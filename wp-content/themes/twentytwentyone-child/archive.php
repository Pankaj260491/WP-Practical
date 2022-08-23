<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
$queried_object = get_queried_object();
if ( have_posts() ) :
?>
<section class="bannersect flex">
    <div class="container">
        <?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
        <div class="breadcrumb">
            <ul class="flex flex-start">
                <li><a href="<?php echo get_permalink(2); ?>">Service</a></li>
                <?php the_archive_title( '<li>', '</li>' ); ?></li>
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
                    <li><a href="<?php echo get_permalink(2); ?>">All</a></li>
                    <?php foreach ( $catterms as $term ) { $termid = $term->term_id; ?>
                        <li><a <?php if($queried_object->term_id == $termid) { echo 'class="active"'; } ?> href="<?php echo get_term_link($termid); ?>"><?php echo $term->name; ?></a></li>
                    <?php } ?>
                </ul>  
            <?php } 
                $tagargs = array( 'hide_empty' => false);
                $tagterms = get_terms( 'servicetags', $tagargs );
                if ( ! empty( $tagterms ) && ! is_wp_error( $tagterms ) ) {
            ?>
                <ul class="flex flex-start tagterms">
                    <?php foreach ( $tagterms as $term ) { $termid = $term->term_id; ?>
                        <li><a <?php if($queried_object->term_id == $termid) { echo 'class="active"'; } ?> href="<?php echo get_term_link($termid); ?>"><?php echo $term->name; ?></a></li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        
        <?php get_template_part( 'template-parts/content/content-service' ); ?>

        <div class="blogpagi inlineblock">
          <?php 
            global $wp_query;
            $big = 999999999;
            echo paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'prev_text'    => __(''),
                'next_text'    => __(''),
            ));
          ?>
        </div>
        
    </div>
</section>

<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>

<?php get_footer(); ?>
