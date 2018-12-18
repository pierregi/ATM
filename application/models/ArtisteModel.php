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
    
    public function salleDisponible($date){
        // select * from salle where salle not in (select distinct  salle from concert where date = '2017-12-09') ORDER BY ville asc
        
        // Premiere requete : select distinct salle from concert where date = '2017-12-09'
        $this->db->select('salle');
        $this->db->where('date', $date);
        $this->db->distinct();
        $sallesPrisent = $this->arr_concat($this->db->get('concert')->result_array());
        
        $this->db->select('*');
        if(count($sallesPrisent)>0){
            $this->db->where_not_in('salle',$sallesPrisent);
        }
        $this->db->order_by('ville', 'ASC');
        return $this->db->get('salle')->result_array();
        
    }
    
    public function arr_concat($arr){
        
        $tmp = array();
        foreach($arr as $value){
            $tmp[] = $value["salle"];
        }
        return $tmp;
    }
    
    
    
    
}