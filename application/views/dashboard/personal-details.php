	<!--/candile-->

<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>

<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.tagsinput.css">
        
        <script src="<?php echo base_url(); ?>js/jquery.tagsinput.js"></script>
      
       




    
    
    <?php if( !empty($user) ) {
    foreach($user as $prop) { ?>
    
  
  
 <div class="col-md-12">
<?php echo form_open_multipart('profile/personal_details/' .$prop['user_id']);?>
   <?php echo $this->session->flashdata('msg'); ?>       	
   
<div class="panel panel-primary two">
 <div class="panel-heading">Profile Details</div>
  <div class="panel-body two"><p>
  <!--/set-3-->
<div class="set-3">



  
<div class="form-group">

<div class="col-md-12">
<div class="input-group">							
<span class="input-group-addon">
<i class="fa fa-user-o" aria-hidden="true"></i>
</span>
<input type="text" class="form-control1 icon" name="fname" value="<?php echo $prop['fname']; ?>" placeholder="First Name" required>
<span class="text-danger"><?php echo form_error('fname'); ?></span>

</div></div>	



<div class="col-md-12">
<div class="input-group">							
<span class="input-group-addon">
<i class="fa fa-user-o" aria-hidden="true"></i>
</span>
<input type="text" class="form-control1 icon" name="lname" value="<?php echo $prop['lname']; ?>" placeholder="Last Name" required>
<span class="text-danger"><?php echo form_error('lname'); ?></span>
</div>
</div>


<div class="col-md-12">
<div class="input-group">							
<span class="input-group-addon">
<i class="fa fa-user-o" aria-hidden="true"></i>
</span>
<input type="text" class="form-control1 icon" name="username" value="<?php echo $prop['username']; ?>" placeholder="Username" required>
<span class="text-danger"><?php echo form_error('usernamae'); ?></span>
</div>
</div>
																									
																									
																									
<div class="col-md-12">
<div class="input-group">							
<span class="input-group-addon">
<i class="fa fa-envelope" aria-hidden="true"></i>
</span>
<input type="text" class="form-control1 icon" value="<?php echo $prop['email']; ?>" readonly>

</div>
</div>


<div class="col-md-12">
<div class="input-group">							
<span class="input-group-addon">
<i class="fa fa-phone" aria-hidden="true"></i>
</span>
<input type="text" class="form-control1 icon" name="phone" value="<?php echo $prop['phone']; ?>" placeholder="Phone" readonly>
<span class="text-danger"><?php echo form_error('phone'); ?></span>
</div>
</div>





</div>
																									
																									
																									
																									
																									
																									
																									
		
		</div>
		
				<!--//set-3-->
  <div class="clearfix"> </div>																									

  </p></div>
  
 <div class="panel-footer">
 
  <?php $date = strtotime($prop['date']); ?>
	Registered: <?php echo date('j F Y', $date); ?>
	</div>
   </div>
   </div>
<div class="clearfix"> </div>
    <div class="candile"> 

 <div class="col-md-12">

<div class="panel panel-primary">
<div class="panel-heading">Describe yourself</div>
  <span class="text-danger"><?php echo form_error('description'); ?></span>
<div class="panel-body"><p>
<div class="col-md-12 form-group1 ">

 <textarea id="description" name="description" ><?php echo $prop['describe']; ?></textarea>
  <script type="text/javascript">  
	     CKEDITOR.replace( 'description' );  
	  </script>  
 
</div>



</p></div>
</div>
</div>




<div class="col-md-12">

<div class="panel panel-primary">

<div class="panel-heading">Select / Update your Skills</div>

<div class="panel-body"><p>
<strong>Skills: </strong><?php 
			
			$text = $prop['skills'];
			$skills = explode(',', $text);
			
			foreach($skills as $key => $value){ ?>
            
            <a class="mybutton btn-info"> <?php  echo  $value;  ?> </a>
    		

 	<?php } ?>
 
<div class="clearfix"> </div>
             
             
              <div class="col-md-12 form-group1 group-mail">
              <label class="control-label">Add/Update Skills <em>(separate each with a comma)</em><span class="text-danger">*</span> </label>
              <span class="text-danger"><?php echo form_error('skills'); ?></span>
            <input id="tags_1" type="text" class="tags" name="skills" value="<?php echo $prop['skills']; ?>" /></p>
            </div>
            
            
            
           
</p></div>

<button type="submit" class="btn btn-default">Update Profile</button>
</div>
</form>

</div>




<?php }} ?> 
<div class="clearfix"> </div>	
<div class="clearfix"> </div>	
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
    
    <script>
	
	$(document).on('click', ':not(form)[data-confirm]', function(e){
    if(!confirm($(this).data('confirm'))){
        e.stopImmediatePropagation();
        e.preventDefault();
    }
});

$(document).on('submit', 'form[data-confirm]', function(e){
    if(!confirm($(this).data('confirm'))){
        e.stopImmediatePropagation();
        e.preventDefault();
    }
});

$(document).on('input', 'select', function(e){
    var msg = $(this).children('option:selected').data('confirm');
    if(msg != undefined && !confirm(msg)){
        $(this)[0].selectedIndex = 0;
    }
});

</script>

<script>
    function GetFileSize() {
        var fi = document.getElementById('pic1'); // GET THE FILE INPUT.

        // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
        if (fi.files.length > 0) {
            // RUN A LOOP TO CHECK EACH SELECTED FILE.
            for (var i = 0; i <= fi.files.length - 1; i++) {

                var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
                document.getElementById('fp').innerHTML =
                    document.getElementById('fp').innerHTML + '<br /> ' +
                         'Picture Selected ' + '<b>'  +  Math.round((fsize / 1024)) + '</b> KB';
            }
        }
    }
</script>
<script>
    function GetFileSize2() {
        var fi = document.getElementById('pic2'); // GET THE FILE INPUT.

        // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
        if (fi.files.length > 0) {
            // RUN A LOOP TO CHECK EACH SELECTED FILE.
            for (var i = 0; i <= fi.files.length - 1; i++) {

                var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
                document.getElementById('fp2').innerHTML =
                    document.getElementById('fp2').innerHTML + '<br /> ' +
                         'Proof Selected ' + '<b>'  + Math.round((fsize / 1024)) + '</b> KB';
            }
        }
    }
</script>