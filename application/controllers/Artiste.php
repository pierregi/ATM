<?php


class Artiste extends CI_Controller{
    
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $this->load->view('template');
    }
    
    public function recherche(){
        $this->load->view('recherche');
    }   
}