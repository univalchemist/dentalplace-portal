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

	.hide-cross1 {
		position: absolute;
		background-color: white;
		width: 30px;
		height: 31px;
		right: 64px;
		z-index: 2;
	}

	}
</style>
<?php
if (isset($_GET['t'])) {
	$tab = $_GET['t'];
}
?>
<?php if (isset($_POST['searchven'])) { ?>
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

		<div class="tab-main-sec vendor_sec admin-vendor">

			<?php if ($this->session->flashdata('msg')) {
				echo "<p class='alert alert-success' style='width:30%; text-align:center; margin-left:30%;'>" . $this->session->flashdata('msg') . "</p>";
			}
			if ($this->session->flashdata('email')) {
				echo "<p class='alert alert-danger' style='width:30%; text-align:center; margin-left:30%;'>" . $this->session->flashdata('email') . "</p>";
			} ?>
			<div id="mydivs">
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
							<div class="col-md-6 recod vendor-texts">
								<h2><img src="img/ic_store_-2.png">Vendors</h2>
								<!--								<a href="" data-toggle="modal" data-target="#newVModal"><h3><i class="fa fa-plus"></i>-->
								<!--										Add New Vendor</h3></a>-->
								<a href="" data-toggle="modal" data-target="#addmodal"><h3><i class="fa fa-plus"></i>
										Add New Vendor</h3></a>
							</div>
							<div class="col-md-6">
								<form class="card card-sm" action="<?php echo base_url('vendor_dashboard'); ?>"
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
												   name="searchven" type="search"
												   value="<?php if (isset($_POST['searchven'])) {
													   echo $_POST['searchven'];
												   } ?>" placeholder="Search Vendor....   ">
											<?php if (isset($_POST['searchven'])) { ?>
												<input type="button" value="Reset" onClick="location.href=location.href"
													   style="position: absolute;right:0px;float: right; width: 45px;height: 18px;background-color: white;color: #597b9e;font-size: 12px;">
											<?php } ?>
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
							<div class="col-md-6 recod vendor-texts">
								<h2><img src="img/ic_store_-2.png">Vendors</h2>
								<!--							<a  href="" data-toggle="modal" data-target="#newVModal" ><h3><i class="fa fa-plus"></i> Add New Vendor</h3></a>-->
							</div>
							<div class="col-md-6">
								<form class="card card-sm" action="<?php echo base_url('vendor_dashboard'); ?>"
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
												   name="seain" type="search" value="<?php if (isset($_POST['seain'])) {
												echo $_POST['seain'];
											} ?>" placeholder="Search Vendor....   ">
											<?php if (isset($_POST['seain'])) { ?>
												<input type="button" value="Reset" onClick="location.href=location.href"
													   style="position: absolute;right:0px;float: right; width: 45px;height: 18px;background-color: white;color: #597b9e;font-size: 12px;">
											<?php } ?>
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
										$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
										$this->db->where('status', 1);
										$this->db->where('level=', 2);
										$query = $this->db->get();
										$rowcount = $query->num_rows();

										$this->db->select('*');
										$this->db->from('user');
										$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
										$this->db->where('status', 0);
										$this->db->where('level=', 2);
										$query = $this->db->get();
										$inactive = $query->num_rows();
										?>
										<div class="col-md-7">
											<div class="active_sec" style="<?php if ($tab == '1' || $tab == '') {
												echo "display:block";
											} else {
												echo "display:none";
											} ?>">
												<p><strong><?php echo count($activevendor);// $rowcount; ?> </strong>
													Total Active Vendors</p>
											</div>
											<div class="inactive_sec" style="<?php if ($tab == '0') {
												echo "display:block";
											} else {
												echo "display:none";
											} ?>">
												<p><strong><?php echo count($bannedvendor);// $inactive; ?></strong>
													Total Banned Vendors</p>
											</div>

										</div>
									</div>
								</div>
								<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
									<div class="tab-pane fade <?php if ($tab == '1' || $tab == '') {
										echo "active";
									} else {
										echo "fade";
									} ?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">


										<!--	  <div class="col-md-6">
					  <div class="filters">

		<section>
			<div class="fillter_img">
			<img src="img/Path 140.png">
			<span>Filter:</span>
			</div>

		</section>


	<form id="myForm" action="<?php // echo base_url('vendor_dashboard'); ?>" method="post">
		<?php

										/* foreach($activevendor as $row){
		 $data[]= $row->source;
		} */
										?>
	 <label class="radio-inline" style="color: #597b9e;">
	 <input data-email="a" class="sub_form" name="filter" type="radio" value="a" checked />All</label>

	 <label class="radio-inline" style="color: #597b9e;">
	 <input data-email="e" class="sub_form" name="filter" type="radio" value="e" <?php //if((in_array ('e',$data))&& count($data) == 1){ echo "checked"; } ?>>Via Email</label>

	 <label class="radio-inline" style="color: #597b9e;">
	 <input data-email="f" type="radio" class="sub_form" name="filter" value="f" <?php //if((in_array ('f',$data)) && count($data) == 4){ echo "checked"; }?> >Via Facebook</label>
	 </form>

		</div>
		</div>--->
										<div class="fillter_sec">
											<div class="row">

												<!--------------------Add New vendor-------------------------------->


												<div class="modal fade" id="newVModal" role="dialog">
													<div class="modal-dialog">
														<div class="modal-content cate">
															<div class="rest_bttn">
																<!--																<form method="post" action="">-->
																<!--																	<br>-->
																<!--																	<span>Register New Vendor</span><br><br>-->
																<!--																	<input class="form-control serv" type="text"-->
																<!--																		   name="uname" placeholder="Enter Name"-->
																<!--																		   maxlength="25" required><br>-->
																<!--																	<input type="text" class="form-control serv"-->
																<!--																		   name="vemail" id="first_name"-->
																<!--																		   placeholder="Enter Email" required-->
																<!--																		   pattern="[a-z0-9]+@[a-z0-9.-]+\.[a-z]{2,}$"-->
																<!--																		   maxlength="40">-->
																<!--																	<input type="submit" value="Submit" name="VenSub"-->
																<!--																	              	   class="btn">-->
																<!--																</form>-->
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-default"
																		data-dismiss="modal">Cancel
																</button>
															</div>
														</div>
													</div>
												</div>
												<!-----------------end-------------------------------->
												<div class="col-md-12">

													<form id="submitForm"
														  action="<?php echo base_url('vendor_dashboard'); ?>"
														  method="post">
														<div class="sort_sec">
															<label for="cars">Sort by:</label>
															<select id="mySelect" name="sort">
																<option value="o" <?php if (isset($_POST['sort'])) {
																	if ($_POST['sort'] == 'o') {
																		echo "selected";
																	}
																} ?>>Old to New
																</option>
																<option value="n" <?php if (isset($_POST['sort'])) {
																	if ($_POST['sort'] == 'n') {
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
												if (empty($activevendor)) {
													echo "<h2 style='color: #597b9e;margin-left:36%;margin-top:11%;'>&nbsp;&nbsp;&nbsp;&nbsp;Vendor not found.</h2>";
												}
												foreach ($activevendor as $value) {
													//print_r($activevendor);

													?>
													<!------------------Reset Modal content------------------------------>
													<div class="modal fade myModal rest-pass-popup"
														 id="myModal<?php echo $value->id; ?>" role="dialog">
														<div class="modal-dialog">


															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close"
																			data-dismiss="modal">&times;
																	</button>
																	<h4 class="modal-title">Reset Password</h4>

																	<!--<img src="img/Mask Group 1.png">-->
																	<a class="imags" href="#" id="pop"
																	   data-toggle="modal"
																	   data-target="#imagemodal<?php echo $value->id; ?>">
																		<img class="propic"
																			 src=" <?php if ($value->profile_image != '') {
																				 echo $value->profile_image;
																			 } else {
																				 echo "uploads/profile_images/no-image.jpg";
																			 } ?>" alt=""></a>
																	<h2><?php echo $value->user_name; ?></h2>
																</div>
																<div class="modal-body">
																	<p class="modl"><strong>Are you sure you want to<br>reset
																			the vendor's password?</strong><br>Once
																		confirmed,the user will be notified<br>and the
																		password will be sent to<br> <a
																				href="mailto:<?php echo $value->user_email; ?>"
																				target="_blank"><?php echo $value->user_email; ?></a>
																	</p>
																</div>

																<div class="rest_bttn">
																	<form method="post">
																		<input type="hidden" name="vendor_id"
																			   value="<?php echo $value->id; ?>">
																		<input type="submit" value="Reset Password"
																			   name="vendor_resetpassword" class="btn">
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

													<div style="padding: 0px 8px!important;" class="col-md-3">

														<div id="cards" class="card paad">
															<div class="via_bttn">
																<?php
																/* 	if($value->source == 'f'){
										echo "<a  href='' class='btttn_sec'> Via facebook</a>";
									}
									else{
										echo "<a  href='' class=''>Via Email</a>";
									}  */
																?>
																<div class="bttn-group">

																	<a class="nav-links" href="#" data-toggle="dropdown"
																	   aria-haspopup="true" aria-expanded="false">
																		<img class="user" id='clickst'
																			 src="img/ic_more_vert_24px.png"></a>
																	<div class="dropdown-menu">
																		<a class="dropdown-item" href="#" id="edit"
																		   data-toggle="modal"
																		   data-target="#imagemodales<?php echo $value->id; ?>">Edit</a>
																		<a class="dropdown-item" href="#"
																		   class="btn btn-info btn-lg"
																		   data-toggle="modal"
																		   data-target="#myModal<?php echo $value->id; ?>">Reset
																			Password</a>
																		<form method="post">
																			<input type="hidden" name="id"
																				   value="<?php echo $value->id; ?>">
																			<button name="ban"><a class="dropdown-item">Ban</a>
																			</button>
																		</form>
																		<!--<a class="dropdown-item disabled" href="">Delete</a>-->
																		<form action="<?php echo base_url('Admin/deleteVendorData'); ?>"
																			  method="post">
																			<input type="hidden" name="vendorId"
																				   value="<?php echo $value->id; ?>">
																			<input type="hidden" name="tab" value="1">
																			<button name="delVendor" type="submit"
																					onClick="return doconfirm();"><a
																						class="dropdown-item">Delete</a>
																			</button>
																		</form>
																	</div>
																</div>
															</div>
															<div class="card-sec">

																<div class="card_img">

																	<?php
																	$username = $value->user_name;
																	$parts = explode(" ", $username);
																	//$rest = substr("$parts[0]", 0, 1);
																	//$rest1 = substr("$parts[1]", 0, 1);


																	?>


																	<a href="" class="name_letters"
																	   style="background: #5F7BC9;" id="pop12"
																	   data-toggle="modal"
																	   data-target="#imagemodal<?php echo $value->id; ?>"><img
																				class="poppic"
																				src="<?php if ($value->profile_image != '') {
																					echo $value->profile_image;
																				} else {
																					echo "uploads/profile_images/no-image.jpg";
																				} ?>"
																				alt="">
																	</a>


																</div>
																<div class="card-sub">
																	<h1><?php echo $value->user_name; ?></h1>
																	<a class="email-sec trun iffyTip3 hideText3" href=""
																	   target="_blank"><?php echo $value->user_email; ?></a>

																</div>
																<div class="open_sec">
																	<p>
																		<?php

																		$data = $value->open;
																		$opened = json_decode($data, true);

																		$data = $value->close;
																		$closed = json_decode($data, true);
																		?>
																		<?php if ($opened["Mon"] != "" || $closed["Mon"] != "" || $opened["Tue"] != "" || $closed["Tue"] != "" || $opened["Wed"] != "" || $closed["Wed"] != "" || $opened["Thu"] != "" || $closed["Thu"] != "" || $opened["Fri"] != "" || $closed["Fri"] != "" || $opened["Sat"] != "" || $closed["Sat"] != "" || $opened["Sun"] != "" || $closed["Sun"] != ""){
																		echo ""; ?>
																		Opens <?php

																		if ($opened["Mon"] != "00:00 AM") {
																			echo "Mon";
																		} elseif ($opened["Tue"] != "00:00 AM") {
																			echo "Tue";
																		} elseif ($opened["Wed"] != "00:00 AM") {
																			echo "Wed";
																		} elseif ($opened["Thu"] != "00:00 AM") {
																			echo "Thu";
																		} elseif ($opened["Fri"] != "00:00 AM") {
																			echo "Fri";
																		} elseif ($opened["Sat"] != "00:00 AM") {
																			echo "Sat";
																		} elseif ($opened["Sun"] != "00:00 AM") {
																			echo "Sun";
																		}
																		?>-<?php
																		if ($closed["Sun"] != "00:00 PM") {
																			echo "Sun";
																		} elseif ($closed["Sat"] != "00:00 PM") {
																			echo "Sat";
																		} elseif ($closed["Fri"] != "00:00 PM") {
																			echo "Fri";
																		} elseif ($closed["Thu"] != "00:00 PM") {
																			echo "Thu";
																		} elseif ($closed["Wed"] != "00:00 PM") {
																			echo "Wed";
																		} elseif ($closed["Tue"] != "00:00 PM") {
																			echo "Tue";
																		} elseif ($closed["Mon"] != "00:00 PM") {
																			echo "Mon";
																		}

																		?>
																		<?php
																		if ($opened["Mon"] != "00:00 AM") {
																			echo $opened["Mon"];
																		} elseif ($opened["Tue"] != "00:00 AM") {
																			echo $opened["Tue"];
																		} elseif ($opened["Wed"] != "00:00 AM") {
																			echo $opened["Wed"];
																		} elseif ($opened["Thu"] != "00:00 AM") {
																			echo $opened["Thu"];
																		} elseif ($opened["Fri"] != "00:00 AM") {
																			echo $opened["Fri"];
																		} elseif ($opened["Sat"] != "00:00 AM") {
																			echo $opened["Sat"];
																		} elseif ($opened["Sun"] != "00:00 AM") {
																			echo $opened["Sun"];
																		}
																		?>-<?php
																		if ($closed["Sun"] != "00:00 PM") {
																			echo $closed["Sun"];
																		} elseif ($closed["Sat"] != "00:00 PM") {
																			echo $closed["Sat"];
																		} elseif ($closed["Fri"] != "00:00 PM") {
																			echo $closed["Fri"];
																		} elseif ($closed["Thu"] != "00:00 PM") {
																			echo $closed["Thu"];
																		} elseif ($closed["Wed"] != "00:00 PM") {
																			echo $closed["Wed"];
																		} elseif ($closed["Tue"] != "00:00 PM") {
																			echo $closed["Tue"];
																		} elseif ($closed["Mon"] != "00:00 PM") {
																			echo $closed["Mon"];
																		}
																		?></p>
																	<p class="closed_sec"><span
																				style="color: #fff">h</span>
																		<?php if ($opened["Mon"] == "00:00 AM" || $closed["Mon"] == "00:00 PM") {
																			echo "Closed";
																		} elseif ($opened["Tue"] == "00:00 AM" || $closed["Tue"] == "00:00 PM") {
																			echo "Closed";
																		} elseif ($opened["Wed"] == "00:00 AM" || $closed["Wed"] == "00:00 PM") {
																			echo "Closed";
																		} elseif ($opened["Thu"] == "00:00 AM" || $closed["Thu"] == "00:00 PM") {
																			echo "Closed";
																		} elseif ($opened["Fri"] == "00:00 AM" || $closed["Fri"] == "00:00 PM") {
																			echo "Closed";
																		} elseif ($opened["Sat"] == "00:00 AM" || $closed["Sat"] == "00:00 PM") {
																			echo "Closed";
																		} elseif ($opened["Sun"] == "00:00 AM" || $closed["Sun"] == "00:00 PM") {
																			echo "Closed";
																		}
																		?>

																		<?php if ($opened["Mon"] == "00:00 AM" || $closed["Mon"] == "00:00 PM") {
																			echo "Mon-";
																		} ?>
																		<?php if ($opened["Tue"] == "00:00 AM" || $closed["Tue"] == "00:00 PM") {
																			echo "Tue-";
																		} ?>
																		<?php if ($opened["Wed"] == "00:00 AM" || $closed["Wed"] == "00:00 PM") {
																			echo "Wed-";
																		} ?>
																		<?php if ($opened["Thu"] == "00:00 AM" || $closed["Thu"] == "00:00 PM") {
																			echo "Thu-";
																		} ?>
																		<?php if ($opened["Fri"] == "00:00 AM" || $closed["Fri"] == "00:00 PM") {
																			echo "Fri-";
																		} ?>
																		<?php if ($opened["Sat"] == "00:00 AM" || $closed["Sat"] == "00:00 PM") {
																			echo "Sat-";
																		} ?>
																		<?php if ($opened["Sun"] == "00:00 AM" || $closed["Sun"] == "00:00 PM") {
																			echo "Sun";
																		} ?>
																	</p>
																	<?php } ?>
																</div>
																<div class="review_sec">
																	<div class="rating">
																		<p><?php
																			$CI =& get_instance();
																			$res = $CI->AdminModel->review($value->id);
																			//print_r($res);


																			echo "<lebal style='font-size: 17px;top: 1px;position: relative'>" . $res[0]->rate . "</lebal>";
																			// echo $value->star_rate ;

																			if ($res[0]->rate == 0) { ?></p>
																		<img src="img/ic_star__white_124px.png">
																		<img src="img/ic_star__white_124px.png">
																		<img src="img/ic_star__white_124px.png">
																		<img src="img/ic_star__white_124px.png">
																		<img src="img/ic_star__white_124px.png">

																		<?php } elseif ($res[0]->rate == "") { ?>
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">

																		<?php } elseif ($res[0]->rate == 1) { ?>
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">

																		<?php } elseif ($res[0]->rate >= 1.1 && $res[0]->rate <= 1.9) { ?>
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_half_24px.png">
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">

																		<?php } elseif ($res[0]->rate == 2) { ?>
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">

																		<?php } elseif ($res[0]->rate >= 2.1 && $res[0]->rate <= 2.9) { ?>
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_half_24px.png">
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">

																		<?php } elseif ($res[0]->rate == 3) { ?>
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star__white_124px.png">
																			<img src="img/ic_star__white_124px.png">

																		<?php } elseif ($res[0]->rate >= 3.1 && $res[0]->rate <= 3.9) { ?>
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_half_24px.png">
																			<img src="img/ic_star__white_124px.png">
																		<?php } elseif ($res[0]->rate == 4) { ?>
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star__white_124px.png">

																		<?php }
																		if ($res[0]->rate >= 4.1 && $res[0]->rate <= 4.9) { ?>
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_half_24px.png">

																		<?php } elseif ($res[0]->rate == 5) { ?>
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">
																			<img src="img/ic_star_24px.png">

																		<?php } ?>
																	</div>
																	<div class="review">
																		<span>(<?php echo $res[0]->total; ?> reviews)</span>
																	</div>
																</div>
																<div class="profile_bttn">
																	<a href="" data-toggle="modal"
																	   data-target="#imagemodal<?php echo $value->id; ?>">View
																		Profile</a>

																</div>
															</div>

														</div>
													</div>

												<?php } ?>

											</div>
										</div>

									</div>

									<!--------------------------------------banned data------------------------------------------>
									<div class="tab-pane <?php if ($tab == '0') {
										echo "active";
									} else {
										echo "fade";
									} ?> " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
										<?php if (empty($bannedvendor)){
											echo "<h2 style='color: #597b9e;margin-left:36%;margin-top:11%;'>&nbsp;&nbsp;&nbsp;&nbsp;Vendor not found.</h2>";
										} else { ?>
										<table class="table">

											<tr class="boder_sec">
												<th id="vendor"> Vendor<img src="img/Group 188.png"></th>
												<th id="email">Email<img src="img/Group 188.png"></th>
												<th id="date">Date Banned<img src="img/Group 188.png"></th>
												<!--<th id="ban">Ban duration<img src="img/Group 188.png"></th>-->
												<th><span>Action</span></th>
											</tr>

											<?php } ?>

											<tbody>

											<?php
											foreach ($bannedvendor

											as $value1){
											//print_r($row1);
											?>
											<div class="modal fade rest-pass-popup"
												 id="myModal<?php echo $value1->id; ?>" role="dialog">

												<div class="modal-dialog">


													<div class="modal-content">
														<div class="modal-header">
															<button type="button" class="close" data-dismiss="modal">
																&times;
															</button>
															<h4 class="modal-title">Reset Password</h4>

															<!--<img src="img/Mask Group 1.png">-->
															<a class="imags" href="#" id="pop" data-toggle="modal"
															   data-target="#imagemodal<?php echo $value1->id; ?>">
																<img class="propic"
																	 src=" <?php if ($value1->profile_image != '') {
																		 echo $value1->profile_image;
																	 } else {
																		 echo "uploads/profile_images/no-image.jpg";
																	 } ?>" alt=""></a>
															<h2><?php echo $value1->user_name; ?></h2>
														</div>
														<p class="modl"><strong>Are you sure you want to<br>reset the
																vendor's password?</strong><br>Once confirmed,the user
															will be notified<br>and the password will be sent to<br> <a
																	href="mailto:<?php echo $value1->user_email; ?>"
																	target="_blank"><?php echo $value1->user_email; ?></a>
														</p>
														<div class="modal-body">
														</div>

														<div class="rest_bttn">
															<form method="post">
																<input type="hidden" name="vendor_id"
																	   value="<?php echo $value1->id; ?>">
																<input type="submit" value="Reset Password"
																	   name="vendor_resetpassword" class="btn">
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

											<tr>
												<?php
												$name = $value1->user_name;
												$parts = explode(" ", $name);
												if (count($parts) != '1') {

													$rest = substr("$parts[0]", 0, 1);
													if ($parts != "") {

														$rest1 = substr("$parts[1]", 0, 1);
													} else {
														$rest1 = substr($name, 0, 2);
													}
													//print_r($parts);
													//echo $parts[0];
													//echo $parts[1];
												} else {

													$rest1 = substr($name, 0, 2);

												}
												?>


												<td class="tabl_img"><a href="" class="name_letters" id="pop123"
																		style="background: #5F7BC9;" data-toggle="modal"
																		data-target="#inactiveimagemodal<?php echo $value1->id; ?>">
														<img class="propic"
															 src="<?php if ($value1->profile_image != '') {
																 echo $value1->profile_image;
															 } else {
																 echo "uploads/profile_images/no-image.jpg";
															 } ?>" alt=""></a><span
															class="ven-text"><?php echo $value1->user_name; ?></span>
												</td>


												<td><a href="mailto:<?php echo $value1->user_email; ?>"
													   target="_blank"><?php echo $value1->user_email; ?></a></td>
												<td><?php echo date('M d, Y', strtotime($value1->ben_start)); ?></td>
												<!--<td><?php echo $value1->ben_end; ?></td>-->
												<td class="action">
													<div class="bttn-group">


														<a class="nav-links" href="#" data-toggle="dropdown"
														   aria-haspopup="true" aria-expanded="false">
															<img class="users" src="img/ic_more_vert_24px.png"></a>
														<div class="dropdown-menu">
															<a data-toggle="modal"
															   data-target="#editModal<?php echo $value1->id; ?>"
															   href="" class="dropdown-item" id="edit">Edit</a>
															<a class="dropdown-item" href="" data-toggle="modal"
															   data-target="#myModal<?php echo $value1->id; ?>">Reset
																Password</a>
															<form method="post">
																<input type="hidden" name="id"
																	   value="<?php echo $value1->id; ?>">
																<button name="liftban"><a class="dropdown-item">Lift
																		Ban</a></button>
															</form>
															<!--<a class="dropdown-item disabled" href="">Delete</a>-->
															<form action="<?php echo base_url('Admin/deleteVendorData'); ?>"
																  method="post">
																<input id="tabs" type="hidden" name="inactive"
																	   value="0"/>

																<input type="hidden" name="vendorId"
																	   value="<?php echo $value1->id; ?>">
																<input type="hidden" name="tab" value="0">
																<button name="delVendor" type="submit"
																		onClick="return doconfirm();"><a
																			class="dropdown-item">Delete</a></button>
															</form>
														</div>
													</div>
												</td>
											</tr>

											<!--------------------------------------banned edit-------------------------------------------------------------->

											<div class="modal right new-edit-pops"
												 id="editModal<?php echo $value1->id; ?>" tabindex="-1" role="dialog"
												 aria-labelledby="myModalLabel2">

												<div class="modal-dialog" role="document">
													<div class="modal-content">

														<div id="editview" class="snippet">
															<div class="modal-header">
																<h4 class="modal-title" id="myModalLabel2" class="close"
																	data-dismiss="modal" aria-label="Close"><img
																			src="img/ic_arrow_back_24px.png"></h4>

																<h1>Edit Vendor Profile</h1>

																<div class="via_bttn">
																	<?php
																	/* 	if($value->source == 'f'){
										echo "<a  href='' class='btttn_sec'> Via facebook</a>";
									}
									else{
										echo "<a  href='' class=''>Via Email</a>";
									}  */
																	?>
																	<div class="bttn-group">

																		<a class="nav-links" href="#"
																		   data-toggle="dropdown" aria-haspopup="true"
																		   aria-expanded="false">
																			<img class="user" id='clickst'
																				 src="img/ic_more_vert_24px.png"></a>
																		<div class="dropdown-menu">

																			<a id="hide3"
																			   class="dropdown-item hide_popup" href="#"
																			   class="btn btn-info btn-lg"
																			   data-toggle="modal"
																			   data-target="#myModal<?php echo $value1->id; ?>">Reset
																				Password</a>
																			<form method="post">
																				<input type="hidden" name="id"
																					   value="<?php echo $value1->id; ?>">
																				<button name="ban"><a
																							class="dropdown-item">Lift
																						Ban</a></button>
																			</form>
																			<!--<a class="dropdown-item disabled" href="">Delete</a>-->
																			<form action="<?php echo base_url('Admin/deleteVendorData'); ?>"
																				  method="post">
																				<input type="hidden" name="vendorId"
																					   value="<?php echo $value1->id; ?>">
																				<input type="hidden" name="tab"
																					   value="0">
																				<button name="delVendor" type="submit"
																						onClick="return doconfirm();"><a
																							class="dropdown-item">Delete</a>
																				</button>
																			</form>
																		</div>
																	</div>
																</div>

															</div>

															<div class="profile">
																<div class="col-md-2">
																	<div class="profile_img edit-img-pop">

																		<?php
																		$name = $value1->user_name;
																		$parts = explode(" ", $name);
																		//$rest = substr("$parts[0]", 0, 1);
																		//$rest1 = substr("$parts[1]", 0, 1);
																		//echo $rest;
																		if (count($parts) != '1') {

																			$rest = substr("$parts[0]", 0, 1);
																			if ($parts != "") {

																				$rest1 = substr("$parts[1]", 0, 1);
																			} else {
																				$rest1 = substr($name, 0, 2);
																			}
																			//print_r($parts);
																			//echo $parts[0];
																			//echo $parts[1];
																		} else {

																			$rest1 = substr($name, 0, 2);

																		}
																		?>
																		<!--<img title="profile image" class="img-circle img-responsive" src="img/Group141.png">-->

																		<div class="card_img">
																			<?php if ($value1->source == 'e') {
																				?>
																				<a href="" class="name_letters"
																				   style="background: #5F7BC9;"
																				   id="pop12" data-toggle="modal"
																				   data-target="#imagemo<?php echo $value1->id; ?>">

																					<img class="propic"
																						 src="<?php if ($value1->profile_image != '') {
																							 echo $value1->profile_image;
																						 } else {
																							 echo "uploads/profile_images/no-image.jpg";
																						 } ?>"
																						 alt="<?php echo $rest;
																						 echo $rest1; ?>">
																				</a>
																			<?php } else {
																				?>

																				<a href="" class="name_letters"
																				   style="background: #5FC97F;"
																				   id="pop12" data-toggle="modal"
																				   data-target="#imagemo<?php echo $value1->id; ?>"><img
																							class="propic"
																							src="<?php if ($value1->profile_image != '') {
																								echo $value1->profile_image;
																							} else {
																								echo "uploads/profile_images/no-image.jpg";
																							} ?>" alt="">
																				</a>

																			<?php } ?>
																		</div>


																		<a class="camera-imge" href=""
																		   data-toggle="modal"
																		   data-target="#picModal<?php echo $value1->id; ?>"><img
																					class="img-circle img-responsivess"
																					src="img/ic_camera_alt_24px.png"></a>
																		<div class="modal picModal"
																			 id="picModal<?php echo $value1->id; ?>"
																			 role="dialog">
																			<div class="modal-dialog">
																				<div class="modal-content cate">
																					<br>
																					<span>Upload Profile Image</span>
																					<?php //echo $error;
																					?>
																					<?php echo form_open_multipart('vendor_dashboard'); ?>
																					<input type="hidden" name="id"
																						   value="<?php echo $value1->id; ?>">
																					<input type="file" name="image"
																						   class="first-edit"/>
																					<input type="submit" name="banpic"
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
																					   value="<?php echo $value1->id; ?>">
																				<label for="first_name"><h4>Name</h4>
																				</label>
																				<input maxlength="30" type="text"
																					   class="form-control"
																					   name="user_name" id="first_name"
																					   title="Enter your  name."
																					   value="<?php echo $value1->user_name; ?>"
																					   required>
																			</div>
																		</div>
																		<div class="form-group">

																			<div class="col-md-12">
																				<label for="email"><h4><img
																								src="img/ic_markunread_24px.png">Email
																					</h4></label>
																				<input type="email" class="form-control"
																					   name="email" id="email"
																					   title="Enter your email."
																					   value="<?php echo $value1->user_email; ?>"
																					   readonly>

																			</div>
																		</div>
																</div>
															</div>
															<div class="col-md-12 ">
																<label for="text"><h4>Yelp Link</h4></label>
																<input type="text" class="form-control" id="location"
																	   title="enter yelp link"
																	   value="<?php echo $value1->yelp; ?>" name="yelp"
																	   required>

																<!--		<input type="text" class="form-control email-input" id="location"  title="Enter a location" value="" name="address1" required>-->

															</div>
															<div class="col-md-12 ">
																<label for="text"><h4>Yelp Id</h4></label>
																<input type="text" class="form-control" id="location"
																	   title="enter yelp link"
																	   value="<?php echo $value1->yelp_id; ?>"
																	   name="yelpId" required>
															</div>
															<div class="tab-content">
																<div class="tab-pane active" id="home">
																	<hr>
																	<div class="form-group">


																		<div class="col-md-12 ">
																			<label for="text"><h4><img
																							src="img/ic_place_-1.png">Address
																				</h4></label>
																			<input type="text" class="form-control"
																				   id="location"
																				   title="enter a location"
																				   value="<?php echo $value1->address; ?>"
																				   name="add" required>

																			<!--		<input type="text" class="form-control email-input" id="location"  title="Enter a location" value1="" name="address1" required>-->

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
																							<option selected="selected"><?php echo $value1->country; ?></option>
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
																								Antigua and Barbuda
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
																							<option value="BO">Bolivia
																							</option>
																							<option value="Bosnia and Herzegowina">
																								Bosnia and Herzegowina
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
																								British Indian Ocean
																								Territory
																							</option>
																							<option value="Brunei Darussalam">
																								Brunei Darussalam
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
																								Central African Republic
																							</option>
																							<option value="Chad">Chad
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
																								Cocos (Keeling) Islands
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
																								Congo, the Democratic
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
																								Croatia (Hrvatska)
																							</option>
																							<option value="Cuba">Cuba
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
																								Dominican Republic
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
																								Equatorial Guinea
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
																							<option value="Fiji">Fiji
																							</option>
																							<option value="Finland">
																								Finland
																							</option>
																							<option value="France">
																								France
																							</option>
																							<option value="France, Metropolitan">
																								France, Metropolitan
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
																							<option value="Guam">Guam
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
																								Heard and Mc Donald
																								Islands
																							</option>
																							<option value="Holy See (Vatican City State)">
																								Holy See (Vatican City
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
																								Iran (Islamic Republic
																								of)
																							</option>
																							<option value="Iraq">Iraq
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
																								Korea, Democratic
																								People's Republic of
																							</option>
																							<option value="Korea, Republic of">
																								Korea, Republic of
																							</option>
																							<option value="Kuwait">
																								Kuwait
																							</option>
																							<option value="Kyrgyzstan">
																								Kyrgyzstan
																							</option>
																							<option value="Lao People's Democratic Republic">
																								Lao People's Democratic
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
																								Libyan Arab Jamahiriya
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
																								Macedonia, The Former
																								Yugoslav Republic of
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
																							<option value="Mali">Mali
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
																								Micronesia, Federated
																								States of
																							</option>
																							<option value="Moldova, Republic of">
																								Moldova, Republic of
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
																								Netherlands Antilles
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
																							<option value="Niue">Niue
																							</option>
																							<option value="Norfolk Island">
																								Norfolk Island
																							</option>
																							<option value="Northern Mariana Islands">
																								Northern Mariana Islands
																							</option>
																							<option value="Norway">
																								Norway
																							</option>
																							<option value="Oman">Oman
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
																							<option value="Peru">Peru
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
																								Russian Federation
																							</option>
																							<option value="Saint Kitts and Nevis">
																								Saint Kitts and Nevis
																							</option>
																							<option value="Saint LUCIA">
																								Saint LUCIA
																							</option>
																							<option value="Saint Vincent and the Grenadines">
																								Saint Vincent and the
																								Grenadines
																							</option>
																							<option value="Samoa">
																								Samoa
																							</option>
																							<option value="San Marino">
																								San Marino
																							</option>
																							<option value="Sao Tome and Principe">
																								Sao Tome and Principe
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
																								South Georgia and the
																								South Sandwich Islands
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
																								St. Pierre and Miquelon
																							</option>
																							<option value="Sudan">
																								Sudan
																							</option>
																							<option value="Suriname">
																								Suriname
																							</option>
																							<option value="Svalbard and Jan Mayen Islands">
																								Svalbard and Jan Mayen
																								Islands
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
																								Syrian Arab Republic
																							</option>
																							<option value="Taiwan, Province of China">
																								Taiwan, Province of
																								China
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
																							<option value="Togo">Togo
																							</option>
																							<option value="Tokelau">
																								Tokelau
																							</option>
																							<option value="Tonga">
																								Tonga
																							</option>
																							<option value="Trinidad and Tobago">
																								Trinidad and Tobago
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
																								Turks and Caicos Islands
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
																								United Arab Emirates
																							</option>
																							<option value="United Kingdom">
																								United Kingdom
																							</option>
																							<option value="United States">
																								United States
																							</option>
																							<option value="United States Minor Outlying Islands">
																								United States Minor
																								Outlying Islands
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
																								Virgin Islands (British)
																							</option>
																							<option value="Virgin Islands (U.S.)">
																								Virgin Islands (U.S.)
																							</option>
																							<option value="Wallis and Futuna Islands">
																								Wallis and Futuna
																								Islands
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

																			<!--       <div class="col-md-6">
						  <div class="control-group">
						<label class="control-label">City</label>
						<div class="controls">
							<select id="country" name="city" class="input-xlarge">
								<option selected="selected"></option>
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
						 </div>-->
																			<div class="col-md-6">
																				<label for="mobile"><h4>City</h4>
																				</label>
																				<input type="text" class="form-control"
																					   name="city"
																					   value="<?php echo $value1->city; ?>"
																					   title="Enter City" required>
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="count_sec">
																			<div class="col-md-6">
																				<label for="mobile"><h4>State</h4>
																				</label>
																				<input type="text" class="form-control"
																					   name="state"
																					   value="<?php echo $value1->state; ?>"
																					   title="Enter State" required>
																			</div>
																			<div class="col-md-6">
																				<label for="mobile"><h4>Zip Code</h4>
																				</label>
																				<input type="text" class="form-control"
																					   name="zip" id="mobile"
																					   title="Enter your mobile number if any."
																					   value="<?php echo $value1->zipcode; ?>"
																					   required>
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<div class="col-md-12">
																			<label for="mobile"><h4><img
																							src="img/ic_stay_current_portrait_-2.png">Phone
																					Number</h4></label>
																			<input type="number" class="form-control"
																				   name="mobile" id="mobile"
																				   title="Enter your mobile"
																				   value="<?php echo $value1->contact; ?>"
																				   required>
																		</div>

																	</div>
																	<!--<div class="form-group">
	  <label class="col-md-12 control-label" for="Gender">Gender</label>
	  <div class="col-md-12">
		<label class="radio-inline" for="Gender-0">
		  <input type="radio" name="Gender" id="Gender-0" value="Male" <?php echo ($value1->gender == 'Male') ? 'checked' : '' ?> checked required>
		  <img src="img/Path 141.png">Male
		</label>
		<label class="radio-inline" for="Gender-1">
		  <input type="radio" name="Gender" id="Gender-1" value="Female" <?php echo ($value1->gender == 'Female') ? 'checked' : '' ?> required>
		 <img src="img/Group 309.png"> Female
		</label>

	  </div>
	</div>
						  <div class="form-group">

							  <div class="col-md-12">
							<label for="Birthday"><h4><img src="img/ic_cake_-2.png">Birthday</h4></label>
								  <input type="Birthday" class="form-control" name="birthday" id="Birthday"  title="Birthday" value="<?php echo $value1->dob; ?>" placeholder="June 12, 1984" required/>

							  </div>
						  </div>-->
																	<div class="form-group">
																		<div class="col-md-12">

																			<div class="save_bttn">
																				<button class="btn btn-lg" type="button"
																						data-dismiss="modal"><i
																							class="glyphicon glyphicon-repeat"></i>Cancel
																				</button>
																				<input type="hidden" name="id"
																					   value="<?php echo $value1->id; ?>">
																				<button class="btn btn-lg btn-success"
																						type="submit" name="editban"><i
																							class="glyphicon glyphicon-ok-sign"></i>
																					Save Changes
																				</button>
																			</div>
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


									<!------------------modal on the click of image of banned vendor----------------------->
									<div class="modal right new-edit-pops inactive-popup "
										 id="inactiveimagemodal<?php echo $value1->id; ?>" tabindex="-1" role="dialog"
										 aria-labelledby="myModalLabel2">

										<div class="modal-dialog" role="document">
											<div class="modal-content">

												<div class="modal-header">
													<div class="via_bttn">
														<?php
														/* 	if($value->source == 'f'){
										echo "<a  href='' class='btttn_sec'> Via facebook</a>";
									}
									else{
										echo "<a  href='' class=''>Via Email</a>";
									}  */
														?>
														<div class="bttn-group">

															<a class="nav-links" href="#" data-toggle="dropdown"
															   aria-haspopup="true" aria-expanded="false">
																<img class="user" id='clickst'
																	 src="img/ic_more_vert_24px.png"></a>
															<div class="dropdown-menu">
																<a id="hide15" class="dropdown-item hide_popup" href="#"
																   id="edit" data-toggle="modal"
																   data-target="#editModal<?php echo $value1->id; ?>">Edit</a>
																<a id="hide8" class="dropdown-item hide_popup" href="#"
																   class="btn btn-info btn-lg" data-toggle="modal"
																   data-target="#myModal<?php echo $value1->id; ?>">Reset
																	Password</a>
																<form method="post">
																	<input type="hidden" name="id"
																		   value="<?php echo $value1->id; ?>">
																	<button name="liftban"><a class="dropdown-item">Lift
																			Ban</a></button>
																</form>
																<!--<a class="dropdown-item disabled" href="">Delete</a>-->
																<form action="<?php echo base_url('Admin/deleteVendorData'); ?>"
																	  method="post">
																	<input type="hidden" name="vendorId"
																		   value="<?php echo $value1->id; ?>">
																	<input type="hidden" name="tab" value="0">
																	<button name="delVendor" type="submit"
																			onClick="return doconfirm();"><a
																				class="dropdown-item">Delete</a>
																	</button>
																</form>
															</div>
														</div>
													</div>


													<h4 class="modal-title" id="myModalLabel2" class="close"
														data-dismiss="modal" aria-label="Close"><img
																src="img/ic_arrow_back_24px.png"></h4>
												</div>

												<div class="modal-body">
													<div class="aman_right_popup">
														<?php
														$name = $value1->user_name;
														$parts = explode(" ", $name);
														//$rest = substr("$parts[0]", 0, 1);
														//$rest1 = substr("$parts[1]", 0, 1);

														if (count($parts) != '1') {

															$rest = substr("$parts[0]", 0, 1);
															if ($parts != "") {

																$rest1 = substr("$parts[1]", 0, 1);
															} else {
																$rest1 = substr($name, 0, 2);
															}
															//print_r($parts);
															//echo $parts[0];
															//echo $parts[1];
														} else {

															$rest1 = substr($name, 0, 2);

														}
														?>
														<!--<img src="img/Group 302.png">-->
														<div class="card_img">
															<?php if ($value1->source == 'e') {
																?>
																<a href="" class="name_letters"
																   style="background: #5F7BC9;" id="pop12"
																   data-toggle="modal"
																   data-target="#imagemodal<?php echo $value1->id; ?>">
																	<img class="poppic"
																		 src="<?php if ($value1->profile_image != '') {
																			 echo $value1->profile_image;
																		 } else {
																			 echo "uploads/profile_images/no-image.jpg";
																		 } ?>" alt="">
																</a>
															<?php } else {
																?>

																<a href="" class="name_letters"
																   style="background: #5FC97F;" id="pop12"
																   data-toggle="modal"
																   data-target="#imagemodal<?php echo $value1->id; ?>">
																	<img class="poppic"
																		 src="<?php if ($value1->profile_image != '') {
																			 echo $value1->profile_image;
																		 } else {
																			 echo "uploads/profile_images/no-image.jpg";
																		 } ?>" alt="">
																</a>

															<?php } ?>
														</div>
														<!--<img src="img/Group 302.png">-->
														<h2><?php echo $value1->user_name; ?></h2>
														<div class="review_section">
															<div class="rating">
																<p><?php
																	$CI =& get_instance();
																	$res = $CI->AdminModel->review($value1->id);
																	//print_r($res);
																	echo "<lebal style='font-size: 17px;top: 1px;position: relative'>" . $res[0]->rate . "</lebal>";
																	// echo $value->star_rate ;

																	if ($res[0]->rate == 0) { ?></p>
																<img src="img/ic_star__white_124px.png">
																<img src="img/ic_star__white_124px.png">
																<img src="img/ic_star__white_124px.png">
																<img src="img/ic_star__white_124px.png">
																<img src="img/ic_star__white_124px.png">

																<?php } elseif ($res[0]->rate == "") { ?>
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">

																<?php } elseif ($res[0]->rate == 1) { ?>
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">

																<?php } elseif ($res[0]->rate >= 1.1 && $res[0]->rate <= 1.9) { ?>
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_half_24px.png">
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">

																<?php } elseif ($res[0]->rate == 2) { ?>
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">

																<?php } elseif ($res[0]->rate >= 2.1 && $res[0]->rate <= 2.9) { ?>
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_half_24px.png">
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">

																<?php } elseif ($res[0]->rate == 3) { ?>
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star__white_124px.png">
																	<img src="img/ic_star__white_124px.png">

																<?php } elseif ($res[0]->rate >= 3.1 && $res[0]->rate <= 3.9) { ?>
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_half_24px.png">
																	<img src="img/ic_star__white_124px.png">
																<?php } elseif ($res[0]->rate == 4) { ?>
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star__white_124px.png">

																<?php }
																if ($res[0]->rate >= 4.1 && $res[0]->rate <= 4.9) { ?>
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_half_24px.png">

																<?php } elseif ($res[0]->rate == 5) { ?>
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">
																	<img src="img/ic_star_24px.png">

																<?php } ?>
															</div>
															<div class="review">
																<span>(<?php echo $res[0]->total; ?> reviews)</span>
															</div>
															<a href="#" target="_blank"><?php echo $value1->yelp; ?></a>
														</div>
													</div>
													<div class="card-img-sec">
														<p><img src="img/ic_query_builder_24px.png"> Opening Hours<br>
															<?php
															$data = $value1->open;
															$opened = json_decode($data, true);

															$data = $value1->close;
															$closed = json_decode($data, true);
															?>
															<span class="dates-sec">
		<?php if ($opened["Mon"] != "00:00 AM") {
			echo "Mon";
		} elseif ($opened["Tue"] != "00:00 AM") {
			echo "Tue";
		} elseif ($opened["Wed"] != "00:00 AM") {
			echo "Wed";
		} elseif ($opened["Thu"] != "00:00 AM") {
			echo "Thu";
		} elseif ($opened["Fri"] != "00:00 AM") {
			echo "Fri";
		} elseif ($opened["Sat"] != "00:00 AM") {
			echo "Sat";
		} elseif ($opened["Sun"] != "00:00 AM") {
			echo "Sun";
		}
		?>-
	<?php
	if ($closed["Sun"] != "00:00 PM") {
		echo "Sun";
	} elseif ($closed["Sat"] != "00:00 PM") {
		echo "Sat";
	} elseif ($closed["Fri"] != "00:00 PM") {
		echo "Fri";
	} elseif ($closed["Thu"] != "00:00 PM") {
		echo "Thu";
	} elseif ($closed["Wed"] != "00:00 PM") {
		echo "Wed";
	} elseif ($closed["Tue"] != "00:00 PM") {
		echo "Tue";
	} elseif ($closed["Mon"] != "00:00 PM") {
		echo "Mon";
	}

	?>
	  </span> <span class="times-sec">
	<?php
	if ($opened["Mon"] != "00:00 AM") {
		echo $opened["Mon"];
	} elseif ($opened["Tue"] != "00:00 AM") {
		echo $opened["Tue"];
	} elseif ($opened["Wed"] != "00:00 AM") {
		echo $opened["Wed"];
	} elseif ($opened["Thu"] != "00:00 AM") {
		echo $opened["Thu"];
	} elseif ($opened["Fri"] != "00:00 AM") {
		echo $opened["Fri"];
	} elseif ($opened["Sat"] != "00:00 AM") {
		echo $opened["Sat"];
	} elseif ($opened["Sun"] != "00:00 AM") {
		echo $opened["Sun"];
	}
	?>
	to
	<?php
	if ($closed["Sun"] != "00:00 PM") {
		echo $closed["Sun"];
	} elseif ($closed["Sat"] != "00:00 PM") {
		echo $closed["Sat"];
	} elseif ($closed["Fri"] != "00:00 PM") {
		echo $closed["Fri"];
	} elseif ($closed["Thu"] != "00:00 PM") {
		echo $closed["Thu"];
	} elseif ($closed["Wed"] != "00:00 PM") {
		echo $closed["Wed"];
	} elseif ($closed["Tue"] != "00:00 PM") {
		echo $closed["Tue"];
	} elseif ($closed["Mon"] != "00:00 PM") {
		echo $closed["Mon"];
	}

	?>
	</span></p>
														<p class="times-sec"><img src="img/ic_place_-1.png"> Address<br>
															<span class="addre"> <?php echo $value1->address;
																echo "</span>,<span class='addre'> " . $value1->city;
																echo "</span>,<span class='addre'>" . $value1->state;
																echo "</span>,<span class='addre'>" . $value1->country; ?> </span>
														</p>
													</div>

													<div class="service_sec pop-up-service">
														<h1>Services & Pricing</h1>
														<!---<ul>
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
			</ul>	-->
														<ul>
															<?php
															$SI =& get_instance();
															$sev = $SI->AdminModel->sic($value1->id);
															foreach ($sev as $value) {
																?>
																<li><?php echo $value->serviceName; ?>
																	-<span>£<?php echo $value->servicePrice; ?></span>
																</li>
															<?php } ?>
														</ul>
													</div>

												</div>

												<!-- modal-content -->
											</div><!-- modal-dialog -->
										</div>
									</div>

									<?php } ?>

									<!--------------------------------end----------------------------------------------->

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
<!------------------------------------modal on the click of active image-------------------------------------------->
<?php
foreach ($activevendor as $val) {


	?>

	<div class="modal right active-popup" id="imagemodal<?php echo $val->id; ?>" tabindex="-1" role="dialog"
		 aria-labelledby="myModalLabel2">

		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<div class="via_bttn">
						<?php
						/* 	if($value->source == 'f'){
										echo "<a  href='' class='btttn_sec'> Via facebook</a>";
									}
									else{
										echo "<a  href='' class=''>Via Email</a>";
									}  */
						?>
						<div class="bttn-group">

							<a class="nav-links" href="#" data-toggle="dropdown" aria-haspopup="true"
							   aria-expanded="false">
								<img class="user" id='clickst' src="img/ic_more_vert_24px.png"></a>
							<div class="dropdown-menu">
								<a id="hide14" class="dropdown-item hide_popup" href="#" id="edit" data-toggle="modal"
								   data-target="#imagemodales<?php echo $val->id; ?>">Edit</a>
								<a id="hide7" class="dropdown-item hide_popup" href="#" class="btn btn-info btn-lg"
								   data-toggle="modal" data-target="#myModal<?php echo $val->id; ?>">Reset Password</a>
								<form method="post">
									<input type="hidden" name="id" value="<?php echo $val->id; ?>">
									<button name="ban"><a class="dropdown-item">Ban</a></button>
								</form>
								<!--<a class="dropdown-item disabled" href="">Delete</a>-->
								<form action="<?php echo base_url('Admin/deleteVendorData'); ?>" method="post">
									<input type="hidden" name="vendorId" value="<?php echo $val->id; ?>">
									<input type="hidden" name="tab" value="1">
									<button name="delVendor" type="submit" onClick="return doconfirm();"><a
												class="dropdown-item">Delete</a></button>
								</form>
							</div>
						</div>
					</div>


					<h4 class="modal-title" id="myModalLabel2" class="close" data-dismiss="modal" aria-label="Close">
						<img src="img/ic_arrow_back_24px.png"></h4>
				</div>

				<div class="modal-body">
					<div class="aman_right_popup">
						<?php
						$name = $val->user_name;
						$parts = explode(" ", $name);
						//$rest = substr("$parts[0]", 0, 1);
						//$rest1 = substr("$parts[1]", 0, 1);

						if (count($parts) != '1') {

							$rest = substr("$parts[0]", 0, 1);
							if ($parts != "") {

								$rest1 = substr("$parts[1]", 0, 1);
							} else {
								$rest1 = substr($name, 0, 2);
							}
							//print_r($parts);
							//echo $parts[0];
							//echo $parts[1];
						} else {

							$rest1 = substr($name, 0, 2);

						}
						?>
						<!--<img src="img/Group 302.png">-->
						<div class="card_img" style="margin-bottom:10px;">
							<?php if ($val->source == 'e') {
								?>
								<a href="" class="name_letters" style="background: #5F7BC9; " id="pop12"
								   data-toggle="modal" data-target="#imagemodal<?php echo $val->id; ?>"> <img
											class="poppic" src="<?php if ($val->profile_image != '') {
										echo $val->profile_image;
									} else {
										echo "uploads/profile_images/no-image.jpg";
									} ?>" alt="">
								</a>
							<?php } else {
								?>

								<a href="" class="name_letters" style="background: #5FC97F; " id="pop12"
								   data-toggle="modal" data-target="#imagemodal<?php echo $val->id; ?>"> <img
											class="poppic" src="<?php if ($val->profile_image != '') {
										echo $val->profile_image;
									} else {
										echo "uploads/profile_images/no-image.jpg";
									} ?>" alt="">
								</a>

							<?php } ?>
						</div>
						<!--<img src="img/Group 302.png">-->
						<h2><?php echo $val->user_name; ?></h2>
						<div class="review_section">
							<div class="rating">
								<p><?php
									$CI =& get_instance();
									$res = $CI->AdminModel->review($val->id);
									//print_r($res);
									echo "<lebal style='font-size: 17px;top: 1px;position: relative'>" . $res[0]->rate . "</lebal>";
									// echo $value->star_rate ;

									if ($res[0]->rate == 0) { ?></p>
								<img src="img/ic_star__white_124px.png">
								<img src="img/ic_star__white_124px.png">
								<img src="img/ic_star__white_124px.png">
								<img src="img/ic_star__white_124px.png">
								<img src="img/ic_star__white_124px.png">

								<?php } elseif ($res[0]->rate == "") { ?>
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">

								<?php } elseif ($res[0]->rate == 1) { ?>
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">

								<?php } elseif ($res[0]->rate >= 1.1 && $res[0]->rate <= 1.9) { ?>
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_half_24px.png">
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">

								<?php } elseif ($res[0]->rate == 2) { ?>
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">

								<?php } elseif ($res[0]->rate >= 2.1 && $res[0]->rate <= 2.9) { ?>
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_half_24px.png">
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">

								<?php } elseif ($res[0]->rate == 3) { ?>
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star__white_124px.png">
									<img src="img/ic_star__white_124px.png">

								<?php } elseif ($res[0]->rate >= 3.1 && $res[0]->rate <= 3.9) { ?>
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_half_24px.png">
									<img src="img/ic_star__white_124px.png">
								<?php } elseif ($res[0]->rate == 4) { ?>
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star__white_124px.png">

								<?php }
								if ($res[0]->rate >= 4.1 && $res[0]->rate <= 4.9) { ?>
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_half_24px.png">

								<?php } elseif ($res[0]->rate == 5) { ?>
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">
									<img src="img/ic_star_24px.png">

								<?php } ?>
							</div>
							<div class="review">
								<span>(<?php echo $res[0]->total; ?> reviews)</span>
							</div>
							<a href="<?php echo $val->yelp; ?>" target="_blank"><?php echo $val->yelp; ?></a>
						</div>
					</div>
					<div class="card-img-sec">
						<p><img src="img/ic_query_builder_24px.png"> Opening Hours<br>
							<?php

							$data = $val->open;
							$opened = json_decode($data, true);

							$data = $val->close;
							$closed = json_decode($data, true);
							?>
							<?php if ($opened["Mon"] != "" || $closed["Mon"] != "" || $opened["Tue"] != "" || $closed["Tue"] != "" || $opened["Wed"] != "" || $closed["Wed"] != "" || $opened["Thu"] != "" || $closed["Thu"] != "" || $opened["Fri"] != "" || $closed["Fri"] != "" || $opened["Sat"] != "" || $closed["Sat"] != "" || $opened["Sun"] != "" || $closed["Sun"] != ""){
							echo ""; ?>
							<span class="dates-sec"><?php

								if ($opened["Mon"] != "00:00 AM") {
									echo "Mon";
								} elseif ($opened["Tue"] != "00:00 AM") {
									echo "Tue";
								} elseif ($opened["Wed"] != "00:00 AM") {
									echo "Wed";
								} elseif ($opened["Thu"] != "00:00 AM") {
									echo "Thu";
								} elseif ($opened["Fri"] != "00:00 AM") {
									echo "Fri";
								} elseif ($opened["Sat"] != "00:00 AM") {
									echo "Sat";
								} elseif ($opened["Sun"] != "00:00 AM") {
									echo "Sun";
								}
								?>-<?php
								if ($closed["Sun"] != "00:00 PM") {
									echo "Sun";
								} elseif ($closed["Sat"] != "00:00 PM") {
									echo "Sat";
								} elseif ($closed["Fri"] != "00:00 PM") {
									echo "Fri";
								} elseif ($closed["Thu"] != "00:00 PM") {
									echo "Thu";
								} elseif ($closed["Wed"] != "00:00 PM") {
									echo "Wed";
								} elseif ($closed["Tue"] != "00:00 PM") {
									echo "Tue";
								} elseif ($closed["Mon"] != "00:00 PM") {
									echo "Mon";
								}

								?>
							</span>
							<span class="times-sec">	<?php
								if ($opened["Mon"] != "00:00 AM") {
									echo $opened["Mon"];
								} elseif ($opened["Tue"] != "00:00 AM") {
									echo $opened["Tue"];
								} elseif ($opened["Wed"] != "00:00 AM") {
									echo $opened["Wed"];
								} elseif ($opened["Thu"] != "00:00 AM") {
									echo $opened["Thu"];
								} elseif ($opened["Fri"] != "00:00 AM") {
									echo $opened["Fri"];
								} elseif ($opened["Sat"] != "00:00 AM") {
									echo $opened["Sat"];
								} elseif ($opened["Sun"] != "00:00 AM") {
									echo $opened["Sun"];
								}
								?>
	to
							<?php
							if ($closed["Sun"] != "00:00 PM") {
								echo $closed["Sun"];
							} elseif ($closed["Sat"] != "00:00 PM") {
								echo $closed["Sat"];
							} elseif ($closed["Fri"] != "00:00 PM") {
								echo $closed["Fri"];
							} elseif ($closed["Thu"] != "00:00 PM") {
								echo $closed["Thu"];
							} elseif ($closed["Wed"] != "00:00 PM") {
								echo $closed["Wed"];
							} elseif ($closed["Tue"] != "00:00 PM") {
								echo $closed["Tue"];
							} elseif ($closed["Mon"] != "00:00 PM") {
								echo $closed["Mon"];
							}
							?></p>
						<?php } ?>
						<p class="times-sec"><img src="img/ic_place_-1.png"> Address<br>
							<?php if ($val->address != '' && $val->city != '' && $val->state != '' && $val->country != '' && $val->zipcode != ''){ ?>
							<span class="addre"> <?php echo $val->address;
								echo "</span>,<span class='addre'> " . $val->city;
								echo "</span>,<span class='addre'>" . $val->state;
								echo "</span>,<span class='addre'>" . $val->country;
								} ?> </span>
						</p>
					</div>

					<div class="service_sec pop-up-service">
						<h1>Services & Pricing</h1>
						<ul>
							<?php
							$SI =& get_instance();
							$sev = $SI->AdminModel->sic($val->id);
							foreach ($sev as $value) {
								?>
								<li><?php echo $value->serviceName; ?>-<span>£<?php echo $value->servicePrice; ?></span>
								</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<!-- modal-content -->
			</div><!-- modal-dialog -->
		</div>
	</div>
<?php } ?>

