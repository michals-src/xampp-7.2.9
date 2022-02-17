<?php

Class Dashboard{

    private $extra;
    private $navigation;

    private $default;

    public function __construct( $extra ){

        $this->extra = $extra["repository"];
        $this->navigation = $extra["navigation"];

        $this->default = "General";
        add_shortcode( "manager_dashboard", array( $this, "shortcode" ) );

    }

    protected function getPagesSlug(){

        return array_map(function( $navigation ){
            return $navigation["slug"];
        }, $this->navigation);

    }

    protected function getPagesLabel(){

        return array_map(function( $navigation ){

            return $navigation["label"];

        }, $this->navigation);

    }

    protected function currentPage(){

        $isPage = ! empty( $_GET["page"] ) ? true : false;

        if( false === $isPage ) return $this->default;

        $slug = filter_var( str_replace( "/\\", "", $_GET["page"] ), FILTER_SANITIZE_URL );

        if( ! in_array( $slug, $this->getPagesSlug() ) ||
            ! class_exists( ucfirst( $slug ) ) ||
            ! method_exists( ucfirst( $slug ), "load_template" )
        ){
            $slug = $this->default;
        }

        return $slug;

    }

    /**
     *
     *  Shortcode [manager_dashboard]
     *
     *  @since 1.0.0
     *
     */
    public function shortcode( $atts ){

        $params = is_array( $atts ) ? $atts : [];

        ob_start();

        $path = "Dashboard/Template";
        $params = array(
            'currentPage'   => $this->currentPage(),
            'navigation' => $this->navigation,
            'extra' => $this->extra,
        );

        if( ! is_user_logged_in() ){

            $path .= "_Unauthorized";
            $params = array();

        }

        $view = new View( $path, $params );

        $content = ob_get_contents();
        ob_end_clean();

        return $content;

    }


}
