<?php
        /*----GeneratorClass
        ---
        --- Classe         :config
        --- date Generation: Tue, 20 Nov 2018 01:53:15 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Config{ 
	 protected $id;
	 protected $login_pass;
	 protected $jury;
	 protected $date_jury;
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

	 public function getLogin_pass(){
		 return $this->login_pass;
	 } 

	 public function getJury(){
		 return $this->jury;
	 } 

	 public function getDate_jury(){
		 return $this->date_jury;
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

	 public function setLogin_pass($login_pass){
		 $this->login_pass = $login_pass;
	 } 

	 public function setJury($jury){
		 $this->jury = $jury;
	 } 

	 public function setDate_jury($date_jury){
		 $this->date_jury = $date_jury;
	 } 

	 public function setDate_enreg($date_enreg){
		 $this->date_enreg = $date_enreg;
	 } 

	 public function setEtat($etat){
		 $this->etat = $etat;
	 } 
 }