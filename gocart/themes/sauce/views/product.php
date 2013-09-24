<?php include('header.php'); ?>
<script type="text/javascript">
	window.onload = function()
	{
		$('.product').equalHeights();
	}
</script>
<span itemscope itemtype="http://schema.org/Product"><header class="jumbotron subhead" id="overview">
          <div class="container">
            <div class="docs-header-icon">
              <h1 itemprop="name"><?php echo $product->name;?></h1>
              <p itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="lead">
<?php if($product->saleprice > 0):?>
								<small><?php echo lang('on_sale');?></small>
								<span itemprop="price" class="product_price"><?php echo format_currency($product->saleprice); ?></span>
							<?php else: ?>
								<small><?php echo lang('product_price');?></small>
								<span itemprop="price" class="product_price"><?php echo format_currency($product->price); ?></span>
							<?php endif;?>              	
</p>
            </div>
          </div>
        </header>
        
<section class='section-wrapper post-w'>
	<div class='container'>
<div class="row">
	<div class="span4">
		
		<div class="row">
			<div class="span4" id="primary-img">
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

					$photo	= '<img itemprop="image" class="responsiveImage" src="'.base_url('uploads/images/medium/'.$primary->filename).'" alt="'.$product->seo_title.'"/>';
				}?>
				<a href="http://<?=$product->demo_url?>" target="_blank"><?=$photo?></a>
				
			</div>
		</div>
		<?php if(!empty($primary->caption)):?>
		<div class="row">
			<div class="span4" id="product_caption">
				<?php echo $primary->caption;?>
			</div>
		</div>
		<?php endif;?>
		<?php if(count($product->images) > 1):?>
		<div class="row">
			<div class="span4 product-images">
				<?php foreach($product->images as $image):?>
				<a href="http://<?=$product->demo_url?>" target="_blank"><img class="span1" onclick="$(this).squard('390', $('#primary-img'));" src="<?php echo base_url('uploads/images/medium/'.$image->filename);?>"/></a>
				<?php endforeach;?>
				
			</div>
		</div>
		<?php endif;?>
		
		
		
		<div class="row">
			<div class="span4" >
				<table class="table table-bordered" style="background:#fff; margin-top:10px;">
				  <thead style="background:#555; color:#fff;">
					  <tr>
					  	<th colspan="2">Product Attributes</th>
					  </tr>
				  </thead>
				  <tbody>
				  	<tr>
				  		<td>
				  			<strong>Version</strong>
				  		</td>
				  		
				  		<td>
				  			1.0
				  		</td>
				  	</tr>
				  	<tr>
				  		<td>
				  			<strong>Author</strong>
				  		</td>
				  		
				  		<td>
				  			<?=$product_author[0]->firstname?> <?=$product_author[0]->lastname?>
				  		</td>
				  	</tr>
				  	<tr>
				  		<td>
				  			<strong>Bootstrap Version</strong>
				  		</td>
				  		
				  		<td>
				  			In testing
				  		</td>
				  	</tr>
				  	<tr>
				  		<td>
				  			<strong>Browser Compatibility</strong>
				  		</td>
				  		
				  		<td>
				  			In testing
				  		</td>
				  	</tr>
				  	<tr>
				  		<td>
				  			<strong>Preview</strong>
				  		</td>
				  		
				  		<td>
				  			<a href="http://<?=$product->demo_url?>" target="_blank">Demo</a>
				  		</td>
				  	</tr>
				  	<tr>
				  		<td><strong>Product ID</strong></td>
				  		<td><?php echo $product->sku; ?></td>
				  	</tr>
				  </tbody>
				</table>
			</div>
				
		</div>
		
			<?php if(!empty($product->related_products)):?>
			<div class="related_products">
				<div class="row">
					<div class="span4">
						<h3 style="margin-top:20px;"><?php echo lang('related_products_title');?></h3>
						<ul class="thumbnails">	
						<?php foreach($product->related_products as $relate):?>
							<li class="span2 product">
								<?php
								$photo	= theme_img('no_picture.png', lang('no_image_available'));
						
						
						
								$relate->images	= array_values((array)json_decode($relate->images));
						
								if(!empty($relate->images[0]))
								{
									$primary	= $relate->images[0];
									foreach($relate->images as $photo)
									{
										if(isset($photo->primary))
										{
											$primary	= $photo;
										}
									}

									$photo	= '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" alt="'.$relate->seo_title.'"/>';
								}
								?>
								<a class="thumbnail" href="<?php echo site_url($relate->slug); ?>">
									<?php echo $photo; ?>
								</a>
								<h5 style="margin-top:5px;"><a href="<?php echo site_url($relate->slug); ?>"><?php echo $relate->name;?></a></h5>

								<div class="price_container">
									<?php if($relate->saleprice > 0):?>
										<span class="price_slash"><?php echo lang('product_reg');?> <?php echo format_currency($relate->price); ?></span>
										<span class="price_sale"><?php echo lang('product_sale');?> <?php echo format_currency($relate->saleprice); ?></span>
									<?php else: ?>
										<span class="price_reg"><?php echo lang('product_price');?> <?php echo format_currency($relate->price); ?></span>
									<?php endif; ?>
								</div>
			                    <?php if((bool)$relate->track_stock && $relate->quantity < 1) { ?>
									<div class="stock_msg"><?php echo lang('out_of_stock');?></div>
								<?php } ?>
							</li>
						<?php endforeach;?>
						</ul>
					</div>
				</div>
			</div>
			<?php endif;?>
	</div>
	<div class="span8">
		
		
		
		
		
		
		
		<div class="row">
			<div class="span8">
				<div class="product-cart-form">
					<?php echo form_open('cart/add_to_cart', 'style="padding-left:30px"');?>
					<input type="hidden" name="cartkey" value="<?php echo $this->session->flashdata('cartkey');?>" />
					<input type="hidden" name="id" value="<?php echo $product->id?>"/>
					<fieldset>
					<?php if(count($options) > 0): ?>
						<?php foreach($options as $option):
							$required	= '';
							if($option->required)
							{
								$required = ' <p class="help-block">Required</p>';
							}
							?>
							<div class="control-group">
								<label class="control-label"><?php echo $option->name;?></label>
								<?php
								/*
								this is where we generate the options and either use default values, or previously posted variables
								that we either returned for errors, or in some other releases of Go Cart the user may be editing
								and entry in their cart.
								*/

								//if we're dealing with a textfield or text area, grab the option value and store it in value
								if($option->type == 'checklist')
								{
									$value	= array();
									if($posted_options && isset($posted_options[$option->id]))
									{
										$value	= $posted_options[$option->id];
									}
								}
								else
								{
									$value	= $option->values[0]->value;
									if($posted_options && isset($posted_options[$option->id]))
									{
										$value	= $posted_options[$option->id];
									}
								}

								if($option->type == 'textfield'):?>
									<div class="controls">
										<input type="text" name="option[<?php echo $option->id;?>]" value="<?php echo $value;?>" class="span4"/>
										<?php echo $required;?>
									</div>
								<?php elseif($option->type == 'textarea'):?>
									<div class="controls">
										<textarea class="span4" name="option[<?php echo $option->id;?>]"><?php echo $value;?></textarea>
										<?php echo $required;?>
									</div>
								<?php elseif($option->type == 'droplist'):?>
									<div class="controls">
										<select name="option[<?php echo $option->id;?>]">
											<option value=""><?php echo lang('choose_option');?></option>

										<?php foreach ($option->values as $values):
											$selected	= '';
											if($value == $values->id)
											{
												$selected	= ' selected="selected"';
											}?>

											<option<?php echo $selected;?> value="<?php echo $values->id;?>">
												<?php echo($values->price != 0)?'(+'.format_currency($values->price).') ':''; echo $values->name;?>
											</option>

										<?php endforeach;?>
										</select>
										<?php echo $required;?>
									</div>
								<?php elseif($option->type == 'radiolist'):?>
									<div class="controls">
										<?php foreach ($option->values as $values):

											$checked = '';
											if($value == $values->id)
											{
												$checked = ' checked="checked"';
											}?>
											<label class="radio">
												<input<?php echo $checked;?> type="radio" name="option[<?php echo $option->id;?>]" value="<?php echo $values->id;?>"/>
												<?php echo $option->name;?> <?php echo($values->price != 0)?'(+'.format_currency($values->price).') ':''; echo $values->name;?>
											</label>
										<?php endforeach;?>
										<?php echo $required;?>
									</div>
								<?php elseif($option->type == 'checklist'):
									foreach ($option->values as $values):

										$checked = '';
										if(in_array($values->id, $value))
										{
											$checked = ' checked="checked"';
										}?>
										<label class="checkbox">
											<input<?php echo $checked;?> type="checkbox" name="option[<?php echo $option->id;?>][]" value="<?php echo $values->id;?>"/>
											<?php echo($values->price != 0)?'('.format_currency($values->price).') ':''; echo $values->name;?>
										</label>
									<?php endforeach ?>
									<?php echo $required;?>
								<?php endif;?>
								</div>
						<?php endforeach;?>
					<?php endif;?>
					
					<div class="control-group">
						
						<div class="controls">
							<?php if($this->config->item('allow_os_purchase') || !(bool)$product->track_stock || $product->quantity > 0) : ?>
								<?php if(!$product->fixed_quantity) : ?>
									<input class="span2" type="text" name="quantity" value=""/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<?php endif; ?>
								<button class="btn btn-primary btn-large" type="submit" value="submit"><i class="icon-shopping-cart icon-white"></i> <?php echo lang('form_add_to_cart');?></button>
							<?php endif;?>
						</div>
					</div>
					
					</fieldset>
					</form>
				</div>
	
			</div>
		</div>
		
		<div class="row" style="margin-top:15px;">
			<div class="span8">
				<?php echo $product->description; ?>
			</div>
		</div>
		
	</div>
