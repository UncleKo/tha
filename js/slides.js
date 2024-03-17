(function() {

		$('footer').delay(1000).fadeIn(1000);		
		
		$('#details').hover(function() {
			$('#description').stop(true, true).fadeIn(1000);				 
		 }, function() {
			$('#description').stop(true, true).fadeOut(1000);
		 });


})();