<?php


#### Panel Template - Used by menu_class.php  for Custom Menu Content. 


	$MENU_TEMPLATE['default']['start'] 					= ''; 
	$MENU_TEMPLATE['default']['body'] 					= '{CMENUBODY}'; 
	$MENU_TEMPLATE['default']['end'] 					= ''; 

	$MENU_TEMPLATE['button']['start'] 					= '<div class="cpage-menu">'; 
	$MENU_TEMPLATE['button']['body'] 					= '<div>{CMENUBODY}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['button']['end'] 					= '</div>'; 

	### Additional control over image thumbnailing is possible via SETIMAGE e.g. {SETIMAGE: w=200&h=150&crop=1}
	$MENU_TEMPLATE['buttom-image']['start'] 			= '<div class="cpage-menu">'; 
	$MENU_TEMPLATE['buttom-image']['body'] 				= '<div>{CMENUIMAGE}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['buttom-image']['end'] 				= '</div>'; 



	$MENU_TEMPLATE['2-column_1:1_text-left']['start'] 	= '{SETIMAGE: w=700&h=450}'; 
	$MENU_TEMPLATE['2-column_1:1_text-left']['body'] 	= '			
													       <div class="cpage-menu col-lg-6 col-md-6 col-sm-6"><h2>{CMENUICON}{CMENUTITLE}</h2>{CMENUBODY}<p>{CPAGEBUTTON}</p></div>
													       <div class="cpage-menu col-lg-6 col-md-6 col-sm-6">{CMENUIMAGE}</div>
													       '; 
	$MENU_TEMPLATE['2-column_1:1_text-left']['end'] 	= ''; 
	
	
	$MENU_TEMPLATE['2-column_1:1_text-right']['start'] = '{SETIMAGE: w=700&h=450}'; 
	$MENU_TEMPLATE['2-column_1:1_text-right']['body'] 	= '
															<div class="cpage-menu col-lg-6 col-md-6 col-sm-6">{CMENUIMAGE}</div>
															<div class="cpage-menu col-lg-6 col-md-6 col-sm-6"><h2>{CMENUICON}{CMENUTITLE}</h2>{CMENUBODY}<p>{CPAGEBUTTON}</p></div>
														'; 		
	$MENU_TEMPLATE['2-column_1:1_text-right']['end'] 	= ''; 
          
 
	$MENU_TEMPLATE['2-column_2:1_text-left']['start'] 	= ''; 
	$MENU_TEMPLATE['2-column_2:1_text-left']['body'] 	= '			
													       <div class="cpage-menu col-lg-8 col-md-8"><h4>{CMENUICON}{CMENUTITLE}</h4>{CMENUBODY}</div>
													       <div class="cpage-menu col-lg-4 col-md-4">
													       <a class="btn btn-lg btn-primary pull-right" href="{CPAGEBUTTON=href}">'.LAN_READ_MORE.'</a>
													       </div>
													       '; 
	$MENU_TEMPLATE['2-column_2:1_text-left']['end'] 	= '';  
 /*
	$MENU_TEMPLATE['home-introduction-text']['start'] 			= ''; 
	$MENU_TEMPLATE['home-introduction-text']['body'] 				= 
																'<h2 class="section-heading">{CMENUTITLE}</h2>
															   <h3 class="section-subheading text-muted">{CMENUBODY}</h3>';
	$MENU_TEMPLATE['home-introduction-text']['end'] 				= '';


           */






	$MENU_TEMPLATE['home-services']['start'] 			= '<div class="col-lg-12 text-center">
										                    <h2 class="section-heading">{CHAPTER_NAME}</h2>
										                    <h3 class="section-subheading text-muted">{CHAPTER_DESCRIPTION}</h3>
										                </div><div class="row text-center">';
	$MENU_TEMPLATE['home-services']['body'] 				= '<div class="col-md-4"><span class="fa-stack fa-4x"><i class="fa fa-circle fa-stack-2x text-primary"></i>
															<i class="fa fa-{CMENUICON=css} fa-stack-1x fa-inverse"></i>
															</span><h4 class="service-heading">{CMENUTITLE}</h4>
																<p class="text-muted">{CMENUBODY}</div>';
	$MENU_TEMPLATE['home-services']['end'] 				= '</div>';
 

    // Cam rework.

