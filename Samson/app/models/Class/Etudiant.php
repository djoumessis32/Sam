<?php
        /*----GeneratorClass
        ---
        --- Classe         :etudiant
        --- date Generation: Tue, 20 Nov 2018 01:54:15 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Etudiant{ 
	 protected $id;
	 protected $matriculeEt;
	 protected $photoEt;
	 protected $nomEt;
	 protected $prenomEt;
	 protected $nationaliteEt;
	 protected $sexeEt;
	 protected $dateNaissEt;
	 protected $lieuNaissEt;
	 protected $adresseEt;
	 protected $telephoneEt;
	 protected $numcni;
	 protected $date_enreg;
	 protected $etat;
	 protected $id_filiere;
	 protected $id_annee_academique;

	 public function __construct($data){
		 
		  $this->hydrate($data);
	 } 

	 public function hydrate($data){
		  foreach($data AS $key=>$value){
		    $method = 'set'.ucfirst($key);
		    if(method_exists($this,$method)){
			     $this->$method ($value); 
		}  
	}
	 } 

	 public function getId(){
		 return $this->id;
	 } 

	 public function getMatriculeEt(){
		 return $this->matriculeEt;
	 } 

	 public function getPhotoEt(){
		 return $this->photoEt;
	 } 

	 public function getNomEt(){
		 return $this->nomEt;
	 } 

	 public function getPrenomEt(){
		 return $this->prenomEt;
	 } 

	 public function getNationaliteEt(){
		 return $this->nationaliteEt;
	 } 

	 public function getSexeEt(){
		 return $this->sexeEt;
	 } 

	 public function getDateNaissEt(){
		 return $this->dateNaissEt;
	 } 

	 public function getLieuNaissEt(){
		 return $this->lieuNaissEt;
	 } 

	 public function getAdresseEt(){
		 return $this->adresseEt;
	 } 

	 public function getTelephoneEt(){
		 return $this->telephoneEt;
	 } 

	 public function getDate_enreg(){
		 return $this->date_enreg;
	 } 

	 public function getEtat(){
		 return $this->etat;
	 } 

	 public function getId_filiere(){
		 return $this->id_filiere;
	 } 

	 public function getId_annee_academique(){
		 return $this->id_annee_academique;
	 } 

	 public function setId($id){
		 $this->id = $id;
	 } 

	 public function setMatriculeEt($matriculeEt){
		 $this->matriculeEt = $matriculeEt;
	 } 

	 public function setPhotoEt($photoEt){
		 $this->photoEt = $photoEt;
	 } 

	 public function setNomEt($nomEt){
		 $this->nomEt = $nomEt;
	 } 

	 public function setPrenomEt($prenomEt){
		 $this->prenomEt = $prenomEt;
	 } 

	 public function setNationaliteEt($nationaliteEt){
		 $this->nationaliteEt = $nationaliteEt;
	 } 

	 public function setSexeEt($sexeEt){
		 $this->sexeEt = $sexeEt;
	 } 

	 public function setDateNaissEt($dateNaissEt){
		 $this->dateNaissEt = $dateNaissEt;
	 } 

	 public function setLieuNaissEt($lieuNaissEt){
		 $this->lieuNaissEt = $lieuNaissEt;
	 } 

	 public function setAdresseEt($adresseEt){
		 $this->adresseEt = $adresseEt;
	 } 

	 public function setTelephoneEt($telephoneEt){
		 $this->telephoneEt = $telephoneEt;
	 } 

	 public function setDate_enreg($date_enreg){
		 $this->date_enreg = $date_enreg;
	 } 

	 public function setEtat($etat){
		 $this->etat = $etat;
	 } 

	 public function setId_filiere($id_filiere){
		 $this->id_filiere = $id_filiere;
	 } 

	 public function setId_annee_academique($id_annee_academique){
		 $this->id_annee_academique = $id_annee_academique;
	 } 

	 /**
	  * Get the value of mumcni
	  */ 
	 public function getNumcni()
	 {
	 	 return $this->numcni;
	 }

	 /**
	  * Set the value of mumcni
	  *
	  * @return  self
	  */ 
	 public function setNumcni($numcni)
	 {
	 	 $this->numcni = $numcni;
	 }
 }