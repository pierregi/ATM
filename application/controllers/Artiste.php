<?php


class Artiste extends CI_Controller{
    
    
    public function __construct(){
        parent::__construct();
    }
    
    public function home(){
        $data['subView'] = "home";
        $this->load->vars($data);   
        $this->load->view('template');
    }
    
    
    public function index(){
        
        $this->load->helper('url');
        $this->load->helper('form');
        
        $data['subView'] = "inscription";
        $this->load->vars($data);   
        $this->load->view('template');
        
    }
    
    public function inscription(){
        
        $this->load->library('form_validation');
        
        // Récupération des variables POST
        
        $nom = $this->input->post('nom');
        
        $email = $this->input->post('email');
        
        $password = $this->input->post('password');
        
        $passwordVerif = $this->input->post('passwordVerif');
        

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('inscriptionSuccess');
        }else{
                // Error
        }
        
        
    }
    
    
}