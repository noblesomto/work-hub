<?php
class Admin extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('Admin_model');
				$this->load->model('Account_Model');
				$this->load->model('manager_model');
				$this->load->model('profile_model');
				$this->load->model('project_model');
				$this->load->helper('url_helper');
				$this->load->library('session');
				$this->load->database();
				$this->load->helper('text');
				$this->load->library('form_validation');
				$this->load->library('pagination');
				$sess_id = $this->session->userdata('admin_id');

   if(empty($sess_id))
   {
        redirect(base_url().'account/admin');

   }			
				
        }
			
		

        public function index()
        {
		             
        $data['title'] = 'Admin Dashboard';
		
		
		
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/index', $data);
		
        $this->load->view('admin/templates/footer');
        }

       
	   
	   
public function project_list()
        {
               
         $data['project'] = $this->Admin_model->get_projects();
        $data['title'] = 'Projects Confirmed';

        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/project-list', $data);
		
        $this->load->view('admin/templates/footer');
		
		
		
        } 
public function project_manager()
    {
		$this->form_validation->set_rules('comment','Comment', 'required');
        
        
	
	
        if ($this->form_validation->run() === FALSE)
        {
			
		
		$project_id = $this->uri->segment(3);
		$data['project'] = $this->manager_model->get_project_by_id($project_id);
		$data['comment'] = $this->manager_model->get_comments_for_project($project_id);
        $data['title'] = 'Project Manager';
 
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/manager', $data);
		
        $this->load->view('admin/templates/footer');
		
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
		redirect(base_url("admin/project_manager/".$project_id));
	
		
		
			
			}
	}
	
	
	

public function projects($offset=0)
        {
			
		
      
	
	$config['total_rows'] = $this->Admin_model->totalprojects();
  
  $config['base_url'] = base_url()."admin/projects/";
  $config['per_page'] = 20;
  $config['uri_segment'] = '3';
 $config['use_page_numbers'] = TRUE;
 $config['full_tag_open'] = '<ul class="pagination">';
 $config['full_tag_close'] = '</ul>';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
 $config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
 $config['next_tag_close'] = '</li>';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
 $config['cur_tag_close'] = '</a></li>';
 $config['num_tag_open'] = '<li>';
 $config['num_tag_close'] = '</li>';
 $config['next_link'] = '&raquo;';


  $this->pagination->initialize($config);
   

  $query = $this->Admin_model->get_all_projects(20,$this->uri->segment(3));
  
  $data['project'] = null;
  
  if($query){
   $data['project'] =  $query;
  }

 		              
	
        $data['title'] = 'All Projects - Axiatag';

       $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/projects', $data);
		
        $this->load->view('admin/templates/footer');
		
        }
		
public function proposal()
    {
		$proposal_id = $this->uri->segment(3);
        
        if (empty($proposal_id))
        {
            show_404();
        }
		
        $data['proposal'] = $this->project_model->get_proposals($proposal_id);
        $data['title'] = 'View Proposals - Axiatag';
 
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/proposals', $data);
	
        $this->load->view('admin/templates/footer');
    }
			
		

public function users($offset=0)
        {
			
		
	
	$config['total_rows'] = $this->profile_model->totalusers();
  
  $config['base_url'] = base_url()."admin/users";
  $config['per_page'] = 20;
  $config['uri_segment'] = '3';
 $config['use_page_numbers'] = TRUE;
 $config['full_tag_open'] = '<ul class="pagination">';
 $config['full_tag_close'] = '</ul>';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
 $config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
 $config['next_tag_close'] = '</li>';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
 $config['cur_tag_close'] = '</a></li>';
 $config['num_tag_open'] = '<li>';
 $config['num_tag_close'] = '</li>';
 $config['next_link'] = '&raquo;';


  $this->pagination->initialize($config);
   

  $query = $this->profile_model->get_all_users(20,$this->uri->segment(3));
  
  $data['user'] = null;
  
  if($query){
   $data['user'] =  $query;
  }

 		              
	
        $data['title'] = 'All Users';

       $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/users', $data);
		
        $this->load->view('admin/templates/footer');
		
  }
  
  
 public function view_user()
    {
		$user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
		
        $data['user'] = $this->profile_model->get_user($user_id);
        $data['title'] = 'User Details - Axiatag';
 
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/view-user', $data);
	
        $this->load->view('admin/templates/footer');
    }
	
