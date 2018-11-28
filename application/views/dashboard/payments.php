<div class="col-lg-12">
                                    
                                    
                                    <h2><?php echo $title; ?></h2>
 
<table class='table table-hover'>
<thead>
    <tr>
    	 
        <td><strong>Project Title</strong></td>
        <td><strong>Amount</strong></td>
        <td><strong>Payment Status</strong></td>
        <td><strong>Action</strong></td>
    </tr>
    </thead>
    
<?php foreach ($payment as $prop_item): ?>
<tbody>

        <tr>
        
			
		<?php $string2 = $prop_item['title']; ?>
            <td><?php echo $string2 = character_limiter($string2, 50); ?></td>
            <td><?php echo $prop_item['amount']; ?></td>
             <td> <?php echo $prop_item['payment_status']; ?> </td>
             <?php if($prop_item['payment_status']=='paid'){ ?>
            <td>
 <a class="button" href="<?php echo base_url('manager/project/'.$prop_item['project_id']); ?>">Go to Project Manager</a> 
                 
              
            </td>
          <?php }else{ ?>
          
          <td> </td>
          <?php } ?>
          
        </tr>
        
        
        </tbody>
<?php endforeach; ?>

</table>

                                    
                                    <!-- Enter values for the dashboad pages here -->
                                </div>
                                <div class="agileits-box-body clearfix">
<div id="hero-area"></div>
</div>