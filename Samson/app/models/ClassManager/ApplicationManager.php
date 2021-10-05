<?php
        /*----GeneratorClass
        ---
        --- Classe         :application
        --- date Generation: Tue, 20 Nov 2018 01:52:28 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  ApplicationManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($application){
		 
		  $q = $this->db->prepare('INSERT INTO application(libelle_fr,libelle_en,version,acronyme,logo,is_install) VALUES(:libelle_fr,:libelle_en,:version,:acronyme,:logo,:is_install)');
		  $q->bindValue(':libelle_fr',$application->getLibelle_fr());
		  $q->bindValue(':libelle_en',$application->getLibelle_en());
		  $q->bindValue(':version',$application->getVersion());
		  $q->bindValue(':acronyme',$application->getAcronyme());
		  $q->bindValue(':logo',$application->getLogo());
		  $q->bindValue(':is_install',$application->getIs_install());
		  $q->execute();  

 		 $application->hydrate(array('idapplication'=>$this->db->lastInsertId()));

	 } 

	 public function Update($application){
		 
		  $q = $this->db->prepare('UPDATE application SET	libelle_fr = :libelle_fr,	libelle_en = :libelle_en,	version = :version,	acronyme = :acronyme,	logo = :logo,	is_install = :is_install WHERE 	idapplication = :idapplication');
		  $q->bindValue(':idapplication',$application->getIdapplication());
		  $q->bindValue(':libelle_fr',$application->getLibelle_fr());
		  $q->bindValue(':libelle_en',$application->getLibelle_en());
		  $q->bindValue(':version',$application->getVersion());
		  $q->bindValue(':acronyme',$application->getAcronyme());
		  $q->bindValue(':logo',$application->getLogo());
		  $q->bindValue(':is_install',$application->getIs_install());
		  $q->execute();

	 } 

	 public function Delete($idapplication){
		 
		 $this->db->exec('DELETE FROM application WHERE 	idapplication = $idapplication');

	 } 

	 public function GetUniqueApplication($idapplication){
		 
		 $q = $this->db->query('SELECT * FROM application   WHERE 	idapplication = '.$idapplication);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListApplication($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM application';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listapplication = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listapplication[] = $data;

		}
		 return $Listapplication;

	 } 

	 public function GetListMultiKeysApplication(){
		 
		 $req = 'SELECT * 
			 FROM application';
		 $q = $this->db->query($req);
		 $Listapplication = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listapplication[] = $data;

		}
		 return $Listapplication;

	 } 

	 public function CountApplication(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM application')->fetchColumn();

	 } 
 }