public function search()
        {
		
			
			$search = $this->input->post('search');
	
		 $data['user']= $this->profile_model->search_user($search);
			
		$data['title'] = 'User Search- Axiatag';
 
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/user-search', $data);
	
        $this->load->view('admin/templates/footer');
			
		
		 
        }
		
public function search_project()
        {
		
			
			$search = $this->input->post('search');
	
		 $data['project']= $this->project_model->search_project($search);
			
		$data['title'] = 'User Search- Axiatag';
 
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/project-search', $data);
	
        $this->load->view('admin/templates/footer');
			
		
		 
        }				

public function paid_projects()
        {
		
			
			$search = $this->input->post('search');
	
		 $data['project']= $this->project_model->get_paid_projects();
			
		$data['title'] = 'Paid Projects- Axiatag';
 
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/paid-projects', $data);
	
        $this->load->view('admin/templates/footer');
			
		
		 
        }	

public function mark_done()
        {
               
         $order_id = $this->uri->segment(3);
		 $project_id = $this->uri->segment(4);
        
        if (empty($order_id))
        {
            show_404();
        }
		
		$data = array(
                'project_status' => "completed",
				'comp_date' => date("Y-m-d H:i:s"),
			
				
            );
			
			$data2 = array(
                'project_status' => "completed",
				
			
				
            );
		
		 $this->project_model->mark_project_done($order_id,$data);
		 $this->project_model->mark_project_completed($project_id,$data2);
		 
		 
         $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have Markde Project as Done</div>');
          redirect(base_url().'admin/paid_projects');;
		
		
		
        }
    
public function completed_projects()
        {
		
			
			
	
		 $data['project']= $this->project_model->get_completed_projects();
			
		$data['title'] = 'Paid Projects- Axiatag';
 
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/completed-projects', $data);
	
        $this->load->view('admin/templates/footer');
			
		
		 
        }	

public function user_verification()
        {
		
			
			
	
		 $data['user']= $this->profile_model->get_pending_verification();
			
		$data['title'] = 'Pending User Verification- Axiatag';
 
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/user_verification', $data);
	
        $this->load->view('admin/templates/footer');
			
		
		 
        }

public function pending_user_details()
    {
		$user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
		
        $data['user'] = $this->profile_model->get_user($user_id);
        $data['title'] = 'User Details - Axiatag';
 
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/pending-user', $data);
	
        $this->load->view('admin/templates/footer');
    }
	
	
						
		
public function verify_user()
        {
               
         $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
		
		$data = array(
                'verify' => "confirmed",
				
			
				
            );
		
		 $this->profile_model->verify_user($user_id,$data);
		 
		 
         $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">You have Verified a user</div>');
          redirect(base_url().'admin/user_verification');;
		
		
		
        }
    
	
	public function reset_admin()
    {
		
		
        $data['admin'] = $this->Admin_model->get_admin();
        $data['title'] = 'Reset Admin';
 
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/reset-admin', $data);
	
        $this->load->view('admin/templates/footer');
    }
	
public function reset_user()
        {
               
         $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
		
		$data = array(
                'paired' => "no",
				'matched' => "0",
				'no_paid' => "0",
			
				
            );
		
		 $this->Admin_model->reset_user($user_id,$data);
		 
		 
         $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">A user has been Reset</div>');
          redirect(base_url().'admin/reset_admin');;
		
		
		
        }	
		


