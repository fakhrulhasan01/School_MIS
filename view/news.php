
 <div class="row no-gutter"><!-- row -->
                
                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                    	<div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12 col-md-12">
                    
                            	<h1 class="page-title">News</h1><!-- category title -->
                            
                                <div class="category-description"><!-- category description -->
                                    <!--<p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pretium vulputate scelerisque. Nulla in suscipit risus. Nullam pulvinar augue in risus luctus, sed dapibus ipsum mattis.
                                    </p>-->
                                </div>
                            
                            </div>
                        
                        </div><!-- row end -->
                        
                        <div class="row gutter k-equal-height"><!-- row -->
                        
                                <?php 
								  $n = new News();
								  $r = $n->Select();
								  if($r !==""){
									  for($i=0; $i<count($r); $i++){
								  ?>  
								
                        
            <div class="news-mini-wrap col-lg-6 col-md-6"><!-- news mini-wrap -->
                <figure class="news-featured-image">
                	
                    <img src="images/<?php echo $r[$i][3];?>" height="200" width="720" alt="Featured image 1" class="img-responsive" />
                    
                                </figure>
                                
            <div class="page-title-meta">
               <h1 class="page-title">
                 <a href="?v=newsdetails&id=<?php echo $r[$i][0];?>" title="Cody Rotschild enjoys...">
                      <?php echo $r[$i][1];?>
                     </a></h1>
        
        <div class="news-meta">
           <span class="news-meta-date"><?php echo $r[$i][4];?></span>
               <span class="news-meta-category">
                   <a href="news.html" title="News"></a></span>
                      <span class="news-meta-comments">
                           <a href="#" title="3 comments"></a></span>
                                    </div>
                                </div>
                                
                                <div class="news-summary">
                                    <p>
                                    <?php read_files($r[$i][2], 100);?>.......&nbsp;&nbsp;	
                                    <a href="?v=newsdetails&id=<?php echo $r[$i][0];?>" title="Read more" class="moretag">More</a>
                                    </p>
                                </div>
                            
                            </div><!-- news mini-wrap end -->
                            
                            <?php }}?>
                            
                            
                        </div><!-- row end -->
                        
                        
                        <div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12">
                        
                                <ul class="pagination pull-right"><!-- pagination -->
                                    <li class="disabled"><a href="#">Prev</a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul><!-- pagination end -->
                            
                            </div>
                            
                        </div><!-- row end -->
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
                
                
                
                
                
                
                
                
                
                <div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->
                	
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widget -->
                    
                                <h1 class="title-widget">Useful links</h1>
                                
                                <ul>
                               
                       <?php 
					$ul = new Usefullink();
					$r = $ul->Select();
					if($r !==""){
					for($i=0; $i<count($r); $i++){
					?>
									
                        <li>
                       <a href="http://<?php echo $r[$i][2];?>" target="_blank">
                       <?php echo $r[$i][1];?></a>
                      </li>
                    <?php }}?>
                                </ul>
                    
							</li>
                            
                        	<li class="widget-container widget_up_events"><!-- widget -->
                    
                              
                                <h1 class="title-widget">Upcoming Events</h1>
                                
                                <ul class="list-unstyled">
                                
                                <?php
                                $uce = new UpComingEvent();
								$r = $uce->Select();
								if($r !==""){
									for($i=0; $i<3; $i++){
								?>
                                
                       <li class="up-event-wrap">         
                       <h1 class="title-median">
					   <?php echo $r[$i][1];?>
                       <a href="#" title="Annual alumni game"></a></h1>
                                  <div class="up-event-meta clearfix">
                                    <div class="up-event-date"><?php echo $r[$i][2];?></div>
                                    <div class="up-event-time"><?php echo $r[$i][3];?></div>
                                      </div>
                                        
                                        <p>
                                        
										<?php read_files($r[$i][4], 220);?>.......
                                        
                                        <a href="?v=upcomingdetails&id=<?php echo $r[$i][0];?>" class="moretag" title="read more">MORE</a> 
                                        </p>
                                    </li>    
                                <?php }}?>
                                
                                
                                </ul>
                            
                            </li>
                            
                        	<li class="widget-container widget_newsletter"><!-- widget -->
                            
                            	<h1 class="title-titan">School Newsletter</h1>
                                
                                <form role="search" method="get" class="newsletter-form" action="#">
                                    <div class="input-group">
                                        <input type="text" placeholder="Your e-mail address" autocomplete="off" class="form-control newsletter-form-input" name="email" />
                                        <span class="input-group-btn"><button type="submit" class="btn btn-default">GO!</button></span>
                                    </div>
                                    <span class="help-block">* Enter your e-mail address to subscribe.</span>
                                </form>
                            
                            </li>
                            
                            <li class="widget-container widget_text"><!-- widget -->
                            
                            	<a href="#" class="custom-button cb-red" title="How to apply?">
                                	<i class="custom-button-icon fa fa-empire"></i>
                                    <span class="custom-button-wrap">
                                    	<span class="custom-button-title">Donate Now</span>
                                        <span class="custom-button-tagline">Become a corporate sponsor of our schools!</span>
                                    </span>
                                    <em></em>
                                </a>
                            
                            </li>
                            
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- sidebar wrapper end -->
            
            </div><!-- row end -->
