<?php
        /*----GeneratorClass
        ---
        --- Classe         :enseignantuvmatiere
        --- date Generation: Tue, 20 Nov 2018 01:53:46 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Enseignantuvmatiere{ 
	 protected $idenseignantuvmatiere;
	 protected $idenseignant;
	 protected $iduvmatiere;
	 protected $dateenseignantuvmatiere;

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

	 public function getIdenseignantuvmatiere(){
		 return $this->idenseignantuvmatiere;
	 } 

	 public function getIdenseignant(){
		 return $this->idenseignant;
	 } 

	 public function getIduvmatiere(){
		 return $this->iduvmatiere;
	 } 

	 public function getDateenseignantuvmatiere(){
		 return $this->dateenseignantuvmatiere;
	 } 

	 public function setIdenseignantuvmatiere($idenseignantuvmatiere){
		 $this->idenseignantuvmatiere = $idenseignantuvmatiere;
	 } 

	 public function setIdenseignant($idenseignant){
		 $this->idenseignant = $idenseignant;
	 } 

	 public function setIduvmatiere($iduvmatiere){
		 $this->iduvmatiere = $iduvmatiere;
	 } 

	 public function setDateenseignantuvmatiere($dateenseignantuvmatiere){
		 $this->dateenseignantuvmatiere = $dateenseignantuvmatiere;
	 } 
 }