<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/post/content', get_post_format() ); ?>
					<p>Название дома: <?php the_field('name_home'); ?></p>
					<p>Координаты места нахождения: <?php the_field('location_coordinates'); ?></p>
					<p>Количество этажей: <?php the_field('number_of_floors'); ?></p>
					<p>Тип строения: <?php the_field('build_type'); ?></p>
					<hr>
					<p>Площадь: <?php the_field('area'); ?></p>
					<p>Количество комнат: <?php the_field('number_room'); ?></p>
					<p>Балкон: <?php the_field('balcony'); ?></p>
					<p>Санузел: <?php the_field('bathroom'); ?></p>
					<?php if( get_field('img_obj') || get_field('img') ):?>
					 <img src="<?php the_field('img_obj'); ?>" />
					 <img src="<?php the_field('img'); ?>" />
					<?php endif; ?><?php
								endwhile;
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				the_post_navigation(
					array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
					)
				);

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php
get_footer();
