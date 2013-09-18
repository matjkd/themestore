<?php
include ('header.php');
 ?>
<?php $x=0; foreach($random_themes as $row):?>
	
	<?php

		$row -> images = (array)json_decode($row -> images);
		foreach ($row->images as $photo):
			$randomImage[$x] = $photo -> filename;
		endforeach;
		$randomSlug[$x] = $row -> slug;
		$x = $x + 1;
	?>
	<?php endforeach; ?>
	
	
	
	
	
  <div class='carousel slide over-something' id='homepage-carousel'>
  	
              <div class='carousel-inner slider-w'>
                <div class=' item'>
                  <div class='container'>
                    <h1 class='slider-header'>Become an Affiliate</h1>
                    <h2 class='slider-sub-header'>Earn 10% on all purchases made from your affiliate links, not just the first purchase.</h2>
                    <div class='cta'>
                      <a href="affiliates" class="btn btn-cta">Find Out More</a>
                    </div>
                    <div class='slider-browsers-w clearfix'>
                      <div class='slider-browser slider-browser-left hidden-phone' data-position-bottom='-8%'>
                       <a href="<?=base_url() ?>product/<?=$randomSlug[3] ?>"> <img alt="Browser-window-1" src="uploads/images/medium/<?=$randomImage[3] ?>" /></a>
                      </div>
                      <div class='slider-browser slider-browser-center' data-position-bottom='-9%'>
                       <a href="<?=base_url() ?>product/<?=$randomSlug[4] ?>"> <img alt="Browser-window-2" src="uploads/images/medium/<?=$randomImage[4] ?>" /></a>
                      </div>
                      <div class='slider-browser slider-browser-right hidden-phone' data-position-bottom='-8%'>
                       <a href="<?=base_url() ?>product/<?=$randomSlug[5] ?>"> <img alt="Browser-window-3" src="uploads/images/medium/<?=$randomImage[5] ?>" /></a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class='active item'>
                  <div class='container'>
                    <h1 class='slider-header'>Buy and Sell Twitter Bootstrap templates here. </h1>
                    <h2 class='slider-sub-header'>Bootstrap Sauce is a brand new template marketplace. Earn a minimum of 55% commission on all templates sold
                    	</h2>
                    <div class='cta'>
                    	
                      <a href="template_admin/add_template" class="btn btn-cta">Submit a Template</a> <a href="bootstrap-templates" class="btn btn-cta">View all Themes</a>
                    </div>
                    <div class='row zoomed-browsers-w'>
                      <div class='span4'>
                        <div class='zoomed-browser'>
                          <a href="<?=base_url() ?>product/<?=$randomSlug[0] ?>"><img alt="Browser-window-1" src="uploads/images/medium/<?=$randomImage[0] ?>" /></a>
                        </div>
                      </div>
                      <div class='span4'>
                        <div class='zoomed-browser hidden-phone'>
                          <a href="<?=base_url() ?>product/<?=$randomSlug[1] ?>"><img alt="Browser-window-2" src="uploads/images/medium/<?=$randomImage[1] ?>" /></a>
                        </div>
                      </div>
                      <div class='span4'>
                        <div class='zoomed-browser hidden-phone'>
                          <a href="<?=base_url() ?>product/<?=$randomSlug[2] ?>"><img alt="Browser-window-3" src="uploads/images/medium/<?=$randomImage[2] ?>" /></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <a class='carousel-control left' data-slide='prev' href='#homepage-carousel'>
                <i class='icon-chevron-left'></i>
              </a>
              <a class='carousel-control right' data-slide='next' href='#homepage-carousel'>
                <i class='icon-chevron-right'></i>
              </a>
 </div>
            
            
            <div class='sub-slider-features'>
              <div class='container'>
                <div class='row'>
                  <div class='span4'>
                    <div class='info-bullet'>
                      <i class='icon-file'></i>
                      <h5>High Quality Templates</h5>
                      <p>Templates submitted must conform to a very high standard, so you know anything you purchase here will be of the highest quality.</p>
                    </div>
                  </div>
                  <div class='span4'>
                    <div class='info-bullet'>
                      <i class='icon-check'></i>
                      <h5>Template Feedback</h5>
                      <p>When submitting templates, you'll have complete visibilty of the process, if your template is rejected, you'll know exactly why.</p>
                    </div>
                  </div>
                  <div class='span4'>
                    <div class='info-bullet'>
                     <i class='icon-gbp'></i>
                     <a href="/affiliates"> <h5>Awesome Affiliate Scheme</h5>
                      <p>Earn 10% on all purchases made from your affiliate links, not just the first purchase.</p></a>
                    </div>
                  </div>
                </div>
              </div>
              </div>
              
               
               
        <section class='section-wrapper under-slider'>
              <div class='container'>
                <div class='row'>
                  <div class='span12'>
                    <h3 class='section-header'>Latest Themes</h3>
                  </div>
                  
                  <?php  foreach($latest_themes as $latest):?>
	
					<?php

						$latest -> images = (array)json_decode($latest -> images);
						foreach ($latest->images as $photo):
							$latestImage = $photo -> filename;
						endforeach;
						$latestSlug = $latest -> slug;
					?>
	
                  <div class='span3'>
                    <div class='white-card'>
                      <div class="img-w hover-fader">
                        <a href="<?=base_url() ?>product/<?=$latestSlug ?>"><img alt="Photo-card" src="uploads/images/medium/<?=$latestImage ?>">
                          <span class="hover-fade">
                            <i class="icon-zoom-in"></i>
                          </span>
                        </a>
                      </div>
                      <h5><?=$latest -> name ?></h5>
                      <p>Price: &pound;<?=$latest -> price ?></p>
                    </div>
                  </div>
        <?php	endforeach; ?>          
                  
                 
                </div>
              </div>
            </section>
            

<?php
	include ('footer.php');
 ?>