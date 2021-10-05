<?php
        /*----GeneratorClass
        ---
        --- Classe         :profil
        --- date Generation: Tue, 20 Nov 2018 01:56:26 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  ProfilManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($profil){
		 
		  $q = $this->db->prepare('INSERT INTO profil(login,pwd,email,type,enregistrement,dateeng,etat) VALUES(:login,:pwd,:email,:type,:enregistrement,:dateeng,:etat)');
		  $q->bindValue(':login',$profil->getLogin());
		  $q->bindValue(':pwd',$profil->getPwd());
		  $q->bindValue(':email',$profil->getEmail());
		  $q->bindValue(':type',$profil->getType());
		  $q->bindValue(':enregistrement',$profil->getEnregistrement());
		  $q->bindValue(':dateeng',$profil->getDateeng());
		  $q->bindValue(':etat',$profil->getEtat());
		  $q->execute();  

 		 $profil->hydrate(array('id'=>$this->db->lastInsertId()));

	 } 

	 public function Update($profil){
		 
		  $q = $this->db->prepare('UPDATE profil SET	login = :login,	pwd = :pwd,	email = :email,	type = :type,	enregistrement = :enregistrement,	dateeng = :dateeng,	etat = :etat WHERE 	id = :id');
		  $q->bindValue(':id',$profil->getId());
		  $q->bindValue(':login',$profil->getLogin());
		  $q->bindValue(':pwd',$profil->getPwd());
		  $q->bindValue(':email',$profil->getEmail());
		  $q->bindValue(':type',$profil->getType());
		  $q->bindValue(':enregistrement',$profil->getEnregistrement());
		  $q->bindValue(':dateeng',$profil->getDateeng());
		  $q->bindValue(':etat',$profil->getEtat());
		  $q->execute();

	 } 

	 public function Delete($id){
		 
		 $this->db->exec('DELETE FROM profil WHERE 	id = $id');

	 } 

	 public function GetUniqueProfil($id){
		 
		 $q = $this->db->query('SELECT * FROM profil   WHERE 	id = '.$id);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListProfil($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM profil';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listprofil = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listprofil[] = $data;

		}
		 return $Listprofil;

	 } 

	 public function GetListMultiKeysProfil(){
		 
		 $req = 'SELECT * 
			 FROM profil';
		 $q = $this->db->query($req);
		 $Listprofil = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listprofil[] = $data;

		}
		 return $Listprofil;

	 } 

	 public function CountProfil(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM profil')->fetchColumn();

	 } 
 }