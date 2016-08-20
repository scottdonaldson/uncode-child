(function($) {

	var filterMenu = $('body.home .menu-smart').not('#menu-nav');
	var order = ['Design Research', 'Service Design', 'UX', 'Experimental'];
	var index = 0;
	var ordered = false;

	(function reorder() {

		var filterMenu = $('body.home .menu-smart').not('#menu-nav');
		if ( filterMenu.length === 0 ) return setTimeout(reorder, 10);	

		var test = order[index],
			current = filterMenu.children().eq(index + 1),
			next = current.next();

		if ( current.find('a').text() !== test ) {
			// must come later...
			next.insertBefore(current);
		} else {
			if ( index === order.length - 1 ) return;
			index++;
		}

		reorder();
	})();

	$(document).ready(function() {
		$('.post-navigation .btn-disable-hover').remove();
	});
	
})(jQuery);
