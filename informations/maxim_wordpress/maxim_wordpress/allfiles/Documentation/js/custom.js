jQuery(document).ready(function($) {
	$('.toggle_handle').on('click', function() {
		$(this).next().toggleClass('toggle');
	})
});