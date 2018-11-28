<?php
class Account extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                 $this->load->model('Account_Model');
				  $this->load->model('profile_model');
                $this->load->helper('url_helper');
				$this->load->library('session');
				$this->load->helper('form');
				$this->load->helper('text');
        		$this->load->library('form_validation');
				$this->load->helper('string');
				$this->load->library('pagination');
        }

   
    public function register(){
		
		$data['title'] = 'User Registeration - Axiatag';
		
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model');
		$this->load->library('email');
		
		
        $this->form_validation->set_rules('fname','First name', 'required');
        $this->form_validation->set_rules('lname','Last name', 'required');
		$this->form_validation->set_rules('username','Username', 'required|is_unique[user_table.username]');
        $this->form_validation->set_rules('email','Email', 'trim|required|valid_email|is_unique[user_table.email]');
        $this->form_validation->set_rules('phone','Phone', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'required');
		$this->form_validation->set_rules('user');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');
        
        if($this->form_validation->run() == false){
            		$this->load->view('template/header', $data);
					$this->load->view('template/nav');
                    $this->load->view('register', $data);
                    $this->load->view('template/footer');
            
        }else{
            //call db
			$date = date("Y-m-d H:i:s");
			$user_id=rand(00000,99999); 
            $data = array(
                'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'username' => $this->input->post('username'),
				'user_id' => $user_id,
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'password' => md5($this->input->post('password')),
				 'user' => $this->input->post('user'),
				 'verify' => "pending",
				'date'=>$date,
            );
            
            $receiver =$this->input->post('email');
           
                
                //send confirm mail
				
                if($this->Account_Model->sendEmail($receiver)){
					
					 $this->Account_Model->insertUser($data);
                    //redirect('Login_Controller/index');
                    //$msg = "Successfully registered with the sysytem.Conformation link has been sent to: ".$this->input->post('txt_email');
                    $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully registered. Please confirm the mail that has been sent to your email. </div>');
					 redirect(base_url().'account/register');
                }else{
                    
                    //$error = "Error, Cannot insert new user details!";
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Failed!! Email could not be sent to ' .$receiver . ' , try again or contact support@axiatag.com</div>');
					 redirect(base_url().'account/register');
                }
                
                
            
        }
        
    }
    
    function confirmEmail($hashcode){
        if($this->Account_Model->verifyEmail($hashcode)){
            $this->session->set_flashdata('verify', '<div class="alert alert-success text-center">Email address is confirmed. Please login to the system</div>');
           redirect(base_url().'account/login');
        }else{
            $this->session->set_flashdata('verify', '<div class="alert alert-danger text-center">Email address is not confirmed. Please try to re-register.</div>');
           redirect(base_url().'account/register');
        }
    }


