<?php
/**
 * The template for displaying featured posts on the front page
 *
 * @package WordPress
 * @subpackage Shopera
 * @since Shopera 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('swiper-slide'); ?>>
	<div class="slide-inner">
		<?php
			// Output the featured image.
			if ( has_post_thumbnail() ) :
				if ( 'grid' == get_theme_mod( 'featured_content_layout' ) ) { ?>
					<a class="post-thumbnail" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				<?php
				} else {
					$slide_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'shopera-huge-width' ); ?>
					<div class="slide-image" style="background-image:url('<?php echo esc_url( $slide_image_url[0] ); ?>') no-repeat center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;"></div>
					<?php
				}
			endif;
		?>
		<header class="entry-header">
			<span class="category-title-top"><?php _e('Brand new collection', 'shopera'); ?></span>
			<?php
				$external_url = get_post_meta(get_the_ID(), 'shopera_external_url', true);
				if ( !$external_url ) {
					$post_link = get_permalink();
				} else {
					$post_link = $external_url;
				}
			?>
			<?php the_title( '<h1 class="entry-title"><a href="' . esc_url( $post_link ) . '" rel="bookmark">','</a></h1>' ); ?>
			<div class="clearfix"></div>
		</header><!-- .entry-header -->
		<div class="slider-content">
			<?php the_excerpt(); ?>
		</div>
	</div>
	
</article><!-- #post-## -->
<a href="http://catcode.com/linkguide/clickimage.html">
            <div class="hero-image"></div>
        </a>
        <div class="height:3px;"></div>
        <a href="http://catcode.com/linkguide/clickimage.html">
            <div class="secondary-hero-a">
                 <div class="gray-transparent-bg">
                <h1 class="secondary-hero-a-headline">WOMEN</h1>
                 </div>
                
            </div>
        </a>    
        <a href="http://catcode.com/linkguide/clickimage.html">
            <div class="secondary-hero-b">
                <div class="gray-transparent-bg">
					<h1 class="secondary-hero-b-headline">MEN</h1>
                </div>
            </div>
        </a>
