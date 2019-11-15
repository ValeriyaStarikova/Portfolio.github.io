<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<style>
	#search{ width: 350px;} .archive .site-main > article{margin-top: 4em;} #main hr{ margin-bottom: 0px;} .filter_text { margin-bottom: 3px; } .filter__item{ display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;} .filter__item select{ width: 200px; padding: 10px;}
</style>
<div class="wrap">

	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header><!-- .page-header -->
	<?php endif; ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div id="search">
					<?php
					foreach( $GLOBALS['my_query_filters'] as $key => $name ){
						$field = get_field_object($name);
						$values = explode(',',$_GET[$name]);
					?>
					<div class="filter__item">
					<span><?php echo $field['label'];?></span>
					<select>
						<?php foreach ($field['choices'] as $choice_value => $choice_label) : ?>
							<option label="<?php echo $choice_label; ?>" value="<?php echo $choice_value; ?>"
								<?php if(in_array($choice_value,$values)) : ?>
									selected="selected"<?php endif;?>><?php echo $field['name']; ?>
							</option>
						<?php
					endforeach;?>
				</select></div>
			<?php } ?>

	</div>
	<script type="text/javascript">
	(function($) {

		$('#search select').on('change', function(){
			var $select = $(this).closest('select'),
					vals = [],
					text = [];
			$select.find('option:selected').each(function() {
				text.push($(this).text());
				vals.push($(this).val());
				console.log($select.find('option:selected'));
			});
			vals = vals.join(",");

			window.location.replace('<?php echo home_url('immovables');?>?' + text + '=' + vals);
		});
	})(jQuery);
	</script>
		<?php
		if ( have_posts() ) :
			?>
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/post/content', get_post_format() );
			?>
				<p class="filter_text">Название дома: <?php the_field('name_home'); ?></p>
				<p class="filter_text">Координаты места нахождения: <?php the_field('location_coordinates'); ?></p>
				<p class="filter_text">Количество этажей: <?php the_field('number_of_floors'); ?></p>
				<p class="filter_text">Тип строения: <?php the_field('build_type'); ?></p>
				<hr>
				<p class="filter_text">Площадь: <?php the_field('area'); ?></p>
				<p class="filter_text">Количество комнат: <?php the_field('number_room'); ?></p>
				<p class="filter_text">Балкон: <?php the_field('balcony'); ?></p>
				<p class="filter_text">Санузел: <?php the_field('bathroom'); ?></p>

				<?php
					$image = get_field('img');
					$image2 = get_field('img_obj');
					if( !empty( $image ) || !empty( $image2 ) ): ?>
					    <img style="width:100px; height:100px;" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
							<img style="width:100px; height:100px;" src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
					<?php endif;
				endwhile;

			the_posts_pagination(
				array(
					'prev_text'          => twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '<span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
					'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span>' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
				)
			);

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div><!-- .wrap -->

<?php
get_footer();