public function login(){
	
	 $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model'); 
		 $this->load->helper('url_helper');
		
		
        $data['title'] = 'Login - Axiatag';
        $this->form_validation->set_rules('email','Email', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        
        if($this->form_validation->run() == false){
                    $this->load->view('template/header', $data);
					$this->load->view('template/nav');
                    $this->load->view('login', $data);
                    $this->load->view('template/footer');
        }else{
            
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            
            if($this->Account_Model->loginUser($email, $password)){
                
                $userInfo = $this->Account_Model->loginUser($email, $password);
            
                
                    
                
                
                $this->session->set_flashdata('login_msg', '<div class="alert alert-success text-center">Successfully logged in</div>');
                //$this->load->view('header');
                //$this->load->view('tasks_view');
                //$this->load->view('footer');
				if( $this->session->userdata('redirect_back') ) {
    $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
    $this->session->unset_userdata('redirect_back');
    redirect( $redirect_url );
}
				else{
                redirect(base_url().'account/index');
				}
            }else{
                $this->session->set_flashdata('login_msg', '<div class="alert alert-danger text-center">Login Failed!! Please try again.</div>');
                    $this->load->view('template/header', $data);
					$this->load->view('template/nav');
                    $this->load->view('login');
                    $this->load->view('template/footer');
                
            }
        }
    }
    
   

public function index(){
	
	
         $data['title'] = 'User Dashboard - Axiatag';
		 $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model');
      
        if(isset($_SESSION['user_id'])){
			$this->load->helper('url');
            $user_id = $this->session->userdata('user_id');
		 $data['user'] = $this->profile_model->get_user($user_id);
		  $data['message'] = $this->Account_Model->get_message();
	   $data['total_project'] = $this->Account_Model->total_projects($user_id);
	   $data['total_proposal'] = $this->Account_Model->total_proposal($user_id);
	   $data['ongoing_project'] = $this->Account_Model->ongoing_projects($user_id);
	   $data['com_project'] = $this->Account_Model->com_projects($user_id);
			
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		$this->load->view('dashboard/template/nav2');
		$this->load->view('dashboard/index', $data);
		$this->load->view('dashboard/template/footer');
        }else{
            redirect(base_url().'account/login');
        }
        
    }
    
    public function logout(){
		
		
        $this->load->library('session');
         
        
        if($this->session->has_userdata('user_id')){
            //$this->session->unset_userdata('user_data');
            $this->session->sess_destroy();
            //unset($_SESSION['user_data']);
             
            redirect(base_url().'home/index');
        }
        
        
    }



public function recoverpassword()
{
		 $data['title'] = 'Forgot Passowrd';
 		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('account/forgotpassword');
        $this->load->view('templates/footer');
}

public function doforget()
{		$data['title'] = 'Forgot Passowrd';
		$this->load->helper('url');
		$email= $this->input->post('email');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','email','required|trim');
	
	if ($this->form_validation->run() == FALSE)
{
		
 		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('account/forgotpassword');
        $this->load->view('templates/footer');
}
	else
{
		$data['title'] = 'Passowrd Sent';
		$this-> Account_Model->reset_password($email);	
		$this->session->set_flashdata('message','Password has been reset and has been sent to email');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('account/forgotpassword');
        $this->load->view('templates/footer');
}
}



  public function ForgotPassword()
   {
         $email = $this->input->post('email');      
         $findemail = $this->Account_Model->ForgotPassword($email);  
         if($findemail){
          $this->Account_Model->sendpassword($findemail);        
           }else{
          $this->session->set_flashdata('login_msg',' Email not found!');
          redirect(base_url().'account/login','refresh');
      }
   }
   
   public function success()
   {
	   $data['title'] = 'Verify Your Email';
	   $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('account/success');
        $this->load->view('templates/footer');
	   
	   
	   
	   }
	   
public function verify_success()
   {
	   $data['title'] = 'Verify Your Email';
	   $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('account/verify_success');
        $this->load->view('templates/footer');
	   
	   
	   
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
		 
		$data['message'] = $this->Account_Model->get_message();
		
 		$this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
        $this->load->view('dashboard/view-message', $data);
		$this->load->view('dashboard/template/footer');
}


public function messages()
        {
              
	
       
        $data['title'] = 'Messages - Axiatag';
		$user_id = $this->session->userdata('user_id');
		 $data['user'] = $this->profile_model->get_user($user_id);
		 
		   $config['total_rows'] = $this->Account_Model->totalmessage();
  
  $config['base_url'] = base_url()."account/messages/";
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
   

  $query = $this->Account_Model->get_all_messages(20,$this->uri->segment(3));
  
  $data['message'] = null;
  
  if($query){
   $data['message'] =  $query;
    }
		
 		$this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
        $this->load->view('dashboard/messages', $data);
		$this->load->view('dashboard/template/footer');
}




public function payments()
{
		 $data['title'] = 'Transaction History - Axiatag';
		 $user_id = $this->session->userdata('user_id');
		 $data['user'] = $this->profile_model->get_user($user_id);
		 $data['payment'] = $this->Account_Model->get_payment($user_id);
		 $data['message'] = $this->Account_Model->get_message();
		 
 		$this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
        $this->load->view('dashboard/payments', $data);
		$this->load->view('dashboard/template/footer');
}

	   
	   public function upload_proof()
   {
	   $this->load->library('session');
	   
	    if(!$this->session->userdata['user_id'])
    {
        redirect(base_url().'account/login');
    }
	
	
	   $data['title'] = 'Upload Proof of Identity';
	  
 $this->form_validation->set_rules('proof', 'Document', 'callback_file_selected_test');
 
 
	    if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
        $this->load->view('dashboard/pages/proof', $data);
		$this->load->view('dashboard/templates/footer');
 
        }
        else
		
        {
	   $config['upload_path']          = './proofs/';
			$config['allowed_types']        = 'gif|jpg|png';
			$config['max_size']             = 1000;

			$this->load->library('upload', $config);
			
				
							
			if ( ! $this->upload->do_upload('proof')){
				$error = array('error' => $this->upload->display_errors());
			 $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
        $this->load->view('dashboard/pages/proof', $error);
		$this->load->view('dashboard/templates/footer');
			}else{
				
		//file is uploaded successfully
				//now get the file uploaded data 
				$upload_data = $this->upload->data();

				//get the uploaded file name
				$data['proof'] = $upload_data['file_name'];

				//store pic data to the db
				
 				
			
            $this->Account_Model->upload_proof($data);
            //$this->load->view('news/success');
           $this->session->set_flashdata('proof_msg',' Success! You have successfully uploaded your ID');
          redirect(base_url().'account/upload_proof');
		   
        }
	   
		}
	   
	   }

function file_selected_test(){

    $this->form_validation->set_message('file_selected_test', 'Please select file.');
    if (empty($_FILES['proof']['name'])) {
            return false;
        }else{
            return true;
        } 
}


public function admin(){
	
	 $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model'); 
		 $this->load->helper('url_helper');
		
		
        $data['title'] = 'Admin Login';
        $this->form_validation->set_rules('username','Username', 'trim|required');
        $this->form_validation->set_rules('password','Password', 'trim|required');
        
        if($this->form_validation->run() == false){
                    $this->load->view('template/header', $data);
					$this->load->view('template/nav');
                    $this->load->view('admin');
                    $this->load->view('template/footer');
        }else{
            
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            
            if($this->Account_Model->loginAdmin($username, $password)){
                
                $userInfo = $this->Account_Model->loginAdmin($username, $password);
            
                
                    
                
                
                $this->session->set_flashdata('login_msg', '<div class="alert alert-success text-center">Successfully logged in</div>');
                //$this->load->view('header');
                //$this->load->view('tasks_view');
                //$this->load->view('footer');
				if( $this->session->userdata('redirect_back') ) {
    $redirect_url = $this->session->userdata('redirect_back');  // grab value and put into a temp variable so we unset the session value
    $this->session->unset_userdata('redirect_back');
    redirect( $redirect_url );
}
				else{
                redirect(base_url().'admin/index');
				}
            }else{
                $this->session->set_flashdata('login_msg', '<div class="alert alert-danger text-center">Login Failed!! Please try again.</div>');
                    $this->load->view('template/header', $data);
					$this->load->view('template/nav');
                    $this->load->view('admin');
                    $this->load->view('template/footer');
                
            }
        }
    }
    

 public function admin_logout(){
		
		
        $this->load->library('session');
         
        
        if($this->session->has_userdata('admin_id')){
            //$this->session->unset_userdata('user_data');
            $this->session->sess_destroy();
            //unset($_SESSION['user_data']);
             
            redirect(base_url().'admin/index');
        }
        
        
    }


}