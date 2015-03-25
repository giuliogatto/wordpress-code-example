<?php
/*
Plugin Name: Biciclette
Description: Declares a plugin that will create a custom post type displaying biciclette (bicycles)
Version: 1.0
Author: Giulio Gatto
License: GPLv2
*/


class custom_bike{

	// constructor
	
	function custom_bike(){
		
		// path variable initialization
		
		$this->custom_bike_plugin_url  = trailingslashit( plugins_url('', __FILE__ ) );
		
		// create custom post type of Biciclette
		
		add_action('init', array($this, 'create_biciclette'));
		
		// create the metabox
		
		add_action('add_meta_boxes', array($this, 'add_biciclette_metaboxes'));
		
		// the save post method
		
		add_action('save_post', array($this,'save_bicicletta'), 1, 2); 
		
		// register scripts and styles
		
		wp_register_script('jquery-indicator',$this->custom_bike_plugin_url.'js/indicator.js');
		
		wp_register_style( 'bike_wp_admin_css', $this->custom_bike_plugin_url . 'css/admin-style.css', false, '1.0.0' );
	
		add_action('admin_enqueue_scripts', array($this,'admin_load_js_css'));
		
		// allow uploads of files with POST
				
		add_action('post_edit_form_tag', array($this,'update_edit_form_bici')); 
		
	
	}
	
	function create_biciclette() {
	
    	register_post_type( 'biciclette',

       	 array(

            'labels' => array(

                'name' => 'Biciclette',

                'singular_name' => 'Bicicletta',

                'add_new' => 'Crea nuova',

                'add_new_item' => 'Crea nuova Bicicletta',

                'edit' => 'Modifica',

                'edit_item' => 'Modifica Bicicletta',

                'new_item' => 'Nuova Bicicletta',

                'view' => 'Vedi',

                'view_item' => 'Vedi bicicletta',

                'search_items' => 'Cerca biciclette',

                'not_found' => 'Nessuna bicicletta trovato',

                'not_found_in_trash' => 'Nessuna bicicletta trovato nel cestino',

                'parent' => 'Parent bicicletta'

            ),

            'public' => true,

			'show_in_nav_menus' => true,

            'menu_position' => 15,

            'supports' => array( 'title',  'editor',  'thumbnail' ),

            'taxonomies' => array( '' ),

            'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),

            'has_archive' => true

        	)

    	);

	}
	
	
	// allows file upload from form
	
	function update_edit_form_bici() {  
       
        echo ' enctype="multipart/form-data"';  
    } 
    
	// Add the biciclette Meta Box
	
	function add_biciclette_metaboxes() {
	
    	add_meta_box('bici_display', 'Dettagli della bicicletta', array($this, 'load_bike_data'), 'biciclette', 'normal', 'high');
	
	}
	
	// load js and css
	
	function admin_load_js_css(){
	
    	wp_enqueue_script( 'custom_js', plugins_url( '/js/indicator.js', __FILE__ ), array('jquery') );
    	
    	wp_enqueue_style( 'bike_wp_admin_css' );
	
	}
	
