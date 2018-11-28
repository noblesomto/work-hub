<div class="col-lg-12">
                                    
                                    
                                    <h2><?php echo $title; ?></h2>
 
<table class='table table-hover'>
<thead>
    <tr>
    	 
        <td><strong>Project Title</strong></td>
        <td><strong>Budget</strong></td>
        <td><strong>Status</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    </thead>
    
<?php foreach ($prop as $prop_item): ?>
<tbody>

        <tr>
        
			
		<?php $string2 = $prop_item['title']; ?>
            <td><?php echo $string2 = character_limiter($string2, 50); ?></td>
            <td><?php echo $prop_item['pbudget']; ?></td>
             <td> <?php echo $prop_item['status']; ?> </td>
            <td>
 <a class="button" href="<?php echo base_url('proposal/view_proposal/'.$prop_item['proposal_id']); ?>">View Details</a> 
                 
              
            </td>
          
          
        </tr>
        
        
        </tbody>
<?php endforeach; ?>

</table>

                                    
                                    <!-- Enter values for the dashboad pages here -->
                                </div>
                                <div class="agileits-box-body clearfix">
<div id="hero-area"></div>
</div>