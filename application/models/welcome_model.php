
<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class welcome_model extends CI_Model{
    public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get("post");
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function get_total() 
    {
        return $this->db->count_all("post");
    }
  
    
}
?>