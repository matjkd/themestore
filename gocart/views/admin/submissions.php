<?php include('header.php'); ?>



<h2>Submissions</h2>
<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Template Name</th>
					<th>Version</th>
					<th>FileName</th>
					<th>Notes</th>
					<th>Status</th>
					
				</tr>
			</thead>

			<tbody>
		<?php foreach($themes as $row):?>
			<?php
				//template status
				$status = "Pending Review";
				$buttonClass = "btn btn-info";
				$editable = 1;
				

				//stage 1
				if ($row -> visual_passed == 1)
				{
					$status = "Passed Stage 1";
					$buttonClass = "btn btn-primary";
					//$editable = 0;
				}
				if ($row -> visual_passed == 2)
				{
					$status = "Failed Stage 1";
					$buttonClass = "btn btn-danger";
					//$editable = 0;
				}

				//stage 2
				if ($row -> standards_passed == 1)
				{
					$status = "Passed Stage 2";
					$buttonClass = "btn btn-primary";
					//$editable = 0;
				}
				if ($row -> standards_passed == 2)
				{
					$status = "Failed Stage 2";
					$buttonClass = "btn btn-danger";
					//$editable = 0;
				}

				//stage 3
				if ($row -> quality_passed == 1)
				{
					$status = "Passed Stage 3";
					$buttonClass = "btn btn-primary";
					//$editable = 0;
				}
				if ($row -> quality_passed == 2)
				{
					$status = "Failed Stage 3";
					$buttonClass = "btn btn-danger";
					//$editable = 0;
				}

				//stage 4
				if ($row -> copycheck_passed == 1)
				{
					$status = "Accepted";
					$buttonClass = "btn btn-success";
					//$editable = 0;
				}
				if ($row -> copycheck_passed == 2)
				{
					$status = "Failed Stage 4";
					$buttonClass = "btn btn-danger";
					//$editable = 0;
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
				<td>
				<?=$row->notes_for_seller?>
			</td>
			<td><button class="<?=$buttonClass ?>"><?=$status ?></button>
				<?php if($editable == 1) { ?>
				<a href="<?=base_url()?>admin/themes/edit_template/<?=$row->submission_id?>"><button class="<?=$buttonClass ?>">Edit</button>	</a>
				<?php } ?>
				
			</td>
			
			
</tr>
		<?php endforeach; ?>
		</tbody>
		</table>




<?php include('footer.php');