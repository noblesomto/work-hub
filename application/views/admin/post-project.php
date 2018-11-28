<!--content-->
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.tagsinput.css">
        
        <script src="<?php echo base_url(); ?>js/jquery.tagsinput.js"></script>
      
       

<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>  
<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							 Post Project
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								
								<!-- status -->
                                
							</div>
						</div>
  <!-- content start -->
                      
                      
                    <div class="validation-form">
 	<!---->
  	    
        <?php echo form_open_multipart('adminpost/post_project');?>
         	
             <?php echo $this->session->flashdata('msg'); ?>
            <div class="col-md-12 form-group1 group-mail">
            
              <label class="control-label">Project Title <span class="text-danger">*</span></label>
              <span class="text-danger"><?php echo form_error('title'); ?></span>
              <input type="text" class="form-control1" placeholder="Project Title" name="title" value="<?php echo set_value('title'); ?>" required>
            </div>
             <div class="clearfix"> </div><br />
             
             <div class="vali-form">
            <div class="col-md-4 form-group2 group-mail">
           
 <label for="category" class="control-label">Category <span class="text-danger">*</span></label>
 
      <select class="form-control" id="category" name="category">
      
      	<option value=" ">Select Category</option>
        <option value="Art-and-Creative">Art and Creative</option>
       <option value="Designers">Designers</option>
        <option value="Instructors-and-Directors">Instructors and Directors</option>
        <option value="Programmers-and-Developers">Programmers and Developers</option>
        <option value="Scribes">Scribes</option>
        <option value="Virtual-Assistants">Virtual Assistants</option>
        <option value="Virtual-Consultants">Virtual Consultants</option>
         <option value="Others">Others</option>
        
       
      </select>
      <span class="text-danger"><?php echo form_error('category'); ?></span>
            </div>
            <div class="col-md-4 form-group1 form-last">
              <label class="control-label">Minimum Budget <span class="text-danger">*</span></label>
             
              <input type="text" class="form-control1" name="mini-budget" placeholder="eg: 20000" value="<?php echo set_value('mini-budget'); ?>" required>
               <span class="text-danger"><?php echo form_error('mini-budget'); ?></span>
            </div>
            
            
            <div class="col-md-4 form-group1 form-last">
              <label class="control-label">Maximumu Budget <span class="text-danger">*</span></label>
             
              <input type="text" class="form-control1" name="max-budget" placeholder=" eg: 50000" value="<?php echo set_value('max-budget'); ?>" required>
               <span class="text-danger"><?php echo form_error('max-budget'); ?></span>
            </div>
            
            <div class="clearfix"> </div>
            </div><br />
             
             <div class="vali-form vali-form1">
            <div class="col-md-3 form-group1">
              <label class="control-label">Minimum Duration in days <span class="text-danger">*</span></label>
             
              <input type="text" class="form-control1" name="mini-duration" placeholder="eg: 3" value="<?php echo set_value('mini-duration'); ?>"  required="required">
               <span class="text-danger"><?php echo form_error('mini-duration'); ?></span>
            </div>
            
            <div class="col-md-3 form-group1">
              <label class="control-label">Maximum Duration in days <span class="text-danger">*</span></label>
             
              <input type="text" class="form-control1" name="max-duration" placeholder="eg: 6" value="<?php echo set_value('max-duration'); ?>" required="required" >
               <span class="text-danger"><?php echo form_error('max-duration'); ?></span>
            </div>
            
            <div class="col-md-6 form-group1 form-last">
             <label class="control-label ">End Date <span class="text-danger">*</span></label>
            
              <input type="date" name="end-date" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" value="<?php echo set_value('end-date'); ?>" required="required" >
               <span class="text-danger"><?php echo form_error('end-date'); ?></span>
            </div>
            <div class="clearfix"> </div>
            </div><br />
            
             <div class="clearfix"> </div>
            <div class="col-md-12 form-group1 ">
              <label class="control-label">Project Description <span class="text-danger">*</span></label>
              <span class="text-danger"><?php echo form_error('description'); ?></span>
              <textarea id="description" name="description" > <?php echo set_value('description'); ?></textarea>
              <script type="text/javascript">  
	     CKEDITOR.replace( 'description' );  
	  </script>  
            </div>
            
            
            
              
             <div class="clearfix"> </div>
             
              
             <div class="clearfix"> </div>
             <br />
             
              <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Add Skills Required for the Project <em>(separate each with a comma)</em><span class="text-danger">*</span> </label>
              <span class="text-danger"><?php echo form_error('skills'); ?></span>
            <input id="tags_1" type="text" class="tags" name="skills" value="" required="required" /></p>
            </div>
             <div class="clearfix"> </div><br />
           
           <div class="clearfix"> </div>
            <div class="col-md-12 form-group1 ">
              <label class="control-label">Extra Information About the Project</label>
              <span class="text-danger"><?php echo form_error('extra-info'); ?></span>
              <textarea id="extra-info" name="extra-info" cols="5"> <?php echo set_value('extra-info'); ?></textarea>
              <script type="text/javascript">  
	     CKEDITOR.replace( 'extra-info' );  
	  </script>  
            </div><br />
             
                        
             
            
           <div class="clearfix"> </div>
            <div class="col-md-12 form-group1 ">
             <label class="control-label">Deliverables  <span class="text-danger">*</span></label>
             
           <input type="text" class="form-control1" name="deliverable1" placeholder="Deliverables one" value="<?php echo set_value('deliverable1'); ?>" required="required" >
            <span class="text-danger"><?php echo form_error('deliverable1'); ?></span><br />
            
             <label class="control-label">Deliverables </label>
             
           <input type="text" class="form-control1" name="deliverable2" placeholder="Deliverables two" value="<?php echo set_value('deliverable2'); ?>" >
            <span class="text-danger"><?php echo form_error('deliverable2'); ?></span><br />
           
             <label class="control-label">Deliverables </label>
             
           <input type="text" class="form-control1" name="deliverable3" placeholder="Deliverables three" value="<?php echo set_value('deliverable3'); ?>"  >
            <span class="text-danger"><?php echo form_error('deliverable3'); ?></span><br />
            
             <label class="control-label">Deliverables </label>
             
           <input type="text" class="form-control1" name="deliverable4" placeholder="Deliverables four" value="<?php echo set_value('deliverable4'); ?>" >
            <span class="text-danger"><?php echo form_error('deliverable4'); ?></span>
            </div><br />
           
            <div class="clearfix"> </div><br />
            <div class="col-md-12 form-group">
              <div class="checkbox1">
                <label>
                  <input type="checkbox" name="urgent" value="yes" ng-model="model.winner" class="ng-invalid ng-invalid-required">
                  Mark as Urgent?
                </label>
              </div>
            </div>
             <div class="clearfix"> </div>
              
             <div class="clearfix"> </div><br />
          
            <div class="col-md-12 form-group">
              <input type="submit" name="submit" class="btn btn-primary" value="Submit">
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
          <div class="clearfix"> </div>
        </form>
    
 	<!---->
 </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>
