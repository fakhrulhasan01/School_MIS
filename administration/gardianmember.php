<div class="row no-gutter">


            <div class="row no-gutter fullwidth"><!-- row -->
                
                <div class="col-lg-12 col-md-12"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                        
                        <h1 class="page-title"><center>Photo gallary of our gardian member</center> <span class="label label-info"></span></h1>
                        
                        <div class="news-body">
                            
                            <div class="row gutter k-equal-height"><!-- row -->
                            
                               <?php 
								$g= new GardianMember();
								$r=$g->Select();
								if($r !==""){
									for($i=0; $i<count($r); $i++){
								?> 
                                
                      <div class="col-lg-4 col-md-4 col-sm-12">
                          <figure class="gallery-photo-thumb">
                      <a href="?ad=gardianmemberdetails&id=<?php echo $r[$i][0];?>" title="Image 1" data-fancybox-group="gallery-bssb" class="fancybox"><img src="images/<?php echo $r[$i][2]; ?>" alt="Image 1" /></a>
                                    </figure>
                                    <div class="gallery-photo-description">
                                    	<a href="?ad=gardianmemberdetails&id=<?php echo $r[$i][0];?>" style="text-decoration:none; color:#000;">
<?php echo $r[$i][1];?></a>
                                    </div>
                                </div>
                                
                                <?php }}?>

                                
                                
                                
                                
                                
                            </div><!-- row end -->
                            
                        </div>
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
            
            </div><!-- row end -->



</div>