<!--<script src="jquery-3.4.1.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<style>tr.boder_sec{
         cursor: pointer;
         }
        </style>
<?php if(isset($_POST['searchfil'])){?>
<style>
    .noHover{
    pointer-events: none;
} 
</style>                
     
<?php } ?>         
			<div class="row" style="margin-left: 0px;margin-right: 0px;">

      <div class="col-md-12"> 
         
         <!----------Quick Link Section -----Start------->
        
         <!----------Quick Link Section -----End-------> 
         <!----------Tabs Section -----Start------->
         <div class="tab-main-sec vendor_sec new-vendor vendors-appointments">
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
               <div class="col-md-12">    
                  <div class="row">
                     <div class="col-md-6 recod">
                        <h2><img src="img/ic_assignment_-2.png">Appointments</h2>
                     </div>
                     <div class="col-md-6">
                         <form class="card card-sm" action="<?php echo base_url('vendor-appointment'); ?>" method="post">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                       <!--<i class="fas fa-search h4 text-body"></i>-->
										 <img src="img/ic_zoom_out_24px.png">
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
                                        <input id="tab" type="hidden" name="tab" value="1">
<input style="float: left;"  class="form-control form-control-lg form-control-borderless noHover" name="searchfil" type="search" value="<?php if(isset($_POST['searchfil'])){echo $_POST['searchfil'];}?>" placeholder="Search User or Appointment...   ">
<?php if(isset($_POST['searchfil'])){ ?> 
	 <input type="button" value="Reset" onClick="location.href=location.href" style="position: absolute;right: 0px;float: right; width: 45px;height: 18px;background-color: white;color: #597b9e;font-size: 12px;">
	 <?php } ?>
                                    </div>
                                 
                                    <!--end of col-->
                                </div>
                            </form>
                     </div>
                     
                  </div>
				                   
                  <!-- ---------Profile Card---HTML----Start-->
                				  				  
				  <section id="tabs">
		<div class="row ">
			<div class="col-md-12 ">
			<div class="nav-tab">
			<div class="row ">
			
			<div class="col-md-5">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link <?php if($TabValue=='1' || $TabValue == ''){ echo "active"; }?>" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Current/Pending</a>
						<a class="nav-item nav-link <?php if($TabValue=='0'){ echo "active"; }?>" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Past Appointments</a>
						
					</div>
				</nav>
				</div>
				</div></div>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
				<div class="tab-pane fade <?php if($TabValue == '1' || $TabValue == ''){echo "active";}else {echo "fade";}?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				<div class="fillter_sec">
				<div class="row">
				  <div class="col-md-6">
				  <div class="filters">
				  
	<section>
		<div class="fillter_img">
		<img src="img/Path 140.png">
		<span>Filter:</span>
		</div>
		
	</section> 


<form id="myForm" action="" method="post">
	<?php
	
	 foreach($current as $row){
	 $data[]= $row->source;	
	} 
	 ?>
 <!--<label class="radio-inline" style="color: #597b9e;">
 <input data-email="a" class="sub_form" name="filter" type="radio" value="a" checked />All</label>
 
 <label class="radio-inline" style="color: #597b9e;">
 <input data-email="e" class="sub_form" name="filter" type="radio" value="c" <?php// if((in_array ('e',$data))&& count($data) == 2){ echo "checked"; } ?>>Confirmed</label>

 <label class="radio-inline" style="color: #597b9e;">  
 <input data-email="f" type="radio" class="sub_form" name="filter" value="p" <?php// if((in_array ('f',$data)) && count($data) == 2){ echo "checked"; }?> >Pending</label>
 -->
 
 <label class="radio-inline containers" style="color: #597b9e;">All
 <input data-email="a" class="sub_form" name="filter" type="radio" value="a" checked />   
 <span class="checkr"></span>
</label>
 <label class="radio-inline containers" style="color: #597b9e;">Confirmed
  <input data-email="e" type="radio" class="sub_form" name="filter" value="c" <?php if(isset($_POST['filter'])){if($_POST['filter']=='c'){ echo "checked"; } }?> >    
  <span class="checkr"></span>
