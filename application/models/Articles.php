<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Articles extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {
        $this->db->insert('articles', $data);
        return $this->db->insert_id();
    }

    public function get_all_articles() {
        $this->db->from('articles');
        $this->db->where('deleted', 0);
        return $this->db->get();
    }
    
    public function get_article_data($id) {
        $this->db->from('articles');
        $this->db->where('id',$id);
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result()[0];
        }else{
            return FALSE;
        }
    }

    public function publish_unpublish_article($id, $status = 1) {
        $data = array('published'=>$status);
        $this->db->where('id',$id);
        $this->db->update('articles',$data);
    }
    
   

}
