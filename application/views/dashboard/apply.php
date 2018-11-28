	<div id="small-space"></div>
<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script> 
<script>
$(document).ready(function(){
    var pbudget=$("#pbudget");
	var cost=$("#cost");
	var price=$("#price");
    pbudget.keyup(function(){
    var total1=((pbudget.val()* price.val() / 100))
	var total2 = (pbudget.val()- total1-500 )
	
		
        $("#total").val(total2);
    });
});

</script>

<script>

$(document).ready(function(){
    $('#shares').keyup(function(){
        $('#result').text($('#shares').val() * 1.5);
    });    
});

</script>
<!--agileinfo-grap-->
<div class="agileinfo-grap">
<div class="agileits-box">
<header class="agileits-box-header clearfix">
<h3>Appy for Project</h3><hr />
<div class="alert alert-info" style="font-size:12px"> This is how you have to fill and apply for a project</div>
		<?php foreach ($project as $projects): ?>
  <?php echo form_open_multipart('apply/apply_project/'.$projects['project_id']);?>
         
             <?php echo $this->session->flashdata('msg'); ?>
            <div class="col-md-12 form-group1 group-mail">
            
              <label class="control-label">Project Title</label>
             
              <input type="text" placeholder="Project Title" class="form-control1" name="title" value="<?php echo $projects['title'] ?>" readonly="readonly">
            </div>
            
             
               
<input name="price" id="price" type="hidden" value="25" /><br />
<input name="cost" id="cost" type="hidden" value="500" /><br />


 <div class="clearfix"> </div>
            <div class="vali-form">
            <div class="col-md-3 form-group1">
           
 <label class="control-label">Proposed Bid Budget</label>
             
              <input type="text" name="pbudget" class="form-control1" id="pbudget" placeholder=" eg: 20000" value="<?php echo set_value('pbudget'); ?>" required>
               <span class="text-danger"><?php echo form_error('pbudget'); ?></span>
            </div>
            
            <div class="col-md-3 form-group1">
           
 <label class="control-label">Actual Proposed Budget</label>
             
              <input type="text" name="total" class="form-control1" id="total" value="<?php echo set_value('total'); ?>" required>
              <span id="result"></span>
               <span class="text-danger"><?php echo form_error('total'); ?></span>
            </div>
            
            <div class="col-md-6 form-group1 form-last">
               <label class="control-label">Proposed Duration in Days</label>
             
              <input type="text" name="duration" class="form-control1" placeholder="eg: 10" value="<?php echo set_value('duration'); ?>" required>
               <span class="text-danger"><?php echo form_error('duration'); ?></span>
            </div>
            <div class="clearfix"> </div>
            </div>
            
            
            
            
             
            
             <div class="clearfix"> </div>
            <div class="col-md-11 form-group1 ">
              <label class="control-label">Project Proposal</label>
              <span class="text-danger"><?php echo form_error('proposal'); ?></span>
              <textarea id="proposal"  name="proposal"> <?php echo set_value('proposal'); ?></textarea>
               <script type="text/javascript">  
	     CKEDITOR.replace( 'proposal' );  
	  </script>  
            </div>
            
            
             <div class="clearfix"> </div>
           <div class="vali-form">
            <div class="col-md-6 form-group1">
           
 <label class="control-label">Number of Revision</label>
             
              <input type="text" class="form-control1" name="revision" placeholder=" eg: 2" value="<?php echo set_value('revision'); ?>" required>
               <span class="text-danger"><?php echo form_error('revision'); ?></span>
            </div>
            
            
            
            <div class="col-md-6 form-group1 form-last">
               <label class="control-label">Upload previous Work <em>( Screenshot )</em></label>
             
              
             <input id="fileUpload3" multiple="multiple" type="file" name="pwork" class="form-control1"/> 
<span class="text-danger"> <?php if(isset($error)){print $error;}?> </span>
    </div>
            <div class="clearfix"> </div>
            </div>
            
            
            <div class="clearfix"> </div>
            <div class="col-md-12 form-group">
              <div class="checkbox1">
                <label>
                  <input type="checkbox" name="urgent" value="yes" ng-model="model.winner" class="ng-invalid ng-invalid-required" required="required">
                  I accept the <a href="#">Terms &amp; Conditions</a> 
                </label>
              </div>
            </div>
              
      


              
             <div class="clearfix"> </div>
             <input type="hidden" name="project_id" value="<?php echo $projects['project_id'] ?>" />
             <input type="hidden" name="poster_id" value="<?php echo $projects['user_id'] ?>" />
             
            
             
            
           
           
            <div class="col-md-12 form-group">
              
            </div>
          
              
             <div class="clearfix"> </div>
          
            <div class="col-md-12 form-group">
              <input type="submit" name="submit" class="btn btn-primary" value="Apply">
             
            </div>
          <div class="clearfix"> </div>
        </form>
    
    <?php endforeach; ?>
</header>
<div class="agileits-box-body clearfix">
<div id="hero-area"></div>
</div>
</div>
</div>
	<!--//agileinfo-grap-->
<!--photoday-section-->	
			
  <script src="<?php echo base_url(); ?>js/pic2.js"></script>                   
                    	
                        
                   	
	