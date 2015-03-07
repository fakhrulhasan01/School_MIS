

            <div class="row no-gutter"><!-- row -->
                
                <div class="col-lg-8 col-md-8"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                    
                    	<div class="row gutter"><!-- row -->
                        
                        	<div class="col-lg-12 col-md-12">
                            
                                <div id="k-contact-map" class="clearfix"><!-- map -->
                                    <div 
                                    id="g-map-1" 
                                    class="map" 
                                    data-gmaptitle="Contact" 
                                    data-gmapzoom="15" 
                                    data-gmaplon="-76.422377" 
                                    data-gmaplat="43.314594" 
                                    data-gmapmarker="" 
                                    data-cname="Buntington Public Schools" 
                                    data-caddress="115 W Broadway" 
                                    data-ccity="Fulton" 
                                    data-cstate="NY" 
                                    data-czip="13069" 
                                    data-ccountry="USA">
                                    </div>
                                </div>
                                
                                <h1 class="page-title">Contact Us</h1>
                                
                                <div class="news-body">
                                
                                    <?php
                                    $cu = new ContactUs();
									$r=$cu->Select();
									if($r !==""){
										for($i=0; $i<1; $i++){
									?>
                                    <div class="row">
                                    	<?php  FileRead("files/" .$r[$i][1]); ?>
                                            </div>
                                    <?php }}?>
                                    <hr />
                                    
                   <h6>If You want to know details our schoo.<br />
                       Please fill this form and send message
                    <?php 
					if(isset($_GET['msg'])){
						echo $_GET['msg'];
						}
					?>   
                       </h6>


<?php
$cuu = new ContactUsUser();
$msg="";
$err=0;
$ename="";
$eemail="";
$econtactnumber="";
$elocation="";
$emessagesubject="";
$emessage ="";
if(isset($_POST['sub'])){
	
	if($_POST['name']==""){
			$err++;
			$ename.="Please enter Name.";
			}
		else if(strlen($_POST['name'])<5){
			$err++;
			$ename.="name must be five character.";
			}
		 
	
	    if($_POST['email']==""){
			$err++;
			$eemail.="Please enter Email Address.";
			}
		else if(strlen($_POST['email'])<5){
			$err++;
			$eemail.=" Email name must be five character.";
			}
		 
	    if($_POST['phn']==""){
			$err++;
			$econtactnumber.="Please enter phone number.";
			}
		else if(strlen($_POST['phn'])<5){
			$err++;
			$econtactnumber.=" econtact number name must be five character.";
			}
		
		if($_POST['loc']==""){
			$err++;
			$elocation.="Please enter location.";
			}
		else if(strlen($_POST['loc'])<5){
			$err++;
			$elocation.="Location name must be five character.";
			}
		
		if($_POST['mess']==""){
			$err++;
			$emessagesubject.="Please enter message subject.";
			}
		else if(strlen($_POST['mess'])<5){
			$err++;
			$emessagesubject.="Message subject name must be five character.";
			}
		
		if($_POST['des']==""){
			$err++;
			$emessage.="Please enter message.";
			}
		else if(strlen($_POST['des'])<5){
			$err++;
			$emessage.="message name must be five character.";
			}
		
		
		
		echo $err;
	   
	   if($err==0){
		$cuu->Name = $_POST['name'];
		$cuu->Email = $_POST['email'];
		$cuu->ContactNumber = $_POST['phn'];
		$cuu->Location = $_POST['loc'];
		$cuu->MessageSubject = $_POST['mess'];
		$cuu->Message = CreateFile($_POST['des']);
		
		if($cuu->Insert()){
		$msg.="Insert successful.";
		}
		else{
		$msg.=$cuu->Err;
		}
		//Redirect("?a=aboutus&msg={$msg}");
	   }
	}

?>
                  
                                    
   <form action="" method="post">
                   
                    <div class="row"><!-- starts row -->
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <input type="text" name="name" placeholder="Your Name" />
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <input type="text" name="email" placeholder="Email" />
                    </div>
                    
                    </div><!-- ends row -->
                                        
                    
                    <div class="row"><!-- starts row -->
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <input type="text" name="phn" placeholder="Contact Number" />
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                    <input type="text" name="loc" placeholder="Location" />
                    </div>
                    </div><!-- ends row -->
                                        
                    
                    <div class="row"><!-- starts row -->
                    <div class="form-group col-lg-12">
                    <textarea name="mess" cols="66" placeholder="Message Subject"></textarea>
                    </div>
                    </div><!-- ends row -->
                                        
                <div class="row"><!-- starts row -->
                <div class="form-group clearfix col-lg-12">
                <textarea name="des" cols="66" rows="10" placeholder="Message"></textarea>   
                </div>
                <div class="form-group clearfix col-lg-12 text-right remove-margin-bottom">
                <input type="submit" name="sub" value="Send" />
                </div>
                </div><!-- ends row -->
   </form>
                                    
                                </div>
                            
                            </div>
                        
                        </div><!-- row end -->               
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
                
                
                
                
                
                <div id="k-sidebar" class="col-lg-4 col-md-4"><!-- sidebar wrapper -->
                	
                    <div class="col-padded col-shaded"><!-- inner custom column -->
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widget -->
                    
                                <h1 class="title-widget">Select</h1>
                                
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
        
        </div><!-- container end -->
    
    </div><!-- content wrapper end -->
  

</div>