	function load_bike_data(){
	
		// TO DO: CHECK ALL UNUSED VARIABLES FROM OLD VERSION AND DELETE THEM
		
		global $post;
	    
	    $spec1 = get_post_meta($post->ID, '_spec1', true);
		$spec2 = get_post_meta($post->ID, '_spec2', true);
		$spec4 = get_post_meta($post->ID, '_spec4', true);
		$spec5 = get_post_meta($post->ID, '_spec5', true);
		$spec6 = get_post_meta($post->ID, '_spec6', true);
		$spec7 = get_post_meta($post->ID, '_spec7', true);
		$spec8 = get_post_meta($post->ID, '_spec8', true);
		$spec9 = get_post_meta($post->ID, '_spec9', true);
		$immagineprin = get_post_meta($post->ID, 'wp_custom_attachment3', true);
		$immaginesfondo = get_post_meta($post->ID, 'wp_custom_attachment', true);
		$dettaglio1 = get_post_meta($post->ID, 'wp_custom_attachment4', true);
		$dettaglio2 = get_post_meta($post->ID, 'wp_custom_attachment5', true);
		$dettaglio3 = get_post_meta($post->ID, 'wp_custom_attachment6', true);
		$colori_disponibili = get_post_meta($post->ID, 'wp_custom_attachment7', true); 
	
		$meccanica1_foto = get_post_meta($post->ID, 'wp_custom_attachment8', true);
		$meccanica2_foto = get_post_meta($post->ID, 'wp_custom_attachment9', true);
		$meccanica3_foto = get_post_meta($post->ID, 'wp_custom_attachment10', true);
		$manuale_tecnico = get_post_meta($post->ID, 'wp_custom_attachment11', true); 
	
		$display = get_post_meta($post->ID, '_spec10', true);
		$testobatteria = get_post_meta($post->ID, '_spec11', true);
		$meccanica1_testo  = get_post_meta($post->ID, '_spec12', true);
		$meccanica2_testo  = get_post_meta($post->ID, '_spec13', true);
		$meccanica3_testo  = get_post_meta($post->ID, '_spec14', true);   
		$telaio = get_post_meta($post->ID, '_spec15', true);
		$trazione = get_post_meta($post->ID, '_spec16', true);
		$motore = get_post_meta($post->ID, '_spec17', true);
		$batteria = get_post_meta($post->ID, '_spec18', true);
		$tempo_di_ricarica = get_post_meta($post->ID, '_spec19', true);
		$durata_di_una_ricarica = get_post_meta($post->ID, '_spec20', true);
		$caricabatteria = get_post_meta($post->ID, '_spec21', true);
		$cambio = get_post_meta($post->ID, '_spec22', true);
		$comandi = get_post_meta($post->ID, '_spec23', true);
		$dimensione_ruote = get_post_meta($post->ID, '_spec24', true);
		$peso = get_post_meta($post->ID, '_spec25', true);
		$forcella = get_post_meta($post->ID, '_spec26', true);
		$freno_anteriore = get_post_meta($post->ID, '_spec27', true);
		$freno_posteriore = get_post_meta($post->ID, '_spec28', true);
		$interfaccia = get_post_meta($post->ID, '_spec29', true);

		$spec30 = get_post_meta($post->ID, '_spec30', true);
		$spec31 = get_post_meta($post->ID, '_spec31', true);
		$spec32 = get_post_meta($post->ID, '_spec32', true);
		$spec33 = get_post_meta($post->ID, '_spec33', true);
		$dettaglio4 = get_post_meta($post->ID, 'wp_custom_attachment12', true);
		$dettaglio5 = get_post_meta($post->ID, 'wp_custom_attachment13', true);

		// foto x colori diversi
		$coloridiversi1 = get_post_meta($post->ID, 'wp_custom_attachment14', true);
		$coloridiversi2 = get_post_meta($post->ID, 'wp_custom_attachment15', true);
		$coloridiversi3 = get_post_meta($post->ID, 'wp_custom_attachment16', true);
		$coloridiversi4 = get_post_meta($post->ID, 'wp_custom_attachment17', true);
	
		$nomecoloridiversi1 = get_post_meta($post->ID, '_coloridiversi1', true);
		$nomecoloridiversi2 = get_post_meta($post->ID, '_coloridiversi2', true);
		$nomecoloridiversi3 = get_post_meta($post->ID, '_coloridiversi3', true);
		$nomecoloridiversi4 = get_post_meta($post->ID, '_coloridiversi4', true);
		$nomecoloreprincipale  = get_post_meta($post->ID, '_coloreprincipale', true);
		
		// show the metabox inside the admin page
		
		include_once('metabox.php');
				
    
	
	}
	
