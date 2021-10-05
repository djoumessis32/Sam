<?php
        /*----GeneratorClass
        ---
        --- Classe         :module
        --- date Generation: Tue, 20 Nov 2018 01:55:57 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  ModuleManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($module){
		 
		  $q = $this->db->prepare('INSERT INTO module(nom,semestre,id_specialite,date_enreg,etat) VALUES(:nom,:semestre,:id_specialite,:date_enreg,:etat)');
		  $q->bindValue(':nom',$module->getNom());
		  $q->bindValue(':semestre',$module->getSemestre());
		  $q->bindValue(':id_specialite',$module->getId_specialite());
		  $q->bindValue(':date_enreg',$module->getDate_enreg());
		  $q->bindValue(':etat',$module->getEtat());
		  $q->execute();  

 		 $module->hydrate(array('id'=>$this->db->lastInsertId()));

	 } 

	 public function Update($module){
		 
		  $q = $this->db->prepare('UPDATE module SET	nom = :nom,	semestre = :semestre,	id_specialite = :id_specialite,	date_enreg = :date_enreg,	etat = :etat WHERE 	id = :id');
		  $q->bindValue(':id',$module->getId());
		  $q->bindValue(':nom',$module->getNom());
		  $q->bindValue(':semestre',$module->getSemestre());
		  $q->bindValue(':id_specialite',$module->getId_specialite());
		  $q->bindValue(':date_enreg',$module->getDate_enreg());
		  $q->bindValue(':etat',$module->getEtat());
		  $q->execute();

	 } 

	 public function Delete($id){
		 
		 $this->db->exec('DELETE FROM module WHERE 	id = $id');

	 } 

	 public function GetUniqueModule($id){
		 
		 $q = $this->db->query('SELECT * FROM module   WHERE 	id = '.$id);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListModule($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM module';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listmodule = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listmodule[] = $data;

		}
		 return $Listmodule;

	 } 

	 public function GetListMultiKeysModule(){
		 
		 $req = 'SELECT * 
			 FROM module';
		 $q = $this->db->query($req);
		 $Listmodule = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listmodule[] = $data;

		}
		 return $Listmodule;

	 } 

	 public function CountModule(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM module')->fetchColumn();

	 } 
 }