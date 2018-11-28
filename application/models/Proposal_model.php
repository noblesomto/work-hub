<?php
class Proposal_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				$this->load->library('session');
        }
		
		
		 public function get_proposal()
    {
		$user_id = $this->session->userdata('user_id');
       
        
			$this->db->where('user_id', $user_id);
			$this->db->order_by("id", "DESC");
            $query = $this->db->get('proposal');
            return $query->result_array();
        
 
       
    }
	
	
	public function get_proposal_by_id($proposal_id)
    {
		
			$this->db->where('proposal_id', $proposal_id);
            $query = $this->db->get('proposal');
            return $query->result_array();
        }
		
		
		public function get_my_proposal($proposal_id)
    {
		
			$this->db->where('proposal_id', $proposal_id);
            $query = $this->db->get('proposal');
            return $query->result_array();
        }
		
	
	public function get_users_by_id($user_id = 0)
    {
		$user_id = $this->session->userdata('user_id');
        if ($user_id === 0)
        {
            $query = $this->db->get('user_table');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('user_table', array('user_id' => $user_id));
        return $query->row_array();
    }
	
	public function cancel_proposal($proposal_id)  
    {
        $this->load->helper('url');
 		$status="canceled";
       
        $data = array(
        'status' => $status     
		
        );
		
          $this->db->where('proposal_id', $proposal_id);
          return $this->db->update('proposal', $data);
        
    }
	
	
	public function edit_proposal($proposal_id,$data)  
    {
        $this->db->where('proposal_id', $proposal_id);
          return $this->db->update('proposal', $data);
        
    }
	
	
	public function approve_proposal($proposal_id)  
    {
        $this->load->helper('url');
 		$status="confirmed";
       
        $data = array(
        'status' => $status     
		
        );
		
          $this->db->where('proposal_id', $proposal_id);
          return $this->db->update('proposal', $data);
        
    }

 public function create_invoice($data){
        
        return $this->db->insert('order',$data);
      
    }
	
	
	
public function update_order($ref,$data)
    {
        $this->db->where('order_id', $ref);
          return $this->db->update('order', $data);
        
    }
	
public function update_proposal_status($proposal_id,$data)
    {
        $this->db->where('proposal_id', $proposal_id);
          return $this->db->update('proposal', $data);
        
    }
public function update_project_status($project_id,$data2)
    {
        $this->db->where('project_id', $project_id);
          return $this->db->update('projects', $data2);
        
    }
	
public function get_project_by_proposal($proposal_id)
    {
        $query = $this->db->get_where('proposal', array('proposal_id' => $proposal_id));
        return $query->row_array();
    }
	

public function send_email_payment($email){
        
        
        
        
       $mail_message='Dear User,'. "\r\n";
       
        $mail_message.='<br>Thank you for making payment for the project. We have informed the freelancer to begin the job, ';
		 $mail_message.='<br>Please login to the project manager on your dashboard to chat and follow up the progress of the job, ';
        $mail_message.='<br><br>Thanks & Regards';
        $mail_message.='<br>Axiatag';        
        date_default_timezone_set('Africa/Lagos');
		
		require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
		
		
		
        $mail = new PHPMailer;
       //$mail->isSMTP();
        $mail->SMTPSecure = "true"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;   
        $mail->Username = "nobleprojects001@gmail.com";    
        $mail->Password = "Nobleprojects001";
        $mail->setFrom('support@axiatag.com', 'Axiatag');
        $mail->addReplyTo("noreply@axiatag.com", "");
        $mail->IsHTML(true);
        $mail->addAddress($email);
        $mail->Subject = 'Payment Confirmation';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
        
        if($mail->send()){
			//for testing
            
            return true;
        }else{
           
            return false;
        }
        
       
    }


public function send_email_proposal_approved($email,$project_title){
        
        
        
        
       $mail_message='Dear User,'. "\r\n";
       
        $mail_message.='<br>Congratulations!! Your proposal for "'.$project_title.'" has been approved, Do well to start the project to meet up with the proposed deadline., ';
		$mail_message.='<br>Please login to the project manager on your dashboard to chat and discuss the progress of the job, ';
		
        $mail_message.='<br><br>Thanks & Regards';
        $mail_message.='<br>Axiatag';        
        date_default_timezone_set('Africa/Lagos');
		
		require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
		
		
		
        $mail = new PHPMailer;
       //$mail->isSMTP();
        $mail->SMTPSecure = "true"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;   
        $mail->Username = "nobleprojects001@gmail.com";    
        $mail->Password = "Nobleprojects001";
        $mail->setFrom('support@axiatag.com', 'Axiatag');
        $mail->addReplyTo("noreply@axiatag.com", "");
        $mail->IsHTML(true);
        $mail->addAddress($email);
        $mail->Subject = 'Proposal Approved';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
        
        if($mail->send()){
			//for testing
            
            return true;
        }else{
           
            return false;
        }
        
       
    }

}