<?php
class Profile extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('Account_Model');
        $this->load->model('profile_model');
		$this->load->helper('url_helper');
		$this->load->helper('text');
		$this->load->database();
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
 
  
  
   
  
  
    
    public function profile()
    {
		
        $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
		
		 $this->load->helper('url_helper');
		$this->load->database();
        
        $data['title'] = 'My Profile';        
        $data['user'] = $this->profile_model->get_user($user_id);
		$data['cert'] = $this->profile_model->get_cert($user_id);
		$data['lang'] = $this->profile_model->get_lang($user_id);
		$data['message'] = $this->Account_Model->get_message();
        
  		$this->form_validation->set_rules('fname','First Name', 'required');
		$this->form_validation->set_rules('lname','Last Name', 'required');
       $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('phone','Phone', 'trim|required');
       
		 $this->form_validation->set_rules('skills', 'Skills', 'required');
	
	
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
       $this->load->view('dashboard/profile', $data);
		
        $this->load->view('dashboard/template/footer');
 
        }
        else
		
        {
			
							
			$data = array(
        		'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'username' => $this->input->post('username'),
				'phone' => $this->input->post('phone'),
                'password' => md5($this->input->post('password')),
				'describe' => $this->input->post('description'),
				'skills' => $this->input->post('skills'),
		
		
		
    );

	
		$this->profile_model->update_profile($user_id,$data);
		
		 $this->session->set_flashdata('msg', '<div class="alert alert-Success text-center">You have successfuly updated your profile </div>');
		 
		 $user_id = $this->uri->segment(3);
        
     
        
     
        
        $data['title'] = 'My Profile';   
		$user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }     
        $data['user'] = $this->profile_model->get_user($user_id);
		$data['cert'] = $this->profile_model->get_cert($user_id);
		$data['lang'] = $this->profile_model->get_lang($user_id);
		$data['message'] = $this->Account_Model->get_message();
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/profile', $data);
		
        $this->load->view('dashboard/template/footer');
 
		
		
		
        }
    
	}

public function update_picture()
    {
		
        $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
		
		 $this->load->helper('url_helper');
		$this->load->database();
        
        $data['title'] = 'My Profile';        
        $data['user'] = $this->profile_model->get_user($user_id);
		$data['message'] = $this->Account_Model->get_message();
		
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
       $this->load->view('dashboard/upload', $data);
		
        $this->load->view('dashboard/template/footer');
 
        }	
	
	 public function upload()
    {
		$user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
		
		
		 $data['user'] = $this->profile_model->get_user($user_id);
		
        $user_id = $this->uri->segment(3);
         $data['title'] = 'My Profile';     
      		 $config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['overwrite'] = false;
			$config['max_size']             = 500;
			$config['min_width']             = 500;
			$config['file_name'] = $_FILES["picture"]['name'];

			$this->load->library('upload', $config);
			
				
							
			if ( ! $this->upload->do_upload('picture')){
				 $data['title'] = 'My Profile'; 
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/upload', $error);
		
        $this->load->view('dashboard/template/footer');
			}else{
	$this->upload->do_upload('picture');			
	$image=$this->upload->data();	
	
	 $data = array(
       
		'picture' => $image['file_name'],
		
		
		
		
    );


		$this->profile_model->update_picture($user_id,$data);
		
		 $this->session->set_flashdata('upload_msg', '<div class="alert alert-Success text-center">You have successfuly updated your profile </div>');
		 
		 $user_id = $this->uri->segment(3);
        
     redirect(base_url().'profile/update_picture/'.$user_id);
 
		
			}
		
    }


