<?php
class Apply extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('apply_model');
				 $this->load->model('Account_Model');
				$this->load->model('profile_model');
				$this->load->model('project_model');
				$this->load->model('proposal_model');
                $this->load->helper('url_helper');
				$this->load->helper('text');
				$this->load->library('form_validation');
				$this->load->library('session');
					$sess_id = $this->session->userdata('user_id');

   if(empty($sess_id))
   {
			
    $this->load->library('user_agent');  // load user agent library
    // save the redirect_back data from referral url (where user first was prior to login)
    $this->session->set_userdata('redirect_back', $this->agent->referrer() );  
    redirect(base_url().'account/login');
}
      
				
        }

       
		
		
	public function project()
{
	$user_id = $this->session->userdata('user_id');
	$data['message'] = $this->Account_Model->get_message();
	$project_id = $this->uri->segment(3);	
     
	
		
        if(! $this->session->userdata('user_id')){
			
    $this->load->library('user_agent');  // load user agent library
    // save the redirect_back data from referral url (where user first was prior to login)
    $this->session->set_userdata('redirect_back', $this->agent->referrer() );  
    redirect(base_url().'account/login');
}
      else{  
        
	$this->load->model('project_model');
	$this->load->helper('url_helper');
	$this->load->database();
    $this->load->helper('form');
    $this->load->library('form_validation');
	$project_id = $this->uri->segment(3);
	$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
	 $data['project'] = $this->apply_model->get_project_by_id($project_id); 
	
    $data['title'] = 'Apply For Project';
	$this->load->view('dashboard/template/header', $data);
	$this->load->view('dashboard/template/nav');
		
    $this->load->view('dashboard/apply', $data);
	
    $this->load->view('dashboard/template/footer');
    	
    }

}

	
	public function apply_project()
{
	$user_id = $this->session->userdata('user_id');
	$project_id = $this->uri->segment(3);
	$data['message'] = $this->Account_Model->get_message();
	$this->load->helper('url_helper');
	$this->load->database();
    $this->load->helper('form');
    $this->load->library('form_validation');
	$data['title'] = 'Apply For Project';
	
	
	
	$this->form_validation->set_rules('title');
    $this->form_validation->set_rules('project_id');
	$this->form_validation->set_rules('poster_id');
	$this->form_validation->set_rules('pbudget', 'Proposed Budget', 'Required');
	$this->form_validation->set_rules('total', 'Actual Proposed Budget', 'Required');
	$this->form_validation->set_rules('proposal', 'Project Proposal', 'Required');
	$this->form_validation->set_rules('duration', 'Project Duration', 'Required');
	$this->form_validation->set_rules('revision', 'Number of Revision', 'Required');
	
	$data['project'] = $this->apply_model->get_project_by_id($project_id);
	  
    if ($this->form_validation->run() === FALSE)
    {
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/apply', $data);
		
        $this->load->view('dashboard/template/footer');

    }
    else
    {
		
			
			
		if(empty($_FILES['pwork']['name']))
{
	
	
	$user_id = $this->session->userdata('user_id');
		$username = $_SESSION['username'];
   
	$date = date("Y-m-d H:i:s");
	
	$status = "pending";
	$proposal_id= rand(0000000,9999999);
	
	
 
    $data = array(
        'title' => $this->input->post('title'),
        'pbudget' => $this->input->post('pbudget'),
		'abudget' => $this->input->post('total'),
		'proposal' => $this->input->post('proposal'),
		'project_id' => $this->input->post('project_id'),
		'poster_id' => $this->input->post('poster_id'),
		'duration' => $this->input->post('duration'),
		'revision' => $this->input->post('revision'),
		'date' => $date,
		'status' => $status,
		'username' => $username,
		'proposal_id'=>$proposal_id,
		'user_id'=>$user_id,
		
		
		
		
    );
	
	
	
				$this->apply_model->apply_project($data);
 $prop= $this->input->post('project_id');
 
$this->db->set('proposal', 'proposal+1', FALSE);
$this->db->where('project_id', $prop);
$this->db->update('projects');

			 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have successfully applied for this project </div>');
			 
					$data['title'] = 'Successful Applied for Project';
					$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
 
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/apply-success', $data);
		
        $this->load->view('dashboard/template/footer');
			
			

}else{
	
	
		$config['upload_path']          = './pworks/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['overwrite'] = false;
			$config['max_size']             = 700;
			$config['min_width']             = 1200;
			$new_name = rand(0000, 9999).$_FILES["pwork"]['name'];
			$config['file_name'] = $new_name; 

			$this->load->library('upload', $config);
	
 if ( ! $this->upload->do_upload('pwork'))
  {
	  	$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		$project_id = $this->uri->segment(3);
		$data['project'] = $this->apply_model->get_project_by_id($project_id);
		
   		$error = array('error' => $this->upload->display_errors());
		$this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/apply', $error, $data);
		
        $this->load->view('dashboard/template/footer');
  } else{
	  
	$image=$this->upload->data();  
	$user_id = $this->session->userdata('user_id');
		$username = $_SESSION['username'];
   
	$date = date("Y-m-d H:i:s");
	
	$status = "pending";
	$proposal_id= rand(0000000,9999999);
	
	
 
    $data = array(
        'title' => $this->input->post('title'),
        'pbudget' => $this->input->post('pbudget'),
		'abudget' => $this->input->post('total'),
		'proposal' => $this->input->post('proposal'),
		'project_id' => $this->input->post('project_id'),
		'poster_id' => $this->input->post('poster_id'),
		'duration' => $this->input->post('duration'),
		'revision' => $this->input->post('revision'),
		'date' => $date,
		'status' => $status,
		'username' => $username,
		'proposal_id'=>$proposal_id,
		'user_id'=>$user_id,
		'pwork' => $image['file_name'],
		
		
		
    );
	
	
	
				$this->apply_model->apply_project($data);
 $prop= $this->input->post('project_id');
 
$this->db->set('proposal', 'proposal+1', FALSE);
$this->db->where('project_id', $prop);
$this->db->update('projects');

			 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have successfully applied for this project </div>');
			 
					$data['title'] = 'Successful Applied for Project';
					$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
 
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/apply-success', $data);
		
        $this->load->view('dashboard/template/footer');
 		
	
	}
	
}
	}
}

public function proposal()
    {
		$proposal_id = $this->uri->segment(3);
        
        if (empty($proposal_id))
        {
            show_404();
        }
		
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		$data['message'] = $this->Account_Model->get_message();
		
        $data['proposal'] = $this->project_model->get_proposals($proposal_id);
		
        $data['title'] = 'View Proposals';
 
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/my-proposals', $data);
		
        $this->load->view('dashboard/template/footer');
    }
	
	
	public function details()
    {
		 $proposal_id = $this->uri->segment(3);
        
        if (empty($proposal_id))
        {
            show_404();
        }
		 $user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		$data['message'] = $this->Account_Model->get_message();
		
        $data['proposal'] = $this->proposal_model->get_proposal_by_id($proposal_id);
        $data['title'] = 'Proposal Details';
 
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/detail-proposal', $data);
		
        $this->load->view('dashboard/template/footer');
    }
	
	
	



}