<!--------------------------------end----------------------------------------------->


<!--------------------------------edit modal popup--------------------------------->

<?php foreach ($activevendor as $value) { ?>

	<div class="modal right vendor-pop-sec" id="imagemodales<?php echo $value->id; ?>" tabindex="-1" role="dialog"
		 aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div id="editview" class="snippet">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel2" class="close" data-dismiss="modal"
							aria-label="Close"><img src="img/ic_arrow_back_24px.png"></h4>

						<h1>Edit Vendor Profile</h1>

						<div class="via_bttn">
							<?php
							/* 	if($value->source == 'f'){
										echo "<a  href='' class='btttn_sec'> Via facebook</a>";
									}
									else{
										echo "<a  href='' class=''>Via Email</a>";
									}  */
							?>
							<div class="bttn-group">

								<a class="nav-links" href="#" data-toggle="dropdown" aria-haspopup="true"
								   aria-expanded="false">
									<img class="user" id='clickst' src="img/ic_more_vert_24px.png"></a>
								<div class="dropdown-menu">

									<a id="hide4" class="dropdown-item hide_popup" href="#" class="btn btn-info btn-lg"
									   data-toggle="modal" data-target="#myModal<?php echo $value->id; ?>">Reset
										Password</a>
									<form method="post">
										<input type="hidden" name="id" value="<?php echo $value->id; ?>">
										<button name="ban"><a class="dropdown-item">Ban</a></button>
									</form>
									<!--<a class="dropdown-item disabled" href="">Delete</a>-->
									<form action="<?php echo base_url('Admin/deleteVendorData'); ?>" method="post">
										<input type="hidden" name="vendorId" value="<?php echo $value->id; ?>">
										<input type="hidden" name="tab" value="1">
										<button name="delVendor" type="submit" onClick="return doconfirm();"><a
													class="dropdown-item">Delete</a></button>
									</form>
								</div>
							</div>
						</div>

					</div>

					<div class="profile">
						<div class="col-md-2">
							<div class="profile_img edit-img-pop">

								<?php
								$name = $value->user_name;
								$parts = explode(" ", $name);
								//$rest = substr("$parts[0]", 0, 1);
								//$rest1 = substr("$parts[1]", 0, 1);
								//echo $rest;
								if (count($parts) != '1') {

									$rest = substr("$parts[0]", 0, 1);
									if ($parts != "") {

										$rest1 = substr("$parts[1]", 0, 1);
									} else {
										$rest1 = substr($name, 0, 2);
									}
								} else {
									$rest1 = substr($name, 0, 2);
								}
								?>
								<!--<img title="profile image" class="img-circle img-responsive" src="img/Group141.png">-->

								<div class="card_img">
									<?php if ($value->source == 'e') {
										?>
										<a href="" class="name_letters" style="background: #5F7BC9;" id="pop12"
										   data-toggle="modal" data-target="#imagemo<?php echo $value->id; ?>">

											<img class="propic" src="<?php if ($value->profile_image != '') {
												echo $value->profile_image;
											} else {
												echo "uploads/profile_images/no-image.jpg";
											} ?>"
												 alt="">
										</a>
									<?php } else {
										?>

										<a href="" class="name_letters" style="background: #5FC97F;" id="pop12"
										   data-toggle="modal" data-target="#imagemo<?php echo $value->id; ?>"><img
													class="propic" src="<?php if ($value->profile_image != '') {
												echo $value->profile_image;
											} else {
												echo "uploads/profile_images/no-image.jpg";
											} ?>" alt="">
										</a>

									<?php } ?>
								</div>


								<a class="camera-imge" href="" data-toggle="modal"
								   data-target="#picModal<?php echo $value->id; ?>"><img
											class="img-circle img-responsivess" src="img/ic_camera_alt_24px.png"></a>
								<div class="modal picModal" id="picModal<?php echo $value->id; ?>" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content cate">
											<br>
											<span>Upload Profile Image</span>
											<?php //echo $error;?>
											<?php echo form_open_multipart('vendor_dashboard'); ?>
											<input type="hidden" name="id" value="<?php echo $value->id; ?>">
											<input type="file" name="image" class="first-edit"/>
											<input type="submit" name="submitpic" value="Upload" class="uplode-img"/>
											</form>


											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">
													Cancel
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-10">
							<form class="form" action="" method="post" id="registrationForm">
								<div class="form-group">

									<div class="col-md-12">
										<input type="hidden" name="id" value="<?php echo $value->id; ?>">
										<label for="first_name"><h4>Name</h4></label>
										<input maxlength="30" type="text" class="form-control" name="user_name"
											   id="first_name" title="Enter your  name."
											   value="<?php echo $value->user_name; ?>" required>
									</div>
								</div>
								<div class="form-group">

									<div class="col-md-12">
										<label for="email"><h4><img src="img/ic_markunread_24px.png">Email</h4></label>
										<input type="email" class="form-control" name="email" id="email"
											   title="Enter your email." value="<?php echo $value->user_email; ?>"
											   readonly>

									</div>
								</div>
						</div>
					</div>
					<div class="col-md-12 ">
						<label for="text"><h4>Yelp Link</h4></label>
						<input type="text" class="form-control" id="location" title="enter yelp link"
							   value="<?php echo $value->yelp; ?>" name="yelp" required>

						<!--		<input type="text" class="form-control email-input" id="location"  title="Enter a location" value="" name="address1" required>-->

					</div>
					<div class="col-md-12 ">
						<label for="text"><h4>Yelp Id</h4></label>
						<input type="text" class="form-control" id="location" title="enter yelp link"
							   value="<?php echo $value->yelp_id; ?>" name="yelpId" required>
					</div>
					<div class="tab-content">
						<div class="tab-pane active" id="home">
							<hr>
							<div class="form-group">


								<div class="col-md-12 ">
									<label for="text"><h4><img src="img/ic_place_-1.png">Address</h4></label>
									<input type="text" class="form-control" id="location" title="enter a location"
										   value="<?php echo $value->address; ?>" name="add" required>

									<!--		<input type="text" class="form-control email-input" id="location"  title="Enter a location" value="" name="address1" required>-->

								</div>
							</div>

							<div class="count_sec">

								<div class="form-group">

									<div class="col-md-6">
										<div class="control-group">
											<label class="control-label">Country</label>
											<div class="controls">
												<select id="country" name="country" class="input-xlarge" required>
													<option selected="selected"><?php echo $value->country; ?></option>
													<?php foreach ($countries as $cou) { ?>
														<option value="<?php echo $cou; ?>"><?php echo $cou; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
								</div>


								<div class="form-group">
									<div class="col-md-6">
										<label for="mobile"><h4>City</h4></label>
										<input type="text" class="form-control" name="city"
											   value="<?php echo $value->city; ?>" title="Enter City" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="count_sec">
									<div class="col-md-6">
										<label for="mobile"><h4>State</h4></label>
										<input type="text" class="form-control" name="state"
											   value="<?php echo $value->state; ?>" title="Enter State" required>
									</div>
									<div class="col-md-6">
										<label for="mobile"><h4>Zip Code</h4></label>
										<input type="text" class="form-control" name="zip" id="mobile"
											   title="Enter your mobile number if any."
											   value="<?php echo $value->zipcode; ?>" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<label for="mobile"><h4><img src="img/ic_stay_current_portrait_-2.png">Phone Number
										</h4></label>
									<input type="number" class="form-control" name="mobile" id="mobile"
										   title="Enter your mobile" value="<?php echo $value->contact; ?>" required>
								</div>

							</div>
							<div class="form-group">
								<div class="col-md-12">

									<div class="save_bttn">
										<button class="btn btn-lg" type="button" data-dismiss="modal"><i
													class="glyphicon glyphicon-repeat"></i>Cancel
										</button>
										<!--										<input type="hidden" name="id" value="-->
										<?php //echo $value->id; ?><!--">-->
										<button class="btn btn-lg btn-success" type="submit" name="edit"><i
													class="glyphicon glyphicon-ok-sign"></i> Save Changes
										</button>
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


<!-------------------------------- Add modal popup -------------------------------->

<div class="modal right vendor-pop-sec" id="addmodal" tabindex="-1" role="dialog"
	 aria-labelledby="myModalLabel2">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div id="editview" class="snippet">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel2" class="close" data-dismiss="modal"
						aria-label="Close"><img src="img/ic_arrow_back_24px.png"></h4>

					<h1>Add Vendor Profile</h1>
				</div>

				<div class="profile">
					<div class="col-md-2">
						<div class="profile_img edit-img-pop">
							<a href="" class="name_letters" style="background: #5F7BC9;" id="pop12" data-toggle="modal">
								<img class="propic" title="profile image"  id="vendorImage" src="uploads/profile_images/no-image.jpg" alt="your image" />
							</a>


							<a class="camera-imge" href="" data-toggle="modal"
							   data-target="#picModalAdd"><img
										class="img-circle img-responsivess" src="img/ic_camera_alt_24px.png"></a>
							<div class="modal picModal" id="picModalAdd" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content cate">
										<br>
										<span>Upload Profile Image</span>
										<?php //echo $error;?>
										<?php echo form_open_multipart('vendor_dashboard'); ?>
<!--										<input type="hidden" name="id" value="--><?php //echo $value->id; ?><!--">-->
										<input type="file" name="image" class="first-edit" onchange="readURL(this)"/>
<!--										<input type="submit" name="submitpic" value="Upload" class="uplode-img"/>-->


										<div class="modal-footer">
											<button type="button" class="btn btn-default" id="closeAddImage">
												close
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-10">
						<form class="form" action="" method="post" id="registrationForm">
							<div class="form-group">

								<div class="col-md-12">
									<label for="first_name"><h4>Name</h4></label>
									<input maxlength="30" type="text" class="form-control" name="add_user_name"
										   id="first_name" title="Enter your name.">
								</div>
							</div>
							<div class="form-group">

								<div class="col-md-12">
									<label for="email"><h4><img src="img/ic_markunread_24px.png">Email</h4></label>
									<input type="email" class="form-control" name="add_email" id="email"
										   title="Enter your email.">
								</div>
							</div>
							<div class="form-group">

								<div class="col-md-12">
									<label for="email"><h4>Temporary Password</h4></label>
									<input type="text" class="form-control" name="add_password" id="password"
										   title="Enter a temporary password.">
								</div>
							</div>
					</div>
				</div>
				<div class="col-md-12 ">
					<label for="text"><h4>Yelp Link</h4></label>
					<input type="text" class="form-control" id="location" title="enter yelp link" name="add_yelp">
				</div>
				<div class="col-md-12 ">
					<label for="text"><h4>Yelp Id</h4></label>
					<input type="text" class="form-control" id="location" title="enter yelp link" name="add_yelpId">
				</div>
				<div class="tab-content">
					<div class="tab-pane active" id="home">
						<hr>
						<div class="form-group">


							<div class="col-md-12 ">
								<label for="text"><h4><img src="img/ic_place_-1.png">Address</h4></label>
								<input type="text" class="form-control" id="location" title="enter a location" name="add_location">
							</div>
						</div>

						<div class="count_sec">

							<div class="form-group">

								<div class="col-md-6">
									<div class="control-group">
										<label class="control-label">Country</label>
										<div class="controls">
											<select id="country" name="add_country" class="input-xlarge">
												<option selected="selected"></option>
												<?php foreach ($countries as $cou) { ?>
													<option value="<?php echo $cou; ?>"><?php echo $cou; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</div>


							<div class="form-group">
								<div class="col-md-6">
									<label for="mobile"><h4>City</h4></label>
									<input type="text" class="form-control" name="add_city" title="Enter City">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="count_sec">
								<div class="col-md-6">
									<label for="mobile"><h4>State</h4></label>
									<input type="text" class="form-control" name="add_state" title="Enter State">
								</div>
								<div class="col-md-6">
									<label for="mobile"><h4>Zip Code</h4></label>
									<input type="text" class="form-control" name="add_zip" id="mobile"
										   title="Enter your mobile number if any.">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label for="mobile"><h4><img src="img/ic_stay_current_portrait_-2.png">Phone Number
									</h4></label>
								<input type="number" class="form-control" name="add_mobile" id="mobile"
									   title="Enter your mobile">
							</div>

						</div>
						<div class="form-group">
							<div class="col-md-12">

								<div class="save_bttn">
									<button class="btn btn-lg" type="button" data-dismiss="modal"><i
												class="glyphicon glyphicon-repeat"></i>Cancel
									</button>
									<button class="btn btn-lg btn-success" type="submit" name="VenSub"><i
												class="glyphicon glyphicon-ok-sign"></i> Add Vendor
									</button>
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

<!----------Athletic-Profile-Modal--------Start---->

<!----------Athletic-Profile-Modal--------End  cards---->
<script>


	$(".sub_form").click(function () {
		var title = $(this).attr('data-email');
		$("#myForm").submit();
	});
	$('#mySelect').on('change', function () {
		var selectedValue = $(this).val();
		//alert(selectedValue);
		$("#submitForm").submit();
	});
	/*window.onload = function() {
		var selItem = sessionStorage.getItem("SelItem");
		$('#mySelect').val(selItem);
		}*/
	/*$('#mySelect').change(function() {
			var selVal = $(this).val();
			//alert(selVal);
			sessionStorage.setItem("SelItem", selVal);
		});*/


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
	$('#nav-home-tab').click(function () {
		document.getElementById("tabs").value = "1";

		$('.active_sec').show();
		$('.inactive_sec').hide();
	});

	$('#nav-profile-tab').click(function () {
		document.getElementById("tabs").value = "0";

		$('.inactive_sec').show();
		$('.active_sec').hide();
	});

	/* $('#clickst').click(function(){
		$('.card.intro').css("border","1px solid #09cfbc");
	}); */
</script>
<script>
	$(document).on('mouseenter', ".iffyTip3", function () {
		console.log('cool');
		var $this = $(this);
		if (this.offsetWidth < this.scrollWidth && !$this.attr('title1')) {
			console.log('cool1');
			$this.tooltip({
				title: $this.text(),
				placement: "top"
			});
			$this.tooltip('show');
		}
	});
	$('.hideText3').css('width', $('.hideText3').parent().width());

	/* datatable filter jquery */
	var table = $('table');

	$('#vendor, #email, #date, #ban')
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
		$("#hide3").click(function () {
			$(".new-edit-pops").hide();
		});
	});
