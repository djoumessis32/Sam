<?php
        /*----GeneratorClass
        ---
        --- Classe         :groupeutilisateurmenu
        --- date Generation: Tue, 20 Nov 2018 01:55:13 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Groupeutilisateurmenu{ 
	 protected $idgroupeutilisateur;
	 protected $idmenu;
	 protected $dateattribution;
	 protected $nivauaccess;
	 protected $idgroupeutilisateurmenu;

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

	 public function getIdgroupeutilisateur(){
		 return $this->idgroupeutilisateur;
	 } 

	 public function getIdmenu(){
		 return $this->idmenu;
	 } 

	 public function getDateattribution(){
		 return $this->dateattribution;
	 } 

	 public function getNivauaccess(){
		 return $this->nivauaccess;
	 } 

	 public function getIdgroupeutilisateurmenu(){
		 return $this->idgroupeutilisateurmenu;
	 } 

	 public function setIdgroupeutilisateur($idgroupeutilisateur){
		 $this->idgroupeutilisateur = $idgroupeutilisateur;
	 } 

	 public function setIdmenu($idmenu){
		 $this->idmenu = $idmenu;
	 } 

	 public function setDateattribution($dateattribution){
		 $this->dateattribution = $dateattribution;
	 } 

	 public function setNivauaccess($nivauaccess){
		 $this->nivauaccess = $nivauaccess;
	 } 

	 public function setIdgroupeutilisateurmenu($idgroupeutilisateurmenu){
		 $this->idgroupeutilisateurmenu = $idgroupeutilisateurmenu;
	 } 
 }