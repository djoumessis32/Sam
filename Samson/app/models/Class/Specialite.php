<?php
        /*----GeneratorClass
        ---
        --- Classe         :specialite
        --- date Generation: Tue, 20 Nov 2018 01:58:15 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Specialite{ 
	 protected $id;
	 protected $codeSP;
	 protected $nomSP;
	 protected $niveau;
	 protected $date_enreg;
	 protected $etat;
	 protected $id_filiere;

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

	 public function getCodeSP(){
		 return $this->codeSP;
	 } 

	 public function getNomSP(){
		 return $this->nomSP;
	 } 

	 public function getNiveau(){
		 return $this->niveau;
	 } 

	 public function getDate_enreg(){
		 return $this->date_enreg;
	 } 

	 public function getEtat(){
		 return $this->etat;
	 } 

	 public function getId_filiere(){
		 return $this->id_filiere;
	 } 

	 public function setId($id){
		 $this->id = $id;
	 } 

	 public function setCodeSP($codeSP){
		 $this->codeSP = $codeSP;
	 } 

	 public function setNomSP($nomSP){
		 $this->nomSP = $nomSP;
	 } 

	 public function setNiveau($niveau){
		 $this->niveau = $niveau;
	 } 

	 public function setDate_enreg($date_enreg){
		 $this->date_enreg = $date_enreg;
	 } 

	 public function setEtat($etat){
		 $this->etat = $etat;
	 } 

	 public function setId_filiere($id_filiere){
		 $this->id_filiere = $id_filiere;
	 } 
 }