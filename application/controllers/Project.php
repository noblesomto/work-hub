<?php
class Project extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('home_model');
				$this->load->model('project_model');
                $this->load->helper('url_helper');
				$this->load->library('session');
				$this->load->library('form_validation');
				$this->load->helper('text');
				$this->load->library('javascript');
				 
        }

       

        public function project($slug = NULL)
        {
			
               $data['projects'] = $this->home_model->get_projects($slug);
		$project_id = $this->uri->segment(2);	
        if (empty($data['projects']))
        {
                show_404();
        }
		
		$data['proposal'] = $this->project_model->get_proposals($project_id);
		$data['featured'] = $this->home_model->featured_projects();
		$data['comment'] = $this->project_model->get_comment($project_id);
		
		
        $data['title'] = $data['projects']['title'].' - Axiatag';

        $this->load->view('template/header', $data);
		$this->load->view('template/nav');
        $this->load->view('project-details', $data);
        $this->load->view('template/footer');
		
		
		
        }
		


		
		
		 public function popular()
        {
               
         $location = $this->uri->segment(3);
        
        if (empty($location))
        {
            show_404();
        }
		
		$data['places'] = $this->places_model->get_location($location);
        $data['title'] = 'Places Popular locations | '.$location;

        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('templates/sidebar');
        $this->load->view('popular', $data);
        $this->load->view('templates/footer');
		
		
		
        }
	
    
	
	public function rating($slug = NULL)
    {
		 if(!$this->session->userdata['user_id'])
    {
		 $this->session->set_flashdata('comm_msg', '<div class="alert alert-danger text-center">You must login to comment </div>');
		 $data['places_item'] = $this->home_model->get_places($slug);
		 $post_id = $this->uri->segment(3);
        redirect(base_url().'places/'.$post_id.'/#com-title');
		
		
		
    }else{
        $this->form_validation->set_rules('comment','Comment', 'required');
        $this->form_validation->set_rules('count2');
		 $this->form_validation->set_rules('post_id');
        
	
	
        if ($this->form_validation->run() === FALSE)
        {
		$post_id = $this->uri->segment(3);
		$data['places_item'] = $this->home_model->get_places($slug);		
		 $this->session->set_flashdata('rate_msg', '<div class="alert alert-danger text-center">An error occured, Please try commenting again </div>');
            $data['title'] = $data['places_item']['title'];
		$data['rate'] = $this->places_model->get_rating_by_id($post_id);
		$data['rating'] = $this->places_model->get_rating_number($post_id);
		$data['rate_total'] = $this->places_model->get_rating_total($post_id);
		
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('places', $data);
        $this->load->view('templates/footer');
 
        }
        else
		
        {
		
			 	
			
            $this->places_model->set_rating();
            //$this->load->view('news/success');
           $this->session->set_flashdata('rate_msg', '<div class="alert alert-success text-center">Successfully Made your comment</div>');
		$data['places_item'] = $this->home_model->get_places($slug);
        $data['title'] = $data['places_item']['title'];
		
		$post_id = $this->uri->segment(3);
		$data['rate'] = $this->places_model->get_rating_by_id($post_id);
		$data['rating'] = $this->places_model->get_rating_number($post_id);
		$data['rate_total'] = $this->places_model->get_rating_total($post_id);
		
		
		$parameters = array(
        'post_id' => $this->uri->segment(3),
        'rate'=> $this->places_model->get_rating_total($post_id),
		'rate_no'=>$this->places_model->get_rating_number($post_id),
    );
		
		$this->places_model->set_rate($parameters);
		
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
        $this->load->view('places', $data);
        $this->load->view('templates/footer');
		 
		}
        }
    }
	
	
	public function view_order()
    {
		 $book_id = $this->uri->segment(3);
        
        if (empty($book_id))
        {
            show_404();
        }
		
        $data['book'] = $this->booking_model->get_booking_by_id($book_id);
        $data['title'] = 'View Orders';
 
        $this->load->view('dashboard/templates/header', $data);
		$this->load->view('dashboard/templates/nav');
		
        $this->load->view('dashboard/pages/view_order', $data);
		$this->load->view('dashboard/templates/side2');
        $this->load->view('dashboard/templates/footer');
    }
    
    
}