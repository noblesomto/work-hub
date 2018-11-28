<!--INNER BANNER START-->
<script>
$(document).ready(function() {
$(".submit").click(function(event) {
event.preventDefault();
var comment = $("input#comment").val();

jQuery.ajax({
type: "POST",
url: "<?php echo base_url('home/project_board'); ?>"
dataType: 'json',
data: {comment: comment},
success: function(res) {
if (res)
{
// Show Entered Value
jQuery("div#result").show();
jQuery("div#value").html(res.username);

}
}
});
});
});
</script>

  <section id="inner-banner">

    <div class="container">

      <h1>Project Details</h1>

    </div>

  </section>

  <!--INNER BANNER END--> 

  

  <!--MAIN START-->

  <div id="main"> 

    <!--RECENT JOB SECTION START-->

    <section class="recent-row padd-tb job-detail">

      <div class="container">

        <div class="row">

          <div class="col-md-9 col-sm-8">

            <div id="content-area">

              <div class="box">

                <div class="thumb"><a href="#"> </a></div>

                <div class="text-col">

                  <h2><?php echo $projects['title']; ?></h2>

                  <p><a href="<?php echo base_url('home/user/'.$projects['user_id']); ?>" target="_blank"><i class="fa fa-user"></i> <?php echo $projects['username']; ?> </a></p>

                  <a  class="text"><i class="fa fa-users"></i><?php echo $projects['proposal']; ?> Proposals</a> <br /> <a  class="text"><i class="fa fa-calendar"></i> <strong>Posted Date: </strong><?php  $date = strtotime($projects['date']); ?>
 <?php echo date('j F Y', $date);  ?></a>  <a  class="text"><i class="fa fa-calendar"></i> <strong>Duration:</strong> <?php echo $projects['mini_duration']; ?> - <?php echo $projects['max_duration']; ?> days</a>  
 
 <a  class="text"><i class="fa fa-calendar"></i><strong> Deadline:</strong> <?php  $date = strtotime($projects['end-date']); ?>
 <?php echo date('j F Y', $date);  ?></a>
 
 <strong class="price"><i class="fa fa-money"></i>$ N<?php echo $projects['mini_budget']; ?> - N<?php echo $projects['max_budget']; ?></strong>

                  <div class="clearfix"> <a href="<?php echo base_url('apply/project/'.$projects['project_id']); ?>" target="_blank" class="btn-style-1">Apply for Project</a> </div>

                </div>

                <div class="clearfix">

                  <h4>Project Details</h4>

                  <p><?php echo $projects['description']; ?></p>

                <div class="clearfix"> </div>
                  
					 <h4>Deliverables :</h4>

			<p><?php echo $projects['deliverable1']; ?></p>
            <p><?php echo $projects['deliverable2']; ?></p>
            <p><?php echo $projects['deliverable3']; ?></p>
            <p><?php echo $projects['deliverable4']; ?></p>
            
            
            
             <div class="clearfix"> </div>

              <h4>Skills Required :</h4>
           
            <p><?php 
			
			$text = $projects['skills'];
			$skills = explode(',', $text);
			
			foreach($skills as $key => $value){ ?>
            
            <a class="btn btn-info"> <?php  echo  $value;  ?> </a>
    		

 	<?php } ?></p>
           
            <div class="clearfix"> </div>
         


                  <a href="<?php echo base_url('apply/project/'.$projects['project_id']); ?>" target="_blank" class="btn-style-1 style-big">Apply for this Project Now</a> 
                              </div>
                 
           <div class="clearfix"> </div>         
     
              
                  
                  

              </div>
           
             <div class="clearfix"> </div>
             
             

            </div>
            
              <div class="clearfix"> </div>
              
     <div id="space"> </div>
             <div class="row">
             <div class="col-md-12 col-sm-8 extra-info">
  
  <ul class="nav nav-tabs">
    <li class="active"><a href="#extra">Extra Details</a></li>
    <li><a href="#proposal">Proposal</a></li>
    <li><a href="#board">Clarification Board</a></li>
  
  </ul>

  <div class="tab-content">
    <div id="extra" class="tab-pane fade in active">
      <h3>Extra Information</h3>
      <p><?php echo $projects['extra-info']; ?></p>
    </div>
    <div id="proposal" class="tab-pane fade">
      <h3>Proposals</h3>
      <p><section class="resumes-section padd-tb">

      <?php if( !empty($proposal) ) {
    foreach($proposal as $prop) { ?>
     <div class="container">

        <div class="row">
          <div class="col-md-8 col-sm-12">

            <div class="resumes-content">

              <div class="box">

                <div class="frame"><a href="#">
                
                <?php if($prop['picture']==''){ ?>
 <img src="<?php echo base_url(); ?>images/user.png" alt="img" width="200" h>
 <?php }else{ ?>
 <img src="<?=base_url().'uploads/'.$prop['picture']?>" alt="img" width="200" h>
 <?php } ?>
                
                </a></div>

                <div class="text-box">

                 

                  <h4><?php echo $prop['fname']; ?>  <?php echo $prop['lname']; ?></h4>

                  <div class="clearfix">  
            
            <?php $date = strtotime($prop['date']); ?>

            <strong><i class="fa fa-calendar" aria-hidden="true"></i><a><?php echo date('j F Y', $date); ?></a></strong> </div>

                  <span class="price"><i class="fa fa-star-o" aria-hidden="true"></i>Reviews</span>
 <div class="clearfix"> </div>
                  <?php 
			
			$text = $prop['skills'];
			$skills = explode(',', $text);
			
			foreach($skills as $key => $value){ ?>
            
            <a class="mybutton btn-info ripple"><i class="fa fa-tags"></i> <?php  echo  $value;  ?> </a>
    		

 	<?php } ?>
 <div class="clearfix"> </div>
                  <div class="btn-row"> <a href="<?php echo base_url(); ?>home/user/<?php echo $prop['user_id']; ?>" class="resume"><i class="fa fa-file-text-o"></i>View Profile</a>  </div>

                </div>

              </div>

                        

        </div>

      </div></div></div>
<?php }} ?> 
    </section></p>
    </div>
    <div id="board" class="tab-pane fade">
    <div id="div_id"></div>
      <h3>Clarification Board</h3>
      <p>
  <?php if( !empty($comment) ) {
    foreach($comment as $com) { ?>

<?php if($projects['user_id']== $com['user_id']){ ?>

<div id="poster_com">
<strong><?php echo $com['username']; ?></strong><br />
<?php echo $com['comment']; ?><br /><br />
<?php  $date = strtotime($com['date']); ?>
 <span style="font-size:12px; color:#06F;"><?php echo date('j F Y', $date);  ?></span>
</div>
<?php }else{  ?>

<div id="user_com">
<strong><?php echo $com['username']; ?></strong><br />
<?php echo $com['comment']; ?><br /><br />
<?php  $date = strtotime($com['date']); ?>
  <span style="font-size:12px; color:#06F;"><?php echo date('j F Y', $date);  ?></span>
</div>
<?php } ?>
 
<?php }} ?> 
      
