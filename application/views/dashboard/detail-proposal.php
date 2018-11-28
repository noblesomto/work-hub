	<div id="small-space"></div>
 
<!--agileinfo-grap-->
<div class="agileinfo-grap">
<div class="agileits-box">
<header class="agileits-box-header clearfix">
<h3>Proposal Details</h3><hr />
	<?php foreach ($proposal as $projects): ?>
	
 
         
             <?php echo $this->session->flashdata('msg'); ?>
     
          
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
    <td>Project Durattion</td>
    <td><?php echo $projects['duration'] ?> days</td>
  </tr>
  <tr>
    <td>Proposal Details</td>
    <td><?php echo $projects['proposal'] ?></td>
  </tr>
  <tr>
    <td>No of Revisions</td>
    <td><?php echo $projects['revision'] ?></td>
  </tr>
  <tr>
    <td>Proposed by:</td>
    <td><a href="<?php echo base_url('home/user/'.$projects['user_id']); ?>" target="_blank"><?php echo $projects['username'] ?></a></td>
  </tr>
</table>
              
              
             <div class="clearfix"> </div>
          
            <div class="col-md-4 form-group">
            
             
              
              <?php if ($projects['status']=='pending'){ ?>
 
  
  
  <a href="<?php echo base_url(); ?>pay/getAuthURL/<?php echo $projects['proposal_id'] ?>" class="btn btn-primary col-xs-12" >Approve Proposal </a> 
 

<?php } elseif($projects['status']=='canceled'){ ?>

<a class="btn btn-danger col-xs-12">Proposal Canceled</a>

<?php }else{ ?>

<a  class="btn btn-success col-xs-12">Proposal Approved</a>
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
			
                        
                    	
                        
                   	
	