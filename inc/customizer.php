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
	
//=====================================================================   MENU
//=====================================================================  
//=====================================================================   

$wp_customize->add_section( 'menu_section', array(
     'title'       => __( 'Sekcja MENU', 'aiboot42' ),
     'description' => __( 'Ustawienia Nagłówka.', 'aiboot42' ),
     'priority'    => 2,
	 'panel' => 'panel_sg',
      )
    );	
 $wp_customize->add_setting(
     'tytul_menu', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'tytul_menu', array(
     'label'    => __( 'Tytół ', 'aiboot42' ),
     'section' => 'menu_section',
     'type' => 'text',
      )
    );
	
	$wp_customize->add_setting(
     'kolor_tytul_menu', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'kolor_tytul_menu', array(
     'label'    => __( 'Kolor tytułu ', 'aiboot42' ),
     'section' => 'menu_section',
     'type' => 'text',
      )
    );
	
	$wp_customize->add_setting(
     'podtyt_menu', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'podtyt_menu', array(
     'label'    => __( 'Podtytuł ', 'aiboot42' ),
     'section' => 'menu_section',
     'type' => 'text',
      )
    );
	
	$wp_customize->add_setting(
     'kolor_podtyt_menu', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'kolor_podtyt_menu', array(
     'label'    => __( 'Kolor podtytułu ', 'aiboot42' ),
     'section' => 'menu_section',
     'type' => 'text',
      )
    );
	
	$wp_customize->add_setting(
     'kolor_tla_menu', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'kolor_tla_menu', array(
     'label'    => __( 'Kolor tła ', 'aiboot42' ),
     'section' => 'menu_section',
     'type' => 'text',
      )
    );
	$wp_customize->add_setting(
     'kolor_tla_top_menu', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'kolor_tla_top_menu', array(
     'label'    => __( 'Kolor tła Top ', 'aiboot42' ),
     'section' => 'menu_section',
     'type' => 'text',
      )
    );
	
	$wp_customize->add_setting(
     'kolor_text_menu', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'kolor_text_menu', array(
     'label'    => __( 'Kolor text menu', 'aiboot42' ),
     'section' => 'menu_section',
     'type' => 'text',
      )
    );
	$wp_customize->add_setting(
     'kolor_text_hover_menu', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'kolor_text_hover_menu', array(
     'label'    => __( 'Kolor text hover menu ', 'aiboot42' ),
     'section' => 'menu_section',
     'type' => 'text',
      )
    );
	$wp_customize->add_setting(
     'kolor_tlo_hover_menu', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'kolor_tlo_hover_menu', array(
     'label'    => __( 'Kolor tło hover menu ', 'aiboot42' ),
     'section' => 'menu_section',
     'type' => 'text',
      )
    );
	
	$wp_customize->add_setting(
     'kolor_text_active_menu', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'kolor_text_active_menu', array(
     'label'    => __( 'Kolor text active menu', 'aiboot42' ),
     'section' => 'menu_section',
     'type' => 'text',
      )
    );
	$wp_customize->add_setting(
     'kolor_tlo_active_menu', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'kolor_tlo_active_menu', array(
     'label'    => __( 'Kolor tło active menu ', 'aiboot42' ),
     'section' => 'menu_section',
     'type' => 'text',
      )
    );
	
	
	$wp_customize->add_setting(
		'logo_menu', array(
		'default' =>get_stylesheet_directory_uri().'/img/logo.png')
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_menu', array(
			'label'    => __( 'Logo Menu', 'aiboot42' ),
			'section'  => 'menu_section',
			'priority'    => 7,
		)));
		

		
//========================================================         SLIDER
//========================================================      
//========================================================    

