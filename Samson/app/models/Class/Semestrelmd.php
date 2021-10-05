<?php
        /*----GeneratorClass
        ---
        --- Classe         :semestrelmd
        --- date Generation: Tue, 20 Nov 2018 01:57:45 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Semestrelmd{ 
	 protected $idsemestrelmd;
	 protected $codesemestrelmd;
	 protected $libellesemestrelmd;

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

	 public function getIdsemestrelmd(){
		 return $this->idsemestrelmd;
	 } 

	 public function getCodesemestrelmd(){
		 return $this->codesemestrelmd;
	 } 

	 public function getLibellesemestrelmd(){
		 return $this->libellesemestrelmd;
	 } 

	 public function setIdsemestrelmd($idsemestrelmd){
		 $this->idsemestrelmd = $idsemestrelmd;
	 } 

	 public function setCodesemestrelmd($codesemestrelmd){
		 $this->codesemestrelmd = $codesemestrelmd;
	 } 

	 public function setLibellesemestrelmd($libellesemestrelmd){
		 $this->libellesemestrelmd = $libellesemestrelmd;
	 } 
 }