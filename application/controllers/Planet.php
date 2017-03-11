<?php
class Planet extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('planet_model');
        $this->load->helper('url_helper');
    }
 
    public function index()
    {
        $data['planets'] = $this->planet_model->get_planets();
        $data['title'] = 'Planet System Information';
 
        $this->load->view('templates/header', $data);
        $this->load->view('planet/index', $data);
        $this->load->view('templates/footer');
    }
 
    
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $data['title'] = 'Create a Planet item';
 
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('size', 'Size', 'required');
        $this->form_validation->set_rules('cordx', 'Co-ordinateX', 'required');
        $this->form_validation->set_rules('cordy', 'Co-ordinateY', 'required');
        $this->form_validation->set_rules('cordz', 'Co-ordinateZ', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('planet/create');
            $this->load->view('templates/footer');
 
        }
        else
        {
            $this->planet_model->set_planet();
            $this->load->view('templates/header', $data);
            $this->load->view('planet/success');
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
        
        $data['title'] = 'Edit a Planet item';        
        $data['planet_item'] = $this->planet_model->get_planet_by_id($id);
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('size', 'Size', 'required');
        $this->form_validation->set_rules('cordx', 'Co-ordinateX', 'required');
        $this->form_validation->set_rules('cordy', 'Co-ordinateY', 'required');
        $this->form_validation->set_rules('cordz', 'Co-ordinateZ', 'required');
 

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('planet/edit', $data);
            $this->load->view('templates/footer');
 
        }
        else
        {
            $this->planet_model->set_planet($id);
            //$this->load->view('news/success');
            redirect( base_url() . 'index.php/planet');
        }
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
        $planet_item = $this->planet_model->get_planet_by_id($id);
        
        $this->planet_model->delete_planet($id);        
        redirect( base_url() . 'index.php/planet');        
    }
}
