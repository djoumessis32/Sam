<?php
        /*----GeneratorClass
        ---
        --- Classe         :programmeannuel
        --- date Generation: Tue, 20 Nov 2018 01:57:00 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Programmeannuel{ 
	 protected $idprogrammeannuel;
	 protected $codeprogrammeannuel;
	 protected $libelleprogrammeannuel;

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

	 public function getIdprogrammeannuel(){
		 return $this->idprogrammeannuel;
	 } 

	 public function getCodeprogrammeannuel(){
		 return $this->codeprogrammeannuel;
	 } 

	 public function getLibelleprogrammeannuel(){
		 return $this->libelleprogrammeannuel;
	 } 

	 public function setIdprogrammeannuel($idprogrammeannuel){
		 $this->idprogrammeannuel = $idprogrammeannuel;
	 } 

	 public function setCodeprogrammeannuel($codeprogrammeannuel){
		 $this->codeprogrammeannuel = $codeprogrammeannuel;
	 } 

	 public function setLibelleprogrammeannuel($libelleprogrammeannuel){
		 $this->libelleprogrammeannuel = $libelleprogrammeannuel;
	 } 
 }