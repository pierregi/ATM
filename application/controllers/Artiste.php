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
        
        
        $this->form_validation->set_rules(
            'nom', 'nom',
            array(
                'required',
                'is_unique[groupe.nom]',
                'max_length[50]',
                array(
                    'xss_callable',
                    array($this->Artiste,'xss_test')
                )
            ),
            array(
                'is_unique'     => 'Ce nom de groupe existe déjà.',
            )
        );
        $this->form_validation->set_rules(
            'email','e-mail',
            array(
                'required',
                'valid_email',
                'max_length[50]',
                array(
                    'xss_callable',
                    array($this->Artiste,'xss_test')
                )
            ),
            array(
                'valid_email'       => 'Ilfaut rentrer un email.'
            )
        );
        $this->form_validation->set_rules(
            'password','password',
            array(
                'required',
                'matches[passConf]',
                'min_length[4]',
                'max_length[50]'
            ),
            array(
                'matches'       => 'Les mots de passes ne matchent pas.'
            )
        );
        $this->form_validation->set_rules(
            'password2','confirmation du password',
            array(
                'required',
                'min_length[4]',
                'max_length[50]'
                )                
        );
        $this->form_validation->set_message(
            array(
                'required'      =>  'Le %s est obligatoire',
                'min_length'    =>  'Le {field} doit contenir {param} caractère minimum',
                'max_length'    =>  'Le {field} ne peut contenir plus de {param} caractères',
                'xss_callable' => "Balise script interdite"
            )
        );
        
        // Récupération des variables POST
        
        
        

        if ($this->form_validation->run() === FALSE)
        {
            $data['login'] = $this->label('login','Login utilisateur');
            $data['name'] = $this->label('name','Nom');
            $data['firstname'] = $this->label('firstname','Prénom');
            $data['password'] = $this->label('password','Password');
            $data['passConf'] = $this->label('passConf','Confirmer votre mot de passe');
            
            
            
        }else{
                $nom = $this->input->post('nom');
        
            $email = $this->input->post('email');

            $password = $this->input->post('password');

            $passwordVerif = $this->input->post('passwordVerif');
            
            $this->load->view('inscriptionSuccess');
        }
        
        
    }
    
    public function recherche(){
        $data['subView']='recherche';
        $this->load->view('template',$data);
    }   
    
    public function label($id,$name){
        
        if(null==form_error($id)){
            $res = ('<label class="mdl-textfield__label" for="'.$id.'">'.$name.'</label>');
        }else{
            $res = form_error($id, '<label class="mdl-textfield__label" style="color:#f44336;" for="'.$id.'">', '</label>');
        }
        return $res;
    }
}