<div id="small-space"> </div>      
      <?php if ($this->session->userdata('user_id') == TRUE) {?>
      <div class="col-md-12 alert alert-info">
      
      
     
      
   <form action="<?php echo base_url(); ?>home/project_board/<?php echo $projects['project_id']; ?>" method="post" id="comment" enctype="multipart/form-data">
    <textarea rows="3" class="form-control" name="comment" id="comment" required>
</textarea>
<br />

<input type="hidden" name="project_id" value="<?php echo $projects['project_id']; ?>" />
      <input type="submit" class="btn btn-primary" id="submit" value="Submit"/>
      </form>
      
      </div>
      <?php }else{ ?>
      <div class="alert alert-info"> You must be logged in to comment</div>
      <?php }?>
      </p>
    </div>
    
  </div>
</div>
<div class="clearfix"> </div>
</div>      
            
            

          </div>
          

          <div class="col-md-3 col-sm-4">

            <aside>

              <div class="sidebar">

           
<div id="small-space"></div>

                <h2>Featured Projects</h2>

                <div class="sidebar-jobs">
<?php foreach ($featured as $proj): ?>
                  <ul>
					 <?php $string = $proj['title']; ?>
                    <li> <a href="<?php echo base_url('project/'.$proj['project_id']); ?>"><?php echo $string = character_limiter($string, 50); ?></a> <span><?php echo $proj['category']; ?> </span> <span><i class="fa fa-calendar"></i> posted: <?php  $date = strtotime($proj['date']); ?>
 <?php echo date('j F Y', $date);  ?> </span>
                    
                     <span><i class="fa fa-money"></i> N<?php echo $proj['mini_budget']; ?> - N<?php echo $proj['max_budget']; ?></span>
                     </li>

                     </ul><hr />

<?php endforeach; ?>
                </div>

              </div>

             

            </aside>

          </div>

        </div>

      </div>
      
      
      
      

    </section>

    <!--RECENT JOB SECTION END--> 

  </div>

  <!--MAIN END--> 
<script type="text/javascript">
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });
});
</script>
