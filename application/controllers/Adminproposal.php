<?php
class Adminproposal extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('proposal_model');
				 $this->load->model('Account_Model');
				$this->load->model('profile_model');
                $this->load->helper('url_helper');
				$this->load->helper('text');
				$this->load->library('form_validation');
				$this->load->library('session');
				$sess_id = $this->session->userdata('admin_id');

   if(empty($sess_id))
   {
        redirect(base_url().'account/admin');

   }			
				
        }

       
		



public function proposal()
    {
		 $user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
        $data['prop'] = $this->proposal_model->get_proposal();
        $data['title'] = 'My Proposal';
 
        $this->load->view('dashboard/template/header', $data);
		$this->load->view('dashboard/template/nav');
		
        $this->load->view('dashboard/proposals', $data);
		
        $this->load->view('dashboard/template/footer');
    }
	
	
	
public function view_proposal()
    {
		 $proposal_id = $this->uri->segment(3);
        
        if (empty($proposal_id))
        {
            show_404();
        }
		 $user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		
        $data['proposal'] = $this->proposal_model->get_proposal_by_id($proposal_id);
        $data['title'] = 'View Proposals';
 
        $this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/nav');
		
        $this->load->view('admin/proposal-details', $data);
	
        $this->load->view('admin/templates/footer');
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
	



public function edit_proposal()
    {
		  $proposal_id = $this->uri->segment(3);
        
        if (empty($proposal_id))
        {
            show_404();
        }
		 
		
        $this->form_validation->set_rules('pbudget','Proposal Budget', 'required');
        $this->form_validation->set_rules('duration','Duration', 'required');
		$this->form_validation->set_rules('proposal','Project Proposal', 'required');
        
	
	
        if ($this->form_validation->run() === FALSE)
        {
		  $data['title'] = 'Edit Proposal';
		$user_id = $this->session->userdata('user_id');
		$data['user'] = $this->profile_model->get_user($user_id);
		
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
		
		
		
		
		
 		 $this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Successfully Approved this Proposal</div>');
		redirect(base_url().'pay/getAuthURL/'.$proposal_id);	
			
		 
    }
	
	public function user_request()
    {
        $data['order'] = $this->booking_model->get_user_booking();
        $data['title'] = 'Requeted Bookings';
 
        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
        $this->load->view('dashboard/pages/user_order', $data);
		
        $this->load->view('dashboard/templates/footer');
    }


public function view_booking()
    {
		 $book_id = $this->uri->segment(3);
        
        if (empty($book_id))
        {
            show_404();
        }
		
        $data['book'] = $this->booking_model->get_booking_by_id($book_id);
        $data['title'] = 'View Booking';
 
        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
        $this->load->view('dashboard/pages/view_booking', $data);
		$this->load->view('dashboard/templates/side3');
        $this->load->view('dashboard/templates/footer');
    }


public function approve2()
    {
		 $book_id = $this->uri->segment(3);
        
        if (empty($book_id))
        {
            show_404();
        }
		 $data['book'] = $this->booking_model->get_booking_by_id($book_id);
       	$this->booking_model->approve_booking($book_id);
        $data['title'] = 'View Orders';
 		$this->session->set_flashdata('approve_msg', '<div class="alert alert-success text-center">Successfully Approved the date</div>');
        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
        $this->load->view('dashboard/pages/view_order', $data);
		$this->load->view('dashboard/templates/side2');
        $this->load->view('dashboard/templates/footer');
		
		
		
		 
    }


public function new_request()
    {
		 $book_id = $this->uri->segment(3);
        
        if (empty($book_id))
        {
            show_404();
        }
		
        $this->form_validation->set_rules('to','Check In', 'required');
        $this->form_validation->set_rules('from','Check Out', 'required');
        
	
	
        if ($this->form_validation->run() === FALSE)
        {
		
		$data['book'] = $this->booking_model->get_booking_by_id($book_id);		
		 $this->session->set_flashdata('new_request', '<div class="alert alert-danger text-center">An error occured, Please try again or contact the admin </div>');
            $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
        $this->load->view('dashboard/pages/view_booking','.php/'.$book_id, $data);
		$this->load->view('dashboard/templates/side3');
        $this->load->view('dashboard/templates/footer');
 
        }
        else
		
        {
		
			 $data['title'] = 'View Booking';	
			
            $this->booking_model->new_request_booking($book_id);
            //$this->load->view('news/success');
           $this->session->set_flashdata('new_request', '<div class="alert alert-success text-center">Successfully Requested New Booking</div>');
		$data['book'] = $this->booking_model->get_booking_by_id($book_id);
        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
         $this->load->view('dashboard/pages/view_booking','.php/'.$book_id, $data);
		$this->load->view('dashboard/templates/side3');
        $this->load->view('dashboard/templates/footer');
		 
       
        }
	}



public function confirm()
    {
		 $book_id = $this->uri->segment(3);
        
        if (empty($book_id))
        {
            show_404();
        }
		 $data['book'] = $this->booking_model->get_booking_by_id($book_id);
       	$this->booking_model->confirm_booking($book_id);
        $data['title'] = 'Make Payment';
 		$this->session->set_flashdata('confirm_booking', '<div class="alert alert-success text-center">Successfully confirmed booking</div>');
        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
        $this->load->view('dashboard/pages/proccess', $data);
        $this->load->view('dashboard/templates/footer');
			
		 
    }





	
	



}