<!--	<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
<!--	<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script> -->
<!--<script src="jquery-3.4.1.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<style>
	tr.boder_sec {
		cursor: pointer;
	}

	.modal-header button {
		float: none;
	}

	.dropdown-menu.show {
		display: block;
		padding-left: 13px;
	}

	.hidePopUp {
		right: -500px !important;
	}

	.hide-cross1 {
		position: absolute;
		background-color: white;
		width: 30px;
		height: 31px;
		right: 64px;
		z-index: 2;
	}
</style>
<?php
if (isset($_GET['t'])) {
	$tab = $_GET['t'];
}
?>
<?php if (isset($_POST['seainac'])) { ?>
	<style>
		.noHover {
			pointer-events: none;
		}

	</style>

<?php } ?>
<div class="row" style="margin-left: 0px;margin-right: 0px;">

	<div class="col-md-12">

		<!----------Quick Link Section -----Start------->

		<!----------Quick Link Section -----End------->
		<!----------Tabs Section -----Start------->


		<div class="tab-main-sec user-sec">
			<div id="mydivs">
				<?php if ($this->session->flashdata('msg')) {
					echo "<p class='alert alert-success' style='width:30%; text-align:center; margin-left:30%;'>" . $this->session->flashdata('msg') . "</p>";
				} ?>

				<?php if ($this->session->flashdata('del')) {
					echo "<p class='alert alert-success' style='width:30%; text-align:center; margin-left:30%;'>" . $this->session->flashdata('del') . "</p>";
				} ?>
			</div>
			<script>
				setTimeout(function () {
					$('#mydivs').hide('fast');
				}, 10000);
			</script>
			<div class="row">
				<div class="col-md-12">
					<div class="active_sec" style="<?php if ($tab == '1' or $tab == '') {
						echo "display:block";
					} else {
						echo "display:none";
					} ?>">
						<div class="row">
							<div class="col-md-6 recod">
								<h2><img src="img/ic_record_voice_over_-1.png">Users</h2>
							</div>
							<div class="col-md-6">
								<form class="card card-sm" action="<?php echo base_url('admin-dashboard'); ?>"
									  method="post">
									<div class="card-body row no-gutters align-items-center">
										<div class="col-auto">
											<!--<i class="fas fa-search h4 text-body"></i>-->
											<img src="img/ic_zoom_out_24px.png">
										</div>
										<!--end of col-->
										<div class="col">
											<input id="tabs" type="hidden" name="tabu" value="1"/>
											<input style="float: left;"
												   class="form-control form-control-lg form-control-borderless noHover"
												   name="seainac" type="search"
												   value="<?php if (isset($_POST['seainac'])) {
													   echo $_POST['seainac'];
												   } ?>" placeholder="Search User....   ">
											<?php if (isset($_POST['seainac'])) { ?>
												<input type="button" value="Reset" onClick="location.href=location.href"
													   style="position: absolute;right:0px;float: right; width: 45px;height: 18px;background-color: white;color: #597b9e;font-size: 12px;">
											<?php } ?>
											<!-- <br><input type="text" value="test" name="test" data-email="test"  class="sea_form">-->

										</div>
										<div class="hide-cross"></div>
										<!--end of col-->
									</div>
								</form>
							</div>

						</div>
					</div>

					<div class="inactive_sec" style="<?php if ($tab == '0') {
						echo "display:block";
					} else {
						echo "display:none";
					} ?>">
						<div class="row">
							<div class="col-md-6 recod">
								<h2><img src="img/ic_record_voice_over_-1.png">Users</h2>
							</div>
							<div class="col-md-6">

								<form class="card card-sm" action="<?php echo base_url('admin-dashboard'); ?>"
									  method="post">
									<div class="card-body row no-gutters align-items-center">
										<div class="col-auto">
											<!--<i class="fas fa-search h4 text-body"></i>-->
											<img src="img/ic_zoom_out_24px.png">
										</div>
										<!--end of col-->
										<div class="col">
											<input id="tabs" type="hidden" name="tabu" value="0"/>

											<input style="float: left;"
												   class="form-control form-control-lg form-control-borderless noHover"
												   name="searchfil" type="search"
												   value="<?php if (isset($_POST['searchfil'])) {
													   echo $_POST['searchfil'];
												   } ?>" placeholder="Search User....">
											<?php if (isset($_POST['searchfil'])) { ?>
												<input type="button" value="Reset" onClick="location.href=location.href"
													   style="position: absolute;right:0px;float: right; width: 45px;height: 18px;background-color: white;color: #597b9e;font-size: 12px;">
											<?php } ?>

											<!-- <br><input type="text" value="test" name="test" data-email="test"  class="sea_form">-->

										</div>
										<div class="hide-cross"></div>
										<!--end of col-->
									</div>
								</form>
							</div>

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
													<a class="nav-item nav-link <?php if ($tab == '' || $tab == '1') {
														echo "active";
													} ?>" id="nav-home-tab" data-toggle="tab" href="#nav-home"
													   role="tab" aria-controls="nav-home"
													   aria-selected="true">Active</a>


													<a class="nav-item nav-link <?php if ($tab == '0') {
														echo "active";
													} ?>" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
													   role="tab" aria-controls="nav-profile" aria-selected="false">Inactive/Banned</a>

												</div>
											</nav>
										</div>
										<?php

										$this->db->select('*');
										$this->db->from('user');
										$this->db->join('user_meta', 'user.id = user_meta.userid');
										$this->db->where('user.status=', 1);
										$this->db->where('user.level=', 1);
										$query = $this->db->get();
										$rowcount = $query->num_rows();


										$this->db->select('*');
										$this->db->from('user');
										$this->db->join('user_meta', 'user.id = user_meta.userid');
										$this->db->where('status', 0);
										$this->db->where('level=', 1);
										$query = $this->db->get();
										$rowcountinactive = $query->num_rows();
										?>
										<div class="col-md-7">
											<div class="active_sec" style="<?php if ($tab == '1' || $tab == '') {
												echo "display:block";
											} else {
												echo "display:none";
											} ?>">
												<p><strong><?php echo count($activeuser); ?></strong> Total Active Users
												</p>
											</div>
											<div class="inactive_sec" style="<?php if ($tab == '0') {
												echo "display:block";
											} else {
												echo "display:none";
											} ?>">
												<p><strong><?php echo count($banneduser); ?></strong> Total Banned Users
												</p>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-content" id="nav-tabContent">
									<div class="tab-pane fade <?php if ($tab == '1' || $tab == '') {
										echo "active";
									} else {
										echo "fade";
									} ?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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

														<form id="myForm"
															  action="<?php echo base_url('admin-dashboard'); ?>"
															  method="post">


															<label class="radio-inline containers"
																   style="color: #597b9e;">All
																<input data-email="a" class="sub_form" name="filter"
																	   type="radio" value="a" checked/>
																<span class="checkr"></span>
															</label>
															<label class="radio-inline containers"
																   style="color: #597b9e;">via Email
																<input data-email="e" type="radio" class="sub_form"
																	   name="filter"
																	   value="e" <?php if (isset($_POST['filter'])) {
																	if ($_POST['filter'] == 'e') {
																		echo "checked";
																	}
																} ?> >
																<span class="checkr"></span>
															</label>
															<label class="radio-inline containers"
																   style="color: #597b9e;">via Facebook
																<input data-email="f" type="radio" class="sub_form"
																	   name="filter"
																	   value="f" <?php if (isset($_POST['filter'])) {
																	if ($_POST['filter'] == 'f') {
																		echo "checked";
																	}
																} ?> >
																<span class="checkr"></span>
															</label>
														</form>

													</div>
												</div>
												<div class="col-md-6">

													<form id="submitForm"
														  action="<?php echo base_url('admin-dashboard'); ?>"
														  method="post">

														<div class="sort_sec">
															<label for="cars">Sort by : </label>
															<select id="mySelect" name="one">
																<option value="old" <?php if (isset($_POST['one'])) {
																	if ($_POST['one'] == 'old') {
																		echo "selected";
																	}
																} ?>>Old to New
																</option>
																<option value="new" <?php if (isset($_POST['one'])) {
																	if ($_POST['one'] == 'new') {
																		echo "selected";
																	}
																} ?>>New to Old
																</option>
															</select>

														</div>
													</form>

												</div>
											</div>
										</div>
										<div class="profile-card">
											<div class="row">
												<?php
												if (empty($activeuser)) {
													echo "<h2 style='color: #597b9e;margin-left: 36%;margin-top:11%;}'>
					 &nbsp;&nbsp;&nbsp;&nbsp;User not found.</h2>";
												}

												foreach ($activeuser as $row) {

													//print_r($row);

													?>


													<!-----------------------reset password modal popup-------------------------------->

													<div class="modal fade main-model rest-pass-popup rest-pass-popup"
														 id="myModal<?php echo $row->id; ?>" role="dialog">
														<div class="modal-dialog">

															<!-- Modal content-->
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close"
																			data-dismiss="modal">&times;
																	</button>
																	<h4 class="modal-title rest-pass">Reset
																		Password</h4>

																	<?php
																	/* $name = $row->user_name;
			$parts = explode(" ", $name);
			if(count($parts) != '1'){

									$rest = substr("$parts[0]", 0, 1);
									if($parts != ""){

									  	$rest1 = substr("$parts[1]", 0, 1);
									}
									else{
								  $rest1 =   substr($name, 0,2);
									}
								//print_r($parts);
									//echo $parts[0];
									//echo $parts[1];
									}
									else {

									    $rest1 =   substr($name, 0,2);

									}
				//echo $rest; */
																	$name = $row->user_name;
																	$rest = substr($name, 0, 1);

																	$name1 = $row->last_name;
																	$rest1 = substr($name1, 0, 1);
																	?>

																	<div class="card_img">
																		<?php if ($row->source == 'E') {
																			?>
																			<a href="" class="name_letters"
																			   style="background: #5FC97F;" id="pop1"
																			   data-toggle="modal"
																			   data-target="#imagemodal6<?php echo $row->id; ?>"><img
																						class="propic"
																						src="<?php if ($row->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																							echo $row->profile_image;
																						} else {
																							echo $rest;
																							echo $rest1;
																						} ?>" alt="<?php echo $rest;
																				echo $rest1; ?>">
																			</a>
																		<?php } else {
																			?>

																			<a href="" class="name_letters"
																			   style="background: #5F7BC9;" id="pop1"
																			   data-toggle="modal"
																			   data-target="#imagemodal6<?php echo $row->id; ?>"><img
																						class="propic"
																						src=" <?php if ($row->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																							echo $row->profile_image;
																						} else {
																							echo $rest;
																							echo $rest1;
																						} ?>" alt="<?php echo $rest;
																				echo $rest1; ?>">
																			</a>

																		<?php } ?>
																	</div>
																	<script>
																		$('img').on('error', function () {
																			$(this).replaceWith(function () {
																				return $(this).prop('alt');
																			});
																		})</script>


																	<!--<div class="card_img">
			  <a href="" class="name_letters" id="pop1resetpassword" data-toggle="modal" data-target="#imagemodal6">
			  <?php //echo $rest;
																	?></a>
	        </div>-->

																	<h2><?php echo $row->user_name; ?><?php echo $row->last_name; ?></h2>
																</div>
																<div class="modal-body">
																	<p><strong>Are you sure you want to<br>reset the
																			user's password?</strong><br>Once
																		confirmed,the user will be notified<br>and the
																		password will be sent to<br> <a
																				href="mailto:<?php echo $row->user_email; ?>"
																				target="_blank"><?php echo $row->user_email; ?></a>
																	</p>
																</div>
																<div class="rest_bttn">
																	<form method="post"
																		  action="<?php //echo base_url('Admin/resetpass');
																		  ?>">
																		<input type="hidden" name="id"
																			   value="<?php echo $row->id; ?>">
																		<input type="submit" value="Reset Password"
																			   name="resetpassword" class="btn">
																	</form>
																</div>

																<div class="modal-footer">
																	<button type="button" class="btn btn-default"
																			data-dismiss="modal">Cancel
																	</button>
																</div>
															</div>

														</div>
													</div>
													<!------------------------end------------------------------------------------------------>

													<!---------------------------------image modal ---------------------------------------->

													<div class="modal right main-model right-modeles aman-pop-sect"
														 id="imagemodal<?php echo $row->id; ?>" tabindex="-1"
														 role="dialog" aria-labelledby="myModalLabel2">
														<div class="modal-dialog" role="document">
															<div class="modal-content">


																<div class="modal-header">
																	<h4 class="modal-title" id="myModalLabel2"
																		class="close" data-dismiss="modal"
																		aria-label="Close"><img class="arrow"
																								src="img/ic_arrow_back_24px.png">
																	</h4>

																	<div class="via_bttn">


																		<div class="bttn-group">

																			<a class="nav-links" href=""
																			   data-toggle="dropdown"
																			   aria-haspopup="true"
																			   aria-expanded="false">
																				<img class="user" id='clickst'
																					 src="img/ic_more_vert_24px.png"></a>
																			<div class="dropdown-menu">
																				<a id="hide11" class="dropdown-item"
																				   href="" id="edit" data-toggle="modal"
																				   data-target="#imagemodales<?php echo $row->id; ?>">Edit</a>
																				<a id="hide"
																				   class="hide_popup dropdown-item user-popup"
																				   href="" class="btn btn-info btn-lg"
																				   data-toggle="modal"
																				   data-target="#myModal<?php echo $row->id; ?>">Reset
																					Password</a>
																				<form method="post">
																					<input type="hidden" name="id"
																						   value="<?php echo $row->id; ?>">
																					<button name="ban"><a
																								class="dropdown-item">Ban</a>
																					</button>
																				</form>
																				<!--<a class="dropdown-item disabled" href="">Delete</a>-->
																				<form action="<?php echo base_url('Admin/deleteUserData'); ?>"
																					  method="post">
																					<input type="hidden" name="userId"
																						   value="<?php echo $row->id; ?>">
																					<input type="hidden" name="tab"
																						   value="1">
																					<button name="delUser" type="submit"
																							onClick="return doconfirm();">
																						<a class="dropdown-item">Delete</a>
																					</button>
																				</form>
																				<script>
																					/* Delete  User data alert */
																					function doconfirm() {
																						job = confirm("Are you sure to delete this user permanently?");
																						if (job != true) {
																							return false;
																						}
																					}
																				</script>

																			</div>
																		</div>
																	</div>
																</div>


																<div class="modal-body">
																	<div class="aman_right_popup">
																		<?php
																		/*   $username = $row->user_name;
						$parts = explode(" ", $username);
						if(count($parts) != '1'){

									$rest = substr("$parts[0]", 0, 1);
									if($parts != ""){

									  	$rest1 = substr("$parts[1]", 0, 1);
									}
									else{
								  $rest1 =   substr($name, 0,2);
									}
								//print_r($parts);
									//echo $parts[0];
									//echo $parts[1];
									}
									else {

									    $rest1 =   substr($name, 0,2);

									}
					   */
																		$name = $row->user_name;
																		$rest = substr($name, 0, 1);

																		$name1 = $row->last_name;
																		$rest1 = substr($name1, 0, 1);
																		?>
																		<!--<img src="img/Group141.png">-->
																		<!--<div class="card_img">
		  <a href="" class="name_letters" id="pop12" data-toggle="modal" data-target="#imagemodal<?php echo $row->id; ?>">
		  <?php //echo $rest;
																		?></a>
	    </div>-->


																		<div class="card_img">
																			<?php if ($row->source == 'E') {
																				?>
																				<a href="" class="name_letters"
																				   style="background: #5FC97F;"
																				   id="pop12" data-toggle="modal"
																				   data-target="#imagemodal<?php echo $row->id; ?>"><img
																							class="poppic"
																							src=" <?php if ($row->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																								echo $row->profile_image;
																							} else {
																								echo $rest;
																								echo $rest1;
																							} ?>" alt="<?php echo $rest;
																					echo $rest1; ?>">
																				</a>
																			<?php } else {
																				?>

																				<a href="" class="name_letters"
																				   style="background: #5F7BC9;"
																				   id="pop12" data-toggle="modal"
																				   data-target="#imagemodal<?php echo $row->id; ?>"><img
																							class="poppic"
																							src="<?php if ($row->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																								echo $row->profile_image;
																							} else {
																								echo $rest;
																								echo $rest1;
																							} ?>" alt="<?php echo $rest;
																					echo $rest1; ?>">
																				</a>

																			<?php } ?>
																		</div>
																		<h2><?php echo $row->user_name; ?><?php echo $row->last_name; ?></h2>
																		<!--<a class="email_text" href="mailto:amanbirdi@gmail.com" target="_blank">amanbirdi@gmail.com</a>-->
																		<a class="email_text" href=""
																		   target="_blank"><?php echo $row->user_email; ?></a>
																		<div class="via_bttn email_via">

																			<?php if ($row->source == 'F') {
																				echo "<a  class='btttn_sec'> via facebook</a>";
																			} else {
																				echo "<a  class=''>via Email</a>";
																			} ?>
																		</div>
																	</div>
																	<div class="card-img-sec user-des-sec">
																		<!-- <p><img src="img/ic_place_-1.png"><span>Address</span><br>Studio 103 The  Business Centre 61 Wellfield Road <br>Roath Cardiff,United Kingdom</p>-->
																		<p>
																			<img style="margin-bottom:6px"
																				 src="img/ic_place_-1.png">
																			<span>Address</span><br>
																			<span class="space-pop"><?php echo $row->address;
																				echo ", " . $row->country; ?>
								</span>
																		</p>

																		<p><img style="margin-bottom:6px"
																				src="img/ic_stay_current_portrait_-1.png"><span>Phone Number</span><br><span
																					class="space-pop"><?php echo $row->contact; ?></span>
																		</p>
																		<?php if ($row->gender == 'Male') { ?>

																			<p>
																				<img src="img/Path 141.png"><span>Gender</span><br><span
																						class="space-pop"><?php echo $row->gender; ?></span>
																			</p>
																		<?php } else { ?>
																			<p><span>Gender</span><br><img
																						class="gender-pop"
																						src="img/Group 3099.png"><span
																						class="space-pop"><?php echo $row->gender; ?></span>
																			</p>
																		<?php } ?>
																		<p><img class="bir"
																				src="img/ic_cake_-2.png"><span>Birthday</span><br><span
																					class="space-pop"><?php echo $row->dob; ?></span>
																		</p>

																	</div>
																</div>

															</div><!-- modal-content -->
														</div><!-- modal-dialog -->
													</div>
													<script>
														$('img').on('error', function () {
															$(this).replaceWith(function () {
																return $(this).prop('alt');
															});
														})</script>

													<!----------------------------------edit modal popup----------------------------------->


													<div class="modal right edit-pop-upsec" <?php if ($EditPopup == $row->id) {
														echo "style = display:block";
													} ?> id="imagemodales<?php echo $row->id; ?>" tabindex="-1"
														 role="dialog" aria-labelledby="myModalLabel2">
														<div class="modal-dialog" id="addNewClass"
															 role="document" <?php if ($EditPopup == $row->id) {
															echo "style = right:-1px";
														} ?>>
															<div class="modal-content">

																<div id="editview" class="snippet">
																	<div class="modal-header">
																		<h4 class="modal-title" id="myModalLabel2"
																			class="close" data-dismiss="modal"
																			aria-label="Close">
																			<a href=""> <img
																						src="img/ic_arrow_back_24px.png"
																						id="close_popup"></a></h4>

																		<h1>Edit User Profile</h1>

																		<div class="via_bttn">
																			<div class="bttn-group">

																				<a class="nav-links" href="#"
																				   data-toggle="dropdown"
																				   aria-haspopup="true"
																				   aria-expanded="false">
																					<img class="user" id="clickst"
																						 src="img/ic_more_vert_24px.png"></a>
																				<div class="dropdown-menu">
																					<a id="hide9"
																					   class="hide_popup dropdown-item user-popup"
																					   href=""
																					   class="btn btn-info btn-lg"
																					   data-toggle="modal"
																					   data-target="#myModal<?php echo $row->id; ?>">Reset
																						Password</a>
																					<form method="post">
																						<input type="hidden" name="id"
																							   value="<?php echo $row->id; ?>">
																						<button name="ban"><a
																									class="dropdown-item">Ban</a>
																						</button>
																					</form>
																					<!--<a class="dropdown-item disabled" href="">Delete</a>-->
																					<form action="<?php echo base_url('Admin/deleteUserData'); ?>"
																						  method="post">
																						<input type="hidden"
																							   name="userId"
																							   value="<?php echo $row->id; ?>">
																						<input type="hidden" name="tab"
																							   value="1">
																						<button name="delUser"
																								type="submit"
																								onClick="return doconfirm();">
																							<a class="dropdown-item">Delete</a>
																						</button>
																					</form>
																					<script>
																						/* Delete  User data alert */
																						function doconfirm() {
																							job = confirm("Are you sure to delete this User permanently?");
																							if (job != true) {
																								return false;
																							}
																						}
																					</script>
																				</div>
																			</div>
																		</div>
																	</div>


																	<div class="profile ">
																		<div class="col-md-2">
																			<div class="profile_img edit-img-pop">
																				<a href="">
																					<?php
																					/* $name = $row->user_name;
			$parts = explode(" ", $name);
			if(count($parts) != '1'){

									$rest = substr("$parts[0]", 0, 1);
									if($parts != ""){

									  	$rest1 = substr("$parts[1]", 0, 1);
									}
									else{
								  $rest1 =   substr($name, 0,2);
									}
								//print_r($parts);
									//echo $parts[0];
									//echo $parts[1];
									}
									else {

									    $rest1 =   substr($name, 0,2);

									} */
																					$name = $row->user_name;
																					$rest = substr($name, 0, 1);

																					$name1 = $row->last_name;
																					$rest1 = substr($name1, 0, 1);
																					?>
																					<!--<img title="profile image" class="img-circle img-responsive" src="img/Group141.png">-->

																					<div class="card_img">
																						<?php if ($row->source == 'E') {
																							?>
																							<a class="name_letters"
																							   style="background: #5FC97F; display: block;"
																							   id="pop12"
																							   data-toggle="modal"
																							   data-target="#imagemodaleee<?php echo $row->id; ?>">
																								<img s
																									 src="<?php if ($row->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																										 echo $row->profile_image;
																									 } else {
																										 echo $rest;
																										 echo $rest1;
																									 } ?>"
																									 alt="<?php echo $rest;
																									 echo $rest1; ?>">
																							</a>
																						<?php } else {
																							?>

																							<a class="name_letters"
																							   style="background: #5F7BC9; display: block;"
																							   id="pop12"
																							   data-toggle="modal"
																							   data-target="#imagemodaleee<?php echo $row->id; ?>">
																								<img src="<?php if ($row->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																									echo $row->profile_image;
																								} else {
																									echo $rest;
																									echo $rest1;
																								} ?>"
																									 alt="<?php echo $rest;
																									 echo $rest1; ?>">
																							</a>

																						<?php } ?>
																					</div>

																				</a>
																				<a class="camera-imge" href=""
																				   data-toggle="modal"
																				   data-target="#picModal<?php echo $row->id; ?>"><img
																							class="img-circle img-responsivess"
																							src="img/ic_camera_alt_24px.png"></a>
																				<div class="modal fade new-pop picModal"
																					 id="picModal<?php echo $row->id; ?>"
																					 role="dialog">
																					<div class="modal-dialog" <?php if ($EditPopup == $row->id) {
																						echo "style = right:0px !important;";
																					} ?>>
																						<div class="modal-content cate">
																							<br>
																							<span>Upload Profile Image</span>
																							<?php //echo $error;
																							?>
																							<?php echo form_open_multipart('admin-dashboard'); ?>
																							<input type="hidden"
																								   name="id"
																								   value="<?php echo $row->id; ?>">
																							<input type="hidden"
																								   name="EditPopupId"
																								   value="<?php echo $row->id; ?>">
																							<input type="file"
																								   name="image"
																								   class="first-edit"/>
																							<input type="submit"
																								   name="subpic"
																								   value="Upload"
																								   class="uplode-img"/>
																							</form>


																							<div class="modal-footer">
																								<button type="button"
																										class="btn btn-default"
																										data-dismiss="modal">
																									Cancel
																								</button>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-10">
																			<form class="form" action="" method="post"
																				  id="registrationForm">
																				<div class="form-group">

																					<div class="col-md-12">
																						<input type="hidden" name="id"
																							   value="<?php echo $row->id; ?>">
																						<label for="first_name"><h4>
																								First Name</h4></label>
																						<input type="text"
																							   class="form-control"
																							   name="user_name"
																							   value="<?php echo $row->user_name; ?>"
																							   title="Enter your first name."
																							   maxlength="9" required>
																					</div>
																				</div>
																				<div class="form-group">

																					<div class="col-md-12">
																						<label for="first_name"><h4>Last
																								Name</h4></label>
																						<input type="text"
																							   class="form-control"
																							   name="last_name"
																							   value="<?php if (isset($row->last_name)) {
																								   echo $row->last_name;
																							   } ?>"
																							   title=" Enter your last name."
																							   maxlength="9" required>

																					</div>
																				</div>
																				<div class="form-group">

																					<div class="col-md-12">
																						<label for="email"><h4><img
																										src="img/ic_markunread_24px.png">Email
																							</h4></label>
																						<input class="form-control"
																							   name="email" id="email"
																							   value="<?php echo $row->user_email; ?>"
																							   readonly>
																					</div>
																				</div>
																		</div>
																	</div>

																	<div class="tab-content">
																		<div class="tab-pane active" id="home">
																			<hr>
																			<div class="form-group">

																				<div class="col-md-12 ">
																					<?php $str = $row->address;
																					$ad = (explode(",", $str, -2));
																					$add1 = implode(" ,", $ad);
																					//print_r($add1);
																					//echo $add1[0];
																					?>

																					<label for="text"><h4><img
																									src="img/ic_place_-1.png">Address
																						</h4></label>
																					<?php if ($add1 != "") { ?>
																					<input type="text"
																						   class="form-control"
																						   name="add" id="location"
																						   value="<?php echo $add1;
																						   } ?>"
																						   title=" Enter your location."
																						   required>

																					<!--<input type="text" class="form-control email-input" name="address" id="location" value="" title="Enter a location">-->

																				</div>
																			</div>

																			<div class="count_sec">

																				<div class="form-group">

																					<div class="col-md-6">
																						<div class="control-group">
																							<label class="control-label">Country</label>
																							<div class="controls">
																								<select id="country"
																										name="country"
																										class="input-xlarge"
																										required>
																									<option selected="selected"><?php echo $row->country; ?></option>
																									<?php foreach ($countries as $cou) { ?>
																										<option value="<?php echo $cou; ?>"><?php echo $cou; ?></option>
																									<?php } ?>
																								</select>
																							</div>
																						</div>
																					</div>
																				</div>


																				<div class="form-group">

																					<!--     <div class="col-md-6">
					  <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                        <select id="country" name="city" class="input-xlarge">
                            <option selected="selected"></option>
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
					 </div> --->
																					<div class="col-md-6">
																						<label for="mobile"><h4>
																								City</h4></label>
																						<input type="text"
																							   class="form-control"
																							   name="city"
																							   value="<?php echo $row->city; ?>"
																							   title="Enter City"
																							   required>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="count_sec">
																					<div class="col-md-6">
																						<label for="mobile"><h4>
																								State</h4></label>
																						<?php $str = $row->address;
																						$add = (explode(",", $str));
																						// implode(" ",$add1);
																						//	print_r($add1);
																						//echo $add1[0];


																						?>
																						<input type="text"
																							   class="form-control"
																							   name="state"
																							   value="<?php if ($add != "") {
																								   echo end($add);
																							   } ?>" title="Enter State"
																							   required>
																					</div>
																					<div class="col-md-6">
																						<label for="mobile"><h4>Zip
																								Code</h4></label>
																						<input type="text"
																							   class="form-control"
																							   name="zip" id="mobile"
																							   value="<?php echo $row->zipcode; ?>"
																							   title="Enter Zipcode"
																							   required>
																					</div>
																				</div>

																				<div class="col-md-12">
																					<label for="mobile"><h4><img
																									src="img/ic_stay_current_portrait_-2.png">Phone
																							Number</h4></label>
																					<input type="text"
																						   class="form-control"
																						   name="mobile" id="mobile"
																						   value="<?php echo $row->contact; ?>"
																						   title="Enter your mobile number."
																						   maxlength="17"
																						   placeholder="+1234 12345 12345"
																						   required>
																					<!-- pattern="^[\+]\d{4} \d{5} \d{5}$"-->

																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-12 control-label gender-sec "
																					   for="Gender">Gender</label>
																				<div class="col-md-12">
																					<label class="radio-inline"
																						   for="Gender-0">
																						<input type="radio"
																							   name="Gender"
																							   id="Gender-0"
																							   value="Male" <?php echo ($row->gender == 'Male') ? 'checked' : '' ?>
																							   checked>
																						<img src="img/Path 141.png">Male
																					</label>
																					<label class="radio-inline"
																						   for="Gender-1">
																						<input type="radio"
																							   name="Gender"
																							   id="Gender-1"
																							   value="Female" <?php echo ($row->gender == 'Female') ? 'checked' : '' ?> >
																						<img src="img/Group 309.png">
																						Female
																					</label>

																				</div>
																			</div>
																			<div class="form-group">

																				<div class="col-md-12">
																					<label for="Birthday"><h4><img
																									class="bir"
																									src="img/ic_cake_-2.png">Birthday
																						</h4></label>

																					<input type="Birthday"
																						   class="form-control"
																						   name="birthday" id="Birthday"
																						   value="<?php echo $row->dob; ?>"
																						   title="Birthday"
																						   placeholder="June 12, 1984"
																						   required>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="col-md-12">

																					<div class="save_bttn">
																						<button class="btn btn-lg"
																								data-dismiss="modal"><i
																									class="glyphicon glyphicon-repeat"></i>Cancel
																						</button>
																						<input type="hidden" name="id"
																							   value="<?php echo $row->id; ?>">

																						<button class="btn btn-lg btn-success"
																								type="submit"
																								name="edit"><i
																									class="glyphicon glyphicon-ok-sign"></i>
																							Save Changes
																						</button>
																						</form>
																					</div>
																				</div>
																			</div>


																		</div><!--/tab-pane-->
																		<!--/tab-pane-->


																	</div><!--/tab-pane-->
																</div><!--/tab-content-->
															</div><!--/col-9-->


														</div><!-- modal-content -->
													</div><!-- modal-dialog -->


														  <!-----------------------end--------------------------------->
														  <!-----------------------Front end--------------------------------->

													<div style="padding: 0px 8px!important;" class="col-md-3">
														<div id="cards" class="card">
															<div class="via_bttn">

																<?php if ($row->source == 'F') {
																	echo "<a   class='btttn_sec'> via facebook</a>";
																} else if ($row->source == 'A') {
																	echo "<a   class=''>via Apple</a>";
																} else if ($row->source == 'G') {
																	echo "<a   class=''>via Google</a>";
																} else {
																	echo "<a   class=''>via Email</a>";
																} ?>

																<div class="bttn-group">

																	<a class="nav-links" href="" data-toggle="dropdown"
																	   aria-haspopup="true" aria-expanded="false">
																		<img class="user" id='clickst'
																			 src="img/ic_more_vert_24px.png"></a>
																	<div class="dropdown-menu">
																		<a class="dropdown-item" href="" id="edit"
																		   data-toggle="modal"
																		   data-target="#imagemodales<?php echo $row->id; ?>">Edit</a>
																		<a class="dropdown-item" href=""
																		   class="btn btn-info btn-lg"
																		   data-toggle="modal"
																		   data-target="#myModal<?php echo $row->id; ?>">Reset
																			Password</a>
																		<form method="post">
																			<input type="hidden" name="id"
																				   value="<?php echo $row->id; ?>">
																			<button name="ban"><a class="dropdown-item">Ban</a>
																			</button>
																		</form>
																		<!--<a class="dropdown-item disabled" href="">Delete</a>-->
																		<form action="<?php echo base_url('Admin/deleteUserData'); ?>"
																			  method="post">
																			<input type="hidden" name="userId"
																				   value="<?php echo $row->id; ?>">
																			<input type="hidden" name="tab" value="1">
																			<button name="delUser" type="submit"
																					onClick="return doconfirm();"><a
																						class="dropdown-item">Delete</a>
																			</button>
																		</form>
																		<script>
																			/* Delete  User data alert */
																			function doconfirm() {
																				job = confirm("Are you sure to delete this User permanently?");
																				if (job != true) {
																					return false;
																				}
																			}
																		</script>
																	</div>
																</div>
															</div>

															<div class="card-sec">

																<?php
																/*  $name = $row->user_name;
									$parts = explode(" ", $name);

									if(count($parts) != '1'){

									$rest = substr("$parts[0]", 0, 1);
									if($parts != ""){

									  	$rest1 = substr("$parts[1]", 0, 1);
									}
									else{

									}
								//print_r($parts);
									//echo $parts[0];
									//echo $parts[1];
									}
									else {

									    $rest1 =   substr($name, 0,2);

									} */
																$name = $row->user_name;
																$rest = substr($name, 0, 1);

																$name1 = $row->last_name;
																$rest1 = substr($name1, 0, 1);

																?>

																<div class="card_img">
																	<?php if ($row->source == 'E') {
																		?>
																		<a class="name_letters"
																		   style="background: #5FC97F;" id="pop1"
																		   data-toggle="modal"
																		   data-target="#imagemodal<?php echo $row->id; ?>">
																			<img class="propic"
																				 src="<?php if ($row->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																					 echo $row->profile_image;
																				 } else {
																					 echo $rest;
																					 echo $rest1;
																				 } ?>" alt="<?php echo $rest;
																			echo $rest1; ?>">
																		</a>
																	<?php } else {
																		$str = 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg';
//print_r (explode(" ",$str));
																		?>

																		<a class="name_letters"
																		   style="background: #5F7BC9;" id="pop1"
																		   data-toggle="modal"
																		   data-target="#imagemodal<?php echo $row->id; ?>">
																			<img class="propic"
																				 src="<?php if ($row->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																					 echo $row->profile_image;
																				 } else {
																					 echo $rest;
																					 echo $rest1;
																				 } ?>" alt="<?php echo $rest;
																			echo $rest1; ?>">
																		</a>

																	<?php } ?>
																	<script>
																		$('img').on('error', function () {
																			$(this).replaceWith(function () {
																				return $(this).prop('alt');
																			});
																		})</script>
																</div>
																<div class="card-sub">
																	<h1><?php echo $row->user_name; ?><?php echo $row->last_name; ?></h1>


																	<a class="trun iffyTip3 hideText3 "
																	   href="mailto:<?php echo $row->user_email; ?>"
																	   target="_blank"
																	   title="<?php echo $row->user_email; ?>"><span
																				title=""><?php
																			echo $email = $row->user_email;


																			/*if(strlen($email) >= '18'){
								          echo substr(trim($email),0,18).'...';
								     }
								     else {
								         echo $email;
								     }*/


																			?></span></a>
																</div>
															</div>
															<div class="card-img-sec ">

																<p><img src="img/loction.png">

																	<span class="truncate iffyTip hideText2">
								     <?php
									 $addrs = $row->address;
									 //echo substr($addrs, 0, 30);
									 echo trim($addrs);
									 if (strlen($addrs) >= 30) {//echo "...";
									 }


									 ?>



								     </span></p>


																<p><img src="img/phone.png">
																	<span> <?php echo $row->contact; ?></span></p>

																<?php if ($row->gender == 'Male') { ?>

																	<p>
																		<img src="img/Path 141.png"><span><?php echo $row->gender; ?></span>
																	</p>
																<?php } else { ?>
																	<p>
																		<img src="img/Group 309.png"><span><?php echo $row->gender; ?></span>
																	</p>
																<?php } ?>
																<p>
																	<img src="img/birthdy.png"><span><?php echo $row->dob; ?></span>
																</p>

															</div>


														</div>
													</div>
													<?php
												}

												?>

											</div>
										</div>


									</div>

									<div class="tab-pane <?php if ($tab == '0') {
										echo "active";
									} else {
										echo "fade";
									} ?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
										<table class="table-responsive">
											<?php if (count($banneduser) != 0) { ?>
												<tr class="boder_sec">
													<th id="user">User<img src="img/Group 188.png"></th>
													<th id="sign">Signed via<img src="img/Group 188.png"></th>
													<!--<th id="sign">Signed via<img src="img/Group 188.png"></th> -->
													<!-- <th id="date"><img src="img/Group 188.png"></th>-->
													<th id="ban">Date Banned<img src="img/Group 188.png"></th>
													<th><span>Action</span></th>
													</a>
												</tr>

											<?php } ?>
											<?php

											if (count($banneduser) != 0) {
												//echo count($banneduser);
												foreach ($banneduser as $row1) {


													/*  $username = $row1->user_name;
						$parts = explode(" ", $username);
							if(count($parts) != '1'){

									$rest = substr("$parts[0]", 0, 1);
									if($parts != ""){

									  	$rest1 = substr("$parts[1]", 0, 1);
									}
									else{
								  $rest1 =   substr($name, 0,2);
									}
								//print_r($parts);
									//echo $parts[0];
									//echo $parts[1];
									}
									else {

									    $rest1 =   substr($name, 0,2);

									} */
													$name = $row1->user_name;
													$rest = substr($name, 0, 1);

													$name1 = $row1->last_name;
													$rest1 = substr($name1, 0, 1);
													/* 	print_r($name);
									print_r($name1); */

													?>
													<tr>
														<?php if ($row1->source == 'E') { ?>

															<td class="tabl_img"><a class="name_letters" id="pop123"
																					style="background: #5FC97F !important;"
																					id="pop12" data-toggle="modal"
																					data-target="#imageban<?php echo $row1->id; ?>"><img
																			class="propic"
																			src="<?php if ($row1->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																				echo $row1->profile_image;
																			} else {
																				echo $rest;
																				echo $rest1;
																			} ?>" alt="<?php echo $rest;
																	echo $rest1; ?>"></a><span
																		class="ven-text"><?php echo $row1->user_name; ?><?php echo $row1->last_name; ?></span>
															</td>

														<?php } else { ?>
															<td class="tabl_img"><a class="name_letters" id="pop123"
																					style="background: #5F7BC9;"
																					id="pop12" data-toggle="modal"
																					data-target="#imageban<?php echo $row1->id; ?>"><img
																			class="propic"
																			src="<?php if ($row1->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																				echo $row1->profile_image;
																			} else {
																				echo $rest;
																				echo $rest1;
																			} ?>" alt="<?php echo $rest;
																	echo $rest1; ?>"></a><span
																		class="ven-text"><?php echo $row1->user_name; ?><?php echo $row1->last_name; ?></span>
															</td>
														<?php } ?>
														<?php if ($row1->source == 'F') {
															echo "<td class='facebook_bbtn'><a   class='btttn_sec1email' style='background: #3c66c4;'> via facebook</a></td>";

														} else {
															echo "<td class='facebook_bbtn'><a   class='btttn_sec1email' style='background: #09cfbc;'>via Email</a></td>";
														} ?>

														<td style="padding-left: 16px;"><?php
															echo date('M d, Y', strtotime($row1->ben_start)); ?></td>
														<!--<td></td>-->
														<td class="action">
															<div class="bttn-group">

																<a class="nav-links" href="" data-toggle="dropdown"
																   aria-haspopup="true" aria-expanded="false">
																	<img class="users" src="img/ic_more_vert_24px.png"></a>
																<div class="dropdown-menu">
																	<!-- <a class="dropdown-item"  id="useredit">Edit</a>-->

																	<a class="dropdown-item" href="" id="edit"
																	   data-toggle="modal"
																	   data-target="#imagemodales<?php echo $row1->id; ?>">Edit</a>

																	<a class="dropdown-item" href="" data-toggle="modal"
																	   data-target="#myModalss<?php echo $row1->id; ?>">Reset
																		Password</a>
																	<form method="post">
																		<input type="hidden" name="id"
																			   value="<?php echo $row1->id; ?>">
																		<button name="liftban"><a class="dropdown-item">Lift
																				Ban</a></button>
																	</form>

																	<!--<a class="dropdown-item disabled" href="">Delete</a>-->
																	<form action="<?php echo base_url('Admin/deleteUserData'); ?>"
																		  method="post">
																		<input type="hidden" name="userId"
																			   value="<?php echo $row1->id; ?>">
																		<input type="hidden" name="tab" value="0">
																		<button name="delUser" type="submit"
																				onClick="return doconfirm();"><a
																					class="dropdown-item">Delete</a>
																		</button>
																	</form>
																	<script>
																		/* Delete  User data alert */
																		function doconfirm() {
																			job = confirm("Are you sure to delete this User permanently?");
																			if (job != true) {
																				return false;
																			}
																		}
																	</script>
																</div>
															</div>
														</td>
													</tr>
													<script>
														$('img').on('error', function () {
															$(this).replaceWith(function () {
																return $(this).prop('alt');
															});
														})</script>


													<!----------------------------------image modal popup for banned users----------------------->
													<div class="modal right main-model right-modeles aman-pop-sect"
														 id="imageban<?php echo $row1->id; ?>" tabindex="-1"
														 role="dialog" aria-labelledby="myModalLabel2">
														<div class="modal-dialog" role="document">
															<div class="modal-content">


																<div class="modal-header">
																	<h4 class="modal-title" id="myModalLabel2"
																		class="close" data-dismiss="modal"
																		aria-label="Close"><img
																				src="img/ic_arrow_back_24px.png"></h4>


																	<div class="via_bttn">


																		<div class="bttn-group">

																			<a class="nav-links" href=""
																			   data-toggle="dropdown"
																			   aria-haspopup="true"
																			   aria-expanded="false">
																				<img class="user" id='clickst'
																					 src="img/ic_more_vert_24px.png"></a>
																			<div class="dropdown-menu">
																				<a id="hide12" class="dropdown-item"
																				   href="" id="edit" data-toggle="modal"
																				   data-target="#imagemodales<?php echo $row1->id; ?>">Edit</a>
																				<a id="hide5"
																				   class="hide_popup dropdown-item"
																				   href="" class="btn btn-info btn-lg"
																				   data-toggle="modal"
																				   data-target="#myModalss<?php echo $row1->id; ?>">Reset
																					Password</a>
																				<form method="post">
																					<input type="hidden" name="id"
																						   value="<?php echo $row1->id; ?>">
																					<button name="ban"><a
																								class="dropdown-item">Ban</a>
																					</button>
																				</form>
																				<!--<a class="dropdown-item disabled" href="">Delete</a>-->
																				<form action="<?php echo base_url('Admin/deleteUserData'); ?>"
																					  method="post">
																					<input type="hidden" name="userId"
																						   value="<?php echo $row1->id; ?>">
																					<input type="hidden" name="tab"
																						   value="0">
																					<button name="delUser" type="submit"
																							onClick="return doconfirm();">
																						<a class="dropdown-item">Delete</a>
																					</button>
																				</form>
																				<script>
																					/* Delete  User data alert */
																					function doconfirm() {
																						job = confirm("Are you sure to delete this User permanently?");
																						if (job != true) {
																							return false;
																						}
																					}
																				</script>

																			</div>
																		</div>
																	</div>
																</div>


																<div class="modal-body">
																	<div class="aman_right_popup">
																		<?php
																		/*  $username = $row1->user_name;
						$parts = explode(" ", $username);
						if(count($parts) != '1'){

									$rest = substr("$parts[0]", 0, 1);
									if($parts != ""){

									  	$rest1 = substr("$parts[1]", 0, 1);
									}
									else{
								  $rest1 =   substr($name, 0,2);
									}
								//print_r($parts);
									//echo $parts[0];
									//echo $parts[1];
									}
									else {

									    $rest1 =   substr($name, 0,2);

									}		 */
																		$name = $row1->user_name;
																		$rest = substr($name, 0, 1);

																		$name1 = $row1->last_name;
																		$rest1 = substr($name1, 0, 1);
																		?>
																		<!--<img src="img/Group141.png">-->
																		<!--<div class="card_img">
		  <a href="" class="name_letters" id="pop12" data-toggle="modal" data-target="#imagemodal<?php echo $row1->id; ?>">
		  <?php //echo $rest;
																		?></a>
	    </div>-->


																		<div class="card_img">
																			<?php if ($row1->source == 'E') {
																				?>
																				<a href="" class="name_letters"
																				   style="background: #5FC97F;"
																				   id="pop12" data-toggle="modal"
																				   data-target="#imagemodal<?php echo $row1->id; ?>"><img
																							class="poppic"
																							src="<?php if ($row1->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																								echo $row1->profile_image;
																							} else {
																								echo $rest;
																								echo $rest1;
																							} ?>" alt="<?php echo $rest;
																					echo $rest1; ?>">
																				</a>
																			<?php } else {
																				?>

																				<a href="" class="name_letters"
																				   style="background: #5F7BC9;"
																				   id="pop12" data-toggle="modal"
																				   data-target="#imagemodal<?php echo $row1->id; ?>"><img
																							class="poppic"
																							src="<?php if ($row1->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																								echo $row1->profile_image;
																							} else {
																								echo $rest;
																								echo $rest1;
																							} ?>" alt="<?php echo $rest;
																					echo $rest1; ?>">
																				</a>

																			<?php } ?>
																		</div>
																		<h2><?php echo $row1->user_name; ?><?php echo $row1->last_name; ?></h2>
																		<!--<a class="email_text" href="mailto:amanbirdi@gmail.com" target="_blank">amanbirdi@gmail.com</a>-->
																		<a class="email_text" href=""
																		   target="_blank"><?php echo $row1->user_email; ?></a>
																		<div class="via_bttn email_via">

																			<?php if ($row1->source == 'F') {
																				echo "<a  class='btttn_sec'> via facebook</a>";
																			} else {
																				echo "<a  class=''>via Email</a>";
																			} ?>
																		</div>
																	</div>
																	<div class="card-img-sec user-des-sec">
																		<!-- <p><img src="img/ic_place_-1.png"><span>Address</span><br>Studio 103 The  Business Centre 61 Wellfield Road <br>Roath Cardiff,United Kingdom</p>-->
																		<p>
																			<img src="img/ic_place_-1.png">
																			<span>Address</span><br>
																			<span class="space-pop"><?php echo $row1->address;
																				echo ", " . $row1->country; ?>
								</span>
																		</p>

																		<p>
																			<img src="img/ic_stay_current_portrait_-1.png"><span>Phone Number</span><br><span
																					class="space-pop"><?php echo $row1->contact; ?></span>
																		</p>
																		<?php if ($row1->gender == 'Male') { ?>

																			<p>
																				<img src="img/Path 141.png"><span>Gender</span><br><span
																						class="space-pop"><?php echo $row1->gender; ?></span>
																			</p>
																		<?php } else { ?>
																			<p><span>Gender</span><br><img
																						class="gender-pop"
																						src="img/Group 3099.png"><span
																						class="space-pop"><?php echo $row1->gender; ?></span>
																			</p>
																		<?php } ?>
																		<p><img class="bir"
																				src="img/ic_cake_-2.png"><span>Birthday</span><br><span
																					class="space-pop"><?php echo $row1->dob; ?></span>
																		</p>

																	</div>
																</div>

															</div><!-- modal-content -->
														</div><!-- modal-dialog -->
													</div>
													<script>
														$('img').on('error', function () {
															$(this).replaceWith(function () {
																return $(this).prop('alt');
															});
														})</script>
													<!--------------------------edit modal popup for banned users----------------------->


													<div class="modal right  new-edit-pops"
														 id="imagemodales<?php echo $row1->id; ?>" tabindex="-1"
														 role="dialog" aria-labelledby="myModalLabel2">
														<div class="modal-dialog" role="document">
															<div class="modal-content">

																<div id="editview" class="snippet">
																	<div class="modal-header">
																		<h4 class="modal-title" id="myModalLabel2"
																			class="close" data-dismiss="modal"
																			aria-label="Close"><img
																					src="img/ic_arrow_back_24px.png">
																		</h4>

																		<h1>Edit User Profile</h1>

																		<div class="via_bttn">
																			<?php
																			/* 	if($value->source == 'F'){
										echo "<a  href='' class='btttn_sec'> Via facebook</a>";
									}
									else{
										echo "<a  href='' class=''>Via Email</a>";
									}  */
																			?>
																			<div class="bttn-group">

																				<a class="nav-links" href="#"
																				   data-toggle="dropdown"
																				   aria-haspopup="true"
																				   aria-expanded="false">
																					<img class="user" id='clickst'
																						 src="img/ic_more_vert_24px.png"></a>
																				<div class="dropdown-menu">

																					<a id="hide6"
																					   class="hide_popup dropdown-item"
																					   href="#"
																					   class="btn btn-info btn-lg"
																					   data-toggle="modal"
																					   data-target="#myModalss<?php echo $row1->id; ?>">Reset
																						Password</a>
																					<form method="post">
																						<input type="hidden" name="id"
																							   value="<?php echo $row1->id; ?>">
																						<button name="liftban"><a
																									class="dropdown-item">Lift
																								Ban</a></button>
																					</form>
																					<!--<a class="dropdown-item disabled" href="">Delete</a>-->
																					<form action="<?php echo base_url('Admin/deleteUserData'); ?>"
																						  method="post">
																						<input type="hidden"
																							   name="userId"
																							   value="<?php echo $row1->id; ?>">
																						<input type="hidden" name="tab"
																							   value="0">
																						<button name="delUser"
																								type="submit"
																								onClick="return doconfirm();">
																							<a class="dropdown-item">Delete</a>
																						</button>
																					</form>
																					<script>
																						/* Delete  User data alert */
																						function doconfirm() {
																							job = confirm("Are you sure to delete this User permanently?");
																							if (job != true) {
																								return false;
																							}
																						}
																					</script>
																				</div>
																			</div>
																		</div>

																	</div>


																	<div class="profile ">
																		<div class="col-md-2">
																			<div class="profile_img edit-img-pop">
																				<a href="">
																					<?php
																					/* $name = $row1->user_name;
			$parts = explode(" ", $name);
			if(count($parts) != '1'){

									$rest = substr("$parts[0]", 0, 1);
									if($parts != ""){

									  	$rest1 = substr("$parts[1]", 0, 1);
									}
									else{
								  $rest1 =   substr($name, 0,2);
									}
								//print_r($parts);
									//echo $parts[0];
									//echo $parts[1];
									}
									else {

									    $rest1 =   substr($name, 0,2);

									} */
																					$name = $row1->user_name;
																					$rest = substr($name, 0, 1);

																					$name1 = $row1->last_name;
																					$rest1 = substr($name1, 0, 1);
																					?>
																					<!--<img title="profile image" class="img-circle img-responsive" src="img/Group141.png">-->

																					<div class="card_img">
																						<?php if ($row1->source == 'E') {
																							?>
																							<a class="name_letters"
																							   style="background: #5FC97F; display: block;"
																							   id="pop12"
																							   data-toggle="modal"
																							   data-target="#imagemodaleee<?php echo $row1->id; ?>">
																								<img src="<?php if ($row1->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																									echo $row1->profile_image;
																								} else {
																									echo $rest;
																									echo $rest1;
																								} ?>"
																									 alt="<?php echo $rest;
																									 echo $rest1; ?>">
																							</a>
																						<?php } else {
																							?>

																							<a class="name_letters"
																							   style="background: #5F7BC9; display: block;"
																							   id="pop12"
																							   data-toggle="modal"
																							   data-target="#imagemodaleee<?php echo $row1->id; ?>">
																								<img src="<?php if ($row1->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																									echo $row1->profile_image;
																								} else {
																									echo $rest;
																									echo $rest1;
																								} ?>"
																									 alt="<?php echo $rest;
																									 echo $rest1; ?>">
																							</a>

																						<?php } ?>
																					</div>

																				</a>
																				<a class="camera-imge" href=""
																				   data-toggle="modal"
																				   data-target="#picModal<?php echo $row1->id; ?>"><img
																							class="img-circle img-responsivess"
																							src="img/ic_camera_alt_24px.png"></a>
																				<div class="modal fade new-pop picModal"
																					 id="picModal<?php echo $row1->id; ?>"
																					 role="dialog">
																					<div class="modal-dialog">
																						<div class="modal-content cate">
																							<br>
																							<span>Upload Profile Image</span>
																							<?php //echo $error;
																							?>
																							<?php echo form_open_multipart('admin-dashboard'); ?>
																							<input type="hidden"
																								   name="id"
																								   value="<?php echo $row1->id; ?>">
																							<input type="file"
																								   name="image"
																								   class="first-edit"/>
																							<input type="submit"
																								   name="subpic"
																								   value="Upload"
																								   class="uplode-img"/>
																							</form>


																							<div class="modal-footer">
																								<button type="button"
																										class="btn btn-default"
																										data-dismiss="modal">
																									Cancel
																								</button>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-10">
																			<form class="form" action="" method="post"
																				  id="">
																				<div class="form-group">

																					<div class="col-md-12">
																						<input type="hidden" name="id"
																							   value="<?php echo $row1->id; ?>">
																						<label for="first_name"><h4>
																								First Name</h4></label>
																						<input type="text"
																							   class="form-control"
																							   name="user_name"
																							   value="<?php echo $row1->user_name; ?>"
																							   title="Enter your first name."
																							   maxlength="9" required>
																					</div>
																				</div>
																				<div class="form-group">
																					<div class="col-md-12">
																						<label for="first_name"><h4>Last
																								Name</h4></label>
																						<input type="text"
																							   class="form-control"
																							   name="last_name"
																							   value="<?php echo $row1->last_name; ?>"
																							   title="Enter your last name."
																							   maxlength="9" required>
																					</div>
																				</div>
																				<div class="form-group">

																					<div class="col-md-12">
																						<label for="email"><h4><img
																										src="img/ic_markunread_24px.png">Email
																							</h4></label>
																						<input class="form-control"
																							   name="email" id="email"
																							   value="<?php echo $row1->user_email; ?>"
																							   readonly>
																					</div>
																				</div>
																		</div>
																	</div>

																	<div class="tab-content">
																		<div class="tab-pane active" id="home">
																			<hr>
																			<div class="form-group">

																				<div class="col-md-12 ">

																					<?php $str = $row->address;
																					$add1 = (explode(",", $str));

																					?>
																					<label for="text"><h4><img
																									src="img/ic_place_-1.png">Address
																						</h4></label>
																					<?php if ($add1 != "") { ?>
																					<input type="text"
																						   class="form-control"
																						   name="add" id="location"
																						   value="<?php echo $add1[0];
																						   } ?>"
																						   title=" Enter your location."
																						   required>

																					<!--<input type="text" class="form-control email-input" name="address" id="location" value="" title="Enter a location">-->

																				</div>
																			</div>

																			<div class="count_sec">

																				<div class="form-group">

																					<div class="col-md-6">
																						<div class="control-group">
																							<label class="control-label">Country</label>
																							<div class="controls">
																								<select id="country"
																										name="country"
																										class="input-xlarge"
																										required>
																									<option selected="selected"><?php echo $row1->country; ?></option>
																									<option value="United Kingdom">
																										United Kingdom
																									</option>
																									<option value="Afghanistan">
																										Afghanistan
																									</option>
																									<option value="Albania">
																										Albania
																									</option>
																									<option value="Algeria">
																										Algeria
																									</option>
																									<option value="American Samoa</">
																										American Samoa
																									</option>
																									<option value="Andorra">
																										Andorra
																									</option>
																									<option value="Angola">
																										Angola
																									</option>
																									<option value="Anguilla">
																										Anguilla
																									</option>
																									<option value="Antarctica">
																										Antarctica
																									</option>
																									<option value="Antigua and Barbuda">
																										Antigua and
																										Barbuda
																									</option>
																									<option value="Argentina">
																										Argentina
																									</option>
																									<option value="Armenia">
																										Armenia
																									</option>
																									<option value="Aruba">
																										Aruba
																									</option>
																									<option value="Australia">
																										Australia
																									</option>
																									<option value="Austria">
																										Austria
																									</option>
																									<option value="Azerbaijan">
																										Azerbaijan
																									</option>
																									<option value="Bahamas">
																										Bahamas
																									</option>
																									<option value="Bahrain">
																										Bahrain
																									</option>
																									<option value="Bangladesh">
																										Bangladesh
																									</option>
																									<option value="Barbados">
																										Barbados
																									</option>
																									<option value="Belarus">
																										Belarus
																									</option>
																									<option value="Belgium">
																										Belgium
																									</option>
																									<option value="Belize">
																										Belize
																									</option>
																									<option value="Benin">
																										Benin
																									</option>
																									<option value="Bermuda">
																										Bermuda
																									</option>
																									<option value="Bhutan">
																										Bhutan
																									</option>
																									<option value="BO">
																										Bolivia
																									</option>
																									<option value="Bosnia and Herzegowina">
																										Bosnia and
																										Herzegowina
																									</option>
																									<option value="Botswana">
																										Botswana
																									</option>
																									<option value="Bouvet Island">
																										Bouvet Island
																									</option>
																									<option value="Brazil">
																										Brazil
																									</option>
																									<option value="British Indian Ocean Territory">
																										British Indian
																										Ocean Territory
																									</option>
																									<option value="Brunei Darussalam">
																										Brunei
																										Darussalam
																									</option>
																									<option value="Bulgaria">
																										Bulgaria
																									</option>
																									<option value="Burkina Faso">
																										Burkina Faso
																									</option>
																									<option value="Burundi">
																										Burundi
																									</option>
																									<option value="Cambodia">
																										Cambodia
																									</option>
																									<option value="Cameroon">
																										Cameroon
																									</option>
																									<option value="Canada">
																										Canada
																									</option>
																									<option value="Cape Verde">
																										Cape Verde
																									</option>
																									<option value="Cayman Islands">
																										Cayman Islands
																									</option>
																									<option value="Central African Republic">
																										Central African
																										Republic
																									</option>
																									<option value="Chad">
																										Chad
																									</option>
																									<option value="Chile">
																										Chile
																									</option>
																									<option value="China">
																										China
																									</option>
																									<option value="Christmas Island">
																										Christmas Island
																									</option>
																									<option value="Cocos (Keeling) Islands">
																										Cocos (Keeling)
																										Islands
																									</option>
																									<option value="Colombia">
																										Colombia
																									</option>
																									<option value="Comoros">
																										Comoros
																									</option>
																									<option value="Congo">
																										Congo
																									</option>
																									<option value="Congo, the Democratic Republic of the">
																										Congo, the
																										Democratic
																										Republic of the
																									</option>
																									<option value="Cook Islands">
																										Cook Islands
																									</option>
																									<option value="Costa Rica">
																										Costa Rica
																									</option>
																									<option value="Cote d'Ivoire">
																										Cote d'Ivoire
																									</option>
																									<option value="Croatia (Hrvatska)">
																										Croatia
																										(Hrvatska)
																									</option>
																									<option value="Cuba">
																										Cuba
																									</option>
																									<option value="Cyprus">
																										Cyprus
																									</option>
																									<option value="Czech Republic">
																										Czech Republic
																									</option>
																									<option value="Denmark">
																										Denmark
																									</option>
																									<option value="Djibouti">
																										Djibouti
																									</option>
																									<option value="Dominica">
																										Dominica
																									</option>
																									<option value="Dominican Republic">
																										Dominican
																										Republic
																									</option>
																									<option value="East Timor">
																										East Timor
																									</option>
																									<option value="Ecuador">
																										Ecuador
																									</option>
																									<option value="Egypt">
																										Egypt
																									</option>
																									<option value="El Salvador">
																										El Salvador
																									</option>
																									<option value="Equatorial Guinea">
																										Equatorial
																										Guinea
																									</option>
																									<option value="Eritrea">
																										Eritrea
																									</option>
																									<option value="Estonia">
																										Estonia
																									</option>
																									<option value="Ethiopia">
																										Ethiopia
																									</option>
																									<option value="Falkland Islands (Malvinas)">
																										Falkland Islands
																										(Malvinas)
																									</option>
																									<option value="Faroe Islands">
																										Faroe Islands
																									</option>
																									<option value="Fiji">
																										Fiji
																									</option>
																									<option value="Finland">
																										Finland
																									</option>
																									<option value="France">
																										France
																									</option>
																									<option value="France, Metropolitan">
																										France,
																										Metropolitan
																									</option>
																									<option value="French Guiana">
																										French Guiana
																									</option>
																									<option value="French Polynesia">
																										French Polynesia
																									</option>
																									<option value="French Southern Territories">
																										French Southern
																										Territories
																									</option>
																									<option value="Gabon">
																										Gabon
																									</option>
																									<option value="Gambia">
																										Gambia
																									</option>
																									<option value="Georgia">
																										Georgia
																									</option>
																									<option value="Germany">
																										Germany
																									</option>
																									<option value="Ghana">
																										Ghana
																									</option>
																									<option value="Gibraltar">
																										Gibraltar
																									</option>
																									<option value="Greece">
																										Greece
																									</option>
																									<option value="Greenland">
																										Greenland
																									</option>
																									<option value="Grenada">
																										Grenada
																									</option>
																									<option value="Guadeloupe">
																										Guadeloupe
																									</option>
																									<option value="Guam">
																										Guam
																									</option>
																									<option value="Guatemala">
																										Guatemala
																									</option>
																									<option value="Guinea">
																										Guinea
																									</option>
																									<option value="Guinea-Bissau">
																										Guinea-Bissau
																									</option>
																									<option value="Guyana">
																										Guyana
																									</option>
																									<option value="Haiti">
																										Haiti
																									</option>
																									<option value="Heard and Mc Donald Islands">
																										Heard and Mc
																										Donald Islands
																									</option>
																									<option value="Holy See (Vatican City State)">
																										Holy See
																										(Vatican City
																										State)
																									</option>
																									<option value="Honduras">
																										Honduras
																									</option>
																									<option value="Hong Kong">
																										Hong Kong
																									</option>
																									<option value="Hungary">
																										Hungary
																									</option>
																									<option value="Iceland">
																										Iceland
																									</option>
																									<option value="India">
																										India
																									</option>
																									<option value="Indonesia">
																										Indonesia
																									</option>
																									<option value="Iran (Islamic Republic of)">
																										Iran (Islamic
																										Republic of)
																									</option>
																									<option value="Iraq">
																										Iraq
																									</option>
																									<option value="Ireland">
																										Ireland
																									</option>
																									<option value="Israel">
																										Israel
																									</option>
																									<option value="Italy">
																										Italy
																									</option>
																									<option value="Jamaica">
																										Jamaica
																									</option>
																									<option value="Japan">
																										Japan
																									</option>
																									<option value="Jordan">
																										Jordan
																									</option>
																									<option value="Kazakhstan">
																										Kazakhstan
																									</option>
																									<option value="Kenya">
																										Kenya
																									</option>
																									<option value="Kiribati">
																										Kiribati
																									</option>
																									<option value="Korea, Democratic People's Republic of">
																										Korea,
																										Democratic
																										People's
																										Republic of
																									</option>
																									<option value="Korea, Republic of">
																										Korea, Republic
																										of
																									</option>
																									<option value="Kuwait">
																										Kuwait
																									</option>
																									<option value="Kyrgyzstan">
																										Kyrgyzstan
																									</option>
																									<option value="Lao People's Democratic Republic">
																										Lao People's
																										Democratic
																										Republic
																									</option>
																									<option value="Latvia">
																										Latvia
																									</option>
																									<option value="Lebanon">
																										Lebanon
																									</option>
																									<option value="Lesotho">
																										Lesotho
																									</option>
																									<option value="Liberia">
																										Liberia
																									</option>
																									<option value="Libyan Arab Jamahiriya">
																										Libyan Arab
																										Jamahiriya
																									</option>
																									<option value="Liechtenstein">
																										Liechtenstein
																									</option>
																									<option value="Lithuania">
																										Lithuania
																									</option>
																									<option value="Luxembourg">
																										Luxembourg
																									</option>
																									<option value="Macau">
																										Macau
																									</option>
																									<option value="Macedonia, The Former Yugoslav Republic of">
																										Macedonia, The
																										Former Yugoslav
																										Republic of
																									</option>
																									<option value="Madagascar">
																										Madagascar
																									</option>
																									<option value="Malawi">
																										Malawi
																									</option>
																									<option value="Malaysia">
																										Malaysia
																									</option>
																									<option value="Maldives">
																										Maldives
																									</option>
																									<option value="Mali">
																										Mali
																									</option>
																									<option value="Malta">
																										Malta
																									</option>
																									<option value="Marshall Islands">
																										Marshall Islands
																									</option>
																									<option value="Martinique">
																										Martinique
																									</option>
																									<option value="Mauritania">
																										Mauritania
																									</option>
																									<option value="Mauritius">
																										Mauritius
																									</option>
																									<option value="Mayotte">
																										Mayotte
																									</option>
																									<option value="Mexico">
																										Mexico
																									</option>
																									<option value="Micronesia, Federated States of">
																										Micronesia,
																										Federated States
																										of
																									</option>
																									<option value="Moldova, Republic of">
																										Moldova,
																										Republic of
																									</option>
																									<option value="Monaco">
																										Monaco
																									</option>
																									<option value="Mongolia">
																										Mongolia
																									</option>
																									<option value="Montserrat">
																										Montserrat
																									</option>
																									<option value="Morocco">
																										Morocco
																									</option>
																									<option value="Mozambique">
																										Mozambique
																									</option>
																									<option value="Myanmar">
																										Myanmar
																									</option>
																									<option value="Namibia">
																										Namibia
																									</option>
																									<option value="Nauru">
																										Nauru
																									</option>
																									<option value="Nepal">
																										Nepal
																									</option>
																									<option value="Netherlands">
																										Netherlands
																									</option>
																									<option value="Netherlands Antilles">
																										Netherlands
																										Antilles
																									</option>
																									<option value="New Caledonia">
																										New Caledonia
																									</option>
																									<option value="New Zealand">
																										New Zealand
																									</option>
																									<option value="Nicaragua">
																										Nicaragua
																									</option>
																									<option value="Niger">
																										Niger
																									</option>
																									<option value="Nigeria">
																										Nigeria
																									</option>
																									<option value="Niue">
																										Niue
																									</option>
																									<option value="Norfolk Island">
																										Norfolk Island
																									</option>
																									<option value="Northern Mariana Islands">
																										Northern Mariana
																										Islands
																									</option>
																									<option value="Norway">
																										Norway
																									</option>
																									<option value="Oman">
																										Oman
																									</option>
																									<option value="Pakistan">
																										Pakistan
																									</option>
																									<option value="Palau">
																										Palau
																									</option>
																									<option value="Panama">
																										Panama
																									</option>
																									<option value="Paraguay">
																										Paraguay
																									</option>
																									<option value="Peru">
																										Peru
																									</option>
																									<option value="Papua New Guinea">
																										Papua New Guinea
																									</option>
																									<option value="Philippines">
																										Philippines
																									</option>
																									<option value="Pitcairn">
																										Pitcairn
																									</option>
																									<option value="Poland">
																										Poland
																									</option>
																									<option value="Portugal">
																										Portugal
																									</option>
																									<option value="Puerto Rico">
																										Puerto Rico
																									</option>
																									<option value="Qatar">
																										Qatar
																									</option>
																									<option value="Reunion">
																										Reunion
																									</option>
																									<option value="Romania">
																										Romania
																									</option>
																									<option value="Rwanda">
																										Rwanda
																									</option>
																									<option value="Russian Federation">
																										Russian
																										Federation
																									</option>
																									<option value="Saint Kitts and Nevis">
																										Saint Kitts and
																										Nevis
																									</option>
																									<option value="Saint LUCIA">
																										Saint LUCIA
																									</option>
																									<option value="Saint Vincent and the Grenadines">
																										Saint Vincent
																										and the
																										Grenadines
																									</option>
																									<option value="Samoa">
																										Samoa
																									</option>
																									<option value="San Marino">
																										San Marino
																									</option>
																									<option value="Sao Tome and Principe">
																										Sao Tome and
																										Principe
																									</option>
																									<option value="Saudi Arabia">
																										Saudi Arabia
																									</option>
																									<option value="Senegal">
																										Senegal
																									</option>
																									<option value="Seychelles">
																										Seychelles
																									</option>
																									<option value="Sierra Leone">
																										Sierra Leone
																									</option>
																									<option value="Singapore">
																										Singapore
																									</option>
																									<option value="Slovakia (Slovak Republic)">
																										Slovakia (Slovak
																										Republic)
																									</option>
																									<option value="Slovenia">
																										Slovenia
																									</option>
																									<option value="Solomon Islands">
																										Solomon Islands
																									</option>
																									<option value="Somalia">
																										Somalia
																									</option>
																									<option value="South Africa">
																										South Africa
																									</option>
																									<option value="South Georgia and the South Sandwich Islands">
																										South Georgia
																										and the South
																										Sandwich Islands
																									</option>
																									<option value="Spain">
																										Spain
																									</option>
																									<option value="Sri Lanka">
																										Sri Lanka
																									</option>
																									<option value="St. Helena">
																										St. Helena
																									</option>
																									<option value="St. Pierre and Miquelon">
																										St. Pierre and
																										Miquelon
																									</option>
																									<option value="Sudan">
																										Sudan
																									</option>
																									<option value="Suriname">
																										Suriname
																									</option>
																									<option value="Svalbard and Jan Mayen Islands">
																										Svalbard and Jan
																										Mayen Islands
																									</option>
																									<option value="Swaziland">
																										Swaziland
																									</option>
																									<option value="Sweden">
																										Sweden
																									</option>
																									<option value="Switzerland">
																										Switzerland
																									</option>
																									<option value="Syrian Arab Republic">
																										Syrian Arab
																										Republic
																									</option>
																									<option value="Taiwan, Province of China">
																										Taiwan, Province
																										of China
																									</option>
																									<option value="Tajikistan">
																										Tajikistan
																									</option>
																									<option value="Tanzania, United Republic of">
																										Tanzania, United
																										Republic of
																									</option>
																									<option value="Thailand">
																										Thailand
																									</option>
																									<option value="Togo">
																										Togo
																									</option>
																									<option value="Tokelau">
																										Tokelau
																									</option>
																									<option value="Tonga">
																										Tonga
																									</option>
																									<option value="Trinidad and Tobago">
																										Trinidad and
																										Tobago
																									</option>
																									<option value="Tunisia">
																										Tunisia
																									</option>
																									<option value="Turkey">
																										Turkey
																									</option>
																									<option value="Turkmenistan">
																										Turkmenistan
																									</option>
																									<option value="Turks and Caicos Islands">
																										Turks and Caicos
																										Islands
																									</option>
																									<option value="Tuvalu">
																										Tuvalu
																									</option>
																									<option value="Uganda">
																										Uganda
																									</option>
																									<option value="Ukraine">
																										Ukraine
																									</option>
																									<option value="United Arab Emirates">
																										United Arab
																										Emirates
																									</option>
																									<option value="United Kingdom">
																										United Kingdom
																									</option>
																									<option value="United States">
																										United States
																									</option>
																									<option value="United States Minor Outlying Islands">
																										United States
																										Minor Outlying
																										Islands
																									</option>
																									<option value="Uruguay">
																										Uruguay
																									</option>
																									<option value="Uzbekistan">
																										Uzbekistan
																									</option>
																									<option value="Vanuatu">
																										Vanuatu
																									</option>
																									<option value="Venezuela">
																										Venezuela
																									</option>
																									<option value="Viet Nam">
																										Viet Nam
																									</option>
																									<option value="Virgin Islands (British)">
																										Virgin Islands
																										(British)
																									</option>
																									<option value="Virgin Islands (U.S.)">
																										Virgin Islands
																										(U.S.)
																									</option>
																									<option value="Wallis and Futuna Islands">
																										Wallis and
																										Futuna Islands
																									</option>
																									<option value="Western Sahara">
																										Western Sahara
																									</option>
																									<option value="Yemen">
																										Yemen
																									</option>
																									<option value="Yugoslavia">
																										Yugoslavia
																									</option>
																									<option value="Zambia">
																										Zambia
																									</option>
																									<option value="Zimbabwe">
																										Zimbabwe
																									</option>
																								</select>
																							</div>
																						</div>
																					</div>
																				</div>


																				<div class="form-group">

																					<!---    <div class="col-md-6">
					  <div class="control-group">
                    <label class="control-label">City</label>
                    <div class="controls">
                        <select id="country" name="city" class="input-xlarge">
                            <option selected="selected"></option>
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
					 </div>-->
																					<div class="col-md-6">
																						<label for="mobile"><h4>
																								City</h4></label>
																						<input type="text"
																							   class="form-control"
																							   name="city"
																							   value="<?php echo $row1->city; ?>"
																							   title="Enter City"
																							   required>
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="count_sec">
																					<div class="col-md-6">
																						<label for="mobile"><h4>
																								State</h4></label>
																						<input type="text"
																							   class="form-control"
																							   name="state"
																							   value="<?php if ($add1 != "") {
																								   echo end($add1);
																							   } ?>" title="Enter State"
																							   required>
																					</div>
																					<div class="col-md-6">
																						<label for="mobile"><h4>Zip
																								Code</h4></label>
																						<input type="text"
																							   class="form-control"
																							   name="zip" id="mobile"
																							   value="<?php echo $row1->zipcode; ?>"
																							   title="Enter Zipcode"
																							   required>
																					</div>
																				</div>

																				<div class="col-md-12">
																					<label for="mobile"><h4><img
																									src="img/ic_stay_current_portrait_-2.png">Phone
																							Number</h4></label>
																					<input type="tel"
																						   class="form-control"
																						   name="mobile" id="mobile"
																						   value="<?php echo $row1->contact; ?>"
																						   title="Enter your mobile number."
																						   maxlength="17"
																						   placeholder="+1234 12345 12345"
																						   required>
																					<!--pattern="^[\+]\d{4} \d{5} \d{5}$" -->

																				</div>
																			</div>
																			<div class="form-group">
																				<label class="col-md-12 control-label gender-sec "
																					   for="Gender">Gender</label>
																				<div class="col-md-12">
																					<label class="radio-inline"
																						   for="Gender-0">
																						<input type="radio"
																							   name="Gender"
																							   id="Gender-0"
																							   value="Male" <?php echo ($row1->gender == 'Male') ? 'checked' : '' ?>
																							   checked>
																						<img src="img/Path 141.png">Male
																					</label>
																					<label class="radio-inline"
																						   for="Gender-1">
																						<input type="radio"
																							   name="Gender"
																							   id="Gender-1"
																							   value="Female" <?php echo ($row1->gender == 'Female') ? 'checked' : '' ?> >
																						<img src="img/Group 309.png">
																						Female
																					</label>

																				</div>
																			</div>
																			<div class="form-group">

																				<div class="col-md-12">
																					<label for="Birthday"><h4><img
																									src="img/ic_cake_-2.png">Birthday
																						</h4></label>

																					<input type="Birthday"
																						   class="form-control"
																						   name="birthday" id="Birthday"
																						   value="<?php echo $row1->dob; ?>"
																						   title="Birthday"
																						   placeholder="June 12, 1984"
																						   required>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="col-md-12">

																					<div class="save_bttn">
																						<button class="btn btn-lg"
																								data-dismiss="modal"><i
																									class="glyphicon glyphicon-repeat"></i>Cancel
																						</button>

																						<input type="hidden" name="id"
																							   value="<?php echo $row1->id; ?>">
																						<button class="btn btn-lg btn-success"
																								type="submit"
																								name="edit"><i
																									class="glyphicon glyphicon-ok-sign"></i>
																							Save Changes
																						</button>


																						</form>
																					</div>
																				</div>
																			</div>


																		</div><!--/tab-pane-->
																		<!--/tab-pane-->


																	</div><!--/tab-pane-->
																</div><!--/tab-content-->
															</div><!--/col-9-->


														</div><!-- modal-content -->
													</div><!-- modal-dialog -->
													<script>
														$('img').on('error', function () {
															$(this).replaceWith(function () {
																return $(this).prop('alt');
															});
														})</script>

													<!-----------------------end--------------------------------->


													<!-----------------------reset password modal popup-------------------------------->

													<div class="modal fade main-model rest-pass-popup"
														 id="myModalss<?php echo $row1->id; ?>" role="dialog">
														<div class="modal-dialog">

															<!-- Modal content-->

															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close"
																			data-dismiss="modal">&times;
																	</button>
																	<h4 class="modal-title  rest-pass">Reset
																		Password</h4>

																	<?php
																	/* $name = $row1->user_name;
			$parts = explode(" ", $name);
			if(count($parts) != '1'){

									$rest = substr("$parts[0]", 0, 1);
									if($parts != ""){

									  	$rest1 = substr("$parts[1]", 0, 1);
									}
									else{
								  $rest1 =   substr($name, 0,2);
									}
								//print_r($parts);
									//echo $parts[0];
									//echo $parts[1];
									}
									else {

									    $rest1 =   substr($name, 0,2);

									} */
																	$name = $row1->user_name;
																	$rest = substr($name, 0, 1);

																	$name1 = $row1->last_name;
																	$rest1 = substr($name1, 0, 1); ?>

																	<div class="card_img">
																		<?php if ($row1->source == 'E') {
																			?>
																			<a href="" class="name_letters"
																			   style="background: #5FC97F;" id="pop1"
																			   data-toggle="modal"
																			   data-target="#imagemodal6<?php echo $row1->id; ?>"><img
																						class="propic"
																						src="<?php if ($row1->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																							echo $row1->profile_image;
																						} else {
																							echo $rest;
																							echo $rest1;
																						} ?>" alt="<?php echo $rest;
																				echo $rest1; ?>">
																			</a>
																		<?php } else {
																			?>

																			<a href="" class="name_letters"
																			   style="background: #5F7BC9;" id="pop1"
																			   data-toggle="modal"
																			   data-target="#imagemodal6<?php echo $row1->id; ?>"><img
																						class="propic"
																						src="<?php if ($row1->profile_image != 'http://a1professionals.net/dental_place_api/public/user-account_pic.jpg') {
																							echo $row1->profile_image;
																						} else {
																							echo $rest;
																							echo $rest1;
																						} ?>" alt="<?php echo $rest;
																				echo $rest1; ?>">
																			</a>

																		<?php } ?>
																	</div>


																	<!--<div class="card_img">
			  <a href="" class="name_letters" id="pop1resetpassword" data-toggle="modal" data-target="#imagemodal6">
			  <?php //echo $rest;
																	?></a>
	        </div>-->

																	<h2><?php echo $row1->user_name; ?><?php echo $row1->last_name; ?></h2>
																</div>
																<div class="modal-body">
																	<p><strong>Are you sure you want to<br>reset the
																			user's password?</strong><br>Once
																		confirmed,the user will be notified<br>and the
																		password will be sent to<br> <a
																				href="mailto:<?php echo $row1->user_email; ?>"
																				target="_blank"><?php echo $row1->user_email; ?></a>
																	</p>
																</div>
																<div class="rest_bttn">
																	<form method="post"
																		  action="<?php //echo base_url('Admin/resetpass');
																		  ?>">
																		<input type="hidden" name="id"
																			   value="<?php echo $row1->id; ?>">
																		<input type="submit" value="Reset Password"
																			   name="resetpassword" class="btn">
																	</form>
																</div>

																<div class="modal-footer">
																	<button type="button" class="btn btn-default"
																			data-dismiss="modal">Cancel
																	</button>
																</div>
															</div>

														</div>
													</div>
													<script>
														$('img').on('error', function () {
															$(this).replaceWith(function () {
																return $(this).prop('alt');
															});
														})</script>
													<!------------------------end------------------------------------------------------------------->

												<?php }
											} else {
												echo "<h2  style='color: #597b9e;margin-left: 36%;margin-top:11%;'>&nbsp;&nbsp;&nbsp;&nbsp;User not found.</h2>";
											} ?>

										</table>
									</div>
								</div>
							</div>
					</Section>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>


