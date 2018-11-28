<script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>  

	<!--/candile-->
    <div class="candile"> 
    <div class="container">
    <div class="row">
    <?php if( !empty($project) ) {
    foreach($project as $projects) { ?>
    <div class="col-sm-8">
    
      <table class="table table-bordered">
 
  <tr>
    <td>Project Title</td>
    <td><a href="<?php echo base_url('project/'.$projects['project_id']); ?>" target="_blank"><?php echo $projects['title'] ?></a></td>
  </tr>
  <tr>
    <td>Duration</td>
    <td><?php echo $projects['duration'] ?></td>
  </tr>
  <tr>
    <td>No Revision</td>
    <td><?php echo $projects['revision'] ?></td>
  </tr>
  <tr>
    <td>Deliverable 1</td>
    <td><?php echo $projects['deliverable1'] ?> </td>
  </tr>
  <tr>
    <td>Deliverable 2</td>
    <td><?php echo $projects['deliverable2'] ?> </td>
  </tr>
  <tr>
    <td>Deliverable 3</td>
    <td><?php echo $projects['deliverable3'] ?> </td>
  </tr>
  <tr>
    <td>Deliverable 4</td>
    <td><?php echo $projects['deliverable4'] ?> </td>
  </tr>
 
  
</table>
</div>

</div>
</div>
</div>
<hr />
<div id="small-space"></div>

<div class="container">
<div class="row">
<div class="col-sm-10">
<?php if( !empty($comment) ) {
    foreach($comment as $com) { ?>

<?php if($com['username']=='admin'){ ?>

<div id="poster_com">
<strong><?php echo $com['username']; ?></strong><br />
<div class="col-sm-12"> 
<div id="com-body">
<?php echo $com['comment']; ?>
</div>
</div><br /><br />
 <div class="clearfix"> </div>
<?php  $date = strtotime($com['date']); ?>
 <span style="font-size:12px; color:#06F;"><?php echo date('j F Y', $date);  ?></span>
</div><br />
<?php }else{  ?>

<div id="user_com">
<strong><?php echo $com['username']; ?></strong><br />
<div class="col-sm-12"> 
<div id="com-body">
<?php echo $com['comment']; ?>
</div>
</div><br /><br />
 <div class="clearfix"> </div>
<?php  $date = strtotime($com['date']); ?>
  <span style="font-size:12px; color:#06F;"><?php echo date('j F Y', $date);  ?></span>
</div><br />
<?php } ?>
 
<?php }} ?>
</div>
<div class="col-sm-10">
<?php echo $this->session->flashdata('msg'); ?>
<form method="post" action="<?php echo base_url() ?>manager/project/<?php echo $projects['project_id'] ?>" enctype="multipart/form-data">

<textarea class="form-control" name="comment" id="comment" required></textarea>
 <script type="text/javascript">  
	     CKEDITOR.replace( 'comment' );  
	  </script>  
<input type="hidden" name="project_id" value="<?php echo $projects['project_id'] ?> " />
<input type="submit" value="Send" name="submit" />
</form>

</div>
</div>
</div>
		
													<!--/candile-->
<?php }} ?>
<div id="small-space"></div>

<?php if ($this->session->userdata('user_id') == $projects['user_id']) {?>

<div class="container alert-warning">
<div class="row ">
<h4>Final Submision</h4>
<div class="col-sm-4 proj-upload">
<?php echo $this->session->flashdata('upload'); ?>

<strong><em>Files smaller than 5MB</em></strong>

<form method="post" action="<?php echo base_url() ?>manager/upload/<?php echo $projects['proposal_id'] ?>" enctype="multipart/form-data">

<input type="file" name="proj" required="required" />
<span class="text-danger"> <?php if(isset($error)){print $error;}?> </span>
<input type="hidden" name="proposal_id" value="<?php echo $projects['proposal_id'] ?>" />
<input type="hidden" name="project_id" value="<?php echo $projects['project_id'] ?> " />
<input type="submit" value="Send" name="submit" />
</form>
</div>
 


<div class="col-sm-5 proj-upload">
<?php echo $this->session->flashdata('link'); ?>

Upload the project to a file sharing site and add the link here

<form method="post" action="<?php echo base_url() ?>manager/link/<?php echo $projects['proposal_id'] ?>" enctype="multipart/form-data">

<input type="text" name="link" placeholder="External Link to Project" class="form-control" required="required" />
<span class="text-danger"> <?php echo form_error('link') ?> </span>
<input type="hidden" name="proposal_id" value="<?php echo $projects['proposal_id'] ?>" />
<input type="hidden" name="project_id" value="<?php echo $projects['project_id'] ?>" />
<input type="submit" value="Send" name="submit" />
</form>
</div>
</div>									
<div class="clearfix"></div>

<div id="small-space"></div>
</div>
<?php }else{ ?>
                        
    <div id="review-sec">
    <?php if($projects['link'] != ''){ ?>
    <div class="alert-success proj-upload">
    Link to Download the Project: 
    
   <a href="<?php echo $projects['link'] ?>"><?php echo $projects['link'] ?></a>
   
   <form action="<?php echo base_url() ?>manager/add_rating" method="post" enctype="multipart/form-data">


<?php echo $this->session->flashdata('review'); ?>								
<div class="row">
<div class="col-sm-6">
  
    
     <div class="stars">
 
    <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
    <label class="star star-1" for="star-1"></label>
  
</div>  
     
        
	</div>
   
 </div>
    
<textarea name="review" id="review" class="form-control border-input" required="required" placeholder="Add your Review"></textarea><br />
<input type="hidden" name="project_id" value="<?php echo $projects['project_id'] ?>" />
<input type="hidden" name="provider" id="provider" value="<?php echo $projects['user_id']; ?>"  />
					<input id="submit" type="submit" class="btn btn-primary" value="Add Review">
							</form>
   
    </div>
    
    <?php }elseif($projects['upload'] != ''){ ?>
    
    <div class="alert-success proj-upload">
    Download the completed Job: 
    
   <a href="<?php echo base_url().'manager/download/'.$projects['proposal_id']; ?>">Download Job</a>
   
   <form action="<?php echo base_url() ?>manager/add_rating" method="post" enctype="multipart/form-data">


<?php echo $this->session->flashdata('review'); ?>								
<div class="row">
<div class="col-sm-6">
  
    
     <div class="stars">
 
    <input class="star star-5" id="star-5" type="radio" name="star" value="5"/>
    <label class="star star-5" for="star-5"></label>
    <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
    <label class="star star-1" for="star-1"></label>
  
</div>  
     
        
	</div>
   
 </div>
    
<textarea name="review" id="review" class="form-control border-input" required="required" placeholder="Add your Review"></textarea><br />
<input type="hidden" name="project_id" value="<?php echo $projects['project_id'] ?>" />
<input type="hidden" name="provider" id="provider" value="<?php echo $projects['user_id']; ?>"  />
					<input id="submit" type="submit" class="btn btn-primary" value="Add Review">
							</form>
   
   
    </div>
    
     <?php }else{ } ?> 
     
     
    </div>
    <?php } ?> 