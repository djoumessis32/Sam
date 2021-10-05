<?php
        /*----GeneratorClass
        ---
        --- Classe         :etudiant
        --- date Generation: Tue, 20 Nov 2018 01:54:15 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  EtudiantManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($etudiant){
		 
		  $q = $this->db->prepare('INSERT INTO etudiant(matriculeEt,photoEt,nomEt,prenomEt,nationaliteEt,sexeEt,dateNaissEt,lieuNaissEt,adresseEt,telephoneEt,date_enreg,etat,id_filiere,id_annee_academique) VALUES(:matriculeEt,:photoEt,:nomEt,:prenomEt,:nationaliteEt,:sexeEt,:dateNaissEt,:lieuNaissEt,:adresseEt,:telephoneEt,:date_enreg,:etat,:id_filiere,:id_annee_academique)');
		  $q->bindValue(':matriculeEt',$etudiant->getMatriculeEt());
		  $q->bindValue(':photoEt',$etudiant->getPhotoEt());
		  $q->bindValue(':nomEt',$etudiant->getNomEt());
		  $q->bindValue(':prenomEt',$etudiant->getPrenomEt());
		  $q->bindValue(':nationaliteEt',$etudiant->getNationaliteEt());
		  $q->bindValue(':sexeEt',$etudiant->getSexeEt());
		  $q->bindValue(':dateNaissEt',$etudiant->getDateNaissEt());
		  $q->bindValue(':lieuNaissEt',$etudiant->getLieuNaissEt());
		  $q->bindValue(':adresseEt',$etudiant->getAdresseEt());
		  $q->bindValue(':telephoneEt',$etudiant->getTelephoneEt());
		  $q->bindValue(':date_enreg',$etudiant->getDate_enreg());
		  $q->bindValue(':etat',$etudiant->getEtat());
		  $q->bindValue(':id_filiere',$etudiant->getId_filiere());
		  $q->bindValue(':id_annee_academique',$etudiant->getId_annee_academique());
		  $q->execute();  

 		 $etudiant->hydrate(array('id'=>$this->db->lastInsertId()));

	 } 

	 public function Update($etudiant){

		try{
		 
		  $q = $this->db->prepare('UPDATE etudiant SET	matriculeEt = :matriculeEt,	nomEt = :nomEt,	prenomEt = :prenomEt,	nationaliteEt = :nationaliteEt,	sexeEt = :sexeEt,	dateNaissEt = :dateNaissEt,	lieuNaissEt = :lieuNaissEt,	adresseEt = :adresseEt,	telephoneEt = :telephoneEt,	date_enreg = :date_enreg WHERE 	id = :id');
		  $q->bindValue(':id',$etudiant->getId());
		  $q->bindValue(':matriculeEt',$etudiant->getMatriculeEt());
		  $q->bindValue(':nomEt',$etudiant->getNomEt());
		  $q->bindValue(':prenomEt',$etudiant->getPrenomEt());
		  $q->bindValue(':nationaliteEt',$etudiant->getNationaliteEt());
		  $q->bindValue(':sexeEt',$etudiant->getSexeEt());
		  $q->bindValue(':dateNaissEt',$etudiant->getDateNaissEt());
		  $q->bindValue(':lieuNaissEt',$etudiant->getLieuNaissEt());
		  $q->bindValue(':adresseEt',$etudiant->getAdresseEt());
		  $q->bindValue(':telephoneEt',$etudiant->getTelephoneEt());
		  $q->bindValue(':date_enreg',$etudiant->getDate_enreg());
		  $q->execute();

		  return 1;
	}catch (Exception $e){
		return 0;
	}

	 } 

	 public function UpdateinfoEtu($etudiant){

		try{
		 
		$q = $this->db->prepare('UPDATE etudiant SET	matriculeEt = :matriculeEt,	nomEt = :nomEt,	prenomEt = :prenomEt WHERE 	id = :id');
		$q->bindValue(':id',$etudiant->getId());
		$q->bindValue(':matriculeEt',$etudiant->getMatriculeEt());
		$q->bindValue(':nomEt',$etudiant->getNomEt());
		$q->bindValue(':prenomEt',$etudiant->getPrenomEt());
		$q->execute();
		return 1;
	}catch (Exception $e){
		return 0;
	}
   } 

	 public function Delete($id){
		 
		 $this->db->exec('DELETE FROM etudiant WHERE 	id = $id');

	 } 

	 public function GetUniqueEtudiant($id){
		 
		 $q = $this->db->query('SELECT * FROM etudiant   WHERE 	id = '.$id);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListEtudiant($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM etudiant';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listetudiant = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listetudiant[] = $data;

		}
		 return $Listetudiant;

	 } 

	 public function GetListMultiKeysEtudiant(){
		 
		 $req = 'SELECT * 
			 FROM etudiant';
		 $q = $this->db->query($req);
		 $Listetudiant = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listetudiant[] = $data;

		}
		 return $Listetudiant;

	 } 

	 public function CountEtudiant(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM etudiant')->fetchColumn();

	 } 
 }