
         
                                    
  
   <div class="graph">                                
   
     <h2><?php echo $title; ?></h2>
 <div class="tables">
<table class="table table-hover table-condensed">
<thead>
    <tr>
        <td><strong>Title</strong></td>
        
        <td><strong>Action</strong></td>
    </tr>
    </thead>
<?php foreach ($message as $mess): ?>
<tbody>
        <tr><?php $string2 = $mess['title']; ?>
            <td><?php echo $string2 = character_limiter($string2, 50); ?></td>
            
            <td>
                <a class="mybutton btn-success"  href="<?php echo base_url(); ?>account/view_message/<?php echo $mess['slug'] ?>">View</a> 
                
            </td>
        </tr>
        </tbody>
<?php endforeach; ?>
</table>

 </div>   </div>                                
                              
<div class="col-md-12">
      <div class="row"><?php echo $this->pagination->create_links(); ?></div> 
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