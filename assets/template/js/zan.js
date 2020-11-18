jQuery( document ).ready(function(){
	jQuery("button.banner").on('click', function(){
		jQuery(".setting-banner").slideToggle('fast').css('display: block');
	});
})