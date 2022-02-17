(function($){

	var $navbar_menuicon = $(".navbar-menuicon");

	$navbar_menuicon.on( "click", function(){

		var $menu_target = $(this).attr( "data-menu" );

		if( $( '#' + $menu_target ).hasClass( "in" ) ){
			$( '#' + $menu_target ).removeClass( "in" );
		}else if( ! $( '#' + $menu_target ).hasClass( "in" ) ){
			$( '#' + $menu_target ).addClass( "in" );
		}

		return false;
	});

	var $navbar_item_submenu = $("li.menu-item-has-children .menu-item-is-icon");

	$navbar_item_submenu.on( "click", function( e ){

		e.preventDefault();

		var $menu_target = $(this).parent("li.menu-item-has-children").find( ".sub-menu" );

		if( $menu_target.hasClass( "in" ) ){
			$menu_target.removeClass( "in" );
		}else if( ! $menu_target.hasClass( "in" ) ){
			$menu_target.addClass( "in" );
		}

	});

})(jQuery);