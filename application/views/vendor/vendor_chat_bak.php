      <link href="https://parsleyjs.org/src/parsley.css" rel="stylesheet" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.3.4/parsley.min.js"></script>
      <link rel="stylesheet" href="https://rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
      <script src= "https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
      <script src= "https://rawgit.com/mervick/emojionearea/master/dist/emojionearea.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
      <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
        <style> 
           * { 
          font-family: Arial, Helvetica, san-serif;
         }  
        .row:after, .row:before {
          content: " ";   
          display: table;  
          clear: both;     
        }   
        .span6 {  
          float: left;
          width: 48%;
          padding: 1%;
        }
         
        .emojionearea-standalone { 
          float: right;
        }
        
/*        .emojionearea .emojionearea-button.active+.emojionearea-picker-position-right {
    margin-right: 0px !important;
}

.emojionearea .emojionearea-button {
    
    position: unset !important;
}*/

	
	.sd-container {
  position: relative;
  float: left;
}

.sd {
  border: 1px solid #1cbaa5;
  padding: 5px 10px;
  height: 30px;
  width: 150px;
}

.open-button {
  position: absolute;
  top: 10px;
  right: 3px;
  width: 25px;
  height: 25px;
  background: #fff;
  pointer-events: none;
}

.open-button button {
  border: none;
  background: transparent;
}
        </style>
   <?php if(isset($_POST['searchfil'])){?>
<style>
    .noHover{
    pointer-events: none;
}

    
</style>

<?php } ?>           
<div class="tab-main-sec">
<div class="row">
 <div class="col-md-12">
  <div id="mydivs">   
		 <?php if($this->session->flashdata('msg')){
        echo "<p class='alert alert-danger' style='width:30%; text-align:center; margin-left:30%;'>".$this->session->flashdata('msg')."</p>";
		} ?>
		  </div>
    <script>  
        setTimeout(function() {
            $('#mydivs').hide('fast');
        }, 10000);
    </script> 
