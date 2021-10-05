<?php
        /*----GeneratorClass
        ---
        --- Classe         :periode
        --- date Generation: Sun, 09 Aug 2020 23:00:44 +0200
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.6.3*/

 class  Periode{ 
	 protected $idperiode;
	 protected $idtype_operation;
	 protected $date_debut;
	 protected $date_fin;
	 protected $actif;
	 protected $idannee;
	 protected $idsession;

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

	 public function getIdperiode(){
		 return $this->idperiode;
	 } 

	 public function getIdtype_operation(){
		 return $this->idtype_operation;
	 } 

	 public function getDate_debut(){
		 return $this->date_debut;
	 } 

	 public function getDate_fin(){
		 return $this->date_fin;
	 } 

	 public function getActif(){
		 return $this->actif;
	 } 

	 public function getIdannee(){
		 return $this->idannee;
	 } 

	 public function getIdsession(){
		 return $this->idsession;
	 } 

	 public function setIdperiode($idperiode){
		 $this->idperiode = $idperiode;
	 } 

	 public function setIdtype_operation($idtype_operation){
		 $this->idtype_operation = $idtype_operation;
	 } 

	 public function setDate_debut($date_debut){
		 $this->date_debut = $date_debut;
	 } 

	 public function setDate_fin($date_fin){
		 $this->date_fin = $date_fin;
	 } 

	 public function setActif($actif){
		 $this->actif = $actif;
	 } 

	 public function setIdannee($idannee){
		 $this->idannee = $idannee;
	 } 

	 public function setIdsession($idsession){
		 $this->idsession = $idsession;
	 } 
 }