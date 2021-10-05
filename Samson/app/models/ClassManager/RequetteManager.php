<?php
        /*----GeneratorClass
        ---
        --- Classe         :requette
        --- date Generation: Tue, 20 Nov 2018 01:57:30 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  RequetteManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($requette){
		 
		  $q = $this->db->prepare('INSERT INTO requette(iduvmatiere,idsession,idsemestre,idetudiant,statutrequette,daterequette,motifrequette) VALUES(:iduvmatiere,:idsession,:idsemestre,:idetudiant,:statutrequette,:daterequette,:motifrequette)');
		  $q->bindValue(':iduvmatiere',$requette->getIduvmatiere());
		  $q->bindValue(':idsession',$requette->getIdsession());
		  $q->bindValue(':idsemestre',$requette->getIdsemestre());
		  $q->bindValue(':idetudiant',$requette->getIdetudiant());
		  $q->bindValue(':statutrequette',$requette->getStatutrequette());
		  $q->bindValue(':daterequette',$requette->getDaterequette());
		  $q->bindValue(':motifrequette',$requette->getMotifrequette());
		  $q->execute();  

 		 $requette->hydrate(array('idrequette'=>$this->db->lastInsertId()));

	 } 

	 public function Update($requette){
		 
		  $q = $this->db->prepare('UPDATE requette SET	iduvmatiere = :iduvmatiere,	idsession = :idsession,	idsemestre = :idsemestre,	idetudiant = :idetudiant,	statutrequette = :statutrequette,	daterequette = :daterequette,	motifrequette = :motifrequette WHERE 	idrequette = :idrequette');
		  $q->bindValue(':idrequette',$requette->getIdrequette());
		  $q->bindValue(':iduvmatiere',$requette->getIduvmatiere());
		  $q->bindValue(':idsession',$requette->getIdsession());
		  $q->bindValue(':idsemestre',$requette->getIdsemestre());
		  $q->bindValue(':idetudiant',$requette->getIdetudiant());
		  $q->bindValue(':statutrequette',$requette->getStatutrequette());
		  $q->bindValue(':daterequette',$requette->getDaterequette());
		  $q->bindValue(':motifrequette',$requette->getMotifrequette());
		  $q->execute();

	 } 

	 public function Delete($idrequette){
		 
		 $this->db->exec('DELETE FROM requette WHERE 	idrequette = $idrequette');

	 } 

	 public function GetUniqueRequette($idrequette){
		 
		 $q = $this->db->query('SELECT * FROM requette   WHERE 	idrequette = '.$idrequette);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListRequette($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM requette';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listrequette = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listrequette[] = $data;

		}
		 return $Listrequette;

	 } 

	 public function GetListMultiKeysRequette(){
		 
		 $req = 'SELECT * 
			 FROM requette';
		 $q = $this->db->query($req);
		 $Listrequette = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listrequette[] = $data;

		}
		 return $Listrequette;

	 } 

	 public function CountRequette(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM requette')->fetchColumn();

	 } 
 }