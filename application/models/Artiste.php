<?php


class Model_artiste extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    
    public function ajoutArtiste($artiste){
        $this->db->insert('ARTISTE', $artiste);
    }
    
    
    
    public function xss_test($string){
        return $this->security->xss_clean($string, TRUE)!==FALSE;
    }
}