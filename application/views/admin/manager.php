<!--content-->
<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							 Dashboard
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								
								<!-- status -->
                                
							</div>
						</div>
  <!-- content start -->
                      
                   <script src="<?php echo base_url(); ?>ckeditor/ckeditor.js"></script>  

	<!--/candile-->
    <div class="candile"> 
    <div class="container">
    <div class="row">
    <?php foreach ($project as $projects): ?>
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
<?php endforeach; ?><hr />
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
<form method="post" action="<?php echo base_url() ?>admin/project_manager/<?php echo $projects['project_id'] ?>" enctype="multipart/form-data">

<textarea class="form-control" name="comment" id="comment" required></textarea>
 <script type="text/javascript">  
	     CKEDITOR.replace( 'comment' );  
	  </script>  
<input type="hidden" name="project_id" value="<?php echo $projects['project_id'] ?> " />
<input type="submit" value="Send" name="submit" class="btn btn-primary" />
</form>

</div>
</div>
</div>
		
													<!--/candile-->


									
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>
