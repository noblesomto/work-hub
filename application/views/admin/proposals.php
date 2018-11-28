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
                      
                  <table class='table table-hover'>
<thead>
    <tr>
    	 
        <td><strong>Project Title</strong></td>
        <td><strong>Budget</strong></td>
        <td><strong>Status</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    </thead>
    
<?php foreach ($proposal as $prop_item): ?>
<tbody>

        <tr>
        
			
		<?php $string2 = $prop_item['title']; ?>
            <td><?php echo $string2 = character_limiter($string2, 50); ?></td>
            <td><?php echo $prop_item['pbudget']; ?></td>
             <td> <?php echo $prop_item['status']; ?> </td>
            <td>
 <a class="button" href="<?php echo base_url('adminproposal/view_proposal/'.$prop_item['proposal_id']); ?>">View Details</a> 
                 
              
            </td>
          
          
        </tr>
        
        
        </tbody>
<?php endforeach; ?>

</table>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>
