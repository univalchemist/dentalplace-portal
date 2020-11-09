  <style>
      
      .col-md-12.recod h3 {
    background: #27afa2;
    color: #fff;
    width: 50%;
    padding: 10px 0px;
    border-radius: 5px;
    font-size: 16px;
}
.vendor-texts1 h3 {
    width: auto !important;
    padding: 10px 20px !important;
    margin-left: 10px;
    text-decoration: none;
}
.col-md-12.recod.vendor-texts1 {
        padding-left: 0px;
   }

  </style>
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
                        <h2><img src="img/category1111.png">Category</h2>
						<a  href="" data-toggle="modal" data-target="#myModal<?php //echo $value1->id ;?>"><h3><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Add New Service</h3></a>
                     </div>
                     
                     </div>
                 
                  <!-- ---------Profile Card---HTML----Start-->
                
				  <section id="tabs">
		<div class="row ">
			<div class="col-md-12 ">
			<div class="nav-tab category">
			<div class="row ">
			

				</div></div>
				<br>
	<!---------------------------Add Service Modal---------------------------------------->
<div class="row ">
	<div class="col-md-12 recod vendor-texts1">  			
		
		
	</div>
				 
	<div class="modal fade" id="myModal<?php //echo $value1->id; ?>" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content cate">
		<div class="rest_bttn">
		   <form method="post" action="">
			<br>
			<input type="text" class="form-control serv" name="serv" id="first_name"  placeholder="Enter New Service"  maxlength="40" required>
			<br>
			<input type="submit" value="Submit" name="Sub" class="btn">
		</form>
		</div>
		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
    </div>
    </div>
	</div>

<!------------------------End---------------------------------------------->
<!------------------------Service---------------------------------------------->
	
			<div class="col-md-12 ">
			  <table class="table">
    <thead>
      <tr class="boder_sec">
        <th>Sr. No.</th>
        <th>Dental Services</th>
        <th>Edit Service</th>
		<th>Delete Service</th>
      </tr>
    </thead>
    <tbody>
	<?php
		$count=0;
		foreach($cat as $data){
		 $count=$count+1;?>
	<tr>
		<td class="tabl_img"> <?php echo $count; ?> </td>
		<td><?php echo $data->title;  ?> </td>
		<td><a  href="" data-toggle="modal" data-target="#editModal<?php echo $data->id ;?>">Edit</a></td>
		<td><a href="<?php echo base_url('Admin/deleteSer/' . $data->id); ?>" onClick="return doconfirm();">DELETE</a></td>

	</tr>
      <?php } ?>
    </tbody>
</table>	 
 </div>  
 </div>
<!------------------------End---------------------------------------------->
<!------------------------Edit modal---------------------------------------------->
<?php
foreach($cat as $data){
?>
	<div class="modal fade" id="editModal<?php echo $data->id; ?>" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content cate">
		<div class="rest_bttn">
		   <form method="post" action="">
			<br>
<input type="text" class="form-control serv" value="<?php echo $data->title; ?>" name="editden" id="first_name"  maxlength="40" required ><br>
			<input type="hidden" name="ids" value="<?php echo $data->id ;?>">
			<input type="submit" value="Submit" name="editSer" class="btn">
		</form>
		</div>
		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
    </div>
    </div>
	</div>
<?php } ?>
	<!------------------------End---------------------------------------------->
</div>
	</div>
	</Section>
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