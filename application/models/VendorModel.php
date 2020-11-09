<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class VendorModel extends CI_Model {
	public function __construct(){
			parent::__construct();			
			$this->load->helper('string');			
		}
	 public function fetchUserDetails($username){
        $this->db->select('*');
        $this->db->from('user');
		//$this->db->where('status','1');
		$this->db->where('level',2);
        $this->db->where('user_email', $username);
        $query = $this->db->get();
        return $query->result_array();
	 }
	 public function banyu($username){
        $this->db->select('*');
        $this->db->from('user');
		//$this->db->where('status','0');
		$this->db->where('level',2);
		$this->db->where('user_email',$username);
        //$this->db->where('user_email', $user_name);
        $query = $this->db->get();
        return $query->result_array();
	 }
	public function ban(){			
	    $this->db->select('ben_start');
		$this->db->select('ben_end');
		$this->db->where('status=','0');
		$this->db->from('user');
		$query = $this->db->get();
		$result = $query->result();
		return  $result;			  		  
	}
	public function ForgotPassword($data){
        $this->db->select('*');
        $this->db->from('user');
		$this->db->where('status','1');		
        $this->db->where($data); 
        $query=$this->db->get();
        $result = $query->row_array();
		return  $result;		
 }
 public function otpre($resend){
        $this->db->select('*');
        $this->db->from('user');
		$this->db->where('status','1');		
		$this->db->where('user_email',$resend);		
        //$this->db->where($resend); 
        $query=$this->db->get();
        $result = $query->row_array();
		return  $result;		
 }
	public function sendpassword($data){
	echo "hello";
	die;
	if($this->input->post('save')){
		$randomPass = rand(999,999999);			
		$addArray = array('user_email'=>'','password'=>'','level'=>'2','otp'=>$randomPass);			
		$this->db->insert('user', $addArray);
		$insert_id = $this->db->insert_id();
		echo 'hello';
		echo $insert_id;
		die;			
	}  }

	public function OTPpassword($impo){
		$this->db->select('otp');
        $this->db->from('user'); 
		$this->db->where('level', 2);
		$this->db->where('status', 1);
		$this->db->where('otp',$impo);
        $query=$this->db->get();
        $result = $query->row_array();	
		return  $result;	
	}  
	public function CreatePassword($pass,$username){
		$this->db->set('password', $pass['new']);
		$this->db->where('user_email',$username);
		$this->db->where('level', 2);
		$this->db->where('status', 1);
		$this->db->update('user');
		$res = $this->db->affected_rows();
   		return true; 
	}
	public function fetchsea($search){
		/*$this->db->select('user_name');
		$this->db->from('user');
		//$this->db->where('status=',1);
		//$this->db->where ('user.level=',2); 
		$this->db->like ('user.user_name',$search);		
		$qry= $this->db->get();
		$bannedv = $qry->result();
		return $bannedv;*/
		
	
	    $id = $_SESSION['userdata'] ['userid'];
        $this->db->select('*');
        $this->db->from('services_booking');
        $this->db->join('user', 'services_booking.userId = user.id');
		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid'); 
	//	$this->db->where ('clinicId',$id);
		$this->db->like ('user.user_name',$search);
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
		return  $resultt;
    }
	public function currentApp($radio,$all,$search,$tab ){
		
		if($search!= '' && $tab == '1'){
		/*	$this->db->select('*');
			$this->db->from('user');
			$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			$this->db->join('vendor_reviews', 'user.id = vendor_reviews.vendor_id');
			$this->db->join('services_booking','user.id = services_booking.clinicId');
			$this->db->where('user.status=',1);
			$this->db->where ('user.level=',2);
			$this->db->where('services_booking.status=',0);
			$this->db->like ('user.user_name',$search);
			$this->db->affected_rows() > 0;		
			$queryy = $this->db->get();
			$result = $queryy->result();
			return  $result;*/
			
			$date = new DateTime();
    	    $userIds = array();
    	    $id = $_SESSION['userdata'] ['userid'];
    	    $this->db->select('services_booking.*,services_booking.id as services_booking_id, user.*,user_meta.*');
    		$this->db->from('services_booking');
    		$this->db->join('user', 'services_booking.userId = user.id');
    		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
    	//	$this->db->where ('confirmByClinic','1');
    	//	$this->db->where ('confirmByUser','1');
    	$wherecond = "(user.user_name LIKE '%" . $search . "%' OR services_booking.serviceName LIKE '%" . $search . "%' ) AND (appointment_timestamp >'" . $date->getTimestamp() . "') ";
    	    
    		$this->db->where ($wherecond);
			$this->db->where ('clinicId',$id);
			$queryy = $this->db->get();
    		$resultt = $queryy->result();
    		//return  $resultt;
				 return array(
                 'resultt' => $resultt,
                 'tab' => $tab,); 

    		
     		}    
	else{}
	 
	 	/*----------------------4/22---------------------*/
	 	
			if($all == "o"){ 
			    
	     	/*$this->db->select('*');
			$this->db->from('user');
			$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			$this->db->where('user.status=',1);

			$this->db->where ('user.level=',2);
			$this->db->order_by('user.id', 'ASC');
			$queryy = $this->db->get();
			$resultt = $queryy->result();
			return  $resultt;*/
			
		    $date = new DateTime();
    	    $userIds = array();
    	    $id = $_SESSION['userdata'] ['userid'];
    	    $this->db->select('services_booking.*,services_booking.id as services_booking_id, user.*,user_meta.*');
    		$this->db->from('services_booking');
    		$this->db->join('user', 'services_booking.userId = user.id');
    		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
    	    $this->db->order_by('services_booking.id', 'ASC');
    		$this->db->where ('clinicId',$id);
    		$this->db->where ('appointment_timestamp >',$date->getTimestamp());
    	    $queryy = $this->db->get();
    		$resultt = $queryy->result();
    		//return  $resultt;
    		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,); 
	}
	elseif($all == 'n'){
	        $date = new DateTime();
    	    $userIds = array();
    	    $id = $_SESSION['userdata'] ['userid'];
    	    $this->db->select('services_booking.*,services_booking.id as services_booking_id, user.*,user_meta.*');
    		$this->db->from('services_booking');
    		$this->db->join('user', 'services_booking.userId = user.id');
    		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
    	    $this->db->order_by('services_booking.id', 'DESC');
    		$this->db->where ('clinicId',$id);
    		$this->db->where ('appointment_timestamp >',$date->getTimestamp());
    	    $queryy = $this->db->get();
    		$resultt = $queryy->result();
    		//return  $resultt;
    		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,); 
			
	} 
	

	elseif($radio == 'c'){
	    $date = new DateTime();
	    $userIds = array();
	    $id = $_SESSION['userdata'] ['userid'];
        $this->db->select('services_booking.*,services_booking.id as services_booking_id, user.*,user_meta.*');
        $this->db->from('services_booking');
        $this->db->join('user', 'services_booking.userId = user.id');
		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid'); 
		$this->db->where ('clinicId',$id);
		$this->db->where('services_booking.source=','c');
		$this->db->where ('appointment_timestamp >',$date->getTimestamp());
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
		//return  $resultt;
		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,); 
		
		}
	elseif($radio == 'p'){ 
		$date = new DateTime();
	    $userIds = array();
	    $id = $_SESSION['userdata'] ['userid'];
        $this->db->select('services_booking.*,services_booking.id as services_booking_id, user.*,user_meta.*');
        $this->db->from('services_booking');
        $this->db->join('user', 'services_booking.userId = user.id');
		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid'); 
		$this->db->where ('clinicId',$id);
		$this->db->where('services_booking.source=','p');
		$this->db->where ('appointment_timestamp >',$date->getTimestamp());
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
		//return  $resultt;
		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,); 
	}
	  

	/*--------------------------------------------*/
	else{
	    $date = new DateTime();
	    $userIds = array();
	    $id = $_SESSION['userdata'] ['userid'];
	    $this->db->select('services_booking.*,services_booking.id as services_booking_id, user.*,user_meta.*');
		$this->db->from('services_booking');
		$this->db->join('user', 'services_booking.userId = user.id');
		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
	//	$this->db->where ('confirmByClinic','1');
	//	$this->db->where ('confirmByUser','1');
 		$this->db->where ('clinicId',$id);
		$this->db->where ('appointment_timestamp >',$date->getTimestamp());
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
		

		//return  $resultt;
		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,); 
		
		
		if(!empty($resultt)){
		    foreach($resultt as $ky=>$vl){
		        
		       array_push($userIds,$resultt[$ky]->userId);
		       
		    }
		}
		/*print_r(array_unique($userIds));
		
		*/
	    
	}
	    /*	$this->db->select('*');
			$this->db->from('user');
			$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			$this->db->join('vendor_reviews', 'user.id = vendor_reviews.vendor_id');
			$this->db->where('user.status=',1);
			$this->db->where ('user.level=',2);
			$queryy = $this->db->get();
			$resultt = $queryy->result();
			return  $resultt;*/
			
		   
			//$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			//$this->db->join(' ', 'user.id = services_booking.clinicId');
			//$this->db->where('user.status=',1);
			

}
   
	public function past(){
	    $date = new DateTime();
        $userIds = array();
	    $id = $_SESSION['userdata'] ['userid'];
	    $this->db->select('*');
	    $this->db->select('services_booking.source as bookingsource');
		$this->db->from('services_booking');
		$this->db->join('user', 'services_booking.userId = user.id');
		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
		//$this->db->where ('confirmByClinic','1');
		//$this->db->where ('confirmByUser','1');
		$this->db->where ('clinicId',$id);
		$this->db->where ('appointment_timestamp <',$date->getTimestamp());
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
		return  $resultt;
		/*echo '<pre>';
	print_r($resultt);
	echo '</pre>';  */
		
	}
	public function notepast(){
	   $date = new DateTime();
	    $id = $_SESSION['userdata'] ['userid'];
	    $this->db->select('*');
		$this->db->select('services_booking.source as bookingsource');
		$this->db->from('services_booking');
		//$this->db->where ('confirmByClinic','1');
		//$this->db->where ('confirmByUser','1');
		$this->db->where ('clinicId',$id);
		$this->db->where ('appointment_timestamp <',$date->getTimestamp());
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
		return  $resultt;
		/*echo '<pre>';
	print_r($resultt);
	echo '</pre>';  */
		
	}
	public function sidebar($id){	
		$this->db->select('*');
		$this->db->from('user'); 
		$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
		//$this->db->join('vendor_reviews', 'user.id = vendor_reviews.vendor_id');
		$this->db->where('user.id', $id);		
		$this->db->where('status=',1);
		$this->db->where ('user.level=',2);
		$qur= $this->db->get();
		$res = $qur->result();
		return $res;
	}
	public function editAdd($id,$a,$c,$s,$co,$z){
			if($a){
		$this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->set('address',$a);
		$this->db->where('vendor_id', $id);
		$this->db->update('vendor_meta'); 
		$res = $this->db->affected_rows(); 
			}if($c){
		$this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->set('city',$c);
		$this->db->where('vendor_id', $id);
		$this->db->update('vendor_meta'); 
		$res = $this->db->affected_rows(); 
			}if($s){
		$this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->set('state',$s);
		$this->db->where('vendor_id', $id);
		$this->db->update('vendor_meta'); 
		$res = $this->db->affected_rows(); 
			}if($co){
		$this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->set('country',$co);
		$this->db->where('vendor_id', $id);
		$this->db->update('vendor_meta'); 
		$res = $this->db->affected_rows(); 
			}if($z){
		$this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->set('zipcode',$z);
		$this->db->where('vendor_id', $id);
		$this->db->update('vendor_meta'); 
		$res = $this->db->affected_rows(); 
			}		
	}
	public function editName($id,$n){
		$this->db->join('user_meta', 'user.id = user_meta.userid');
		$this->db->set('user_name',$n);
		$this->db->where('id', $id);
		$this->db->update('user'); 
		$res = $this->db->affected_rows(); 
	}
	public function DelSer($id){
		$this -> db -> where('id', $id);
		$this -> db -> delete('vendor_provided_services');
	}
	public function editProfile($e,$id){	
	if($e){
		$this->db->set('user_email',$e);
		$this->db->where('id', $id);
		$this->db->update('user'); 
		$res = $this->db->affected_rows(); 
	}
	
	
	
	$this->db->select('*');
	$this->db->from('user');
	$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
	//$this->db->join('vendor_reviews', 'user.id = vendor_reviews.vendor_id');
	$this->db->where('user.id=',$id);
	$this->db->where('user.status=',1);
	$this->db->where ('user.level=',2);
	$queryy = $this->db->get();
	$resultt = $queryy->result();
	return  $resultt;
	}
 	public function openhr($id,$json_data){
		$this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->set('open',$json_data['open_data']);
		$this->db->where('vendor_id', $id);
		$this->db->update('vendor_meta'); 
		$res = $this->db->affected_rows(); 
	}
	public function closehr($id,$json_data1){
		$this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->set('close',$json_data1['close_data']);
		$this->db->where('vendor_id', $id);
		$this->db->update('vendor_meta'); 
		$res = $this->db->affected_rows(); 
	}
	public function viewSer($id){
		$this->db->select('*');
	$this->db->from('user');
	$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
	$this->db->join('vendor_provided_services', 'user.id = vendor_provided_services.vendor_id');
	$this->db->where('user.id',$id);
	$this->db->where('user.status',1);
	$this->db->where ('user.level',2);
	$queryy = $this->db->get();
	$resultt = $queryy->result();
	/* echo '<pre>';
	print_r($resultt);
	echo '</pre>'; */
	return  $resultt;
	}
	public function services(){
	$this->db->select('*');
	$this->db->from('vendor_services');
	$queryy = $this->db->get();
	$resultt = $queryy->result();
	/*echo '<pre>';
	print_r($resultt);
	echo '</pre>';  */
	return  $resultt;
	}
 	public function serPr($id,$array1){
		//print_r($array1);
	 	$this->db->insert('vendor_provided_services',$array1);
	} /**/ 
	public function check($id,$serv){
		$this->db->select('*');
	$this->db->from('user');
	$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
	$this->db->join('vendor_provided_services', 'user.id = vendor_provided_services.vendor_id');
	$this->db->where('user.id',$id);
	$this->db->where('user.status',1);
	$this->db->where ('user.level',2);
	$this->db->where ('vendor_provided_services.serviceName',$serv);
	//$this->db->where ('vendor_provided_services.servicePrice',$pri);
	$queryy = $this->db->get();
	$resultt = $queryy->result();
	/* echo '<pre>';
	print_r($resultt);
	echo '</pre>'; */
	return  $resultt;
	}
	public function serId($serv){
		$this->db->select('id');
	    $this->db->from('vendor_services');
		$this->db->where('title',$serv);
	    $queryy = $this->db->get();
	$resultt = $queryy->result_array();
	//print_r($resultt);
	return  $resultt;
	}
	public function note($nid,$n,$tab){
	    
	    $this->db->select('id');
	    $this->db->from('appointment_note');
		$this->db->where('booking_id',$nid);
	    $queryy = $this->db->get();
	    $result = $queryy->result_array();
	    
	   if(!empty($result)){
		$this->db->set('note',$n);
		$this->db->where('booking_id',$nid);
		$this->db->update('appointment_note'); 
		$res = $this->db->affected_rows();  
	   }
	   else
	   {
	    $addArray = array('booking_id'=>$nid,'note'=>$n);			
		$this->db->insert('appointment_note', $addArray);
		$insert_id = $this->db->insert_id();
	       
	   }
		
		
	}
	public function not($id){
	$this->db->select('*');
	$this->db->from('appointment_note');
	$this->db->where ('booking_id',$id);
	$queryy = $this->db->get();
	$resultt = $queryy->result();
	/*echo '<pre>';
	print_r($resultt);
	echo '</pre>';  */
	return  $resultt;
	}
	/* public function notqwe($id){
	$this->db->select('*');
	$this->db->from('appointment_note');
	$this->db->where('booking_id', $id);
	$queryy = $this->db->get();
	$resultt = $queryy->result();
	echo '<pre>';
	print_r($resultt);
	echo '</pre>';  
	return  $resultt;
	} */
	public function insert_uspic($pic,$id){
	    //print_r($pic); die(); 
		$this->db->set('profile_image',$pic);
		$this->db->where('id', $id);
		$this->db->where('level', 2);
		$this->db->update('user');
		$res = $this->db->affected_rows();
	}
	public function latlan($id,$latitude,$longitude){
	/* print_r($id);
	print_r($latitude);
	print_r($longitude); */
		$this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->set('Latitude',$latitude);   
		$this->db->set('Longitude',$longitude);
		$this->db->where('vendor_id', $id);
		$this->db->update('vendor_meta');    
		$res = $this->db->affected_rows();
			
	}
	
	public function vendorchat($search)
	{
	    if($search){
	    $id = $_SESSION['userdata'] ['userid'];
	    $this->db->select('services_booking.*,services_booking.id as services_booking_id,services_booking.created_at as services_booking_date, user.*');
		$this->db->from('services_booking');
		$this->db->join('user', 'services_booking.userId = user.id');
		//$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
		$this->db->where ('clinicId',$id);
		$this->db->like ('user.user_name',$search);		
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
		return  $resultt;
		}
		$id = $_SESSION['userdata'] ['userid'];
	    $this->db->select('services_booking.*,services_booking.id as services_booking_id,services_booking.created_at as services_booking_date, user.*');
		$this->db->from('services_booking');
		$this->db->join('user', 'services_booking.userId = user.id');
		//$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
		$this->db->where ('clinicId',$id);
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
		return  $resultt;
	    
	}
		public function review($id)
	
	{
	    $this->db->select('COUNT(id) AS total, AVG(rating) AS rate');
		$this->db->from('vendor_reviews');
		$this->db->where ('vendorId=',$id);
		$qur= $this->db->get();
		$res = $qur->result();
	    return $res;
	 //$totalreview = "(SELECT COUNT(idr), AVG(star_rate)  FROM `vendor_reviews` WHERE `vendor_id` = '37')";   
	    
	}
	
	   public function ConfirmByClinic($services_booking_id,$data){
	    return $update = $this->db->update('services_booking',$data,array('id' => $services_booking_id));
	}
	
	   public function Cancel_Appointments($services_booking_id){
	        
	     $this->db->delete('services_booking', array('id' => $services_booking_id));  
	    }
	    
	    public function send_message($data){
	      $this->db->insert('chat',$data);  
	    }
	    
	    public function GetChatmeesages(){
          $qur= $this->db->get('chat');
          $res = $qur->result();
          return $res;  
	      
	    }
	    
	    public function GetChat($ServiceBookingId){
	      //$qur= $this->db->get_where('chat1',array('bookAppointmentId'=>$ServiceBookingId));
	      $this->db->from('chat');
	      $this->db->where ('bookAppointmentId=',$ServiceBookingId);
	      $this->db->order_by("id", "asc");
	      $qur = $this->db->get(); 
          $res = $qur->result();
          return $res; 
	    }
	    
	    public function getServiceBooking($id){
	        
	        $que = $this->db->query("select * from services_booking where clinicId=$id order by id ASC limit 1 offset 0");
		    $res = $que->result();
		    return $res;
	    }
	    
	    public function GetVendorServices($id){
	    
	       $qur= $this->db->get_where('vendor_provided_services',array('vendor_id'=>$id));
           $res = $qur->result();
           return $res;
	    }
	    
	    
	    public function AddBookingByVendor($data){
	        
	       $this->db->insert('services_booking', $data);
	       
	    }
	 public function fetchChat($search){
		   
		$this->db->select('user_name');
		$this->db->from('user');
		//$this->db->where('status=',1);
		//$this->db->where ('user.level=',2); 
		$this->db->like ('user.user_name',$search);		
		$qry= $this->db->get();
		$bannedv = $qry->result();
		return $bannedv;
	 }		
	public function online($id,$on){
		$this->db->set('online_status', $on);
		$this->db->where('id',$id);
		$this->db->where('level', 2);
		//$this->db->where('status', 1);
		$this->db->update('user');
		$res = $this->db->affected_rows(); 
	}public function offline($id,$on){
$this->db->set('online_status', $on);
		$this->db->where('id',$id);
		$this->db->where('level', 2);
		//$this->db->where('status', 1);
		$this->db->update('user');
		$res = $this->db->affected_rows(); 
	}
	
}

?>
