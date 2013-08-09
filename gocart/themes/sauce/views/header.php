<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo (isset($seo_title))?$seo_title:$this->config->item('company_name'); ?></title>
  

<?php if(isset($meta)):?>
	<?php echo $meta;?>
<?php else:?>

<meta name="Description" content="Bootstrap Sauce is an online marketplace for Bootstrap Templates. Submit your template now.">
<?php endif;?>
<meta name="google-site-verification" content="nbDyLT7jznwj4egEpTqoKISexYJWG0v1rVyXj-cw_80" />

<?php echo theme_css('theme_venera_blue.css', true);?>
<?php echo theme_css('markdown.css', true);?>
<?php echo theme_css('styles.css', true);?>

<?php echo theme_js('jquery-1.10.1.min.js', true);?>
<?php echo theme_js('bootstrap.js', true);?>
<?php echo theme_js('squard.js', true);?>
<?php echo theme_js('equal_heights.js', true);?>

<?php echo theme_js('prettify.js', true);?>
<?php echo theme_js('lightbox.js', true);?>
<?php echo theme_js('markdown.converter.js', true);?>
<?php echo theme_js('markdown.sanitizer.js', true);?>
<?php echo theme_js('markdown.editor.js', true);?>
<?php echo theme_js('main.js', true);?>
  
  <link href="http://fonts.googleapis.com/css?family=Abel:400|Oswald:300,400,700" media="all" rel="stylesheet" type="text/css" />
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-19623681-29', 'bootstrapsauce.com');
  ga('send', 'pageview');

</script>
</head>
<body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
            <![endif]-->
            <header id='header'>
              <div class='navbar navbar-fixed-top'>
                <div class='navbar-inner'>
                  <div class='container'>
                    <a class='btn btn-navbar' data-target='.nav-collapse' data-toggle='collapse'>
                      <span class='icon-bar'></span>
                      <span class='icon-bar'></span>
                      <span class='icon-bar'></span>
                    </a>
                    <a href="<?=base_url()?>" class="brand">Bootstrap Sauce</a>
                    <div class='nav-collapse subnav-collapse collapse pull-right' id='top-navigation'>
                      <ul class='nav'>
                       
                        
                        
                        <li class='dropdown'>
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories</a>
                          <ul class="dropdown-menu">
								<?php foreach($this->categories as $cat_menu):?>
								<li><a href="<?php echo site_url($cat_menu['category']->slug);?>"><?php echo $cat_menu['category']->name;?></a></li>
								<?php endforeach;?>
							</ul>
                        </li>
                        <li>
                        	<a href="<?=base_url()?>about">About</a>
                        </li>
                         <li>
                        	<a href="<?=base_url()?>sauce-cms">Sauce CMS</a>
                        </li>
                        	
                        
                      </ul>
                     
                     <ul class="nav pull-right" style="background:#ddd">
						
						<?php if($this->Customer_model->is_logged_in(false, false)):?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo  site_url('secure/my_account');?>"><?php echo lang('my_account')?></a></li>
									<li><a href="<?php echo  site_url('secure/my_downloads');?>"><?php echo lang('my_downloads')?></a></li>
									<li class="divider"></li>
									<li><a href="<?php echo site_url('secure/logout');?>"><?php echo lang('logout');?></a></li>
								</ul>
							</li>
						<?php else: ?>
							<li><a href="<?php echo site_url('secure/login');?>"><?php echo lang('login');?></a></li>
							
							<li><a href="<?php echo site_url('secure/register');?>"><?php echo lang('register');?></a></li>
						<?php endif; ?>
							<li>
								<a href="<?php echo site_url('cart/view_cart');?>">
								<?php
								if ($this->go_cart->total_items()==0)
								{
									echo lang('empty_cart');
								}
								else
								{
									if($this->go_cart->total_items() > 1)
									{
										echo sprintf (lang('multiple_items'), $this->go_cart->total_items());
									}
									else
									{
										echo sprintf (lang('single_item'), $this->go_cart->total_items());
									}
								}
								?>
								</a>
							</li>
					</ul>
                    </div>
                  </div>
                </div>
              </div>
            </header>
		
		<div class="container">
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
		
		

<?php
/*
End header.php file
*/