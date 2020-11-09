<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('AdminModel');
		$this->load->library('countries');
		$this->load->library('session');
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === False) {
			$erros = validation_errors();
			$errMessage = array('message' => $erros);
		} else {
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$checkArray = array(
				'user_email' => $username,
				'password' => $password
			);
			$res = $this->AdminModel->loginUser($checkArray);
			if (!empty($res)) {
				if ($res[0]['level'] == 3) {

					$this->session->set_userdata('userIds', $res[0]['id']);
					$session_data = array(
						'userid' => $res[0]['id'],
						'user_email' => $res[0]['user_email'],
						'login_status' => '1',
						'level' => $res[0]['level'],
					);
					$this->session->set_userdata('logged_in', $session_data);
					redirect('admin-dashboard');
				} else {
					//redirect('admin-login');
				}
			}
			$this->session->set_flashdata('msg', 'Invalid Username and Password');
			redirect('admin-login');
		}
		$this->load->view('admin/templates/header');
		$this->load->view('admin/login');
		$this->load->view('admin/templates/footer');
	}

	public function recover_password()
	{
		$user_email = $this->input->post('email');
		$data = array('user_email' => $user_email);
		$findemail = $this->AdminModel->ForgotPassword($data);
		if (isset($_POST['forgot_pass'])) {
			if ($findemail['user_email'] != "") {
				$randomPass = rand(100000, 999999);
				$this->AdminModel->sendpassword($randomPass);
				$user = array('user_email' => $user_email);
				$_SESSION["usersss"] = $user;

				$params = array(
					"email" => $user_email,
					"password" => $randomPass
				);
				$postData = '';
				foreach ($params as $k => $v) {
					$postData .= $v . '&';
				}
				rtrim($postData, '&');

				$url = "http://srv1.a1professionals.net/dentalMail/otpemail.php";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_POST, $postData);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
				$output = curl_exec($ch);
				if (curl_errno($ch)) {
					echo $error_msg = curl_error($ch);
				}
				curl_close($ch);


				redirect('admin-otp_password');
			} else {
				$this->session->set_flashdata('msg', 'Email Not found!');
				redirect('admin-recover_password');
			}

		}
		$this->load->view('admin/templates/header');
		$this->load->view('admin/recover_password');
		$this->load->view('admin/templates/footer');
	}

	public function otp_password()
	{
		$otp = $this->input->post('otp');
		$otp .= $this->input->post('otpa');
		$otp .= $this->input->post('otpb');
		$otp .= $this->input->post('otpc');
		$otp .= $this->input->post('otpd');
		$otp .= $this->input->post('otpe');

		$arr = array($otp);
		$impo = implode($arr);
		$findotp = $this->AdminModel->OTPpassword($impo);
		if (isset($_POST['otppass'])) {
			if ($findotp) {
				redirect('admin-create-password');
			} else {
				$this->session->set_flashdata('msg', 'Wrong or expired OTP. Please re-enter.');
				redirect('admin-otp_password');
			}
		}
		$this->load->view('admin/templates/header');
		$this->load->view('admin/otp_password');
		$this->load->view('admin/templates/footer');
	}

	public function resend()
	{
		$randomPass = rand(100000, 999999);
		$this->AdminModel->sendpassword($randomPass);
		$this->session->set_flashdata('otp', 'OTP is sent on your email.');
		redirect('admin-otp_password');
		//print_r($randomPass);
	}

	public function create_password()
	{
		$new = md5($this->input->post('new'));
		$confirm = md5($this->input->post('confirm'));
		if ($new == $confirm) {
			if (isset($_POST['create_pass'])) {
				$pass = array('new' => $new, 'confirm' => $confirm);
				$findemail = $this->AdminModel->CreatePassword($pass);
				redirect('admin-login');
			}
		} else {
			$this->session->set_flashdata('msg', 'Password does not match.');
			redirect('admin-create-password');
		}
		$this->load->view('admin/templates/header');
		$this->load->view('admin/create_password');
		$this->load->view('admin/templates/footer');
	}

	public function userdashboard()
	{
		$EditPopUp = $this->input->post('EditPopupId');
		if ($this->session->userdata['logged_in']['level'] != '3') {
			redirect('404');

		} else {
			if (isset($_POST['subpic'])) {
				$config['upload_path'] = 'uploads/profile_images';
				$config['allowed_types'] = 'gif|jpeg|jpg|png';
				$config['max_size'] = 2048;
				$this->load->library('upload', $config);


				if (!$this->upload->do_upload('image')) {
					//echo"error";
					//$error = array('error' => $this->upload->display_errors());
					//  $this->load->view('admin-dashboard', $error);

				} else {
					$upload_data = $this->upload->data();
					//print_r($upload_data);
					$id = $_POST['id'];
					//print_r($id); die();
					$pic = 'http://161.35.58.35/uploads/profile_images/' . $upload_data['file_name'];
					//print_r($pic);die();
					$this->AdminModel->insert_uspic($pic, $id);
					//$this->session->set_flashdata('msg', 'Image upload successfully');

				}
			}
			if (isset($_POST['resetpassword'])) {
				$user_id = $_POST['id'];
				$randomresetPassword = rand(100000, 999999);
				$email = $this->AdminModel->updatepassword($randomresetPassword, $user_id);
				$mail = $email[0]->user_email;
				$params = array(
					"email" => $mail,
					"password" => $randomresetPassword
				);
				$postData = '';
				foreach ($params as $k => $v) {
					$postData .= $v . '&';
				}
				rtrim($postData, '&');

				$url = "http://srv1.a1professionals.net/dentalMail/regemail.php";
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_POST, $postData);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
				$output = curl_exec($ch);
				if (curl_errno($ch)) {
					echo $error_msg = curl_error($ch);
				}
				curl_close($ch);


				$this->session->set_flashdata('msg', 'User password sent successfully');
			}
			if (isset($_POST['ban'])) {
				$user_id = $_POST['id'];
				$this->AdminModel->banuser($user_id);
				$this->session->set_flashdata('msg', 'User banned successfully');
				redirect('admin-dashboard');
			}
			if (isset($_POST['liftban'])) {
				$user_id = $_POST['id'];
				$this->AdminModel->userlift($user_id);
				$this->session->set_flashdata('msg', 'User unbanned  Successfully');
				redirect('admin-dashboard');
			}
			if (isset($_POST['edit'])) {
				$id = $_POST['id'];
				$name = $this->input->post('user_name');
				$last = $this->input->post('last_name');
				$fn = array($name, $last);
				$fulln = implode(" ", $fn);
				$email = $this->input->post('email');
				$addrs = $this->input->post('add');
				$adds = $this->input->post('address');
				$con = $this->input->post('country');
				$city = $this->input->post('city');
				$state = $this->input->post('state');
				$zip = $this->input->post('zip');
				$mob = $this->input->post('mobile');
				$gen = $this->input->post('Gender');
				$bir = $this->input->post('birthday');
				$ad = array($addrs, $city, $state);
				$addr = implode(",", $ad);

				$this->AdminModel->edituser($id, $name, $last, $fulln, $email, $addr, $adds, $con, $city, $state, $zip, $mob, $gen, $bir);
				$this->session->set_flashdata('msg', 'Details updated successfully');
				redirect('admin-dashboard');
			}
			if (empty($this->session->userdata('userIds'))) {
				redirect('admin-login');
			} else {

				$tab = $this->input->post('tabu'); //For current tab
				if ($tab == '1') {
					$search = $this->input->post('seainac');
				} else {
					$search = $this->input->post('searchfil');
				}

				$radio = $this->input->post('filter');
				$all = $this->input->post('one');
				$query = $this->AdminModel->displayuserrecords($radio, $all, $search, $tab);
				$results['activeuser'] = $query['result'];
				$results['tab'] = $query['tab'];


				/* if($results['activeuser'] == "")
				{
					$results['activeuser']=$this->AdminModel->displayuserrecords($radio,$all,$search);
				} */
				$query1 = $this->AdminModel->displaybanneduserrecords($search, $tab);
				$results['banneduser'] = $query1['result'];
				$results['tab'] = $query['tab'];
				$results['EditPopup'] = $EditPopUp;
				$results['countries'] = $this->countries->getList();

				$this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar');
				$this->load->view('admin/userdashboard', $results);
				$this->load->view('admin/templates/footer');
			}
		}
	}

	public function vendordashboard()
	{
		if ($this->session->userdata['logged_in']['level'] != '3') {
			redirect('404');

		} else {

			if (isset($_POST['submitpic'])) {
				$config['upload_path'] = 'uploads/profile_images';
				$config['allowed_types'] = 'gif|jpeg|jpg|png';
				$config['max_size'] = 2048;
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					//echo"error";
					//$error = array('error' => $this->upload->display_errors());
					//  $this->load->view('vendor_dashboard', $error);
				} else {
					//echo"successfull";
					$upload_data = $this->upload->data();
					//print_r($upload_data);
					$id = $_POST['id'];
					$qww = 'https://portal.dentalplace.app/uploads/profile_images/' . $upload_data['file_name'];
					//	print_r($qww);
					$this->AdminModel->insert_pic($qww, $id);
					$this->session->set_flashdata('msg', 'Image upload successfully');
					redirect('vendor_dashboard');
				}
			}

			/* if(isset($_POST['vendor'])){
			$vendorresults['bannedvendor']= $this->AdminModel->display();
			} */
			if (isset($_POST['VenSub'])) {
//				$ve = $this->input->post('vemail');
//				$un = $this->input->post('uname');
//				$rp = rand(100000, 999999);
//				$res = $this->AdminModel->getdata($ve);
//				$s = $this->AdminModel->getser();
//				$id = $s[0]['id'];
//				$se = $s[0]['title'];
//				$p = '0';

				$ve = $this->input->post('add_email');
				$un = $this->input->post('add_user_name');
				$rp = $this->input->post("add_password");
				$res = $this->AdminModel->getdata($ve);
				$s = $this->AdminModel->getser();
				$id = $s[0]['id'];
				$se = $s[0]['title'];
				$p = '0';

//				file_put_contents("php://stdout", "Email: $ve\n");
//				file_put_contents("php://stdout", "Username: $un\n");
//				file_put_contents("php://stdout", "Password: $rp\n");
//				file_put_contents("php://stdout", "User Data: " . var_export(empty($res), true) . "\n");

				if (empty($res)) {
					$ser = array('servicesId'=>$id,'serviceName'=>$se, 'servicePrice'=>$p);

					//TODO: Get userID after adding and update profile
					$em = array('user_name' => $un, 'user_email' => $ve, 'password' => $rp, 'level' => 2);
					$newId = $this->AdminModel->regVendor($em, $id, $se, $p); //Register vendor
					file_put_contents("php://stdout", "New ID: $newId\n");
					$name = $this->input->post('add_user_name');
					$email = $this->input->post('add_email');
					$yelp = $this->input->post('add_yelp');
					$y = $this->input->post('add_yelpId');
					$addr = $this->input->post('add_location');
					//$adds = $this->input->post('address');
					$con = $this->input->post('add_country');
					$city = $this->input->post('add_city');
					$state = $this->input->post('add_state');
					$zip = $this->input->post('add_zip');
					$mob = $this->input->post('add_mobile');
					$gen = $this->input->post('add_Gender');
					$bir = $this->input->post('add_birthday');

					$arrs = array($addr, $state, $city, $con, $zip);
					$addsr = implode(" ", $arrs);
					//print_r($addsr);die();
					$apiKey = 'AIzaSyBfIbCqjYImARWKWHlrq-3y_5Y9ZGUndPc'; // Google maps now requires an API key.
					// Get JSON results from this request
					$geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($addsr) . '&sensor=false&key=' . $apiKey);
					$geo = json_decode($geo, true); // Convert the JSON to an array

					if (isset($geo['status']) && ($geo['status'] == 'OK')) {
						$latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
						$longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
						$this->AdminModel->latlon($newId, $latitude, $longitude);
					}

					$this->AdminModel->editvendor($newId, $name, $email, $yelp, $y, $addr, $con, $city, $state, $zip, $mob, $gen, $bir);

					$config['upload_path'] = 'uploads/profile_images';
					$config['allowed_types'] = 'gif|jpeg|jpg|png';
					$config['max_size'] = 2048;
					$this->load->library('upload', $config);

					if ($this->upload->do_upload('image')) {
						$upload_data = $this->upload->data();
						$qww = 'https://portal.dentalplace.app/uploads/profile_images/' . $upload_data['file_name'];
						$this->AdminModel->insert_pic($qww, $newId);
					}else{
						$this->session->set_flashdata('msg', 'Vendor Registered Successfully but failed to upload image.');
						redirect('vendor_dashboard');
					}

//TODO: Send credentials to vendor via email


					$this->session->set_flashdata('msg', 'Vendor Registered Successfully.');
					redirect('vendor_dashboard');
				} else {
					$this->session->set_flashdata('email', 'Email already exist!');
					redirect('vendor_dashboard');
				}

			}
			if (isset($_POST['vendor_resetpassword'])) {

				$vendor_id = $_POST['vendor_id'];
				$randomresetPassword_vendor = rand(100000, 999999);
				$email = $this->AdminModel->updatevendorpassword($randomresetPassword_vendor, $vendor_id);

				$mail = $email[0]->user_email;

				$params = array(
					"email" => $mail,
					"password" => $randomresetPassword_vendor
				);
				$postData = '';
				foreach ($params as $k => $v) {
					$postData .= $v . '&';
				}
				rtrim($postData, '&');

				$url = "http://srv1.a1professionals.net/dentalMail/mail.php";

				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
				curl_setopt($ch, CURLOPT_HEADER, false);
				curl_setopt($ch, CURLOPT_POST, $postData);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
				$output = curl_exec($ch);
				if (curl_errno($ch)) {
					echo $error_msg = curl_error($ch);
				}
				curl_close($ch);


				$this->session->set_flashdata('msg', 'Vendor password sent successfully');
				redirect('vendor_dashboard');
			}
			if (isset($_POST['ban'])) {
				//echo "nooooooooo"; die();
				$user_id = $_POST['id'];
				$this->AdminModel->banuser($user_id);
				$this->session->set_flashdata('msg', 'Vendor Banned successfully');
				redirect('vendor_dashboard');
			}
			if (isset($_POST['liftban'])) {
				$user_id = $_POST['id'];
				$this->AdminModel->userlift($user_id);
				$this->session->set_flashdata('msg', 'Vendor unbanned  successfully');
				redirect('vendor_dashboard');
			}

			if (isset($_POST['edit'])) {
				$id = $_POST['id'];
				$name = $this->input->post('user_name');
				$email = $this->input->post('email');
				$yelp = $this->input->post('yelp');
				$y = $this->input->post('yelpId');
				$addr = $this->input->post('add');
				//$adds = $this->input->post('address');
				$con = $this->input->post('country');
				$city = $this->input->post('city');
				$state = $this->input->post('state');
				$zip = $this->input->post('zip');
				$mob = $this->input->post('mobile');
				$gen = $this->input->post('Gender');
				$bir = $this->input->post('birthday');

				$arrs = array($addr, $state, $city, $con, $zip);
				$addsr = implode(" ", $arrs);
				//print_r($addsr);die();
				$apiKey = 'AIzaSyBfIbCqjYImARWKWHlrq-3y_5Y9ZGUndPc'; // Google maps now requires an API key.
				// Get JSON results from this request
				$geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($addsr) . '&sensor=false&key=' . $apiKey);
				$geo = json_decode($geo, true); // Convert the JSON to an array

				if (isset($geo['status']) && ($geo['status'] == 'OK')) {
					$latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
					$longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
					//echo "Latitude:".$latitude."<br>";
					//echo "longitude:".$longitude."";
					$id = $_POST['id'];
					$this->AdminModel->latlon($id, $latitude, $longitude);
				}
				$this->AdminModel->editvendor($id, $name, $email, $yelp, $y, $addr, $con, $city, $state, $zip, $mob, $gen, $bir);
				$this->session->set_flashdata('msg', 'Details updated successfully');
				//redirect('vendor_dashboard');
			}
			if (isset($_POST['editban'])) {
				$id = $_POST['id'];
				$name = $this->input->post('user_name');
				$email = $this->input->post('email');
				$yelp = $this->input->post('yelp');
				$y = $this->input->post('yelpId');
				$addr = $this->input->post('add');
				//$adds = $this->input->post('address');
				$con = $this->input->post('country');
				$city = $this->input->post('city');
				$state = $this->input->post('state');
				$zip = $this->input->post('zip');
				$mob = $this->input->post('mobile');
				$gen = $this->input->post('Gender');
				$bir = $this->input->post('birthday');


				$this->AdminModel->editbv($id, $name, $email, $yelp, $y, $addr, $con, $city, $state, $zip, $mob, $gen, $bir);
				$this->session->set_flashdata('msg', 'Details updated successfully');
				redirect('vendor_dashboard');
			}
			if (isset($_POST['banpic'])) {
				$config['upload_path'] = 'uploads/profile_images';
				$config['allowed_types'] = 'gif|jpeg|jpg|png';
				$config['max_size'] = 2048;
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('image')) {
					//echo"error";
					//$error = array('error' => $this->upload->display_errors());
					//  $this->load->view('vendor_dashboard', $error);
				} else {
					//echo"successfull";
					$upload_data = $this->upload->data();
					//print_r($upload_data);
					$id = $_POST['id'];

					//print_r($id);
					$pi = 'https://portal.dentalplace.app/uploads/profile_images/' . $upload_data['file_name'];
					//print_r($qww); die();
					$this->AdminModel->insert_pic($pi, $id);
					//$this->session->set_flashdata('msg', 'Image upload successfully');
					//redirect('vendor_dashboard');
				}
			}
			if (empty($this->session->userdata('userIds'))) {
				redirect('admin-login');

			} else {

				$tab = $this->input->post('tabu');
				if ($tab == '1') {
					$seav = $this->input->post('searchven');
				} else {
					$seav = $this->input->post('seain');
				}
				///	$findemail = $this->AdminModel->fetchUserDetails($seav);
				//	if (empty($findemail)){
				//		$this->session->set_flashdata('msg', 'Vendor not Found!');
				//		redirect('vendor_dashboard');
				//	}
				$se = $this->input->post('seain');
				//	$finmail = $this->AdminModel->fetils($se);
				//	if (empty($finmail)){
				//		$this->session->set_flashdata('msg', 'Vendor not Found!');
				//		redirect('vendor_dashboard');
				//	}
				$filter = $this->input->post('filter');
				$sort = $this->input->post('sort');
				//$se = $this->input->post('ser');
				//print_r($se);
				$query = $this->AdminModel->displayvendorrecords($filter, $sort, $seav, $se, $tab);
				$vendorresults['activevendor'] = $query['resultt'];
				$vendorresults['tab'] = $query['tab'];

				$query1 = $this->AdminModel->displaybannedvendorrecords($seav, $tab);
				$vendorresults['bannedvendor'] = $query1['resultt'];
				$vendorresults['tab'] = $query1['tab'];

				$vendorresults['popupvendors'] = $this->AdminModel->displaypopupvendorrecords();
				$vendorresults['countries'] = $this->countries->getList();
				//$vendorresults['ser']= $this->AdminModel->service();
				$this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar');
				$this->load->view('admin/vendordashboard', $vendorresults);
				$this->load->view('admin/templates/footer');
			}
		}
	}

	public function uploadImage()
	{


		$config['upload_path'] = 'uploads';
		$config['allowed_types'] = 'gif|jpeg|jpg|png';
		$config['max_size'] = 2048;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('image')) {
			echo "error";
			//$error = array('error' => $this->upload->display_errors());
			//  $this->load->view('vendor_dashboard', $error);
		} else {
			$upload_data = $this->upload->data();
//print_r($upload_data);
			$pic = array(
				'profile_image' => $upoad_data['full_path']

			);
			//$this->model->insert_pic($pic);
			// $this->session->set_flashdata('msg', 'Image upload successfully');
			//redirect('vendor_dashboard');
		}
	}

	public function adminappointment()
	{
		if (empty($this->session->userdata('userIds'))) {
			redirect('admin-login');
		} else {


			$search = $this->input->post('searchfil');
			$tab = $this->input->post('tab');
			$stype = $this->input->post('stype');
			//$findil = $this->AdminModel->fetchapp($search);
			//print_r($findil);
			//	if (empty($findil)){
			//		$this->session->set_flashdata('msg', 'User not Found!');
			//		redirect('admin-appointment');
			//	} 
			$radio = $this->input->post('filter');
			$all = $this->input->post('sort');
			$query = $this->AdminModel->currentApp($radio, $all, $search, $tab, $stype);
			$results['current'] = $query['resultt'];
			$results['tab'] = $query['tab'];
			$results['stype'] = $query['stype'];
			if (isset($_POST['notsub'])) {
				$nid = $this->input->post('noi');
				$n = $this->input->post('note');
				//print_r($n);
				//$not = array('booking_id'=>$nid,'note '=>$n);
				$this->AdminModel->note($nid, $n);

			}

			//$id = $_SESSION['userdata'] ['userid'];

			//$results['notes']=$this->AdminModel->not();

			$query1 = $this->AdminModel->pastappointment($search, $tab, $stype);
			$results['past'] = $query1['resultt'];
			$results['tab'] = $query1['tab'];
			$results['stype'] = $query1['stype'];
			//	$results['side']=$this->AdminModel->sidebar($id);

			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/sidebar', $results);
			$this->load->view('admin/admin_appointment', $results);
			$this->load->view('admin/templates/footer');

		}
	}


	public function logout()
	{

		$this->session->unset_userdata('userIds');
		//print_r($_SESSION['userIds']);  
		$this->session->sess_destroy();
		redirect('admin');
		//$this->load->view('welcome_message');

	}

	public function pushnotification()
	{
		if ($this->session->userdata['logged_in']['level'] != '3') {
			redirect('404');

		} else {

			if (empty($this->session->userdata('userIds'))) {
				redirect('admin-login');

			} else {
				if (isset($_POST['liftban'])) {
					$user_id = $_POST['id'];

					$this->AdminModel->cancelNot($user_id);
					//$this->session->set_flashdata('msg', 'User Unblock Successfully');
					//redirect('admin-dashboard');

				}
				$push['scheduled'] = $this->AdminModel->scheduled();
				$push['past'] = $this->AdminModel->past();
				//$this->AdminModel->past();

				$this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar');
				$this->load->view('admin/pushnotification', $push);
				$this->load->view('admin/templates/footer');
			}
		}

	}

	public function deleteNot($id)
	{
		//echo $id;
		$this->AdminModel->delNot($id);
		redirect('push-notification');
	}

	public function compose()
	{
		if ($this->session->userdata['logged_in']['level'] != '3') {
			redirect('404');

		} else {

			if (empty($this->session->userdata('userIds'))) {
				redirect('admin-login');

			} else {
				if ($this->input->post('save')) {

					$h = $this->input->post('headline');
					$c = $this->input->post('content');
					$d = $this->input->post('date');
					$n = $this->input->post('now');


					if ($n == '0') {
						//<!--------------------------pushemail crl--------------------------------------------------------------------------->

						$alldata = $this->AdminModel->pushemail();

						foreach ($alldata as $usermail) {
							$this->AdminModel->queNotification($usermail->user_email, $h, $c);


						}
						$push = array(
							'title' => $h,
							'description' => $c,
							'notification_type' => $n,
							'schedule_on' => date('Y-m-d H:i:s'),
							'creat_at' => date('Y-m-d H:i:s')
						);

						$this->AdminModel->compose($push);
						$this->session->set_flashdata('msg', 'Notification has pushed successfully');
						redirect('compose');

					}
					if ($n == '1') {

						$push = array(
							'title' => $h,
							'description' => $c,
							'notification_type' => $n,
							'schedule_on' => $d,
							'creat_at' => date('Y-m-d H:i:s')
						);

						$this->AdminModel->composescheduled($push);
						$this->session->set_flashdata('msg', 'Notification has scheduled successfully');
						redirect('compose');

					}
				}

				$this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar');
				$this->load->view('admin/compose');
				$this->load->view('admin/templates/footer');
			}
		}
	}

	public function category()
	{
		if (empty($this->session->userdata('userIds'))) {
			redirect('admin-login');
		} else {
			if (isset($_POST['Sub'])) {
				$s = $this->input->post('serv');
				$ser = array('title' => $s);
				$this->AdminModel->addSer($ser);
			}
			if (isset($_POST['editSer'])) {
				$id = $this->input->post('ids');
				$ed = $this->input->post('editden');
				$this->AdminModel->editServ($id, $ed);
			}

			$category['cat'] = $this->AdminModel->category();

			$this->load->view('admin/templates/header');
			$this->load->view('admin/templates/sidebar');
			$this->load->view('admin/category', $category);
			$this->load->view('admin/templates/footer');
		}
	}

	public function deleteSer($id)
	{
		$this->AdminModel->deletese($id);
		redirect('admin-category');
	}

	public function editNotification()
	{

		if ($this->session->userdata['logged_in']['level'] != '3') {
			redirect('404');

		} else {

			if (empty($this->session->userdata('userIds'))) {
				redirect('admin-login');

			} else {
				if (isset($_POST['save'])) {
					$id = $this->uri->segment(2);
					$he = $this->input->post('headline');
					$co = $this->input->post('content');
					$da = $this->input->post('date');
					$no = $this->input->post('now');
					$this->AdminModel->updatesc($he, $co, $da, $no, $id);
					//$this->session->set_flashdata('msg','Notification has pushed successfully');
					//redirect('edit-notification');
				}

				$id = $this->uri->segment(2);
				//print_r($id);
				$edit['edit'] = $this->AdminModel->editsc($id);
				$this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar');
				$this->load->view('admin/edit_notification', $edit);
				$this->load->view('admin/templates/footer');
			}
		}

	}

	public function deleteUserData()
	{

		if (isset($_POST['delUser'])) {
			$userId = $_POST['userId'];
			$tab = $_POST['tab'];
			//print_r($userId);
			$tab = $this->AdminModel->DeleteUser($userId, $tab);
			$this->session->set_flashdata('del', 'User deleted successfully');
			redirect('admin-dashboard?t=' . $tab);
		}
	}

	public function deleteVendorData()
	{
		if (isset($_POST['delVendor'])) {
			$venId = $_POST['vendorId'];
			$tab = $_POST['tab'];
			//print_r($venId);
			$this->AdminModel->DeleteVendor($venId, $tab);
			$this->session->set_flashdata('del', 'Vendor deleted successfully');
			redirect('vendor_dashboard?t=' . $tab);
		}
	}

	public function quenotification()
	{

		$alldata = $this->AdminModel->quepushemail();
		foreach ($alldata as $push) {

			$params = array(
				"email" => $push->email,
				"Subject" => $push->subject,
				"description" => $push->message
			);

			$postData = '';
			foreach ($params as $k => $v) {
				$postData .= $v . '@#!';
			}
			rtrim($postData, '@#!');

			$url = "http://srv1.a1professionals.net/dentalMail/pushemail.php";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, false);
			curl_setopt($ch, CURLOPT_POST, $postData);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
			$output = curl_exec($ch);
			if (curl_errno($ch)) {
				echo $error_msg = curl_error($ch);
			}
			curl_close($ch);

			$this->AdminModel->Deletequepush($push->id);
			echo $push->email . '<br>';

		}

	}


}

?>
