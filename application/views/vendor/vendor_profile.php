<style>#Div10 {
    display: none;
}</style>    
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.min.css" rel="stylesheet"/>
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<!-- 		<script src="jquery-3.4.1.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<input type="text" id="example" />	
   <div class="row" style="margin-left: 0px;margin-right: 0px;">
     
      <div class="col-md-12">
         
         <!----------Quick Link Section -----Start------->
        
         <!----------Quick Link Section -----End-------> 
         <!----------Tabs Section -----Start------->
         <div class="tab-main-sec Notification main-sec-profile profiles ">
            <div class="row">
                
               <div class="col-md-12 recod">
			   
                  <div class="row">  
				  <?php 

	foreach($edit as $value){
			$name = $value->user_name;
			$parts = explode(" ", $name);
		//	$rest = substr("$parts[0]", 0, 1);
			//$rest1 = substr("$parts[1]", 0, 1);
				//echo $rest;
		?>
                     <div class="col-md-12 ">
					 <div class="row">  
					 <div class="col-md-6 name-sec">
			
<h2>
  <a href="" class="name_letters" style="background: #5F7BC9;" id="pop12"  ><img class="propic" src=" <?php  if($value->profile_image != ''){echo $value->profile_image;}else {echo "uploads/profile_images/no-image.jpg";}?>" alt=""></a><a  class ="camera-img" href="" data-toggle="modal" data-target="#picModal<?php echo $value->id;?>" ><img class="img-circle img-respons" src="img/ic_camera_alt_24px.png"></a>

	<div id="Div9">	 <?php echo $value->user_name; ?></div>	
	<span class="edit-values"><img src="img/ic_create_24px.png"><input  type="button" value="edit" onclick="uname();"/></span>
	<!---->
</h2>
	<div id="Div10"> 
	<form action="<?php echo base_url('vendor-profile'); ?>" method="post" id="fname"> 
	<button class="btn btn-lg btn-success" type="submit" name="ename"><i class="glyphicon glyphicon-ok-sign"></i>Save</button>
	<input style="width: 50%;" type="text" class="ename form-control" maxlength="30" name="name"   title="Enter your  name."  value="<?php echo $value->user_name; ?>">
	</form> 
	</div>
<!----------Upload pic modal----------->
		<div class="modal fade new-pop picModal" id="picModal<?php echo $value->id;?>" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content cate">
	<br>
	<span>Upload Profile Image</span>
		<?php //echo $error;?> 
  <?php echo form_open_multipart('vendor-profile');?> 
    <input type="hidden" name="id" value="<?php echo $value->id ;?>">
     <input type="file" name="image" class="first-edit" />
     <input type="submit" name="subpic" value="Upload" class="uplode-img" /> 
  </form> 
			
		
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
    </div>
    </div>
	</div>
	<!--------------end------------>
</div>
	<!--<div class="col-md-6">
		<div class="service_sec">
 		<ul >
		<li><a href="#"><img src="img/setting-icon.png">Go to Settings</a></li>
		</ul>
		</div>
                    </div>-->         
                    </div>         
                    
                  <!-- ---------Profile Card---HTML----Start-->
                
				  <section id="tabs">
		<div class="row ">
			<div class="col-md-12 ">
			<div class="nav-tab">
			</div>
			<?php if($this->session->flashdata('msg')){
        echo "<p class='alert alert-success' style='margin-top: 8px;margin-left: 29%;width: 21%;'>".$this->session->flashdata('msg')."</p>";
		} ?>
	<div class="tab-content" id="nav-tabContent">
	<div class="fillter_img inform-text">
		<span>Information</span> 
	</div>

	<div class="card-img-sec paro-sec-new" style="margin:0 0 0 8%;">
	<p><img src="img/ic_markunread_24px.png">
	<span>Email</span>
	<!--<span style="margin-left:50%; float: right; position: relative;">
	<img class="edit-images" src="img/ic_create_24px.png"><input type="button" value="edit" onclick="switchVisible();"/></span>--><br>
	
	<span id="Div1"><?php  echo $value->user_email; ?></span><br><br>
	
	<!--<form action="<?php //echo base_url('vendor-profile'); ?>" method="post" id="myForm"> 

	<input type="text" class="mySelect form-control"   name="user_email" id="Div2"    value=""  >
	</form>-->
	<?php } ?>
	</p>

	
	<p><img src="img/ic_place_-1.png">
	<span>Address</span>
	
	<span style="margin-left:50%;float: right; position: relative;">
	<img class="edit-images" src="img/ic_create_24px.png"><input  type="button" value="edit" onclick="Visible();"/></span><br>
	
	<span id="Div3" class="addres-sec">	<?php
	if($value->address !='' && $value->city !='' && $value->state !='' && $value->country !='' && $value->zipcode !='' ){
	foreach($edit as $value){ echo $value->address;
	?>, <?php echo $value->city;?>, <?php echo $value->state; ?>, <?php echo $value->country; ?>,  <?php echo $value->zipcode; }}?></span>
	<br>
	<div id="Div4">
	<form action="<?php echo base_url('vendor-profile'); ?>" method="post" id="add">
