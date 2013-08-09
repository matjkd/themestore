<script type="text/javascript">
//if this page is loaded, it means that we can load payment and shipping info too.
$('#shipping_payment_container').show();
$('#submit_button_container').show();

$.post('<?php echo site_url('checkout/shipping_payment_methods');?>', function(data){
	$('#shipping_payment_container').html(data);
});
</script>
<?php
//$bill	= $customer['bill_address'];
//$ship	= $customer['ship_address'];
?>

<div class="row">
	<div style="float:right; text-align:right;">
		<img id="save_customer_loader" alt="loading" src="<?php echo theme_img('ajax-loader.gif');?>" style="display:none;"/> <button class="btn btn-inverse" type="button" onclick="get_customer_form();"><?php echo lang('edit_customer_information');?></button>
	</div>
	
	
	
	
</div>