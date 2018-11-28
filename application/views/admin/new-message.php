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
							 New Message
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								
								<!-- status -->
                                
							</div>
						</div>
  <!-- content start -->
                      
                      
                    <div class="validation-form">
 	<!---->
  	    
        <?php echo form_open_multipart('admin/post_message');?>
         	
             <?php echo $this->session->flashdata('msg'); ?>
            <div class="col-md-12 form-group1 group-mail">
            
              <label class="control-label">Message Title <span class="text-danger">*</span></label>
              <span class="text-danger"><?php echo form_error('title'); ?></span>
              <input type="text" class="form-control1" placeholder="Message Title" name="title" value="<?php echo set_value('title'); ?>" required>
            </div>
             <div class="clearfix"> </div><br />
             
             
            
             <div class="clearfix"> </div>
            <div class="col-md-12 form-group1 ">
              <label class="control-label">Message Body <span class="text-danger">*</span></label>
              <span class="text-danger"><?php echo form_error('message'); ?></span>
              <textarea id="description" name="message" > <?php echo set_value('message'); ?></textarea>
              <script type="text/javascript">  
	     CKEDITOR.replace( 'message' );  
	  </script>  
            </div>
            
            
            
              
             <div class="clearfix"> </div>
             
              
             <div class="clearfix"> </div>
             <br />
             
             
             <div class="clearfix"> </div><br />
          
            <div class="col-md-12 form-group">
              <input type="submit" name="submit" class="btn btn-primary" value="Send">
             
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