<button class="btn btn-lg btn-success" type="submit" name="subadd"><i class="glyphicon glyphicon-ok-sign"></i> Save</button><br><br>	
<?php  foreach($edit as $value){?>
	<input type="text" class="addrin form-control"  name="address"  
	 value="<?php echo $value->address; ?>">
	 
	 
	 						  <div class="count_sec">
						  
						  <div class="form-group">
							  
							  <div class="col-md-6 countery">
						  <div class="control-group">
						<label class="control-label">Country</label>
						<div class="controls">
							<select id="country" name="country" class="input-xlarge" required>
								<option selected="selected"><?php echo $value->country ;?></option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="Afghanistan">Afghanistan</option>
								<option value="Albania">Albania</option>
								<option value="Algeria">Algeria</option>
								<option value="American Samoa</">American Samoa</option>
								<option value="Andorra">Andorra</option>
								<option value="Angola">Angola</option>
								<option value="Anguilla">Anguilla</option>
								<option value="Antarctica">Antarctica</option>
								<option value="Antigua and Barbuda">Antigua and Barbuda</option>
								<option value="Argentina">Argentina</option>
								<option value="Armenia">Armenia</option>
								<option value="Aruba">Aruba</option>
								<option value="Australia">Australia</option>
								<option value="Austria">Austria</option>
								<option value="Azerbaijan">Azerbaijan</option>
								<option value="Bahamas">Bahamas</option>
								<option value="Bahrain">Bahrain</option>
								<option value="Bangladesh">Bangladesh</option>
								<option value="Barbados">Barbados</option>
								<option value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
								<option value="Belize">Belize</option>
								<option value="Benin">Benin</option>
								<option value="Bermuda">Bermuda</option>
								<option value="Bhutan">Bhutan</option>
								<option value="BO">Bolivia</option>
								<option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
								<option value="Botswana">Botswana</option>
								<option value="Bouvet Island">Bouvet Island</option>
								<option value="Brazil">Brazil</option>
								<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
								<option value="Brunei Darussalam">Brunei Darussalam</option>
								<option value="Bulgaria">Bulgaria</option>
								<option value="Burkina Faso">Burkina Faso</option>
								<option value="Burundi">Burundi</option>
								<option value="Cambodia">Cambodia</option>
								<option value="Cameroon">Cameroon</option>
								<option value="Canada">Canada</option>
								<option value="Cape Verde">Cape Verde</option>
								<option value="Cayman Islands">Cayman Islands</option>
								<option value="Central African Republic">Central African Republic</option>
								<option value="Chad">Chad</option>
								<option value="Chile">Chile</option>
								<option value="China">China</option>
								<option value="Christmas Island">Christmas Island</option>
								<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
								<option value="Colombia">Colombia</option>
								<option value="Comoros">Comoros</option>
								<option value="Congo">Congo</option>
								<option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
								<option value="Cook Islands">Cook Islands</option>
								<option value="Costa Rica">Costa Rica</option>
								<option value="Cote d'Ivoire">Cote d'Ivoire</option>
								<option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
								<option value="Cuba">Cuba</option>
								<option value="Cyprus">Cyprus</option>
								<option value="Czech Republic">Czech Republic</option>
								<option value="Denmark">Denmark</option>
								<option value="Djibouti">Djibouti</option>
								<option value="Dominica">Dominica</option>
								<option value="Dominican Republic">Dominican Republic</option>
								<option value="East Timor">East Timor</option>
								<option value="Ecuador">Ecuador</option>
								<option value="Egypt">Egypt</option>
								<option value="El Salvador">El Salvador</option>
								<option value="Equatorial Guinea">Equatorial Guinea</option>
								<option value="Eritrea">Eritrea</option>
								<option value="Estonia">Estonia</option>
								<option value="Ethiopia">Ethiopia</option>
								<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
								<option value="Faroe Islands">Faroe Islands</option>
								<option value="Fiji">Fiji</option>
								<option value="Finland">Finland</option>
								<option value="France">France</option>
								<option value="France, Metropolitan">France, Metropolitan</option>
								<option value="French Guiana">French Guiana</option>
								<option value="French Polynesia">French Polynesia</option>
								<option value="French Southern Territories">French Southern Territories</option>
								<option value="Gabon">Gabon</option>
								<option value="Gambia">Gambia</option>
								<option value="Georgia">Georgia</option>
								<option value="Germany">Germany</option>
								<option value="Ghana">Ghana</option>
								<option value="Gibraltar">Gibraltar</option>
								<option value="Greece">Greece</option>
								<option value="Greenland">Greenland</option>
								<option value="Grenada">Grenada</option>
								<option value="Guadeloupe">Guadeloupe</option>
								<option value="Guam">Guam</option>
								<option value="Guatemala">Guatemala</option>
								<option value="Guinea">Guinea</option>
								<option value="Guinea-Bissau">Guinea-Bissau</option>
								<option value="Guyana">Guyana</option>
								<option value="Haiti">Haiti</option>
								<option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
								<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
								<option value="Honduras">Honduras</option>
								<option value="Hong Kong">Hong Kong</option>
								<option value="Hungary">Hungary</option>
								<option value="Iceland">Iceland</option>
								<option value="India">India</option>
								<option value="Indonesia">Indonesia</option>
								<option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
								<option value="Iraq">Iraq</option>
								<option value="Ireland">Ireland</option>
								<option value="Israel">Israel</option>
								<option value="Italy">Italy</option>
								<option value="Jamaica">Jamaica</option>
								<option value="Japan">Japan</option>
								<option value="Jordan">Jordan</option>
								<option value="Kazakhstan">Kazakhstan</option>
								<option value="Kenya">Kenya</option>
								<option value="Kiribati">Kiribati</option>
								<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
								<option value="Korea, Republic of">Korea, Republic of</option>
								<option value="Kuwait">Kuwait</option>
								<option value="Kyrgyzstan">Kyrgyzstan</option>
								<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
								<option value="Latvia">Latvia</option>
								<option value="Lebanon">Lebanon</option>
								<option value="Lesotho">Lesotho</option>
								<option value="Liberia">Liberia</option>
								<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
								<option value="Liechtenstein">Liechtenstein</option>
								<option value="Lithuania">Lithuania</option>
								<option value="Luxembourg">Luxembourg</option>
								<option value="Macau">Macau</option>
								<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
								<option value="Madagascar">Madagascar</option>
								<option value="Malawi">Malawi</option>
								<option value="Malaysia">Malaysia</option>
								<option value="Maldives">Maldives</option>
								<option value="Mali">Mali</option>
								<option value="Malta">Malta</option>
								<option value="Marshall Islands">Marshall Islands</option>
								<option value="Martinique">Martinique</option>
								<option value="Mauritania">Mauritania</option>
								<option value="Mauritius">Mauritius</option>
								<option value="Mayotte">Mayotte</option>
								<option value="Mexico">Mexico</option>
								<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
								<option value="Moldova, Republic of">Moldova, Republic of</option>
								<option value="Monaco">Monaco</option>
								<option value="Mongolia">Mongolia</option>
								<option value="Montserrat">Montserrat</option>
								<option value="Morocco">Morocco</option>
								<option value="Mozambique">Mozambique</option>
								<option value="Myanmar">Myanmar</option>
								<option value="Namibia">Namibia</option>
								<option value="Nauru">Nauru</option>
								<option value="Nepal">Nepal</option>
								<option value="Netherlands">Netherlands</option>
								<option value="Netherlands Antilles">Netherlands Antilles</option>
								<option value="New Caledonia">New Caledonia</option>
								<option value="New Zealand">New Zealand</option>
								<option value="Nicaragua">Nicaragua</option>
								<option value="Niger">Niger</option>
								<option value="Nigeria">Nigeria</option>
								<option value="Niue">Niue</option>
								<option value="Norfolk Island">Norfolk Island</option>
								<option value="Northern Mariana Islands">Northern Mariana Islands</option>
								<option value="Norway">Norway</option>
								<option value="Oman">Oman</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Palau">Palau</option>
								<option value="Panama">Panama</option>
								<option value="Paraguay">Paraguay</option>
								<option value="Peru">Peru</option>
								<option value="Papua New Guinea">Papua New Guinea</option>
								<option value="Philippines">Philippines</option>
								<option value="Pitcairn">Pitcairn</option>
								<option value="Poland">Poland</option>
								<option value="Portugal">Portugal</option>
								<option value="Puerto Rico">Puerto Rico</option>
								<option value="Qatar">Qatar</option>
								<option value="Reunion">Reunion</option>
								<option value="Romania">Romania</option>
								<option value="Rwanda">Rwanda</option>
								<option value="Russian Federation">Russian Federation</option>
								<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
								<option value="Saint LUCIA">Saint LUCIA</option>
								<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
								<option value="Samoa">Samoa</option>
								<option value="San Marino">San Marino</option>
								<option value="Sao Tome and Principe">Sao Tome and Principe</option>
								<option value="Saudi Arabia">Saudi Arabia</option>
								<option value="Senegal">Senegal</option>
								<option value="Seychelles">Seychelles</option>
								<option value="Sierra Leone">Sierra Leone</option>
								<option value="Singapore">Singapore</option>
								<option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
								<option value="Slovenia">Slovenia</option>
								<option value="Solomon Islands">Solomon Islands</option>
								<option value="Somalia">Somalia</option>
								<option value="South Africa">South Africa</option>
								<option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
								<option value="Spain">Spain</option>
								<option value="Sri Lanka">Sri Lanka</option>
								<option value="St. Helena">St. Helena</option>
								<option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
								<option value="Sudan">Sudan</option>
								<option value="Suriname">Suriname</option>
								<option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
								<option value="Swaziland">Swaziland</option>
								<option value="Sweden">Sweden</option>
								<option value="Switzerland">Switzerland</option>
								<option value="Syrian Arab Republic">Syrian Arab Republic</option>
								<option value="Taiwan, Province of China">Taiwan, Province of China</option>
								<option value="Tajikistan">Tajikistan</option>
								<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
								<option value="Thailand">Thailand</option>
								<option value="Togo">Togo</option>
								<option value="Tokelau">Tokelau</option>
								<option value="Tonga">Tonga</option>
								<option value="Trinidad and Tobago">Trinidad and Tobago</option>
								<option value="Tunisia">Tunisia</option>
								<option value="Turkey">Turkey</option>
								<option value="Turkmenistan">Turkmenistan</option>
								<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
								<option value="Tuvalu">Tuvalu</option>
								<option value="Uganda">Uganda</option>
								<option value="Ukraine">Ukraine</option>
								<option value="United Arab Emirates">United Arab Emirates</option>
								<option value="United Kingdom">United Kingdom</option>
								<option value="United States">United States</option>
								<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
								<option value="Uruguay">Uruguay</option>
								<option value="Uzbekistan">Uzbekistan</option>
								<option value="Vanuatu">Vanuatu</option>
								<option value="Venezuela">Venezuela</option>
								<option value="Viet Nam">Viet Nam</option>
								<option value="Virgin Islands (British)">Virgin Islands (British)</option>
								<option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
								<option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
								<option value="Western Sahara">Western Sahara</option>
								<option value="Yemen">Yemen</option>
								<option value="Yugoslavia">Yugoslavia</option>
								<option value="Zambia">Zambia</option>
								<option value="Zimbabwe">Zimbabwe</option> 
							</select>        
						</div>
					 </div>      
						 </div>
							</div> 
						  
					  <div class="form-group">
		
						 <div class="col-md-6 city-secc">
								 <label class="control-label" for="mobile">City</label>
								  <input type="text" class="form-control" name="city" value="<?php echo $value->city ;?>" title="Enter City" required>
							  </div>
						  </div> 
						  </div> 
						  <div class="form-group">
						   <div class="count_sec">
							<div class="col-md-6 countery">
								 <label class="control-label" for="mobile">State</label>
								  <input type="text" class="form-control" name="state" value="<?php echo $value->state ;?>"  required>
							  </div>
							  <div class="col-md-6 zip-code">
								 <label class="control-label" for="mobile">Zip Code</label>
								  <input type="text" class="form-control" name="zip" id="mobile"   value="<?php echo $value->zipcode ;?>" required> 
							  </div>
							  </div>
						  </div>
						
	</form>
<?php } ?>
	</div></p>
	
	
	
    <p><img src="img/ic_query_builder_24px.png">
	<span>Opening Hours</span>
	
	<span style="margin-left:50%;float: right; position: relative;">
	<img class="edit-images" src="img/ic_create_24px.png"><input  type="button" value="edit" onclick="hours();"/></span><br>
	<div id="Div5">
	<span  class="days-sect">	
	<?php 
	foreach($edit as $value){ 
	$data =  $value->open;
	$opened = json_decode($data, true);

	$data =  $value->close;
	$closed = json_decode($data, true);
	if($opened["Mon"] !="00:00 AM"){ echo "Mon"; }
	elseif($opened["Tue"] !="00:00 AM"){echo "Tue";}
	elseif($opened["Wed"] !="00:00 AM"){ echo "Wed"; }
	elseif($opened["Thu"] !="00:00 AM"){ echo "Thu"; }
	elseif($opened["Fri"] !="00:00 AM"){ echo "Fri"; }
	elseif($opened["Sat"] != "00:00 AM"){ echo "Sat"; }
	elseif($opened["Sun"] != "00:00 AM"){ echo "Sun"; }
	?>- 
	<?php 
	if($closed["Sun"] !="00:00 PM"){echo "Sun";}
	elseif($closed["Sat"] !="00:00 PM"){ echo "Sat"; }
	elseif($closed["Fri"] !="00:00 PM"){ echo "Fri"; }
	elseif($closed["Thu"] !="00:00 PM"){ echo "Thu"; }
	elseif($closed["Wed"] !="00:00 PM"){ echo "Wed"; }
	elseif($closed["Tue"] !="00:00 PM"){ echo "Tue"; }
	elseif($closed["Mon"] !="00:00 PM"){ echo "Mon"; }
	
	?>
	  </span>  <span class="times-sec">
	<?php 
	if($opened["Mon"] !="00:00 AM"){ echo $opened["Mon"]; }
	elseif($opened["Tue"] !="00:00 AM"){ echo $opened["Tue"]; }
	elseif($opened["Wed"] !="00:00 AM"){ echo $opened["Wed"]; }
	elseif($opened["Thu"] !="00:00 AM"){ echo $opened["Thu"]; }
	elseif($opened["Fri"] !="00:00 AM"){ echo $opened["Fri"]; }
	elseif($opened["Sat"] != "00:00 AM"){ echo $opened["Sat"]; }
	elseif($opened["Sun"] !="00:00 AM"){ echo $opened["Sun"]; }
	?> 
	to 
	<?php 
	if($closed["Sun"] !="00:00 PM"){ echo $closed["Sun"]; }
	elseif($closed["Sat"] != "00:00 PM"){ echo $closed["Sat"]; }
	elseif($closed["Fri"] != "00:00 PM"){ echo $closed["Fri"]; }
	elseif($closed["Thu"] !="00:00 PM"){ echo $closed["Thu"]; }
	elseif($closed["Wed"] !="00:00 PM"){ echo $closed["Wed"]; }
	elseif($closed["Tue"] !="00:00 PM"){ echo $closed["Tue"]; }
	elseif($closed["Mon"] !="00:00 PM"){ echo $closed["Mon"]; }
	
	}?>
	</span></div></p><br> 
	

	<form action="<?php //echo base_url('vendor-profile'); ?>" method="post" id="Div6">
   <button class="btn btn-lg btn-success" type="submit" name="subhours"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
   

   <p><label class="checkcontainer "><input class="coupon_question"  type="checkbox" name="mon" id="value_radio" value="Mon" onclick="myFunction()" onchange="valueChanged()" <?php if($opened["Mon"] !='00:00 AM') { echo "checked"; }?>/>Monday<span class="checkmark"></span></label><br>
   <div id="mon" <?php if($opened["Mon"] == '00:00 AM') { ?>style="display:none"<?php }?>>	
	<input  id="mon1" class="day timepicker" name="date1"   value="<?php echo $opened["Mon"]; ?>" required readonly>   
	<input  id="mon2" class="qwe timepicker"  name="date2" value="<?php echo $closed["Mon"]; ?>" required readonly></div></p>
	
	
	<p><label class="checkcontainer"><input class="tuesd" type="checkbox"  name="tue" id="tus" value="Tue"  onclick="tues()" onchange="qweew()" <?php if($opened["Tue"] !='00:00 AM') { echo "checked"; }?> style="position: absolute;opacity: 0; cursor: pointer;"/>Tuesday<span class="checkmark"></span></label><br>
	<div id="tue" <?php if($opened["Tue"] == '00:00 AM') { ?>style="display:none"<?php }?>>	
	<input  id="tue1" class="tday timepicker"  name="date3"   value="<?php echo $opened["Tue"]; ?>" required readonly>
	<input  id="tue2" class="aday timepicker" name="date4" value="<?php echo $closed["Tue"]; ?>" required readonly></div></p>
	
	
	<p><label class="checkcontainer"><input style="position: absolute;opacity: 0; cursor: pointer;" class="wedns" type="checkbox" name="wed" id="wedb" value="Wed" onclick="wedn()"  onchange="wnes()" <?php if($opened["Wed"] !='00:00 AM') { echo "checked"; }?>/>Wednesday<span class="checkmark"></span></label><br>	
	<div id="wed" <?php if($opened["Wed"] == '00:00 AM') { ?>style="display:none"<?php }?>>
	<input id="wed1" class="wday timepicker"  name="date5"   value="<?php echo $opened["Wed"]; ?>" required readonly>
	<input id="wed2" class="weday timepicker"  name="date6" value="<?php echo $closed["Wed"]; ?>" required readonly></div></p>
	

	<p><label class="checkcontainer"><input style="position: absolute;opacity: 0; cursor: pointer;" class="thrs"  type="checkbox"  name="thu" id="thusd" value="Thu"  onclick="thur()" onchange="thus()" <?php if($opened["Thu"] !='00:00 AM') { echo "checked"; }?> />Thrusday<span class="checkmark"></span></label><br>	
	<div id="thu" <?php if($opened["Thu"] == '00:00 AM') { ?>style="display:none"<?php }?>>
	<input id="th1" class="td timepicker"  name="date7"   value="<?php echo $opened["Thu"]; ?>" required readonly>
	<input id="th2"  class="ts timepicker"  name="date8" value="<?php echo $closed["Thu"]; ?>" required readonly></div></p>
	

	<p><label class="checkcontainer"><input style="position: absolute;opacity: 0; cursor: pointer;" class="fid"  type="checkbox"  name="fri" id="fridy" value="Fri"   onclick="frid()" onchange="fiy()" <?php if($opened["Fri"] !='00:00 AM') { echo "checked"; }?> />Friday<span class="checkmark"></span></label><br>	
	<div id="fri" <?php if($opened["Fri"] == '00:00 AM') { ?>style="display:none"<?php }?>>
	<input  id="fri1" class="fd timepicker" name="date9"   value="<?php echo $opened["Fri"]; ?>" required readonly> 
	<input id="fri2" class="fy timepicker"  name="date10" value="<?php echo $closed["Fri"]; ?>" required readonly></div></p>	
	
	
	<p><label class="checkcontainer"><input style="position: absolute;opacity: 0; cursor: pointer;"  class="stu" type="checkbox"  name="fri" id="saty" value="Fri"  onclick="satu()" onchange="str()" <?php if($opened["Sat"] !='00:00 AM') { echo "checked"; }?>/>Saturday<span class="checkmark"></span></label><br>
	<div id="sat" <?php if($opened["Sat"] == '00:00 AM') { ?>style="display:none"<?php }?>>	
	<input  id="sat1" class="sr timepicker" name="date11"   value="<?php echo $opened["Sat"]; ?>" required readonly>
	<input  id="sat2" class="sa timepicker"  name="date12" value="<?php echo $closed["Sat"]; ?>" required readonly>
	</div></p>
	
	
	<p><label class="checkcontainer"><input style="position: absolute;opacity: 0; cursor: pointer;" class="suy" type="checkbox"  name="fri" id="sdu" value="Fri"  onclick="sund()" onchange="sdy()" <?php if($opened["Sun"] !='00:00 AM') { echo "checked"; }?>/>Sunday<span class="checkmark" ></span></label><br>	
	<div id="sun" <?php if($opened["Sun"] == '00:00 AM') { ?>style="display:none"<?php }?>>
	<input  id="sun1" class="su timepicker" name="date13"   value="<?php echo $opened["Sun"]; ?>" required readonly>
	<input  id="sun2" class="sy timepicker"  name="date14" value="<?php echo $closed["Sun"]; ?>" required readonly>
	</div></p>  
	

	
	</form>							 
 </div>
 <div class="service_sec new-service">
 <h1>Services & Pricing</h1>
 
		<span style="margin-left:50%;float: right; position: relative;">
	<img class="edit-images" src="img/ic_create_24px.png"><input  type="button" value="edit" onclick="checkup();"/>
	</span><br>
	
