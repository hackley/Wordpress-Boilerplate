<?php 

	// Stylesheets
	function theme_styles() {

		wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css' );	
			
	}
	add_action( 'wp_enqueue_scripts', 'theme_styles' );



	// Javascripts
	function theme_js() {

		// only used on home page, dependant on jQuery
		wp_register_script( 'main()', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true );
		if( is_page( 'home')) {
			wp_enqueue_script( 'main' );
		}

	}
	add_action( 'wp_enqueue_scripts', 'theme_js' );



	// Enable custom menues
	add_theme_support( 'menus' );

	// Enable featured images
	add_theme_support( 'post-thumbnails' );





	// CUSTOM POST TYPES ---------------------------------------------------------- \\

	// BASIC USAGE:
	// Replace "CUSTOM" with the name of the custom post type
	// Replace "FIELD" with the name of the custom meta field


	// DEFINE CUSTOM POST TYPE
	function CUSTOM_post_type() {
		$labels = array(
			'name'               => _x( 'Customs', 'post type general name' ),
			'singular_name'      => _x( 'Custom', 'post type singular name' ),
			'add_new'            => _x( 'Add New', 'book' ),
			'add_new_item'       => __( 'Add New Custom' ),
			'edit_item'          => __( 'Edit Custom' ),
			'new_item'           => __( 'New Custom' ),
			'all_items'          => __( 'All Customs' ),
			'view_item'          => __( 'View Custom' ),
			'search_items'       => __( 'Search Customs' ),
			'not_found'          => __( 'No customs found' ),
			'not_found_in_trash' => __( 'No customs found in the Trash' ), 
			'parent_item_colon'  => '',
			'menu_name'          => 'Customs'
		);
		$args = array(
			'labels'        => $labels,
			'description'   => 'Holds our customs and custom specific data',
			'public'        => true,
			'menu_position' => 10,
			'supports'      => array( 'title', 'thumbnail' ),
			'has_archive'   => false,
		);
		register_post_type( 'custom', $args );	
	}
	add_action( 'init', 'CUSTOM_post_type' ); // initialize that shiz





	// CUSTOM META BOXES

	// Fire our meta box setup function on the post editor screen
	add_action( 'load-post.php', 'CUSTOM_meta_boxes_setup' );
	add_action( 'load-post-new.php', 'CUSTOM_meta_boxes_setup' );

	// Meta box setup function
	function CUSTOM_meta_boxes_setup() {
		// Add meta boxes on the 'add_meta_boxes' hook
		add_action( 'add_meta_boxes', 'CUSTOM_add_meta_boxes' );
		// Save post meta on the 'save_post' hook
		add_action( 'save_post', 'CUSTOM_save_meta', 10, 2 );
	}




	// Create one or more meta boxes to be displayed on the post editor screen
	function CUSTOM_add_meta_boxes() {

		add_meta_box(
			'CUSTOM-FIELD1',			// Unique ID
			esc_html__( 'Custom Field 1', 'example' ),		// Title
			'render_CUSTOM_FIELD1',		// Render the form fields (callback function)
			'custom',				// Post Type
			'side',						// where to display on admin page
			'default'					// priority on admin page
		);

		add_meta_box(
			'CUSTOM-FIELD2',			// Unique ID
			esc_html__( 'Custom Field 2', 'example' ),		// Title
			'render_CUSTOM_FIELD2',		// Render the form fields (callback function)
			'custom',				// Post Type
			'advanced',						// where to display on admin page
			'default'					// priority on admin page
		);

	}




	// render meta box 1 (text input)
	function render_CUSTOM_FIELD1( $object, $box ) { 
		?>
			<?php wp_nonce_field( basename( __FILE__ ), 'CUSTOM_FIELD1_nonce' ); ?>
			<p>
				<label for="CUSTOM_FIELD1"><?php _e( "Custom Field 1:", 'example' ); ?></label>
				<br />
				<input type="text" name="CUSTOM_FIELD1" id="CUSTOM-FIELD1" value="<?php echo esc_attr( get_post_meta( $object->ID, 'CUSTOM_FIELD1', true ) ); ?>" size="30" />
			</p>
		<?php 
	}

	// render meta box 2 (textarea)
	function render_CUSTOM_FIELD2( $object, $box ) { 
		?>
			<?php wp_nonce_field( basename( __FILE__ ), 'CUSTOM_FIELD2_nonce' ); ?>
			<p>
				<label for="CUSTOM_FIELD2"><?php _e( "Custom Field 2:", 'example' ); ?></label>
				<br />
				<textarea name="CUSTOM_FIELD2" id="CUSTOM-FIELD2" style="width:100%; max-width:100%; height:200px;"><?php echo esc_attr( get_post_meta( $object->ID, 'CUSTOM_FIELD2', true ) ); ?></textarea>
			</p>
		<?php 
	}




	// Save the meta boxes' post metadata. 
	function CUSTOM_save_meta( $post_id, $post ){

		// List meta boxes here to add to the "Save" function
		$CUSTOM_fields = array(
			'CUSTOM_FIELD1',
			'CUSTOM_FIELD2'
		);

		// Update each meta field
		foreach ($CUSTOM_fields as $field_key) {
			// Verify the nonce
			if ( !isset( $_POST[$field_key.'_nonce'] ) || !wp_verify_nonce( $_POST[$field_key.'_nonce'], basename( __FILE__ ) ) )
				return $post_id;

			// Get the post type object. 
			$post_type = get_post_type_object( $post->post_type );

			// Check if the current user has permission to edit the post. 
			if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
				return $post_id;

			// Update!
			update_post_meta($post_id, $field_key, $_POST[$field_key]);
		}
	}

?>