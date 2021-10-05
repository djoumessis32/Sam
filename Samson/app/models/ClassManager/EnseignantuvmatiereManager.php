<?php
        /*----GeneratorClass
        ---
        --- Classe         :enseignantuvmatiere
        --- date Generation: Tue, 20 Nov 2018 01:53:46 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  EnseignantuvmatiereManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($enseignantuvmatiere){
		 
		  $q = $this->db->prepare('INSERT INTO enseignantuvmatiere(idenseignant,iduvmatiere,dateenseignantuvmatiere) VALUES(:idenseignant,:iduvmatiere,:dateenseignantuvmatiere)');
		  $q->bindValue(':idenseignant',$enseignantuvmatiere->getIdenseignant());
		  $q->bindValue(':iduvmatiere',$enseignantuvmatiere->getIduvmatiere());
		  $q->bindValue(':dateenseignantuvmatiere',$enseignantuvmatiere->getDateenseignantuvmatiere());
		  $q->execute();  

 		 $enseignantuvmatiere->hydrate(array('idenseignantuvmatiere'=>$this->db->lastInsertId()));

	 } 

	 public function Update($enseignantuvmatiere){
		 
		  $q = $this->db->prepare('UPDATE enseignantuvmatiere SET	idenseignant = :idenseignant,	iduvmatiere = :iduvmatiere,	dateenseignantuvmatiere = :dateenseignantuvmatiere WHERE 	idenseignantuvmatiere = :idenseignantuvmatiere');
		  $q->bindValue(':idenseignantuvmatiere',$enseignantuvmatiere->getIdenseignantuvmatiere());
		  $q->bindValue(':idenseignant',$enseignantuvmatiere->getIdenseignant());
		  $q->bindValue(':iduvmatiere',$enseignantuvmatiere->getIduvmatiere());
		  $q->bindValue(':dateenseignantuvmatiere',$enseignantuvmatiere->getDateenseignantuvmatiere());
		  $q->execute();

	 } 

	 public function Delete($idenseignantuvmatiere){
		 
		 $this->db->exec('DELETE FROM enseignantuvmatiere WHERE 	idenseignantuvmatiere = $idenseignantuvmatiere');

	 } 

	 public function GetUniqueEnseignantuvmatiere($idenseignantuvmatiere){
		 
		 $q = $this->db->query('SELECT * FROM enseignantuvmatiere   WHERE 	idenseignantuvmatiere = '.$idenseignantuvmatiere);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListEnseignantuvmatiere($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM enseignantuvmatiere';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listenseignantuvmatiere = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listenseignantuvmatiere[] = $data;

		}
		 return $Listenseignantuvmatiere;

	 } 

	 public function GetListMultiKeysEnseignantuvmatiere($idenseignant,$iduvmatiere){
		 
		 $req = 'SELECT * 
			 FROM enseignantuvmatiere , enseignant , uvmatiere
			 WHERE 	enseignantuvmatiere.idenseignant = enseignant.id
			 AND enseignantuvmatiere.iduvmatiere = uvmatiere.iduvmatiere
			 AND 	idenseignant = '.$idenseignant.'
			 AND 	iduvmatiere = '.$iduvmatiere.'';
		 $q = $this->db->query($req);
		 $Listenseignantuvmatiere = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listenseignantuvmatiere[] = $data;

		}
		 return $Listenseignantuvmatiere;

	 } 

	 public function CountEnseignantuvmatiere(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM enseignantuvmatiere')->fetchColumn();

	 } 
 }