<div id="Div7">
		<ul style="margin:0 8%;">
		<?php   foreach($ser as $value){ 
		?>  
		<li><?php echo $value->serviceName;?>-<span>£<?php  echo $value->servicePrice; ?></span></li>
		<?php }  ?>    
		</ul>		  
</div>        
		<div id="Div8">
		<br>
		
	<form  method="post">
			
	<select name="ser" required>
		<option value="">Select a Treatment</option>
		<?php   foreach($denser as $value){ ?>
		<option><?php  echo $value->title;  ?> </option>
		<?php } ?>
		</select>
	<input type="text" class="form-control"   name="price"    placeholder="Price in (£)" maxlength="7" required>
	<button class="btn btn-lg btn-success" type="submit" name="service"><i class="glyphicon glyphicon-ok-sign"></i>+Add</button>
	</form>
		<ul class="service-bottom-sec" style="margin: 30px 8% 0;">
		<?php   foreach($ser as $value){ 
		?>
		<li><?php echo $value->serviceName;?>-<span>£<?php  echo $value->servicePrice; ?></span>
		<form action="<?php echo base_url('vendor-profile'); ?>" method="post">
		<input type="hidden" name="id" value="<?php  echo $value->id; ?>">
		<button name="delser"  type="submit" onClick="return doconfirm();">×</button></li>
		</form>
		<?php }  ?>
		</ul>	  
		 </div>
		 </div><br><br>

			
				
			<!-- modal-content -->
		</div><!-- modal-dialog -->
	</div>
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
 <style>

