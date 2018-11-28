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
                      
                      
                      <p>Manage Users</p>  
                      
                     <?php echo  $this->session->flashdata('msg'); ?>
   <div class="table-responsive">           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>View</th>
      
         <th>Delete</th>
      </tr>
    </thead>
    <tbody>
     <?php if( !empty($user) ) {
    foreach($user as $users) { ?>
    
    <tr>
        <td><?php echo $users['fname']; ?> <?php echo $users['lname']; ?></td>
        <td><?php echo $users['email']; ?></td>
        <td><?php echo $users['phone']; ?></td>
        <td><a class="btn btn-primary" href="<?php echo base_url(); ?>admin/view_user/<?php echo $users['user_id']; ?>">View </a></td>
      
        <td><a class="btn btn-danger" data-confirm="Are you sure?" href="<?php echo base_url(); ?>admin/delete_user/<?php echo $users['user_id']; ?>">Delete </a></td>
      </tr>
    
    <?php }} ?> 
    
    </tbody>
  </table>
  
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