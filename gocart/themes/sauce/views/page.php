<?php
	include ('header.php');
?>
<header class="jumbotron subhead" id="overview">
          <div class="container">
            <div class="docs-header-icon">
              <h1><?=$page->title?></h1>
              <p class="lead"> </p>
            </div>
          </div>
        </header>

<section class='section-wrapper post-w'>
	<div class='container'>
		<div class='row'>
			<div class='span12'>
				
				<?php echo html_entity_decode($page -> content); ?>
				
			</div>

			
		</div>
	</div>
</section>

<?php
	include ('footer.php');
?>