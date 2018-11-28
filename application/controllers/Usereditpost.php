<?php
class Usereditpost extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usereditpost_model');
		$this->load->model('pages_model');
		 $this->load->model('Account_Model');
        $this->load->helper('url_helper');
		$this->load->helper('text');
		$this->load->database();
		$this->load->library('session');
		 if(!$this->session->userdata['user_id'])
    {
        redirect(base_url().'account/login');
    }
	
	
    }
 
    public function edit_userpost()
    {
		
		$user_id = $this->session->userdata('user_id');
	 $status= $this->Account_Model->check_status($user_id);
	 		
		 if($status !='verified'){
			 
			  redirect(base_url().'account/proof');
		 }
		
		
		
        $data['places'] = $this->usereditpost_model->get_places();
        $data['title'] = 'Edit Listing';
 
        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
        $this->load->view('dashboard/pages/edit_userpost', $data);
		$this->load->view('dashboard/templates/side');
        $this->load->view('dashboard/templates/footer');
    }
 
    
   
    
    public function useredit()
    {
		
        $post_id = $this->uri->segment(3);
        
        if (empty($post_id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('pages_model');
		 $this->load->helper('url_helper');
		$this->load->database();
        
        $data['title'] = 'Edit Your Listing';        
        $data['places_item'] = $this->usereditpost_model->get_places_by_id($post_id);
        
         $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('price', 'Price', 'required');
	$this->form_validation->set_rules('description', 'Description', 'required');
	$this->form_validation->set_rules('address', 'Address', 'required');
	$this->form_validation->set_rules('location','Location','required');
	$this->form_validation->set_rules('t_space');
	$this->form_validation->set_rules('beds');
	$this->form_validation->set_rules('bathrooms');
	$this->form_validation->set_rules('t_space');
	$this->form_validation->set_rules('avail');
	$this->form_validation->set_rules('amenity1');
	$this->form_validation->set_rules('amenity2');
	$this->form_validation->set_rules('amenity3');
	$this->form_validation->set_rules('amenity4');
	$this->form_validation->set_rules('rules1');
	$this->form_validation->set_rules('rules2');
	$this->form_validation->set_rules('rules3');
	$this->form_validation->set_rules('rules4');
	
	
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
        $this->load->view('dashboard/pages/useredit', $data);
		
        $this->load->view('dashboard/templates/footer');
 
        }
        else
		
        {
			//file upload code 
			//set file upload settings 
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['overwrite'] = false;
			$config['max_size']             = 700;
			$config['min_width']             = 1200;
			$new_name = rand(0000, 9999).$_FILES["pic_file"]['name'];
			$config['file_name'] = $new_name; 

			$this->load->library('upload', $config);
			
				
							
			if ( ! $this->upload->do_upload('pic_file')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
        $this->load->view('dashboard/pages/new_userpost', $error);
		$this->load->view('dashboard/templates/side');
        $this->load->view('dashboard/templates/footer');
			}else{
	$this->upload->do_upload('pic_file');			
	$image=$this->upload->data();	
				
			 
        $config2['upload_path'] = './uploads/';   // Directory 
	$config2['allowed_types'] = 'jpg|jpeg|bmp|png'; //type of images allowed
	$config2['max_size']             = 700;
	$config2['min_width']             = 1200;
	$new_name2 = rand(0000, 9999).$_FILES["pic_file1"]['name'];
	$config2['file_name'] = $new_name2;


	$this->upload->initialize($config2); //we can not use upload library again and again it will not initialize again and again so thats why i have used initialize 
	$this->upload->do_upload('pic_file1');  // File Name
	$image1=$this->upload->data(); // store the name of the file 
	
	
	
	
	$config3['upload_path'] = './uploads/';   // Directory 
	$config3['allowed_types'] = 'jpg|jpeg|bmp|png'; //type of images allowed
	$config3['max_size']             = 700;
	$config3['min_width']             = 1200;
	$new_name3 = rand(0000, 9999).$_FILES["pic_file2"]['name'];
	$config3['file_name'] = $new_name3;


	$this->upload->initialize($config3); //we can not use upload library again and again it will not initialize again and again so thats why i have used initialize 
	$this->upload->do_upload('pic_file2');  // File Name
	$image2=$this->upload->data(); // store the name of the file 

		
		
   
	
	
	
	
	$this->load->helper('url');
 
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
	
 
    $data = array(
        'title' => $this->input->post('title'),
          'slug' => $slug,
		'address' => $this->input->post('address'),
        'price' => $this->input->post('price'),
		'location' => $this->input->post('location'),
		'rooms' => $this->input->post('rooms'),
		't_space' => $this->input->post('t_space'),
		'beds' => $this->input->post('beds'),
		'description' => $this->input->post('description'),
		'bathrooms' => $this->input->post('bathrooms'),
		'avail' => $this->input->post('avail'),
		'image' => $image['file_name'],
		'image1' => $image1['file_name'],
		'image2' => $image2['file_name'],
		'amenity1'=>$this->input->post('amenity1'),
		'amenity2'=>$this->input->post('amenity2'),
		'amenity3'=>$this->input->post('amenity3'),
		'amenity4'=>$this->input->post('amenity4'),
		'rules1'=>$this->input->post('rules1'),
		'rules2'=>$this->input->post('rules2'),
		'rules3'=>$this->input->post('rules3'),
		'rules4'=>$this->input->post('rules4'),
		
		
		
		
    );


		$this->usereditpost_model->set_places($post_id,$data);
    

    
				
				
		
				

				//store pic data to the db
				


			 $data['title'] = 'Create New Listing';	
		
		$this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
        $this->load->view('dashboard/pages/success', $data);
		
        $this->load->view('dashboard/templates/footer');
			}
			
			}
	}
	
	
    public function delete()
    {
        $post_id = $this->uri->segment(3);
        
        if (empty($post_id))
        {
            show_404();
        }
                
        $news_item = $this->usereditpost_model->get_places_by_id($post_id);
        
        $this->usereditpost_model->delete_places($post_id);        
        redirect( base_url() . 'usereditpost/edit_userpost');        
    }
}
