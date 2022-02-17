(function($){

	var time_items = $('a[data-item="timetable-time"]');

	$(document).on('click', '#timetable-time-editor-cancel', function(){

		$("#timetable-time-item-" + $(this).attr('data-ID')).find('#timetable-time-item-view').css('display', 'block');
		$("#timetable-time-item-" + $(this).attr('data-ID')).find('#timetable-time-item-editor').css('display', 'none');


		return false;
	});

	$('a[data-item="timetable-time"]').on('click', function(){

        data = JSON.parse( $(this).attr('timetable-time') );
        request_url = $(this).attr('href');


        view = $("#timetable-time-item-" + data.ID).find('#timetable-time-item-view');
        editor = $("#timetable-time-item-" + data.ID).find('#timetable-time-item-editor');

        if( data.item_action == "edit" ){

        var content = "";

		content += '<div class="row no-gutters">';
		content += '<form action="' + request_url + '" method="post">';

		content += '<input type="hidden" name="action" value="submit_timetable_clock_editor">';
		content += '<input type="hidden" name="error" value="error_timetable-clock-editor-' + data.ID + '">';

		content +=	'<input type="hidden" name="redirect_url" value="' + data.redirect + '">';
		content +=	'<input type="hidden" id="submit_timetable_clock_editor-nonce" name="stayfit_manager_save_timetable-clock-editor" value="' + data.wp_nonce + '">';
		
		content +=	'<input type="hidden" name="item_id" value="' + data.item_id + '">';

		content +=	'<div class="col sm-12">'
		content +=		'<div class="form-group">';
		content +=			'<input type="time" id="ulica" name="timetable[clock]" value="' + data.item_value + '">';
		content +=		'</div>';
		content +=	'</div>';
		content +=	'<div class="col sm-12"><ul class="nav">';
		content +=	'<li><button type="submit" class="btn btn-primary" id="timetable-time-item-submit">Zapisz</button></li>';
		content +=	'<li><a href="#" id="timetable-time-editor-cancel" data-ID="' + data.ID + '">Anuluj</a></li></ul>';
		content +=	'</div>';

		content += '</form>';
		content += '</div>';

		editor.html(content);

		view.css( 'display', 'none' );
		editor.css( 'display', 'block' );


        }else if( data.item_action = "delete" ){


			$.ajax({
			    url: request_url + '?action=timetable-time&nonce=' + data.security,
			    method: "POST",
			    data:  data,
			    success: function(e){
					$("#timetable-time-item-" + data.ID).remove();
				}
			});
        }

        return false;

	});

	var request = function( url, attachments, response ){
        	


	}

})(jQuery);