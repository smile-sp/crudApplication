<?php
class Sun_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_sun()
    {
        //if ($slug === FALSE)
        //{
            $query = $this->db->get('sun');
            return $query->result_array();
        //}
 
       // $query = $this->db->get_where('sun', array('slug' => $slug));
       // return $query->row_array();
    }
    
    public function get_sun_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('sun');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('sun', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_sun($id = 0)
    {
        $this->load->helper('url');
 
       // $slug = url_title($this->input->post('title'), 'dash', TRUE);
 		
        $data = array(
            'Name' => $this->input->post('title'),
            'Size' => $this->input->post('size'),
            'CoordinateX' => $this->input->post('cordx'),
            'CoordinateY' => $this->input->post('cordy'),
            'CoordinateZ' => $this->input->post('cordz')
        );

       if ($id == 0) {
            return $this->db->insert('sun', $data);
        } else {
            $this->db->where('id', $id);
            return $this->db->update('sun', $data);
        }
    }
    
    public function delete_sun($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('sun');
    }
}
