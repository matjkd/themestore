<?php include('header.php'); ?>

<header class="jumbotron subhead" id="overview">
          <div class="container">
            <div class="docs-header-icon">
              <h1><?=$page_title;?></h1>
              <p class="lead"> </p>
            </div>
          </div>
        </header>
<section class='section-wrapper post-w'>
	<div class='container'>
	
		
	<?php if(!empty($category->description)): ?>
	<div class="row">
		<div class="span12"><h4><?php echo $category->description; ?></h4></div>
	</div>
	<?php endif; ?>
	
	
	<?php if((!isset($subcategories) || count($subcategories)==0) && (count($products) == 0)):?>
		<div class="alert alert-info">
			<a class="close" data-dismiss="alert">×</a>
			<?php echo lang('no_products');?>
		</div>
	<?php endif;?>
	

	<div class="row">
		
			
			<?php if(count($products) > 0):?>
				
				<div class="span12 pull-left" style="margin-top:20px;">
					<select id="sort_products" onchange="window.location='<?php echo site_url(uri_string());?>/?'+$(this).val();">
						<option value=''><?php echo lang('default');?></option>
						<option<?php echo(!empty($_GET['by']) && $_GET['by']=='name/asc')?' selected="selected"':'';?> value="by=name/asc"><?php echo lang('sort_by_name_asc');?></option>
						<option<?php echo(!empty($_GET['by']) && $_GET['by']=='name/desc')?' selected="selected"':'';?>  value="by=name/desc"><?php echo lang('sort_by_name_desc');?></option>
						<option<?php echo(!empty($_GET['by']) && $_GET['by']=='price/asc')?' selected="selected"':'';?>  value="by=price/asc"><?php echo lang('sort_by_price_asc');?></option>
						<option<?php echo(!empty($_GET['by']) && $_GET['by']=='price/desc')?' selected="selected"':'';?>  value="by=price/desc"><?php echo lang('sort_by_price_desc');?></option>
					</select>
				</div>
				<div style="float:left;"><?php echo $this->pagination->create_links();?></div>
				<br style="clear:both;"/>
			
				<?php foreach($products as $product):?>
					<?php
						$photo	= theme_img('no_picture.png', lang('no_image_available'));
						$product->images	= array_values($product->images);
				
						if(!empty($product->images[0]))
						{
							$primary	= $product->images[0];
							foreach($product->images as $photo)
							{
								if(isset($photo->primary))
								{
									$primary	= $photo;
								}
							}

							$photo	= '<img src="'.base_url('uploads/images/medium/'.$primary->filename).'" alt="'.$product->seo_title.'"/>';
						}
						?>
					<div class='span3'>
                    <div class='white-card'>
                      <div class="img-w hover-fader">
                        <a href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>"><?php echo $photo; ?>
                          <span class="hover-fade">
                            <i class="icon-zoom-in"></i>
                          </span>
                        </a>
                      </div>
                      <h5><a href="<?php echo site_url(implode('/', $base_url).'/'.$product->slug); ?>"><?php echo $product->name;?></a></h5>
                      <p><?php echo $product->excerpt; ?></p>
                      <div class="price_container">
							<?php if($product->saleprice > 0):?>
								<span class="price_slash"><?php echo lang('product_reg');?> <?php echo format_currency($product->price); ?></span>
								<span class="price_sale"><?php echo lang('product_sale');?> <?php echo format_currency($product->saleprice); ?></span>
							<?php else: ?>
								<span class="price_reg"><?php echo lang('product_price');?> <?php echo format_currency($product->price); ?></span>
								
							<?php endif; ?>
						</div>
		                    <?php if((bool)$product->track_stock && $product->quantity < 1) { ?>
								<div class="stock_msg"><?php echo lang('out_of_stock');?></div>
							<?php } ?>
							<span class="price_reg">Sales: <?php echo $product->sales; ?></span>
						</div>
                    </div>
                  
					
				<?php endforeach?>
			<?php endif;?>
		
	</div>

<script type="text/javascript">
	window.onload = function(){
		$('.product').equalHeights();
	}
</script>
</div></section>
<?php include('footer.php'); ?>