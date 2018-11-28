<!--content-->
<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							 Paid Projects
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								
								<!-- status -->
                                
							</div>
						</div>
  <!-- content start -->
 <hr />
                     
<?php echo $this->session->flashdata('msg'); ?>                      
 <div class="table-responsive">
<table class="table table-hover table-condensed">
<thead>
    <tr>
        <td><strong>Title</strong></td>
        <td><strong>Proposed Budget</strong></td>
        <td><strong>Actual Budget</strong></td>
		<td><strong>Amount Paid</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    </thead>
<?php if( !empty($project) ) {
	foreach ($project as $projects){ ?> 
<tbody>
        <tr><?php $string2 = $projects['title']; ?>
            <td><?php echo $string2 = character_limiter($string2, 50); ?></td>
            <td><?php echo $projects['pbudget']; ?></td>
            <td> <?php echo $projects['abudget']; ?></td>
             <td> <?php echo $projects['amount']; ?></td>
            
            <td>
                <a class="mybutton btn-success" target="new" href="<?php echo base_url('adminproposal/view_proposal/'.$projects['proposal_id']); ?>">View Proposal</a> 
                <a class="mybutton btn-primary" href="<?php echo base_url('admin/view_user/'.$projects['proposer']); ?>">View Poster</a> 
  <a class="mybutton btn-danger" href="<?php echo base_url('admin/mark_done/'.$projects['order_id']); ?>/<?php echo $projects['project_id']; ?>" data-confirm="Are you sure you want to Delete?">Mark Done</a> 
            </td>
        </tr>
   <?php }}else{ ?>

        <tr>
<td><em><strong>No Payments made yet</strong></em> </td>

</tr>

</tbody>
<?php } ?>
</table>

 </div>
 <div class="col-md-12">
      <div class="row"><?php echo $this->pagination->create_links(); ?></div> 
     </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>
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