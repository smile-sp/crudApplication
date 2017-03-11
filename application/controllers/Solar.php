<?php
class Solar extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('solar_model');
        $this->load->helper('url_helper');
    }
 
    public function index()
    {
        $data['solar'] = $this->solar_model->get_solar();
        $data['title'] = 'Solar System Information';
 
        $this->load->view('templates/header', $data);
        $this->load->view('solar/index', $data);
        $this->load->view('templates/footer');
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
            $this->solar_model->set_solar();
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
        
        $data['title'] = 'Edit a Solar item';        
        $data['solar_item'] = $this->solar_model->get_solar_by_id($id);
        
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
            $this->solar_model->set_solar($id);
            //$this->load->view('solar/success');
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
                
        $solar_item = $this->solar_model->get_solar_by_id($id);
        
        $this->solar_model->delete_solar($id);        
        redirect( base_url() . 'index.php/solar');        
    }
}
