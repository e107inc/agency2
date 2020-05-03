$(document).ready(function() {

		//should be fixed in core
    $('i.fa-rss').each(function() {
      	 $(this).addClass('fas');
  	} ); 
  	
  	//should be fixed in core
    $('.forum-viewtopic').find('ul.dropdown-menu li').each(function() {
  	 $(this).addClass('dropdown-item');
  	} ); 
    
    $('.forum-viewtopic').find('ul.dropdown-menu').each(function() {
  	 $(this).addClass('dropdown-menu-right');
  	} );     
    
    $('#forum-viewforum').find('ul.dropdown-menu').each(function() {
  	 $(this).addClass('dropdown-menu-right');
  	} ); 
    
    $('.btn-group').find('ul.dropdown-menu li').each(function() {
  	 $(this).addClass('dropdown-item');
  	} ); 
	
	$('ul.login-menu-logged').addClass('flex-column');
	  
	$('ul.login-menu-logged').find('li ').each(function() {
		$(this).addClass('nav-item');
	} ); 

	$('ul.login-menu-logged').find(' li a ').each(function() {
		$(this).addClass('nav-link');
	} ); 	  
});