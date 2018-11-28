	<!--/candile-->
    <div class="candile"> 
<?php foreach ($proposal as $projects): ?>
	
 
         
             <?php echo $this->session->flashdata('msg'); ?>
     
          
              <table class="table table-bordered">
  <tr>
    <th></th>
    <th>Procced TO Make Payment</th>
  </tr>
  <tr>
    <td>Project Title</td>
    <td><?php echo $projects['title'] ?></td>
  </tr>
  <tr>
    <td>Amount to Pay</td>
    <td>N<?php echo $projects['pbudget'] ?></td>
  </tr>

  <tr>
    <td>Payo Online with:</td>
    <td><form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>pay/getAuthURL">
<input type="hidden" name="title" value="<?php echo $projects['title'] ?>" />
  <input type="hidden" name="amount" value="<?php echo $projects['pbudget'] ?>" />
  <input type="hidden" name="proposal_id" value="<?php echo $projects['proposal_id'] ?>" />
  <input type="hidden" name="project_id" value="<?php echo $projects['project_id'] ?>" />
  <input type="hidden" name="proposer" value="<?php echo $projects['user_id'] ?>" />

<button class="btn"><img src="<?php echo base_url(); ?>images/paystack.png" width="200" height="50" alt="paystack" /> </button>

</form></td>
  </tr>
</table>


		</div>
													<!--/candile-->
<?php endforeach; ?>

									