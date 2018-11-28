	<!--/candile-->
    <div class="candile"> 

<h3><?php echo $mess['title']; ?></h3>
<hr />

<p><?php echo $mess['message']; ?> </p>
		</div><br /><br />
<hr /><strong><h5>Date: <?php  $date = strtotime($mess['date']); ?>
 <?php echo date('j F Y', $date);  ?></h5></strong>												<!--/candile-->


									