public function userd()
    {
		
		
       $config['total_rows'] = $this->Admin_model->totaluser();
  
  $config['base_url'] = base_url()."admin/user";
  $config['per_page'] = 20;
  $config['uri_segment'] = '3';
 $config['use_page_numbers'] = TRUE;
 $config['full_tag_open'] = '<ul class="pagination">';
 $config['full_tag_close'] = '</ul>';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
 $config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
 $config['next_tag_close'] = '</li>';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
 $config['cur_tag_close'] = '</a></li>';
 $config['num_tag_open'] = '<li>';
 $config['num_tag_close'] = '</li>';
 $config['next_link'] = '&raquo;';


  $this->pagination->initialize($config);
   

  $query = $this->Admin_model->get_user(20,$this->uri->segment(3));
  
  $data['user'] = null;
  
  if($query){
   $data['user'] =  $query;
    }
	$data['title'] = 'View Users';

       $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/user', $data);
		
        $this->load->view('admin/templates/footer');
		
	}


public function delete_user()
        {
               
         $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
		
		
		
		 $this->Admin_model->delete_user($user_id);
		 
		 
         $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">A user has been Deleted</div>');
          redirect(base_url().'admin/user');
		
		
		
  }	
  
 
	
	

public function post_message()
    {
		$this->form_validation->set_rules('title','Title', 'required');
		$this->form_validation->set_rules('message','Message', 'required');
        
        
	
	
        if ($this->form_validation->run() === FALSE)
        {
			
		
		
        $data['title'] = 'New Message';
 
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/new-message', $data);
		
        $this->load->view('admin/templates/footer');
		
		}else{
			
		 		 
		 
			 $slug = url_title($this->input->post('title'), 'dash', TRUE);
			 
			$title= $this->input->post('title');
			$message= $this->input->post('messaage');
			$date = date("Y-m-d H:i:s");
			
			$data = array(
       
	    
		'title' => $this->input->post('title'),
		'slug' => $slug,
		'message' => $this->input->post('message'),
		'date' => date("Y-m-d H:i:s"),
		
		
		
    );

		$email = $this->Admin_model->get_emails();
		 
		
		
			foreach ($email as $key ) {
            
            $email2 = $key['email']." ,";
			
			
        }

		if($this->Admin_model->send_email($title,$message,$date,$email2)){
			
		
		$this->Admin_model->new_message($data);
		
		
		  $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully sent your message</div>');
		 
		  
		 
		redirect(base_url("admin/post_message"));
		}else{
			
	$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Error! your message was not sent</div>');
		 
		  
		 
		redirect(base_url("admin/post_message"));		
			
		}
		
		
			
			}
	}

public function messages($offset=0)
        {
			
		
	
	$config['total_rows'] = $this->Admin_model->totalmessage();
  
  $config['base_url'] = base_url()."admin/messages/";
  $config['per_page'] = 20;
  $config['uri_segment'] = '3';
 $config['use_page_numbers'] = TRUE;
 $config['full_tag_open'] = '<ul class="pagination">';
 $config['full_tag_close'] = '</ul>';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
 $config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
 $config['next_tag_close'] = '</li>';
 $config['cur_tag_open'] = '<li class="active"><a href="#">';
 $config['cur_tag_close'] = '</a></li>';
 $config['num_tag_open'] = '<li>';
 $config['num_tag_close'] = '</li>';
 $config['next_link'] = '&raquo;';


  $this->pagination->initialize($config);
   

  $query = $this->Admin_model->get_all_message(20,$this->uri->segment(3));
  
  $data['message'] = null;
  
  if($query){
   $data['message'] =  $query;
  }

 		              
	
        $data['title'] = 'All Messages';

       $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/messages', $data);
		
        $this->load->view('admin/templates/footer');
		
  }
   
 public function view_message($slug = NULL)
        {
              
		$data['mess'] = $this->Account_Model->get_message($slug);
		
		if (empty($data['mess']))
        {
                show_404();
        }
        $data['title'] = $data['mess']['title'].' - Axiatag';
		$user_id = $this->session->userdata('user_id');
		 $data['user'] = $this->profile_model->get_user($user_id);
		 
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/view-message', $data);
		
        $this->load->view('admin/templates/footer');
}

public function delete_message()
        {
               
         $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
		
		
		
		 $this->Admin_model->delete_message($id);
		 
		 
         $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Message was Deleted</div>');
          redirect(base_url().'admin/messages');
		
		
		
  }	
  



  
}