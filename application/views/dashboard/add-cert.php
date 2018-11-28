	<!--/candile-->



<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.tagsinput.css">
        
        <script src="<?php echo base_url(); ?>js/jquery.tagsinput.js"></script>
      
       




    
    
    <?php if( !empty($user) ) {
    foreach($user as $prop) { ?>
    
 

<div class="col-md-12">

<div class="panel panel-primary">

<div class="panel-heading">Certifications</div>

<div class="panel-body"><p>
<?php echo form_open_multipart('profile/certification/' .$prop['user_id']);?>
 <?php echo $this->session->flashdata('cert-msg'); ?>
 <table class="table table-condensed table-bordered">
    
    <tbody>
  <?php if( !empty($cert) ) {
    foreach($cert as $certs) { ?>
    
    
      <tr>
        <td><?php echo $certs['cert_title']; ?></td>
        <td><?php echo $certs['institution']; ?></td>
        <td><?php $date = strtotime($certs['date_issue']); ?>
					 <?php echo date('j F Y', $date); ?></td>
        <td><a href="<?php echo base_url(); ?>profile/delete_cert/<?php echo $certs['id']; ?>" data-confirm="Are you sure you want to Delete?">Delete</a> </td>
      </tr>
    
 
 
 <?php }} ?>
 </tbody>
  </table><br />
<div class="vali-form vali-form1">
            <div class="col-md-3 form-group1">
              <label class="control-label">Title <span class="text-danger">*</span></label>
             
              <input type="text" class="form-control1" name="title" placeholder="Certificate Title" value="<?php echo set_value('title'); ?>"  required="required">
               <span class="text-danger"><?php echo form_error('title'); ?></span>
            </div>
            
            <div class="col-md-3 form-group1">
              <label class="control-label">Institution <span class="text-danger">*</span></label>
             
              <input type="text" class="form-control1" name="institution" placeholder="Awarding Institution" value="<?php echo set_value('institution'); ?>" required="required" >
               <span class="text-danger"><?php echo form_error('institution'); ?></span>
            </div>
            
            <div class="col-md-3 form-group1 ">
             <label class="control-label ">Date of Issue <span class="text-danger">*</span></label>
            
              <input type="date" name="date-issue" class="form-control1 ng-invalid ng-invalid-required" ng-model="model.date" value="<?php echo set_value('date-issue'); ?>" required="required" >
               <span class="text-danger"><?php echo form_error('date-issue'); ?></span>
            </div>
            
            <div class="col-md-3 form-group1 form-last">
              <label class="control-label">Upload <span class="text-danger">*</span></label>
             
              <input type="file" class="form-control1" name="cert-pix" required="required" >
               <span class="text-danger"> <?php if(isset($error)){print $error;}?> </span>
            </div>
            <div class="clearfix"> </div>
            </div>

 <button type="submit" class="btn btn-default">Add</button>
 
</form>

</p></div>
</div>
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