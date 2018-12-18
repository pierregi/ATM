<?php


class ArtisteModel extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    
    public function ajouterGroupe($nom,$email,$password,$annee){
        
        $data = array(
        'password' => password_hash($password,PASSWORD_BCRYPT),
        'email' => $email
        );
        
        // Inserer dans la table USER
        $this->db->insert('users', $data);
        // Je récupere l'ID du compte
        $idInserted = $this->db->insert_id();
        
        $data = array(
            "id" => $idInserted,
            "nom" => $nom,
            "anneedeformation" =>$annee
        );
        
        // Inserer dans la table GROUPE
        $this->db->insert('groupe',$data);
        
    }
     public function xss_test($string){
        return $this->security->xss_clean($string, TRUE)!==FALSE;
    }
    
    
    
}