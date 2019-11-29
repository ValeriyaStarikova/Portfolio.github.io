<?php
/**
 * Plugin Name: immovables-filter
 *
 * Network:     true
 */

$GLOBALS['my_query_filters'] = array(
		'field_1'	=> 'number_of_floors',
		'field_2'	=> 'build_type',
		'field_3'	=> 'number_room',
		'field_4'	=> 'balcony',
		'field_5'	=> 'bathroom'
	);
	add_action('pre_get_posts','my_pre_get_posts');
	function my_pre_get_posts( $query ){

	if( is_admin() ) return;

	if( !$query->is_main_query() ) return;
	
	$meta_query = $query->get('meta_query');

	foreach( $GLOBALS['my_query_filters'] as $key => $name ) {
	
		if( empty($_GET[ $name ]) ) {
			
			continue;
			
		}
		
		
		
		$value = explode(',', $_GET[ $name ]);
	
    	$meta_query = [
            ['key'		=> $name,
            'value'		=> $value,
            'compare'	=> 'IN',],
        ];
        
	} 
	
	$query->set('meta_query', $meta_query);
	}

add_action( 'init', 'im_custom_post_property' );
function im_custom_post_property() {
	register_taxonomy( 'Region', [ 'post' ], [
		'label'                 => '',
		'labels'                => [
			'name'              => 'Region',
			'singular_name'     => 'Region',
			'search_items'      => 'Search Regions',
			'all_items'         => 'All Regions',
			'view_item '        => 'View Region',
			'parent_item'       => 'Parent Region',
			'parent_item_colon' => 'Parent Region:',
			'edit_item'         => 'Edit Region',
			'update_item'       => 'Update Region',
			'add_new_item'      => 'Add New Region',
			'new_item_name'     => 'New Region Name',
			'menu_name'         => 'Region',
		],
		'description'           => '',
		'public'                => true,
		'hierarchical'          => false,
		'rewrite'               => true,
		'capabilities'          => array(),
		'meta_box_cb'           => null,
		'show_admin_column'     => false,
		'show_in_rest'          => null,
		'rest_base'             => null,
	] );
	
  // Set the labels, this variable is used in the $args array
  $labels = array(
    'name'               => __( 'Immovables' ),
    'singular_name'      => __( 'Immovables' ),
    'add_new'            => __( 'Add New immovables' ),
    'add_new_item'       => __( 'Add New immovables' ),
    'edit_item'          => __( 'Edit immovables' ),
    'new_item'           => __( 'New immovables' ),
    'all_items'          => __( 'All immovables' ),
    'view_item'          => __( 'View immovables' ),
    'search_items'       => __( 'Search immovables' ),
    'featured_image'     => 'Photo',
    'set_featured_image' => 'Add Photo'
  );
  $args = array(
    'labels'            => $labels,
    'description'       => ' ',
    'public'            => true,
    'menu_position'     => 5,
    'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
    'has_archive'       => true,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'has_archive'       => true,
    'query_var'         => 'object',
    'taxonomies'        => array( 'Region' ),
  );
  register_post_type( 'immovables', $args);
}
add_action( 'pre_get_posts', 'add_immovables_to_frontpage' );
function add_immovables_to_frontpage( $query ) {
    if ( is_home() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'object-immovables' ) );
    }
    return $query;
}
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
	'key' => 'group_5dcc72654ecdb',
	'title' => 'объект недвижимости',
	'fields' => array(
		array(
			'key' => 'field_5dcc729d099d1',
			'label' => 'название дома',
			'name' => 'name_home',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'введите название дома',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dcc7301099d2',
			'label' => 'координаты места нахождения',
			'name' => 'location_coordinates',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dcc733a099d3',
			'label' => 'количество этажей',
			'name' => 'number_of_floors',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				1 => '1',
				2 => '2',
				3 => '3',
				4 => '4',
				5 => '5',
				6 => '6',
				7 => '7',
				8 => '8',
				9 => '9',
				10 => '10',
				11 => '11',
				12 => '12',
				13 => '13',
				14 => '14',
				15 => '15',
				16 => '16',
				17 => '17',
				18 => '18',
				19 => '19',
				20 => '20',
			),
			'default_value' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'return_format' => 'value',
			'ajax' => 0,
			'placeholder' => '',
		),
		array(
			'key' => 'field_5dcc73ad099d4',
			'label' => 'тип строения',
			'name' => 'build_type',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'панель' => 'панель',
				'кирпич' => 'кирпич',
				'пеноблок' => 'пеноблок',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5dcc7423099d5',
			'label' => 'изображение',
			'name' => 'img_obj',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '30',
				'class' => 'castom',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'twentyseventeen-thumbnail-avatar',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '.png,.jpg',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'immovables',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));
acf_add_local_field_group(array(
	'key' => 'group_5dcc78383d30d',
	'title' => 'помещение',
	'fields' => array(
		array(
			'key' => 'field_5dcc7a37edc01',
			'label' => 'площадь',
			'name' => 'area',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5dcc7a58edc02',
			'label' => 'количество комнат',
			'name' => 'number_room',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				1 => '1',
				2 => '2',
				3 => '3',
				4 => '4',
				5 => '5',
				6 => '6',
				7 => '7',
				8 => '8',
				9 => '9',
				10 => '10',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5dcc7b7dedc03',
			'label' => 'балкон',
			'name' => 'balcony',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'да' => 'да',
				'нет' => 'нет',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5dcc7bededc04',
			'label' => 'санузел',
			'name' => 'bathroom',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'да' => 'да',
				'нет' => 'нет',
			),
			'allow_null' => 0,
			'other_choice' => 0,
			'default_value' => '',
			'layout' => 'horizontal',
			'return_format' => 'value',
			'save_other_choice' => 0,
		),
		array(
			'key' => 'field_5dcc7c13edc05',
			'label' => 'изображение',
			'name' => 'img',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '30',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'twentyseventeen-thumbnail-avatar',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'immovables',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));
endif;


function imm() {
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
<?php }?>
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
<?php return;
}
add_shortcode( 'imm', 'imm' );
