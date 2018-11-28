	<!--/candile-->



<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.tagsinput.css">
        
        <script src="<?php echo base_url(); ?>js/jquery.tagsinput.js"></script>
      
       




    
    
    <?php if( !empty($user) ) {
    foreach($user as $prop) { ?>
    
  <div class="col-md-12">   
      <?php echo $this->session->flashdata('msg'); ?>
      <?php echo $this->session->flashdata('upload_msg'); ?>
   
<?php echo form_open_multipart('profile/upload/' .$prop['user_id']);?>
<div class="panel panel-primary">
 <div class="panel-heading">Profile Picture</div>
 <div class="panel-body"><p>
 <?php if($prop['picture']==''){ ?>
 <img src="<?php echo base_url(); ?>images/user.png" alt="img" width="200" h>
 <?php }else{ ?>
 <img src="<?=base_url().'uploads/'.$prop['picture']?>" alt="img" width="200" h>
 <?php } ?>
 </p></div>
 
 <div class="panel-footer">
	<input type="file" name="picture" />
    
    <button type="submit" class="btn btn-default">Upload</button>
    
    <span class="text-danger"> <?php if(isset($error)){print $error;}?> </span>
	</div>
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