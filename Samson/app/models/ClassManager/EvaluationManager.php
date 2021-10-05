<?php
        /*----GeneratorClass
        ---
        --- Classe         :epreuve
        --- date Generation: Tue, 20 Nov 2018 01:54:01 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  EvaluationManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($epreuve){
		 
		  $q = $this->db->prepare('INSERT INTO evaluation(idmatiereuv,poids,dateepreuve) VALUES(:idmatiereuv,:poids,:dateepreuve)');
		  $q->bindValue(':idmatiereuv',$epreuve->getIdmatiereuv());
		  $q->bindValue(':poids',$epreuve->getPoids());
		  $q->bindValue(':dateepreuve',$epreuve->getDateepreuve());
		  $q->execute();  

 		 $epreuve->hydrate(array('idepreuve'=>$this->db->lastInsertId()));

	 } 

	 public function Update($epreuve){
		 
		  $q = $this->db->prepare('UPDATE evaluation SET	idmatiereuv = :idmatiereuv,	poids = :poids,	dateepreuve = :dateepreuve WHERE 	idevaluation = :idevaluation');
		  $q->bindValue(':idevaluation',$epreuve->getIdevaluation());
		  $q->bindValue(':idmatiereuv',$epreuve->getIdmatiereuv());
		  $q->bindValue(':poids',$epreuve->getPoids());
		  $q->bindValue(':dateepreuve',$epreuve->getDateepreuve());
		  $q->execute();

	 } 

	 public function Delete($idepreuve){
		 
		 $this->db->exec('DELETE FROM evaluation WHERE 	idevaluation = $idepreuve');

	 } 

	 public function GetUniqueEpreuve($idepreuve){
		 
		 $q = $this->db->query('SELECT * FROM evaluation   WHERE 	idevaluation = '.$idepreuve);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListEpreuve($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM evaluation';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listepreuve = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listepreuve[] = $data;

		}
		 return $Listepreuve;

	 } 

	 public function GetListMultiKeysEpreuve($idmatiereuv){
		 
		 $req = 'SELECT * 
			 FROM evaluation , uvmatiere
			 WHERE 	evaluation.idmatiereuv = uvmatiere.iduvmatiere
			 AND 	idmatiereuv = '.$idmatiereuv.'';
		 $q = $this->db->query($req);
		 $Listepreuve = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listepreuve[] = $data;

		}
		 return $Listepreuve;

	 } 

	 public function CountEpreuve(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM evaluation')->fetchColumn();

	 } 
 }