</label> 
<label class="radio-inline containers" style="color: #597b9e;">Pending
 <input data-email="f" type="radio" class="sub_form" name="filter" value="p" <?php if(isset($_POST['filter'])){if($_POST['filter']=='p'){ echo "checked"; } }?> >     
 <span class="checkr"></span>
</label> 
 </form> 
		
	</div>
	</div>
			<div class="col-md-6">

<form id="submitForm" action="<?php echo base_url('vendor-appointment'); ?>" method="post">
		<div class="sort_sec">
		<label for="cars">Sort by:</label>
		<!--	<select id="mySelect" name="sort">
			  <option value="o" >Old to New</option>
			  <option value="n" >New to Old</option>
			</select> 
			-->
			<select id="mySelect" name="sort">
			  <option value="o" <?php if(isset($_POST['sort'])){if($_POST['sort']=='o'){ echo "selected"; } }?>>Old to New</option>
			  <option value="n" <?php if(isset($_POST['sort'])){if($_POST['sort']=='n'){ echo "selected"; } }?>>New to Old</option>
			</select> 
		</div>  
</form>
</div>
				  </div>
				  
				  </div>
				<div class="profile-card">
                     <div class="row">
					 <?php
					 if(empty($current)){ echo "<h2 style='margin: 100px 200px;color:#597b9e'>&nbsp;&nbsp;&nbsp;&nbsp;Appointment not found.</h2>";}
					 
					 foreach($current as $value){
					     
					     /*echo "<pre>";
					     print_r($value);
					     echo "</pre>";*/
					     		 
					 ?>
					       <!------------------Reset Modal content------------------------------>
			        	<div class="col-md-3">
                           <div id="cards" class="card" >

                              <div class="card-sec">
							  <div class="open_sec">
						
							  <p><?php echo $value->serviceName ;?></p>
							  <span style="color:#000000;" ><?php echo date('M d, Y',strtotime($value->appointment_date)); ?></span>
							  <p style="color:#34b9a6;"><?php echo $value->time ;?></p>
							  </div>
							  						   
						   <div class="via_bttn">
						   	<?php 
								if($value->confirmByClinic == 1 && $value->confirmByUser == 1 ){					
									echo "<a  href='' class=''style='background: #39b2db;'>Confirmed</a>";				
								}
								else{
									echo "<a  href='' class=''style='background: #c0d5e6;'>Pending</a>";					
								} 
							?>
						  </div>
					
							  <div class="card_img">
							<?php
									$name = $value->user_name;
									$rest =   substr($name, 0,1);
									
									$name1 = $value->last_name;
									$rest1 =   substr($name1, 0,1);
							?>
					  
							    <a href="" class="name_letters" style="background: #5F7BC9; margin-top: 12px !important;" id="pop12" data-toggle="modal" data-target="#imagemodal<?php //echo $value->id;?>"><?php echo $rest; echo $rest1; ?>
							  </a>
							  </div>
							  <div class="card-sub">
                                 <h1><?php echo $value->user_name;?> <?php echo $value->last_name;?></h1>
								 <a href=""><?php echo $value->city ; echo ",";  echo $value->country ;?></a>
                                 
                              </div>
							   
							  
							  <div class="profile_bttn">
							<a  href="" data-toggle="modal" data-target="#myModal<?php echo $value->services_booking_id ;?>">Send a Message</a>
							  </div>
							  <div class="profile_bttn cancel">
								  <a onclick="cancelBooking(<?php echo $value->services_booking_id ;?>, '<?php echo $value->full_name;?>')">Cancel Appointment</a>
								  <i class="fas fa-spinner" id="cancelLoader"></i>
							  </div>
                              </div>
                             
                           </div>
                        </div>
	<div class="modal fade appo-activ-pop vendrspop <?php if($TabValue == '0' || $TabValue == ''){echo "active";}else {echo "fade";}?>" id="myModal<?php echo $value->services_booking_id; ?>" role="dialog">
    <div class="modal-dialog">
    
      <div class="modal-content">
        <div class="modal-body">
		<button style="font-size: 32px!important;" type="button" class="close" data-dismiss="modal">×</button>
		<?php 
	        $name = $value->user_name;
	        $UserId = $value->id;
	        $service_id = $value->serviceId ;
			
			$gender = $value->gender;
				$name = $value->user_name;
									$rest =   substr($name, 0,1);
									
									$name1 = $value->last_name;
									$rest1 =   substr($name1, 0,1);
		?>
		 <p style="border-bottom: 1px solid #d8d5d5;"><a href="" class="name_letters" style="margin-left: -22px !important; background: #5F7BC9;" id="pop12"  ><?php echo $rest;  ?><?php echo $rest1;  ?></a>
        <span class="heding-popup"> <?php echo $value->user_name; ?> <?php echo $value->last_name; ?></span></p>
          <p style="border-bottom: 1px solid #d8d5d5;"><img style="margin-left: -21px; margin-bottom: 2px;" src="img/black vendoric_email_24px.png">	<span><?php echo $value->user_email; ?></span></p>
          <p style="border-bottom: 1px solid #d8d5d5;"><img style="margin-left: -22px; margin-bottom: 4px;" src="img/phone.png">	 <span  style="margin-left: 2px;">	 <?php echo $value->contact; ?></span></p> 
          <p style="border-bottom: 1px solid #d8d5d5;"><img style="margin-left: -21px;" src="img/ic_place_24px.png">	    <span style="margin-left: 5px;"><?php echo $value->address; ?></span></p>
          <p style="border-bottom: 1px solid #d8d5d5;">
              <?php if($gender=='Male'){?> 
              <img style="margin-left: -21px;" style="margin-bottom: 2px;" src="img/Path 143.png">
              <?php }else{?>
              <i class="fa fa-venus" aria-hidden="true" style="margin-bottom: 2px; font-size: 20px; color: black;"></i>
              <?php } ?>
              <span>	<?php echo $value->gender; ?>
              
              </span></p>
          <p style="border-bottom: 1px solid #d8d5d5;"><img style="margin-left: -21px;" style="margin-bottom: 3px;" src="img/ic_cake_24px.png">	<span style="margin-left: 3px;"> 	<?php echo $value->dob;?></span></p>
        </div>
		
		<div class="rest_bttn">
			<!--<form method="post">
			<input type="hidden" name="vendor_id" value="<?php echo $value->id ;?>">
			<input type="submit" value="Send a Message" name="vendor_resetpassword" class="btn">
			</form>-->
			<?php
			           /*  echo "<pre>";
					     print_r($value);
					     echo "</pre>";*/
			?>
			<a href="<?php echo base_url('vendor-chat/?serviceBookingId='.$value->services_booking_id); ?>" class="btn new_send">Send a Message</a>
		</div>
		<div class="modal-footer">
        </div>
    </div>
  </div>						
  </div>						
					 <?php } ?>

                     </div>
                  </div>
					
                  </div>
				  
