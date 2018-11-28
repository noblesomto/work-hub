<!--content-->
<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							 Pending User Verification
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								
								<!-- status -->
                                
							</div>
						</div>
  <!-- content start -->
 <hr />
<?php echo $this->session->flashdata('msg') ?>                    
                      
<div class="table-responsive"> 
<table class="table table-hover table-condensed">
<thead>
    <tr>
        <td><strong>First Name</strong></td>
        <td><strong>Last Name</strong></td>
		<td><strong>Email</strong></td>
        <td><strong>Phone</strong></td>
        <td><strong>Status</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    </thead>
<?php if( !empty($user) ) {
	foreach ($user as $users){ ?> 
<tbody>
        <tr>
            <td><?php echo $users['fname']; ?></td>
            <td><?php echo $users['lname']; ?></td>
            <td><?php echo $users['email']; ?></td>
            <td><?php echo $users['phone']; ?></td>
            <td><?php echo $users['verify']; ?></td>
            <td>
                <a class="mybutton btn-success" href="<?php echo base_url('admin/pending_user_details/'.$users['user_id']); ?>">View Details</a> 
               
 
            </td>
        </tr>
   <?php }}else{ ?>

        <tr>
<td><em><strong>No Pending Users for Verification</strong></em> </td>

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