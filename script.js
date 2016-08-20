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

		var prevLink = $('.page-prev .btn'),
			nextLink = $('.page-next .btn');
		var temp = prevLink.attr('href');
		if ( !prevLink.is('a') ) {
				
			prevLink.after('<a class="btn btn-link text-default-color btn-icon-left" href="' + nextLink.attr('href')  + '"><i class="fa fa-angle-left"></i><span>Prev</span></a>');
			prevLink.remove();
			nextLink.remove();

		} else if ( !nextLink.is('a') ) {
			
			nextLink.after('<a class="btn btn-link text-default-color btn-icon-right" href="' + prevLink.attr('href')  + '"><i class="fa fa-angle-right"></i><span>Next</span></a>');
			nextLink.remove();
			prevLink.remove();

		} else {

			prevLink.attr('href', nextLink.attr('href'));
			nextLink.attr('href', temp);

		}
	});
	
})(jQuery);
