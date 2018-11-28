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
	<a href="<?php echo base_url(); ?>profile/update_picture/<?php echo $prop['user_id']; ?>" > Change Picture</a>
	</div>
    </div>
   
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


<p> Name: <?php echo $prop['fname']; ?> <?php echo $prop['lname']; ?> </p>
</div>
<div class="form-group">


<p>Email: <?php echo $prop['email']; ?> </p>
</div>

<div class="form-group">


<p>Username: <?php echo $prop['username']; ?> </p>
</div>	



<div class="form-group">


<p>Phone: <?php echo $prop['phone']; ?> </p>
</div>



</div>																								

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
<div class="panel-heading">Description yourself</div>
  <span class="text-danger"><?php echo form_error('description'); ?></span>
<div class="panel-body"><p>
<?php echo $prop['describe']; ?>



</p></div>
</div>
</div>




<div class="col-md-12">

<div class="panel panel-primary">

<div class="panel-heading">Your Skills</div>

<div class="panel-body"><p>
<?php 
			
			$text = $prop['skills'];
			$skills = explode(',', $text);
			
			foreach($skills as $key => $value){ ?>
            
            <a class="mybutton btn-info"> <?php  echo  $value;  ?> </a>
    		

 	<?php } ?>
 
<div class="clearfix"> </div>
             
             
               
            
           
</p></div>
<a href="<?php echo base_url(); ?>profile/personal_details/<?php echo $prop['user_id']; ?>" class="btn btn-info">Edit Section </a>

</div>


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
 <div class="table-responsive">   
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
  </table></div><br />


<a href="<?php echo base_url(); ?>profile/add_cert/<?php echo $prop['user_id']; ?>" class="btn btn-info">Add Certification </a>

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
 <a href="<?php echo base_url(); ?>profile/add_lang/<?php echo $prop['user_id']; ?>" class="btn btn-info">Add Language</a>
</p></div>
</div>
</div>

<div class="col-md-12">

<div class="panel panel-primary">
<div class="panel-heading">Extra Information </div>
  
<div class="panel-body"><p>
<div class="form-group">


<p> Discipline: <?php echo $prop['discipline']; ?> </p>
</div>
<div class="form-group">


<p>Working Hours: <?php echo $prop['whour']; ?> </p>
</div>

<div class="form-group">
<p>Working Hours: <?php echo $prop['location']; ?> </p>
</div><br />


<h4>Bank Details </h4>
<div class="form-group">
<p>Bank: <?php echo $prop['bname']; ?> </p>
</div>
<div class="form-group">
<p>Account Name: <?php echo $prop['accname']; ?> </p>
</div>

<div class="form-group">
<p>Account Number: <?php echo $prop['accnum']; ?> </p>
</div>


<a href="<?php echo base_url(); ?>profile/ext_details/<?php echo $prop['user_id']; ?>" class="btn btn-info">Edit Section </a>
</p></div>
</div>
</div>




<div class="col-md-12">

<div class="panel panel-primary">
<div class="panel-heading">Account Status</div>
 
<div class="panel-body"><p>
 <?php if($prop['verify']== 'pending'){ ?>
 <img src="<?php echo base_url(); ?>images/not-verified.png" width="188" height="189" alt="account status" /><br />
 <a href="<?php echo base_url(); ?>profile/verify_act/<?php echo $prop['user_id']; ?>" class="btn btn-info">Verify Account </a>
<?php }else{ ?>

<img src="<?php echo base_url(); ?>images/verified.png" width="225" height="225" alt="account status" />
<?php } ?>

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