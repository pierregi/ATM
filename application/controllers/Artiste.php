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
        
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('html');

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
                'valid_email'   => 'Il faut rentrer un email valide.',
                'is_unique'     => 'Cette adresse e-mail est déjà utilisée.'
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
                'min_length[4]',
                'max_length[50]'
            )
        );
        $this->form_validation->set_rules(
            'password2','La confirmation du password',
            array(
                'required',
                'matches[password]',
                ),
            array(
                'matches'       => 'Les mots de passes ne correspondent pas.'
            )
        );
        $this->form_validation->set_message(
            array(
                'required'      =>  '%s est obligatoire',
                'min_length'    =>  '{field} doit contenir {param} caractère minimum',
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
       $this->form_validation->set_rules(
            'date','La date',
            array(
                'required',
                'regex_match[#[0-9]{2}/[0-9]{2}/[0-9]{4}#]'                
            ),
            array(
                'required'      =>  '%s est obligatoire',
                'regex_match'   =>  '%s doit etre de la forme MM/JJ/AAAA' 
            )
        );
        $data['errorDate'] ="";
        $data['empty']=-1;  
        if ($this->form_validation->run() === FALSE)
        {
            $data['errorDate'] = $this->label('date');
        }else{
            $date = $this->input->post('date');
            $possible = $this->ArtisteModel->datePossible('The Midnight Revolution',$date);
            if ($possible) {
                $data['date']=str_replace('/','_',$date);
                $dateTmp = explode("/",$date);
                if(!isset($date)){

                    $data['empty'] = -1;

                }else{

                    if(empty($date)){
                        $data['empty'] = -1;

                    }else{
                        $data['empty'] = 0;
                        $date = $dateTmp[2]."-".$dateTmp[0]."-".$dateTmp[1];
                    }
                }
                $ville = $this->input->post('ville');
                $data['villes'] = $this->ArtisteModel->toutesLesVilles();

                if((isset($ville))&& !empty($ville)){
                    $data['salle'] = $this->ArtisteModel->salleDisponibleVille($date,$ville);
                }else{
                    $data['salle'] = $this->ArtisteModel->salleDisponibleVille($date);
                }
                $data['projet']= $this->ArtisteModel->toutLesProjet();
                
             } else {
                $data['empty'] = 2; 
            }
            
            

        }
        $data['subView']='recherche';
        $data['modal']=false;
        $this->load->view('template',$data);
    }   
    
    public function reserver(){
        $this->form_validation->set_rules(
            'date','La date',
            array(
                'required',
                'regex_match[#^[0-9]{2}/[0-9]{2}/[0-9]{4}$# ]'                
            ),
            array(
                'required'      =>  '%s est obligatoire',
                'regex_match'   =>  '%s doit etre de la forme MM/JJ/AAAA' 
            )
        );
        $data['errorDate'] ="";
        $data['errorDate2'] ="";
        $data['empty']=-1;  
        if ($this->form_validation->run() === FALSE)
        {
            $data['errorDate2'] = $this->label('date');
        }else{
            $date = $this->input->post('date');
            $data['date']=str_replace('/','_',$date);
            $dateTmp = explode("/",$date);
            if(!isset($date)){

                $data['empty'] = -1;

            }else{

                if(empty($date)){
                    $data['empty'] = -1;

                }else{
                    $data['empty'] = 0;
                    $date = $dateTmp[2]."-".$dateTmp[0]."-".$dateTmp[1];
                }
            }
            $ville = $this->input->post('ville');
            $data['villes'] = $this->ArtisteModel->toutesLesVilles();

            if((isset($ville))&& !empty($ville)){
                $data['salle'] = $this->ArtisteModel->salleDisponibleVille($date,$ville);
            }else{
                $data['salle'] = $this->ArtisteModel->salleDisponibleVille($date);
            }
            $data['projet']= $this->ArtisteModel->toutLesProjet();

        }
        $data['subView']='recherche';
        $data['modal']=false;
        $this->load->view('template',$data);

    }   
    
    
    public function confirmation () {
        $data['users'] = $this->ArtisteModel->getUserUnconfirmed();
        $data['subView']= 'confirmation';
        $this->load->view('template',$data);
    }
    
    public function mes_concerts () {
        $data['subView'] = 'mes_concerts';
        $data['concerts'] = $this->ArtisteModel->getConcerts();
        $this->load->view('template',$data);
    }

    public function label($id){
        $res="";
        if(null!=form_error($id)){
            $res = form_error($id, '<div class="alert alert-warning" role="alert">', '</div><br/>');
        }
        return $res;
    }
}