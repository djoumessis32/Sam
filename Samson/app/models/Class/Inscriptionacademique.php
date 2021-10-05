<?php
        /*----GeneratorClass
        ---
        --- Classe         :inscriptionacademique
        --- date Generation: Tue, 20 Nov 2018 01:55:28 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Inscriptionacademique{ 
	 protected $idinscriptionacademique;
	 protected $idetudiant;
	 protected $idcspecialiteclasse;
	 protected $dateinscription;
	 protected $datepreinscription;
	 protected $is_inscrit;

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

	 public function getIdinscriptionacademique(){
		 return $this->idinscriptionacademique;
	 } 

	 public function getIdetudiant(){
		 return $this->idetudiant;
	 } 

	 public function getIdcspecialiteclasse(){
		 return $this->idcspecialiteclasse;
	 } 

	 public function getDateinscription(){
		 return $this->dateinscription;
	 } 

	 public function getDatepreinscription(){
		 return $this->datepreinscription;
	 } 

	 public function getIs_inscrit(){
		 return $this->is_inscrit;
	 } 

	 public function setIdinscriptionacademique($idinscriptionacademique){
		 $this->idinscriptionacademique = $idinscriptionacademique;
	 } 

	 public function setIdetudiant($idetudiant){
		 $this->idetudiant = $idetudiant;
	 } 

	 public function setIdcspecialiteclasse($idcspecialiteclasse){
		 $this->idcspecialiteclasse = $idcspecialiteclasse;
	 } 

	 public function setDateinscription($dateinscription){
		 $this->dateinscription = $dateinscription;
	 } 

	 public function setDatepreinscription($datepreinscription){
		 $this->datepreinscription = $datepreinscription;
	 } 

	 public function setIs_inscrit($is_inscrit){
		 $this->is_inscrit = $is_inscrit;
	 } 
 }