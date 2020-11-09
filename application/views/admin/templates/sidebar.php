<div class="row">
      <div class="col-md-12">    
         <nav class="navbar navbar-expand-xs bg-dark navbar-dark">
            <!-- Brand -->
            <a class="navbar-brand" href="#"><img src="<?php echo base_url();?>img/Group139.png"></a>
            <!-- Toggler/collapsibe Button -->   
            <!-- Navbar links --> <span style="font-size:30px;color: #fff;cursor:pointer" onclick="openNav()">&#9776;</span>
         </nav>
		
      </div>    
</div>
   <!-- ------------Side Navbar----------Start -->
<div class="col-md-3">
    <div class="sidenav" id="sidenav" style="float:left;">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

	<div class="dental_place">  
		<img src="<?php echo base_url();?>img/Group137.png">
		<h1>Dental Place</h1>
		<p>Admin</p>
	</div>
        <ul class="side_nav" id="myDIV">
            <li class="sub_menu"> 
            <button class="side_button">     
			   <?php if($this->uri->segment(1) == 'admin-dashboard'){ 
						//echo $active = 'active'; 
						if($active = 'active')
						{
							?><img src="<?php echo base_url();?>img/user.png"><?php
						}	
					}
					else{
						?><img src="<?php echo base_url();?>img/ic_record_voice_over_-2.png"><?php
					}
				?> 
				<a class="<?php 
				if($this->uri->segment(1) == 'admin-dashboard'){
					echo $active = 'active';} ?> sidemenu" 
					href="<?php echo base_url('admin-dashboard')?>">
				Users</a>
			</button>	   
            </li>
              
            <li class="sub_menu ">
            <button class="side_button">
			<?php if($this->uri->segment(1) == 'vendor_dashboard'){ 
						if($active = 'active')
						{
							?><img src="<?php echo base_url();?>img/ic_store_-1.png"><?php
						}
						
					}
					else{
							?><img src="<?php echo base_url();?>img/ic_store_24px.png"><?php
						}
				?> 
				<!--<img src="img/ic_store_24px.png">-->
				<a class="<?php if($this->uri->segment(1) == 'vendor_dashboard'){ 
				echo $active = 'active'; } ?> sidemenu" href="<?php echo base_url('vendor_dashboard')?>">Vendors</a>
			</button>
            </li>
			
			<li class="sub_menu ">
            <button class="side_button">
                
               <!--<img src="img/ic_assignment_24px.png"><a href="<?php //echo base_url('admin-appointment')?>"> Appointments</a>
              -->
              
                
                	<?php if($this->uri->segment(1) == 'admin-appointment'){ 
						if($active = 'active')
						{
							?><img src="<?php echo base_url();?>img/ic_assignment_-1.png"><?php
						}
						
					}
					else{
							?><img src="<?php echo base_url();?>img/ic_assignment_24px.png"><?php
						}
				?> 
				<!--<img src="img/ic_store_24px.png">-->
				<a class="<?php if($this->uri->segment(1) == 'admin-appointment'){ 
				echo $active = 'active'; } ?> sidemenu" href="<?php echo base_url('admin-appointment')?>">Appointments</a>
                
                </button>
                </li>
                
                
			<li class="sub_menu ">
            <button class="side_button">
			<?php if($this->uri->segment(1) == 'push-notification'){ 
						//echo $active = 'active'; 
						if($active = 'active')
						{
							?><img src="<?php echo base_url();?>img/ic_add_alert_-1.png"><?php
						}	
					}
					else{
						?><img src="<?php echo base_url();?>img/ic_add_alert_24px.png"><?php
					}
				?> 
				<a class="<?php 
				if($this->uri->segment(1) == 'push-notification'){ 
					echo $active = 'active'; 
				} ?> sidemenu" href="<?php echo base_url('push-notification') ?>">Push Notification</a>
			</button>
            </li>
			<li class="sub_menu ">
            <button class="side_button">
			<?php if($this->uri->segment(1) == 'admin-category'){ 
						//echo $active = 'active'; 
						if($active = 'active')
						{
							?><img src="<?php echo base_url();?>img/categoryActive.jpeg"><?php
						}	
					}
					else{
						?><img src="<?php echo base_url();?>img/category.jpeg"><?php
					}
				?> 
				<a class="<?php 
				if($this->uri->segment(1) == 'admin-category'){ 
					echo $active = 'active'; 
				} ?> sidemenu" href="<?php echo base_url('admin-category') ?>">Category</a>
			</button>
            </li>
              
              
			<!--   </ul>
			<ul class="logout_nav" >-->
               <form action="<?php echo base_url();?>Admin/logout"    method="post">

               <li class="sub_menu active">
                  <button class="side_button" name="logout" style="font color:"> 
				 <img src="<?php echo base_url();?>img/ic_subdirectory_arrow_left_24px.png">Logout</button>
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