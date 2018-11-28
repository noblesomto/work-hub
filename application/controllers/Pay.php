<?php
defined('BASEPATH') OR exit("Access Denied");//remove this line if not using with CodeIgniter


class Pay extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('proposal_model');
		$this->load->model('profile_model');
		 $this->load->model('Account_Model');
		$this->load->helper('url');
		$this->load->library('cart');
		$this->load->helper('url_helper');
		$this->load->helper('text');
		$this->load->library('session');
		$this->load->database();
        $this->load->library('paystack', [
            'secret_key'=>'sk_test_5849ab472dddf97ae2cc68fc64ad75f94115eca2', 
            'public_key'=>'pk_test_414e53a69953496ffb50b2d9e37e146dfef92342']);
    }
	
    
  
    /**
     * Initialise a transaction by getting only the authorised URL returned
     */
    public function getAuthURL(){
		
		
		
		
		$data['title'] = 'Make Payment';
		
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model');
		$this->load->library('email');
		$proposal_id = $this->uri->segment(3);
		  $user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id); 
		$data['message'] = $this->Account_Model->get_message();
		$data['proposal'] = $this->proposal_model->get_proposal_by_id($proposal_id);
       
        $this->form_validation->set_rules('amount','Amount', 'trim|required');
       
      
		
		
			
        if($this->form_validation->run() == false){
            		
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/invoice', $data);
		
        $this->load->view('dashboard/template/footer');
            
        }else{
		
      
                
  $user_id = $this->session->userdata('user_id');   
//get customer email
$email = $this->session->userdata('email'); 
$amount = $this->input->post('amount');

$length = 8;

$order_id = substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);

 $data = array(
		 'title' => $this->input->post('title'),
        'amount' => $this->input->post('amount'),
		'project_id' => $this->input->post('project_id'),
		'proposal_id' => $this->input->post('proposal_id'),
		'proposer' => $this->input->post('proposer'),
		'user_id' => $user_id,
		'payment_status' => "pending",
		'order_id'=>$order_id,
		'date' => date("Y-m-d H:i:s"),
		

    );
$proposer = $this->input->post('proposer');
$proposal_id = $this->input->post('proposal_id');		
	$this->proposal_model->create_invoice($data);	
		
		
		




$amount2 = $amount * 100;
 
			
            //init($ref, $amount_in_kobo, $email, $metadata_arr=[], $callback_url="", $return_obj=false)
        $url = $this->paystack->init($order_id, $amount2, $email, base_url('pay/callback/'.$proposer.'/'.$proposal_id), FALSE);
        
        //$url ? header("Location: {$url}") : "";
        $url ? redirect($url) : "";   
            
        

		}
    }
    
    
   
    public function verify($ref){
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model');
		$this->load->library('email');
		
        //verifyTransaction($ref) will return an array of verification details or FALSE on failure
        $ver_info = $this->paystack->verifyTransaction($ref);
        
        //do something if verification is successful e.g. save authorisation code
        if($ver_info && ($ver_info->status = TRUE) && ($ver_info->data->status == "success")){
            $auth_code = $ver_info->data->authorization->authorization_code;
            
            //do something with $auth_code. $auth_code can be used to charge the customer next time
           date_default_timezone_set('Africa/Lagos');
			$pay_date = date("Y-m-d H:i:s");
			
			$data = array(
                
				'payment_status'=>"paid",
			
				'pay_date'=>$pay_date,
				'project_status'=>"pending",
            );
			
			 
			
			$this->proposal_model->update_order($ref,$data);
			$email = $this->session->userdata('email');
		
		$this->proposal_model->send_email_payment($email);
		
			$this->session->set_flashdata('success-msg', '<div class="alert alert-success text-center">Your Payment was successful</div>');
			
		$data['title']='Payment Successful';
		 $user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id); 
		$data['message'] = $this->Account_Model->get_message();
		
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/payment-success', $data);
		
        $this->load->view('dashboard/template/footer');
				
        }
        
        else{
            //do something else
			
		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Your Payment was not successful. Please Try again later</div>');
		$data['user']=$this->Account_Model->get_user();
        $data['title'] = 'Payment Details';
 
 		$data['cart']  = $this->cart->contents();
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		
        $this->load->view('payment', $data);
		
        $this->load->view('templates/footer');	
        }
    }
    
   
    
    public function callback(){
		$proposer = $this->uri->segment(3);
		$proposal_id = $this->uri->segment(4);
        $trxref = $this->input->get('trxref', TRUE);
        $ref = $this->input->get('reference', TRUE);
        
        //do something e.g. verify the transaction
        if($trxref === $ref){
            $this->verify($trxref);
			 
			 
			$data = array(
                
				'status'=>"confirmed",
			
            );
			
			 
			
			$this->proposal_model->update_proposal_status($proposal_id,$data); 
			
			$data['proj_id'] = $this->proposal_model->get_project_by_proposal($proposal_id); 
			$project_id = $data['proj_id']['project_id'];
			$project_title = $data['proj_id']['title'];
			$this->sendemail($proposer,$project_title);
			$data2 = array(
                
				'project_status'=>"ongoing",
			
            );
			
			$this->proposal_model->update_project_status($project_id,$data2); 
        }
    }
    
  public function sendemail($proposer,$project_title){
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
       
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Account_Model');
		$this->load->model('profile_model');
		$this->load->library('email');
		
	$data['poster'] = $this->profile_model->get_poster($proposer);
	$email = $data['poster']['email'];	
	$this->proposal_model->send_email_proposal_approved($email,$project_title);
  }
    
  
}