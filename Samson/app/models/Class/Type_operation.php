<?php
        /*----GeneratorClass
        ---
        --- Classe         :type_operation
        --- date Generation: Sun, 09 Aug 2020 23:01:22 +0200
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.6.3*/

 class  Type_operation{ 
	 protected $idtype_operation;
	 protected $libelletype_operation;

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

	 public function getIdtype_operation(){
		 return $this->idtype_operation;
	 } 

	 public function getLibelletype_operation(){
		 return $this->libelletype_operation;
	 } 

	 public function setIdtype_operation($idtype_operation){
		 $this->idtype_operation = $idtype_operation;
	 } 

	 public function setLibelletype_operation($libelletype_operation){
		 $this->libelletype_operation = $libelletype_operation;
	 } 
 }