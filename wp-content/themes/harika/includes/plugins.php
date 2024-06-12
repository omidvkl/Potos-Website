<?php
function harika_register_required_plugins() {
	$plugins	 = array(
		array(
			'name'		 => 'المنتور',
			'slug'		 => 'elementor',
			'required'	 => true,
		),
		array(
			'name'		 => 'المنتور فارسی',
			'slug'		 => 'persian-elementor',
			'required'	 => true,
		),
		array(
			'name'		 => 'فرم تماس 7',
			'slug'		 => 'contact-form-7',
			'required'	 => false,
		),
		array(
			'name'		 => 'المنتور پرو',
			'slug'		 => 'elementor-pro',
			'required'	 => true,
			'source'     => 'https://webdev-demo.ir/plugins/elementor-pro.zip',
        ),


	);
	
	
	


	$config = array(
		'id'			 => 'harika', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	 => '', // Default absolute path to bundled plugins.
		'menu'			 => 'harika-install-plugins', // Menu slug.
		'parent_slug'	 => 'themes.php', // Parent menu slug.
		'capability'	 => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	 => true, // Show admin notices or not.
		'dismissable'	 => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg'	 => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	 => false, // Automatically activate plugins after installation or not.
		'message'		 => '', // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'harika_register_required_plugins' );