<!--------------------------------------Past------------------------------------------>
					<div class="tab-pane <?php if($TabValue=='0'){ echo "active"; } else { echo "fade";}?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<?php  if(empty($past)){ echo "<h2 style='margin: 100px 200px;color:#597b9e'>&nbsp;&nbsp;&nbsp;&nbsp;Appointment not found.</h2>";}  else {?>
                 <table class="table">
      <tr class="boder_sec">
        <th  id="user">Type of Appointment<img src="img/Group 188.png"></th>
		<th id="sign">Name of Customer<img src="img/Group 188.png"></th>
        <th id="date">Date/Time<img src="img/Group 188.png"></th>
        <th id="ban" >Status<img src="img/Group 188.png"></th>
		<th class="text-dates">Note</th>
      </tr> 
    
    <tbody>
	 
	<?php 
					}
		foreach($past as $value1){
			/* echo '<pre>';
		    print_r($past);
			echo '</pre>';
		 */
	?> 
  
	<tr>
        	<?php  
			$name = $value1->user_name;
			$parts = explode(" ", $name);
			$rest = substr("$parts[0]", 0, 1);
			$rest1 = substr("$value1->last_name", 0, 1);
			?>  
		<td><p style="margin-top: 15px;"> <?php echo  $value1->serviceName; ?></p></td>
		<td class="tabl_img">
			<a class="name_letters" id="pop123" style="background: #5F7BC9;"><?php echo $rest; echo $rest1; ?></a><span><?php echo $value1->user_name; ?> <?php echo $value1->last_name; ?></span></td> 
        <!--<td class="text-dates">Feb 02,2020 / 10:00 AM</td>-->
        <td class="text-dates"><?php echo date('M d, Y',strtotime($value1->appointment_date));?>  / <?php echo $value1->time; ?></td>
		<?php if($value1->bookingsource == 'c'){					
					echo "<td class='facebook_bbtn text-dates'><a   class='btttn_sec1email' style='background: #39B2DB;'>Completed</a></td>";	
				   
					}
					else {
					echo "<td class='facebook_bbtn text-dates'><a  class='btttn_sec1email' style='background: #c0d5e6;'>Cancelled</a></td>";					
					} ?>
		<td class="action text-dates">
		<?php
		
		$CI =& get_instance();
        $val = $CI->VendorModel->not($value1->id);
        
        //print_r($val);
		
		//die;
		
		
		if(isset($val[0]->note) && $val[0]->note !=''){ 
		    
		?>
		<a class="nav-links" href="#" data-toggle="modal" aria-haspopup="true" aria-expanded="false" data-target="#noteModal<?php echo $value1->id;?>"> <img class = "users"  src ="img/edit.png">
			</a>
		<?php } else{ ?>
		<a class="nav-links" href="#" data-toggle="modal" aria-haspopup="true" aria-expanded="false" data-target="#noteModal<?php echo $value1->id;?>"> <img class = "users"  src ="img/ic_assignment_-1.png">
			</a>
		<?php } ?>
         	
			    
		</td>
  </tr>
  <!-- Note Modal content-->
	<?php  
			$name = $value1->user_name;
			$parts = explode(" ", $name);
			$rest = substr("$parts[0]", 0, 1);
			$rest1 = substr("$value1->last_name", 0, 1);
			?> 
	<div class="modal fade gernal-pop-up" id="noteModal<?php echo $value1->id; ?>" role="dialog">
    <div class="modal-dialog">
    
    
      <div class="modal-content">
        <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">×</button>
		 
          <h4 class="modal-title">General Checkup
		    <?php if($value1->bookingsource == 'c'){					
					echo "<span class='facebook_bbtn text-dates'><a   class='btttn_sec1email' style='background: #39b2db;'>Completed</a></span>";	
				   
					}
					else {
					echo "<span class='facebook_bbtn text-dates'><a class='btttn_sec1email' style='background: #c0d5e6;'>Cancelled</a></span>";					
					} ?>
		</h4>
		 <span> <?php echo date('M d, Y',strtotime($value1->appointment_date)); ?> / <?php echo $value1->time; ?></span>
		 <br>
		 <div class="not-img-pop">
      <a  class="name_letters" id="pop123" style="background: #5F7BC9;margin-top: 0px!important;"><?php echo $rest; echo $rest1; ?></a><span><?php echo $value1->user_name; ?> <?php echo $value1->last_name; ?></span></div>
	
	<hr>
	
	<div class="need_sec">
	<p> <span class="note-">Note:</span>
 
	<div id="Div1">
	<?php if(isset($val[0]->note) && $val[0]->note != '' ){?>
	<span style="display: block; background-color: #f8fbff;     border-radius: .45rem;"><?php echo $val[0]->note;  ?></span><?php } ?>
	</div>
	<div id="Div2"  >  
	<form action="<?php echo base_url('vendor-appointment'); ?>" method="post" id="myForm"> 
	<input type="hidden" name="noi" value="<?php echo $value1->id; ?>">
	<input id="valNew" type="hidden" name="tabVendorNote" value="1">
	
	<textarea class="mySelect form-control" name="note" style="height:250px;"><?php if(isset($val[0]->note)){ echo $val[0]->note;}?></textarea>
	<button class="btn btn-lg btn-success" type="submit" name="notsub"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
	
	</form>  
	</div>
	<div style="clear:both;"></div>
	</p>
		<div style="width: 197px!important;" class="rest_bttn">
			 <img height="14px"class = "users"  src ="<?php echo base_url('assets'); ?>/img/edit_white.png"><input style="font-size: 16px;" type="button" value="Edit Note" onclick="switchVisible();"/>
		</div>
		
				<!--<div id="img1"/>A</div>
					<div id="div1"/>C</div>
					<div id="div2"/>D</div>
					<script>
				 	$("#img1").on('click', function() {
					   $(this).hide();
					   $("#div2").hide();
					   $("#div1").show();
					});</script> -->
		</div>  
		
      </div>
      
    </div></div>	
  </div>	
				<!----------------end----------------->
  	<!-- Reset Modal content-->
	<div class="modal fade" id="myModal<?php echo $value1->id; ?>" role="dialog">
    <div class="modal-dialog">
    
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reset Password</h4>
		  <img src="img/Mask Group 1.png">
		  <h2><?php echo $value1->user_name; ?></h2>
        </div>
        <div class="modal-body">
          <p class="modl"><strong>Are you sure you want to<br>reset the user's password?</strong><br>Once confirmed,the user will be notified<br>and the password will be send to<br> <a href="mailto:<?php echo $value1->user_email;?>" target="_blank"><?php echo $value1->user_email;?></a> </p>
        </div>
		
		<div class="rest_bttn">
		   <form method="post" action="<?php //echo base_url('Admin/resetpass');?>">
			<input type="hidden" name="vendor_id" value="<?php echo $value1->id ;?>">
			<input type="submit" value="Reset Password" name="vendor_resetpassword" class="btn">
		</form>
		</div>
		<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>	
	
		<?php } ?>   
      <!--<tr>
        
		<td><p>General Filling</p></td>
		<th class="tabl_img"><img src="img/Mask Group 1.png">Test</th>
        <td class="text-dates">Feb 02,2020 / 10:00 AM</td>
		<td class="facebook_bbtn text-dates"><a  href='' class='btttn_sec1email' style='background: #39b2db;'>Completed</a></td>
		<td class="action text-dates">
         	<a class="nav-links" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			 <img class = "users"  src ="img/edit.png"></a>
  </td>
  </tr>-->
     </tbody>
  </table>			
		  
		  </div>
			</div>
		</div>
	</div>
                  <!-- ---------Profile Card---HTML----End-->
                  </div>              
            </div>
         </div>
      </div>
   </div>
