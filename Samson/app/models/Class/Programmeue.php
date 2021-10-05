<?php
        /*----GeneratorClass
        ---
        --- Classe         :programmeue
        --- date Generation: Tue, 20 Nov 2018 01:57:15 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Programmeue{ 
	 protected $idprogrammeue;
	 protected $idprogramme;
	 protected $idue;

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

	 public function getIdprogrammeue(){
		 return $this->idprogrammeue;
	 } 

	 public function getIdprogramme(){
		 return $this->idprogramme;
	 } 

	 public function getIdue(){
		 return $this->idue;
	 } 

	 public function setIdprogrammeue($idprogrammeue){
		 $this->idprogrammeue = $idprogrammeue;
	 } 

	 public function setIdprogramme($idprogramme){
		 $this->idprogramme = $idprogramme;
	 } 

	 public function setIdue($idue){
		 $this->idue = $idue;
	 } 
 }