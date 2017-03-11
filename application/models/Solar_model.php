<?php
class Solar_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_solar()
    {
        //if ($slug === FALSE)
        //{
       $query = $this->db->query("Select s.*,so.name as sunname,sp.planet_id,group_concat(p.Name) as planetName from  solar s left join sun so on  s.id=so.id
LEFT JOIN solar_planet sp on s.id=sp.solar_id
LEFT JOIN planet p on sp.planet_id=p.id
 group by s.id");
            //$query = $this->db->get('solar');
            return $query->result_array();
        //}
 
       // $query = $this->db->get_where('solar', array('slug' => $slug));
       // return $query->row_array();
    }
    
    public function get_solar_by_id($id = 0)
    {
        if ($id === 0)
        {
            $query = $this->db->get('solar');
            return $query->result_array();
        }
 
        $query = $this->db->get_where('solar', array('id' => $id));
        return $query->row_array();
    }
    
    public function set_solar($id = 0)
    {
        $this->load->helper('url');
 
       // $slug = url_title($this->input->post('title'), 'dash', TRUE);
 		
        $data = array(
            'Name' => $this->input->post('title'),
            'Size' => $this->input->post('size'),
            'CoordinateX' => $this->input->post('cordx'),
            'CoordinateY' => $this->input->post('cordy'),
            'CoordinateZ' => $this->input->post('cordz'),
            'sunId' => $this->input->post('sunId')
        );



       if ($id == 0) {
            $this->db->insert('solar', $data);
            $solarId = $this->db->insert_id();
           
            $planets=$this->input->post('planet[]');
            for ($i=0; $i < count($planets) ; $i++) { 
                $dataplanet = array(
                    'planet_id' => $planets[$i],
                    'solar_id' => $solarId
                );
                 $this->db->insert('solar_planet', $dataplanet);
            }
            return;


        } else {
            //updtion insolar
            $this->db->where('id', $id);
            $this->db->update('solar', $data);
            

            $this->db->where('solar_id', $id);
            $this->db->delete('solar_planet');

            //$records = array();

            $planets=$this->input->post('planet[]');
            for ($i=0; $i < count($planets) ; $i++) { 
                $dataplanet = array(
                    'planet_id' => $planets[$i],
                    'solar_id' => $id
                );
                 $this->db->insert('solar_planet', $dataplanet);
            }
            return ;
        }

    }
    
    public function delete_solar($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('solar');
    }
    public function getAllSun()
    {
            
            $query = $this->db->query('SELECT id,Name FROM sun');

            foreach ($query->result() as $row)
            {
                return $query->result_array();
            }

           
    }

    public function getAllPlanet()
    {
            
            $query = $this->db->query('SELECT id,Name FROM planet');

            foreach ($query->result() as $row)
            {
                return $query->result_array();
            }

           
    }

     public function getSolarPlanet($id)
    {
            
            $query = $this->db->get_where('solar_planet', array('solar_id' => $id));
            foreach ($query->result() as $row)
            {
                return $query->result_array();
            }

           
    }
}