</div>


<?php echo form_open('cart/add_to_cart');?>

<div id="product_right">	

	

		
	</form>
	<div class="tabs">
		

		
		<?php if(!empty($product->related)):?>
		<div id="related_tab">
			<?php
			$cat_counter=1;
			foreach($product->related as $product):
				if($cat_counter == 1):?>

				<div class="category_container">

				<?php endif;?>

				<div class="category_box">
					<div class="thumbnail">
						<?php
						$photo	= '<img src="'.base_url('images/nopicture.png').'" alt="'.lang('no_image_available').'"/>';
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

							$photo	= '<img src="'.base_url('uploads/images/thumbnails/'.$primary->filename).'" alt="'.$product->seo_title.'"/>';
						}
						?>
						<a href="<?php echo site_url($product->slug); ?>">
							<?php echo $photo; ?>
						</a>
					</div>
					<div class="gc_product_name">
						<a href="<?php echo site_url($product->slug); ?>"><?php echo $product->name;?></a>
					</div>
					<?php if($product->excerpt != ''): ?>
					<div class="excerpt"><?php echo $product->excerpt; ?></div>
					<?php endif; ?>
					<div>
						<?php if($product->saleprice > 0):?>
							<span class="gc_price_slash"><?php echo lang('product_price');?> <?php echo $product->price; ?></span>
							<span class="gc_price_sale"><?php echo lang('product_sale');?> <?php echo $product->saleprice; ?></span>
						<?php else: ?>
							<span class="gc_price_reg"><?php echo lang('product_price');?> <?php echo $product->price; ?></span>
						<?php endif; ?>
	                    <?php if((bool)$product->track_stock && $product->quantity < 1) { ?>
							<div class="gc_stock_msg"><?php echo lang('out_of_stock');?></div>
						<?php } ?>
					</div>
				</div>
			
				<?php 
				$cat_counter++;
				if($cat_counter == 5):?>
			
				
				</div>

				<?php 
				$cat_counter = 1;
				endif;
			endforeach;
		
			if($cat_counter != 1):?>
					<br class="clear"/>
				</div>
			<?php endif;?>
		</div>
		<?php endif;?>
	</div>

</div>
</div>
</section></span>

<script type="text/javascript"><!--
$(function(){ 
	$('.category_container').each(function(){
		$(this).children().equalHeights();
	});	
});
//--></script>

<?php include('footer.php'); ?>