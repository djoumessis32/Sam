<?php
        /*----GeneratorClass
        ---
        --- Classe         :filiere
        --- date Generation: Tue, 20 Nov 2018 01:54:43 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Filiere{ 
	 protected $id;
	 protected $codeFil;
	 protected $nomFil;
	 protected $cycle;
	 protected $date_enreg;
	 protected $etat;
	 protected $cursus;
	 protected $idcampus;

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

	 public function getCodeFil(){
		 return $this->codeFil;
	 } 

	 public function getNomFil(){
		 return $this->nomFil;
	 } 

	 public function getCycle(){
		 return $this->cycle;
	 } 

	 public function getDate_enreg(){
		 return $this->date_enreg;
	 } 

	 public function getEtat(){
		 return $this->etat;
	 }

     /**
      * @return mixed
      */
     public function getIdcampus()
     {
         return $this->idcampus;
     }

     /**
      * @param mixed $idcampus
      */
     public function setIdcampus($idcampus)
     {
         $this->idcampus = $idcampus;
     }


	 public function setId($id){
		 $this->id = $id;
	 } 

	 public function setCodeFil($codeFil){
		 $this->codeFil = $codeFil;
	 } 

	 public function setNomFil($nomFil){
		 $this->nomFil = $nomFil;
	 } 

	 public function setCycle($cycle){
		 $this->cycle = $cycle;
	 } 

	 public function setDate_enreg($date_enreg){
		 $this->date_enreg = $date_enreg;
	 } 

	 public function setEtat($etat){
		 $this->etat = $etat;
	 } 

	 /**
	  * Get the value of cursus
	  */ 
	 public function getCursus()
	 {
	 	 return $this->cursus;
	 }

	 /**
	  * Set the value of cursus
	  *
	  * @return  self
	  */ 
	 public function setCursus($cursus)
	 {
	 	 $this->cursus = $cursus;

	 }
 }