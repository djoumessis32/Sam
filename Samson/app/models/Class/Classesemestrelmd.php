<?php
        /*----GeneratorClass
        ---
        --- Classe         :classesemestrelmd
        --- date Generation: Tue, 20 Nov 2018 01:53:00 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Classesemestrelmd{ 
	 protected $idclassesemestrelmd;
	 protected $idclasselmd;
	 protected $idsemestre;
	 protected $ordreclassesemestrelmd;

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

	 public function getIdclassesemestrelmd(){
		 return $this->idclassesemestrelmd;
	 } 

	 public function getIdclasselmd(){
		 return $this->idclasselmd;
	 } 

	 public function getIdsemestre(){
		 return $this->idsemestre;
	 } 

	 public function getOrdreclassesemestrelmd(){
		 return $this->ordreclassesemestrelmd;
	 } 

	 public function setIdclassesemestrelmd($idclassesemestrelmd){
		 $this->idclassesemestrelmd = $idclassesemestrelmd;
	 } 

	 public function setIdclasselmd($idclasselmd){
		 $this->idclasselmd = $idclasselmd;
	 } 

	 public function setIdsemestre($idsemestre){
		 $this->idsemestre = $idsemestre;
	 } 

	 public function setOrdreclassesemestrelmd($ordreclassesemestrelmd){
		 $this->ordreclassesemestrelmd = $ordreclassesemestrelmd;
	 } 
 }