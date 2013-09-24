<?php
	include ('header.php');
?>
<header class="jumbotron subhead" id="overview">
          <div class="container">
            <div class="docs-header-icon">
              <h1><?=$page_title ?></h1>
              <p class="lead"> </p>
            </div>
          </div>
        </header>

<section class='section-wrapper post-w'>
	<div class='container'>
		<div class='row'>
			  <?=$this->load->view('errors')?>
			<?=form_open('cart/send_contact')?>
			<div class='span6'>
				
			<h3>Get in Touch</h3>
			<p>If you have any questions or are experiencing any difficulties with any elements of the site, please get in touch</p>	
			</div>

<div class='span6'>
				
			<p>
				<label>Name*</label>
				<input class="span6" type="text" name="name" placeholder="Name">
			</p>
			<p>
				<label>Email*</label>
					<input class="span6" type="text" name="email" placeholder="Email">
			</p>
			<p>
				<label>Message*</label>
					<textarea class="span6" type="text" name="message" placeholder="Message"></textarea>
			</p>	
			<p>
				 <button type="submit" class="btn-block btn btn-primary">Send Message</button>
			</p>
			* required
			</div>
			
			<?=form_close()?>
		</div>
		
		
		
		
	</div>
</section>

<?php
	include ('footer.php');
?>