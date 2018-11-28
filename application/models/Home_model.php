<?php
class Home_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		
		
		public function get_projects($slug = FALSE)
{
        if ($slug === FALSE)
        {
			$this->db->limit(9);
			$this->db->order_by("id", "DESC");
			$this->db->where('project_status', 'pending');
            $query = $this->db->get('projects');
				
                return $query->result_array();
        }

        $query = $this->db->get_where('projects', array('project_id' => $slug));
        return $query->row_array();
}

public function featured_projects()
    {
		
			$this->db->where('featured', 'Yes');
			$this->db->where('project_status', 'pending');
            $query = $this->db->get('projects');
            return $query->result_array();
        }



function list_projects($limit=null,$offset=NULL){
			$this->db->limit($limit, $offset);
			$this->db->order_by("id", "DESC");
			$this->db->where('project_status', 'pending');
		  $query = $this->db->get('projects');
		  
           return $query->result_array();
 }

 function totalplaces(){
  return $this->db
        ->where('project_status', 'pending')
        ->count_all_results('projects');
 }




	


public function get_category($category)
    {
		
      
			$this->db->where('category', $category);
			$this->db->where('project_status', 'pending');
            $query = $this->db->get('projects');
            return $query->result_array();
       
    }
	

public function count_arts()
{
	
    return $this->db
        ->where('category', 'Art-and-Creative')
		->where('project_status', 'pending')
        ->count_all_results('projects');
}

public function count_Designers()
{
	
    return $this->db
        ->where('category', 'Designers')
		->where('project_status', 'pending')
        ->count_all_results('projects');
}

public function count_Instructors()
{
	
    return $this->db
        ->where('category', 'Instructors-and-Directors"')
		->where('project_status', 'pending')
        ->count_all_results('projects');
}

public function count_Programmers()
{
	
    return $this->db
        ->where('category', 'Programmers-and-Developers')
		->where('project_status', 'pending')
        ->count_all_results('projects');
}

public function count_Scribes()
{
	
    return $this->db
        ->where('category', 'Scribes')
		->where('project_status', 'pending')
        ->count_all_results('projects');
}

public function count_Virtual()
{
	
    return $this->db
        ->where('category', 'Virtual-Assistants')
		->where('project_status', 'pending')
        ->count_all_results('projects');
}

public function count_Virtual_Consultants()
{
	
    return $this->db
        ->where('category', 'Virtual-Consultants')
		->where('project_status', 'pending')
        ->count_all_results('projects');
}

public function count_Others()
{
	
    return $this->db
        ->where('category', 'Others')
		->where('project_status', 'pending')
        ->count_all_results('projects');
}


public function get_users()
{
       
			$this->db->where('user !=', 'employer');
            $query = $this->db->get('user_table');
            return $query->result_array();
}

 public function insert_comment($data){
        
        return $this->db->insert('board',$data);
      
    }
	
	
function search_project($search = 'default', $limit=null,$offset=NULL){
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id','DESC');
		  $this->db->select('*');
        $this->db->from('projects');
        $this->db->like('title',$search);
		$this->db->or_like('description',$search);
		$this->db->or_like('category',$search);
		$this->db->where('project_status', 'pending');
		

        // Execute the query.
        $query = $this->db->get();

        // Return the results.
        return $query->result_array();
 }
 
  function totalsearch($search = 'default'){
 $sql = "select * from projects where title like '%$search%' OR description like '%$search%' OR category like '%$search%' AND project_status = 'pending' ";
        $query = $this->db->query($sql);
        return $query->num_rows();
 }
 
 
 public function contact_admin($name,$email,$subject,$comment){
        
        
        
        
       $mail_message='Dear Admin,'. "\r\n";
        $mail_message.='A user with the following details contacted you'."\r\n";
        $mail_message.=' Name'.$name."\r\n";
		
		$mail_message.=' Email'.$email."\r\n";
		$mail_message.=' Phone'.$subject."\r\n";
		$mail_message.=' Name'.$comment."\r\n";
        $mail_message.='<br>Thanks & Regards';
        $mail_message.='<br>Axiatag';        
        date_default_timezone_set('Africa/Lagos');
		
		require_once(APPPATH.'third_party/phpmailer/PHPMailerAutoload.php');
		
		
		
        $mail = new PHPMailer;
        $mail->isSMTP();
		$mail->Timeout = 120;
        $mail->SMTPSecure = "ssl"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "ssl://smtp.gmail.com";
        $mail->Port = 465;
        $mail->SMTPAuth = true;   
        $mail->Username = "nobleprojects001@gmail.com";    
        $mail->Password = "Nobleprojects001";
        $mail->setFrom('no-reply@axiatag.com', 'Axiatag');
        $mail->IsHTML(true);
        $mail->addAddress('contact@axiatag.com');
        $mail->Subject = 'Customer Contact ';
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