</style>
   <script>
 function switchVisible() {
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
       $('.timepicker').timepicker({
          timeFormat: 'h:mm p',
          //interval: 30,
           
          //startTime: '08:00',
         // dynamic: true,
          dropdown: true,
          scrollbar: true
      });
    });
   
/* $(function() {
	$('#birthdaytime').datetimepicker({
     format: 'h:m A',
use24hours: true,	 
});
  });  */
   $('#ename').on('change',function(){
        var value = $(this).val();       
		$( "#fname" ).submit();
    });
 $('#mySelect').on('change',function(){
        var value = $(this).val();       
		//alert(value);
		$( "#myForm" ).submit();
    }); 
/* 	$('#addrin').on('change',function(){
        var value = $(this).val();       
		//alert(value);
		$( "#add" ).submit();
    }); */


</script>
<script> function Visible() {
            if (document.getElementById('Div3')) {

                if (document.getElementById('Div3').style.display == 'none') {
                    document.getElementById('Div3').style.display = 'block';
                    document.getElementById('Div4').style.display = 'none';
                }
                else {
                    document.getElementById('Div3').style.display = 'none';
                    document.getElementById('Div4').style.display = 'block';
                }
            } }</script>
<script> function hours() {
            if (document.getElementById('Div5')) {

                if (document.getElementById('Div5').style.display == 'none') {
                    document.getElementById('Div5').style.display = 'block';
                    document.getElementById('Div6').style.display = 'none';
                }
                else {
                    document.getElementById('Div5').style.display = 'none';
                    document.getElementById('Div6').style.display = 'block';
                }
            } }</script>
	<script> function checkup() {
            if (document.getElementById('Div7')) {

                if (document.getElementById('Div7').style.display == 'none') {
                    document.getElementById('Div7').style.display = 'block';
                    document.getElementById('Div8').style.display = 'none';
                }
                else {
                    document.getElementById('Div7').style.display = 'none';
                    document.getElementById('Div8').style.display = 'block';
                }
            } }
			 function uname() {
            if (document.getElementById('Div10')) {

                if (document.getElementById('Div10').style.display == 'none') {
                    document.getElementById('Div10').style.display = 'block';
                    document.getElementById('Div9').style.display = 'none';
                }
                else {
                    document.getElementById('Div10').style.display = 'none';
                    document.getElementById('Div9').style.display = 'block';
                }
            } }

