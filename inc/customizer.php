<?php




//========================================================   tło strony 

$defaults = array(
'default-color' => '',
'default-image' => '',
'default-repeat' => '',
'default-position-x' => '',
'default-attachment' => '',
'wp-head-callback' => '_custom_background_cb',
'admin-head-callback' => '',
'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $defaults );



//============================================== ===          panel strony głównej

function panel_sg_customizer( $wp_customize ) {	
$wp_customize->add_panel( 'panel_sg', array(
	        'priority' => 10,
	        'capability' => 'edit_theme_options',
	        'theme_supports' => '',
	        'title' => __( 'Strona Główna', 'textdomain' ),
	        'description' => __( 'Description of what this panel does.', 'textdomain' ),
	    ) );	
	


	
	//==========================================================  MAPA 
	//========================================================== 
	//========================================================== 
	//==========================================================
	

	
}
add_action( 'customize_register', 'panel_sg_customizer' );





				//=====================================================      stopka
function footer_customize( $wp_customize ) {

$wp_customize->add_section( 'footer-seting', array(
     'title'       => __( 'Sekcja Stopki', 'aiboot42' ),
     'description' => __( 'Ustawienia stopki.', 'aiboot42' ),
     'priority'    => 100,
      )
    );

	$wp_customize->add_setting(
     'copy-footer', array(
     'default' => __( '&copy; kuli', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );
	
    $wp_customize->add_control(
     'copy-footer', array(
     'label'    => __( 'Copyright:', 'aiboot42' ),
     'section' => 'footer-seting',
     'type' => 'text',
      )
    );
	
	$wp_customize->add_setting(
     'realizacja-footer', array(
     'default' => __( 'kuli kuli', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );
	
    $wp_customize->add_control(
     'realizacja-footer', array(
     'label'    => __( 'Realizacja:', 'aiboot42' ),
     'section' => 'footer-seting',
     'type' => 'text',
      )
    );
}
add_action( 'customize_register', 'footer_customize' );


function sanitize_text( $input ) 
	{
    return wp_kses_post( force_balance_tags( $input ) );
	}

		
?>