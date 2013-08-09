<div class="row" id="additional_order_details">
	<div class="span12" style="border-bottom:4px solid #ddd; padding-bottom:15px;">
		<div class="row">
			
			
			<script type="text/javascript">
				function toggle_shipping(key)
				{
					var check = $('#'+key);
					if(check.attr('checked'))
					{
						check.attr('checked', false);
					}
					else
					{
						check.attr('checked', true);
					}
					set_shipping_cost(key);
				}
			</script>