</div><!-- container -->

<!----------Athletic-Profile-Modal--------Start---->

<!----------Athletic-Profile-Modal--------End cards---->

<script>
	$(".sub_form").click(function () {
		var title = $(this).attr('data-email');
		$("#myForm").submit();
	});
	/*  window.onload = function() {
    var selItem = sessionStorage.getItem("SelItem");
	if(selItem == null){
	// Store
	sessionStorage.setItem("SelItem", "old");
	}
	else {
	}
    }
   */
	$('#mySelect').on('change', function () {
		var selectedValue = $(this).val();
		//alert(selectedValue);
		$("#submitForm").submit();
	});


	/*  $('#mySelect').change(function() {
        var selVal = $(this).val();
		//alert(selVal);
        sessionStorage.setItem("SelItem",selVal);
    }); */

	$(".user").click(function () {
		$("#cards").addClass("intro");
	});

	$(".bttn-group").click(function () {
		$("#cards").removeClass("intro");
	});
	$("#pop").on("click", function () {
		$('#imagepreview').attr('src', $('#imageresource').attr('src')); // here asign the image to the modal when the user click the enlarge link
		$('#imagemodal').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
	});
	$("#edit").on("click", function () {
		$('#imagemodales').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
	});
	$("#useredit").on("click", function () {
		$('#imagemodales').modal('show'); // imagemodal is the id attribute assigned to the bootstrap modal, then i use the show function
	});

	$('#nav-home-tab').click(function () {

		$('.active_sec').show();
		$('.inactive_sec').hide();
	});

	$('#nav-profile-tab').click(function () {

		$('.inactive_sec').show();
		$('.active_sec').hide();
	});
	$('#nav-profile-tab').click(function () {

		$('.inactive_sec').show();
		$('.active_sec').hide();
	});


