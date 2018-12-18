<?php


class Artiste extends CI_Controller{
    
    
    public function __construct(){
        parent::__construct();
        $this->load->model('ArtisteModel');
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
        $this->load->helper('url');
        $this->load->helper('html');
        
        if ($this->form_validation->run() == FALSE)
        {
                
                $nom = $this->input->post('nom');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $annee = $this->input->post('annee');
                $this->ArtisteModel->ajouterGroupe($nom,$email,$password,$annee);
            
                $data['subView'] = "inscriptionSuccess";
                $this->load->view('template',$data);
                
            
        }else{
                
        }
        
        
    }
    
    public function recherche(){
        
        $date = $this->input->post('date');
        
        $data['subView']='recherche';
        if(empty($date)){
            $data['empty'] = 1;
        }else{
            $data['empty'] = 0;
        }
        $data['salle'] = $this->ArtisteModel->salleDisponible($date);
        $this->load->view('template',$data);
    }   
}