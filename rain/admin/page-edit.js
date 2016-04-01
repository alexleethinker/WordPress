jQuery(document).ready(function($) {
	// Is there page template switcher?
	if( 0 < $('#page_template').size() ){
		$(document).ready(function(){
			$('#page_template').change(function(){
				if( 'page-about.php' == $(this).val() ){
					$('#rain_custom_headlines').show();
				}else{
					$('#rain_custom_headlines').hide();
				}
			}).change();
		}); // $(document).ready(function(){
	} // if( 0 < $('#page_template').size() ){
}); // jQuery(document).ready(function($) {
