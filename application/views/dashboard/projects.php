
         
                                    
  
   <div class="graph">                                
   
     <h2><?php echo $title; ?></h2>
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
<?php foreach ($project as $projects): ?>
<tbody>
        <tr><?php $string2 = $projects['title']; ?>
            <td><?php echo $string2 = character_limiter($string2, 50); ?></td>
            <td><?php echo $projects['mini_budget']; ?> - <?php echo $projects['max_budget']; ?></td>
            <td><a class="mybutton btn-info" href="<?php echo base_url('apply/proposal/'.$projects['project_id']); ?>" ><?php echo $projects['proposal']; ?> Proposals</a></td>
            <td>
                <a class="mybutton btn-success" target="new" href="<?php echo base_url('project/'.$projects['project_id']); ?>">View</a> 
                <a class="mybutton btn-primary" href="<?php echo base_url('post/edit_project/'.$projects['project_id']); ?>">Edit</a> 
  <a class="mybutton btn-danger" href="<?php echo base_url('post/delete/'.$projects['project_id']); ?>" data-confirm="Are you sure you want to Delete?">Delete</a> 
            </td>
        </tr>
        </tbody>
<?php endforeach; ?>
</table>

 </div>   </div>                                
                              
                              
                            
                            
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