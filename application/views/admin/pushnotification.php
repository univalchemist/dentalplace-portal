  <body>
                  
   <div class="row" style="margin-left: 0px;margin-right: 0px;">
     
      <div class="col-md-12">
         
         <!----------Quick Link Section -----Start------->
        
         <!----------Quick Link Section -----End-------> 
         <!----------Tabs Section -----Start------->
         <div class="tab-main-sec Notification">
            <div class="row">
               <div class="col-md-12">
			   
                  <div class="row">  
                     <div class="col-md-12 recod">  
                        <h2><img src="<?php echo base_url();?>img/ic_add_alert_-2.png">Push Notification </h2>
						<div class="profile_bttn">
							  <a href="<?php echo base_url('compose');?>">Compose</a>
							  </div>
                     </div>
                     
                     </div>
                 
                  <!-- ---------Profile Card---HTML----Start-->
                
				  <section id="tabs">
		<div class="row ">
			<div class="col-md-12 ">
			<div class="nav-tab">
			<div class="row ">
			
			<div class="col-md-6">
				<nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Scheduled Notifications</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Past Notifications</a>
						
					</div>
				</nav>
				</div>
				<div class="col-md-6"></div>
				</div></div>
				<div class="tab-content" id="nav-tabContent">
	<!---------------------------Scheduled notifiaction_review---------------------------------------->
				<div class="tab-pane fade active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
				<?php 
				foreach($scheduled as $sech){
				?>
				<div class="notification_sec">
				<div class="via_bttn">
				<div class="bttn-group">

         	 <a class="nav-links" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			 <img class="user" id="clickst" src="img/ic_more_vert_24px.png"></a>
  <div class="dropdown-menu">
 <?php $eid = $sech->id;
//echo $eid; ?>
    <a class="dropdown-item"  href="<?php echo base_url() ?>edit-notification/<?php echo $eid;?>" id="edit">Edit</a>  
	
<form method="post">
		<input type="hidden" name="id" value="<?php echo $sech->id ;?>">
		<button name="liftban"><a class="dropdown-item">Cancel</a></button>
</form> 
  
<a style="color: #e9ecef!important;" class="dropdown-item delete-bttn" href="<?php echo base_url('Admin/deleteNot/' . $sech->id); ?>" onClick="return doconfirm();">Delete</a>
  </div></div></div>
				<div class="norif_text">
				<h5><?php echo $sech->title; ?></h5>
				<p><?php echo $sech->description; ?></p>
				</div>
				<div class="row">
				  <div class="col-md-6">
				  <div class="notifiaction_review">
				  
				<a href="#"><img src="<?php echo base_url();?>img/ic_create_24px.png"></a><?php echo date('F d, Y h:i A',strtotime($sech->creat_at)); ?><?php // echo $sech->creat_at; ?>

				  </div>
				  </div>
				  <div class="col-md-6">
			<div class="notifiaction_reviewss">
			<?php if($sech->status == '2') { ?>
			<span style="color:red">Cancelled</span>
			<?php }
			else{?> 
			<a href="" style="color:#0075AA !important;"><img src="<?php echo base_url();?>img/ic_send_24px.png"><?php echo date('F d, Y h:i A',strtotime($sech->schedule_on)); ?><?php //echo $sech->schedule_on; ?></strong></a>
			<?php } ?>
			</div>
				  </div>
				  </div>
				</div>
				<?php  }  ?>
				</div>
				
<!------------------------Past Notification----------------------->
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <?php 
				foreach($past as $pastt){
				?>
				<div class="notification_sec">
				<div class="via_bttn">
					 <div style="display:none" class="bttn-group">

         	<a class="nav-links" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			 <img class="user" id="clickst" src="img/ic_more_vert_24px.png"></a>
  <div class="dropdown-menu">
    <a class="dropdown-item"  href="#" id="edit">Edit</a>

<a class="dropdown-item" href="#">Cancel</a>
<a style="color: #e9ecef!important;" class="dropdown-item " href="<?php echo base_url('Admin/deleteNot/' . $pastt->id); ?>" onClick="return doconfirm();">Delete</a>
  </div></div></div>
				<div class="norif_text">
				<h5><?php echo $pastt->title; ?></h5>
				<p><?php echo $pastt->description; ?></p>
				</div>
				<div class="row">
				  <div class="col-md-6">
				  <div class="notifiaction_review">
				  
				<a href="#"><img src="<?php echo base_url();?>img/ic_create_24px.png"></a><?php echo date('F d, Y h:i A',strtotime($pastt->creat_at)); ?><?php //echo $pastt->creat_at; ?>

				  </div>
				  </div>
				  <div class="col-md-6">
			<div class="notifiaction_reviewss">
			<a href="#"><img src="<?php echo base_url();?>img/ic_send_24px.png"></a><?php echo date('F d, Y h:i A',strtotime($pastt->schedule_on)); ?><?php //echo $pastt->schedule_on; ?>
			</div>
				  </div>
				  </div>
				</div>
				<?php } ?>
			    </div>			
			</div>
		</div>
	</div>
	</Section>
                  <!-- ---------Profile Card---HTML----End-->
               </div>
            </div>
         </div>
      </div>
   </div>
   <script>
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}
</script>