<?php
class Admin_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		


public function get_projects()    {
			
			$this->db->where('status', 'confirmed');
			
            $query = $this->db->get('proposal');
            return $query->result_array();
       
    }

function get_all_projects($limit=null,$offset=NULL){
	
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('projects');
            return $query->result_array();
 }

 function totalprojects(){
  return $this->db->count_all_results('projects');
 }
 
 
function get_approved_projects($limit=null,$offset=NULL){
	
	
	
			$this->db->limit($limit, $offset);
			$this->db->select('*');
			$this->db->from('projects');
			$this->db->join('proposal', 'proposal.project_id = projects.project_id','left');
			
			$result = $this->db->get()->result_array();
			 return $result;
 }

public function get_emails()    {
		
		$this->db->select('email');
		$this->db->from('user_table');
		$result = $this->db->get()->result_array();
		 return $result;
       
    }
	
public function new_message($data)
{
   
    return $this->db->insert('message', $data);
	
	
	
}


public function send_email($title,$message,$date,$email2){
        
        
        
        
       $mail_message='Dear User,'. "\r\n";
        $mail_message='<br><br> You have a new message fro Axiatag'. "\r\n";
        $mail_message.='<br><h3>'. $title.'</h3>';
        $mail_message.='<br><br>'.$message;
		$mail_message.='<br><h5>'. $date.'</h5>';
        $mail_message.='<br><br>Axiatag';        
        date_default_timezone_set('Africa/Lagos');
		
		require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
		
		
		
        $mail = new PHPMailer;
        $mail->isSMTP();
		$mail->SMTPSecure = "true"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;   
        $mail->Username = "nobleprojects001@gmail.com";    
        $mail->Password = "Nobleprojects001";
        $mail->setFrom('admin@axiatag.com', 'Axiatag');
        $mail->addReplyTo("no-reply@axiatag.com", "");
        $mail->IsHTML(true);
        $mail->addAddress($email2);
        $mail->Subject = 'New Message';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
        
        if($mail->send()){
			//for testing
            
            return true;
        }else{
           
            return false;
        }
        
       
    }

function get_all_message($limit=null,$offset=NULL){
	
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('message');
            return $query->result_array();
 }

 function totalmessage(){
  return $this->db->count_all_results('message');
 }

public function delete_message($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('message');
    }


}