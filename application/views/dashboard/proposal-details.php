	<div id="small-space"></div>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/nicEdit.js"></script>
<script type="text/javascript">
	bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
<!--agileinfo-grap-->
<div class="agileinfo-grap">
<div class="agileits-box">
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
  
 
  
</table>   
              
           
   
            </div>
          
              
             <div class="clearfix"> </div>
          
          
            <div class="col-md-4 form-group">
            
             
              
    
   <?php if ($projects['status']=='pending'){ ?>
<a href="<?php echo base_url('proposal/edit_proposal/'.$projects['proposal_id']); ?>" class="btn btn-primary col-xs-12">Edit Proposal</a> 
 <a href="<?php echo base_url('proposal/cancel/'.$projects['proposal_id']); ?>" class="btn btn-danger col-xs-12">Cancel Proposal</a>
<?php } elseif($projects['status']=='canceled'){ ?>

<a class="btn btn-danger col-xs-12">Proposal Canceled</a>

<?php }else{ ?>

<a href="<?php echo base_url('manager/project/'.$projects['project_id']); ?>" class="btn btn-success col-xs-12">Go to Project Manager</a>
<?php }?>
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
			
                        
                    	
                        
                   	
	