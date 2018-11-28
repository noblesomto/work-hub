<?php
class Adminpost extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('post_model');
				 $this->load->model('profile_model');
				$this->load->model('Account_Model');
                 $this->load->helper('url_helper');
				$this->load->helper('text');
				$this->load->library('session');	
				
				$sess_id = $this->session->userdata('admin_id');

   if(empty($sess_id))
   {
        redirect(base_url().'account/admin');

   }			
        }

       
		
		
	public function post_project()
{
		
	 $this->load->helper('url');
	$user_id = $this->session->userdata('user_id');
	 
		 
    $this->load->helper('form');
    $this->load->library('form_validation');
	 $user_id = $this->session->userdata('user_id');
		 $data['user'] = $this->profile_model->get_user($user_id);
	
    $data['title'] = 'Post New Project';
	
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('mini-budget', 'Minimum Budget', 'required');
	$this->form_validation->set_rules('max-budget', 'Maximum Budget', 'required');
	$this->form_validation->set_rules('description', 'Description', 'required');
	$this->form_validation->set_rules('category', 'Category', 'required');
	$this->form_validation->set_rules('skills', 'Skills', 'required');
	$this->form_validation->set_rules('mini-duration', 'Minimum Duration', 'required');
	$this->form_validation->set_rules('max-duration', 'Maximum Duration', 'required');
	$this->form_validation->set_rules('end-date', 'End Date', 'required');
	$this->form_validation->set_rules('extra-info');
	$this->form_validation->set_rules('deliverable1', 'Deleiverable one', 'required');
	$this->form_validation->set_rules('deliverable2');
	$this->form_validation->set_rules('deliverable3');
	$this->form_validation->set_rules('deliverable4');
	$this->form_validation->set_rules('urgent');
	
	

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/post-project', $data);
	
        $this->load->view('admin/templates/footer');

    }
    else
    {
	
        
		
		$user_id = $this->session->userdata('admin_id');
		$username = $this->session->userdata('username');
   
	$date = date("Y-m-d H:i:s");
	
	$featured = "No";
	$project_id= rand(00000000,99999999);
	
	
 
    $data = array(
        'title' => $this->input->post('title'),
        'mini_budget' => $this->input->post('mini-budget'),
		 'max_budget' => $this->input->post('max-budget'),
		'description' => $this->input->post('description'),
		'category' => $this->input->post('category'),
		'skills' => $this->input->post('skills'),
		'mini_duration' => $this->input->post('mini-duration'),
		'max_duration' => $this->input->post('max-duration'),
		'end-date' => $this->input->post('end-date'),
		'extra-info' => $this->input->post('extra-info'),
		'deliverable1' => $this->input->post('deliverable1'),
		'date' => $date,
		'project_status'=>"pending",
		'featured' => $featured,
		'username' => $username,
		'project_id'=>$project_id,
		'user_id'=>$user_id
		
		
    );
if ($this->input->post('urgent')) $data['urgent'] = $this->input->post('urgent');
if ($this->input->post('deliverable2')) $data['deliverable2'] = $this->input->post('deliverable2');
if ($this->input->post('deliverable3')) $data['deliverable3'] = $this->input->post('deliverable3');
if ($this->input->post('deliverable4')) $data['deliverable4'] = $this->input->post('deliverable4');



		$this->post_model->set_project($data);
    

    
				
				
		
			 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have successfully posted a project </div>');
					 redirect(base_url().'adminpost/post_project');
			}
			
			
    }


public function projects()
    {
		
		$user_id = $this->session->userdata('user_id');
	
		 $data['user'] = $this->profile_model->get_user($user_id);
		
		
		
        $data['project'] = $this->post_model->get_project();
        $data['title'] = 'View Projects';
 
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/projects', $data);
		
        $this->load->view('dashboard/template/footer');
    }



public function edit_project()
{
	 $this->load->helper('url');
	$user_id = $this->session->userdata('user_id');
	  $project_id = $this->uri->segment(3);
	 
		 $data['user'] = $this->profile_model->get_user($user_id);	 
    $this->load->helper('form');
    $this->load->library('form_validation');
	
	 $data['project'] = $this->post_model->get_project_by_id($project_id);
    $data['title'] = 'Edit Project';
	
    $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/edit-project', $data);
		
        $this->load->view('dashboard/template/footer');
    }


public function edit()
{
	 $this->load->helper('url');
	$user_id = $this->session->userdata('user_id');
	$data['user'] = $this->profile_model->get_user($user_id);
	  $project_id = $this->uri->segment(3);
	   if (empty($project_id))
        {
            show_404();
        }
		 
    $this->load->helper('form');
    $this->load->library('form_validation');
	
	 $data['project'] = $this->post_model->get_project_by_id($project_id);
    $data['title'] = 'Edit Project';
	
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('mini-budget', 'Minimum Budget', 'required');
	$this->form_validation->set_rules('max-budget', 'Maximum Budget', 'required');
	$this->form_validation->set_rules('description', 'Description', 'required');
	$this->form_validation->set_rules('category', 'Category', 'required');
	$this->form_validation->set_rules('skills', 'Skills', 'required');
	$this->form_validation->set_rules('mini-duration', 'Minimum Duration', 'required');
	$this->form_validation->set_rules('max-duration', 'Maximum Duration', 'required');
	$this->form_validation->set_rules('end-date', 'End date', 'required');
	$this->form_validation->set_rules('extra-info');
	$this->form_validation->set_rules('deliverable1', 'Deliverable One', 'required');
	$this->form_validation->set_rules('deliverable2');
	$this->form_validation->set_rules('deliverable3');
	$this->form_validation->set_rules('deliverable4');
	$this->form_validation->set_rules('urgent');
	
	

    if ($this->form_validation->run() === FALSE)
    {
	 $data['project'] = $this->post_model->get_project_by_id($project_id);
	 $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/edit-project', $data);
	
        $this->load->view('admin/templates/footer');
    }
    else
    {
	
        
		
		
	
 
    $data = array(
        'title' => $this->input->post('title'),
        'mini_budget' => $this->input->post('mini-budget'),
		'max_budget' => $this->input->post('max-budget'),
		'description' => $this->input->post('description'),
		'category' => $this->input->post('category'),
		'mini_duration' => $this->input->post('mini-duration'),
		'max_duration' => $this->input->post('max-duration'),
		'skills' => $this->input->post('skills'),
		'end-date' => $this->input->post('end-date'),
		'extra-info' => $this->input->post('extra-info'),
		'deliverable1' => $this->input->post('deliverable1'),
		'deliverable2' => $this->input->post('deliverable2'),
		'deliverable3' => $this->input->post('deliverable3'),
		'deliverable4' => $this->input->post('deliverable4'),
		'urgent' => $this->input->post('urgent'),
		
		
		
    );


		$this->post_model->update_project($data, $project_id);
    

    
				
				
		
			 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have successfully Edited this Project </div>');
					redirect( base_url() . 'adminpost/edit/'.$project_id); 
			}
			
			
    }

public function delete()
    {
      $project_id = $this->uri->segment(3);
        
        if (empty($project_id))
        {
            show_404();
        }
                
      
        
        $this->post_model->delete_project($project_id);        
        redirect( base_url() . 'admin/projects');        
    }


}