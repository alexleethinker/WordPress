jQuery(document).ready(function($) {

	var window_send_to_editor_orginal_function = window.send_to_editor;

	var add_audio_button_hijacker_function = function(html) {
		audiohref = $('a','<div>'+html+'</div>').attr('href');
		console.log(html);
		console.log(audiohref);
		$('#'+formfield).val(audiohref);
		window.send_to_editor = window_send_to_editor_orginal_function;
		tb_remove();
	}

	$("body").delegate(".add_audio_button", "click", function(){
		formfield = $(this).attr('data-audio-input');
		tb_show('上传/插入音频', 'media-upload.php?type=audio&ffFunc=SINGLE_AUDIO&post_id=0&tab=type&TB_iframe=true');
		window.send_to_editor = add_audio_button_hijacker_function;
		return false;
	});

	if( -1 != location.href.indexOf('ffFunc=SINGLE_AUDIO') ){
		$('#tab-type_url').css('display','none');
		$('.savesend .button').val('Use this Audio');
		$('.media-item .audio-size-item:last input').click();

		// Audio Library
		if( -1 != location.href.indexOf('tab=library') ){
				$('body').find('.describe-toggle-on').after('<a class="toggle button-use-audio" href="#">使用</a>');
				$('body').find('.button-use-audio').css({'float':'right', 'line-height': '36px', 'margin-right':'15px'});
				$('body').find('.button-use-audio').unbind('click').click( function() {
				$(this).parents('.media-item:first').find(".savesend .button").click();
			});
		}
		// END Audio Library

		// Audio Upload
		if( -1 != location.href.indexOf('tab=type') ){
			setInterval( function() {
				items = $('body').find('.media-item');
				items.each(function( index ) {
					if( 0 == $(this).find('.button-use-audio').length ){
							$(this).find('.describe-toggle-on').after('<a class="toggle button-use-audio" href="#">使用</a>');
							$(this).find('.button-use-audio').css({'float':'right', 'line-height': '36px', 'margin-right':'15px'});
							$(this).find('.button-use-audio').unbind('click').click( function() {
							$(this).parents('.media-item:first').find(".savesend .button").click();
						});
					}
				});
			}, 300);
		}
		// END Audio Upload
		
	}

});