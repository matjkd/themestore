<?php include('header.php');?>
<header class="jumbotron subhead" id="overview">
          <div class="container">
            <div class="docs-header-icon">
              <h1>Order History</h1>
              <p class="lead">Overview of your sales and purchases</p>
            </div>
          </div>
        </header>
<?php include('admin_menu.php');?>
<section class='section-wrapper post-w'>
	
	
	<div class='container'>
		<div class="row">
	<div class="span12">
		<div class="page-header">
			<h2><?php echo lang('order_history');?></h2>
		</div>
		<?php if($orders):
			echo $orders_pagination;
		?>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th><?php echo lang('order_date');?></th>
					<th><?php echo lang('order_number');?></th>
					<th><?php echo lang('order_status');?></th>
				</tr>
			</thead>

			<tbody>
			<?php
			foreach($orders as $order): ?>
				<tr>
					<td>
						<?php $d = format_date($order->ordered_on); 
				
						$d = explode(' ', $d);
						echo $d[0].' '.$d[1].', '.$d[3];
				
						?>
					</td>
					<td><?php echo $order->order_number; ?></td>
					<td><?php echo $order->status;?></td>
				</tr>
		
			<?php endforeach;?>
			</tbody>
		</table>
		<?php else: ?>
			<?php echo lang('no_order_history');?>
		<?php endif;?>
	</div>
</div>

<div class="row">
	<div class="span12">
		<div class="page-header">
			<h2>My Sales</h2>
		</div>
		
		<table class="table table-bordered table-striped">
		
		<tbody>
			
		<?php 
		foreach($earnings as $earning): ?>
		<tr>
			<td><?=$earning->name?></td>
			<td>&pound;<?=$earning->value?></td>
			<td><?=$earning->status?></td>
		<td>&pound;<?=$earning->owner_earnings?></td>
		</tr>
		
		<?php endforeach;?>
</tbody>
</table>
	</div>
</div>


<div class="row">
	<div class="span12">
		<div class="page-header">
			<h2>My Affiliate Earnings</h2>
		</div>
		
		<table class="table table-bordered table-striped">
		
		<tbody>
			
		<?php 
		foreach($affiliate_earnings as $affiliate): ?>
		<tr>
			<td><?=$affiliate->name?></td>
			<td>&pound;<?=$affiliate->value?></td>
			<td><?=$affiliate->status?></td>
		<td>&pound;<?=$affiliate->affiliate_earnings?></td>
		</tr>
		
		<?php endforeach;?>
</tbody>
</table>
	</div>
</div>
</div></section>
<?php include('footer.php');?>