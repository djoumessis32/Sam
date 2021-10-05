<?php
        /*----GeneratorClass
        ---
        --- Classe         :specialiteclasselmd
        --- date Generation: Tue, 20 Nov 2018 01:58:30 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Specialiteclasselmd{ 
	 protected $idspecialiteclasselmd;
	 protected $idspecialite;
	 protected $idclasselmd;

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

	 public function getIdspecialiteclasselmd(){
		 return $this->idspecialiteclasselmd;
	 } 

	 public function getIdspecialite(){
		 return $this->idspecialite;
	 } 

	 public function getIdclasselmd(){
		 return $this->idclasselmd;
	 } 

	 public function setIdspecialiteclasselmd($idspecialiteclasselmd){
		 $this->idspecialiteclasselmd = $idspecialiteclasselmd;
	 } 

	 public function setIdspecialite($idspecialite){
		 $this->idspecialite = $idspecialite;
	 } 

	 public function setIdclasselmd($idclasselmd){
		 $this->idclasselmd = $idclasselmd;
	 } 
 }