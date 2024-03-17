bgImageTotal=21; 
	
	randomNumber = Math.round(Math.random()*(bgImageTotal-1))+1; 
	
	imgPath=($.backstretch('/images/background/'+randomNumber+'.jpg')); 
	
		$('body').css('background-image', ('url("'+imgPath+'")'));
		
		$("body").css("display", "none");    
		
		$("body").fadeIn(2000);	
		
		$("a.transition").click(function(event){		
			event.preventDefault();		
			linkLocation = this.href;		
			
		$("body").fadeOut(500, redirectPage);	});	
				
		function redirectPage() {		
			window.location = linkLocation;	
		}