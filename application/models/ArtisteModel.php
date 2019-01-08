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
    
    public function toutesLesVilles(){
        $this->db->select('ville');
        $this->db->from('salle');
        $this->db->distinct();
        return $this->db->get()->result_array();
    }
    
    public function getUserUnconfirmed () {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('groupe','users.id = groupe.id');
        $this->db->where("valide","false");
        return $this->db->get()->result_array();
    }

     public function salleDisponibleVille($date,$ville = false){
        // select * from salle where salle not in (select distinct  salle from concert where date = '2017-12-09') ORDER BY ville asc
        
        // Premiere requete : select distinct salle from concert where date = '2017-12-09'
        $this->db->select('salle.salle,ville');
        $this->db->from('concert');
        $this->db->join('salle', 'salle.salle = concert.salle');
        $this->db->where('date', $date);
        $this->db->distinct();
        $sallesPrisent = $this->arr_concat($this->db->get()->result_array());
        $this->db->select('*');
        if(count($sallesPrisent)>0){
            $this->db->where_not_in('salle',$sallesPrisent);
        }
        if($ville != false ) {
            $this->db->where('ville', $ville);
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
    


     public function xss_test($string){
        return $this->security->xss_clean($string, TRUE)!==FALSE;
    }
    
    
    
}