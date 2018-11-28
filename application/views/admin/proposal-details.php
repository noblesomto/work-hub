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
                      
               <header class="agileits-box-header clearfix">
<h3>Proposal Details</h3><hr />
	<?php foreach ($proposal as $projects): ?>
	
 <div class="col-md-12 form-group">
   
   <table class="table table-bordered">
  <tr>
    <th></th>
    <th>Proposal Details</th>
  </tr>
  <tr>
    <td>Project Title</td>
    <td><?php echo $projects['title'] ?></td>
  </tr>
  <tr>
    <td>Proposed Budget</td>
    <td><?php echo $projects['pbudget'] ?></td>
  </tr>
  <tr>
    <td>Actual Budget</td>
    <td><?php echo $projects['abudget'] ?></td>
  </tr>
  <tr>
    <td>Project Durattion</td>
    <td><?php echo $projects['duration'] ?> days</td>
  </tr>
  <tr>
    <td>No of Revisions</td>
    <td><?php echo $projects['revision'] ?></td>
  </tr>
  <tr>
    <td>Proposal Details</td>
    <td><?php echo $projects['proposal'] ?></td>
  </tr>
   <tr>
    <td>Proposal Link</td>
    <td><input type="text" value="<?php echo base_url() ?>apply/details/<?php echo $projects['proposal_id'] ?>" id="myInput">
<button onclick="myFunction()">Copy link</button></td>
  </tr>
  
 
  
</table>   
              
           
   
            </div>
          
              
             <div class="clearfix"> </div>
          
          
            <div class="col-md-4 form-group">
            
             
              
    
   <?php if ($projects['status']=='pending'){ ?>

 
<?php } elseif($projects['status']=='canceled'){ ?>

<a class="btn btn-danger col-xs-12">Proposal Canceled</a>

<?php }else{ ?>

<a href="<?php echo base_url('admin/project_manager/'.$projects['project_id']); ?>" class="btn btn-success col-xs-12">Go to Project Manager</a>
<?php }?>
            </div>
            
            
          <div class="clearfix"> </div>
        </form>
    
    <?php endforeach; ?>
</header>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  document.execCommand("Copy");
  alert("Copied the Link: " + copyText.value);
}
</script>