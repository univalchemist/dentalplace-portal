<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Vendor_Controller extends CI_Controller {
	
	public function __construct() 
		{ 
			parent::__construct();			
			$this->load->library('form_validation');			
			$this->load->model('VendorModel');			
			$this->load->library('session');
			$this->load->helper('url'); 
		}
	
  public function vendorloginfun()
  {		 $this->load->library('form_validation');
        $redirect_to = 'vendor_login';
        $this->form_validation->set_rules('vendoremail', 'vendoremail', 'required');
        $this->form_validation->set_rules('vendorpassword', 'vendorpassword', 'required');
        if ($this->form_validation->run() == true) {
            $username = $this->input->post('vendoremail');
            $password = $this->input->post('vendorpassword');
            $user_details = $this->VendorModel->fetchUserDetails($username);
            $us= $this->VendorModel->banyu($username);
			//print_r($us); 
			//print_r($us);die();			
			if (!empty($user_details)) {
                if ($password != $user_details[0]['password']) {
                  $this->session->set_flashdata( 'msg','Invalid Username and Password');
				  redirect('vendor_login');
                }
				elseif ($user_details[0]['status'] == 0) {
                  $this->session->set_flashdata( 'msg','Your Account has been Banned.Please contact to Admin.');    
				  redirect('vendor_login');
                }
				     
				else {
					echo $this->session->set_userdata('userIds',$user_details[0]['id']);

                    $user_data = array('userid' => $user_details[0]['id'],
										'user_email' => $user_details[0]['user_email']
										);
 
                    $this->session->set_userdata($user_data);
                     $userdata = array('userid' => $user_details[0]['id'],
						 				'user_email' => $user_details[0]['user_email']) ;

					$_SESSION["userdata"] = $userdata;
                    redirect('vendor-appointment');
					
                }
            }
				
			else {
                $this->session->set_flashdata( 'msg','User does not exist.'); 
				 redirect('vendor_login');
            }
        }
      $results['data']=$this->VendorModel->ban();
		$this->load->helper('url');  
		$this->load->view('vendor/vendor_login',$results);
		$this->load->view('vendor/vendor_templates/header');
		$this->load->view('vendor/vendor_templates/footer');
  }
  
  
  public function vendorrecoverfun(){
			$user_email = $this->input->post('user_email');  
			$data = array('user_email'=>$user_email);
			$findemail = $this->VendorModel->ForgotPassword($data);
			if(isset($_POST['save'])){
				if(!empty($findemail['id']) && $findemail['level'] == '2'){
					$id = $findemail['id'];
					$randomOtp = rand(100000,999999);				
					$this->db->where('id',$id);
					$this->db->update('user', array('otp' => $randomOtp));		
					$res = $this->db->affected_rows();
					if($res > 0){	
						$user = array('user_email' => $user_email);
						$params= array(
            "email" => $user_email,
           "password" => $randomOtp
        );
        $postData = '';
        foreach($params as $k => $v) 
        { 
          $postData .= $v.'&'; 
        }
        rtrim($postData, '&');
        
			$url = "http://srv1.a1professionals.net/dentalMail/otpemail.php";
			$ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, false); 
            curl_setopt($ch, CURLOPT_POST, $postData);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            $output=curl_exec($ch);
			if (curl_errno($ch)) {
            echo $error_msg = curl_error($ch);
            }
            curl_close($ch);
           
						$_SESSION["user"] = $user;
						redirect('vendor_sent_otpcode');
					}
					else{
						$this->session->set_flashdata('msg','');	
					}
				}
				else{
				$this->session->set_flashdata('msg','Email Not found!');	
				 redirect('vendor_recover');
				}	
		}
		$this->load->view('vendor/vendor_recover');
		$this->load->view('vendor/vendor_templates/header');
		$this->load->view('vendor/vendor_templates/footer');
		
		
	}
	public function resend(){
		$resend = $_SESSION['user'] ['user_email'];
		//print_r($username);			
		$findemail = $this->VendorModel->otpre($resend);
				if(!empty($findemail['id']) && $findemail['level'] == '2'){
					$id = $findemail['id'];
					$randomOtp = rand(100000,999999);
					//print_r($id);			
					//print_r($randomOtp);			
				$this->db->where('id',$id);
					$this->db->update('user', array('otp' => $randomOtp));		
					$res = $this->db->affected_rows();	
					
					
						$params= array(
            "email" => $resend,
           "password" => $randomOtp
        );
        $postData = '';
        foreach($params as $k => $v) 
        { 
          $postData .= $v.'&'; 
        }
        rtrim($postData, '&');
        
			$url = "http://srv1.a1professionals.net/dentalMail/otpemail.php";
			$ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, false); 
            curl_setopt($ch, CURLOPT_POST, $postData);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            $output=curl_exec($ch);
			if (curl_errno($ch)) {
            echo $error_msg = curl_error($ch);
            }
            curl_close($ch);
					
					
					
					
					
					
					$this->session->set_flashdata('otp','OTP is sent on your email.');
		redirect('vendor_sent_otpcode');
				}					
	}
	public function vendorsendotpfun()
	{
	$otp = $this->input->post('otp'); 
		$otp .= $this->input->post('otpa');
		$otp .= $this->input->post('otpb');
		$otp .= $this->input->post('otpc');
		$otp .= $this->input->post('otpd');
		$otp .= $this->input->post('otpe');

		$arr=array($otp);
		$impo = implode($arr);
	 	$findotp = $this->VendorModel->OTPpassword($impo);  
		if(isset($_POST['otppass'])){
			if($findotp ){
						 redirect('vendor-create-password');
						 }
		   else{
			   $this->session->set_flashdata('msg','Wrong or expired OTP. Please re-enter.');
			   redirect('vendor_sent_otpcode');
				}
		}
		$this->load->view('vendor/vendor_sentotpcode');
		$this->load->view('vendor/vendor_templates/header');
		$this->load->view('vendor/vendor_templates/footer');
		
	}
	
	
	public function createpasswordfun()
	{		$username = $_SESSION['user'] ['user_email'];		//print_r($username);
		$new = $this->input->post('new'); 
		$confirm = $this->input->post('confirm'); 
		if($new == $confirm){
			if(isset($_POST['create_pass'])){	
				$pass = array('new'=>$new,'confirm'=>$confirm);	
				$findemail = $this->VendorModel->CreatePassword($pass,$username);
				redirect('vendor_login');
			}
		}  

			else{
				$this->session->set_flashdata('msg','Password does not match.');
				 redirect('vendor-create-password');
			}
		$this->load->helper('url');
		$this->load->view('vendor/vendor_create_password');
		$this->load->view('vendor/vendor_templates/header');
		$this->load->view('vendor/vendor_templates/footer');
		
	}
	public function appointment(){
	    $tabValue = $this->input->post('tabVendorNote');
		 if(empty($this->session->userdata('userIds'))){ 
            redirect('vendor_login');
		}
		else{ 
	
						$id = $_SESSION['userdata'] ['userid'];
						$on = "1";
						$this->VendorModel->online($id,$on);
						
				
			$search = $this->input->post('searchfil');
			$tab =$this->input->post('tab');
			/* $findil = $this->VendorModel->fetchsea($search);
			//print_r($findil);
		  		if (empty($findil)){
					$this->session->set_flashdata('msg', 'User not Found!');
					redirect('vendor-appointment');
				}  */  
			$radio = $this->input->post('filter');  
			$all = $this->input->post('sort');	
			
			$vapp=$this->VendorModel->currentApp($radio,$all,$search,$tab);
			$results['current']= $vapp['resultt'];
			$results['TabValue']= $vapp['tab'];
			if(isset($_POST['notsub'])){	
            $tab =$this->input->post('tab');			
			$nid = $this->input->post('noi');
			//print_r($nid); 
			$n = $this->input->post('note');
			//print_r($n); die();
			//$not = array('booking_id'=>$nid,'note '=>$n);
			$this->VendorModel->note($nid,$n,$tab);
			$results['TabValue'] = '0';
			
			}
			 
            $id = $_SESSION['userdata'] ['userid'];
 
			//$results['notes']=$this->VendorModel->not();
			$results['pastdata']=$this->VendorModel->notepast();
			$results['past']=$this->VendorModel->past();
			$results['service'] = $this->VendorModel->getServiceBooking($id);
			$results['side']=$this->VendorModel->sidebar($id);
			//$results['TabValue']=$tabValue;
						    
		$this->load->view('vendor/vendor_templates/header');
		$this->load->view('vendor/vendor_templates/sidebar',$results);
		$this->load->view('vendor/vendor_appointment',$results);  
		$this->load->view('vendor/vendor_templates/footer');
		 } 
	}
	public function logout()  {
		$this->session->unset_userdata('userIds');
	    $this->session->sess_destroy();
		$id = $_SESSION['userdata'] ['userid'];
						$on = "0";
						$this->VendorModel->offline($id,$on);
		redirect('vendor_login');
	} 
	public function profile(){
		 if(empty($this->session->userdata('userIds'))){ 
            redirect('login');
		}
		else{

			if(isset($_POST['subpic'])){ 
			$config['upload_path']   = 'uploads/profile_images'; 
			$config['allowed_types'] = 'gif|jpeg|jpg|png'; 
			$config['max_size']      = 2048;
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('image')) {
				//echo"error";
				//$error = array('error' => $this->upload->display_errors()); 
				//$this->load->view('admin-dashboard', $error); 
			}
			else {
				$upload_data = $this->upload->data();	
				//print_r($upload_data); 
				$id  = $_POST['id'];
				$pic = 'https://portal.dentalplace.app/uploads/profile_images/'.$upload_data['file_name'];
				//print_r($pic);die();
				$this->VendorModel->insert_uspic($pic,$id);
				//$this->session->set_flashdata('msg', 'Image upload successfully');
				//redirect('admin-dashboard');
			} 
		}
		if(isset($_POST['ename'])){
		$id = $_SESSION['userdata'] ['userid'];
		$n = $this->input->post('name');
		$this->VendorModel->editName($id,$n);
		}
		if(isset($_POST['delser'])){ 
		$id = $this->input->post('id');
		$this->VendorModel->DelSer($id);
		}
		$id = $_SESSION['userdata'] ['userid'];
		$e = $this->input->post('user_email');
		if(isset($_POST['subadd'])){
		$id = $_SESSION['userdata'] ['userid'];
		$a = $this->input->post('address');
		$c = $this->input->post('city');
		$s = $this->input->post('state');
		$co = $this->input->post('country');
		$z = $this->input->post('zip');
		/* $ad = (explode(",",$a));
		$ad1 = $ad[0];
		$ad2 = $ad[1];
		$ad3 = $ad[2];
		$ad4 = $ad[3];
		$ad5 = $ad[4]; */
		$arr = array($a,$c ,$s ,$co,$z);
		$address = implode(" ",$arr);
		 //print_r($address); die();    
		if($address != ""){	  
		$apiKey = 'AIzaSyBfIbCqjYImARWKWHlrq-3y_5Y9ZGUndPc'; // Google maps now requires an API key.
			$geo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false&key='.$apiKey);
			$geo = json_decode($geo, true); // Convert the JSON to an array

			if (isset($geo['status']) && ($geo['status'] == 'OK')) {
			  $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
			  $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
			//echo "Latitude:".$latitude."<br>";
			//echo "longitude:".$longitude.""; 
			}  
			$this->VendorModel->latlan($id,$latitude,$longitude);
			}
		else{ 
			 
		}
		$this->VendorModel->editAdd($id,$a,$c,$s,$co,$z);
		}
		if(isset($_POST['subhours'])){
		$open = array(
						'Sun' => $this->input->post('date13'),
						'Mon' => $this->input->post('date1'),
						'Tue' => $this->input->post('date3'),
						'Wed' => $this->input->post('date5'),
						'Thu' => $this->input->post('date7'),
						'Fri' => $this->input->post('date9'),
						'Sat' => $this->input->post('date11')
						
						);
		$json_data['open_data'] = json_encode($open);
		$this->VendorModel->openhr($id,$json_data); 
		
		$close = array(
						'Sun' => $this->input->post('date14'),
						'Mon' => $this->input->post('date2'),
						'Tue' => $this->input->post('date4'),
						'Wed' => $this->input->post('date6'),
						'Thu' => $this->input->post('date8'),
						'Fri' => $this->input->post('date10'),
						'Sat' => $this->input->post('date12')
						
						);
		$json_data1['close_data'] = json_encode($close);
		$this->VendorModel->closehr($id,$json_data1);		
		}
		if(isset($_POST['service'])){ 
		$serv = $this->input->post('ser');
		
		$pri = $this->input->post('price');
		$ress =$this->VendorModel->check($id,$serv);
		if(empty($ress)){
			$sid = $this->VendorModel->serId($serv);
			//print_r($sid);
			$sid1 = $sid[0]['id'];			
			//print_r($sid1);
			$array1 = array('vendor_id'=>$id,'servicesId '=>$sid1, 'serviceName'=>$serv, 'servicePrice'=>$pri);
			$this->VendorModel->serPr($id,$array1); 
		}
		else{
				$this->session->set_flashdata('msg','Service already exists.');
				redirect('vendor-profile');
		}
		}
		$results['edit']=$this->VendorModel->editProfile($e,$id);
		$results['ser']=$this->VendorModel->viewSer($id);
		$results['denser']=$this->VendorModel->services();   
		$results['service'] = $this->VendorModel->getServiceBooking($id);
		$results['side']=$this->VendorModel->sidebar($id);
		
		$this->load->view('vendor/vendor_templates/header');
		$this->load->view('vendor/vendor_templates/sidebar',$results);
		$this->load->view('vendor/vendor_profile',$results);   
		$this->load->view('vendor/vendor_templates/footer');
	}
	}
	public function delser(){
		
	}public function chat(){
		$id = $_SESSION['userdata'] ['userid'];
		$results['userId'] = $id;
		$results['side'] = $this->VendorModel->sidebar($id);
		$search = $this->input->post('searchfil');
		//print_r($search);
		$findil = $this->VendorModel->fetchChat($search);
			//print_r($findil);
		  		if (empty($findil)){
					$this->session->set_flashdata('msg', 'User not Found!');
					redirect('vendor-chat');
				}
		$results['service'] = $this->VendorModel->getServiceBooking($id);
		$results['allchat'] = $this->VendorModel->vendorchat($search);
	    $results['getChatMessages'] = $this->VendorModel->GetChatmeesages();
	    $results['GetVendorServices'] = $this->VendorModel->GetVendorServices($id);


		$this->load->view('vendor/vendor_chat_booking', $results);
		$this->load->view('vendor/vendor_templates/header');
		$this->load->view('vendor/vendor_templates/sidebar',$results);
//		$this->load->view('vendor/vendor_chat_bak',$results);
		$this->load->view('vendor/vendor_chat',$results);
		$this->load->view('vendor/vendor_templates/footer');
		
	}
	
	public function AcceptAppointment(){
	    
	  $services_booking_id = $this->input->post('services_booking_id');
	  $service_id = $this->input->post('service_id');
	  $UserId = $this->input->post('UserId');
	  $data = array(
    	        'confirmByClinic' => '1',
    	        'cofimedByClinicTime'=>date('Y-m-d H:i:s')
    	        );
      $this->VendorModel->ConfirmByClinic($services_booking_id,$data);
      
      redirect('vendor-chat/?serviceBookingId='.$services_booking_id);
	}
	
	public function CancelAppointment(){
	    
	  $services_booking_id = $this->input->post('services_booking_id');
	  
      $this->VendorModel->Cancel_Appointments($services_booking_id);
	 
	  redirect('vendor-chat');
	    
	}
	
	public function SendMessage(){
	    $services_booking_id = $this->input->post('bookAppointmentId');
	    $UserId = $this->input->post('UserRecieverId');
	    $service_id = $this->input->post('service_id');
	    $data = array(
	            'bookAppointmentId' => $this->input->post('bookAppointmentId'),
	            'senderId' =>          $this->input->post('clinicSenderId'),
	            'recevierId' =>        $this->input->post('UserRecieverId'),
	            'message' =>           $this->input->post('SendMessage'),
	            'senderName' =>        $this->input->post('clinicSenderName'),
	            'reciverName' =>       $this->input->post('UserRecieverName'),
	            'created_at'=>         gmdate("Y-m-d H:i:s"), 
	        );
	        
	        $this->VendorModel->send_message($data);
	        
	        redirect('vendor-chat/?serviceBookingId='.$services_booking_id);
	}
	
	public function GetAllNewMessages(){
	    
	    $ServiceBookingId = $this->input->post('ServiceBookingId');
	    $GetData= $this->VendorModel->GetChat($ServiceBookingId);
	    $myJSON = json_encode($GetData);
		echo $myJSON;
		
	
		
		

	} 
	
	public function SendBookingByVendor(){
	    $id = $_SESSION['userdata'] ['userid'];
	    $serviceId = $this->input->post('select_treatment');
	    $GetVendorServices = $this->VendorModel->GetVendorServices($id);
	    $services_booking_id = $this->input->post('serviceBookingId');
	    foreach($GetVendorServices as $GetServices) {
	         if($GetServices->servicesId==$serviceId){
	             
	             $sevicePrice = $GetServices->servicePrice;
	             $seviceName = $GetServices->serviceName;
	         }
	    }
	    
	    $data = array(
	        
	            'userId' =>  $this->input->post('UserId'),
	            'ownerId' =>  $this->input->post('clinicName'),
	            'clinicId' =>  $this->input->post('clinicId'),
	            'serviceId' =>  $this->input->post('select_treatment'),
	            'serviceName' => $seviceName,
	            'servicePrice' =>  $sevicePrice,
	            'time' =>  $this->input->post('appoint_time'),
	            'appointment_date' => $this->input->post('appoint_date'),
	            'confirmByUser' => '0',
	            'confirmByClinic' => '1',
	        
	            );
	            
	            $this->VendorModel->AddBookingByVendor($data);
	            
	           redirect('vendor-chat/?serviceBookingId='.$services_booking_id);
	}
}


