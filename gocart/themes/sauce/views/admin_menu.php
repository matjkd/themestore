<div >
	<div class='container'>
		<div class="">

			<ul class='breadcrumb'>
				<li>
					<a href="<?=base_url() ?>secure/my_account">My Account</a>
				</li>
				<li>
					<a href="<?=base_url() ?>secure/order_history">Order History</a>
				</li>
				
				<li>
					<a href="<?=base_url() ?>template_admin/my_templates">My Templates</a>
				</li>
				
				<li>
					<a href="<?=base_url() ?>secure/my_downloads">My Downloads</a>
				</li>
				
				<li>
					<a href="<?=base_url() ?>template_admin/add_template">Submit a Template</a>
				</li>

			</ul>
		</div>
	</div>
</div>

    <div class="container" >
		<?php if ($this->session->flashdata('message')):?>
			<div class="alert alert-info">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $this->session->flashdata('message');?>
			</div>
		<?php endif;?>
		
		<?php if ($this->session->flashdata('error')):?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $this->session->flashdata('error');?>
			</div>
		<?php endif;?>
		
		<?php if (!empty($error)):?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $error;?>
			</div>
		<?php endif;?>
		</div>