<div class="row">
                    <div class="col-md-6 recod">
                        <h2><img src="<?php echo base_url(); ?>img/Background-black.png">Chat</h2>
                     </div>
                     <?php
                     /* echo date_default_timezone_get();
                     $dateWithTimeZone = "2020-05-20 09:39:29";
                     $time = strtotime($dateWithTimeZone.' UTC');
						echo $dateInLocal = date("Y-m-d H:i:s", $time); */
						
						/* $date = '2020-05-29 09:39:29';
$l10nDate = new DateTime($date, new DateTimeZone('UTC'));
$l10nDate->setTimeZone(new DateTimeZone('America/Vancouver'));
echo $l10nDate->format('Y-m-d H:i:s'); */
?>
                     <div class="col-md-6">
                         <form class="card card-sm" action="<?php echo base_url('vendor-chat'); ?>" method="post">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                       <!--<i class="fas fa-search h4 text-body"></i>-->
										 <img src="<?php echo base_url(); ?>img/ic_zoom_out_24px.png">
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
<input style="border-bottom: 0px solid #819cb6 !important;" class="form-control form-control-lg form-control-borderless" name="searchfil" type="search" value="<?php if(isset($_POST['searchfil'])){echo $_POST['searchfil'];}?>" placeholder="Search User">
<?php if(isset($_POST['searchfil'])){ ?> 
	 <input type="button" value="Reset" onClick="location.href=location.href" style="position: absolute;right: 0px;float: right; width: 45px;height: 18px;background-color: white;color: #597b9e;font-size: 12px;margin-top: -15px;">
	 <?php } ?>
                                    </div>
                                 
                                    <!--end of col-->
                                </div>
                            </form>
                     </div>
                     
                  </div> 
       <div class="messaging">
           
  <div class="inbox_msg">
	<div class="inbox_people">
	  
	  <div id="myDIV" class="inbox_chat scroll ">  
	  
	  <?php
			foreach($allchat as $chatvalue){
			    
			    $image = $chatvalue->profile_image;
			   $on = $chatvalue->online_status;
			   //echo $on;
			   /*echo "<pre>";
			   print_r($chatvalue);
			   echo"</pre>";*/
			   
	    	?>
	   
		<div  class="chat_list <?php if(isset($_GET['serviceBookingId'])){if($_GET['serviceBookingId'] == $chatvalue->services_booking_id ){ echo "active"; }}else{}   ?>">
		  <div class="chat_people">
			<div class="chat_img">     
			<a class="active" href="<?php echo base_url('vendor-chat');?>/?serviceBookingId=<?php echo $chatvalue->services_booking_id;?>" class="name_letters" >
			    <img class="propic" src="<?php  if($image != ''){echo $image ;}else {echo base_url() . '/uploads/profile_images/no-image.jpg';}?>" alt="">
			<?php
			if($chatvalue->online_status == 1) { ?>
			<span class="online_icon"></span>  <?php } else { ?>
			<span style="background-color: #989898 !important;" class="online_icon"></span> <?php } ?>
			</div>
			<div class="chat_ib">
			  <h5><?php echo $chatvalue->user_name; ?><span class="chat_date"><?php 
                									$date=date_create($chatvalue->created_at);
                									echo date('H:iA',strtotime($chatvalue->services_booking_date));
                                                      //echo date_format($date,"H:i A");
                									?></span></h5>
			  <p><?php echo $chatvalue->serviceName; ?></p>
			</div></a>
		  </div>

		</div>
		
	 <?php } ?>
	  </div>
	</div>
	
	<div class="mesgs">
	    
	    <?php if(count($allchat)>0){  ?>
	    
	    <?php
	    
	    if(isset($_GET['serviceBookingId'])){

	     $serviceBookingId = $_GET['serviceBookingId'];
	    
	    foreach($allchat as $getData){
	       
	        $getUserId = $getData->userId;
	        $vendorId = $getData->clinicId;
	        $getserviceId = $getData->serviceId;
	        $getServiceBookingId = $getData->services_booking_id;
	        
	        if($getServiceBookingId == $serviceBookingId){
	            /*
	            echo "<pre>";
			   print_r($getData);
			   echo"</pre>";
	            */

             $confirmByClinic = $getData->confirmByClinic;
             $confirmByUser   = $getData->confirmByUser;
             
              if($confirmByClinic == '1' && $confirmByUser == '1'){
                ?>
      <div class="msg_history">
          
     <?php 
     
        /*echo "<pre>";
	    print_r($getChatMessages);
	    echo "</pre>";*/
     
         
     foreach($getChatMessages as $getIncomingMessage){
         
        
        $bookAppointmentIdChat = $getIncomingMessage->bookAppointmentId;
        
        if($serviceBookingId == $bookAppointmentIdChat){

        /*  echo "<pre>";
         print_r($getIncomingMessage);
         echo "</pre>"; */  
            
         $recevierId = $getIncomingMessage->recevierId;
       
         $senderId = $getIncomingMessage->senderId;
        
        
   
        if($senderId != $vendorId){
            
            foreach($allchat as $chatvalue){
          
                if($chatvalue->services_booking_id == $_GET['serviceBookingId']){
                    $userName = $chatvalue->user_name;
                    $usernameSDK = substr($userName,0,1);
                    
                    $words = explode(" ", $userName);
                    $acronym = "";
                    
                    foreach ($words as $w) {
                      $acronym .= $w[0];
                    }   
                    //echo $acronym;
					$online =$chatvalue->online_status ;
				//echo $online;
                }
				
            }
     ?>   
     
     
      <div class="incoming_msg">
		  <div class="incoming_msg_img">    
		  <a href="" class="name_letters" style="background: #5F7BC9;" id="chat" data-toggle="modal" data-target="#imagemodal"><?php
		  echo $acronym;
		  ?>			 
		  </a><?php if($online == 1) { ?> 
			<span class="online_icon"></span>  <?php } else { ?>
			<span style="background-color: #989898 !important;" class="online_icon"></span> <?php } ?>
		  </div>
		   <div class="chat_ib">
			  <h5><?php echo $userName; ?></h5>
			  
			</div>
		  <div class="received_msg">
		   <span class="time_date"> <?php 
									$date=date_create($getIncomingMessage->created_at);
                                    echo date_format($date,"M d, Y H:i A");
									?></span>
			<div class="received_withd_msg">
			  <p><?php echo  $getIncomingMessage->message; ?></p>
			 </div>
		  </div>
		</div>
     
   
     
		
		
		<?php
		   } else{

		?>
		
		  <div class="sendgoing_msg">
		  <div class="sent_msg"><span class="time_date"> <?php 
									$date=date_create($getIncomingMessage->created_at);
									$date1 = date_format($date,"Y-m-d H:i:s");
$D = new DateTime($date1, new DateTimeZone('UTC'));
$D->setTimeZone(new DateTimeZone('America/Vancouver'));
echo date_format($D,"M d, Y H:i A");
                                  //  echo date_format($date,"M d, Y H:i A");
									?></span>
			<p><?php echo  $getIncomingMessage->message; ?></p> 
			 </div> <div class="send_msg_img">    
			 <a href="" class="name_letters" style="background: #5F7BC9;" id="chat" data-toggle="modal" data-target="#imagemodal">
			      <?php 

                foreach($side as $value){
			         
			     $vendorName = $value->user_name;
			    // $name = $value1->user_name;
		$parts = explode(" ", $vendorName);
			if(count($parts) != '1'){
									
									$acronymvbendor = substr("$parts[0]", 0, 1);
									if($parts != ""){
									
									  	$rest1 = substr("$parts[1]", 0, 1);
									}
									else{
								  $rest1 =   substr($vendorName, 0,2);
									}
								//print_r($parts);
									//echo $parts[0];
									//echo $parts[1];
									}
									else {
									    
									    $rest1 =   substr($name, 0,2);
									    
									}	
			       }
			       echo $acronymvbendor; echo $rest1;
			     ?>				  </a> </div>
	</div>
     
	 <?php  
        }
        }
     }
	 
	 ?>
	  </div>
	  <div class="type_msg">
		<div class="input_msg_write">
          
          
            <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Appointment Request</h4>
                </div>
                <div class="modal-body">
                    
        <form action="<?php echo base_url('send_new_booking_by_vendor');?>" method="POST" >
		 <input type="hidden"  name="serviceBookingId" value="<?php echo $_GET['serviceBookingId']; ?>">
         <input type="hidden"  name="clinicId" value="<?php echo $getData->clinicId; ?>">
         <input type="hidden"  name="clinicName" value="<?php echo $value->user_name; ?>">
		  <input type="hidden" name="UserId" value="<?php echo $getData->userId; ?>">
		  
                  <select name="select_treatment">
                      <option  class="lt">Select a Treatment</option>
                      <?php foreach($GetVendorServices as $getServices){?>
                      <option  class="lt" value="<?php echo $getServices->servicesId;?>"><?php echo $getServices->serviceName;?></option>
                      <?php } ?>
                  </select>
                  <!--<div class="input-group date" data-date-format="dd.mm.yyyy">
            <input  type="text" class="form-control" placeholder="dd-mm-yyyy">
            <div class="input-group-addon" >
             <i class="fa fa-calendar"></i>
            </div>
          </div>-->
          
          <!--  <div class="sd-container">
                
          <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
    <input class="form-control" type="text" placeholder="mm-dd-yyyy" readonly />
    <span class="input-group-addon"><img class="clender-img2" src="<?php echo base_url(); ?>img/Group 11.png"></span>
</div>
             
              </div>
			  
			  <script>$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
		autoHide: true
        todayHighlight: true,
		 keepOpen: false,
  }).datepicker('update', new Date());
});
</script>


<input type="time" id="appt" name="appoint_time"
       min="09:00" max="18:00" required>
       <input placeholder="hh:mm:ss" name="appoint_time" class="form-control" type="text" onfocus="(this.type='time')" onblur="(this.type='text')" id="appt">
<div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control"/>
                    <span class="input-group-addon">
                         <img class="clock-img2" src="<?php echo base_url(); ?>img/ic_query_builder_24px.png">
                    </span>
                </div>
		<div class="sd-container">
 <input type='text' class="timepicker form-control " /></div>
  <input style=" background:hide; background: #f8fbff  url('img/Group 11.png');
	  background-repeat: no-repeat;
    background-position: 98% ;" type="date" id="birthday" name="birthday">-->


    <div class="sd-container">
                
          <div id="datepicker" class="input-group " data-date-format="mm-dd-yyyy">
    <input style="background: #f8fbff;border: 2px solid #e2e9f1 !important;border-radius: 4px;padding: 11px 0px;color: #9CB1C2 !important;width: 300px !important;font-size: 15px;margin: 10px auto; height: 50px; display: inline-block;min-height: auto;text-align: center;cursor: pointer !important; background: #f8fbff  url('img/Group 11.png');background-repeat: no-repeat;
    background-position: 98% ;" name="appoint_date" type="text" placeholder="mm-dd-yyyy" readonly  id="example1">
</div>
             
              </div>	<script>
$(document).ready(function () {
    $('#example1').datepicker({
        format: "dd/mm/yyyy",
        autoclose: true
    });

    //Alternativ way
    $('#example2').datepicker({
      format: "dd/mm/yyyy"
    }).on('change', function(){
        $('.datepicker').hide();
    });
});
</script>
  <div class="sd-container">
                
    <div id="datepicker" class="input-group" data-backdrop="false">
    <!--<input class="timepicker form-control" name="appoint_time"  placeholder="hh:mm:ss"   type="text" readonly >-->
    <input style="background: #f8fbff;border: 2px solid #e2e9f1 !important;border-radius: 4px;padding: 11px 0px;color: #9CB1C2 !important;width: 300px !important;font-size: 15px;margin: -1px auto; height: 50px; display: inline-block;min-height: auto;text-align: center;cursor: pointer !important; background: #f8fbff  url('img/ic_query_builder_24px.png');background-repeat: no-repeat;
    background-position: 98% ;" class="timepicker input-group-addon" name="appoint_time"  placeholder="hh:mm:ss" readonly   > <img  style="margin-left: 289px; margin-top: 42px;" class="clock-img2" ></input>
	</div>
             
   </div>
<script>   
	$(document).ready(function(){
       $('.timepicker').timepicker({
          timeFormat: 'h:mm p',
          //interval: 30,
           
          //startTime: '08:00',
         // dynamic: true,
          dropdown: true,
          scrollbar: true
	});
    });

</script>

 
       <button type="submit" class="btn btn-default">Send</button>
       </form>
                </div>
                <!--<div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>-->
              </div>
              
            </div>
          </div>
          
          <!--Modal end-->
		<form method="POST" id="message" action="<?php echo base_url('send_message'); ?>" data-parsley-validate="parsley" style="display: flex;">
		
    <a data-toggle="modal" data-target="#myModal"><i class='fas fa-calendar-alt' style="font-size:16px;color:#fff"></i>
	</a>
           <input type="text" class= "addrin" id="emojionearea1" name="SendMessage" placeholder="Type a message" data-parsley-error-message="Type a message" required>
			  
		  <input type="hidden" name="bookAppointmentId" value="<?php echo $getData->services_evelopg_id; ?>">
		  <input type="hidden"  name="service_id" value="<?php echo $getData->serviceId; ?>">
		  <input type="hidden" id="clinicSenderId" name="clinicSenderId" value="<?php echo $getData->clinicId; ?>">
		  
		  <input type="hidden" id="UserRecieverId" name="UserRecieverId" value="<?php echo $getData->userId; ?>">
		  <?php foreach($side as $value){
			       ?>
		  <input type="hidden"  name="clinicSenderName" value="<?php echo $value->user_name; ?>">
		  <?php } ?>
		  <input type="hidden"  name="UserRecieverName" value="<?php if(isset($userName)){echo $userName;} ?>">
		  <!--<button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>-->
		</form><script> 	/* $('#addrin').on('change',function(){
        var value = $(this).val();       
		alert(value);
		$( "#message" ).submit();
    });  */

</script>
		</div>
	  </div>
                
            <?php
              }else if($confirmByClinic == '0'){
                  
                  ?>
                  <div class="chat-pop">
                  <p class="comfrm_decline_text">
                  Hi <?php foreach($side as $value){
			             echo $value->user_name;
			       } ?>.I am sending you this request for an appointment with you regarding Your <?php echo $getData->serviceName; ?> service on <?php echo $getData->appointment_date; ?>. Please confirm.</p>
                  
                  <form method="POST" action="<?php echo base_url('accept_appointment'); ?>">
                    <input type="hidden" name="services_booking_id" value="<?php echo $getData->services_booking_id; ?>">
                    <input type="hidden" name="service_id" value="<?php echo $getData->serviceId; ?>">
                    <input type="hidden" name="UserId" value="<?php echo $getData->userId; ?>"> 
                    <button type="submit" style="background:green; color:white;">Accept</button>    
               </form>
               <form method="POST" action="<?php echo base_url('cancel_appointment'); ?>">
                    <input type="hidden" name="UserId" value="<?php echo $getData->userId; ?>"> 
                    <input type="hidden" name="services_booking_id" value="<?php echo $getData->services_booking_id; ?>">
                    <button type="submit" style="background:#ccc  !important; color:white;">Decline</button>    
               </form>
			   
			   </div>
            <?php      
              }else if($confirmByClinic == '1'){
                  
                  ?>
                  <h3 class="waiting-heading">Waiting from User side..... </h3>
             
             
             <?php }
   
    ?>
                
        <?php
         
	        }
	    }
	    
	    }else{}
	    
	    ?>
	    
	    <?php }else{
	    
	        echo "<h3 class='not_found_message'>No Message Found </h3>";
	    
	    }?>

	</div>
  </div>