</script>
<script>
	$(document).ready(function () {
		$("#hide4").click(function () {
			$(".vendor-pop-sec").hide();
		});
	});
</script>
<script>
	$(document).ready(function () {
		$("#hide7").click(function () {
			$(".active-popup").hide();
		});
	});
</script>
<script>
	$(document).ready(function () {
		$("#hide8").click(function () {
			$(".inactive-popup").hide();
		});
	});
</script>
<script>
	$(document).ready(function () {
		$("#hide1").click(function () {
			$(".edit-pop-upsec").hide();
		});
	});
</script>
<script>
	$(document).ready(function () {
		$("#hide14").click(function () {
			$(".active-popup").hide();
		});
	});
</script>


<script>
	$(document).ready(function () {
		$("#hide15").click(function () {
			$(".inactive-popup").hide();
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
<script>
	$('.hide_popup').on('click', function () {
		/*$(this).removeClass('.aman-pop-sect');*/
		$('.active-popup').hide();
		$('.show').removeClass('modal-backdrop');

	});

	$('.close').on('click', function () {
		$('.show').removeClass('modal-backdrop');
		//alert('hello');
	});


</script>
<script>
	$('.hide_popup').on('click', function () {
		/*$(this).removeClass('.aman-pop-sect');*/
		$('.vendor-pop-sec').hide();

	});

	$('.close').on('click', function () {
		$('.show').removeClass('modal-backdrop');
		//alert('hello');
	});


</script>

<script>
	$('.hide_popup').on('click', function () {
		/*$(this).removeClass('.aman-pop-sect');*/
		$('.new-edit-pops').hide();

	});

	$('.close').on('click', function () {
		$('.show').removeClass('modal-backdrop');
		//alert('hello');
	});


</script>


<script>
	/* Delete  User data alert */
	function doconfirm() {
		job = confirm("Are you sure to delete this vendor permanently?");
		if (job != true) {
			return false;
		}
	}

</script>

<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#vendorImage')
						.attr('src', e.target.result)
						.width(150)
						.height(200);
			};

			reader.readAsDataURL(input.files[0]);
		}
	}

	$('#closeAddImage').click(function() {
		$('#picModalAdd').modal('hide');
	});
</script>

