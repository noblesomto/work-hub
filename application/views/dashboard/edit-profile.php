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
    </div>
  <div class="col-md-4">
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
 <div class="col-md-7">
<?php echo form_open_multipart('profile/profile/' .$prop['user_id']);?>
   <?php echo $this->session->flashdata('profile-msg'); ?>       	
   
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


<div class="col-md-12">
 <div class="more-details">
 
 Other Details
 
 </div></div>



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
               <span class="text-danger"> <?php if(isset($error1)){print $error1;}?> </span>
            </div>
            <div class="clearfix"> </div>
            </div>

 <button type="submit" class="btn btn-default">Add</button>
 
</form>

</p></div>
</div>
</div>


<div class="col-md-12">

<div class="panel panel-primary">
<div class="panel-heading">Add Languages</div>
 
<div class="panel-body"><p>
<?php echo form_open_multipart('profile/lang/' .$prop['user_id']);?>
 <?php echo $this->session->flashdata('lang-msg'); ?>
 <table class="table table-condensed table-bordered">
    
    <tbody>
  <?php if( !empty($lang) ) {
    foreach($lang as $langs) { ?>
    
    
      <tr>
        <td><?php echo $langs['lang']; ?></td>
        
        <td><a href="<?php echo base_url(); ?>profile/delete_lang/<?php echo $langs['id']; ?>" data-confirm="Are you sure you want to Delete?">Delete</a> </td>
      </tr>
    
 
 
 <?php }} ?>
 </tbody>
  </table><br />
  <span class="text-danger"><?php echo form_error('lang'); ?></span>
<div class="col-md-8 form-group1 ">

 <input type="text" id="lang" name="lang" class="form-control1" placeholder="Add a Language" value="<?php echo set_value('lang'); ?>" required="required" >
 
</div>

<div class="col-md-4 form-group1 ">
<button type="submit" class="btn btn-default">Add</button>
</div>
</form>
</p></div>
</div>
</div>

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

<button type="submit" class="btn btn-default">Update</button>
</form>
</p></div>
</div>
</div>




<div class="col-md-12">

<div class="panel panel-primary">
<div class="panel-heading">Verify Your Account Section</div>
 
<div class="panel-body"><p>
<?php echo form_open_multipart('profile/proof/' .$prop['user_id']);?>
 <?php echo $this->session->flashdata('proof-msg'); ?>
<div class="alert alert-warning"> <em> Upload your personal Picture and a scanned copy of your Driver's License or International Passport or Permanent Voters Card<br /> <strong>NB: 700kb Max File</strong> </em></div>
  
<div class="col-md-5 form-group1 ">
<label class="control-label">Upload Personal Picture<span class="text-danger">*</span></label>
<input type="file" name="pic1" id="pic1" class="form-control1" onchange="GetFileSize()" required="required" />
  <span class="text-danger"> <?php if(isset($error2)){print $error2;}?> </span>
  <span id="fp"></span>
</div>

<div class="col-md-5 form-group1 ">
<label class="control-label">Upload Proof <span class="text-danger">*</span></label>
<input type="file" name="pic2" id="pic2" class="form-control1" onchange="GetFileSize2()" required="required" />
 <span class="text-danger"> <?php if(isset($error3)){print $error3;}?> </span>
  <span id="fp2"></span>
</div>
<div class="col-md-2 form-group1 ">
<button type="submit" class="btn btn-default">Upload</button>



</div>
</form>
</p></div>
</div>
</div>




<div class="col-md-12">

<div class="panel panel-primary">
<div class="panel-heading">Bank Details </div>
  
<div class="panel-body"><p>
<?php echo form_open_multipart('profile/bank/' .$prop['user_id']);?>
 <?php echo $this->session->flashdata('bank-msg'); ?>
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