<?php
class Sun extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sun_model');
        $this->load->helper('url_helper');
    }
 
    public function index()
    {
        $data['sun'] = $this->sun_model->get_sun();
        $data['title'] = 'Sun System Information';
 
        $this->load->view('templates/header', $data);
        $this->load->view('sun/index', $data);
        $this->load->view('templates/footer');
    }
 
   
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
 
        $data['title'] = 'Create a Sun item';
 
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('size', 'Size', 'required');
        $this->form_validation->set_rules('cordx', 'Co-ordinateX', 'required');
        $this->form_validation->set_rules('cordy', 'Co-ordinateY', 'required');
        $this->form_validation->set_rules('cordz', 'Co-ordinateZ', 'required');
 
        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('sun/create');
            $this->load->view('templates/footer');
 
        }
        else
        {
            $this->sun_model->set_sun();
            $this->load->view('templates/header', $data);
            $this->load->view('sun/success');
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
        
        $data['title'] = 'Edit a sun item';        
        $data['sun_item'] = $this->sun_model->get_sun_by_id($id);
        
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('size', 'Size', 'required');
        $this->form_validation->set_rules('cordx', 'Co-ordinateX', 'required');
        $this->form_validation->set_rules('cordy', 'Co-ordinateY', 'required');
        $this->form_validation->set_rules('cordz', 'Co-ordinateZ', 'required');
 

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('sun/edit', $data);
            $this->load->view('templates/footer');
 
        }
        else
        {
            $this->sun_model->set_sun($id);
            //$this->load->view('sun/success');
            redirect( base_url() . 'index.php/sun');
        }
    }
    
    public function delete()
    {
        $id = $this->uri->segment(3);
        
        if (empty($id))
        {
            show_404();
        }
                
        $sun_item = $this->sun_model->get_sun_by_id($id);
        
        $this->sun_model->delete_sun($id);        
        redirect( base_url() . 'index.php/sun');        
    }
}
