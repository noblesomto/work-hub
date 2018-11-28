<?php
class Manager extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('proposal_model');
				 $this->load->model('Account_Model');
				$this->load->model('profile_model');
				$this->load->model('manager_model');
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
		$this->form_validation->set_rules('comment','Comment', 'required');
        
        
	
	
        if ($this->form_validation->run() === FALSE)
        {
			
		 $user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		$data['message'] = $this->Account_Model->get_message();
        
		$project_id = $this->uri->segment(3);
		$data['project'] = $this->manager_model->get_project_by_id($project_id);
		$data['comment'] = $this->manager_model->get_comments_for_project($project_id);
        $data['title'] = 'Project Manager';
 
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/manager', $data);
		
        $this->load->view('dashboard/template/footer');
		
		}else{
			
		
			
			$data = array(
       
	     'username' => $this->session->userdata('username'),
		'comment' => $this->input->post('comment'),
		'project_id' => $this->input->post('project_id'),
		'date' => date("Y-m-d H:i:s"),
		
		
		
    );


		$this->manager_model->add_comment($data);
		
		  $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully added a comment</div>');
		  
		  $project_id = $this->uri->segment(3);
		redirect(base_url("manager/project/".$project_id));
	
		
		
			
			}
	}
		
    
	
	
	
public function project_list()
    {
		
		 $user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		$data['message'] = $this->Account_Model->get_message();
		
        $data['project'] = $this->manager_model->get_projects($user_id);
        $data['title'] = 'Projects Confirmed';
 
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/project-list', $data);
		
        $this->load->view('dashboard/template/footer');
    }
	
	
	public function cancel()
    {
		 $proposal_id = $this->uri->segment(3);
        
        if (empty($proposal_id))
        {
            show_404();
        }
		 $user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		
        $data['proposal'] = $this->proposal_model->get_proposal_by_id($proposal_id);
       	$this->proposal_model->cancel_proposal($proposal_id);
        $data['title'] = 'View Proposal';
 		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully Canceled This proposal</div>');
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/view-proposal', $data);
		 $this->load->view('dashboard/template/footer');
			
		 
    }
	



public function ddd()
    {
		  $proposal_id = $this->uri->segment(3);
        
        if (empty($proposal_id))
        {
            show_404();
        }
		 
		
        $this->form_validation->set_rules('comment','Comment', 'required');
        $this->form_validation->set_rules('duration','Duration', 'required');
		$this->form_validation->set_rules('proposal','Project Proposal', 'required');
        
	
	
        if ($this->form_validation->run() === FALSE)
        {
		  $data['title'] = 'Edit Proposal';
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		$data['message'] = $this->Account_Model->get_message();
		
        $data['proposal'] = $this->proposal_model->get_proposal_by_id($proposal_id);
			
		
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		$this->load->view('dashboard/view-proposal', $data);
	    $this->load->view('dashboard/template/footer');
 
        }
        else
		
        {
		if(empty($_FILES['pwork']['name']))
{
	
			 $proposal_id = $this->uri->segment(3);
			$data = array(
       
        'pbudget' => $this->input->post('pbudget'),
		'abudget' => $this->input->post('total'),
		'proposal' => $this->input->post('proposal'),
		
		'duration' => $this->input->post('duration'),
		'revision' => $this->input->post('revision'),
		
		
    );


		$this->proposal_model->edit_proposal($proposal_id,$data);
		
		  $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully Edited Proposal</div>');
		redirect(base_url().'proposal/edit_proposal/'.$proposal_id);	
				
			
           
        
	
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
	  	 $data['title'] = 'Edit Proposal';
	  	$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		$project_id = $this->uri->segment(3);
		$data['proposal'] = $this->proposal_model->get_proposal_by_id($proposal_id);
		
   		$error = array('error' => $this->upload->display_errors());
		$this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/view-proposal', $error, $data);
		
        $this->load->view('dashboard/template/footer');
  } else{
	  $proposal_id = $this->uri->segment(3); 
	$image=$this->upload->data();  
	
	
 
    $data = array(
        'pbudget' => $this->input->post('pbudget'),
		'abudget' => $this->input->post('total'),
		'proposal' => $this->input->post('proposal'),
		
		'duration' => $this->input->post('duration'),
		'revision' => $this->input->post('revision'),
		'pwork' => $image['file_name'],
		
		
		
    );
	
	
	
				$this->proposal_model->edit_proposal($proposal_id,$data);
		
		  $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully Edited Proposal</div>');
		redirect(base_url().'proposal/edit_proposal/'.$proposal_id);	
 		
	
	}
	
}}
    }
	

	public function approve()
    {
		 $proposal_id = $this->uri->segment(3);
        
        if (empty($proposal_id))
        {
            show_404();
        }
		 $user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		$proposer_id = $this->uri->segment(4);
        $data['proposal'] = $this->proposal_model->get_proposal_by_id($proposal_id);
       	$this->proposal_model->approve_proposal($proposal_id);
        $data['title'] = 'View Proposal';
		$data['poster'] = $this->profile_model->get_poster($proposer_id);
		$email = $data['poster']['email'];
		$this->proposal_model->send_email_approved_proposal($email);
 		 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully Approved this Proposal</div>');
		redirect(base_url().'apply/details/'.$proposal_id);	
			
		 
    }
	
	

