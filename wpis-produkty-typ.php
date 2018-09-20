<?php

//==========================   własny typ WPISU =========================

add_action('init', 'note_register');
 
function note_register() {
    $args = array(
        'label' => __('Podukty'),
        'singular_label' => __('Produkty'),
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => true,
        'supports' => array('title','thumbnail','excerpt')
    );
    register_post_type( 'note' , $args );
}
add_action("admin_init", "add_note_info");
 
 
//  ========================  pola wpisu 
 
 
function add_note_info() {
    add_meta_box("opis-meta",  __( 'Opis') , "meta_options", "note", "normal", "low");
}

function meta_options() {
    global $post;
     
    $custom = get_post_custom($post->ID);
     
    $portfolio_content = $custom["portfolio_content"][0];?>    
    <label style="display: block; margin-bottom: 5px"> <?php _e( 'Opisz Produkt:') ?> </label><textarea cols="20" rows="5" name="portfolio_content" style="width:99%"><?php echo esc_attr( $portfolio_content ); ?> </textarea>'
     
    <?php $portfolio_link = $custom["portfolio_link"][0]; ?>
    <label><?php _e( 'Link do strony:') ?></label><input type="text" name="portfolio_link" value="<?php echo esc_attr( $portfolio_link ); ?>" size="80" style="width:97%" />
     
	 <?php $portfolio_foto_1 = $custom["portfolio_foto_1"][0]; ?>
    <label><?php _e( 'foto 1:') ?></label><input type="text" name="portfolio_foto_1" value="<?php echo esc_attr( $portfolio_foto_1 ); ?>" size="80" style="width:97%" />
     
	  <?php $portfolio_foto_2 = $custom["portfolio_foto_2"][0]; ?>
    <label><?php _e( 'foto 2:') ?></label><input type="text" name="portfolio_foto_2" value="<?php echo esc_attr( $portfolio_foto_2 ); ?>" size="80" style="width:97%" />
     
	   <?php $portfolio_foto_3 = $custom["portfolio_foto_3"][0]; ?>
    <label><?php _e( 'foto 3:') ?></label><input type="text" name="portfolio_foto_3" value="<?php echo esc_attr( $portfolio_foto_3 ); ?>" size="80" style="width:97%" />
     
<?php }	


//=======================   zapis do bazy


add_action('save_post', 'save_note_data');
 
function save_note_data() {
    global $post;
     
		update_post_meta($post->ID, "portfolio_content", $_POST["portfolio_content"]);
		update_post_meta($post->ID, "portfolio_link", $_POST["portfolio_link"]);
		update_post_meta($post->ID, "portfolio_foto_1", $_POST["portfolio_foto_1"]);
		update_post_meta($post->ID, "portfolio_foto_2", $_POST["portfolio_foto_2"]);
		update_post_meta($post->ID, "portfolio_foto_3", $_POST["portfolio_foto_3"]);
}

//=======================  pola edycji

add_filter("manage_edit-note_columns", "note_edit_columns");
 
function note_edit_columns($columns) {
    $columns = array(
        "cb" => '<input type="checkbox">',
        "title" => __('Nazwa Produktu'),                     
        "portfolio_content" => __('Description'),
        "portfolio_link" => __('link'),
        'date' => __('Data'),
    );
    return $columns;
}
add_action("manage_posts_custom_column",  "note_custom_columns");
 
function note_custom_columns($column) {
    global $post;
    switch ($column) {
        case "portfolio_content":
            $custom = get_post_custom();
            echo $custom["portfolio_content"][0];
            break;
        case "portfolio_link":
            $custom = get_post_custom();
            echo $custom["portfolio_link"][0];
            break;
    }       
}	



?>