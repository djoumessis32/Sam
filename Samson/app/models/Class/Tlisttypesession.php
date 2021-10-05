<?php
        /*----GeneratorClass
        ---
        --- Classe         :tlisttypesession
        --- date Generation: Tue, 20 Nov 2018 01:58:44 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Tlisttypesession{ 
	 protected $idtlisttypesession;
	 protected $libelletlisttypesession;

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

	 public function getIdtlisttypesession(){
		 return $this->idtlisttypesession;
	 } 

	 public function getLibelletlisttypesession(){
		 return $this->libelletlisttypesession;
	 } 

	 public function setIdtlisttypesession($idtlisttypesession){
		 $this->idtlisttypesession = $idtlisttypesession;
	 } 

	 public function setLibelletlisttypesession($libelletlisttypesession){
		 $this->libelletlisttypesession = $libelletlisttypesession;
	 } 
 }