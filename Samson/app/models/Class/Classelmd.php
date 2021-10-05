<?php
        /*----GeneratorClass
        ---
        --- Classe         :classelmd
        --- date Generation: Tue, 20 Nov 2018 01:52:44 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Classelmd{ 
	 protected $idclasselmd;
	 protected $codeclasselmd;
	 protected $libelleclasselmd;

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

	 public function getIdclasselmd(){
		 return $this->idclasselmd;
	 } 

	 public function getCodeclasselmd(){
		 return $this->codeclasselmd;
	 } 

	 public function getLibelleclasselmd(){
		 return $this->libelleclasselmd;
	 } 

	 public function setIdclasselmd($idclasselmd){
		 $this->idclasselmd = $idclasselmd;
	 } 

	 public function setCodeclasselmd($codeclasselmd){
		 $this->codeclasselmd = $codeclasselmd;
	 } 

	 public function setLibelleclasselmd($libelleclasselmd){
		 $this->libelleclasselmd = $libelleclasselmd;
	 } 
 }