</div>
<!-- container -->
<!------------------------------------modal on the click of image-------------------------------------------->
	          <?php
				foreach($current as $val){
 
               ?>
				
 <div class="modal right " id="imagemodal<?php echo $val->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" ><span aria-hidden="true"><img src="img/ic_more_vert_24px.png"></span></button>
					
					
					<h4 class="modal-title" id="myModalLabel2" class="close" data-dismiss="modal" aria-label="Close"><img src="img/ic_arrow_back_24px.png"></h4>
				</div>
			
				<div class="modal-body">
					<div class="aman_right_popup">
							<?php  
			$name = $val->user_name;
			$rest = substr("$name", 0, 2);
			//echo $rest;
			?>
		<!--<img src="img/Group 302.png">-->
		 <div class="card_img">
							  <?php if($val->source == 'e'){										
							  ?>							
							  <a href="" class="name_letters" style="background: #5F7BC9;" id="pop12" data-toggle="modal" data-target="#imagemodal<?php echo $val->id;?>"><?php echo $rest; ?>
							  </a>
							  <?php }
									else{?>
									
									<a href="" class="name_letters" style="background: #5FC97F;" id="pop12" data-toggle="modal" data-target="#imagemodal<?php echo $val->id;?>"><?php echo $rest; ?>
									</a>
										
								<?php } ?>
							  </div>
		<!--<img src="img/Group 302.png">-->
		<h2><?php echo $val->user_name;?></h2>
		<div class="review_section">
							  <div class="rating">
							  <p>4.5</p>
							  <img src="img/ic_star_24px.png">
							   <img src="img/ic_star_24px.png">
							    <img src="img/ic_star_24px.png">
								 <img src="img/ic_star_24px.png">
								  <img src="img/ic_star_half_24px.png">
							  </div>
							  <div class="review">
							  <span>(17 reviews)</span>
                               </div>
							   <a href="#" target="_blank">https://www.yelp.com/biz/wake-cup-san-francisco-2
</a> 
							   </div></div>
							   <div class="card-img-sec">
                                 <p><img src="img/ic_query_builder_24px.png"><span>Opening Hours</span><br>Mon-Fri 9:00 AM to 5:00 PM</p>
								 <p><img src="img/ic_place_-1.png"><span>Address</span><br>Studio 103 The  Business Centre 61 Wellfield Road <br>Roath Cardiff,United Kingdom</p>
 </div>
 
 <div class="service_sec">
 <h1>Services & Pricing</h1>
		
		<ul>
		<li><a href="#">General Checkup-<span>£50</span></a></li>
		<li><a href="#">General Checkup-<span>£50</span></a></li>
		<li><a href="#">General Checkup-<span>£50</span></a></li>
		<li><a href="#">General Checkup-<span>£50</span></a></li>
		<li><a href="#">General Checkup-<span>£50</span></a></li>
		<li><a href="#">General Checkup-<span>£50</span></a></li>
		<li><a href="#">General Checkup-<span>£50</span></a></li>
		<li><a href="#">General Checkup-<span>£50</span></a></li>
		<li><a href="#">General Checkup-<span>£50</span></a></li>
		<li><a href="#">General Checkup-<span>£50</span></a></li>
		<li><a href="#">General Checkup-<span>£50</span></a></li>
		<li><a href="#">General Checkup-<span>£50</span></a></li>
		</ul>		</div>

			</div>
				
			<!-- modal-content -->
		</div><!-- modal-dialog -->
	</div>
	</div>
	<?php } ?>
	
	<!--------------------------------end----------------------------------------------->
	
	
  
  