/*
	$MENU_TEMPLATE['portfolio']['start'] 				= '{SETIMAGE: w=400&h=289&crop=1}' ;
	$MENU_TEMPLATE['portfolio']['body'] 				= '<div class="col-md-4 col-sm-6 portfolio-item {CHAPTERSEF}">
										                    <a href="#portfolio-{CPAGEID}" class="portfolio-link" data-toggle="modal">
										                        <div class="portfolio-hover">
										                            <div class="portfolio-hover-content">
										                                <i class="fa fa-plus fa-3x"></i>
										                            </div>
										                        </div>
										                        <img src="{CMENUIMAGE=url}" class="img-responsive" alt="{CMENUTITLE}">
										                    </a>
										                    <div class="portfolio-caption">
										                        <h4>{CMENUTITLE}</h4>
										                        <p class="text-muted">{CHAPTER_NAME}</p>
										                    </div>
										                </div>';

	$MENU_TEMPLATE['portfolio']['end'] 			    = '';
*/
 
    $MENU_TEMPLATE['timeline']['start'] 			= '<div class="text-center">
										                    <h2 class="section-heading text-uppercase">{CHAPTER_NAME}</h2>
										                    <h3 class="section-subheading text-muted">{CHAPTER_DESCRIPTION}</h3>
														</div> 
														<ul class="timeline">{SETIMAGE: w=200&h=200&crop=1}' ;
	$MENU_TEMPLATE['timeline']['body'] 				= '<li {TIMELINE_INVERTED}>
														    <div class="timeline-image">
														        <img class="rounded-circle img-fluid" src="{CMENUIMAGE=url}" alt="">
														    </div>
														    <div class="timeline-panel">
														        <div class="timeline-heading">
														            <h4>{CHAPTER_NAME}</h4>
														            <h4 class="subheading">{CPAGETITLE}</h4>
														        </div>
														        <div class="timeline-body">
														            <p class="text-muted">{CPAGEBODY}</p>
														        </div>
														    </div>
														</li>';
	$MENU_TEMPLATE['timeline']['end'] 				= '
													    <li>
													        <div class="timeline-image">
													            <h4>{THEME_PREF: code=timelineendtext&default=Time}</h4>
													        </div>
													    </li>
													</ul>
													</div>
													';
 

	$MENU_TEMPLATE['teammember']['start'] 				= '{SETIMAGE: w=225&h=225&crop=1}
	<div class="text-center">
		<h2 class="section-heading text-uppercase">{CHAPTER_NAME}</h2>
		<h3 class="section-subheading text-muted">{CHAPTER_DESCRIPTION}</h3>
	</div>
	<div class="row">' ;
	$MENU_TEMPLATE['teammember']['body'] 				= '
    <div class="col-lg-4">                        
      <div class="team-member">                            
          <img class="mx-auto rounded-circle" src="{CMENUIMAGE=url}" alt="{CPAGETITLE}" />                            
          <h4>{CPAGETITLE}</h4>                            
          <p class="text-muted">Lead Designer
          </p>                            
          <a class="btn btn-dark btn-social mx-2" href="{CPAGEFIELD: name=twitter&mode=raw}">
              <i class="fab fa-twitter"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="{CPAGEFIELD: name=facebook&mode=raw}">
              <i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-dark btn-social mx-2" href="{CPAGEFIELD: name=linkedin&mode=raw}">
              <i class="fab fa-linkedin-in"></i></a>                        
      </div>                    
    </div> ';
	$MENU_TEMPLATE['teammember']['end'] 					= '</div>';



	
?>