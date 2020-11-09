<div class="row">
      <div class="col-md-12">    
         <nav class="navbar navbar-expand-xs bg-dark navbar-dark">
            <!-- Brand -->
            <a class="navbar-brand" href="#"><img src="<?php echo base_url(); ?>img/Group139.png"></a>
            <!-- Toggler/collapsibe Button -->   
            <!-- Navbar links --> <span style="font-size:30px;color: #fff;cursor:pointer" onclick="openNav()">&#9776;</span>
         </nav>
		
      </div>    
</div>
   <!-- ------------Side Navbar----------Start -->
<div class="col-md-3 appointment-side">
    <div class="sidenav" id="sidenav" style="float:left;">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

	<div class="dental_place">  
	<?php 

	foreach($side as $value){
			$name = $value->user_name;
			$parts = explode(" ", $name);
			//$rest = substr("$parts[0]", 0, 1);
			//$rest1 = substr("$parts[1]", 0, 1);
				
		?>
	<a href="" class="name_letters" style="background: #5F7BC9;" id="pop12"  ><img class="propic" src=" <?php  if($value->profile_image != ''){echo $value->profile_image;}else {echo "uploads/profile_images/no-image.jpg";}?>"  alt=""> </a>
	
	<?php } ?>
		<h1><?php foreach($side as $value){ echo $value->user_name; } ?></h1>
		
		<div class="review_section">
			  <div class="rating">
								  <p><?php
								  $CI =& get_instance();
                                  $res = $CI->VendorModel->review($value->id);
                                  //print_r($res);
								  
								  
								  echo "<lebal style='font-size: 17px;top: 1px;position: relative'>".$res[0] ->rate."</lebal>";			 // echo $value->star_rate ;
								 
								 if($res[0] ->rate == 0) {?></p>
								    <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
								 
    							<?php } elseif($res[0] ->rate == "") { ?>
    							    <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        
    						    <?php } elseif($res[0] ->rate == 1) { ?>
    						        <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        
    						    <?php } elseif($res[0] ->rate >= 1.1 && $res[0] ->rate <= 1.9 ) { ?>
    						        <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star_half_24px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">

								<?php } elseif($res[0] ->rate == 2) { ?>
									<img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									<img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									<img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        
								<?php } elseif($res[0] ->rate >= 2.1 && $res[0] ->rate <= 2.9 ) { ?>
    						        <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star_half_24px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
    						        
								<?php } elseif($res[0] ->rate == 3) { ?>
									<img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									<img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									<img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									<img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
									<img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
									
								<?php } elseif($res[0] ->rate >= 3.1 && $res[0] ->rate <= 3.9 ) { ?>
    						        <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star_half_24px.png">
    						        <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
								<?php } elseif($res[0] ->rate == 4) { ?> 
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									 <img src="<?php echo base_url(); ?>img/ic_star__white_124px.png">
									 
								<?php } if($res[0] ->rate >= 4.1 && $res[0] ->rate <= 4.9 ) { ?> 
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									 <img src="<?php echo base_url(); ?>img/ic_star_half_24px.png">
									 
								<?php } elseif($res[0] ->rate == 5) { ?>
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									 <img src="<?php echo base_url(); ?>img/ic_star_24px.png">
									   
								<?php } ?>
								  </div>
							  <div class="review">
								  <span>(<?php echo $res[0] ->total; ?> reviews)</span>
								   </div>
                               </div>
	</div>
        <ul class="side_nav" id="myDIV">
           
              
            <li class="sub_menu ">
            <button class="side_button">
			<?php if($this->uri->segment(1) == 'vendor-appointment'){ 
						if($active = 'active')
						{
							?><img src="<?php echo base_url(); ?>img/ic_assignment_-1.png"><?php
						}
						
					}
					else{
							?><img src="<?php echo base_url(); ?>img/ic_assignment_24px.png"><?php
						}
				?> 
				<!--<img src="img/ic_store_24px.png">-->
				<a class="<?php if($this->uri->segment(1) == 'vendor-appointment'){ 
				echo $active = 'active'; } ?> sidemenu" href="<?php echo base_url('vendor-appointment')?>">Appointments</a>
			</button>
            </li>
			
			<li class="sub_menu ">
			    <?php
			/*echo "<pre>";
			print_r($service);
			echo "</pre>";*/
			
//			if(count($service)>0){
//
//			?>
<!--            <button class="side_button"><img src="--><?php //echo base_url(); ?><!--img/chat-icon.png"><a href="--><?php //echo base_url('vendor-chat') ?><!--?serviceBookingId=--><?php //echo $service[0]->id;?><!--"> Chat</a></button>-->
<!--               -->
<!--               --><?php //} else{?>
            <button class="side_button"><img src="<?php echo base_url(); ?>img/chat-icon.png"><a href="<?php echo base_url('vendor-chat') ?>"> Chat</a></button>
<!--               --><?php //} ?>
                </li>
                
			
<li class="sub_menu ">
            <button class="side_button">
			<?php if($this->uri->segment(1) == 'vendor-profile'){ 
						if($active = 'active')
						{
							?><img src="<?php echo base_url(); ?>img/profile-1.png"><?php
						}
						
					}
					else{
							?><img src="<?php echo base_url(); ?>img/profile.png"><?php
						}
				?><a class="<?php if($this->uri->segment(1) == 'vendor-profile'){ 
				echo $active = 'active'; } ?> sidemenu" href="<?php echo base_url('vendor-profile')?>"> My profile</a></button>
                </li>
              
			<!--   </ul>
			<ul class="logout_nav" >-->
               <form action="<?php echo base_url();?>Vendor_Controller/logout"    method="post">

               <li class="sub_menu active">
                  <button class="side_button" name="logout" style="font color:"> 
				 <img src="<?php echo base_url(); ?>img/ic_subdirectory_arrow_left_24px.png">Logout</button>
               </li>
			   
			   </form>
        </ul>
    </div>
</div>
	  
	  <script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("sub_menu");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
<script>
function openNav() {
  document.getElementById("sidenav").style.width = "280px";
  document.getElementById("user-sec").style.marginLeft = "280px";
}

function closeNav() {
  document.getElementById("sidenav").style.width = "0";
  document.getElementById("user-sec").style.marginLeft= "0";
}
</script>
      <!-- ------------Side Navbar----------end -->