<!--------------------------------edit modal popup-------------------------------------------------->

  	 <?php foreach($current as $value){ ?>
	 
  <div class="modal right " id="imagemodales<?php echo $value->id;?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div id="editview" class="snippet">
				<div class="modal-header">
 					<h4 class="modal-title" id="myModalLabel2" class="close" data-dismiss="modal" aria-label="Close"><img src="img/ic_arrow_back_24px.png"></h4>

					<h1>Edit User Profile</h1>
					
									<button type="button" ><span aria-hidden="true"><img src="img/ic_more_vert_24px.png"></span></button>

				</div>
  		
		<div class="profile">
		<div class="col-md-2">
		<div class="profile_img">
		<a href="#">
		 <?php  
			$name = $value->user_name;
			$rest = substr("$name", 0, 2);
				//echo $rest;
			?>
		<!--<img title="profile image" class="img-circle img-responsive" src="img/Group141.png">-->
	
		<div class="card_img">
							  <?php if($value->source == 'e'){										
							  ?>							
							  <a href="" class="name_letters" style="background: #5F7BC9;" id="pop12" data-toggle="modal" data-target="#imagemodal<?php echo $value->id;?>"><?php echo $rest; ?>
							  </a>
							  <?php }
									else{?>
									
									<a href="" class="name_letters" style="background: #5FC97F;" id="pop12" data-toggle="modal" data-target="#imagemodal<?php echo $value->id;?>"><?php echo $rest; ?>
									</a>
										
								<?php } ?>
		 </div>
		
		
		<img class="img-circle img-responsivess" src="img/ic_camera_alt_24px.png"></a>
   </div>
   </div>
   <div class="col-md-10">
   <form class="form" action="#" method="post" id="registrationForm">
                      <div class="form-group">
                          
                          <div class="col-md-12">
							  <input type="hidden" name="id" value="<?php echo $value->id ;?>">
                              <label for="first_name"><h4>Name</h4></label>
                              <input type="text" class="form-control" name="user_name" id="first_name"  title="Enter your  name."  value="<?php echo $value->user_name; ?>">
                          </div>
                      </div>
                      <div class="form-group">
                          
                          <div class="col-md-12">
                              <label for="email"><h4><img src="img/ic_markunread_24px.png">Email</h4></label>
                              <input type="email" class="form-control" name="email" id="email"  title="Enter your email." value="<?php echo $value->user_email; ?>">
                          </div>
                      </div>
				</div></div>
  		
          <div class="tab-content">
            <div class="tab-pane active" id="home">
                <hr>
                     <div class="form-group">
                          
                          <div class="col-md-12 ">
                              <label for="text"><h4><img src="img/ic_place_-1.png">Address</h4></label>
                              <input type="text" class="form-control" id="location"  title="enter a location" value="<?php echo $value->address; ?>" name="add">
                              
								<input type="text" class="form-control email-input" id="location"  title="Enter a location" value="<?php echo $value->address1; ?>" name="address">

						  </div>
                      </div>
					
					  <div class="count_sec">
					  
					  <div class="form-group">
                          
                          <div class="col-md-6">
					  <div class="control-group">
                    <label class="control-label">Country</label>
                    <div class="controls">
                        <select id="country" name="country" class="input-xlarge" >
                            <option selected="selected"><?php echo $value->country ;?></option>
                            <option value="UK">United Kingdom</option>
                            <option value="AF">Afghanistan</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AQ">Antarctica</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia</option>
                            <option value="BA">Bosnia and Herzegowina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo, the Democratic Republic of the</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="CI">Cote d'Ivoire</option>
                            <option value="HR">Croatia (Hrvatska)</option>
                            <option value="CU">Cuba</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="TP">East Timor</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands (Malvinas)</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="FX">France, Metropolitan</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard and Mc Donald Islands</option>
                            <option value="VA">Holy See (Vatican City State)</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran (Islamic Republic of)</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KP">Korea, Democratic People's Republic of</option>
                            <option value="KR">Korea, Republic of</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao People's Democratic Republic</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libyan Arab Jamahiriya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macau</option>
                            <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia, Federated States of</option>
                            <option value="MD">Moldova, Republic of</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="AN">Netherlands Antilles</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RE">Reunion</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint LUCIA</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SK">Slovakia (Slovak Republic)</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SH">St. Helena</option>
                            <option value="PM">St. Pierre and Miquelon</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen Islands</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syrian Arab Republic</option>
                            <option value="TW">Taiwan, Province of China</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania, United Republic of</option>
                            <option value="TH">Thailand</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela</option>
                            <option value="VN">Viet Nam</option>
                            <option value="VG">Virgin Islands (British)</option>
                            <option value="VI">Virgin Islands (U.S.)</option>
                            <option value="WF">Wallis and Futuna Islands</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="YU">Yugoslavia</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                        </select>
                    </div>
                </div>
					 </div>
                      </div> 
					  
					  
					  
					  <div class="form-group">
                          
                          <div class="col-md-6">
					  <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                        <select id="country" name="city" class="input-xlarge">
                            <option selected="selected"><?php echo $value->city ;?></option>
                            <option>Cardiff</option>
                            <option>Mariehamn</option>
                            <option>Tirana</option>
                            <option>Sofia</option>
                            <option>Paris</option>
                            <option>Berlin</option>
                            <option>Rome</option>
                            <option>Dublin</option>
                            <option>Monaco</option>
                            <option>Oslo</option>
                            <option>Riga</option>
                            <option>Kiev</option>
                            <option>London</option>
                         </select>
                    </div>
                </div>
					 </div>
                      </div> 
					  </div> 
					  <div class="form-group">
                          <div class="col-md-6">
                             <label for="mobile"><h4>Zip Code</h4></label>
                              <input type="text" class="form-control" name="zip" id="mobile"  title="Enter your mobile number if any." value="<?php echo $value->zipcode ;?>">
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-md-12">
                             <label for="mobile"><h4><img src="img/ic_stay_current_portrait_-2.png">Phone Number</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile"  title="Enter your mobile number if any." value="<?php echo $value->contact ;?>">
                          </div>
                      </div>
					  <div class="form-group">
  <label class="col-md-12 control-label" for="Gender">Gender</label>
  <div class="col-md-12"> 
    <label class="radio-inline" for="Gender-0">
      <input type="radio" name="Gender" id="Gender-0" value="Male" <?php echo ($value->gender=='Male')?'checked':'' ?>>
      <img src="img/Path 141.png">Male
    </label> 
    <label class="radio-inline" for="Gender-1">
      <input type="radio" name="Gender" id="Gender-1" value="Female" <?php echo ($value->gender=='Female')?'checked':'' ?>>
     <img src="img/Group 309.png"> Female
    </label> 

  </div>
</div>
                      <div class="form-group">
                          
                          <div class="col-md-12">
                            <label for="Birthday"><h4><img src="img/ic_cake_-2.png">Birthday</h4></label>
                              <input type="Birthday" class="form-control" name="birthday" id="Birthday"  title="Birthday" value="<?php echo $value->dob ;?>">
                          </div>
                      </div>
                      <div class="form-group">
                           <div class="col-md-12">
                                
								<div class="save_bttn">
                               	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i>Cancel</button>
                                <button class="btn btn-lg btn-success" type="submit" name="edit"> <i class="glyphicon glyphicon-ok-sign"  ></i> Save Changes</button>
</div>
							</div>
                      </div>
              	</form>
              
            
              
             </div><!--/tab-pane-->
             <!--/tab-pane-->
             
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	
					 <?php } ?>
  
	
	
   <!----------Athletic-Profile-Modal--------Start---->
  
   <!----------Athletic-Profile-Modal--------End  cards---->
 <script>
 
  $(".sub_form").click(function(){
	var title = $(this).attr('data-email');
	 $( "#myForm" ).submit();
 });
 
  window.onload = function() {
    var selItem = sessionStorage.getItem("SelItem");

	  $('#cancelLoader').hide();

	if(selItem == null){
	// Store
	sessionStorage.setItem("SelItem", "old");		
    
	}
	else {
		
		
	}
    } 
     $('#mySelect').on('change',function(){
        var selectedValue = $(this).val();
		//alert(selectedValue);
		$( "#submitForm" ).submit();
    });  