public function personal_details()
    {
		
        $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
		
		 $this->load->helper('url_helper');
		$this->load->database();
        
        $data['title'] = 'My Profile';        
        $data['user'] = $this->profile_model->get_user($user_id);
		$data['cert'] = $this->profile_model->get_cert($user_id);
		$data['lang'] = $this->profile_model->get_lang($user_id);
		$data['message'] = $this->Account_Model->get_message();
        
  		$this->form_validation->set_rules('fname','First Name', 'required');
		$this->form_validation->set_rules('lname','Last Name', 'required');
       $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('phone','Phone', 'trim|required');
       
		 $this->form_validation->set_rules('skills', 'Skills', 'required');
	
	
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
       $this->load->view('dashboard/personal-details', $data);
		
        $this->load->view('dashboard/template/footer');
 
        }
        else
		
        {
			
							
			$data = array(
        		'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'username' => $this->input->post('username'),
				'phone' => $this->input->post('phone'),
                'describe' => $this->input->post('description'),
				'skills' => $this->input->post('skills'),
		
		
		
    );

	
		$this->profile_model->update_profile($user_id,$data);
		
		 $this->session->set_flashdata('msg', '<div class="alert alert-Success text-center">You have successfuly updated your profile </div>');
		 
		 $user_id = $this->uri->segment(3);
        
     
        
     
        
        redirect(base_url().'profile/personal_details/'.$user_id);
 
		
		
		
        }
    
	}

public function add_cert()
    {
		
        $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
		
		 $this->load->helper('url_helper');
		$this->load->database();
        
        $data['title'] = 'My Profile';        
        $data['user'] = $this->profile_model->get_user($user_id);
		$data['message'] = $this->Account_Model->get_message();
		
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
       $this->load->view('dashboard/add-cert', $data);
		
        $this->load->view('dashboard/template/footer');
 
        }
	
 public function certification()
    {
		
        $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
		
		 $this->load->helper('url_helper');
		$this->load->database();
        
        $data['title'] = 'My Profile';        
        $data['user'] = $this->profile_model->get_user($user_id);
		 $data['cert'] = $this->profile_model->get_cert($user_id);
		 $data['lang'] = $this->profile_model->get_lang($user_id);
		 $data['message'] = $this->Account_Model->get_message();
        
  		$this->form_validation->set_rules('title','Certification Title', 'required');
		$this->form_validation->set_rules('institution','Institution', 'required');
       $this->form_validation->set_rules('date-issue', 'Date of Issue', 'required');
       
	
	
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
       $this->load->view('dashboard/add-cert', $data);
		
        $this->load->view('dashboard/template/footer');
 
        }
        else
		
        {
			$config['upload_path']          = './certificate/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['overwrite'] = false;
			$config['max_size']             = 700;
			
			$new_name = rand(0000, 9999).$_FILES["cert-pix"]['name'];
			$config['file_name'] = $new_name; 

			$this->load->library('upload', $config);
			
				
							
			if ( ! $this->upload->do_upload('cert-pix')){
				
				$user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
		$data['user'] = $this->profile_model->get_user($user_id);
		 $data['cert'] = $this->profile_model->get_cert($user_id);
		 $data['lang'] = $this->profile_model->get_lang($user_id);
		 $data['message'] = $this->Account_Model->get_message();
				
				$error = array('error' => $this->upload->display_errors());
				 $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/add-cert', $error);
		
        $this->load->view('dashboard/template/footer');
		}else{
	$this->upload->do_upload('cert-pix');			
	$image=$this->upload->data();	
	$user_id = $this->uri->segment(3);		
							
			$data = array(
        		'cert_title' => $this->input->post('title'),
				'institution' => $this->input->post('institution'),
				'date_issue' => $this->input->post('date-issue'),
				'cert_pix' => $image['file_name'],
				'user_id'=>$user_id,
		
		
		
    );

	
		$this->profile_model->upload_cert($data);
		
		 $this->session->set_flashdata('cert-msg', '<div class="alert alert-Success text-center">You have successfuly updated your Certification </div>');
		 
		 $user_id = $this->uri->segment(3);
        
     
        
     
        
         redirect(base_url().'profile/add_cert/'.$user_id);
 
		
		
		
        }
    
	}
	}
	
