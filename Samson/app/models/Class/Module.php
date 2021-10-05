<?php
        /*----GeneratorClass
        ---
        --- Classe         :module
        --- date Generation: Tue, 20 Nov 2018 01:55:57 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Module{ 
	 protected $id;
	 protected $nom;
	 protected $semestre;
	 protected $id_specialite;
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

	 public function getNom(){
		 return $this->nom;
	 } 

	 public function getSemestre(){
		 return $this->semestre;
	 } 

	 public function getId_specialite(){
		 return $this->id_specialite;
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

	 public function setNom($nom){
		 $this->nom = $nom;
	 } 

	 public function setSemestre($semestre){
		 $this->semestre = $semestre;
	 } 

	 public function setId_specialite($id_specialite){
		 $this->id_specialite = $id_specialite;
	 } 

	 public function setDate_enreg($date_enreg){
		 $this->date_enreg = $date_enreg;
	 } 

	 public function setEtat($etat){
		 $this->etat = $etat;
	 } 
 }