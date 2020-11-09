<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminModel extends CI_Model{
	public function __construct(){
		$this->load->helper('string');	
		}	
	public function loginUser($checkArray){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where($checkArray);				
		$query = $this->db->get();
		$res = $query->result_array();
		return $res;
	}
	public function ForgotPassword($data){
        $this->db->select('user_email');
        $this->db->from('user'); 
		$this->db->where('level', 3);
        $this->db->where($data); 
        $query=$this->db->get();
        $result = $query->row_array();	
		return  $result;
	}
    public function sendpassword($randomPass){
		$this->db->set('otp',$randomPass);
		$this->db->where('level', 3);
		$this->db->update('user');
		$res = $this->db->affected_rows();
		return true;		 
   				//$resetEmail = $this->input->post('resetEmail');
				//$this->User_model->reset_password( $randomPass);
				//$this->session->set_flashdata('reset_password', 'Your password is reset successfully.');
				//$this->email->from($user_email, 'Your Name');
				//$this->email->to('qa75741@gmail.com');
				//$this->email->cc('another@another-example.com');
				//$this->email->bcc('them@their-example.com');
				//$this->email->subject('Email Test');
				//$this->email->message('Testing the email class.');
				//$this->email->send();
				//redirect('admin/create_password');
	}	
	public function OTPpassword($impo){
		$this->db->select('otp');
        $this->db->from('user'); 
		$this->db->where('level', 3);
		$this->db->where('otp',$impo);
        $query=$this->db->get();
        $result = $query->row_array();	
		return  $result;	
	}
	public function CreatePassword($pass){
		$this->db->set('password', $pass['new']);
		$this->db->where('level', '3');
		$this->db->update('user');
		$res = $this->db->affected_rows();
		return true; 
	}
	public function fetchsea($search){
		$this->db->select('user_name');
		$this->db->from('user');
		$this->db->where('status=',1);
		$this->db->where ('user.level=',1); 
		$this->db->like ('user.user_name',$search);		
		$qry= $this->db->get();
		$bannedv = $qry->result();
		return $bannedv;
    }	
    public function fetchapp($search){
		$this->db->select('user_name');
		$this->db->from('user');
		$this->db->where('status=',1);
		//$this->db->where ('user.level=',1); 
		$this->db->like ('user.user_name',$search);		
		$qry= $this->db->get();
		$bannedv = $qry->result();
		return $bannedv;
    }	
	public function fetsea($sea){
		$this->db->select('user_name');
		$this->db->from('user');
		$this->db->where('status=',0);
		$this->db->where ('user.level=',1); 
		$this->db->like ('user.user_name',$sea);		
		$qry= $this->db->get();
		$bannedv = $qry->result();
		return $bannedv;
    }	
	public function fetchUserDetails($seav){
		$this->db->select('user_name');
		$this->db->from('user');
		$this->db->where('status=',1);
		$this->db->where ('user.level=',2); 
		$this->db->like ('user.user_name',$seav);		
		$qry= $this->db->get();
		$bannedvendorresult = $qry->result();
		return $bannedvendorresult;
    }
	public function fetils($se){
		$this->db->select('user_name');
		$this->db->from('user');
		$this->db->where('status=',0);
		$this->db->where ('user.level=',2); 
		$this->db->like ('user.user_name',$se);		
		$qry= $this->db->get();
		$bannedvendorresult = $qry->result();
		return $bannedvendorresult;
    }
    
	public function displayuserrecords($radio,$all,$search,$tab){
	    
	    
	    
	if($search != '' && $tab == '1'){
	    
		$this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_meta', 'user.id = user_meta.userid'); 
		$this->db->where('user.status=',1);
		$this->db->where('user.level=',1);
		$this->db->like ('user.full_name',$search);
		$query = $this->db->get();
		$result = $query->result();
		//return  $result;   
			return array(
                 'result' => $result,
                 'tab' => $tab,
			);
		
	}
	/*if($sea){
		$this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_meta', 'user.id = user_meta.userid'); 
		$this->db->where('user.status=',0);
		$this->db->where('user.level=',1);
		$this->db->like ('user.user_name',$sea);
		$query = $this->db->get();
		$result = $query->result();
		return  $result;    
	}*/
	if($all === "old"){ 
	    
		 $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->where('user.status=',1);
		$this->db->where('user.level=',1);
		$this->db->order_by('user.id', 'ASC');
		$query = $this->db->get();
		$result = $query->result(); 
		//return  $result;
			return array(
                 'result' => $result,
                 'tab' => $tab,
			);
		
	}
	elseif($all === 'new'){
	    
		 $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->where('user.status=',1);
		$this->db->where('user.level=',1);
		$this->db->order_by('user.id', 'DESC');
		$query = $this->db->get();
		$result = $query->result(); 
		//return  $result;
			return array(
                 'result' => $result,
                 'tab' => $tab,
			);
	}
	elseif($all === "old" || $radio === 'e'){
	    
		 $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->where('user.status=',1);
		$this->db->where('user.level=',1);
		$this->db->order_by('user.id', 'ASC');
		$this->db->where('user.source=','e');
		$query = $this->db->get();
		$result = $query->result(); 
	//	return  $result;
		return array(
                 'result' => $result,
                 'tab' => $tab,
			);
	}
	elseif($all === "new" || $radio === 'e'){ 
	    
		 $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->where('user.status=',1);
		$this->db->where('user.level=',1);
		$this->db->order_by('user.id', 'DESC');
		$this->db->where('user.source=','e');
		$query = $this->db->get();
		$result = $query->result(); 
		//return  $result;
			return array(
                 'result' => $result,
                 'tab' => $tab,
			);
	}
	elseif($radio == ''){
	    $this->db->select('user.id,user.user_name,user.last_name,user.profile_image, user.user_email,user.level, user.source, user_meta.address, user_meta.address1, user_meta.city,user_meta.state, user_meta.country, user_meta.zipcode, user_meta.contact, user_meta.gender, user_meta.dob');
        $this->db->from('user');
        $this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->where('user.status=',1);
		$this->db->where('user.level=',1);
		$query = $this->db->get();
		$result = $query->result();	
		//return  $result;	
			return array(
                 'result' => $result,
                 'tab' => $tab,
			);
	}
	elseif($radio == 'a'){
	    $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->where('user.status=',1);
		$this->db->where('user.level=',1);
		$query = $this->db->get();
		$result = $query->result();
		//return  $result;	
			return array(
                 'result' => $result,
                 'tab' => $tab,
			);
	} 
	elseif($radio == 'e'){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->where('user.status=',1);
		$this->db->where('user.level=',1);
		$this->db->where('user.source=','e');
		$query = $this->db->get();
		$result = $query->result(); 
		//return  $result;
			return array(
                 'result' => $result,
                 'tab' => $tab,
			);
		}
	elseif($radio == 'f'){ 
		$this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->where('user.status=',1);
		$this->db->where('user.level=',1);
		$this->db->where('user.source=','f');
		$query = $this->db->get();
		$result = $query->result(); 
		//return  $result;
			return array(
                 'result' => $result,
                 'tab' => $tab,
			);
	}
	else{
	    
	    $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_meta', 'user.id = user_meta.userid'); 
		$this->db->where('user.status=',1);
		$this->db->where('user.level=',1);
		//$this->db->like ('user.user_name',$search);
		$query = $this->db->get();
		$result = $query->result();
		//return  $result;   
			return array(
                 'result' => $result,
                 'tab' => $tab,
			);
	}
	
	
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
	public function displaybanneduserrecords($search,$tab){
	    
	  if($search != '' && $tab == '0'){  
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('user_meta', 'user.id = user_meta.userid');   
		$this->db->where('status=',0);
		$this->db->where ('user.level=',1);
		$this->db->like ('user.user_name',$search);
		$qur= $this->db->get();
		$res = $qur->result();
		//return $res;
		return array(
                 'result' => $res,
                 'tab' => $tab,
		);
		
	  }
	  else {
	      $this->db->select('*');
		$this->db->from('user');
		$this->db->join('user_meta', 'user.id = user_meta.userid');   
		$this->db->where('status=',0);
		$this->db->where ('user.level=',1);
		$qur= $this->db->get();
		$res = $qur->result();
		//return $res;
		return array(
                 'result' => $res,
                 'tab' => $tab,
		);
	      
	  }
	  
		
	}
	public function editbv($user_id,$username,$email,$yelp,$y,$addr,$con,$city,$state,$zip,$mob,$gen,$bir){
		$this->db->set('user_name',$username );
		$this->db->set('user_email',$email ); 
		$this->db->where('id', $user_id);
		$this->db->update('user');
        $this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
		$this->db->set('address',$addr);
		//$this->db->set('address1',$adds);
		$this->db->set('country',$con);
		$this->db->set('city',$city);
		$this->db->set('state',$state);
		$this->db->set('zipcode',$zip);
		$this->db->set('contact',$mob);
		$this->db->set('gender',$gen);
		$this->db->set('dob',$bir);
		$this->db->set('yelp',$yelp);
		$this->db->set('yelp_id',$y);
		//$this->db->set('Latitude',$latitude);
		//$this->db->set('Longitude',$longitude);
		$this->db->where('vendor_id', $user_id);
		$this->db->update('vendor_meta');
		$res = $this->db->affected_rows();
	}
	public function displayvendorrecords($filter,$sort,$seav,$se,$tab){
	    
		if($seav != '' && $tab == '1'){
		$this->db->select('*');
        $this->db->from('user');
		$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
		$this->db->where('user.status=',1);
		$this->db->where('user.level=',2);
		$this->db->like ('user.user_name',$seav);
		$query = $this->db->get();
		$result = $query->result();
		//return  $result; 
		return array(
                 'resultt' => $result,
                 'tab' => $tab,
		);
		}
		elseif($se){
		$this->db->select('*');
        $this->db->from('user');
		$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
		$this->db->where('user.status=',0);
		$this->db->where('user.level=',2);
		$this->db->like ('user.user_name',$se);
		$query = $this->db->get();
		$result = $query->result();
		//return  $result;
		return array(
                 'resultt' => $result,
                 'tab' => $tab,
		);
		
		
		}
		elseif($sort === "o"){ 
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			$this->db->where('user.status=',1);
			$this->db->where ('user.level=',2);
			$this->db->order_by('user.id', 'ASC');
			$queryy = $this->db->get();
			$resultt = $queryy->result();
			//return  $resultt;
			return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
		);
		}
		elseif($sort === 'n'){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			$this->db->where('user.status=',1);
			$this->db->where ('user.level=',2);
			$this->db->order_by('user.id', 'DESC');
			$queryy = $this->db->get();
			$resultt = $queryy->result();
		//	return  $resultt;
		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
		);
		} 
		elseif($filter == ""){	
			$this->db->select('*'); 
			$this->db->from('user');
			$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			$this->db->where('user.status=',1);
			$this->db->where ('user.level=',2);
			$queryy = $this->db->get();
			$resultt = $queryy->result();
			 /*echo '<pre>';
			print_r($resultt);
			echo '</pre>'; */
			//return  $resultt;
			return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
			);
		}
	
		elseif($filter == "a"){
			$this->db->select('user.id,user.user_name, user.user_email,user.source,vendor_meta.address,vendor_meta.address1,vendor_meta.country,vendor_meta.city,vendor_meta.zipcode,vendor_meta.contact,vendor_meta.gender,vendor_meta.dob,vendor_meta.open, vendor_meta.close, vendor_reviews.star_rate');
			$this->db->from('user');
			$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			$this->db->where('user.status=',1);
			$this->db->where ('user.level=',2);
			$queryy = $this->db->get();
			$resultt = $queryy->result();
			//return  $resultt;
			return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
		);
		}
		
		elseif($filter == "f"){
			$this->db->select('user.id,user.user_name, user.user_email,user.source,vendor_meta.address,vendor_meta.address1,vendor_meta.country,vendor_meta.city,vendor_meta.zipcode,vendor_meta.contact,vendor_meta.gender,vendor_meta.dob,vendor_meta.open, vendor_meta.close, vendor_reviews.star_rate');
			$this->db->from('user');
			$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			$this->db->where('user.status=',1);
			$this->db->where ('user.level=',2);
			$this->db->where('user.source=','f');
			$queryy = $this->db->get();
			$resultt = $queryy->result();
			//return  $resultt;
			return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
		);
		}
			elseif($filter  == "e"){
			$this->db->select('user.id,user.user_name, user.user_email,user.source,vendor_meta.address,vendor_meta.address1,vendor_meta.country,vendor_meta.city,vendor_meta.zipcode,vendor_meta.contact,vendor_meta.gender,vendor_meta.dob,vendor_meta.open, vendor_meta.close, vendor_reviews.star_rate');
			$this->db->from('user');
			$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			$this->db->where('user.status=',1);
			$this->db->where ('user.level=',2);
			$this->db->where('user.source=','e');
			$queryy = $this->db->get();
			$resultt = $queryy->result();
			//return  $resultt;
			return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
		);
		}
		else {
		    $this->db->select('*'); 
			$this->db->from('user');
			$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			$this->db->where('user.status=',1);
			$this->db->where ('user.level=',2);
			$queryy = $this->db->get();
			$resultt = $queryy->result();
			 /*echo '<pre>';
			print_r($resultt);
			echo '</pre>'; */
			//return  $resultt;
			return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
			);
		    
		    
		}
	}
	public function displaybannedvendorrecords($seav,$tab){
	        if($seav != '' && $tab == '0'){
		    $this->db->select('*'); 
			$this->db->from('user');
			$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			$this->db->where('user.status=',0);
			$this->db->where ('user.level=',2);
			$this->db->like ('user.user_name',$seav);
			$queryy = $this->db->get();
			$resultt = $queryy->result();
			/* echo '<pre>';
			print_r($resultt);
			echo '</pre>'; */
		//	return  $resultt;
			return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
);
			
			
			
	    }
	    
	    else {
	        
	        $this->db->select('*'); 
			$this->db->from('user');
			$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
			$this->db->where('user.status=',0);
			$this->db->where ('user.level=',2);
			$queryy = $this->db->get();
			$resultt = $queryy->result();
			/* echo '<pre>';
			print_r($resultt);
			echo '</pre>'; */
		//	return  $resultt;
			return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
);
			
	        
	        
	    }
	    
	}
	public function display(){
		
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('status=',0);
		$this->db->where ('user.level=',2);   
				$this->db->order_by('user_name','letter','DESC'); 
		$qry= $this->db->get();
		$bannedvendorresult = $qry->result();
		return $bannedvendorresult;
	}
	public function displaypopupvendorrecords(){
		$this->db->select('*');
		$this->db->from('user');
		$qryy= $this->db->get();
		$popupvendorresult = $qryy->result();
		return $popupvendorresult;
		$this->db->select('user.user_name, user.user_email,vendor_meta.open, vendor_meta.close, vendor_reviews.star_rate');
        $this->db->from('user');
        $this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
		//$this->db->join('vendor_reviews', 'user.id = vendor_reviews.vendor_id');
		$this->db->where('user.status=',1);
		$this->db->where ('user.level=',2);
		$qryy = $this->db->get();
		$resss = $qryy->result();
		return  $resss;	
	}
	public function updatepassword($randomresetPassword,$user_id){
		$this->db->set('password',$randomresetPassword);
		$this->db->where('id', $user_id);
		$this->db->update('user');
		$res = $this->db->affected_rows();
		
		$this->db->select('user_email');
		$this->db->from('user');
		$this->db->where('id', $user_id);
	    $qryy = $this->db->get();
	    $email= $qryy->result();
	    return $email;
	}
	public function updatevendorpassword($randomresetPassword_vendor, $vendor_id){
		$this->db->set('password', $randomresetPassword_vendor);
		$this->db->where('id', $vendor_id);
		$this->db->update('user');
		$vendor_res	= $this->db->affected_rows();
		
		$this->db->select('user_email');
		$this->db->from('user');
		$this->db->where('id', $vendor_id);
	    $qryy = $this->db->get();
	    $email= $qryy->result();
	    return $email;
		
	}
	public function banuser($user_id){
	   // echo "nooooooooo"; die();
	    $date = new DateTime();
	   
	    $datee = $date->getTimestamp();
	    $datee = $date->format('d-m-Y');
		$this->db->set('status',0);
		$this->db->set('ben_start',$datee);
		$this->db->where('id', $user_id);
		$this->db->update('user');
		$res = $this->db->affected_rows();
	}
	public function userlift($user_id){
		$this->db->set('status',1);
		$this->db->where('id', $user_id);
		$this->db->update('user');
		$res = $this->db->affected_rows();
	}
	public function edituser($user_id,$username,$lastname,$fulln,$email,$addr,$adds,$con,$city,$state,$zip,$mob,$gen,$bir){
	    /*echo "$username";
	    echo "$email";
	    echo "$bir";*/
	    //die;
		$this->db->set('user_name',$username );
		$this->db->set('last_name',$lastname );
		$this->db->set('full_name',$fulln );
		$this->db->set('user_email',$email );
		$this->db->where('id', $user_id);
		$this->db->update('user');
        $this->db->join('user_meta', 'user.id = user_meta.userid');     
		$this->db->set('address',$addr);
		$this->db->set('address1',$adds);
		$this->db->set('country',$con);
		$this->db->set('city',$city);
		$this->db->set('state',$state);
		$this->db->set('zipcode',$zip);
		$this->db->set('contact',$mob);
		$this->db->set('gender',$gen);
		$this->db->set('dob',$bir);
		$this->db->where('userid', $user_id);
		$this->db->update('user_meta');
	//	$this->db->last_query();
		//die;
		$res = $this->db->affected_rows();
	}
	

	public function editvendor($user_id,$username,$email,$yelp,$y,$addr,$con,$city,$state,$zip,$mob,$gen,$bir){
		$this->db->set('user_name',$username );
		$this->db->set('user_email',$email ); 
		$this->db->where('id', $user_id);
		$this->db->update('user');
        $this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
		$this->db->set('address',$addr);
		//$this->db->set('address1',$adds);
		$this->db->set('country',$con);
		$this->db->set('city',$city);
		$this->db->set('state',$state);
		$this->db->set('zipcode',$zip);
		$this->db->set('contact',$mob);
		$this->db->set('gender',$gen);
		$this->db->set('dob',$bir);
		$this->db->set('yelp',$yelp);
		$this->db->set('yelp_id',$y);
		//$this->db->set('Latitude',$latitude);
		//$this->db->set('Longitude',$longitude);
		$this->db->where('vendor_id', $user_id);
		$this->db->update('vendor_meta');
		//$res = $this->db->affected_rows();
	}
	public function latlon($id,$latitude,$longitude){
		//$this->db->join('vendor_meta', 'user.id = vendor_meta.vendor_id');
		$this->db->set('Latitude',$latitude);
		$this->db->set('Longitude',$longitude);
		$this->db->where('vendor_id', $id);
		$this->db->update('vendor_meta');
		$res = $this->db->affected_rows();
	}
	public function compose($push){
		$this->db->insert('push_notification',$push);
	}
	
	public function scheduled(){
		$this->db->select('*');
        $this->db->from('push_notification');   
		$this->db->where('notification_type=',1);		
		//$this->db->order_by('id', 'DESC'); 
		//$this->db->order_by (mm,CAST[schedule_on],ASC);
 
		$this->db->order_by('DATE(schedule_on)', 'DESC'); 
		//$this->db->order_by('schedule_on','MONTH','ASC '); 
		//$this->db->order_by('TIME(schedule_on)','ASC'); 		
		//$this->db->order_by('schedule_on','ASC');
		$this->db->order_by('MONTH(schedule_on)','DESC'); 		
		//ORDER BY YEAR(Date) DESC, MONTH(Date) DESC, DAY(DATE) DESC
		$query = $this->db->get();
		$result = $query->result();	
		return  $result;
		
		
	}
	public function past(){
		$this->db->select('*');
        $this->db->from('push_notification');   
		$this->db->where('notification_type=',0);
		$this->db->order_by('creat_at','DESC');
		$query = $this->db->get();
		$result = $query->result();	
		/*echo '<pre>';
		print_r($result);
		echo '</pre>';  */
		return  $result;
	}
	public function addSer($ser){
		$this->db->insert('vendor_services',$ser);
	}
	public function editServ($id,$ed){
		$this->db->set('title',$ed );
		$this->db->where('id', $id);
		$this->db->update('vendor_services');
		$res = $this->db->affected_rows();
	}
	public function category(){
		$this->db->select('*');
        $this->db->from('vendor_services');   
		$this->db->order_by('title','letter','ASC'); 
		$query = $this->db->get();
		$result = $query->result();	
		/*echo '<pre>';
		print_r($result);  
		echo '</pre>';  */
		return  $result;  
	}
	public function deletese($id){
		$this -> db -> where('id', $id);
		$this -> db -> delete('vendor_services');
   }
   public function getdata($ve){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_email', $ve);
        $query = $this->db->get();  
        return $query->result_array();
    } 
	public function getser(){
        $this->db->select('*');
        $this->db->from('vendor_services');
		$this->db->limit(1);
        //$this->db->where('user_email', $ve);
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function regVendor($em,$id,$se,$p){
		$this->db->insert('user',$em);
		$vi = $this->db->insert_id();
		file_put_contents("php://stdout", "VENDOR ID: $vi\n");
		$idv = array('vendor_id'=>$vi);
		$this->db->insert('vendor_meta',$idv); 
		$ri = $this->db->insert_id();
		file_put_contents("php://stdout", "RID: $ri\n");
		$is = array('vendor_id'=>$ri,'servicesId'=>$id,'serviceName'=>$se, 'servicePrice'=>$p );
		$this->db->insert('vendor_provided_services',$is);
		return $vi;
		//$idr = array('vendor_id'=>$vi,'user_id'=>$ri);
		//$this->db->insert('vendor_reviews',$idr);	 
		//$this->db->insert('vendor_provided_services',$ser);
	}
	
	public function insert_pic($qww,$id){
	    //print_r($qww); die(); 
		$this->db->set('profile_image',$qww);
		$this->db->where('id', $id);
		$this->db->update('user');
		$res = $this->db->affected_rows();
	}
	public function insert_uspic($pic,$id){
	    //print_r($pic); die(); 
		$this->db->set('profile_image',$pic);
		$this->db->where('id', $id);
		$this->db->where('level', 1);
		$this->db->update('user');
		$res = $this->db->affected_rows();
	}	  
	public function editsc($id){
		$this->db->select('*');
        $this->db->from('push_notification'); 
		$this -> db -> where('id', $id);		
		//$this->db->where('notification_type=',1);		
		//$this->db->where('id',1);		
		$query = $this->db->get();
		$result = $query->result();	
		return  $result;
	} 
	public function updatesc($he,$co,$da,$no,$id){
	    //print_r($pic); die(); 
		$this->db->set('title',$he);
		$this->db->set('description',$co);
		$this->db->set('schedule_on',$da);
		$this->db->set('notification_type',$no);
		$this->db->where('id', $id);
		$this->db->update('push_notification');
		$res = $this->db->affected_rows();
	}
	public function cancelNot($user_id){
		$s = "2";
		$this->db->set('status',$s);
		$this->db->where('id', $user_id);
		$this->db->update('push_notification');
		$res = $this->db->affected_rows();
	}	
	public function delNot($id){
		$this -> db -> where('id', $id);
		$this -> db -> delete('push_notification');
   }
	public function service(){
		$this->db->select('*');
	$this->db->from('vendor_provided_services');
	//$this->db->where('vendor_id',$id);
	$queryy = $this->db->get();
	$resultt = $queryy->result();
	 /*echo '<pre>';
	print_r($resultt);
	echo '</pre>'; die(); */
	return  $resultt;
	}
	public function sic($id)
	{
	    $this->db->select('*');
		$this->db->from('vendor_provided_services');
		$this->db->where ('vendor_id=',$id);
		$qur= $this->db->get();
		$res = $qur->result();
	    return $res;
	 //$totalreview = "(SELECT COUNT(idr), AVG(star_rate)  FROM `vendor_reviews` WHERE `vendor_id` = '37')";
	}
	
		public function currentApp($radio,$all,$search,$tab,$stype){
		
		if($search != '' && $tab == '1'){
			$date = new DateTime();
    	    $userIds = array();
    	   // $id = $_SESSION['userdata'] ['userid'];
    	    $this->db->select('*');
    		$this->db->from('services_booking');
    		$this->db->select('services_booking.source as bookingsource');
    		$this->db->join('user', 'services_booking.userId = user.id');
    		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
    		
    	//	$this->db->where ('confirmByUser','1');
    	
    	 //	$this->db->where ('clinicId',$id);
    	 
    	    if($stype == 'u'){
    	    $this->db->like ('user.full_name',$search,'both');
    	    }
    	    elseif($stype == 'a'){
    	    $this->db->like ('services_booking.serviceName',$search,'both');
    	    }
    	    else {
    	    $this->db->like ('services_booking.ownerId',$search,'both');
    	    }
    	    $this->db->where ('appointment_timestamp >',$date->getTimestamp());
    	    //$wherecond = "(services_booking.ownerId LIKE '%" . $search . "%' OR user.user_name LIKE '%" . $search . "%' OR services_booking.serviceName LIKE '%" . $search . "%' ) AND (appointment_timestamp >'" . $date->getTimestamp() . "') ";
    	   
    		//$this->db->where ($wherecond);
    	    
			//$this->db->affected_rows() > 0;	
    	    $queryy = $this->db->get();
    		$resultt = $queryy->result();
    		//return  $resultt;
    		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
                 'stype'=> $stype,
);
     		}  
	else{}
	 
	 	/*----------------------4/22---------------------*/
	 	
			if($all == "o"){ 
			
		    $date = new DateTime();
    	    $userIds = array();
    	    //$id = $_SESSION['userdata'] ['userid'];
    	    $this->db->select('*');
    	    $this->db->select('services_booking.source as bookingsource');
    		$this->db->from('services_booking');
    		$this->db->join('user', 'services_booking.userId = user.id');
    		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
    	    $this->db->order_by('services_booking.id', 'ASC');
    		$this->db->where ('appointment_timestamp >',$date->getTimestamp());
    	    $queryy = $this->db->get();
    		$resultt = $queryy->result();
    		//return  $resultt;
    		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
                 'stype' => $stype,
                        );
	}
	elseif($all == 'n'){
	        $date = new DateTime();
    	    $userIds = array();
    	  //  $id = $_SESSION['userdata'] ['userid'];
    	    $this->db->select('*');
    	    $this->db->select('services_booking.source as bookingsource');
    		$this->db->from('services_booking');
    		$this->db->join('user', 'services_booking.userId = user.id');
    		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
    	    $this->db->order_by('services_booking.id', 'DESC');
    		$this->db->where ('appointment_timestamp >',$date->getTimestamp());
    	    $queryy = $this->db->get();
    		$resultt = $queryy->result();
    	//	return  $resultt;
    	return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
                 'stype' => $stype,
                        );
			
	} 
	

	elseif($radio == 'c'){
	    $date = new DateTime();
	    $userIds = array();
	   // $id = $_SESSION['userdata'] ['userid'];
        $this->db->select('*');
        $this->db->select('services_booking.source as bookingsource');
        $this->db->from('services_booking');
        $this->db->join('user', 'services_booking.userId = user.id');
		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid'); 
	//	$this->db->where('services_booking.source=','c');
	    $this->db->where ('confirmByClinic','1');
		$this->db->where ('confirmByUser','1');
		$this->db->where ('appointment_timestamp >',$date->getTimestamp());
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
	//	return  $resultt;
		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
                 'stype' => $stype,
                        );
		
		}
	elseif($radio == 'p'){ 
		$date = new DateTime();
	    $userIds = array();
	   // $id = $_SESSION['userdata'] ['userid'];
        $this->db->select('*');
        $this->db->select('services_booking.source as bookingsource');
        $this->db->from('services_booking');
        $this->db->join('user', 'services_booking.userId = user.id');
		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid'); 
	$this->db->where('services_booking.source=','p');
	    
		$this->db->where ('appointment_timestamp >',$date->getTimestamp());
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
		//return  $resultt;
		
		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
                 'stype' => $stype,
                        );
	}
	  

	/*--------------------------------------------*/
	else{
	    $date = new DateTime();
	    $userIds = array();
	    //$id = $_SESSION['userdata'] ['userid'];
	    $this->db->select('*');
	    $this->db->select('services_booking.source as bookingsource');
		$this->db->from('services_booking');
		$this->db->join('user', 'services_booking.userId = user.id');
		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
	//	$this->db->join('vendor_meta','service_booking.clinicId = vendor_meta.vendor_id');
	//	$this->db->where ('confirmByClinic','1');
	//	$this->db->where ('confirmByUser','1');
 	//	$this->db->where ('clinicId',$id);
		$this->db->where ('appointment_timestamp >',$date->getTimestamp());
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
	/*	echo "<pre>";
		print_r($resultt);
		echo "</pre>";*/  
	//	die();
		//return  $resultt;
		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
                 'stype' => $stype,
                        );
		
		
		if(!empty($resultt)){
		    foreach($resultt as $ky=>$vl){
		        
		       array_push($userIds,$resultt[$ky]->userId);
		       
		    }
		}
	
	}
	    
}

	public function pastappointment($search,$tab,$stype){
	    
	    if($search != '' && $tab == '0'){
			$date = new DateTime();
    	    $userIds = array();
    	   // $id = $_SESSION['userdata'] ['userid'];
    	    $this->db->select('*');
    		$this->db->from('services_booking');
    		$this->db->select('services_booking.source as bookingsource');
    		$this->db->join('user', 'services_booking.userId = user.id');
    		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
    		
    	//	$this->db->where ('confirmByUser','1');
    	
    	 //	$this->db->where ('clinicId',$id);
    	 if($stype == 'u'){
    	    $this->db->like ('user.full_name',$search,'both');
    	 }
    	 elseif($stype == 'a'){
    	    $this->db->or_like ('services_booking.serviceName',$search,'both');
    	 }
    	 else {
    	    $this->db->or_like ('services_booking.ownerId',$search,'both');
    	 }
    	    $this->db->where ('appointment_timestamp <',$date->getTimestamp());
    	    
			//$this->db->affected_rows() > 0;	
    	    $queryy = $this->db->get();
    		$resultt = $queryy->result();
    		//return  $resultt;
    		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
                 'stype' =>$stype,
);
     		} 
	    
	    
	    
	    
	    
	    
	    
	    
	    $date = new DateTime();
        $userIds = array();
	    //$id = $_SESSION['userdata'] ['userid'];
	    $this->db->select('*');
	    $this->db->select('services_booking.source as bookingsource');
		$this->db->from('services_booking');
		$this->db->join('user', 'services_booking.userId = user.id');
		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
		//$this->db->where ('confirmByClinic','1');
		//$this->db->where ('confirmByUser','1');
		$this->db->where ('appointment_timestamp <',$date->getTimestamp());
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
		//return  $resultt;
		
		return array(
                 'resultt' => $resultt,
                 'tab' => $tab,
                 'stype' => $stype,
                        );
		
		
	}
	
	public function note($nid,$n){
		$this->db->set('booking_id',$nid);
		$this->db->set('note',$n);
		$this->db->update('appointment_note'); 
		$res = $this->db->affected_rows(); 
	}
	
	public function not(){
	$this->db->select('*');
	$this->db->from('appointment_note');
	$queryy = $this->db->get();
	$resultt = $queryy->result();
	/*echo '<pre>';
	print_r($resultt);
	echo '</pre>';  */
	return  $resultt;
	}
	public function venname($id){
	$this->db->select('*');
    $this->db->from('user');
   // $this->db->join('user', 'vendor_meta.vendor_id = user.id'); 
	$this->db->where('user.id',$id);
	$queryy = $this->db->get();
	$resultt = $queryy->result();   
/*	echo '<pre>';
	print_r($resultt);
	echo '</pre>';  */
	return  $resultt;
	
	}
	
	public function pushemail()
    {
        $this->db->select('user_email');
		$this->db->from('user');
		$this->db->where('status', 1);
		$this->db->where('level',1);				
	    $query = $this->db->get();
		$resulttt = $query->result();
	//	print_r($resulttt);
		return  $resulttt;
       
    }
    public function quepushemail() {
        $this->db->select('*');
		$this->db->from('que_notification');
		$this->db->where('status', 0);
		$this->db->limit(25);
	    $query = $this->db->get();
		$resulttt = $query->result();
		return  $resulttt;
        
    }
    
    public function composescheduled($push){
	$this->db->insert('push_notification',$push);
		
		//$sql = "insert into schedule_notification1 (title,message,scheduled)
             //   values ('$h','$c','$d')";
         //$this->db->query($sql);
	}
	public function queNotification($e,$h,$c){
	    
	    $data = array(
        'email' => $e,
        'subject' => $h,
        'message' => $c,
        'status' => 0
        );

        $this->db->insert('que_notification', $data);
		
		
         
	}
	
	public function DeleteUser($userId,$tab){
		//print_r($userId);		
		$this -> db -> where('id', $userId);
		$this -> db -> delete('user');
		$this -> db -> where('userid', $userId);
		$this -> db -> delete('user_meta');
		$this -> db -> where('user_id', $userId);
		$this -> db -> delete('user_tokens');
		$this -> db -> where('senderId', $userId);
		$this -> db -> delete('chat');
		$this -> db -> where('recevierId', $userId);
		$this -> db -> delete('chat');
		$this -> db -> where('userId', $userId);
		$this -> db -> delete('services_booking');
		$this -> db -> where('user_id', $userId);
		$this -> db -> delete('vendor_reviews'); /**/
		return $tab;
	} 
	public function DeleteVendor($venId){
		//print_r($venId);
		
		$this -> db -> where('clinicId', $venId);
		$this -> db -> delete('services_booking');
		$this -> db -> where('id', $venId);
		$this -> db -> delete('user');
		$this -> db -> where('vendor_id', $venId);
		$this -> db -> delete('vendor_meta');
		$this -> db -> where('senderId', $venId);
		$this -> db -> delete('chat');
		$this -> db -> where('recevierId', $venId);
		$this -> db -> delete('chat');
		$this -> db -> where('vendor_id', $venId);
		$this -> db -> delete('vendor_provided_services');
		$this -> db -> where('vendor_id', $venId);
		$this -> db -> delete('vendor_reviews'); /**/
	}
	
	public function Deletequepush($id){
		$this -> db -> where('id', $id);
		$this -> db -> delete('que_notification');
	}
	
	
}      


?>	