<script src="<?php echo base_url(); ?>js/bootstrap-tagsinput-angular.min.js"></script>
         
<script type="text/javascript">

		function onAddTag(tag) {
			alert("Added a tag: " + tag);
		}
		function onRemoveTag(tag) {
			alert("Removed a tag: " + tag);
		}

		function onChangeTag(input,tag) {
			alert("Changed a tag: " + tag);
		}

		$(function() {

			$('#tags_1').tagsInput({width:'auto'});
			$('#tags_2').tagsInput({
				width: 'auto',
				onChange: function(elem, elem_tags)
				{
					var languages = ['php','ruby','javascript'];
					$('.tag', elem_tags).each(function()
					{
						if($(this).text().search(new RegExp('\\b(' + languages.join('|') + ')\\b')) >= 0)
							$(this).css('background-color', 'yellow');
					});
				}
			});
			$('#tags_3').tagsInput({
				width: 'auto',

				//autocomplete_url:'test/fake_plaintext_endpoint.html' //jquery.autocomplete (not jquery ui)
				autocomplete_url:'test/fake_json_endpoint.html' // jquery ui autocomplete requires a json endpoint
			});


// Uncomment this line to see the callback functions in action
//			$('input.tags').tagsInput({onAddTag:onAddTag,onRemoveTag:onRemoveTag,onChange: onChangeTag});

// Uncomment this line to see an input with no interface for adding new tags.
//			$('input.tags').tagsInput({interactive:false});
		});

	</script>