<?php
        /*----GeneratorClass
        ---
        --- Classe         :profil
        --- date Generation: Tue, 20 Nov 2018 01:56:26 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Profil{ 
	 protected $id;
	 protected $login;
	 protected $pwd;
	 protected $email;
	 protected $type;
	 protected $enregistrement;
	 protected $dateeng;
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

	 public function getLogin(){
		 return $this->login;
	 } 

	 public function getPwd(){
		 return $this->pwd;
	 } 

	 public function getEmail(){
		 return $this->email;
	 } 

	 public function getType(){
		 return $this->type;
	 } 

	 public function getEnregistrement(){
		 return $this->enregistrement;
	 } 

	 public function getDateeng(){
		 return $this->dateeng;
	 } 

	 public function getEtat(){
		 return $this->etat;
	 } 

	 public function setId($id){
		 $this->id = $id;
	 } 

	 public function setLogin($login){
		 $this->login = $login;
	 } 

	 public function setPwd($pwd){
		 $this->pwd = $pwd;
	 } 

	 public function setEmail($email){
		 $this->email = $email;
	 } 

	 public function setType($type){
		 $this->type = $type;
	 } 

	 public function setEnregistrement($enregistrement){
		 $this->enregistrement = $enregistrement;
	 } 

	 public function setDateeng($dateeng){
		 $this->dateeng = $dateeng;
	 } 

	 public function setEtat($etat){
		 $this->etat = $etat;
	 } 
 }