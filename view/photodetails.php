<div class="row no-gutter">


            <div class="row no-gutter fullwidth"><!-- row -->
                
                <div class="col-lg-12 col-md-12"><!-- doc body wrapper -->
                	
                    <div class="col-padded"><!-- inner custom column -->
                        
                        <h1 class="page-title">Photo gallary of our school <span class="label label-info"></span></h1>
                        
                        <div class="news-body">
                            
                            <div class="row gutter k-equal-height"><!-- row -->
                            
                               <?php 
								$p= new PhotoGallary();
								$p->PhotoTypeId = $_GET['id'];
								$r=$p->Select();
								if($r !==""){
									for($i=0; $i<count($r); $i++){
								?>
 
                                
                      <div class="col-lg-4 col-md-4 col-sm-12">
                          <figure class="gallery-photo-thumb">
                             <a href="<img src="images/<?php echo $r[$i][2]; ?>" title="Image 1" data-fancybox-group="gallery-bssb" class="fancybox"><img src="images/<?php echo $r[$i][2]; ?>" alt="Image 1" /></a>
                                    </figure>
                                    <div class="gallery-photo-description">
                                    	<?php echo $r[$i][1];?>
                                    </div>
                                </div>
                                
                                <?php }}?>

                                
                                
                                
                                
                                
                            </div><!-- row end -->
                            
                        </div>
                    
                    </div><!-- inner custom column end -->
                    
                </div><!-- doc body wrapper end -->
            
            </div><!-- row end -->



</div>