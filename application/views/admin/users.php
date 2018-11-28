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
  
  <form action="<?php echo base_url(); ?>admin/search" method="post" enctype="multipart/form-data" class="form-horizontal">
   
   <div class="form-group">
<div class="col-md-8">
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-user"></i>
</span>
<input type="text" class="form-control1" name="search" placeholder="Search User" required="required">
</div>

 
</div>
<div class="col-md-2">
<input type="submit" name="submit" value="Search" class="btn btn-primary" />
</div>
</div>

   </form>   <hr />
                 
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
<?php foreach ($user as $users): ?>
<tbody>
        <tr>
            <td><?php echo $users['fname']; ?></td>
            <td><?php echo $users['lname']; ?></td>
            <td><?php echo $users['email']; ?></td>
            <td><?php echo $users['phone']; ?></td>
            <td><?php echo $users['verify']; ?></td>
            <td>
                <a class="mybutton btn-success" href="<?php echo base_url('admin/view_user/'.$users['user_id']); ?>">View</a> 
               
  <a class="mybutton btn-danger" href="<?php echo base_url('admin/delete_user/'.$users['user_id']); ?>" data-confirm="Are you sure you want to Delete?">Delete</a> 
            </td>
        </tr>
        </tbody>
<?php endforeach; ?>
</table>

 </div>
                        
</div>                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>