/*	 window.onload = function() {
    var selItem = sessionStorage.getItem("SelItem");  
    $('#mySelect').val(selItem);
    }
    $('#mySelect').change(function() { 
        var selVal = $(this).val();
		//alert(selVal);
        sessionStorage.setItem("SelItem", selVal);
    }); */
	
 
  $(".user").click(function(){
     $("#cards").addClass("intro");
  });
  

  $(".bttn-group").click(function(){
     $("#cards").removeClass("intro");
  });
   $("#pop").on("click", function() {
   $('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
   $('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
 $("#edit").on("click", function() {
   $('#imagemodales').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
});
$('#nav-home-tab').click(function(){
	$('.active_sec').show();
	$('.inactive_sec').hide();
});

$('#nav-profile-tab').click(function(){
	$('.inactive_sec').show();
	$('.active_sec').hide();
});

$('#clickst').click(function(){
	$('.card.intro').css("border","1px solid #09cfbc"); 
});
</script>  
<script>
     var table = $('table');
    
    $('#user, #sign, #date, #ban')
        .wrapInner('<span title="sort this column"/>')
        .each(function(){
            
            var th = $(this),
                thIndex = th.index(),
                inverse = false;
            
            th.click(function(){
                
                table.find('td').filter(function(){
                    
                    return $(this).index() === thIndex;
                    
                }).sortElements(function(a, b){
                    
                    return $.text([a]) > $.text([b]) ?
                        inverse ? -1 : 1
                        : inverse ? 1 : -1;
                    
                }, function(){
                    
                    // parentNode is the element we want to move
                    return this.parentNode; 
                    
                });
                
                inverse = !inverse;    
                    
            });
                       
        });
</script> 
   <script>
 function switchVisible() {    
	alert('hi');   //  
            if (document.getElementById('Div1')) {

                if (document.getElementById('Div1').style.display == 'none') {
					
                    document.getElementById('Div1').style.display = 'block';
                    document.getElementById('Div2').style.display = 'none';
                }
                else {
                    document.getElementById('Div1').style.display = 'none';
                    document.getElementById('Div2').style.display = 'block';
                }
            } }  
       
            
            $(document).ready(function(){
            $('#nav-home-tab').click(function(){
            document.getElementById("tab").value = "1";
                $('#valNew').val('1');
            });

            $('#nav-profile-tab').click(function(){
                document.getElementById("tab").value = "0";
                $('#valNew').val('0');
            });
            
            });

 function cancelBooking(id, fullName) {
	 const cancelObj = {
		 "id": id,
		 "full_name": fullName
	 };

	 const baseURL = 'https://portal.dentalplace.app/nodejs'
	 // const baseURL = 'http://localhost:3000';
	 $('#cancelLoader').show();
	 $.post(`${baseURL}/api/cancelBookingByClinic`, cancelObj, (data, status) => {
		 if (status === 'success') {
			 location.reload();
		 }else{
			 console.log('Something wend wrong', data);
		 }
		 $('#cancelLoader').hide();
	 });
 }
			</script>