public function add_lang()
    {
		
        $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
		
		 $this->load->helper('url_helper');
		$this->load->database();
        
        $data['title'] = 'My Profile';        
        $data['user'] = $this->profile_model->get_user($user_id);
		$data['message'] = $this->Account_Model->get_message();
		
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
       $this->load->view('dashboard/add-lang', $data);
		
        $this->load->view('dashboard/template/footer');
 
        }	
	
	public function lang()
    {
		
        $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
		
		 $this->load->helper('url_helper');
		$this->load->database();
        
        $data['title'] = 'My Profile';        
        $data['user'] = $this->profile_model->get_user($user_id);
		 $data['cert'] = $this->profile_model->get_cert($user_id);
		 $data['lang'] = $this->profile_model->get_lang($user_id);
        
  		$this->form_validation->set_rules('lang','Language', 'required');
		
       
	
	
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
       $this->load->view('dashboard/add_lang', $data);
		
        $this->load->view('dashboard/template/footer');
 
        }
        else
		
        {
			
	$user_id = $this->uri->segment(3);		
							
			$data = array(
        		'lang' => $this->input->post('lang'),
				
				'user_id'=>$user_id,
		
		
		
    );

	
		$this->profile_model->upload_lang($data);
		
		 $this->session->set_flashdata('lang-msg', '<div class="alert alert-Success text-center">You have successfuly updated your Language </div>');
		 
		 $user_id = $this->uri->segment(3);
        
     
        
     
        
         redirect(base_url().'profile/add_lang/'.$user_id);
 
		
		
		
        }
    
	}
	
	public function delete_cert()
    {
      $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
       $user_id = $this->session->userdata('user_id'); 
        
        $this->profile_model->delete_cert($id);        
        redirect( base_url() . 'profile/profile/'.$user_id);        
    }
	
	public function delete_lang()
    {
      $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
       $user_id = $this->session->userdata('user_id'); 
        
        $this->profile_model->delete_lang($id);        
        redirect( base_url() . 'profile/profile/'.$user_id);        
    }
	


	
public function ext_details()
    {
		
        $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
		
		 $this->load->helper('url_helper');
		$this->load->database();
        
        $data['title'] = 'My Profile';        
        $data['user'] = $this->profile_model->get_user($user_id);
		
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
       $this->load->view('dashboard/extra-info', $data);
		
        $this->load->view('dashboard/template/footer');
 
        }	

public function extra()
    {
		
        $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
		
		 $this->load->helper('url_helper');
		$this->load->database();
        
        $data['title'] = 'My Profile';        
        $data['user'] = $this->profile_model->get_user($user_id);
		$data['cert'] = $this->profile_model->get_cert($user_id);
		$data['lang'] = $this->profile_model->get_lang($user_id);
        
  		$this->form_validation->set_rules('whour','Working Hour', 'required');
		$this->form_validation->set_rules('discip','Discipline', 'required');
       $this->form_validation->set_rules('state', 'Location', 'required');
       $this->form_validation->set_rules('bname','Bank Name', 'required');
		$this->form_validation->set_rules('accname','Account Name', 'required');
       $this->form_validation->set_rules('accnum', 'Account Number', 'required');
	
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
       $this->load->view('dashboard/extra-info', $data);
		
        $this->load->view('dashboard/template/footer');
 
        }
        else
		
        {
			
							
			$data = array(
        		'whour' => $this->input->post('whour'),
				'discipline' => $this->input->post('discip'),
				'location' => $this->input->post('state'),
				'bname' => $this->input->post('bname'),
				'accname' => $this->input->post('accname'),
				'accnum' => $this->input->post('accnum'),
					
    );

	
		$this->profile_model->update_extra($user_id,$data);
		
		 $this->session->set_flashdata('extra-msg', '<div class="alert alert-Success text-center">You have successfuly updated your profile </div>');
		 
		 $user_id = $this->uri->segment(3);
        
     redirect( base_url() . 'profile/ext_details/'.$user_id);   
 
		
		
		
        }
    
	}
	
	


