<?php
        /*----GeneratorClass
        ---
        --- Classe         :enseignant
        --- date Generation: Tue, 20 Nov 2018 01:53:30 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  EnseignantManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($enseignant){
		 
		  $q = $this->db->prepare('INSERT INTO enseignant(matriculeEns,photoEns,nomEns,prenomEns,sexeEns,domaineEns,nationaliteEns,dateNaissEns,lieuNaissEns,adresseEns,telephoneEns,date_enreg,etat) VALUES(:matriculeEns,:photoEns,:nomEns,:prenomEns,:sexeEns,:domaineEns,:nationaliteEns,:dateNaissEns,:lieuNaissEns,:adresseEns,:telephoneEns,:date_enreg,:etat)');
		  $q->bindValue(':matriculeEns',$enseignant->getMatriculeEns());
		  $q->bindValue(':photoEns',$enseignant->getPhotoEns());
		  $q->bindValue(':nomEns',$enseignant->getNomEns());
		  $q->bindValue(':prenomEns',$enseignant->getPrenomEns());
		  $q->bindValue(':sexeEns',$enseignant->getSexeEns());
		  $q->bindValue(':domaineEns',$enseignant->getDomaineEns());
		  $q->bindValue(':nationaliteEns',$enseignant->getNationaliteEns());
		  $q->bindValue(':dateNaissEns',$enseignant->getDateNaissEns());
		  $q->bindValue(':lieuNaissEns',$enseignant->getLieuNaissEns());
		  $q->bindValue(':adresseEns',$enseignant->getAdresseEns());
		  $q->bindValue(':telephoneEns',$enseignant->getTelephoneEns());
		  $q->bindValue(':date_enreg',$enseignant->getDate_enreg());
		  $q->bindValue(':etat',$enseignant->getEtat());
		  $q->execute();  

 		 $enseignant->hydrate(array('id'=>$this->db->lastInsertId()));

	 } 

	 public function Update($enseignant){

		try{
		 
		  $q = $this->db->prepare('UPDATE enseignant SET	matriculeEns = :matriculeEns,nomEns = :nomEns,	prenomEns = :prenomEns,	sexeEns = :sexeEns,	domaineEns = :domaineEns,	nationaliteEns = :nationaliteEns,	dateNaissEns = :dateNaissEns,	lieuNaissEns = :lieuNaissEns,	adresseEns = :adresseEns,	telephoneEns = :telephoneEns,	date_enreg = :date_enreg,	etat = :etat WHERE 	id = :id');
		  $q->bindValue(':id',$enseignant->getId());
		  $q->bindValue(':matriculeEns',$enseignant->getMatriculeEns());
		  $q->bindValue(':nomEns',$enseignant->getNomEns());
		  $q->bindValue(':prenomEns',$enseignant->getPrenomEns());
		  $q->bindValue(':sexeEns',$enseignant->getSexeEns());
		  $q->bindValue(':domaineEns',$enseignant->getDomaineEns());
		  $q->bindValue(':nationaliteEns',$enseignant->getNationaliteEns());
		  $q->bindValue(':dateNaissEns',$enseignant->getDateNaissEns());
		  $q->bindValue(':lieuNaissEns',$enseignant->getLieuNaissEns());
		  $q->bindValue(':adresseEns',$enseignant->getAdresseEns());
		  $q->bindValue(':telephoneEns',$enseignant->getTelephoneEns());
		  $q->bindValue(':date_enreg',$enseignant->getDate_enreg());
		  $q->bindValue(':etat',$enseignant->getEtat());
		  $q->execute();

		  return 1;
		}catch (Exception $e){
			return 0;
		}
	

	 } 

	 public function UpdateinfoEns($enseignant){

		try{
		 
		$q = $this->db->prepare('UPDATE enseignant SET	matriculeEns = :matriculeEns,	nomEns = :nomEns,	prenomEns = :prenomEns WHERE 	id = :id');
		$q->bindValue(':id',$enseignant->getId());
		$q->bindValue(':matriculeEns',$enseignant->getMatriculeEns());
		$q->bindValue(':nomEns',$enseignant->getNomEns());
		$q->bindValue(':prenomEns',$enseignant->getPrenomEns());
		$q->execute();
		return 1;
	}catch (Exception $e){
		return 0;
	}

   } 


	 public function Delete($id){
		 
		 $this->db->exec('DELETE FROM enseignant WHERE 	id = $id');

	 } 

	 public function GetUniqueEnseignant($id){
		 
		 $q = $this->db->query('SELECT * FROM enseignant   WHERE 	id = '.$id);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListEnseignant($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM enseignant';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listenseignant = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listenseignant[] = $data;

		}
		 return $Listenseignant;

	 } 

	 public function GetListMultiKeysEnseignant(){
		 
		 $req = 'SELECT * 
			 FROM enseignant';
		 $q = $this->db->query($req);
		 $Listenseignant = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listenseignant[] = $data;

		}
		 return $Listenseignant;

	 } 

	 public function CountEnseignant(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM enseignant')->fetchColumn();

	 } 
 }