<?php
        /*----GeneratorClass
        ---
        --- Classe         :application
        --- date Generation: Tue, 20 Nov 2018 01:52:28 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Application{ 
	 protected $idapplication;
	 protected $libelle_fr;
	 protected $libelle_en;
	 protected $version;
	 protected $acronyme;
	 protected $logo;
	 protected $is_install;

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

	 public function getIdapplication(){
		 return $this->idapplication;
	 } 

	 public function getLibelle_fr(){
		 return $this->libelle_fr;
	 } 

	 public function getLibelle_en(){
		 return $this->libelle_en;
	 } 

	 public function getVersion(){
		 return $this->version;
	 } 

	 public function getAcronyme(){
		 return $this->acronyme;
	 } 

	 public function getLogo(){
		 return $this->logo;
	 } 

	 public function getIs_install(){
		 return $this->is_install;
	 } 

	 public function setIdapplication($idapplication){
		 $this->idapplication = $idapplication;
	 } 

	 public function setLibelle_fr($libelle_fr){
		 $this->libelle_fr = $libelle_fr;
	 } 

	 public function setLibelle_en($libelle_en){
		 $this->libelle_en = $libelle_en;
	 } 

	 public function setVersion($version){
		 $this->version = $version;
	 } 

	 public function setAcronyme($acronyme){
		 $this->acronyme = $acronyme;
	 } 

	 public function setLogo($logo){
		 $this->logo = $logo;
	 } 

	 public function setIs_install($is_install){
		 $this->is_install = $is_install;
	 } 
 }