/**************Monday************************ */
$('#value_radio').click(function() {                   /* put value in input box via checkbox */
        if (this.checked){
            document.getElementById("mon1").value = "09:00 AM"; 
            document.getElementById("mon2").value = "05:00 PM";
        }
        else {
            document.getElementById("mon1").value = "00:00 AM"; 
            document.getElementById("mon2").value = "00:00 PM";
        }
});
    
function myFunction() {
 var x = document.getElementById("mon");             // show hide input box on click of checkbox
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
/**************tuesday************************ */
$('#tus').click(function() {
        if (this.checked){
            document.getElementById("tue1").value = "09:00 AM"; 
            document.getElementById("tue2").value = "05:00 PM";
        }
        else {
			document.getElementById("tue1").value = "00:00 AM";
			document.getElementById("tue2").value = "00:00 PM";
        }
});
	
function tues() {
  var x = document.getElementById("tue");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  } 
}
/**************Wednesday************************ */
 $('#wedb').click(function() {
        if (this.checked){
            document.getElementById("wed1").value = "09:00 AM"; 
            document.getElementById("wed2").value = "05:00 PM";
        }
        else {
			document.getElementById("wed1").value = "00:00 AM";
			document.getElementById("wed2").value = "00:00 PM";
        }
});
  
function wedn() { 
  var x = document.getElementById("wed");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  } 
}
/**************Thrusday************************ */
$('#thusd').click(function() {
        if (this.checked){
            document.getElementById("th1").value = "09:00 AM"; 
            document.getElementById("th2").value = "05:00 PM";
        }
        else {
			document.getElementById("th1").value = "00:00 AM";
			document.getElementById("th2").value = "00:00 PM";
        }
});
 
