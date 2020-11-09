<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="/resources/demos/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.js"></script>

<div class="row" style="margin-left: 0px;margin-right: 0px;">

      <div class="col-lg-10 col-md-10 pl-0 pr-0">
	  
         
         <!----------Quick Link Section -----Start------->
        
         <!----------Quick Link Section -----End-------> 
         <!----------Tabs Section -----Start------->
         <div class="tab-main-sec push">
            <div class="row">
               <div class="col-md-12">
                <div class="row">
				<div class="col-md-12 recod">
                    <p><a href="<?php echo base_url('push-notification');?>"><img src="<?php echo base_url();?>img/ic_arrow_back_24px.png">Go back</a></p>
                 </div>
				<div class="col-md-12 recod">
				<?php if($this->session->flashdata('msg')){
						echo "<p class='alert alert-success' style='width:70%; text-align:center; '>".$this->session->flashdata('msg')."</p>";
						} 
				?>
				</div>
                 
                    </div>
					<div class="col-md-6">
                  <div class="row">
				   <?php
				 
				     foreach($edit as $row){ 
					 
					//print_r($row);
					  
				  ?>
				  <!-- Default form contact -->
<form class="text-center border border-light p-5" action="<?php //echo base_url('compose'); ?>" method="post">


    <!-- Name -->
	 <label for="id_select"  class="control-label  requiredField">Headline</label>
    <input type="text" id="defaultContactFormHeadline" name="headline" class="form-control mb-4" required value="<?php echo $row->title;?>">

    <!-- Email -->

  
    <!-- Message -->
	 <label for="id_select"  class="control-label  requiredField">Content</label>
    <div class="form-group">
        <textarea class="form-control rounded-0" name="content" id="exampleFormControlTextarea2" rows="8" required ><?php echo $row->description;?></textarea>
    </div>
<div class="time_sec">

  <p>
      <label>
        <input <?php if($row->notification_type == '1'){echo "checked";} ?>  type="radio" name="now" id="qwe" value="1" required  />
        <span>Schedule Push</span>
		 <input type="text" id="birthdaytime"  name="date" size="30" placeholder="yyyy-mm-dd H:m:s" value=" <?php echo $row->schedule_on; ?>">

      </label>
	  <label>
	  <br>
        <input <?php if($row->notification_type == '0'){echo "checked";} ?> type="radio" name="now" value="0"  required />
        <span>Send it now</span>
      </label>
    </p>
</div>
    <!-- Send button -->
   <input type="submit" class="btn btn-info btn-block" value="Done" name="save" class="btn">
<br>
<br>
</form>
<!-- Default form contact -->  
					 <?php } ?>          
					</div>        
				  </div>             	
               </div>           
            </div>
         </div>
      </div>
   </div>
   
<script type="text/javascript">
$('input[name="now"]').change(function () {
    if($("#qwe").is(':checked')) {
        $('#birthdaytime').attr('required', true);
    } else {
        $('#birthdaytime').removeAttr('required');
    }
});
$(function() {
 /*    $('#birthdaytime').datetimepicker({
		format: 'M/d/y    h:m:s',
      language: 'en',
      //pick12HourFormat: true
    }); */
	$('#birthdaytime').datetimepicker({
	 minDate: 0,  // disable past date
    //minTime: 0, // disable past time
     format: 'Y-m-d H:i:s',
use24hours: true,	 
});
  }); 
</script>