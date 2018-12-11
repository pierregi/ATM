<?php


class Artiste extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    
    public function ajoutArtiste($artiste){
        $this->db->insert('ARTISTE', $artiste);
    }
    
    
    
    
}