</script>
<script>
	$(document).on('mouseenter', ".iffyTip", function () {

		var $this = $(this);
		if (this.offsetWidth < this.scrollWidth && !$this.attr('title')) {
			$this.tooltip({
				title: $this.text(),
				placement: "top"
			});
			$this.tooltip('show');
		}
	});
	$('.hideText').css('width', $('.hideText').parent().width());
</script>

<script>
	$(document).on('mouseenter', ".iffyTip3", function () {

		var $this = $(this);
		if (this.offsetWidth < this.scrollWidth && !$this.attr('title1')) {

			$this.tooltip({
				title: $this.text(),
				placement: "top"
			});
			$this.tooltip('show');
		}
	});
	$('.hideText3').css('width', $('.hideText3').parent().width());
</script>
<style>
	.iffyTip {
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
		display: block;
	}

	.hideText2 {
		max-width: 178px;
	}

	.iffyTip3 {
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
		display: block;
	}

	.hideText3 {
		max-width: 139px;
	}
</style>

<script>

	var table = $('table');

	$('#user, #sign, #ban, #date')
			.wrapInner('<span title="sort this column"/>')
			.each(function () {

				var th = $(this),
						thIndex = th.index(),
						inverse = false;

				th.click(function () {

					table.find('td').filter(function () {

						return $(this).index() === thIndex;

					}).sortElements(function (a, b) {

						return $.text([a]) > $.text([b]) ?
								inverse ? -1 : 1
								: inverse ? 1 : -1;

					}, function () {

						// parentNode is the element we want to move
						return this.parentNode;

					});

					inverse = !inverse;

				});

			});
