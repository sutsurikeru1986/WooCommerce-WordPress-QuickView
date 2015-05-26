$(document).on('click', '.popup', function (e) {

	e.preventDefault();  
    
	function noProductFound() {
		
		//placeholder to handle an real error
		alert('Something went wrong!');
	
	}      
    
	//I pass the product id(from WordPress) as the data-reveal-id
    var id = $(this).attr('data-reveal-id'); 
    
	//If nothing is brought back within 10 seconds, fire an error
    var quickViewTimer = setTimeout(noProductFound, 10000);
    
	//create a page called "quickview" and assign quickView.php (Quick View - WooCommerce) as the template
    $.ajax({
		url: "http://yourdomain.com/quickview",
		type: "get",
		data: { id: id },
		dataType: 'html', 

		beforeSend: function() {
			
			//Everyone's favourite spinney icon
			$('.ajax-loader').show();
			
		},
	  
		success: function(response) {
				
			$('<div id="quickViewContainer"></div>')
			.appendTo('body')
			.html(response);
			
			//initialise reveal
			$('.quickView').foundation('reveal','open');       
			
			//I have used owl carousel to display the product images, feel free to use the carousel of your choice or you can just display the featured post thumbnail!
			var owl = $(".owl-carousel"); 
			  
			owl.owlCarousel({
				items: 1,
				lazyLoad: true,
				loop: true,
				nav: true,
				dots: true
			}); 
			 
			//Clear the timeout when everyone comes back fine! 
			clearTimeout(quickViewTimer);
 
		},

		error: function(xhr) {
			
			//Generic error handling!
			alert('something went wrong :(');
			
		},
        
		complete: function(){
			
			$('.ajax-loader').hide();
			
		} 
		
    });
	
});    

$(document).on('click', '#closevidmodal, .reveal-modal-bg', function () {
	
	//close reveal
	$('.quickView').foundation('reveal', 'close');
	
	//remove modal from DOM
    $('.quickViewContainer').remove();  
	
});    

$( document ).on( 'keydown', function ( e ) {
	
	//on ESC key press
    if ( e.keyCode === 27 ) { 
		
		$('.quickView').foundation('reveal', 'close');
		$('.quickViewContainer').remove();
    }
});  