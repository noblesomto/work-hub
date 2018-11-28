	<!--/candile-->



<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/start/jquery-ui.css" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/jquery.tagsinput.css">
        
        <script src="<?php echo base_url(); ?>js/jquery.tagsinput.js"></script>
      
       




    
    
    <?php if( !empty($user) ) {
    foreach($user as $prop) { ?>
    
  
<div class="col-md-12">

<div class="panel panel-primary">
<div class="panel-heading">Extra Information </div>
  
<div class="panel-body"><p>
<?php echo form_open_multipart('profile/extra/' .$prop['user_id']);?>
 <?php echo $this->session->flashdata('extra-msg'); ?>
<div class="col-md-4 form-group1 ">
<label class="control-label">Working hours per week<span class="text-danger">*</span></label>
<input type="text" class="form-control1" name="whour" placeholder="Eg: 36" value="<?php echo $prop['whour']; ?>"  required="required"/> 
  <span class="text-danger"><?php echo form_error('whour'); ?></span>
</div>

<div class="col-md-4 form-group1 ">
 <label class="control-label">Your Discipline<span class="text-danger">*</span></label>
<input type="text" class="form-control1" name="discip" placeholder="Eg: Mechanical Enigineering" value="<?php echo $prop['discipline']; ?>" required="required" /> 
 <span class="text-danger"><?php echo form_error('discip'); ?></span> 

 
</div>

<div class="col-md-4 form-group1 ">
<label class="control-label">Your Location: </label>
<strong><?php echo $prop['location']; ?></strong>
 <select name="state" id="state" class="form-control1">
              <option value="" selected="selected">- Select -</option>
              <option value="Abuja-FCT">Abuja FCT</option>
              <option value="Abia">Abia</option>
              <option value="Adamawa">Adamawa</option>
              <option value="Akwa-Ibom">Akwa Ibom</option>
              <option value="Anambra">Anambra</option>
              <option value="Bauchi">Bauchi</option>
              <option value="Bayelsa">Bayelsa</option>
              <option value="Benue">Benue</option>
              <option value="Borno">Borno</option>
              <option value="Cross River">Cross River</option>
              <option value="Delta">Delta</option>
              <option value="Ebonyi">Ebonyi</option>
              <option value="Edo">Edo</option>
              <option value="Ekiti">Ekiti</option>
              <option value="Enugu">Enugu</option>
              <option value="Gombe">Gombe</option>
              <option value="Imo">Imo</option>
              <option value="Jigawa">Jigawa</option>
              <option value="Kaduna">Kaduna</option>
              <option value="Kano">Kano</option>
              <option value="Katsina">Katsina</option>
              <option value="Kebbi">Kebbi</option>
              <option value="Kogi">Kogi</option>
              <option value="Kwara">Kwara</option>
              <option value="Lagos">Lagos</option>
              <option value="Nassarawa">Nassarawa</option>
              <option value="Niger">Niger</option>
              <option value="Ogun">Ogun</option>
              <option value="Ondo">Ondo</option>
              <option value="Osun">Osun</option>
              <option value="Oyo">Oyo</option>
              <option value="Plateau">Plateau</option>
              <option value="Rivers">Rivers</option>
              <option value="Sokoto">Sokoto</option>
              <option value="Taraba">Taraba</option>
              <option value="Yobe">Yobe</option>
              <option value="Zamfara">Zamfara</option>
     <option value="Outside-Nigeria">Outside Nigeria</option>
            </select>
 <span class="text-danger"><?php echo form_error('state'); ?></span>
</div>
<div class="clearfix"> </div>	
<div class="col-md-4 form-group1 ">
<label class="control-label">Bank Name<span class="text-danger">*</span></label>
<input type="text" class="form-control1" name="bname" placeholder="Eg: GTBank" value="<?php echo $prop['bname']; ?>"  required="required"/> 
  <span class="text-danger"><?php echo form_error('bname'); ?></span>
</div>

<div class="col-md-4 form-group1 ">
 <label class="control-label">Account Name<span class="text-danger">*</span></label>
<input type="text" class="form-control1" name="accname" placeholder="Your Name" value="<?php echo $prop['accname']; ?>" required="required" /> 
 <span class="text-danger"><?php echo form_error('accname'); ?></span> 

 
</div>

<div class="col-md-4 form-group1 ">
<label class="control-label">Account Number </label>
<input type="text" class="form-control1" name="accnum" placeholder="Account Number" value="<?php echo $prop['accnum']; ?>" required="required" /> 
 
 <span class="text-danger"><?php echo form_error('accnum'); ?></span>
</div>
<div class="clearfix"> </div>	

<button type="submit" class="btn btn-default">Update</button>
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