$wp_customize->add_section( 'baner_section', array(
     'title'       => __( 'Sekcja BANER', 'aiboot42' ),
     'description' => __( 'Ustawienia Sekcji BANER.', 'aiboot42' ),
     'priority'    => 3,
	 'panel' => 'panel_sg',
      )
    );
	
	$wp_customize->add_setting(
     'slider_baner', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'slider_baner', array(
     'label'    => __( 'Skrót Slidera ', 'aiboot42' ),
     'section' => 'baner_section',
     'type' => 'text',
      )
    );
	$wp_customize->add_setting(
     'wysokosc_baner', array(
     'default' => __( '80vh', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'wysokosc_baner', array(
     'label'    => __( 'Wysokość Slidera ', 'aiboot42' ),
     'section' => 'baner_section',
     'type' => 'text',
      )
    );

	$wp_customize->add_setting(
     'padding_top_baner', array(
     'default' => __( '100px', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'padding_top_baner', array(
     'label'    => __( 'Padding Top Slidera ', 'aiboot42' ),
     'section' => 'baner_section',
     'type' => 'text',
      )
    );

    
//=====================================================================   SEKCJA PODSTAWOWA
//=====================================================================  
//===================================================================== 
	
	
	
	$wp_customize->add_section( 'podstawowa_section', array(
     'title'       => __( 'Sekcja SEKCJA', 'aiboot42' ),
     'description' => __( 'Ustawienia Sekcji BANER.', 'aiboot42' ),
     'priority'    => 13,
	 'panel' => 'panel_sg',
      )
    );
	
	$wp_customize->add_setting(
     'klasa_section', array(
     'default' => __( 'section_class', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'padding_top_baner', array(
     'label'    => __( 'Klasa dodatkowa', 'aiboot42' ),
     'section' => 'klasa_section',
     'type' => 'text',
      )
    );
	$wp_customize->add_setting(
     'padding_section', array(
     'default' => __( 'section_class', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );		
	$wp_customize->add_control(
     'padding_top_baner', array(
     'label'    => __( 'padding Sekcji', 'aiboot42' ),
     'section' => 'padding_section',
     'type' => 'text',
      )
    );
  
	

		//=====================================  OFERTA
	
			
$wp_customize->add_section( 'oferta-section', array(
     'title'       => __( 'Sekcja OFERTA', 'aiboot42' ),
     'description' => __( 'Ustawienia Sekcji OFERTA.', 'aiboot42' ),
     'priority'    => 8,
	 'panel' => 'panel_sg',
      )
    );

 $categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
 
	$wp_customize->add_setting('oferta_cat', array(
		'default'        => $default
	));
	$wp_customize->add_control( 'oferta_cat', array(
		'settings' => 'oferta_cat',
		'label'   => 'Wybierz Kategorie Wpisów :',
		'section'  => 'oferta-section',
		'type'    => 'select',
		'choices' => $cats,
	));
	
	 $wp_customize->add_setting(
		'img_oferta', array(
		'default' =>get_stylesheet_directory_uri().'/img/onas.jpg')
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img_oferta', array(
			'label'    => __( 'Tło Sekcji', 'aiboot42' ),
			'section'  => 'oferta-section',
			'priority'    => 7,
		)));
		
		
			//=====================================  USŁUGI
	
			
$wp_customize->add_section( 'uslugi-section', array(
     'title'       => __( 'Sekcja PARTNERZY', 'redelta' ),
     'description' => __( 'Ustawienia Sekcji PARTNERZY.', 'redelta' ),
     'priority'    => 8,
	 'panel' => 'panel_sg',
      )
    );

 $categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
 
	$wp_customize->add_setting('uslugi_cat', array(
		'default'        => $default
	));
	$wp_customize->add_control( 'uslugi_cat', array(
		'settings' => 'uslugi_cat',
		'label'   => 'Wybierz Kategorie Wpisów :',
		'section'  => 'uslugi-section',
		'type'    => 'select',
		'choices' => $cats,
	));
	
	 $wp_customize->add_setting(
		'img_uslugi', array(
		'default' =>get_stylesheet_directory_uri().'/img/onas.jpg')
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img_uslugi', array(
			'label'    => __( 'Tło Sekcji', 'redelta' ),
			'section'  => 'uslugi-section',
			'priority'    => 7,
		)));	

//================== ======================================      galeria

	$wp_customize->add_section( 'galeria_section', array(
     'title'       => __( 'Sekcja SINGLE', 'aiboot42' ),
     'description' => __( 'Ustawienia SINGLE.', 'aiboot42' ),
     'priority'    => 15,
	  'panel' => 'panel_sg',
      )
    );
	
	 $wp_customize->add_setting(
		'img_single', array(
		'default' =>get_stylesheet_directory_uri().'/img/onas.jpg')
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img_single', array(
			'label'    => __( 'Tło Sekcji', 'aiboot42' ),
			'section'  => 'galeria_section',
			'priority'    => 3,
		)));	

	
	
	$categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
 
	$wp_customize->add_setting('galeria_cat', array(
		'default'        => $default
	));
	$wp_customize->add_control( 'galeria_cat', array(
		'settings' => 'galeria_cat',
		'label'   => 'Wybierz Kategorie Wpisów :',
		'section'  => 'galeria_section',
		'type'    => 'select',
		'choices' => $cats,
	));	
	
	 $wp_customize->add_setting(
     'header_galeria', array(
     'default' => __( 'header', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );	
		
	$wp_customize->add_control(
     'header_galeria', array(
     'label'    => __( 'Nagłówek Sekcji', 'aiboot42' ),
     'section' => 'galeria_section',
     'type' => 'text',
      )
    );
	
	 $wp_customize->add_setting(
     'content_galeria', array(
     'default' => __( 'content', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
	 
      )
    );	
		
	$wp_customize->add_control(
     'content_galeria', array(
     'label'    => __( 'Podpis Nagłówka Sekcji', 'aiboot42' ),
     'section' => 'galeria_section',
     'type' => 'textarea',
      )
    ); 
	
	//========================================================== sekcja NEWS
	
	$wp_customize->add_section( 'referencje_section', array(
     'title'       => __( 'Sekcja NEWS', 'aiboot42' ),
     'description' => __( 'Ustawienia Sekcji NEWS.', 'aiboot42' ),
     'priority'    =>20,
	 'panel' => 'panel_sg',
      )
    );

		$wp_customize->add_setting(
		'img_news', array(
		'default' =>get_stylesheet_directory_uri().'/img/tlo.jpg')
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img_news', array(
			'label'    => __( 'Tło Sekcji', 'aiboot42' ),
			'section'  => 'referencje_section',
			'priority'    => 7,
		)));
	
	
	
    $categories = get_categories();
	$cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cats[$category->slug] = $category->name;
	}
 
	$wp_customize->add_setting('referencje_cat', array(
		'default'        => $default
	));
	$wp_customize->add_control( 'referencje_cat', array(
		'settings' => 'referencje_cat',
		'label'   => 'Wybierz Kategorie Wpisów :',
		'section'  => 'referencje_section',
		'type'    => 'select',
		'choices' => $cats,
	));
	 $wp_customize->add_setting(
     'header_referencje', array(
     'default' => __( 'header', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );	
		
	$wp_customize->add_control(
     'header_referencje', array(
     'label'    => __( 'Nagłówek Sekcji', 'aiboot42' ),
     'section' => 'referencje_section',
     'type' => 'text',
      )
    );
	
	
	
    // ========================================================= sekcja KONTAKT
	
	$wp_customize->add_section( 'kontakt_section', array(
     'title'       => __( 'Sekcja KONTAKT', 'aiboot42' ),
     'description' => __( 'Ustawienia Sekcji KONTAKT.', 'aiboot42' ),
     'priority'    => 30,
	 'panel' => 'panel_sg',
      )
    );	
	
	
		$wp_customize->add_setting(
		'img_kontakt', array(
		'default' =>get_stylesheet_directory_uri().'/img/tlo.jpg')
		);
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img_kontakt', array(
			'label'    => __( 'Obraz Sekcji', 'aiboot42' ),
			'section'  => 'kontakt_section',
			'priority'    => 7,
		)));

		
	 $wp_customize->add_setting(
     'header_kontakt', array(
     'default' => __( 'header', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );	
		
	$wp_customize->add_control(
     'header_kontakt', array(
     'label'    => __( 'Nagłówek Sekcji', 'aiboot42' ),
     'section' => 'kontakt_section',
     'type' => 'text',
      )
    );
	
	 $wp_customize->add_setting(
     'content_kontakt', array(
     'default' => __( 'content', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
	 
      )
    );	
		
	$wp_customize->add_control(
     'content_kontakt', array(
     'label'    => __( 'Treść  Sekcji', 'aiboot42' ),
     'section' => 'kontakt_section',
     'type' => 'textarea',
      )
    ); 
	
	 $wp_customize->add_setting(
     'tel_kontakt', array(
     'default' => __( 'header', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );	
		
	$wp_customize->add_control(
     'tel_kontakt', array(
     'label'    => __( 'Nr Tel', 'aiboot42' ),
     'section' => 'kontakt_section',
     'type' => 'text',
      )
    );
	
	 $wp_customize->add_setting(
     'email_kontakt', array(
     'default' => __( 'content', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
	 
      )
    );	
		
	$wp_customize->add_control(
     'email_kontakt', array(
     'label'    => __( 'Adres Email', 'aiboot42' ),
     'section' => 'kontakt_section',
     'type' => 'text',
      )
    ); 
	
	 $wp_customize->add_setting(
     'adres_kontakt', array(
     'default' => __( 'content', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
	 
      )
    );	
		
	$wp_customize->add_control(
     'adres_kontakt', array(
     'label'    => __( 'Adres', 'aiboot42' ),
     'section' => 'kontakt_section',
     'type' => 'text',
      )
    ); 
	 $wp_customize->add_setting(
     'godziny_kontakt', array(
     'default' => __( 'content', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
	 
      )
    );	
		
	$wp_customize->add_control(
     'godziny_kontakt', array(
     'label'    => __( 'Godziny Otwarcia', 'aiboot42' ),
     'section' => 'kontakt_section',
     'type' => 'textarea',
      )
    ); 

	
//================== ======================================      social media
	
	$wp_customize->add_section( 'social_section', array(
     'title'       => __( 'Sekcja SOCIAL', 'aiboot42' ),
     'description' => __( 'Ustawienia Social Media.', 'aiboot42' ),
     'priority'    => 60,
	  'panel' => 'panel_sg',
      )
    );
	
	$wp_customize->add_setting( 'facebook', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'facebook', array(
		'label'   => __( 'Facebook url:', 'aiboot42' ),
		'section' => 'social_section',
		'type'    => 'text',
	) );

	$wp_customize->add_setting( 'flickr', array(
		'default'  => '',
	) );

	$wp_customize->add_control( 'flickr', array(
		'label'   => __( 'Flickr url:', 'aiboot42' ),
		'section' => 'social_section',
		'type'    => 'text',
	) );	
	
	$wp_customize->add_setting( 'googleplus', array(
		'default'        => '',
	) );


	$wp_customize->add_control( 'googleplus', array(
		'label'   => __( 'Google + url:', 'aiboot42' ),
		'section' => 'social_section',
		'type'    => 'text',
	) );
	
	$wp_customize->add_setting( 'instagram', array(
		'default'        => '',
	) );


	$wp_customize->add_control( 'instagram', array(
		'label'   => __( 'Instagram url:', 'aiboot42' ),
		'section' => 'social_section',
		'type'    => 'text',
	) );
	
	
	$wp_customize->add_setting( 'linkedin', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'linkedin', array(
		'label'   => __( 'LinkedIn url:', 'aiboot42' ),
		'section' => 'social_section',
		'type'    => 'text',
	) );
	
	$wp_customize->add_setting( 'pinterest', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'pinterest', array(
		'label'   => __( 'Pinterest url:', 'aiboot42' ),
		'section' => 'social_section',
		'type'    => 'text',
	) );

	
	$wp_customize->add_setting( 'skype', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'skype', array(
		'label'   => __( 'Skype ID:', 'aiboot42' ),
		'section' => 'social_section',
		'type'    => 'text',
	) );	
	
	$wp_customize->add_setting( 'twitter', array(
		'default'        => '',
	) );


	$wp_customize->add_control( 'twitter', array(
		'label'   => __( 'Twitter url:', 'aiboot42' ),
		'section' => 'social_section',
		'type'    => 'text',
	) );
	
	
	$wp_customize->add_setting( 'vimeo', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'vimeo', array(
		'label'   => __( 'Vimeo url:', 'aiboot42' ),
		'section' => 'social_section',
		'type'    => 'text',
	) );	

		$wp_customize->add_setting( 'youtube', array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'youtube', array(
		'label'   => __( 'YouTube url:', 'aiboot42' ),
		'section' => 'social_section',
		'type'    => 'text',
	) );
	

	//==========================================================  MAPA 
	//========================================================== 
	//========================================================== 
	//==========================================================
	
	$wp_customize->add_section( 'mapa_section', array(
     'title'       => __( 'Sekcja MAPA', 'aiboot42' ),
     'description' => __( 'Ustawienia Sekcji MAPA.', 'aiboot42' ),
     'priority'    =>100,
	 'panel' => 'panel_sg',
      )
    );

	$wp_customize->add_setting(
     'nazwa_mapa', array(
     'default' => __( 'nazwa', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );	
		
	$wp_customize->add_control(
     'nazwa_mapa', array(
     'label'    => __( 'Nazwa mapy', 'aiboot42' ),
     'section' => 'mapa_section',
     'type' => 'text',
      )
    );
	
	$wp_customize->add_setting(
     'wysokosc_mapa', array(
     'default' => __( '400px', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );	
		
	$wp_customize->add_control(
     'wysokosc_mapa', array(
     'label'    => __( 'wysokosc mapy', 'aiboot42' ),
     'section' => 'mapa_section',
     'type' => 'text',
      )
    );
	
	
	
	 $wp_customize->add_setting(
     'szerokosc_mapa', array(
     'default' => __( '51', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );	
		
	$wp_customize->add_control(
     'szerokosc_mapa', array(
     'label'    => __( 'Szerokość geograficzna', 'aiboot42' ),
     'section' => 'mapa_section',
     'type' => 'text',
      )
    );
	
	 $wp_customize->add_setting(
     'dlugosc_mapa', array(
     'default' => __( '21', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );	
		
	$wp_customize->add_control(
     'dlugosc_mapa', array(
     'label'    => __( 'Długość geograficzna', 'aiboot42' ),
     'section' => 'mapa_section',
     'type' => 'text',
      )
    );
	
	$wp_customize->add_setting(
     'zoom_mapa', array(
     'default' => __( 'zoom', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );	
		
	$wp_customize->add_control(
     'zoom_mapa', array(
     'label'    => __( 'Zoom mapy', 'aiboot42' ),
     'section' => 'mapa_section',
     'type' => 'text',
      )
    );
	$wp_customize->add_setting(
     'marker_mapa', array(
     'default' => __( 'http://fix.visarto.pl/marker2.png', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
      )
    );	
		
	$wp_customize->add_control(
     'marker_mapa', array(
     'label'    => __( 'Marker mapy', 'aiboot42' ),
     'section' => 'mapa_section',
     'type' => 'text',
      )
    );
	
	 $wp_customize->add_setting(
     'skorka_mapa', array(
     'default' => __( '', 'aiboot42' ),
     'sanitize_callback' => 'sanitize_text',
	 
      )
    );	
		
	$wp_customize->add_control(
     'skorka_mapa', array(
     'label'    => __( 'Skórka  mapy', 'aiboot42' ),
     'section' => 'mapa_section',
     'type' => 'textarea',
      )
    ); 
	
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