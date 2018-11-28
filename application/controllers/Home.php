<?php
class Home extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
               	  $this->load->model('home_model');
				  $this->load->model('profile_model');
                $this->load->helper('url_helper');
				$this->load->helper('form');
				$this->load->helper('text');
        		$this->load->library('form_validation');;
				$this->load->library('javascript');
				$this->load->library('session');
 				$this->load->library('pagination');

        }

        public function index()
        {
			
			
		 $data['arts'] = $this->home_model->count_arts(); 
		 $data['Designers'] = $this->home_model->count_Designers(); 
		 $data['Instructors'] = $this->home_model->count_Instructors();
		 $data['Programmers'] = $this->home_model->count_Programmers();
		 $data['Scribes'] = $this->home_model->count_Scribes();
		 $data['Virtual'] = $this->home_model->count_Virtual();
		 $data['Virtual_Consultants'] = $this->home_model->count_Virtual_Consultants();
		 $data['Others'] = $this->home_model->count_Others();             
		 $data['project'] = $this->home_model->get_projects();
		 $data['featured'] = $this->home_model->featured_projects();
        $data['title'] = 'Axiatag';
		$this->load->view('template/header', $data);
       	$this->load->view('template/nav');
		$this->load->view('index', $data);
        $this->load->view('template/footer');
        }


      public function project($slug = NULL)
        {
               $data['projects'] = $this->home_model->get_projects($slug);

        if (empty($data['projects']))
        {
                show_404();
        }

        $data['title'] = $data['projects']['title'];

        $this->load->view('template/header', $data);
		$this->load->view('template/nav');
        $this->load->view('project-detalis', $data);
        $this->load->view('template/footer');
		
		
		
        } 
		
		
	public function projects($offset=0)
        {
	
	$config['total_rows'] = $this->home_model->totalplaces();
  
  $config['base_url'] = base_url()."home/projects";
  $config['per_page'] = 3;
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
   

  $query = $this->home_model->list_projects(6,$this->uri->segment(3));
  
  $data['project'] = null;
  
  if($query){
   $data['project'] =  $query;
  }

 		              
		$data['arts'] = $this->home_model->count_arts(); 
		 $data['Designers'] = $this->home_model->count_Designers(); 
		 $data['Instructors'] = $this->home_model->count_Instructors();
		 $data['Programmers'] = $this->home_model->count_Programmers();
		 $data['Scribes'] = $this->home_model->count_Scribes();
		 $data['Virtual'] = $this->home_model->count_Virtual();
		 $data['Virtual_Consultants'] = $this->home_model->count_Virtual_Consultants();
		 $data['Others'] = $this->home_model->count_Others();   
		 $data['featured'] = $this->home_model->featured_projects(); 
        $data['title'] = 'Project Lisitng';

        $this->load->view('template/header', $data);
		$this->load->view('template/nav');
		
        $this->load->view('projects', $data);
        $this->load->view('template/footer');
        }
    
	
	public function category()
        {
               
         $category = $this->uri->segment(3);
      
		 
        if (empty($category))
        {
            show_404();
        }
		$data['arts'] = $this->home_model->count_arts(); 
		 $data['Designers'] = $this->home_model->count_Designers(); 
		 $data['Instructors'] = $this->home_model->count_Instructors();
		 $data['Programmers'] = $this->home_model->count_Programmers();
		 $data['Scribes'] = $this->home_model->count_Scribes();
		 $data['Virtual'] = $this->home_model->count_Virtual();
		 $data['Virtual_Consultants'] = $this->home_model->count_Virtual_Consultants();
		 $data['Others'] = $this->home_model->count_Others();   
		 $data['featured'] = $this->home_model->featured_projects();
		$data['project'] = $this->home_model->get_category($category);
		$cat = str_replace("-"," ",$category); 
		
        $data['title'] = 'Projects on '. $cat;

        $this->load->view('template/header', $data);
		$this->load->view('template/nav');
		
        $this->load->view('category', $data);
        $this->load->view('template/footer');
		
		
		
        }
		
	 public function about()
        {
		$data['title'] = 'About us';
		 $data['featured'] = $this->home_model->featured_projects(); 
         $this->load->view('template/header', $data);
		$this->load->view('template/nav');
        $this->load->view('about');
		 $this->load->view('template/footer');
        }
		
		
	public function contact()
        {
		$data['title'] = 'Contact Us';
		 $data['featured'] = $this->home_model->featured_projects(); 	
         $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
       
      	$this->load->library('email');
		
		 $this->form_validation->set_rules('name','Name', 'required');
       	
        $this->form_validation->set_rules('email','Email', 'trim|required');
        $this->form_validation->set_rules('subject','Subject', 'trim|required');
        $this->form_validation->set_rules('message','Message', 'required');
		
		
			
        if($this->form_validation->run() == false){
            		$this->load->view('template/header', $data);
					$this->load->view('template/nav');
                    $this->load->view('contact');
                    $this->load->view('template/footer');
            
        }else{
		
      
                $name = $this->input->post('name');
				
                $subject = $this->input->post('subject');
              
				$email = $this->input->post('email');
				$comment = $this->input->post('comments');
				
            
            
           
           $this->home_model->contact_admin($name,$email,$subject,$comment);
                
               
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully Sent Your Message, We would get back to you immediately</div>');
					 redirect(base_url().'home/contact');
               
                
            
        
		}
        }
		
		
		
 public function how()
        {
			$this->load->helper('url_helper');
		$data['title'] = 'How it Works';
		 $data['featured'] = $this->home_model->featured_projects(); 
         $this->load->view('template/header', $data);
		 $this->load->view('template/nav');
         $this->load->view('how-it-works');
		 $this->load->view('template/footer');
        }
		
	public function freelancer()
        {
			$this->load->helper('url_helper');
		$data['title'] = 'Freelancers';
		 $data['featured'] = $this->home_model->featured_projects();
		 $data['user'] = $this->home_model->get_users(); 
         $this->load->view('template/header', $data);
		 $this->load->view('template/nav');
         $this->load->view('freelancer');
		 $this->load->view('template/footer');
        }	
		
	public function user()
        {
			 $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
			$this->load->helper('url_helper');
		$data['title'] = 'User Details';
		 $data['featured'] = $this->home_model->featured_projects();
		 $data['user'] = $this->profile_model->get_user($user_id); 
         $this->load->view('template/header', $data);
		 $this->load->view('template/nav');
         $this->load->view('user');
		 $this->load->view('template/footer');
        }
    
	 public function categories()
        {
			
			
		 $data['arts'] = $this->home_model->count_arts(); 
		 $data['Designers'] = $this->home_model->count_Designers(); 
		 $data['Instructors'] = $this->home_model->count_Instructors();
		 $data['Programmers'] = $this->home_model->count_Programmers();
		 $data['Scribes'] = $this->home_model->count_Scribes();
		 $data['Virtual'] = $this->home_model->count_Virtual();
		 $data['Virtual_Consultants'] = $this->home_model->count_Virtual_Consultants();
		 $data['Others'] = $this->home_model->count_Others();             
		 $data['project'] = $this->home_model->get_projects();
		 $data['featured'] = $this->home_model->featured_projects();
        $data['title'] = 'Project Categories';
		$this->load->view('template/header', $data);
       	$this->load->view('template/nav');
		$this->load->view('categories', $data);
        $this->load->view('template/footer');
        }

