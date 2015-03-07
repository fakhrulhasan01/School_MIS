
<div class="row no-gutter fullwidth"><!-- row -->
            
                <div class="col-lg-12 clearfix"><!-- featured posts slider -->
                
                    <div id="carousel-featured" class="carousel slide" data-interval="4000" data-ride="carousel"><!-- featured posts slider wrapper; auto-slide -->
                    
                        <ol class="carousel-indicators"><!-- Indicators -->
                            <li data-target="#carousel-featured" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-featured" data-slide-to="1"></li>
                            <li data-target="#carousel-featured" data-slide-to="2"></li>
                            <li data-target="#carousel-featured" data-slide-to="3"></li>
                            <li data-target="#carousel-featured" data-slide-to="4"></li>
                        </ol><!-- Indicators end -->
                    
                        <div class="carousel-inner"><!-- Wrapper for slides -->
                        

                        <?php 
						$slideShow = new PhotoSlider();
						$ss = $slideShow->Select();
						if($ss != ""){
							for($i=0; $i<count($ss); $i++){
							if($i>0){
								echo '<div class="item">';
							}else{
								echo '<div class="item active">';								
							}
						?>

                                    <img src="images/<?php echo $ss[$i][3]; ?>" style="height:400px; width:1200px" />
                                    <div class="k-carousel-caption pos-1-3-right scheme-dark">
                                        <div class="caption-content">
                                            <h3 class="caption-title">Learning makes us stronger for life</h3>
                                            <p>
                                                We could brag about all of the great opportunities that our students have... or you could hear it from the students themselves.
                                            </p>
                                        </div>
                                    </div>
                                </div>
						<?php }
						}?>                            


                            
                            
                        </div><!-- Wrapper for slides end -->
                    
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-featured" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="right carousel-control" href="#carousel-featured" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                        <!-- Controls end -->
                        
                    </div><!-- featured posts slider wrapper end -->
                        
                </div><!-- featured posts slider end -->
                
            </div><!-- row end -->
            














<div class="row no-gutter"><!-- row -->

