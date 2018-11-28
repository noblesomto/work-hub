<?php
class Project_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				
				
        }
		
		
		public function get_projects()
{
      
                $query = $this->db->get('projects');
                return $query->result_array();
       
}


 public function get_proposal($project_id )
    {
		
      
			$this->db->where('project_id', $project_id);
            $query = $this->db->get('proposal');
            return $query->result_array();
       
    }



public function get_proposals($project_id )
    {
		
      
		$this->db->select('*');
		$this->db->from('user_table');
		$this->db->join('proposal', 'proposal.user_id = user_table.user_id','left');
		$this->db->where('project_id',$project_id);
		$result = $this->db->get()->result_array();
		 return $result;
		
       
    }

public function get_comment($project_id )
    {
		
      
		$this->db->select('board.username,board.comment,board.date, board.user_id');
		$this->db->from('board');
		$this->db->join('projects', 'projects.project_id = board.project_id','left');
		$this->db->where('board.project_id',$project_id);
		$result = $this->db->get()->result_array();
		 return $result;
		
       
    }

	


public function search_project($search)
    {
        // Use the Active Record class for safer queries.
        $conditions = array();

        if (!empty($search)) {

            $conditions[] = 'projects.title  LIKE "%' . $search . '%"';
            $conditions[] = 'projects.description  LIKE "%' . $search . '%"';
           
            $sqlStatement = "SELECT * FROM projects WHERE ".implode(' OR ', $conditions);
            $result = $this->db->query($sqlStatement)->result_array();
        }else{
            $result = '';
        }

        return $result;
    
    }	
	


 public function get_location($location )
    {
		
      
			$this->db->where('location', $location);
            $query = $this->db->get('places');
            return $query->result_array();
       
    }
	
	
	
public function set_rating()
{
	date_default_timezone_set("Africa/lagos");
    $this->load->helper('url');
	$user_id = $this->session->userdata('user_id');
	$fullname = $_SESSION['fullname'];
    $date = date("Y-m-d H:i:s");
	
	
	
 
    $data = array(
        'user_id' => $user_id,
		'fullname' => $fullname,
        'post_id' => $this->input->post('post_id'),
        'comment' => $this->input->post('comment'),
		'count' => $this->input->post('count2'),
		'date'=>$date
		
		
    );



    return $this->db->insert('rating', $data);
}	
	
	
	
 public function get_rating_by_id($post_id)
    {
		
			$this->db->where('post_id', $post_id);
			$this->db->order_by('id','DESC');
            $query = $this->db->get('rating');
            return $query->result_array();
        }
	
public function get_rating_number($post_id)
{
	
    return $this->db
        ->where('post_id', $post_id)
		->count_all_results('rating');
}


public function get_rating_total($post_id)
{
	
	
	
 	$this->db->select_avg('count');
 	$this->db->where('post_id', $post_id);
	$query = $this->db->get('rating');
	return $query->result_array();
}




public function get_rating_post($post_id)
{
$this->db->select('*');
$this->db->from('rating');
$this->db->join('places', 'rating.post_id = places.post_id');
$this->db->where('rating.post_id', $post_id);

$query = $this->db->get();
}


public function set_rate($parameters)  
    {
       $post_id= $parameters['post_id'];
	   $count= $parameters['rate'];
	   $rate_no=$parameters['rate_no'];
       
        $data = array(
        'review' => json_encode($count),
		'review_no' =>$rate_no,
       
       
		
        );
		
          $this->db->where('post_id', $post_id);
          return $this->db->update('places', $data);
        
    }

public function get_paid_projects()
    {
		
 $array = array('order.payment_status' => 'paid', 'order.project_status' => 'pending');     
 
		$this->db->select('*');
		$this->db->from('proposal');
		$this->db->join('order', 'proposal.proposal_id = order.proposal_id','left');
		$this->db->where($array);
		$result = $this->db->get()->result_array();
		 return $result;
		
       
    }

public function mark_project_done($order_id,$data) 
    {
       
          $this->db->where('order_id', $order_id);
          return $this->db->update('order', $data);
        
    }
	
	public function mark_project_completed($project_id,$data2) 
    {
       
          $this->db->where('project_id', $project_id);
          return $this->db->update('projects', $data2);
        
    }

public function get_completed_projects()
    {
		
 $array = array('order.payment_status' => 'paid', 'order.project_status' => 'completed');     
 
		$this->db->select('*');
		$this->db->from('proposal');
		$this->db->join('order', 'proposal.proposal_id = order.proposal_id','left');
		$this->db->where($array);
		$result = $this->db->get()->result_array();
		 return $result;
		
       
    }	
}