	// Save the Metabox Data
	function save_bicicletta($post_id, $post) {
		
		global $post;
		 		
   		// Is the user allowed to edit the post or page?
   	    if ( !current_user_can( 'edit_post', $post->ID )) return $post->ID;
    	
    	// TO DO: CHECK ALL UNUSED VARIABLES FROM OLD VERSION AND DELETE THEM
			
		// Save all the data inside the array $events_meta
		$events_meta['_spec1'] = $_POST['_spec1'];
		$events_meta['_spec2'] = $_POST['_spec2'];
		//$events_meta['_spec3'] = $_POST['_spec3'];
		$events_meta['_spec4'] = $_POST['_spec4'];
		$events_meta['_spec5'] = $_POST['_spec5'];
		$events_meta['_spec6'] = $_POST['_spec6'];
		$events_meta['_spec7'] = $_POST['_spec7'];
		$events_meta['_spec8'] = $_POST['_spec8'];
		$events_meta['_spec9'] = $_POST['_spec9'];
		$events_meta['_spec10'] = $_POST['_spec10'];
		$events_meta['_spec11'] = $_POST['_spec11'];
		$events_meta['_spec12'] = $_POST['_spec12'];
		$events_meta['_spec13'] = $_POST['_spec13'];
		$events_meta['_spec14'] = $_POST['_spec14'];
		$events_meta['_spec15'] = $_POST['_spec15'];
		$events_meta['_spec16'] = $_POST['_spec16'];
		$events_meta['_spec17'] = $_POST['_spec17'];
		$events_meta['_spec18'] = $_POST['_spec18'];
		$events_meta['_spec19'] = $_POST['_spec19'];
		$events_meta['_spec20'] = $_POST['_spec20'];
		$events_meta['_spec21'] = $_POST['_spec21'];
		$events_meta['_spec22'] = $_POST['_spec22'];
		$events_meta['_spec23'] = $_POST['_spec23'];
		$events_meta['_spec24'] = $_POST['_spec24'];
		$events_meta['_spec25'] = $_POST['_spec25'];
		$events_meta['_spec26'] = $_POST['_spec26'];
		$events_meta['_spec27'] = $_POST['_spec27'];
		$events_meta['_spec28'] = $_POST['_spec28'];
		$events_meta['_spec29'] = $_POST['_spec29'];
		$events_meta['_spec30'] = $_POST['_spec30'];
		$events_meta['_spec31'] = $_POST['_spec31'];
		$events_meta['_spec32'] = $_POST['_spec32'];
		$events_meta['_spec33'] = $_POST['_spec33'];
		$events_meta['_coloridiversi1'] = $_POST['_coloridiversi1'];
		$events_meta['_coloridiversi2'] = $_POST['_coloridiversi2'];
		$events_meta['_coloridiversi3'] = $_POST['_coloridiversi3'];
		$events_meta['_coloridiversi4'] = $_POST['_coloridiversi4'];
		$events_meta['_coloreprincipale'] = $_POST['_coloreprincipale'];

   		// Add values of $events_meta as custom fields inside the database
 	    foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
     		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
      		$value = implode(',', (array)$value); 
       		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
           		 update_post_meta($post->ID, $key, $value);
        	} else { // If the custom field doesn't have a value
          		 add_post_meta($post->ID, $key, $value);
        	}	
        	if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
    	}
	
		
		// Setup the array of supported file types.
        $supported_types = array('application/pdf','image/jpeg','image/gif','image/png');  
		
		// upload all the images in a single for loop
		// TO DO: CHECK ALL UNUSED IMAGES FROM OLD VERSION AND DELETE THEM
		
		$arrayimmagini=array(
			0 => 'wp_custom_attachment',
			1 => 'wp_custom_attachment1',
			2 => 'wp_custom_attachment2',
			3 => 'wp_custom_attachment3',
			4 => 'wp_custom_attachment4',
			5 => 'wp_custom_attachment5',
			6 => 'wp_custom_attachment6',
			7 => 'wp_custom_attachment7',
			8 => 'wp_custom_attachment8',
			9 => 'wp_custom_attachment9',
			10 => 'wp_custom_attachment10',
			11 => 'wp_custom_attachment11',
			12 => 'wp_custom_attachment12',
			13 => 'wp_custom_attachment13',
			14 => 'wp_custom_attachment14',
			15 => 'wp_custom_attachment15',
			16 => 'wp_custom_attachment16',
			17 => 'wp_custom_attachment17',
		
			);
		
		for($i=0;$i<count($arrayimmagini);$i++){
						
			if(!empty($_FILES[$arrayimmagini[$i]]['name'])) { 

        		$arr_file_type = wp_check_filetype(basename($_FILES[$arrayimmagini[$i]]['name']));  
        		
        		$uploaded_type = $arr_file_type['type'];  
        		
        		if(in_array($uploaded_type, $supported_types)) {  
            		
            		$upload = wp_upload_bits($_FILES[$arrayimmagini[$i]]['name'], null, file_get_contents($_FILES[$arrayimmagini[$i]]['tmp_name']));  
            		
            		if(isset($upload['error']) && $upload['error'] != 0) {  
                		
                		wp_die('There was an error uploading your file. The error is: ' . $upload['error']);  
            		
            		} else {  
               			
               			add_post_meta($post_id, $arrayimmagini[$i], $upload);  
                		
                		update_post_meta($post_id, $arrayimmagini[$i], $upload);  
            		
            		} 
            		 
        		} else {  
            		
            		wp_die("The file type that you've uploaded is not a valid image");  
       			
       			}  
    		
    		} // end of uploading images loop 
			
		
		} 
		
	
	

	} // end of save_bicicletta function
	
	
	
} // end of class

// create instance 

$custom_bike = new custom_bike();
?>