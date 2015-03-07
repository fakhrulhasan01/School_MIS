<div class="row no-gutter"><!-- row -->
                
                
                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                    	<div class="row gutter"><!-- row -->
                        <h1 class="page-title">About Us</h1>
                    <?php 
                    $ab = new AboutUs();
                    $r = $ab->Select();
					if($r !==""){
						for($i=0; $i<2; $i++){
                    ?>
                     
                   <div class="col-lg-12 col-md-12">
                    
                  <figure class="news-featured-image">	
                 <img src="images/<?php echo $r[$i][1];?>" class="img-responsive" />
                  </figure>
                                
                                
                                
                                <div class="news-body">
                                
                                    <p class="call-out">
                                    <?php echo $r[$i][3];?>
                                    </p>
                                
                                    <p>
                                    <?php FileRead("files/". $r[$i][2]);?>
                                    </p>
                                    
                                </div>
                            
                            </div>
                        <?php }}?>
                        </div><!-- row end -->
                        
                                
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
                
                <div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->
                	
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widget -->
                    
                                <h1 class="title-widget">Useful link</h1>
                                
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
                            
                        	<li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget">School News</h1>
                                
                                <ul class="list-unstyled">
            
                            <?php 
								  $n = new News();
								  $r = $n->Select();
								  if($r !==""){
									  for($i=0; $i<3; $i++){
								  ?>  
								
                                
			<li class="recent-news-wrap news-no-summary">
                                        
                    <div class="recent-news-content clearfix">
                          <figure class="recent-news-thumb">
                             <a href="?v=newsdetails&id=<?php echo $r[$i][0];?>" title="Megan Boyle flourishes...">
                             <img src="images/<?php echo $r[$i][3];?>" class="attachment-thumbnail wp-post-image" alt="Thumbnail 1" /></a>
                           </figure>
                       <div class="recent-news-text">
                          <div class="recent-news-meta">
                            <div class="recent-news-date">&nbsp;<?php echo $r[$i][4];?></div>
                          </div>
                      <h1 class="title-median">
                      <a href="?v=newsdetails&id=<?php echo $r[$i][0];?>" title="Megan Boyle flourishes...">
                      &nbsp;<?php echo $r[$i][1];?>
                      </a>
                      </h1>
                       </div>
                   </div>
                                    
                  </li>
                                    
					<?php }} ?>				
                                    
									
                 </ul>
                                
                            </li><!-- widgets list end -->
                            
                            <li class="widget-container widget_sofa_twitter"><!-- widget -->
                            
                            	<ul class="k-twitter-twitts list-unstyled">
                                
                                    <li class="twitter-twitt">
                                    	<p>
                                        <a href="https://twitter.com/DanielleFilson">@MattDeamon</a> Why it always has to be so complicated? Try to get it via this link <a href="http://usap.co/potter">mama.co/hpot</a> Good luck mate!
                                        </p>
                                    </li>
                                
                                </ul>
                                
                                <div class="k-twitter-twitts-footer">
                                	<a href="#" class="k-twitter-twitts-follow" title="Follow!"><i class="fa fa-twitter"></i>&nbsp; Follow us!</a>
                                </div>
                            
                            </li><!-- widget end -->
                            
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- sidebar wrapper end -->
            
            </div><!-- row end -->
        