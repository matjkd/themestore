<?php
	include ('header.php');
 ?>

<?php foreach($theme as $row):?>

<?=form_open('admin/themes/update_review') ?>	

	
	<h1><?=$row -> template_name ?></h1>
	
	<a href="<?=base_url()?>uploads/submissions/<?=$row -> file_location ?>"><?=$row -> file_location ?></a>
	<br/>
	<?php str_replace('http://', '', $row -> demo_location)?>
	<a target="_blank" href="http://<?=$row -> demo_location ?>"><?=$row -> demo_location ?></a>
	
	<p>
		<?=$row -> description ?>
	</p>
	<hr>
	<p>NOTES FOR REVIEWER: <?=$row->notes_for_reviewer?></p>
<?php
	$visual = $row -> visual_passed;
	$standards = $row -> standards_passed;
	$quality = $row -> quality_passed;
	$copy = $row -> copycheck_passed;
	//visual reset
	$v0 = "";
	$v1 = "";
	$v2 = "";

	//standards reset
	$s0 = "";
	$s1 = "";
	$s2 = "";

	//quality reset
	$q0 = "";
	$q1 = "";
	$q2 = "";

	//copy reset
	$c0 = "";
	$c1 = "";
	$c2 = "";

	if ($visual == 0)
	{
		$v0 = "checked";
	}
	if ($visual == 1)
	{
		$v1 = "checked";
	}
	if ($visual == 2)
	{
		$v2 = "checked";
	}

	if ($standards == 0)
	{
		$s0 = "checked";
	}
	if ($standards == 1)
	{
		$s1 = "checked";
	}
	if ($standards == 2)
	{
		$s2 = "checked";
	}

	if ($quality == 0)
	{
		$q0 = "checked";
	}
	if ($quality == 1)
	{
		$q1 = "checked";
	}
	if ($quality == 2)
	{
		$q2 = "checked";
	}

	if ($copy == 0)
	{
		$c0 = "checked";
	}
	if ($copy == 1)
	{
		$c1 = "checked";
	}
	if ($copy == 2)
	{
		$c2 = "checked";
	}
	?>


<div class="row">
<div class="span3">
	<h2>Visual</h2>
<label class="radio">
  <input type="radio" name="visual" id="optionsRadios1" value="0" <?=$v0 ?>>
  N/A
</label>
<label class="radio">
  <input type="radio" name="visual" id="optionsRadios2" value="1" <?=$v1 ?>>
  Passed
</label>
<label class="radio">
  <input type="radio" name="visual" id="optionsRadios3" value="2" <?=$v2 ?>>
  Failed
</label>

</div>

<div class="span3">
	<h2>Standards</h2>
<label class="radio">
  <input type="radio" name="standards" id="optionsRadios1" value="0" <?=$s0 ?>>
  N/A
</label>
<label class="radio">
  <input type="radio" name="standards" id="optionsRadios2" value="1" <?=$s1 ?>>
  Passed
</label>
<label class="radio">
  <input type="radio" name="standards" id="optionsRadios3" value="2" <?=$s2 ?>>
  Failed
</label>

</div>



<div class="span3">
	<h2>Quality</h2>
<label class="radio">
  <input type="radio" name="quality" id="optionsRadios1" value="0" <?=$q0 ?>>
  N/A
</label>
<label class="radio">
  <input type="radio" name="quality" id="optionsRadios2" value="1" <?=$q1 ?>>
  Passed
</label>
<label class="radio">
  <input type="radio" name="quality" id="optionsRadios3" value="2" <?=$q2 ?>>
  Failed
</label>

</div>




<div class="span3">
	<h2>Plagiarism</h2>
<label class="radio">
  <input type="radio" name="copy" id="optionsRadios1" value="0" <?=$c0 ?>>
  N/A
</label>
<label class="radio">
  <input type="radio" name="copy" id="optionsRadios2" value="1" <?=$c1 ?>>
  Passed
</label>
<label class="radio">
  <input type="radio" name="copy" id="optionsRadios3" value="2" <?=$c2 ?>>
  Failed
</label>

</div>
</div>

<div class="row">
	<div class="span12">
		NOTES FOR SELLER: <?=form_textarea('notes', $row->notes_for_seller)?>
	</div>
</div>
<?=form_hidden('submission_id', $row->submission_id)?>


<?=form_submit('submit', 'Update') ?>
<?=form_close() ?>

<?php endforeach; ?>





<?php
	include ('footer.php');
