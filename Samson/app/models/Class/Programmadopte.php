<?php
        /*----GeneratorClass
        ---
        --- Classe         :programmadopte
        --- date Generation: Tue, 20 Nov 2018 01:56:41 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Programmadopte{ 
	 protected $idprogrammadopte;
	 protected $idprogramme;
	 protected $idanneeacademique;
	 protected $idspecialiteclasse;
     protected $idsemestre;

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

	 public function getIdprogrammadopte(){
		 return $this->idprogrammadopte;
	 } 

	 public function getIdprogramme(){
		 return $this->idprogramme;
	 } 

	 public function getIdanneeacademique(){
		 return $this->idanneeacademique;
	 } 

	 public function getIdspecialiteclasse(){
		 return $this->idspecialiteclasse;
	 }
     public function getIdsemestre()
     {
         return $this->idsemestre;
     }

	 public function setIdprogrammadopte($idprogrammadopte){
		 $this->idprogrammadopte = $idprogrammadopte;
	 } 

	 public function setIdprogramme($idprogramme){
		 $this->idprogramme = $idprogramme;
	 } 

	 public function setIdanneeacademique($idanneeacademique){
		 $this->idanneeacademique = $idanneeacademique;
	 } 

	 public function setIdspecialiteclasse($idspecialiteclasse){
		 $this->idspecialiteclasse = $idspecialiteclasse;
	 }

     public function setIdsemestre($idsemestre)
     {
         $this->idsemestre = $idsemestre;
     }

 }