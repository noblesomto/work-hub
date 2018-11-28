
         
                                    
  
   <div class="graph">                                
   
     <h2><?php echo $title; ?></h2>
 <div class="tables">
<table class='table table-hover'>
<thead>
    <tr>
        <td><strong>Username</strong></td>
        <td><strong>Skills</strong></td>
        <td><strong>Proposed Budget</strong></td>
         <td><strong>Status</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    </thead>
<?php foreach ($proposal as $projects): ?>
<tbody>
        <tr>
            <td><?php echo $projects['username']; ?></td>
            <td><?php echo $projects['skills']; ?></td>
             <td><?php echo $projects['pbudget']; ?></td>
             <td><?php echo $projects['status']; ?></td>
            <td>
                
  <a class="" href="<?php echo base_url('apply/details/'.$projects['proposal_id']); ?>">View Proposal Detail</a> 
            </td>
        </tr>
        </tbody>
<?php endforeach; ?>
</table>

 </div>   </div>                                
                              