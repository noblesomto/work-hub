	<!--/candile-->



<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.tagsinput.css">
        
        <script src="<?php echo base_url(); ?>js/jquery.tagsinput.js"></script>
      
       




    
    
    <?php if( !empty($user) ) {
    foreach($user as $prop) { ?>
    
  
<div class="col-md-12">

<div class="panel panel-primary">
<div class="panel-heading">Verify Your Account Section</div>
 <?php echo $this->session->flashdata('proof-msg'); ?>
<div class="panel-body"><p>
<?php echo form_open_multipart('profile/proof/' .$prop['user_id']);?>
 
<div class="alert alert-warning"> <em> Upload your personal Picture and a scanned copy of your Driver's License or International Passport or Permanent Voters Card<br /> <strong>NB: 700kb Max File</strong> </em></div>
  
<div class="col-md-5 form-group1 ">
<label class="control-label">Upload Personal Picture<span class="text-danger">*</span></label>
 <span class="text-danger"> <?php if(isset($error1)){print $error1;}?> </span>
<input type="file" name="pic1" id="pic1" class="form-control1" onchange="GetFileSize()" required="required" />
 
  <span id="fp"></span>
</div>

<div class="col-md-5 form-group1 "> 
<label class="control-label">Upload Proof <span class="text-danger">*</span></label>
<span class="text-danger"> <?php if(isset($error2)){print $error2;}?> </span>
<input type="file" name="pic2" id="pic2" class="form-control1" onchange="GetFileSize2()" required="required" />
 
  <span id="fp2"></span>
</div>
<div class="col-md-2 form-group1 ">
<button type="submit" class="btn btn-default">Upload</button>



</div>
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