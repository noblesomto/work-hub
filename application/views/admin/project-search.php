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
 <form action="<?php echo base_url(); ?>admin/search_project" method="post" enctype="multipart/form-data" class="form-horizontal">
   
   <div class="form-group">
<div class="col-md-8">
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-user"></i>
</span>
<input type="text" class="form-control1" name="search" placeholder="Search projects by name" required="required">
</div>

 
</div>
<div class="col-md-2">
<input type="submit" name="submit" value="Search" class="btn btn-primary" />
</div>
</div>

   </form><hr />
                     
                      
 <div class="tables">
<table class="table table-hover table-condensed">
<thead>
    <tr>
        <td><strong>Title</strong></td>
        <td><strong>Budget</strong></td>
		<td><strong>Proposals</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    </thead>
<?php if( !empty($project) ) {
	foreach ($project as $projects){ ?> 
<tbody>
        <tr><?php $string2 = $projects['title']; ?>
            <td><?php echo $string2 = character_limiter($string2, 50); ?></td>
            <td><?php echo $projects['mini_budget']; ?> - <?php echo $projects['max_budget']; ?></td>
            <td><a class="mybutton btn-info" href="<?php echo base_url('admin/proposal/'.$projects['project_id']); ?>" ><?php echo $projects['proposal']; ?> Proposals</a></td>
            <td>
                <a class="mybutton btn-success" target="new" href="<?php echo base_url('project/'.$projects['project_id']); ?>">View</a> 
                <a class="mybutton btn-primary" href="<?php echo base_url('adminpost/edit/'.$projects['project_id']); ?>">Edit</a> 
  <a class="mybutton btn-danger" href="<?php echo base_url('adminpost/delete/'.$projects['project_id']); ?>" data-confirm="Are you sure you want to Delete?">Delete</a> 
            </td>
        </tr>
   <?php }}else{ ?>

        <tr>
<td><em><strong>Project does not exist</strong></em> </td>

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