function thur() {  
   var x = document.getElementById("thu");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  } 
}
/**************friday************************ */
$('#fridy').click(function() {
        if (this.checked){
            document.getElementById("fri1").value = "09:00 AM"; 
            document.getElementById("fri2").value = "05:00 PM";
        }
        else {
			document.getElementById("fri1").value = "00:00 AM";
			document.getElementById("fri2").value = "00:00 PM";
        }
    });

function frid() { 
  var x = document.getElementById("fri");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  } 
}
/**************Saturday************************ */
$('#saty').click(function() {
        if (this.checked){
            document.getElementById("sat1").value = "09:00 AM"; 
            document.getElementById("sat2").value = "05:00 PM";
        }
        else {
			document.getElementById("sat1").value = "00:00 AM";
			document.getElementById("sat2").value = "00:00 PM";
        }
    });
  
function satu() { 
   var x = document.getElementById("sat");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  } 
}
/**************Sunday************************ */
$('#sdu').click(function() { 
        if (this.checked){
            document.getElementById("sun1").value = "09:00 AM"; 
            document.getElementById("sun2").value = "05:00 PM";
        }
        else {
		  document.getElementById("sun1").value = "00:00 AM";
		  document.getElementById("sun2").value = "00:00 PM";
        }
});
 
function sund() {  
  var x = document.getElementById("sun");
 if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  } 
}

 /*******************Delete  service alert **********/
 function doconfirm()
{
    job=confirm("Are you sure to delete this service permanently?");
    if(job!=true)
    {
        return false;
    }
}
</script>
