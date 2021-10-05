<?php
        /*----GeneratorClass
        ---
        --- Classe         :requette
        --- date Generation: Tue, 20 Nov 2018 01:57:30 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Requette{ 
	 protected $idrequette;
	 protected $iduvmatiere;
	 protected $idsession;
	 protected $idsemestre;
	 protected $idetudiant;
	 protected $statutrequette;
	 protected $daterequette;
	 protected $motifrequette;

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

	 public function getIdrequette(){
		 return $this->idrequette;
	 } 

	 public function getIduvmatiere(){
		 return $this->iduvmatiere;
	 } 

	 public function getIdsession(){
		 return $this->idsession;
	 } 

	 public function getIdsemestre(){
		 return $this->idsemestre;
	 } 

	 public function getIdetudiant(){
		 return $this->idetudiant;
	 } 

	 public function getStatutrequette(){
		 return $this->statutrequette;
	 } 

	 public function getDaterequette(){
		 return $this->daterequette;
	 } 

	 public function getMotifrequette(){
		 return $this->motifrequette;
	 } 

	 public function setIdrequette($idrequette){
		 $this->idrequette = $idrequette;
	 } 

	 public function setIduvmatiere($iduvmatiere){
		 $this->iduvmatiere = $iduvmatiere;
	 } 

	 public function setIdsession($idsession){
		 $this->idsession = $idsession;
	 } 

	 public function setIdsemestre($idsemestre){
		 $this->idsemestre = $idsemestre;
	 } 

	 public function setIdetudiant($idetudiant){
		 $this->idetudiant = $idetudiant;
	 } 

	 public function setStatutrequette($statutrequette){
		 $this->statutrequette = $statutrequette;
	 } 

	 public function setDaterequette($daterequette){
		 $this->daterequette = $daterequette;
	 } 

	 public function setMotifrequette($motifrequette){
		 $this->motifrequette = $motifrequette;
	 } 
 }