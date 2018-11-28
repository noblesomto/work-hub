<?php
class Profile_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
		$this->load->library('session');
		$this->load->helper('form');
    }
    
    
    
    public function get_user($user_id)
    {
		
       
			$this->db->where('user_id', $user_id);
            $query = $this->db->get('user_table');
            return $query->result_array();
        
    }
	
	function get_all_users($limit=null,$offset=NULL){
	
	
	
			$this->db->limit($limit, $offset);
			$this->db->order_by('id', 'DESC');
            $query = $this->db->get('user_table');
            return $query->result_array();
        
    }
	
	function totalusers(){
  return $this->db->count_all_results('user_table');
 }
	
	 public function get_cert($user_id)
    {
		
       
			$this->db->where('user_id', $user_id);
            $query = $this->db->get('certification');
            return $query->result_array();
        
    }
	
	
    
		
		
    public function update_profile($user_id, $data)  
    {
       
       
        
            $this->db->where('user_id', $user_id);
            return $this->db->update('user_table', $data);
        
    }
	
	
	 public function update_picture($user_id, $data)  
    {
       
       
        
            $this->db->where('user_id', $user_id);
            return $this->db->update('user_table', $data);
        
    }
    
	
	public function upload_cert($data)
{
   
    return $this->db->insert('certification', $data);
}

public function upload_lang($data)
{
   
    return $this->db->insert('language', $data);
}
	
 public function get_lang($user_id)
    { 
			$this->db->where('user_id', $user_id);
            $query = $this->db->get('language');
            return $query->result_array();
        
    }
	
    public function delete_user($user_id)
    {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('user_table');
    }
	

 public function delete_cert($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('certification');
    }
	

public function delete_lang($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('language');
    }


public function upload_proof($user_id,$data)  
    {
            $this->db->where('user_id', $user_id);
            return $this->db->update('user_table', $data);
}


 public function update_extra($user_id,$data)  
    {
       
       
        
            $this->db->where('user_id', $user_id);
            return $this->db->update('user_table', $data);
        
    }
	
public function update_bank($user_id,$data)  
    {
       
       
        
            $this->db->where('user_id', $user_id);
            return $this->db->update('user_table', $data);
        
    }
	
	
	public function get_poster($proposer)
    {
        $query = $this->db->get_where('user_table', array('user_id' => $proposer));
        return $query->row_array();
    }
	
public function search_user($search='default')
    {
        // Use the Active Record class for safer queries.
        $this->db->select('*');
        $this->db->from('user_table');
        $this->db->like('fname',$search);
		$this->db->or_like('lname',$search);
		$this->db->or_like('email',$search);
		$this->db->or_like('username',$search);

        // Execute the query.
        $query = $this->db->get();

        // Return the results.
        return $query->result_array();
    }	


 public function get_pending_verification()
    {
		
       
			$this->db->where('verify', 'pending');
            $query = $this->db->get('user_table');
            return $query->result_array();
        
    }

public function verify_user($user_id,$data)  
    {
               
            $this->db->where('user_id', $user_id);
            return $this->db->update('user_table', $data);
        
    }

		

}
