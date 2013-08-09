<?php
include ('header.php');
 ?>
<header class="jumbotron subhead" id="overview">
	<div class="container">
		<div class="docs-header-icon">
			<h1>Submit a Template</h1>
			<p class="lead">
				Upload your template here. For details of submission requirements <a target="_blank" href="<?=base_url() ?>submission-guidelines">click here</a>
			</p>
		</div>
	</div>
</header>
<?php
	include ('admin_menu.php');
?>

<section class='section-wrapper post-w'>
	<div class="container">
		<?=form_open_multipart('template_admin/submit_template') ?>
		<div class="row-fluid">
			<div class="span6">
				<section class="section-wrapper">

					<div class="white-card extra-padding">

						<fieldset>
							<div class="row-fluid">

								<div class="span6">
									<div class="control-group">
										<label>Name</label>
										<input class="span12" name="name" placeholder="Name of Template..." type="text" value="<?=set_value('name', '') ?>">
									</div>
									<div class="control-group">
										<label>Price (single)</label>
										<div class="input-prepend">
											<span class="add-on">£</span>
											<input class="span12" name="price_single" placeholder="Suggested Price..." type="text" value="<?=set_value('price_single', '') ?>">
										</div>
									</div>
									<div class="control-group">
										<label>Price (multiple)</label>
										<div class="input-prepend">
											<span class="add-on">£</span>
											<input class="span12" name="price_multiple" placeholder="Price for mulitple licence" type="text" value="<?=set_value('price_multiple', '') ?>">
										</div>
									</div>
									<div class="control-group">
										<label>Price (extended)</label>
										<div class="input-prepend">
											<span class="add-on">£</span>
											<input class="span12" name="price_extended" placeholder="Price for extended licence..." type="text" value="<?=set_value('price_extended', '') ?>">
										</div>
									</div>

									<div class="control-group">
										<label>Demo URL</label>

										<input class="span12" name="demo_url" placeholder="URL of live demo of template..." type="text" value="<?=set_value('demo_url', '') ?>">

									</div>

									<div class="control-group">
										<label>File</label>

										<input type="file" name="userfile" class="span12" />

									</div>

									<div class="control-group">
										<label>File Version</label>
										<input class="span12" name="version" placeholder="Template version" type="text" value="<?=set_value('version', '') ?>">
									</div>
								</div>

							</div>

						</fieldset>

					</div>
				</section>
			</div>
			<div class="span6">
				<section class="section-wrapper">

					<div class="white-card extra-padding">

						<fieldset>
							<div class="row-fluid">
								<div class="span12">
									<div class="form-side-info">
										<h4>Information</h4>
										<p>
											The description field uses a Markdown editor. See <a target="_blank" href="http://daringfireball.net/projects/markdown/">-> here <-</a> for more information on Markdown.
										</p>
									</div>
								</div>
								<div class="span12">
									<div class="control-group">
										<label>Description <i class="icon-header"></i></label>
										
										
										
										
										<div class="wmd-panel">
            <div id="wmd-button-bar"></div>
<textarea class="span11 wmd-input" id="wmd-input" name="description" placeholder="Description of Template..." ><?=set_value('description', '') ?></textarea>
        </div>
        <div id="wmd-preview" class="wmd-panel wmd-preview"></div>
										
										
										<script type="text/javascript">
        (function () {
            var converter1 = Markdown.getSanitizingConverter();
            var editor1 = new Markdown.Editor(converter1);
            editor1.run();
            
            var converter2 = new Markdown.Converter();

            converter2.hooks.chain("preConversion", function (text) {
                return text.replace(/\b(a\w*)/gi, "*$1*");
            });

            converter2.hooks.chain("plainLinkText", function (url) {
                return "This is a link to " + url.replace(/^https?:\/\//, "");
            });
            
            var help = function () { alert("Do you need help?"); }
            
            var editor2 = new Markdown.Editor(converter2, "-second", { handler: help });
            
            editor2.run();
        })();
    </script>
										
										
									

									</div>

									<div class="control-group">
										<label>Notes for Reviewer</label>
										<textarea class="span11" name="notes" placeholder="Any useful information or comments" ><?=set_value('notes', '') ?></textarea>
									</div>

								</div>

							</div>
							<div class="form-actions no-margin-bottom">
								<input type="submit" value="upload" />

							</div>
						</fieldset>

					</div>
				</section>
			</div>
		</div>
		<?=form_close() ?>
	</div>
</section>

<?php
	include ('footer.php');
?>