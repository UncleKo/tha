(function() { 			  
			//cashing
			body=$('body');
			
			//for fading in for the entire site
			body.fadeIn(1000).css('display','block');

    const randomBackground = () => {
      var device_width = window.innerWidth;
      var device_height = window.innerHeight;
      
			//random background images
      if (! ( body.hasClass('single') || body.hasClass('blog') || body.hasClass('page-template-page-project1-php') || body.hasClass('projects') || body.hasClass('archive') ) ) {
        bgImageTotal=29;			
        randomNumber = Math.round(Math.random()*(bgImageTotal-1))+1; 			
        //var newImgNumber =Math.floor(Math.random()*myImages.length);			
        //document.body.style.backgroundImage = 'url(/images/background/'+randomNumber+'.jpg)';		
        if (device_width < 768 ) {
          return;
        } else if (device_width > 767 && device_width < 933 && device_width > device_height) {
          return;
        } else {
          body.css("backgroundImage", 'url(/images/background/'+randomNumber+'.jpg)');	
        }
      }
    }

    randomBackground();
			
			
			// //for project category links
			// $('h2.category-link a').hover(function() {
			// 	$(this).next('span').fadeIn(200);
			// },function(){
			// 	$(this).next('span').fadeOut(200);
			// });				

			// if ( body.hasClass('page-template-page-project1-php') )  {
			// 		$('footer').delay(1000).fadeIn(1000);		
		
			// 		$('#details').hover(function() {
			// 			$('#description').stop(true, true).fadeIn(1000);				 
			// 		 }, function() {
			// 			$('#description').stop(true, true).fadeOut(1000);
			// 		 });
			// }
			
	var Response = {
	
		init: function() {
	
			$('form#contact').on('submit', function(e) {
			
				e.preventDefault();		
			
				$('#contact-form').append('<img src="/images/loading.gif" alt="Currently Loading" id="loading" />');
				
				$.post( '/send_email.php', $(this).serialize(), function(result) {
				
					$('#response').remove();
					$('#sendemail').before('<div id="response">' + result + '</div>');
					$('#loading').fadeOut(500, function() {
						$(this).remove();
						
					});
					
				});
				
			});	
		
		}
		
	}
	
	Response.init();
			

  const navbarCollapseFunction = () => {

    const trigger = document.querySelector('.company-name');
    const navbar = document.querySelector('.main-menu');

    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      navbar.classList.toggle('collapse');
    })


  } //navbarCollapseFunction

  if (window.innerWidth < 768) {
    navbarCollapseFunction();
  }

  const allPostsCollapseFunction = () => {

    const trigger = document.querySelector('#recent-posts-3 h3');
    const allPosts = document.querySelector('#recent-posts-3 ul');

    allPosts.classList.add('collapse')

    trigger.addEventListener('click', function (e) {
      e.preventDefault();
      allPosts.classList.toggle('collapse');
    })


  } //navbarCollapseFunction

  if (window.innerWidth < 768 && !(body.hasClass('blog'))) {
    allPostsCollapseFunction();
  }


})();
		

// jQuery(function(){
// 	if(jQuery('.camera_wrap').length){
// 		jQuery('.camera_wrap').each(function(){
// 			var t = jQuery(this);
// 			t.camera({
// 				// alignment: t.attr('data-alignment'),
// 				// autoAdvance: (t.attr('data-autoadvance') == 'true') ? true : false,
// 				mobileAutoAdvance: false
//       })
//     })
//   }
// })