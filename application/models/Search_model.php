<?php
class Search_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }
    
    public function getData($searchFor,$searchTo,$txtcriteria)
    {

        
       $query = $this->db->query("Select * from  ".$searchFor."  where  ".$searchTo."   like '%$txtcriteria%'");

       //echo $query;
        if ($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else{
            echo 'No Record';
        }
       // $query = $this->db->get_where('solar', array('slug' => $slug));
       // return $query->row_array();
    }
    
   
}
