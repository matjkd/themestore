<?php
	include ('header.php');
?>

<header class="jumbotron subhead" id="overview">
	<div class="container">
		<div class="docs-header-icon">
			<h1>My Templates</h1>
			<p class="lead">
				Status of your template submissions
			</p>
		</div>
	</div>
</header>
<?php
	include ('admin_menu.php');
?>
<section class='section-wrapper post-w'>
	<div class="container">


<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Template Name</th>
					<th>Version</th>
					<th>FileName</th>
					<th>Status</th>
				</tr>
			</thead>

			<tbody>
		<?php foreach($templates as $row):?>
			<?php
				//template status
				$status = "Pending Review";
				$buttonClass = "btn btn-info";
				
				

				//stage 1
				if ($row -> visual_passed == 1)
				{
					$status = "Passed Stage 1";
					$buttonClass = "btn btn-primary";
				}
				if ($row -> visual_passed == 2)
				{
					$status = "Failed Stage 1";
					$buttonClass = "btn btn-danger";
				}

				//stage 2
				if ($row -> standards_passed == 1)
				{
					$status = "Passed Stage 2";
					$buttonClass = "btn btn-primary";
				}
				if ($row -> standards_passed == 2)
				{
					$status = "Failed Stage 2";
					$buttonClass = "btn btn-danger";
				}

				//stage 3
				if ($row -> quality_passed == 1)
				{
					$status = "Passed Stage 3";
					$buttonClass = "btn btn-primary";
				}
				if ($row -> quality_passed == 2)
				{
					$status = "Failed Stage 3";
					$buttonClass = "btn btn-danger";
				}

				//stage 4
				if ($row -> copycheck_passed == 1)
				{
					$status = "Accepted";
					$buttonClass = "btn btn-success";
				}
				if ($row -> copycheck_passed == 2)
				{
					$status = "Failed Stage 4";
					$buttonClass = "btn btn-danger";
				}
			?>
			
			<tr>
			<td><?=$row -> template_name ?></td>
			<td><?=$row -> version ?></td>
			<td>
				<?php if($row->file_location == NULL) {
					
					$status = "No File Uploaded";
					$buttonClass = "btn btn-warning";
					
					 ?>
					  
					
					 
					<?=form_open_multipart('template_admin/add_file') ?> 
					<?=form_hidden('template_id', $row->submission_id)?>
					
					 <input type="file" name="userfile"  />
					  <input type="submit" value="upload" />
					<?=form_close() ?>
					<?php } ?>
				
				<?=$row -> file_location ?></td>
			<td><button class="<?=$buttonClass ?>"><?=$status ?></button></td>
</tr>
		<?php endforeach; ?>
		</tbody>
		</table>
	</div>
</section>

<?php
	include ('footer.php');
?>