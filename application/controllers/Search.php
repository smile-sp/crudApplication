<?php
class Search extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('search_model');
        $this->load->helper('url_helper');
    }
 
    public function index()
    {
        //$data['news'] = $this->search_model->get_news();
        $data['title'] = 'Solar System Search Criteria';
 
        $this->load->view('templates/header', $data);
        $this->load->view('search/index', $data);
        $this->load->view('templates/javascript');
        $this->load->view('templates/footer');
    }
 
    public function searchdata()
    {
        
        
        $searchFor = $this->input->post('searchFor');
        $searchTo = $this->input->post('searchTo');
        $searchText = $this->input->post('searchText');


        $data['search']=$this->search_model->getData($searchFor,$searchTo,$searchText);

        if(isset($data['search'])){
            $this->load->view('search/display', $data);    
        }
        
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $data['title'] = 'Create a Solar item';
 
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('size', 'Size', 'required');
        $this->form_validation->set_rules('cordx', 'Co-ordinateX', 'required');
        $this->form_validation->set_rules('cordy', 'Co-ordinateY', 'required');
        $this->form_validation->set_rules('cordz', 'Co-ordinateZ', 'required');
        
        $data['sungroups'] = $this->solar_model->getAllSun();
        $data['planetgroups'] = $this->solar_model->getAllPlanet();
        //print_r($data);
       //die;
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('solar/create',$data);
            $this->load->view('templates/footer');
 
        }
        else
        {
            $this->solar_model->set_news();
            $this->load->view('templates/header', $data);
            $this->load->view('solar/success');
            $this->load->view('templates/footer');
        }
    }
    
    public function edit()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['title'] = 'Edit a news item';        
        $data['news_item'] = $this->solar_model->get_news_by_id($id);
        
        $data['sungroups'] = $this->solar_model->getAllSun();
        $data['planetgroups'] = $this->solar_model->getAllPlanet();
        $data['solarplanetgroups'] = $this->solar_model->getSolarPlanet($id);



        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('size', 'Size', 'required');
        $this->form_validation->set_rules('cordx', 'Co-ordinateX', 'required');
        $this->form_validation->set_rules('cordy', 'Co-ordinateY', 'required');
        $this->form_validation->set_rules('cordz', 'Co-ordinateZ', 'required');
 

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('solar/edit', $data);
            $this->load->view('templates/footer');
 
        }
        else
        {
            $this->solar_model->set_news($id);
            //$this->load->view('news/success');
            redirect( base_url() . 'index.php/solar');
        }
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
        $news_item = $this->solar_model->get_news_by_id($id);
        
        $this->solar_model->delete_news($id);        
        redirect( base_url() . 'index.php/solar');        
    }
}
