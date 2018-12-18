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
        
        $data['nom'] = $this->label('nom');
        $data['email'] = $this->label('email');
        $data['password'] = $this->label('password');
        $data['password2'] = $this->label('password2');      
        $data['annee'] = $this->label('annee');  
        
        $data['subView'] = "inscription";
        $this->load->vars($data);   
        $this->load->view('template');
        
    }
    
    public function inscription(){
        
        $this->load->model('ArtisteModel');
        $this->form_validation->set_rules(
            'nom', 'Le nom',
            array(
                'required',
                'is_unique[groupe.nom]',
                'max_length[60]',
                array(
                    'xss_callable',
                    array($this->ArtisteModel,'xss_test')
                )
            ),
            array(
                'is_unique'     => 'Ce nom de groupe existe déjà.',
            )
        );
        $this->form_validation->set_rules(
            'email','l\'e-mail',
            array(
                'required',
                'valid_email',
                'is_unique[users.email]',
                'max_length[120]',
                array(
                    'xss_callable',
                    array($this->ArtisteModel,'xss_test')
                )
            ),
            array(
                'valid_email'       => 'Il faut rentrer un email valide.'
            )
        );
        $this->form_validation->set_rules(
            'annee', 'L\'année',
            array(
                'required',
                'exact_length[4]',
                'integer'
            ),
            array(
                'is_unique'     => 'Ce nom de groupe existe déjà.',
                'exact_length'  => '{field} doit contenir {param} chiffres.',
                'integer'       => '{field} doit être un entier.' 
            )
        );
        $this->form_validation->set_rules(
            'password','Le password',
            array(
                'required',
                'matches[password2]',
                'min_length[4]',
                'max_length[50]'
            ),
            array(
                'matches'       => 'Les mots de passes ne correspondent pas.'
            )
        );
        $this->form_validation->set_rules(
            'password2','La confirmation du password',
            array(
                'required',
                'min_length[4]',
                'max_length[50]'
                )                
        );
        $this->form_validation->set_message(
            array(
                'required'      =>  '%s est obligatoire',
                'min_length'    =>  'field} doit contenir {param} caractère minimum',
                'max_length'    =>  '{field} ne peut contenir plus de {param} caractères',
                'xss_callable' => "Balise script interdite"
            )
        );
        
        // Récupération des variables POST
        
        
        

        if ($this->form_validation->run() === FALSE)
        {
            $data['nom'] = $this->label('nom');
            $data['email'] = $this->label('email');
            $data['password'] = $this->label('password');
            $data['password2'] = $this->label('password2');
            $data['annee'] = $this->label('annee');  
            $data['subView'] = "inscription";
            $this->load->view('template',$data);
        }else{
                $nom = $this->input->post('nom');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $annee = $this->input->post('annee');
                $this->ArtisteModel->ajouterGroupe($nom,$email,$password,$annee);
            
                $data['subView'] = "inscriptionSuccess";
                $this->load->view('template',$data);
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
    
    public function label($id){
        $res="";
        if(null!=form_error($id)){
            $res = form_error($id, 'placeholder="', '"');
        }
        return $res;
    }
}