<div class="col-lg-4 col-md-4"><!-- upcoming events wrapper -->
<div class="col-padded col-shaded"><!-- inner custom column -->
                    
                    	<ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_up_events"><!-- widgets list -->
                    
                                <h1 class="title-median" style="font-size:20px; color: palevioletred";>Why staudy in our school</h1>
                                
                                <ul class="list-unstyled">
                                
                                    <li class="up-event-wrap">
                                
                                        <!--<h1 class="title-median"><a href="#" title="Annual alumni game">Annual alumni game</a></h1>-->
                                        
                     <div class="up-event-meta clearfix">
                <!--<div class="up-event-date">Jul 25, 2015</div>
                <div class="up-event-time">9:00 - 11:00</div>
                -->                        </div>
                                      <?php 
									$hw = new HomeWelcome();
									$hw->Type = 'w';
									$r=$hw->Select();
									if($r !==""){
										for($i=0; $i<1; $i++){
								  ?>
								  
                                        <p Style="color:black;">
                    <?php read_files($r[$i][1], 220);?>......
                   <a href="?v=whydetails&id=<?php echo $r[$i][0];?>" class="moretag" title="read more">&nbsp;&nbsp; Read MORE</a>
                                        </p>
                                    <?php }}?>
                                    </li>
                                    
                                    <li class="up-event-wrap">
                                
              <h1 class="title-median" style="font-size:17px; color: palevioletred">Class material for all student</h1>       
                     <div class="up-event-meta clearfix">
                    <!--<div class="up-event-date">Aug 25, 2015</div>
                    <div class="up-event-time">8:30 - 10:30</div>
                    -->                    </div>
                                         <?php 
											$cl = new Classs();
											$r=$cl->Select();
											if($r !==""){
												for($i=0; $i<count($r); $i++){
											?>
								       <p>
                           <a href="?s=class&id=<?php echo $r[$i][0]; ?>" 
                             style="text-decoration:-moz-anchor-decoration; color:rebeccapurpl;">
                                        For &nbsp;<?php echo $r[$i][1];?></a>
                                        </p>
                                    <?php }}?>
                                    </li>
                                    
                                    <li class="up-event-wrap">
                                
                                        <!--<h1 class="title-median"><a href="#" title="School talents gathering">Campus "Open Doors"</a></h1>
                                        
                                        <div class="up-event-meta clearfix">
                                            <div class="up-event-date">Sep 04, 2015</div><div class="up-event-date">Sep 11, 2015</div>
                                        </div>
                                        
                                        <p>
                                        Donec fringilla lacinia laoreet. Vestibulum ultrices blandit tempor. Aenean magna elit, varius eget quam a, posuere... <a href="#" class="moretag" title="read more">MORE</a> 
                                        </p>
                                    
                                    </li>
                                -->
                                </ul>
                            
                            </li><!-- widgets list end -->
                        
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
             </div><!-- upcoming events wrapper end -->















         <div class="col-lg-4 col-md-4"><!-- recent news wrapper -->
                    <div class="col-padded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                
                                
                                <ul class="list-unstyled">
                                
									<li class="recent-news-wrap">
                                
                           <h1 class="title-median" style="font-size:20px; color: palevioletred";>Administration</h1>
                                        
                                        <div class="recent-news-meta">
                                        <div class="recent-news-date" style="font-size:17px; color: maroon;">Principal</div>
                                        </div>
                                        
                <div class="recent-news-content clearfix">
                
                <?php 
	              $ad = new Administration();
	               $ad->Person = 'Precident';
				   $r=$ad->Select();
	                 if($r !==""){
		                 for($i=0; $i<1; $i++){
	                       ?>
	
                  <figure class="recent-news-thumb">
                   <a href="?ad=administrationdetails&id=<?php echo $r[$i][0];?>" title="Megan Boyle flourishes...">
                     <img src="images/<?php echo $r[$i][2];?>" height="250px" width="100px" class="attachment-thumbnail wp-post-image" alt="Thumbnail 1" /></a>
                     </figure>
                
                 <div class="recent-news-text">
                             <p Style="color:black;">
                     <?php read_files($r[$i][3], 130);?>....
          <a href="?ad=administrationdetails&id=<?php echo $r[$i][0];?>" 
          class="moretag" title="read more" style="font-size:16px; color: palevioletred;"> &nbsp;&nbsp; Read MORE</a> 
                             </p>
                            </div>                
                        </div>
                     <?php }}?>                  
                  </li>
                                    
									<li class="recent-news-wrap">
                                
                                   <h1 class="title-median">
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   </h1>
                                        
                                        <div class="recent-news-meta">
                                            <div class="recent-news-date" style="font-size:17px; color: maroon;">Precedent</div>
                                        </div>
                                        
                                        <div class="recent-news-content clearfix">
                                       
                                        <?php 
									  $ad = new Administration();
									   $ad->Person = 'Principal';
									   $r=$ad->Select();
										 if($r !==""){
											 for($i=0; $i<1; $i++){
											   ?>
						
                                            <figure class="recent-news-thumb">
                <a href="?ad=administrationdetails&id=<?php echo $r[$i][0];?>"  title="Buntington Alum..."><img src="images/<?php echo $r[$i][2];?>" height="100" width="100"  class="attachment-thumbnail wp-post-image" alt="Thumbnail 4" /></a>
                                            </figure>
                                            
                                            <div class="recent-news-text">
                                            <p Style="color:black;">
                    <?php read_files($r[$i][3], 130);?>.....
          <a href="?ad=administrationdetails&id=<?php echo $r[$i][0];?>" 
          class="moretag" title="read more" style="font-size:16px;"> &nbsp;&nbsp; read MORE</a> 
                     
                                                </p>
                                            </div>
                                       
                                       <?php }}?>
                                        </div>
                                    
                                    </li>
                                    
									
                                    <li class="recent-news-wrap">
                                
                    <h1 class="title-median" style="font-size:20px; color: palevioletred;">Teacher & Gardian Member</h1>
                                        
                                        <div class="recent-news-meta">
                                            <div class="recent-news-date"></div>
                                        </div>
                                        
                 <div class="recent-news-content clearfix">
                
                
                   <figure class="recent-news-thumb">
                 <a href="#" title="Cody Rotschild Enjoys..."><img src="school/tr.jpg" class="attachment-thumbnail wp-post-image" alt="Thumbnail 3" /></a>
                     </figure>
                     
                     <div class="recent-news-text">
                       <p Style="color:black;">
                    <a href="?t=teachermember#t" class="moretag" title="read more" style="font-size:15px; color: maroon;">Teacher Member</a>&nbsp;<br />

                     <a href="?ad=gardianmember#g" class="moretag" title="read more" style="font-size:17px; color: maroon;">Gardian Member</a> 
                           </p>
                    </div>
                
                    
               </div>
                                    
              </li>
                               
          </ul>
                                
                            </li><!-- widgets list end -->
                        
                        </ul><!-- widgets end -->
                    
                    </div><!-- inner custom column end -->
                  </div><!-- recent news wrapper end -->  
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <div id="log">
              	<div class="col-lg-4 col-md-4"><!-- misc wrapper -->
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                 <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
               	<li class="widget-container widget_course_search"><!-- widget -->
                            
                <h1 class="title-titan" style="text-align:center; color: palevioletred;">log</h1>
                                
    
                 
                </li><!-- widget end -->
                           
                            
                            
                            
                            
                            
                            
                            <li class="widget-container widget_text"><!-- widget -->
                            
                       <a href="?v=commonblog" class="custom-button cb-green" title="How to apply?">
                                	<i class="custom-button-icon fa fa-check-square-o"></i>
                                    <span class="custom-button-wrap">
                              <span class="custom-button-title">Common Blog for all</span>
                 <span class="custom-button-tagline">Only our student can comment on this blog</span>
                                    </span>
                                    <em></em>
                                </a>
                                
                            	
                     <a href="?v=noticborddetails" class="custom-button cb-gray" title="Campus tour">
                                	<i class="custom-button-icon fa  fa-play-circle-o"></i>
                                    <span class="custom-button-wrap">
                                <span class="custom-button-title">Notice Board</span>
                                <span class="custom-button-tagline">Notice board of our school</span>
                                    </span>
                                    
                                    <em></em>
                                </a>
                                
                            	<a href="#" class="custom-button cb-yellow" title="Prospectus">
                                	<i class="custom-button-icon fa  fa-leaf"></i>
                                    <span class="custom-button-wrap">
                                    	<span class="custom-button-title">Prospectus</span>
                                        <span class="custom-button-tagline">Request a free School Prospectus!</span>
                                    </span>
                                    <em></em>
                                </a>
                            
                            </li><!-- widget end -->
                            
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
                    
              </div><!-- misc wrapper end -->
              </div>
         </div><!-- row end -->