<?php include('header.php'); ?>
<header class="jumbotron subhead" id="overview">
          <div class="container">
            <div class="docs-header-icon">
              <h1>Submit a Template</h1>
              <p class="lead">Upload your template here. For details of submission requirements <a target="_blank" href="<?=base_url()?>submission-guidelines">click here</a></p>
            </div>
          </div>
        </header>

<section class='section-wrapper post-w'>
	<div class="container">
		<?=form_open_multipart('template_admin/submit_template')?>
                <div class="row-fluid">
                  <div class="span6">
                    <section class="section-wrapper">
                      
                      <div class="white-card extra-padding">
                       
                          <fieldset>
                            <div class="row-fluid">
                              
                              <div class="span6">
                                <div class="control-group">
                                  <label>Name</label>
                                  <input class="span12" name="name" placeholder="Name of Template..." type="text" value="<?=set_value('name', '')?>">
                                  </div>
                                <div class="control-group">
                                  <label>Price (single)</label>
                                   <div class="input-prepend">
                                    <span class="add-on">£</span>
                                  <input class="span12" name="price_single" placeholder="Suggested Price..." type="text">
                                  </div>
                                </div>
                                 <div class="control-group">
                                  <label>Price (multiple)</label>
                                  <div class="input-prepend">
                                    <span class="add-on">£</span>
                                  <input class="span12" name="price_multiple" placeholder="Price for mulitple licence" type="text">
                                  </div>
                                </div>
                                 <div class="control-group">
                                  <label>Price (extended)</label>
                                  <div class="input-prepend">
                                    <span class="add-on">£</span>
                                  <input class="span12" name="price_extended" placeholder="Price for extended licence..." type="text">
                                  </div>
                                </div>
                                
                                 <div class="control-group">
                                  <label>Demo URL</label>
                                 
                                  <input class="span12" name="demo_url" placeholder="URL of live demo of template..." type="text">
                                  
                                </div>
                                
                                <div class="control-group">
                                  <label>File</label>
                                  
                                   
                                    <input type="file" name="userfile" class="span12" />
                                  
                                </div>
                                
                                <div class="control-group">
                                  <label>File Version</label>
                                  <input class="span12" name="version" placeholder="Template version" type="text">
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
                                  <p>Quisque commodo venenatis arcu, non volutpat arcu lobortis at. Donec vel turpis non erat luctus ultrices vel sed massa.</p>
                                </div>
                              </div>
                              <div class="span12">
                                <div class="control-group">
                                  <label>Description</label>
                                  <textarea class="span11" name="description" placeholder="Description of Template..." ></textarea>
                                  </div>
                                  
                                  <div class="control-group">
                                  <label>Notes for Reviewer</label>
                                  <textarea class="span11" name="notes" placeholder="Any useful information or comments" ></textarea>
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
                <?=form_close()?>
              </div>
</section>

<?php include('footer.php'); ?>