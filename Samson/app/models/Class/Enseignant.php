<?php
        /*----GeneratorClass
        ---
        --- Classe         :enseignant
        --- date Generation: Tue, 20 Nov 2018 01:53:30 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Enseignant{ 
	 protected $id;
	 protected $matriculeEns;
	 protected $photoEns;
	 protected $nomEns;
	 protected $prenomEns;
	 protected $sexeEns;
	 protected $domaineEns;
	 protected $nationaliteEns;
	 protected $dateNaissEns;
	 protected $lieuNaissEns;
	 protected $adresseEns;
	 protected $telephoneEns;
	 protected $date_enreg;
	 protected $etat;

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

	 public function getMatriculeEns(){
		 return $this->matriculeEns;
	 } 

	 public function getPhotoEns(){
		 return $this->photoEns;
	 } 

	 public function getNomEns(){
		 return $this->nomEns;
	 } 

	 public function getPrenomEns(){
		 return $this->prenomEns;
	 } 

	 public function getSexeEns(){
		 return $this->sexeEns;
	 } 

	 public function getDomaineEns(){
		 return $this->domaineEns;
	 } 

	 public function getNationaliteEns(){
		 return $this->nationaliteEns;
	 } 

	 public function getDateNaissEns(){
		 return $this->dateNaissEns;
	 } 

	 public function getLieuNaissEns(){
		 return $this->lieuNaissEns;
	 } 

	 public function getAdresseEns(){
		 return $this->adresseEns;
	 } 

	 public function getTelephoneEns(){
		 return $this->telephoneEns;
	 } 

	 public function getDate_enreg(){
		 return $this->date_enreg;
	 } 

	 public function getEtat(){
		 return $this->etat;
	 } 

	 public function setId($id){
		 $this->id = $id;
	 } 

	 public function setMatriculeEns($matriculeEns){
		 $this->matriculeEns = $matriculeEns;
	 } 

	 public function setPhotoEns($photoEns){
		 $this->photoEns = $photoEns;
	 } 

	 public function setNomEns($nomEns){
		 $this->nomEns = $nomEns;
	 } 

	 public function setPrenomEns($prenomEns){
		 $this->prenomEns = $prenomEns;
	 } 

	 public function setSexeEns($sexeEns){
		 $this->sexeEns = $sexeEns;
	 } 

	 public function setDomaineEns($domaineEns){
		 $this->domaineEns = $domaineEns;
	 } 

	 public function setNationaliteEns($nationaliteEns){
		 $this->nationaliteEns = $nationaliteEns;
	 } 

	 public function setDateNaissEns($dateNaissEns){
		 $this->dateNaissEns = $dateNaissEns;
	 } 

	 public function setLieuNaissEns($lieuNaissEns){
		 $this->lieuNaissEns = $lieuNaissEns;
	 } 

	 public function setAdresseEns($adresseEns){
		 $this->adresseEns = $adresseEns;
	 } 

	 public function setTelephoneEns($telephoneEns){
		 $this->telephoneEns = $telephoneEns;
	 } 

	 public function setDate_enreg($date_enreg){
		 $this->date_enreg = $date_enreg;
	 } 

	 public function setEtat($etat){
		 $this->etat = $etat;
	 } 
 }