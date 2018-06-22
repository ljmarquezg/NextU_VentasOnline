<?php
    /*=================================================================================
			Incrementar el limite de memoria de Wordpress
	==================================================================================*/
    define( 'WP_MEMORY_LIMIT', '256M' );
    /*=================================================================================
			Agregar estilos css y javascript
	==================================================================================*/
    add_action( 'wp_enqueue_scripts', 'shop_isle_supermercados_max_enqueue_styles' );
    function shop_isle_supermercados_max_enqueue_styles() {
        wp_enqueue_style( 'bootstrap',  get_stylesheet_directory_uri().'/css/bootstrap.min.css' );
        wp_enqueue_style( 'shop-item',  get_stylesheet_directory_uri().'/css/shop-item.css' );
        wp_enqueue_style( 'child-style',  get_stylesheet_directory_uri().'/style.css' );
        wp_enqueue_script( 'javascript', get_stylesheet_directory_uri() . '/js/jquery.min.js', array( 'jquery' ), '1.0', true ); 
        wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js', array( 'jquery' ), '1.0', true ); 
    } 
    /*==================================================================================
        Modificar Hooks
    ===================================================================================*/
    add_action('init' , 'remove_functions' , 15 );
    function remove_functions() {
        /*header*/
        remove_action( 'storefront_header', 'storefront_header_container',                 0 );
        remove_action( 'storefront_header', 'storefront_header_container_close',           41 );
        remove_action( 'storefront_header', 'storefront_skip_links',                   5 );
        remove_action( 'storefront_header', 'storefront_site_branding',                20 );
        remove_action( 'storefront_header', 'storefront_secondary_navigation',         30 );
        remove_action( 'storefront_header', 'storefront_product_search',               40 );
        remove_action( 'storefront_header', 'storefront_header_cart',                  60 );
        remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 68 );
        remove_action( 'storefront_before_content','woocommerce_breadcrumb',10 );
        remove_action( 'storefront_footer',         'storefront_credit'                 ,20);

        add_action( 'storefront_header', 'storefront_primary_navigation_wrapper',       42 );
        add_action( 'storefront_header', 'storefront_site_branding',                    45 );
        add_action( 'storefront_header', 'storefront_primary_navigation',               50 );
        add_action( 'storefront_header', 'storefront_header_cart',                      60 );
        add_action( 'storefront_header', 'storefront_product_search',                   70 );
        add_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 80 );
        /*
		 * Hook: woocommerce_before_single_product_summary.
		 */
        remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
        /* 
        Hook: woocommerce_single_product_summary.
        */
       remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
       remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
       add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 30 );
       add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 40);
        
       /* 
       @hooked woocommerce_review_display_gravatar - 10
       */
      remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
        /*
		 * @hooked woocommerce_review_display_meta - 10
		 */
            remove_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta' , 10 );
            add_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta' , 50 );
            
        			/**
			 * The woocommerce_review_comment_text hook
			 *
			 * @hooked woocommerce_review_display_comment_text - 10
			 */
            remove_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text' , 10 );
			add_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 20 );

    }

    /*=================================================================================
			Agregar estilos bootsrap a menu wordpress
    ==================================================================================*/
    if ( ! function_exists( 'storefront_header_container' ) ) {
        /**
         * The header container
         */
        function storefront_header_container() {
            echo '<div class="header-container">';
        }
    }

    if ( ! function_exists( 'storefront_primary_navigation_wrapper' ) ) {
        /**
         * The primary navigation wrapper
         */
        function storefront_primary_navigation_wrapper() {
            // echo '<div class="storefront-primary-navigation"><div class="row">';
            echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark" role="navigation" aria-label="Navegación primaria"><!--fixed-top-->
                    <div class="container">';
        }
    }

    if ( ! function_exists( 'storefront_primary_navigation_wrapper_close' ) ) {
        /**
         * The primary navigation wrapper
         */
        function storefront_primary_navigation_wrapper_close() {
            // echo '<div class="storefront-primary-navigation"><div class="row">';
            echo '</div></nav>';
        }
    }

    if ( !function_exists( 'storefront_primary_navigation' ) ) {
        function storefront_primary_navigation() {
            ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <?php
                    $menu = 
                    wp_nav_menu(
                        array(
                            'container'         => 'div',
                            'container_id'      => 'navbarResponsive',
                            'container_class'   => 'collapse navbar-collapse',
                            'menu_class'        => 'navbar-nav ml-auto',
                            'theme_location'	=> 'primary',
                            'items_wrap'        => '<ul id="%1$s" class="navbar-nav ml-auto">%3$s</ul>',
                                                    'depth'             => 1,
                                                    'echo'              => false,
                            )
                        );
                    echo menu_bootstrap($menu);
                    
                    ?>
            <?php
        }
    }

    /*=============================================================================
            Mofificar contenido
    ==============================================================================*/
    if ( ! function_exists( 'storefront_before_content' ) ) {
        function storefront_before_content() {
            do_action( 'storefront_sidebar' );
            ?>
            <div id="primary" class="col-lg-9">
                <main id="main" class="site-main" role="main">
        <?php 
        }
    }
    
    if ( ! function_exists( 'storefront_after_content' ) ) {
        function storefront_after_content() {
            ?>   
                </main>
            </div>
            <?php 
           
        }
    }
    //Mostrar reviews y comentarios
    function _show_reviews() {
        comments_template();
    }   

    /*============================================================================
                Agregar estilo de menu bootstrap
    ============================================================================*/
	function menu_bootstrap($menu){
		return preg_replace('/<ul>/', '<ul  class="navbar-nav ml-auto">', 
			preg_replace( '#<li[^>]+>#', '<li class="nav-item">',
				preg_replace( '#<a #', '<a class="nav-link"', $menu
				)
			)
		);
    }
    /*============================================================================
                Mostrar Categorías
    ============================================================================*/

    add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');

    function custom_woocommerce_placeholder_img_src( ) {
        $image = get_stylesheet_directory_uri().'/img/thumbnail-324x324.jpg';
        return $image;
    }

    function default_image(){
        $image = get_stylesheet_directory_uri().'/img/thumbnail.jpg';
        return $image;
    }
    /*============================================================================
                Mostrar Categorías
    ============================================================================*/
    function show_categories(){
        global $post;
        global $wp;  
        //Obtener la dirección de la página actual
        $current_url = home_url(add_query_arg(array(),$wp->request).'/');       
        //Parámetros para obtener las categorías de todos los procuctos
        $term_categories = get_terms('product_cat', $args);
        $args = array(
            'taxonomy' => 'category',
            'orderby' => 'name',
            'order' => 'ASC',
            //Ocultar las categorías vacías
            'hide_empty' => 0
        );
        if (count($term_categories) > 0 || count($categories) > 0){
            $items = '<h1 class="my-4">Categorías</h1>
                        <div class="list-group">';
                        foreach ($term_categories as $key => $term_category) {
                            $active = '';
                            if($current_url === (get_term_link($term_category->term_id))){
                                //Agregar la clase active
                                $active = ' active';
                            }
                            $items .= '<a href="'.get_term_link($term_category->term_id).'" class="list-group-item'.$active.'">'.$term_category->name.'</a>';    
                        }
            $items .= ' </div>';
            echo $items;
        }
    }
    /*============================================================================
                Modificar thumbnails de productos
    ============================================================================*/
    function custom_show_product_images($attachment_id, $main_image=null) {
        return wp_get_attachment_image( $attachment_id, $image_size, false, array(
            'title'                   => get_post_field( 'post_title', $attachment_id ),
            'data-caption'            => get_post_field( 'post_excerpt', $attachment_id ),
            'data-src'                => $full_src[0],
            'data-large_image'        => $full_src[0],
            'data-large_image_width'  => $full_src[1],
            'data-large_image_height' => $full_src[2],
            'class'                   => $main_image ? $main_image : 'wp-post-image card-img-top img-fluid',
            )
        );
    }
     
    apply_filters( 'woocommerce_loop_add_to_cart_args', 'change_button_style' );
    function change_button_style(){
      $args = array(
          'class'=> 'btn btn-success'
      );
      return $args;
    }

    
    add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
    function woo_remove_product_tabs( $tabs ) {
        unset( $tabs['description'] );      	// Remove the description tab
        // unset( $tabs['reviews'] ); 			// Remove the reviews tab
        unset( $tabs['additional_information'] );  	// Remove the additional information tab
        return $tabs;
    }
    

    /*========================================================================
                Modificar footer
    ========================================================================*/
    if ( ! function_exists( 'storefront_footer_widgets' ) ) {

        function storefront_footer_widgets() {
            $rows    = intval( apply_filters( 'storefront_footer_widget_rows', 1 ) );
            $regions = intval( apply_filters( 'storefront_footer_widget_columns', 4 ) );
    
            for ( $row = 1; $row <= $rows; $row++ ) :
    
                // Defines the number of active columns in this footer row.
                for ( $region = $regions; 0 < $region; $region-- ) {
                    if ( is_active_sidebar( 'footer-' . strval( $region + $regions * ( $row - 1 ) ) ) ) {
                        $columns = $region;
                        break;
                    }
                }
    
                if ( isset( $columns ) ) : ?>
                    <div class=<?php echo '"footer-widgets row-' . strval( $row ) . ' block ' . ' fix"'; ?>><?php
    
                        for ( $column = 1; $column <= $columns; $column++ ) :
                            $footer_n = $column + $regions * ( $row - 1 );
    
                            if ( is_active_sidebar( 'footer-' . strval( $footer_n ) ) ) : ?>
    
                                <div class="footer-col">
                                    <?php dynamic_sidebar( 'footer-' . strval( $footer_n ) ); ?>
                                </div><?php
    
                            endif;
                        endfor; ?>
    
                    </div><!-- .footer-widgets.row-<?php echo strval( $row ); ?> --><?php
    
                    unset( $columns );
                endif;
            endfor;
        }
    }
    /*========================================================================
                Activar plugins
    ========================================================================*/
    function run_activate_plugin( $plugin ) {
		$current = get_option( 'active_plugins' );
		$plugin = plugin_basename( trim( $plugin ) );
	
		if ( !in_array( $plugin, $current ) ) {
			$current[] = $plugin;
			sort( $current );
			do_action( 'activate_plugin', trim( $plugin ) );
			update_option( 'active_plugins', $current );
			do_action( 'activate_' . trim( $plugin ) );
			do_action( 'activated_plugin', trim( $plugin) );
		}
		return null;
	}
    run_activate_plugin( 'woocommerce/woocommerce.php' );
    run_activate_plugin( 'paypal-for-woocommerce/paypal-for-woocommerce.php' );
    run_activate_plugin( 'google-analytics-dashboard-for-wp/gadwp.php' );
    run_activate_plugin( 'woocommerce-gateway-paypal-express-checkout/woocommerce-gateway-paypal-express-checkout.php' );
    run_activate_plugin( 'woocommerce-gateway-stripe/woocommerce-gateway-stripe.php' );
    run_activate_plugin( 'woocommerce-services/woocommerce-services.php' );
    run_activate_plugin( 'wp-crm/wp-crm.php' );
?>
