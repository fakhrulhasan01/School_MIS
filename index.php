<?php error_reporting(E_ALL ^ E_DEPRECATED);?>
<?php include_once'controller/configuration.php'?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SCHOOL Project</title>
    
    <!-- Styles -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,700,800" rel="stylesheet" type="text/css"><!-- Google web fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"><!-- font-awesome -->
    <link href="js/dropdown-menu/dropdown-menu.css" rel="stylesheet" type="text/css"><!-- dropdown-menu -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"><!-- Bootstrap -->
    <link href="js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"><!-- Fancybox -->
    <link href="js/audioplayer/audioplayer.css" rel="stylesheet" type="text/css"><!-- Audioplayer -->
    <link href="style.css" rel="stylesheet" type="text/css"><!-- theme styles -->

	<style type="text/css">
		.marg{
			margin-top:8px;
		}
	</style>

	<script type="text/javascript" src="jquery.js"></script>
  </head>
  
  <body role="document">
    		
    <!-- device test, don't remove. javascript needed! -->
    <span class="visible-xs"></span><span class="visible-sm"></span><span class="visible-md"></span><span class="visible-lg"></span>
    <!-- device test end -->
    
    <div id="k-head" class="container"><!-- container + head wrapper -->
    
    	<div class="row" ><!-- row -->
        
            <nav class="k-functional-navig"><!-- functional navig -->
        
        <ul class="list-inline pull-right" style="padding:15px 31px 0px 0px;">
        <?php if(isset($_SESSION['adid'])||
		        (isset($_SESSION['tcid']))||
				(isset($_SESSION['stid']))||
				(isset($_SESSION['acid']))||
				(isset($_SESSION['adcid']))){
           echo  "<li>".'<a href="?v=logout"><b style="font-size:15px; color:#F30;" >Logout</b></a>'."</li>";
			 }else{}?>      
                <li><a href="?v=studentlogin" >Student Login</a></li>
                <li><a href="?v=account">Vartual School</a></li>
               <li><a href="?v=academicresult">Academic Result</a></li>
               <li><a href="?v=noticborddetails">Notice Board</a></li>
               
               <li><a href="#">Directions</a></li>
        </ul>
        
            </nav><!-- functional navig end -->
        
        	<div class="col-lg-12">
        
        		
                <div id="k-site-logo" class="pull-left"><!-- site logo -->
                
                    <h1 class="k-logo">
                        <a href="index-2.html" title="Home Page">
                            <img src="img/site-logo.png" alt="Site Logo" class="img-responsive" />
                        </a>
                    </h1>
                    
                    <a id="mobile-nav-switch" href="#drop-down-left">
                    <span class="alter-menu-icon"></span></a> <!-- alternative menu button -->
            
            	</div><!-- site logo end -->

            	
                
                <nav id="k-menu" class="k-main-navig"><!-- main navig -->
        
                    <ul id="drop-down-left" class="k-dropdown-menu navbar-right" style="padding:0px 0px 0px  78px;" >
					 <li><a href="?v=home" title="">Home</a></li>
                        <li><a href="?v=aboutus" title="">About Us</a></li>
                        
                        
                        
                        
                        <li>
                          <a href="" title="">Academic Calender</a>
                           <ul class="sub-menu">
                              <?php 
							  $ty = new AcademicCalenderType();
							  $r = $ty->Select();
							  if($r !==""){
								  for($i=0; $i<count($r); $i++){
							  ?>  
							 
                               <li>
                               <a href="?v=academicdetails&id=<?php echo $r[$i][0];?>">
							   <?php echo $r[$i][1];?></a>
                               </li>
                                <?php }}?>
                            </ul>  
                        </li>
                       
                       
                       <li>
                          <a href="" title="">Photo Gallary</a>
                           <ul class="sub-menu">
                              <?php 
								  $pty = new PhotoType();
								  $r = $pty->Select();
								  if($r !==""){
									  for($i=0; $i<count($r); $i++){
								  ?>  
								 
			                      <li><a href="?v=photodetails&id=<?php echo $r[$i][0];?>">
								  <?php echo $r[$i][1];?></a></li>
								 <?php }}?>
						 
                         </ul>  
                        </li>
                       
                       
                       
                        <li>
                        
                        <?php if(isset($_SESSION['adid'])||
						         (isset($_SESSION['tcid']))|
						         (isset($_SESSION['adcid']))|								 
								(isset($_SESSION['acid']))){?>
                         <a href="#" class="Pages Collection" title="">Admin Palen</a>
                            <ul class="sub-menu">
                            
                             <?php 
							 if(isset($_SESSION['adid'])||
							   (isset($_SESSION['tcid']))){?>
                                 <li>
                                    <a href="#">Teacher</a>
                                     <ul class="sub-menu">
                                       <li><a href="?t=assigningclassforstudent">Regirstration</a></li>
                                       <li><a href="?t=resultcheck">Result Entry</a></li>
                                       <li><a href="?t=classmaterial">ClassMaterial</a></li>
                                       <li><a href="?t=iqtest">IQ Test</a></li>
                                       <li><a href="?t=attendencecheck">Attendence</a></li>
                                       <li><a href="?t=subjectquestion">subjectQuestion</a></li>
                                       <li><a href="?t=studentAllExamResult">FinalPrograseSheet</a>
                                       <li><a href="?t=studentAllMidExamResult">MidTermPrograseSheet</a>
                                       </li>
                                       
                                     
                                     </ul>
                                  </li>
                                 <?php }
								if(isset($_SESSION['adid'])||
								  (isset($_SESSION['acid']))){
								?>
								 
                                  
                                  <li>
                                    <a href="#">Accounting</a>
                                     <ul class="sub-menu">
                                       <li><a href="?ad=checkbalance">CheckBalance</a></li>
                                       <li><a href="?ad=expencetype">ExpenceType</a></li>
                                       <li><a href="?ad=expence">Expence</a></li>
                                       <li><a href="?ad=earntype">EarnType</a></li>
                                       <li><a href="?ad=earn">Earn</a></li>
                                       <li><a href="?ad=typeteacher">TypeTeacher</a></li>
                                       <li><a href="?ad=teacheraccountinfo">TeacherAccountInfo</a></li>
                                       <li><a href="?ad=payableamount">PayableAmountEntry</a></li>
                                       <li><a href="?ad=selectpaidamount">PaidamountEntry</a></li>
                                       <li>
                                       <a href="?ad=payorpaidamounttype">PayOrPaidAmountType</a>
                                       </li>
                                       <li><a href="?ad=waiver">Waiver</a></li>
                                       <li><a href="?ad=expenceforpublishtype">
                                           ExpenceForPublishType</a></li>
                                       <li><a href="?ad=expenceforpublish">
                                           ExpenceForPublish</a></li>
                                          <li><a href="?ad=expenceforgardiantarrangementtype">
                                           ExpenceForGardiantArrangementType</a></li>
                                       
                                           <li><a href="?ad=expenceforgardiantarrangement">
                                           ExpenceForGardiantArrangement</a></li>
                                       
                                     
                                     </ul>
                                  </li>
                                <?php }
								if(isset($_SESSION['adcid'])||
								  (isset($_SESSION['adid']))){
								?>
								 
                                <li>
                                    <a href="#">level1</a>
                                     <ul class="sub-menu">
                                       <li><a href="?a=year">Year</a></li>
                                        <li><a href="?a=examname">Exam Name</a></li>
                                        <li><a href="?a=shift">Shift</a></li>
                                        <li><a href="?a=section">Section</a></li>
                                        <li><a href="?a=class">Class</a></li>
                                        <li><a href="?a=month">Month</a></li>
                                        <li><a href="?a=day">Day</a></li>
                                        
                                     </ul>
                                  </li>
                                
                                
                                <li><a href="?a=news">News</a></li>
                                 <li><a href="?a=assingingteacher">Assigning Teacher</a></li>
                                <li><a href="?a=academiccalendertype">Academic Calender Type</a></li>
                                <li><a href="?a=academiccalender">AcademicCalender</a></li>
                                <li><a href="?a=upcomingevent">Up Coming Event</a></li>
                                <li><a href="?a=showusermessage">Show User Message</a></li>
                                
                                
                                <li>
                                    <a href="#">Other Level</a>
                                     <ul class="sub-menu">
                                        <li><a href="?a=administration">Administration</a></li>
                                        <li><a href="?a=gardianmember">GardianMember</a></li>
                                        <li><a href="?a=aboutus">About Us</a></li>
                                        <li><a href="?a=academiccalender">AcademicCalender</a></li>
                                        <li><a href="?a=usefullink">Usefullink</a></li>
                                        <li><a href="?a=contactus">Contact Us</a></li>
                                        <li><a href="?a=schoolcontact">School Contact</a></li>
                                        <li><a href="?a=subject">Subject</a></li>
                                        <li><a href="?a=academiccalendertype">
                                        Academic Calender Type</a></li>
                                        <li><a href="?a=classmaterialtype">ClassMaterialType</a></li>
                                     </ul>
                                  </li>
                                
                                <li><a href="?a=student">Student</a></li>
                                <li><a href="?a=teacher">Teacher</a></li>
                                
          
                              <li>
                      <a href="#">Picture</a>
                         <ul class="sub-menu">
                                  <li><a href="?a=phototype">PhotoType</a></li>
                                  <li><a href="?a=photogallary">Photo Gallary</a></li>
                                  <li><a href="?a=photoslider">Photo Slider</a></li>
                                  <li><a href="?a=homewelcome">Welcome Message</a></li>
                                  <li><a href="?a=religion">Religion</a></li>
                                  <li><a href="?a=bloodgroup">Blood Group</a></li>
                                  <li><a href="?a=notictype">Notic Type</a></li>
                                  <li><a href="?a=noticbord">Notic Bord</a></li>
                                
                             </ul>
                          </li>
                       <?php }?>
                       </ul>
                      <?php }?>
                    </li>
                       
                        
                        <li><a href="?v=news" title="">News</a></li>
                        <li><a href="?v=contactus"title="">Contact Us</a></li>
                    </ul>
        
            	</nav><!-- main navig end -->
            
            </div>
            
        </div><!-- row end -->
    
    </div><!-- container + head wrapper end -->
    
    <div id="k-body"><!-- content wrapper -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row"><!-- row -->
            
               
            
            	<!-- breadcrumbs end -->
                
            </div><!-- row end -->
            
                        
            
            
            <?php
            include_once("controller/findpages.php");
			?>
                
       
      
      
           
        
        </div><!-- container end -->
    
    </div><!-- content wrapper end -->
    
    <div id="k-footer"><!-- footer -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row no-gutter"><!-- row -->
            
            	<div class="col-lg-4 col-md-4"><!-- widgets column left -->
            
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_nav_menu"><!-- widgets list -->
                    
                                <h1 class="title-widget" style="font-size:20px; color: palevioletred;">Useful links</h1>
                                
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
                            
                        </ul>
                         
                    </div>
                    
                </div><!-- widgets column left end -->
                
                <div class="col-lg-4 col-md-4"><!-- widgets column center -->
                
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget" style="font-size:20px; color: palevioletred;">School Contact</h1>
                                
                                <div itemscope itemtype="http://data-vocabulary.org/Organization"> 
                                
                     
                     
              <?php 
			  $sc = new SchoolContact();
			  $r=$sc->Select();
			  if($r !==""){
				  for($i=0; $i<1; $i++){
			  ?>       
                                
                 <h2 class="title-median m-contact-subject" itemprop="name">
                    <?php echo $r[$i][1];?>
                 </h2>
                     
                     
                     
                 
                 <div class="m-contact-address" itemprop="address" 
                      itemscope itemtype="http://data-vocabulary.org/Address">
                           
                           <span class="m-contact-street" itemprop="street-address">
                                   <?php FileRead("files/" .$r[$i][2]);?><br>

                           </span>
                                                
                           
                 </div>
                                             
                                            
    <div class="m-contact-tel-fax">                   
       <span class="m-contact-tel">Telephone No:&nbsp;<?php echo $r[$i][3];?></span>
       <span class="m-contact-tel">Mobile No:&nbsp;<?php echo $r[$i][4];?></span>
       <span class="m-contact-fax">Fax:&nbsp; <?php echo $r[$i][5];?></span>
    </div>
                                    
      <?php }}?>
      
      </div>
                                
      
      <div class="social-icons">                          
        <ul class="list-unstyled list-inline">                           
         <li><a href="?v=contactus" title="Contact us"><i class="fa fa-envelope"></i></a></li>
         <li><a href="http://www.twitter.com" target="_blank" title="Twitter">
                <i class="fa fa-twitter"></i></a></li>
             <li><a href="http://www.facebook.com" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    
                                    </ul>
                                
                                </div>
                    
							</li>
                            
                        </ul>
                        
                    </div>
                    
                </div><!-- widgets column center end -->
                
                <div class="col-lg-4 col-md-4"><!-- widgets column right -->
                
                    <div class="col-padded col-naked">
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_sofa_flickr"><!-- widgets list -->
                    
                                 <h3 class="title-widget" style="font-size:20px; color: palevioletred;">Facebook likes</h3>
        
        <div id="flickr_badge_wrapper">
              <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-width="200" data-height="200" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div> 
        </div>
                    
							</li>
                            
                        </ul> 
                        
                    </div>
                
                </div><!-- widgets column right end -->
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- footer end -->
    
    <div id="k-subfooter"><!-- subfooter -->
    
    	<div class="container"><!-- container -->
        
        	<div class="row"><!-- row -->
            
            	<div class="col-lg-12">
                
                	<p class="copy-text text-inverse">
                    &copy; 2015 Buntington Public Schools. All rights reserved.
                    </p>
                
                </div>
            
            </div><!-- row end -->
        
        </div><!-- container end -->
    
    </div><!-- subfooter end -->

    <!-- jQuery -->
    <script src="jQuery/jquery-2.1.1.min.js"></script>
    <script src="jQuery/jquery-migrate-1.2.1.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    
    <!-- Drop-down -->
    <script src="js/dropdown-menu/dropdown-menu.js"></script>
    
    <!-- Fancybox -->
	<script src="js/fancybox/jquery.fancybox.pack.js"></script>
    <script src="js/fancybox/jquery.fancybox-media.js"></script><!-- Fancybox media -->
    
    <!-- Responsive videos -->
    <script src="js/jquery.fitvids.js"></script>
    
    <!-- Audio player -->
	<script src="js/audioplayer/audioplayer.min.js"></script>
    
    <!-- Pie charts -->
    <script src="js/jquery.easy-pie-chart.js"></script>
    
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?sensor=true"></script>
    
    <!-- Theme -->
    <script src="js/theme.js"></script>
    
  </body>
</html>