</script>
<script>
	$(document).ready(function () {
		$('input[id$=Birthday]').datepicker({});
		'mm/dd/yy'
	});

</script>
<script>
	$('.hide_popup').on('click', function () {
		/*$(this).removeClass('.aman-pop-sect');*/
		$('.aman-pop-sect').hide();
		$('.edit-pop-upsec').hide();
		$('.new-edit-pops').hide();
		$('.show').removeClass('modal-backdrop');

	});

	$('.close').on('click', function () {
		$('.show').removeClass('modal-backdrop');
		//alert('hello');
	});


</script>

<script>
	$(document).ready(function () {
		$("#hide5").click(function () {
			$(".aman-pop-sect").hide();
		});
	});
</script>
<script>
	$(document).ready(function () {
		$("#hide6").click(function () {
			$(".new-edit-pops ").hide();
		});
	});
</script>

<script>
	$(document).ready(function () {
		$("#hide9").click(function () {
			$(".edit-pop-upsec").hide();
		});
	});

</script>
<script>
	$(document).ready(function () {
		$("#hide11").click(function () {
			$(".aman-pop-sect").hide();
		});
	});

</script>
<script>
	$(document).ready(function () {
		$("#hide12").click(function () {
			$(".aman-pop-sect").hide();
		});
	});
	$(document).ready(function () {
		$("#close_popup").click(function () {

			$("#addNewClass").addClass("hidePopUp");

		});
	});
</script>
<script>
	$(document).ready(function () {
		$("#close_popup").click(function () {

			$("#addNewClass").addClass("hidePopUp");

		});
	});
</script>
</body>
</html>
