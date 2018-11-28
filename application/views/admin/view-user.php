<!--content-->
<div class="content">
					<div class="monthly-grid">
						<div class="panel panel-widget">
							<div class="panel-title">
							 User Details
							  
							</div>
							<div class="panel-body">
								<!-- status -->
								
								<!-- status -->
                                
							</div>
						</div>
  <!-- content start -->
        
                      
                     <header class="agileits-box-header clearfix">

	<?php foreach ($user as $users): ?>
	
 <div class="col-md-12 form-group">
 <div class="table-responsive">  
   <table class="table table-bordered">
  <tr>
    <th></th>
    <th>User Details</th>
  </tr>
  <tr>
    <td>Name</td>
    <td><?php echo $users['fname'] ?> <?php echo $users['lname'] ?></td>
  </tr>
  <tr>
    <td>Username</td>
    <td><?php echo $users['username'] ?></td>
  </tr>
  <tr>
    <td>Phone</td>
    <td><?php echo $users['phone'] ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $users['email'] ?></td>
  </tr>
  <tr>
    <td>Picture</td>
    <td><?php if($users['picture']==''){ ?>
 <img src="<?php echo base_url(); ?>images/user.png" alt="img" width="200" h>
 <?php }else{ ?>
 <img src="<?=base_url().'uploads/'.$users['picture']?>" alt="img" width="200" h>
 <?php } ?></td>
  </tr>
  <tr>
    <td>Self Description</td>
    <td><?php echo $users['describe'] ?></td>
  </tr>
  <tr>
    <td>Skills</td>
    <td><?php 
			
			$text = $users['skills'];
			$skills = explode(',', $text);
			
			foreach($skills as $key => $value){ ?>
            
            <a class="mybutton btn-info"> <?php  echo  $value;  ?> </a>
    		

 	<?php } ?></td>
  </tr>
  
   <tr>
    <td>Working Hour</td>
    <td><?php echo $users['whour'] ?></td>
  </tr>
   <tr>
    <td>Discipline</td>
    <td><?php echo $users['discipline'] ?></td>
  </tr>
   <tr>
    <td>Loaction</td>
    <td><?php echo $users['location'] ?></td>
  </tr>
  <tr>
   <td> <strong>Bank Details</strong></td>
  </tr>
   <tr>
    <td>Bank Name</td>
    <td><?php echo $users['bname'] ?></td>
  </tr>
   <tr>
    <td>Account Nmame</td>
    <td><?php echo $users['accname'] ?></td>
  </tr>
   <tr>
    <td>Account Number</td>
    <td><?php echo $users['accnum'] ?></td>
  </tr>
   <tr>
    <td>Account verification</td>
    <td><?php echo $users['verify'] ?></td>
  </tr>
   <tr>
    <td>Date Registered</td>
    <td><?php $date = strtotime($users['date']); ?>
	<?php echo date('j F Y', $date); ?></td>
  </tr>
 
  
</table>   
              
  </div>         
   
            </div>
          
              
             <div class="clearfix"> </div>
          
          
            <div class="col-md-4 form-group">
            
             
              
    
  
            </div>
            
            
          <div class="clearfix"> </div>
        </form>
    
    <?php endforeach; ?>
</header>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
  <!--content-->                      
					</div>
								
		</div>
