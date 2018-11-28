<?php
class Apply_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				$this->load->library('session');
        }
		
		
		public function apply_project($data)
{
   
	

    return $this->db->insert('proposal', $data);
}
	
	public function get_project_by_id($project_id)
    {
		
        $this->db->where('project_id', $project_id);
            $query = $this->db->get('projects');
            return $query->result_array();
    }
	

public function set_booking()
{
	date_default_timezone_set("Africa/lagos");
    $this->load->helper('url');
	$user_id = $this->session->userdata('user_id');
    $date = date("Y-m-d H:i:s");
	$book_id= rand(0000,9999);
	$status= "pending";
	
	
 
    $data = array(
        'fullname' => $this->input->post('fullname'),
        'email' => $this->input->post('email'),
        'checkin' => $this->input->post('from'),
		'checkout' => $this->input->post('to'),
		'price' => $this->input->post('price'),
		'totalprice' => $this->input->post('total'),
		'title' => $this->input->post('title'),
		'location' => $this->input->post('location'),
		't_space' => $this->input->post('t_space'),
		'post_id' => $this->input->post('post_id'),
		'poster_id' => $this->input->post('poster_id'),
		'book_id'=>$book_id,
		'user_id'=>$user_id,
		'status'=>$status,
		'date'=>$date
		
		
    );



    return $this->db->insert('booking', $data);
}


 public function get_booking()
    {
		$user_id = $this->session->userdata('user_id');
       
			$this->db->where('poster_id', $user_id);
            $query = $this->db->get('booking');
            return $query->result_array();
        }

 public function get_booking_by_id($book_id)
    {
		
			$this->db->where('book_id', $book_id);
            $query = $this->db->get('booking');
            return $query->result_array();
        }


public function update_booking($book_id)  
    {
        $this->load->helper('url');
 
       
        $data = array(
        'sug-checkin' => $this->input->post('sug-checkin'),
       	'sug-checkout' => $this->input->post('sug-checkout'),
       
		
        );
		
          $this->db->where('book_id', $book_id);
          return $this->db->update('booking', $data);
        
    }


 public function get_user_booking()
    {
		$user_id = $this->session->userdata('user_id');
       
			$this->db->where('user_id', $user_id);
            $query = $this->db->get('booking');
            return $query->result_array();
        }

public function approve_booking($book_id)  
    {
        $this->load->helper('url');
 		$status="approved";
		$payment="unpaid";
       
        $data = array(
        'status' => $status,
		'payment_status'=>$payment,     
		
        );
		
          $this->db->where('book_id', $book_id);
          return $this->db->update('booking', $data);
        
    }


public function new_request_booking($book_id)  
    {
        $this->load->helper('url');
 
       
        $data = array(
        'checkin' => $this->input->post('from'),
       	'checkout' => $this->input->post('to'),
       
		
        );
		
          $this->db->where('book_id', $book_id);
          return $this->db->update('booking', $data);
        
    }


public function confirm_booking($book_id)  
    {
        $this->load->helper('url');
 		$status="confirmed";
       $this->load->helper('url');
 		$length = 6;
			
		$randomString = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
	$order_id =$randomString;
	
        $data = array(
        'status' => $status,
		'order_id' => $order_id,     
		
        );
		
          $this->db->where('book_id', $book_id);
          return $this->db->update('booking', $data);
        
    }


public function cancel_booking($book_id)  
    {
        $this->load->helper('url');
 		$status="canceled";
       
        $data = array(
        'status' => $status     
		
        );
		
          $this->db->where('book_id', $book_id);
          return $this->db->update('booking', $data);
        
    }







}