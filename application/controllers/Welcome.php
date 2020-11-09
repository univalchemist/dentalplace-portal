<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function test(){
	    $date = new DateTime();
	    print_r($date);
	    echo "<br>";
	    print_r($date->getTimestamp());
	    echo "<br>";
	    echo  "--------------------";
	    $userIds = array();
	    $id = 37;
	    $this->db->select('*,services_booking.id as services_bookingID');
		$this->db->from('services_booking');
		$this->db->join('user', 'services_booking.userId = user.id');
		$this->db->join('user_meta', 'services_booking.userId = user_meta.userid');
	//	$this->db->where ('confirmByClinic','1');
	//	$this->db->where ('confirmByUser','1');
		$this->db->where ('clinicId',$id);
		$this->db->where ('appointment_timestamp >',$date->getTimestamp());
	    $queryy = $this->db->get();
		$resultt = $queryy->result();
		echo "<pre>";
		print_r($resultt);
		echo "</pre>";
	}
	
	public function send()
    {
    $to =  "sanju_90011@yahoo.in";  // User email pass here
    $subject = 'Welcome To Dental Place';

    $from = 'humanpixel.univ@gmail.com';              // Pass here your mail id

    $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#000000;padding-left:3%"><img src="http://codingmantra.co.in/assets/logo/logo.png" width="300px" vspace=10 /></td></tr>';
    $emailContent .='<tr><td style="height:20px"></td></tr>';


    $emailContent .= "test email";  //   Post message available here


    $emailContent .='<tr><td style="height:20px"></td></tr>';
    $emailContent .= "<tr><td style='background:#000000;color: #999999;padding: 2%;text-align: center;font-size: 13px;'><p style='margin-top:1px;'><a href='http://codingmantra.co.in/' target='_blank' style='text-decoration:none;color: #60d2ff;'>www.codingmantra.co.in</a></p></td></tr></table></body></html>";
                


    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '60';
    $config['smtp_crypto'] = 'ssl';
    $config['smtp_user']    = 'humanpixel.univ@gmail.com';    //Important
    $config['smtp_pass']    = '&56&*%^&65^%G(&<>?{:';  //Important

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not 

     

    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
    $this->email->send();

    $this->session->set_flashdata('msg',"Mail has been sent successfully");
    $this->session->set_flashdata('msg_class','alert-success');
    //return redirect('email_send');
}
	
	
	
}
