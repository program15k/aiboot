<?php 
  / ** 
  * WP Bootstrap Navwalker 
  * 
  * @package WP-Bootstrap-Navwalker 
  * / 
  / * 
  * Nazwa klasy: WP_Bootstrap_Navwalker 
  * Nazwa wtyczki: WP Bootstrap Navwalker 
  * Identyfikator URI wtyczki: https://github.com/wp-bootstrap/wp-bootstrap-navwalker 
  * Opis: niestandardowa klasa nawigatora WordPress do implementacji stylu nawigacyjnego Bootstrap 4 w niestandardowej kompozycji za pomocą wbudowanego menedżera menu WordPress. 
  * Autor: Edward McIntyre - @twittem, WP Bootstrap, William Patton - @pattonwebz 
  * Wersja: 4.1.0 
  * Identyfikator URI autora: https://github.com/wp-bootstrap 
  * Identyfikator URI GitHub Plugin: https://github.com/wp-bootstrap/wp-bootstrap-navwalker 
  * GitHub Branch: master 
  * Licencja: GPL-3.0 + 
  * Identyfikator URI licencji: http://www.gnu.org/licenses/gpl-3.0.txt 
  * / 
  / * Sprawdź, czy klasa istnieje.  * / 
  if( ! class_exists ( ' WP_Bootstrap_Navwalker ' )) { 
  / ** 
  * Klasa WP_Bootstrap_Navwalker. 
  * 
  * @extends Walker_Nav_Menu 
  * / 
  klasa WP_Bootstrap_Navwalker rozszerza Walker_Nav_Menu { 
  / ** 
  * Uruchamia listę przed dodaniem elementów. 
  * 
  * @since WP 3.0.0 
  * 
  * @ see Walker_Nav_Menu :: start_lvl () 
  * 
  * @param string $ output Służy do dołączania dodatkowej zawartości (przekazywanej przez odniesienie). 
  * @param int $ depth Głębokość pozycji menu.  Używane do wypełniania. 
  * @param stdClass $ args Obiekt z argumentami wp_nav_menu (). 
  * / 
  public function start_lvl ( & $ output , $ depth = 0 , $ args = array ()) { 
  if ( isset ( $ args -> item_spacing ) && ' discard ' === $ args -> item_spacing ) { 
  $ t = ' ' ; 
  $ n = ' ' ; 
  } else { 
  $ t = " \ t " ; 
  $ n = " \ n " ; 
  } 
  $ indent = str_repeat ( $ t , $ depth ); 
  // Domyślna klasa do dodania do pliku. 
  $ classes = array ( " menu rozwijane " ); 
  / ** 
  * Filtruje klasy (-y) CSS zastosowane do elementu listy menu. 
  * 
  * @since WP 4.8.0 
  * 
  * @param array $ classes Klasy CSS zastosowane do elementu menu `<ul>`. 
  * @param stdClass $ args Obiekt argumentów `wp_nav_menu ()`. 
  * @param int $ depth Głębokość pozycji menu.  Używane do wypełniania. 
  * / 
  $ class_names = join ( ' ' , apply_filters ( ' nav_menu_submenu_css_class ' , $ classes , $ args , $ depth )); 
  $ class_names = $ class_names ?  ' class = " ' . esc_attr ( $ class_names ) . ' " ' : ' ' ; 
  / ** 
  * Pojemnik `.dropdown-menu` musi mieć etykietę 
  * atrybut wskazujący na link wyzwalacza. 
  * 
  * Utwórz ciąg dla atrybutu labelledby od najnowszego 
  * link z identyfikatorem dodanym do wyjścia $. 
  * / 
  $ labelledby = ' ' ; 
  // znajdź wszystkie łącza z identyfikatorem w danych wyjściowych. 
  preg_match_all ( '/ (<a. * ? id = \ " | \' ) (. * ?) \" | \ ' . * ?> / im' , $ output , $ matches ); 
  // ze wskaźnikiem na końcu tablicy sprawdź, czy mamy dopasowanie identyfikatora. 
  if ( end ( $ matches [ 2 ])) { 
  // zbuduj ciąg znaków do użycia jako aria-labelledby. 
  $ labelledby = ' aria-labelledby = " ' . end ( $ matches [ 2 ]) . ' " ' ; 
  } 
  $ output . = " { $ n } { $ indent } <ul $ class_names $ labelledby role = \" menu \ " > { $ n } " ; 
  } 
  / ** 
  * Uruchamia wyjście elementu. 
  * 
  * @since WP 3.0.0 
  * @since WP 4.4.0 Dodano filtr { @see 'nav_menu_item_args'}. 
  * 
  * @ see Walker_Nav_Menu :: start_el () 
  * 
  * @param string $ output Służy do dołączania dodatkowej zawartości (przekazywanej przez odniesienie). 
  * @param WP_Post $ item Obiekt danych pozycji menu. 
  * @param int $ depth Głębokość pozycji menu.  Używane do wypełniania. 
  * @param stdClass $ args Obiekt z argumentami wp_nav_menu (). 
  * @param int $ id Bieżący identyfikator produktu. 
  * / 
  public function start_el ( & $ output , $ item , $ depth = 0 , $ args = array (), $ id = 0 ) { 
  if ( isset ( $ args -> item_spacing ) && ' discard ' === $ args -> item_spacing ) { 
  $ t = ' ' ; 
  $ n = ' ' ; 
  } else { 
  $ t = " \ t " ; 
  $ n = " \ n " ; 
  } 
  $ indent = ( $ depth )?  str_repeat ( $ t , $ depth ): ' ' ; 
  $ classes = empty ( $ item -> classes )?  array (): ( array ) $ item -> classes ; 
  // Inicjalizacja niektórych zmiennych właściciela w celu przechowywania specjalnie obsługiwanego przedmiotu 
  // opakowania i ikony. 
  $ linkmod_classes = array (); 
  $ icon_classes = array (); 
  / ** 
  * Uzyskaj zaktualizowaną tablicę $ classes bez klas łączenia lub ikon. 
  * 
  * UWAGA: tablice classmod i klasy ikon są przekazywane przez referencje i 
  * mogą być modyfikowane przed użyciem później w tej funkcji. 
  * / 
  $ classes = self :: seporate_linkmods_and_icons_from_classes ( $ classes , $ linkmod_classes , $ icon_classes , $ depth ); 
  // Przyłącz dowolne ikony ikon skreślone z $ classes do ciągu znaków. 
  $ icon_class_string = join ( ' ' , $ icon_classes ); 
  / ** 
  * Filtruje argumenty dla pojedynczego elementu menu nawigacyjnego. 
  * 
  * WP 4.4.0 
  * 
  * @param stdClass $ args Obiekt z argumentami wp_nav_menu (). 
  * @param WP_Post $ item Obiekt danych pozycji menu. 
  * @param int $ depth Głębokość pozycji menu.  Używane do wypełniania. 
  * / 
  $ args = apply_filters ( ' nav_menu_item_args ' , $ args , $ item , $ depth ); 
  // Dodaj .dropdown lub .aktywne klasy tam, gdzie są potrzebne. 
  if ( isset ( $ args -> has_children ) && $ args -> has_children ) { 
  $ classes [] = ' dropdown ' ; 
  } 
  if ( in_array ( ' current-menu-item ' , $ classes , true ) || in_array ( ' current-menu-parent ' , $ classes , true )) { 
  $ classes [] = ' active ' ; 
  } 
  // Dodaj niektóre dodatkowe klasy domyślne do elementu. 
  $ classes [] = ' menu-item- ' .  $ item -> ID ; 
  $ classes [] = ' nav-item ' ; 
  // Pozwól na filtrowanie klas. 
  $ classes = apply_filters ( ' nav_menu_css_class ' , array_filter ( $ classes ), $ item , $ args , $ depth ); 
  // Utwórz ciąg klas w formacie: class = "class_names". 
  $ class_names = join ( ' ' , $ classes ); 
  $ class_names = $ class_names ?  ' class = " ' . esc_attr ( $ class_names ) . ' " ' : ' ' ; 
  / ** 
  * Filtruje identyfikator zastosowany do elementu pozycji elementu menu. 
  * 
  * @since WP 3.0.1 
  * @since WP 4.1.0 Dodano parametr `$ depth`. 
  * 
  * @param string $ menu_id Identyfikator zastosowany do elementu `<li>` elementu menu. 
  * @param WP_Post $ item Bieżąca pozycja menu. 
  * @param stdClass $ args Obiekt z argumentami wp_nav_menu (). 
  * @param int $ depth Głębokość pozycji menu.  Używane do wypełniania. 
  * / 
  $ id = apply_filters ( ' nav_menu_item_id ' , ' menu-item- ' . $ item -> ID , $ item , $ args , $ depth ); 
  $ id = $ id ?  ' id = " ' . esc_attr ( $ id ) . ' " ' : ' ' ; 
  $ output . = $ indent .  ' <li itemscope = "itemscope" itemtype = "https://www.schema.org/SiteNavigationElement" ' .  $ id .  $ class_names .  " > " ; 
  // zainicjuj tablicę do przechowywania att $ dla elementu łącza. 
  $ atts = array (); 
  // Ustaw tytuł z elementu na tablicę $ atts - jeśli tytuł jest pusty 
  // domyślnie do tytułu artykułu. 
  if ( pusty ( $ item -> attr_title )) { 
  $ atts [ ' title ' ] = !  pusty ( $ item -> title )?  strip_tags ( $ item -> title ): ' ' ; 
  } else { 
  $ atts [ ' title ' ] = $ item -> attr_title ; 
  } 
  $ atts [ ' target ' ] = !  pusty ( $ item -> target )?  $ item -> target : " " ; 
  $ atts [ ' rel ' ] = !  pusty ( $ item -> xfn )?  $ item -> xfn : ' ' ; 
  // Jeśli element has_children dodaje atts do <a>. 
  if ( isset ( $ args -> has_children ) && $ args -> has_children && 0 === $ depth && $ args -> depth > 1 ) { 
  $ atts [ ' href ' ] = ' # ' ; 
  $ atts [ ' data-toggle ' ] = ' dropdown ' ; 
  $ atts [ ' aria-haspopup ' ] = ' true ' ; 
  $ atts [ ' aria-expanded ' ] = ' false ' ; 
  $ atts [ ' class ' ] = ' dropdown-toggle nav-link ' ; 
  $ atts [ ' id ' ] = ' menu-item-dropdown- ' .  $ item -> ID ; 
  } else { 
  $ atts [ ' href ' ] = !  pusty ( $ item -> url )?  $ item -> url : ' # ' ; 
  // Pozycje w listach rozwijanych używają elementu .dropdown zamiast .nav-link. 
  if ( $ depth > 0 ) { 
  $ atts [ ' class ' ] = ' dropdown-item ' ; 
  } else { 
  $ atts [ ' class ' ] = ' nav-link ' ; 
  } 
  } 
  // zaktualizuj atts tego elementu na podstawie dowolnych niestandardowych klas linkmod. 
  $ atts = self :: update_atts_for_linkmod_type ( $ atts , $ linkmod_classes ); 
  // Zezwalaj na filtrowanie tablicy $ atts przed jej użyciem. 
  $ atts = apply_filters ( ' nav_menu_link_attributes ' , $ atts , $ item , $ args , $ depth ); 
  // Zbuduj ciąg html zawierający wszystkie atty dla przedmiotu. 
  $ attributes = ' ' ; 
  foreach ( $ atts jako $ attr => $ value ) { 
  if ( ! empty ( $ value )) { 
  $ value = ( ' href ' === $ attr )?  esc_url ( wartość $ ): esc_attr ( wartość $ ); 
  Atrybuty $ . = ' ' .  $ attr .  ' = " ' . $ value . ' " ' ; 
  } 
  } 
  / ** 
  * Ustaw typeflag, aby łatwo sprawdzić, czy jest to linkmod, czy nie. 
  * / 
  $ linkmod_type = self :: get_linkmod_type ( $ linkmod_classes ); 
  / ** 
  * START dołączanie wewnętrznej zawartości przedmiotu do wyjścia. 
  * / 
  $ item_output = isset ( $ args -> before )?  $ args -> before : ' ' ; 
  / ** 
  * To jest początek wewnętrznego elementu nawigacji.  W zależności od czego 
  * rodzaj linkmod mamy może potrzebujemy różnych elementów opakowania. 
  * / 
  if ( ' ' ! == $ linkmod_type ) { 
  // to linkmod, wyprowadź wymagany element otwierający element. 
  $ item_output . = self :: linkmod_element_open ( $ linkmod_type , $ attributes ); 
  } else { 
  // Bez zestawu typów łączy link musi to być standardowy tag <a>. 
  $ item_output . = ' <a ' .  Atrybuty $ .  " > " ; 
  } 
  / ** 
  * Zainicjuj pustą ikonę var, a następnie, jeśli mamy ciąg zawierający dowolny 
  * klasy ikon tworzą znacznik ikony z elementem <i>.  To jest 
  * wyjście wewnątrz przedmiotu przed $ title (tekst linku). 
  * / 
  $ icon_html = ' ' ; 
  if ( ! empty ( $ icon_class_string )) { 
  // dodaj element <i> z klasami ikon do wartości wyjściowych przed łączami. 
  $ icon_html = ' <i class = " ' . esc_attr ( $ icon_class_string ) . ' " aria-hidden = "true"> </ i> ' ; 
  } 
  / * * Ten filtr jest udokumentowany w wp-includes / post-template.php * / 
  $ title = apply_filters ( ' the_title ' , $ item -> title , $ item -> ID ); 
  / ** 
  * Filtruje tytuł elementu menu. 
  * 
  * @since WP 4.4.0 
  * 
  * @param string $ title Tytuł pozycji menu. 
  * @param WP_Post $ item Bieżąca pozycja menu. 
  * @param stdClass $ args Obiekt z argumentami wp_nav_menu (). 
  * @param int $ depth Głębokość pozycji menu.  Używane do wypełniania. 
  * / 
  $ title = apply_filters ( ' nav_menu_item_title ' , $ title , $ item , $ args , $ depth ); 
  / ** 
  * Jeśli klasa .sr-only została ustawiona, zastosuj tylko tekst pozycji nav. 
  * / 
  if ( in_array ( ' sr-only ' , $ linkmod_classes , true )) { 
  $ title = self :: wrap_for_screen_reader ( $ title ); 
  $ keys_to_unset = array_keys ( $ linkmod_classes , ' sr-only ' ); 
  foreach ( $ keys_to_unset jako $ k ) { 
  unset ( $ linkmod_classes [ $ k ]); 
  } 
  } 
  // Umieść zawartość przedmiotu na $ output. 
  $ item_output . = isset ( $ args -> link_before )?  $ args -> link_before .  $ icon_html .  $ title .  $ args -> link_after : ' ' ; 
  / ** 
  * To koniec wewnętrznego elementu nawigacyjnego.  Musimy zamknąć 
  * poprawny element w zależności od typu łącza lub modu łącza. 
  * / 
  if ( ' ' ! == $ linkmod_type ) { 
  // to linkmod, wyprowadź wymagany element otwierający element. 
  $ item_output . = self :: linkmod_element_close ( $ linkmod_type , $ attributes ); 
  } else { 
  // Bez zestawu typów łączy link musi to być standardowy tag <a>. 
  $ item_output . = ' </a> ' ; 
  } 
  $ item_output . = isset ( $ args -> after )?  $ args -> after : ' ' ; 
  / ** 
  * END dołącza wewnętrzną zawartość do wyjścia. 
  * / 
  $ output . = apply_filters ( ' walker_nav_menu_start_el ' , item_output , item $ , $ depth , $ args ); 
  } 
  / ** 
  * Przemierzaj elementy, aby utworzyć listę z elementów. 
  * 
  * Wyświetl jeden element, jeśli element nie ma żadnych dzieci w inny sposób, 
  * wyświetla element i jego dzieci.  Przemieści się tylko do maksimum 
  * Głębokość i brak elementów ignorujących na tej głębokości.  Możliwe jest ustawienie 
  * maksymalna głębokość, aby uwzględnić wszystkie głębokości, patrz metoda walk (). 
  * 
  * Ta metoda nie powinna być wywoływana bezpośrednio, zamiast tego użyj metody walk (). 
  * 
  * @since WP 2.5.0 
  * 
  * @ see Walker :: start_lvl () 
  * 
  * @param object $ element danych obiektu. 
  * @param array $ element_elementów Lista elementów do kontynuacji ruchu (przekazywana przez odniesienie). 
  * @param int $ max_depth Maksymalna głębokość do przechodzenia. 
  * @param int $ depth Głębokość bieżącego elementu. 
  * @param array $ args Tablica argumentów. 
  * @param string $ output Służy do dołączania dodatkowej zawartości (przekazywanej przez odniesienie). 
  * / 
  public function display_element ( $ element , & $ elementy_dzieci , $ max_depth , $ depth , $ args , & $ output ) { 
  if ( ! $ element ) { 
  powrót ;  } 
  $ id_field = $ this -> db_fields [ ' id ' ]; 
  // Wyświetl ten element. 
  if ( is_object ( $ args [ 0 ])) { 
  $ args [ 0 ] -> has_children = !  empty ( $ element_elements [ $ element -> $ id_field ]);  } 
  parent :: display_element ( element $ , elementy podrzędne dla dzieci , max_depth , $ depth , $ args , $ output ); 
  } 
  / ** 
  * Fallback menu 
  * ============= 
  * Jeśli ta funkcja jest przypisana do zmiennej fallback_cb wp_nav_menu 
  * i menu nie zostało przypisane do lokalizacji motywu w WordPress 
  * menadżer menu funkcja z wyświetlaniem nic dla niezalogowanego użytkownika, 
  * i doda link do menedżera menu WordPress, jeśli jest zalogowany jako administrator. 
  * 
  * tablica @param array $ argumenty przekazane z funkcji wp_nav_menu. 
  * / 
  publiczny powrót funkcji statycznej ( $ args ) { 
  if (current_user_can ( ' edit_theme_options ' )) { 
  / * Pobierz argumenty.  * / 
  $ container = $ args [ ' container ' ]; 
  $ container_id = $ args [ ' container_id ' ]; 
  $ container_class = $ args [ ' container_class ' ]; 
  $ menu_class = $ args [ ' menu_class ' ]; 
  $ menu_id = $ args [ ' menu_id ' ]; 
  // zainicjuj var, aby przechowywać zastępczy html. 
  $ fallback_output = ' ' ; 
  if ( $ container ) { 
  $ fallback_output . = ' < ' .  esc_attr ( $ container ); 
  if ( $ container_id ) { 
  $ fallback_output . = ' id = " ' . esc_attr ( $ container_id ) . ' " ' ; 
  } 
  if ( $ container_class ) { 
  $ fallback_output . = ' class = " ' . esc_attr ( $ container_class ) . ' " ' ; 
  } 
  $ fallback_output . = ' > ' ; 
  } 
  $ fallback_output . = ' <ul ' ; 
  if ( $ menu_id ) { 
  $ fallback_output . = ' id = " . esc_attr ( $ menu_id ) . ' " ' ;  } 
  if ( $ menu_class ) { 
  $ fallback_output . = ' class = " ' . esc_attr ( $ menu_class ) . ' " ' ;  } 
  $ fallback_output . = ' > ' ; 
  $ fallback_output . = ' <li> <a href = " . esc_url (admin_url ( ' nav-menus.php ' )) . ' " title = " ' esc_attr __ ( ' Dodaj menu ' , ' wp-bootstrap-navwalker " ) . " "> " .  esc_html __ ( " Dodaj menu " , " wp-bootstrap-navwalker " ) .  " </a> </ li> " ; 
  $ fallback_output . = ' </ ul> ' ; 
  if ( $ container ) { 
  $ fallback_output . = ' </ ' .  esc_attr ( $ container ) .  " > " ; 
  } 
  // jeśli $ args ma klucz "echo" i jest to prawdziwe echo, w przeciwnym razie zwraca. 
  if ( array_key_exists ( ' echo ' , $ args ) && $ args [ ' echo ' ]) { 
  echo $ fallback_output ;  // WPCS: XSS OK. 
  } else { 
  return $ fallback_output ; 
  } 
  } 
  } 
  / ** 
  * Znajdź dowolne niestandardowe klasy linków lub ikon i przechowuj je w ich posiadaczu 
  * tablice następnie usuwają je z głównej tablicy klas. 
  * 
  * Obsługiwane metody odnośników: .disabled, .downdown-header, .dropdown-divider, .sr-only 
  * Obsługiwane zestawy ikon: Font Awesome 4/5, Glypicons 
  * 
  * UWAGA: To akceptuje linkmod i tablice ikon według referencji. 
  * 
  * @since 4.0.0 
  * 
  * @param array $ klasy tablica klas aktualnie przypisanych do przedmiotu. 
  * tablica @param $ linkmod_classes tablica do przechowywania klas linkmod. 
  * tablica @ tablica $ icon_classes tablica do przechowywania klas ikon. 
  * @param integer $ depth a integer utrzymujący bieżący poziom głębokości. 
  * 
  * @return array $ classes może zmodyfikowana tablica nazw klas. 
  * / 
  prywatna funkcja seporate_linkmods_and_icons_from_classes ( $ classes , $ linkmod_classes , $ icon_classes , $ depth ) { 
  // Pętla w tablicy $ classes, aby znaleźć klasy LinkMod lub ikony. 
  foreach ( $ classes jako $ key => $ class ) { 
  // Jeśli znajdziesz jakieś specjalne klasy, zapisz klasę w swojej klasie 
  // przechowuj tablicę i usuń element z klas $. 
  if ( preg_match ( '/ ^ disabled | ^ sr-only / i' , $ class )) { 
  // Testuj klasy .disabled lub .sr. 
  $ linkmod_classes [] = $ class ; 
  unset ( $ classes [ $ key ]); 
  } elseif ( preg_match ( '/ ^ dropdown-header | ^ dropdown-divider | ^ dropdown-item-text / i' , $ class ) && $ depth > 0 ) { 
  // Przetestuj dla .dropdown-header lub .dropdown-divider i a 
  // głębokość większa niż 0 - IE w rozwijanym menu. 
  $ linkmod_classes [] = $ class ; 
  unset ( $ classes [ $ key ]); 
  } elseif ( preg_match ( '/ ^ fa- ( \ S * )? | ^ fa (s | r | l | b)? ( \ s ?)? $ / i' , $ class )) { 
  // Font Awesome. 
  $ icon_classes [] = $ class ; 
  unset ( $ classes [ $ key ]); 
  } elseif ( preg_match ( '/ ^ glyphicon- ( \ S * )? | ^ glyphicon ( \ s ?) $ / i' , $ class )) { 
  // Glifosony. 
  $ icon_classes [] = $ class ; 
  unset ( $ classes [ $ key ]); 
  } 
  } 
  return $ classes ; 
  } 
  / ** 
  * Zwróć ciąg znaków zawierający typ łącza i zaktualizuj tablicę $ atts 
  * odpowiednio w zależności od decyzji. 
  * 
  * @since 4.0.0 
  * 
  * tablica @param tablica $ linkmod_classes dowolnych klas modyfikatorów linków. 
  * 
  * @return pusty dla domyślnego, inaczej łańcuch typu linkmod. 
  * / 
  prywatna funkcja get_linkmod_type ( $ linkmod_classes = array ()) { 
  $ linkmod_type = ' ' ; 
  // Pętla poprzez tablicę klas linkmod do obsługi ich $ atts. 
  if ( ! empty ( $ linkmod_classes )) { 
  foreach ( $ linkmod_classes jako $ link_class ) { 
  if ( ! empty ( $ link_class )) { 
  // sprawdź specjalne typy klas i ustaw dla nich flagę. 
  if ( ' dropdown-header ' === $ link_class ) { 
  $ linkmod_type = ' dropdown-header ' ; 
  } elseif ( ' dropdown-divider ' === $ link_class ) { 
  $ linkmod_type = ' dropdown-divider ' ; 
  } elseif ( ' dropdown-item-text ' === $ link_class ) { 
  $ linkmod_type = ' dropdown-item-text ' ; 
  } 
  } 
  } 
  } 
  return $ linkmod_type ; 
  } 
  / ** 
 * Zaktualizuj atrybuty elementu nawigacyjnego w zależności od klas limkmod. 
  * 
  * @since 4.0.0 
  * 
  * tablica @param tablica atts atts dla bieżącego łącza w elemencie nawigacyjnym. 
  * @param array $ linkmod_classes tablica klas, które modyfikują zachowanie lub ekrany linków lub elementów nawigacyjnych. 
  * 
  * @return array może zaktualizować tablicę atrybutów dla elementu. 
  * / 
  funkcja prywatna update_atts_for_linkmod_type ( $ atts = array (), $ linkmod_classes = array ()) { 
  if ( ! empty ( $ linkmod_classes )) { 
  foreach ( $ linkmod_classes jako $ link_class ) { 
  if ( ! empty ( $ link_class )) { 
  // zaktualizuj $ atts o spację i dodatkową nazwę klasy ... 
  // dopóki nie jest to klasa tylko dla sr. 
  if ( ' sr-only ' ! == $ link_class ) { 
  $ atts [ ' class ' ] . = ' ' .  esc_attr ( $ link_class ); 
  } 
  // sprawdź, czy dla specjalnych typów klas potrzebna jest dodatkowa obsługa. 
  if ( " disabled " === $ link_class ) { 
  // Konwertuj link do "#" i anuluj otwarte cele. 
  $ atts [ ' href ' ] = ' # ' ; 
  unset ( $ atts [ ' target ' ]); 
  } elseif ( ' dropdown-header ' === $ link_class || ' dropdown-divider ' === $ link_class || ' dropdown-item-text ' === $ link_class ) { 
  // Zapisz flagę typu i usuń href i cel. 
  unset ( $ atts [ ' href ' ]); 
  unset ( $ atts [ ' target ' ]); 
  } 
  } 
  } 
  } 
  return $ atts ; 
  } 
  / ** 
  * Zawija przekazany tekst w klasie tylko czytnika ekranu. 
  * 
  * @since 4.0.0 
  * 
  * @param string $ tekst ciąg tekstowy zawijany w klasie czytnika ekranu. 
  * @return string ciąg zawinięty w rozpiętość z klasą. 
  * / 
  funkcja prywatna wrap_for_screen_reader ( $ text = ' ' ) { 
  if ( $ text ) { 
  $ text = ' <span class = "sr-only"> ' .  $ tekst .  " </ span> " ; 
  } 
  return $ text ; 
  } 
  / ** 
  * Zwraca poprawny element otwierający i atrybuty dla funkcji linkmod. 
  * 
  * @since 4.0.0 
  * 
  * @param string $ linkmod_type a żądło zawierające flagę typu linkmod. 
  * @param string $ atrybuty ciągu atrybutów do dodania do elementu. 
  * 
  * @return ciąg znaków z tagiem openign dla elementu z dodanymi atrybutami attribibutes. 
  * / 
  private function linkmod_element_open ( $ linkmod_type , $ attributes = ' ' ) { 
  $ output = ' ' ; 
  if ( ' dropdown-item-text ' === $ linkmod_type ) { 
  $ output . = ' <span class = "dropdown-item-text" ' .  Atrybuty $ .  " > " ; 
  } elseif ( ' dropdown-header ' === $ linkmod_type ) { 
  // Dla nagłówka użyj zakresu z klasą .h6 zamiast rzeczywistą 
  // tag nagłówka, aby nie mylił czytników ekranu. 
  $ output . = ' <span class = "dropdown-header h6" ' .  Atrybuty $ .  " > " ; 
  } elseif ( ' dropdown-divider ' === $ linkmod_type ) { 
  // to jest dzielnik. 
  $ output . = ' <div class = "dropdown-divider" ' .  Atrybuty $ .  " > " ; 
  } 
  return $ output ; 
  } 
  / ** 
  * Zwróć poprawny znacznik zamykający dla elementu linkmod. 
  * 
  * @since 4.0.0 
  * 
  * @param string $ linkmod_type ciąg znaków zawierający specjalny typ odnośnika. 
  * 
  * @return łańcuch z tagiem zamykającym dla tego typu odnośnika. 
  * / 
  funkcja prywatna linkmod_element_close ( $ linkmod_type ) { 
  $ output = ' ' ; 
  if ( ' dropdown-header ' === $ linkmod_type || ' dropdown-item-text ' === $ linkmod_type ) { 
  // Dla nagłówka użyj zakresu z klasą .h6 zamiast rzeczywistą 
  // tag nagłówka, aby nie mylił czytników ekranu. 
  $ output . = ' </ span> ' ; 
  } elseif ( ' dropdown-divider ' === $ linkmod_type ) { 
  // to jest dzielnik. 
  $ output . = ' </ div> ' ; 
  } 
  return $ output ; 
  } 
  } 
 } 