public function verify_act()
    {
		
        $user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
		
		 $this->load->helper('url_helper');
		$this->load->database();
        
        $data['title'] = 'My Profile';        
        $data['user'] = $this->profile_model->get_user($user_id);
		
            $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
       $this->load->view('dashboard/verify-act', $data);
		
        $this->load->view('dashboard/template/footer');
 
        }
		
		
 public function proof()
    {
		$this->load->helper('form');
        $this->load->library('form_validation');
		
		 $this->load->helper('url_helper');
		$this->load->database();
		$user_id = $this->uri->segment(3);
        
        if (empty($user_id))
        {
            show_404();
        }
		 $data['user'] = $this->profile_model->get_user($user_id);
		 $data['cert'] = $this->profile_model->get_cert($user_id);
		 $data['lang'] = $this->profile_model->get_lang($user_id);
        $user_id = $this->uri->segment(3);
         $data['title'] = 'My Profile';     
		 
      		 $this->form_validation->set_rules('pic1', 'Document', 'callback_file_selected_test1');
	 		 $this->form_validation->set_rules('pic2', 'Document', 'callback_file_selected_test2'); 
        
        if($this->form_validation->run() == false){
         $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
       $this->load->view('dashboard/verify-act', $data);
        $this->load->view('dashboard/template/footer');
            
        }else{
          $config['upload_path'] = './proofs/';   // Directory 
	$config['allowed_types'] = 'jpg|jpeg|bmp|png';  //type of images allowed
	$config['max_size'] = '700';   //Max Size
	$config['min_width']             = 500;
	$new_name = rand(0000, 9999).$_FILES["pic1"]['name'];
	$config['file_name'] = $new_name;

	$this->load->library('upload', $config);  //File Uploading library
	$result=$this->upload->do_upload('pic1');  // input name which have to upload 
	$picture_upload=$this->upload->data();   //variable which store the path

//--------------End of Image File  Section------------------------//



//---------Thumbnail Image Upload Section Start Here -----------//
	rand(1000, 9999);
	$config2['upload_path'] = './proofs/';   // Directory 
	$config2['allowed_types'] = 'jpg|jpeg|bmp|png'; //type of images allowed
	$config2['max_size'] = '700';   //Max Size
	$config['min_width']             = 500;
	$new_name2 = rand(0000, 9999).$_FILES["pic2"]['name'];
	$config2['file_name'] = $new_name2;


	$this->upload->initialize($config2); //we can not use upload library again and again it will not initialize again and again so thats why i have used initialize 
	$result2=$this->upload->do_upload('pic2');  // File Name
	$proof_upload=$this->upload->data(); // store the name of the file 

//--------End of Thumbnail Upload Section-----------//

if(($result === FALSE) || ($result2 === FALSE))
{

    // handle error
      $this->session->set_flashdata('proof-msg', '<div class="alert alert-danger text-center">Failed!:  Both Images must be Below 700kb with Minimum width of 500 Pixels(px) and in JPG, PNG or JPEG format.</div>');
		 
		 $user_id = $this->uri->segment(3);
        
      redirect(base_url("profile/verify_act/".$user_id));  
}
else
{
    // continue


   
   // Here the database query to insert
$user_id = $this->uri->segment(3);
    $data = array(
   
    
    'pic1' => $proof_upload['file_name'],
    'pic2' => $picture_upload['file_name'],
    
    );

       $sql_ins= $this->profile_model->upload_proof($user_id,$data);
       if($sql_ins)
       {
         
{
		 $this->session->set_flashdata('proof-msg', '<div class="alert alert-success text-center">You have successfully upload your verification pictures </div>'); 
		
		 $user_id = $this->uri->segment(3);
        redirect(base_url("profile/verify_act/".$user_id));
      
}
	   }else{
		 $this->session->set_flashdata('proof-msg', '<div class="alert alert-danger text-center">Please The Image You are uploading must be below 700k. If error continues, contact the admin </div>'); 
		 
		  $user_id = $this->uri->segment(3);
		  
		  redirect(base_url("profile/verify_act/".$user_id));
		  } 
	   }
		}
		}
		
		
function file_selected_test1(){
$user_id = $this->uri->segment(3);
    $this->form_validation->set_message('file_selected_test1', 'Please select file.');
    if (empty($_FILES['pic1']['name'])) {
            $this->session->set_flashdata('proof-msg', '<div class="alert alert-danger text-center">Please upload your  personal Picture</div>'); 
		  redirect(base_url("profile/verify_act/".$user_id));
        }else{
            return true;
        } 
}


function file_selected_test2(){
$user_id = $this->uri->segment(3);
    $this->form_validation->set_message('file_selected_test2', 'Please select file.');
    if (empty($_FILES['pic2']['name'])) {
           $this->session->set_flashdata('proof-msg', '<div class="alert alert-danger text-center">Please Upload a Screnshot/scanned copy of Your ID</div>'); 
		 redirect(base_url("profile/verify_act/".$user_id));
        }else{
            return true;
        } 
}
	
	
}
