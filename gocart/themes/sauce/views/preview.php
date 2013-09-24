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
  <link href="http://fonts.googleapis.com/css?family=Source Sans Pro&subset=latin" rel="stylesheet" type="text/css">
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-19623681-29', 'bootstrapsauce.com');
  ga('send', 'pageview');

</script>
</head>

 <div id='header'>
              <div class='navbar navbar-fixed-top'>
                <div class='navbar-inner' style="padding-top:7px; padding-bottom:7px;">
                  <div class='container'>
                    <a class='btn btn-navbar' data-target='.nav-collapse' data-toggle='collapse'>
                      <span class='icon-bar'></span>
                      <span class='icon-bar'></span>
                      <span class='icon-bar'></span>
                    </a>
                    <a href="<?=base_url()?>" class="brand"><img src="<?=base_url()?>assets/images/bootstrap-logo.png" width="300px"/></a>
                    <div class='nav-collapse subnav-collapse collapse pull-right' id='top-navigation'>
                     <select>
					  <option value="volvo">Volvo</option>
					  <option value="saab">Saab</option>
					  <option value="mercedes">Mercedes</option>
					  <option value="audi">Audi</option>
					</select>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
<body style="height:100%">

<iframe src="<?=$url?>" width="100%" height="100%"></iframe>

</body>
</html>