public function project_board()
        {
			
             
		
		
		
       
		$this->form_validation->set_rules('comment','Comment', 'required');
       
        
	
        if ($this->form_validation->run() === FALSE)
        {
        $this->load->view('template/header', $data);
		$this->load->view('template/nav');
        $this->load->view('project-details', $data);
        $this->load->view('template/footer');
		
		}else{
			
		$username = $this->session->userdata('username');
		$user_id = $this->session->userdata('user_id');
		$date = date("Y-m-d H:i:s");
		$data = array(
				'username'=> $username,
				'user_id'=> $user_id,
				'project_id' => $this->input->post('project_id'),
        		'comment' => $this->input->post('comment'),
				'date'=>$date,
				
				
		
    );	
	
	if($this->home_model->insert_comment($data)){		
			
	$slug = $this->uri->segment(3);
        
     redirect(base_url().'project/'.$slug);
	}
		}
		
		
        }
		
 public function search_project()
        {
		$data['title'] = 'Project Search Result';
		
		$search = $this->input->post('search');
		
	$config['total_rows'] = $this->home_model->totalsearch();
  
  $config['base_url'] = base_url()."home/search_project/";
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
   

  $query = $this->home_model->search_project($search,20,$this->uri->segment(3));
  
  $data['project'] = null;
  
  if($query){
   $data['project'] =  $query;
  
  
		
		 $data['featured'] = $this->home_model->featured_projects(); 
         $this->load->view('template/header', $data);
		$this->load->view('template/nav');
        $this->load->view('search-results',$data);
		 $this->load->view('template/footer');
        }else{
			
		$data['search'] = 'No result found'; 
		$data['featured'] = $this->home_model->featured_projects();
         $this->load->view('template/header', $data);
		$this->load->view('template/nav');
        $this->load->view('search-results',$data);
		 $this->load->view('template/footer');	
			
		}

		}
}