</div>                     
          </div>
</div>
</div>	
                <?php 

                /*foreach($side as $value){
			         
			     $vendorName = $value->user_name;
			     
			       $words = explode(" ", $vendorName);
                    $acronymvbendor = "";
                    
                    foreach ($words as $w) {
                      $acronymvbendor .= $w[0];
                    }
			       }*/ 
				
			     ?>
				 <style>
				 .off_icon {
				 position: absolute;
    height: 10px;
    width: 10px;
    background-color: #989898 ;
    border-radius: 50%;
    bottom: 0;  
    left: 23px;
    border: 1.5px solid white;
				 }
}
				 </style>
				 <script> $('.input-group.date').datepicker({format: "dd-mm-yyyy"}); </script>
 <script>
 $("#myDIV.chat_list").on('click', '.chat_list ', function () {
    $("#myDIV .chat_list .active").removeClass("active");
    $(this).addClass("active");
});

        setInterval(function(){
            //$(document).ready(function() {
            let senderClinicId = document.getElementById("clinicSenderId").value;
            let UserRecieverId = document.getElementById("UserRecieverId").value;
            let base_url = "<?php echo base_url(); ?>";
            let ServiceBookingId = "<?php echo $_GET['serviceBookingId']; ?>";
            let data = new FormData();
			
			
			
			
            data.append('ServiceBookingId', ServiceBookingId);
                  $.ajax({
                          type: "POST",
                          url: base_url+"get_new_chat_messages",
                          data:data,
                          cache: false,
                          contentType: false,
                          processData: false,
                          success: function(data) {
                           let getData = JSON.parse(data);
                           console.log(getData);
                           var markup ="";
                           for(i=0; getData.length>0; i++){
                     
                             let bookAppointmentId = getData[i].bookAppointmentId;  
                             let senderId = getData[i].senderId; 
                             
                              
                              /*let str = getData[i].senderName;
                              let res = str.substr(0, 1);*/
                              
                             ///if(bookAppointmentId==ServiceBookingId){
                               
                                 if(senderClinicId != senderId){

									
                                      let str = <?php echo $acronym; ?>;

                                     let fullName = <?php echo $userName; ?>;
                              
                                      
                                    //var d = new Date(getData[i].created_at);
                                   // var d = new Date('2015-05-20 10:00:00 UTC');
								    var d = new Date(getData[i].created_at+' UTC');
                                    var hours = new Date(getData[i].created_at).getHours();
                                        var hours = (hours+24-2)%24; 
                                        var mid=' AM';
                                        if(hours==0){ //At 00 hours we need to show 12 am
                                        hours=12;
                                        }
                                        else if(hours>12)
                                        {
                                        hours=hours%12;
                                        mid=' PM';
                                        }
										                                     
									 let onicon = '<?php echo $online; ?>';
                                    console.log('check activity',onicon);
										if(onicon == '1'){
										
										$('#on').addClass('online_icon');
										
										}else{
												$('#on').addClass('off_icon');
										}
                                    
                                    markup += "<div class='incoming_msg'><div class='incoming_msg_img'><a href='' class='name_letters' style='background: #5F7BC9;' id='chat' data-toggle='modal' data-target='#imagemodal'>"+str+"</a><span id='on'></span></div><div class='chat_ib'><h5>"+fullName+"</h5></div><div class='received_msg'><span class='time_date'>"+d.getHours()+':'+d.getMinutes()+mid+"</span><div class='received_withd_msg'><p>"+getData[i].message+"</p></div></div>";
                                     
                                 }else{
                                       
                                      var vendorName = '<?php echo $acronymvbendor; echo $rest1; ?>'; 
                                      //var d = new Date(getData[i].created_at);
									  var d = new Date(getData[i].created_at+' UTC');
                                        var hours = new Date(getData[i].created_at).getHours();
                                        var hours = (hours+24-2)%24; 
                                        var mid=' AM';
                                        if(hours==0){ //At 00 hours we need to show 12 am
                                        hours=12;
                                        }
                                        else if(hours>12)
                                        {
                                        hours=hours%12;
                                        mid=' PM';
                                        }
                                        
                                        
                                      markup += "<div class='sendgoing_msg'><div class='sent_msg'><span class='time_date'> "+d.getHours()+':'+d.getMinutes()+ mid+"</span><p>"+getData[i].message+"</p></div> <div class='send_msg_img'><a href='' class='name_letters' style='background: #5F7BC9;' id='chat' data-toggle='modal' data-target='#imagemodal'>"+vendorName+"</a></div></div>"
                                 }
                                 
                                 DataBody = $(".msg_history");
                                 DataBody.html(markup); /* */
                             
                             }
                               
                          // }
                           
                          }
                          });
            }, 2000);
            //});
            
            $(document).ready(function() {
            	$("#emojionearea1").emojioneArea({
              
            		pickerPosition: "right",
                	tonesStyle: "bullet",
            		events: {
                     	keyup: function (editor, event) {
                       		console.log(editor.html());
                       		console.log(this.getText());
                    	}
                	}
            	});
            });
            
            
            $('#emojionearea1').on('change',function(){
                var value = $(this).val();       
        		//alert(value);
        		$( "#message" ).submit();
            });
            
</script>