public function link()
    {
		$this->form_validation->set_rules('link','Link to Project', 'required');
        
        
	
	
        if ($this->form_validation->run() === FALSE)
        {
			
		 $user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		$data['message'] = $this->Account_Model->get_message();
       
		$project_id = $this->input->post('project_id');
		$data['project'] = $this->manager_model->get_project_by_id($project_id);
		$data['comment'] = $this->manager_model->get_comments_for_project($project_id);
		
        $data['title'] = 'Project Manager';
 
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/manager', $data);
		
        $this->load->view('dashboard/template/footer');
		
		}else{
			
		$prop= $this->input->post('proposal_id');
		
			$data = array(
       
	    
		'link' => $this->input->post('link'),
		
		'upload_date' => date("Y-m-d H:i:s"),
		
		
		
    );


		$this->manager_model->upload_project($prop,$data);
		
		  $this->session->set_flashdata('link', '<div class="alert alert-success text-center">Successfully uploaded the link to the project</div>');
		  
		  $project_id = $this->input->post('project_id');
		redirect(base_url("manager/project/".$project_id));
	
		
		
			
			}
	}


public function upload()
    {
			$config['upload_path']          = './jobs/';
			$config['allowed_types']        = '*';
			$config['overwrite'] = false;
			$config['max_size']             = 5200;
			
			$config['file_name'] = $_FILES["proj"]['name'];

			$this->load->library('upload', $config);
	
 if ( ! $this->upload->do_upload('proj'))
  {
			
		 $user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		$data['message'] = $this->Account_Model->get_message();
       
		$project_id = $this->input->post('project_id');
		$data['project'] = $this->manager_model->get_project_by_id($project_id);
		$data['comment'] = $this->manager_model->get_comments_for_project($project_id);
		
        $data['title'] = 'Project Manager';
 		$error = array('error' => $this->upload->display_errors());
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/manager', $error);
		
        $this->load->view('dashboard/template/footer');
		
		}else{
			
		$prop= $this->input->post('proposal_id');
		$image=$this->upload->data();
			$data = array(
       
	    
		'upload' => $image['file_name'],
		
		'upload_date' => date("Y-m-d H:i:s"),
		
		
		
    );


		$this->manager_model->upload_project($prop,$data);
		
		  $this->session->set_flashdata('upload', '<div class="alert alert-success text-center">Successfully uploaded the project</div>');
		  
		  $project_id = $this->input->post('project_id');
		redirect(base_url("manager/project/".$project_id));
	
		
		
			
			}
	}

public function download($proposal_id){
        if(!empty($proposal_id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $data['filename'] = $this->manager_model->get_download($proposal_id);
			$fileInfo=$data['filename']['upload'];
           
            //file path
            $file = './jobs/'.$fileInfo;
            
            //download file from directory
            force_download($file, NULL);
        }
    }
	

public function add_rating()
    {
		$this->form_validation->set_rules('review','Review', 'required');
        
        
	
	
        if ($this->form_validation->run() === FALSE)
        {
			
		 $user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		$data['message'] = $this->Account_Model->get_message();
       
		$project_id = $this->input->post('project_id');
		$data['project'] = $this->manager_model->get_project_by_id($project_id);
		$data['comment'] = $this->manager_model->get_comments_for_project($project_id);
		
        $data['title'] = 'Project Manager';
 
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/manager', $data);
		
        $this->load->view('dashboard/template/footer');
		
		}else{
			
		$prop= $this->input->post('proposal_id');
		
			$data = array(
       
	    'user_id'=>$this->session->userdata('user_id'),
		'username'=>$this->session->userdata('username'),
		'rate' => $this->input->post('star'),
		'review' => $this->input->post('review'),
		'freelancer' =>$provider= $this->input->post('provider'),
		'review_date' => date("Y-m-d H:i:s"),
		
		
		
    );


		$this->manager_model->add_rating($data);
		$data['rating'] = $this->manager_model->get_rating_number($provider);
		
		
		$rate = array(
        'rating' => $data['rating'],
	
    );
	
		$this->manager_model->update_rating($provider,$rate);
		
		
		  $this->session->set_flashdata('review', '<div class="alert alert-success text-center">Successfully added your review</div>');
		  
		  $project_id = $this->input->post('project_id');
		redirect(base_url("manager/project/".$project_id));
	
		
		
			
			}
	}	



}