<?php

Class Ajax{

    public static $container = array( "private" => array(), "public" => array() );

    public static function register( $request = array(), $private = true ){

        $structure = array();

        $structure[ "url" ] = admin_url( "admin-ajax.php?action=" . $request[ "url" ] . "&nonce=" . $request[ "security" ]  );
        $structure[ "action" ] = $request[ "url" ];
        $structure[ "target" ] = $request[ "target" ];
        $structure[ "response" ] = $request[ "response" ];
        $structure[ "redirect" ] = $request[ "redirect" ];

        if( true === $private ){
            array_push( self::$container["private"], $structure );
        }else if( false === $private ){
            array_push( self::$container["public"], $structure );
        }

    }

    public static function set(){

        if( is_user_logged_in() ){
            //self::LoadPrivate();
            add_action( "wp_footer", array( "Ajax", "LoadPrivate" ) );
        }

        //self::LoadPublic();
        foreach( self::$container["public"] as $structure ){
            add_action( "wp_ajax_nopriv_" . $structure["action"], array( $structure["response"][0], $structure["response"][1] ) );
        }

        add_action( "wp_footer", array( "Ajax", "LoadPublic" ) );

    }

    public static function loadPrivate(){

    }

    public static function LoadPublic(){

        ?>

            <script type="text/javascript" id="manager">
                (function($){

                    var notice = {
                        parent: function( type, msg ){
                                var el = document.createElement( "div" );
                                el.className = "alert alert-" + type;
                                el.innerHTML = msg;

                                return el;
                        },
                        error: function( msg ){
                            $(".manager-ajax-alerts").append( notice.parent( "danger", msg ) );
                        },
                        success: function( msg ){
                            $(".manager-ajax-alerts").append( notice.parent( "success", msg ) );
                        },
                        info: function( msg ){
                            $(".manager-ajax-alerts").append( notice.parent( "info", msg ) );
                        },
                        clear: function(){
                            $(document).find(".manager-ajax-alerts .alert").remove();
                        }
                    };

                    <?php foreach( self::$container["public"] as $structure ){ ?>
                        $( '#<?php echo $structure["target"]; ?>').on( "submit", function(){

                            notice.clear();

                            var data = $(this).serialize();

                            $.ajax({
                                url: "<?php echo $structure["url"]; ?>",
                                method: "POST",
                                data:  data,
                                success: function(e){

                                    if( false == e.success ){
                                        notice.error( e.data.message );
                                        return;
                                    }

                                    <?php if( ! empty( $structure["redirect"] ) ){ ?>
                                        window.location.href = "<?php echo $structure["redirect"]; ?>"
                                    <?php } ?>

                                }
                            });
                            return false;
                        });

                    <?php }; ?>

                })(jQuery);
            </script>

        <?php

    }

}

?>
