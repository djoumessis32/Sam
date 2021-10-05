<?php
        /*----GeneratorClass
        ---
        --- Classe         :annee_academique
        --- date Generation: Tue, 20 Nov 2018 01:52:16 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Annee_academique{ 
	 protected $id;
	 protected $nomAC;
	 protected $statut;
	 protected $date_enreg;
	 protected $ordre;

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

	 public function getNomAC(){
		 return $this->nomAC;
	 } 

	 public function getStatut(){
		 return $this->statut;
	 } 

	 public function getDate_enreg(){
		 return $this->date_enreg;
	 } 

	 public function getOrdre(){
		 return $this->ordre;
	 } 

	 public function setId($id){
		 $this->id = $id;
	 } 

	 public function setNomAC($nomAC){
		 $this->nomAC = $nomAC;
	 } 

	 public function setStatut($statut){
		 $this->statut = $statut;
	 } 

	 public function setDate_enreg($date_enreg){
		 $this->date_enreg = $date_enreg;
	 } 

	 public function setOrdre($ordre){
		 $this->ordre = $ordre;
	 } 
 }