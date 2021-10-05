<?php
        /*----GeneratorClass
        ---
        --- Classe         :uvmatiere
        --- date Generation: Tue, 20 Nov 2018 01:59:57 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Uvmatiere{ 
	 protected $iduvmatiere;
	 protected $codeuvmatiere;
	 protected $libelle_fr_uvmatiere;
	 protected $libelle_en_uvmatiere;
	 protected $ncredis;
	 protected $notevaliduvmatiere;
	 protected $noteelimuvmatiere;
     protected $vlmhoraire;

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

	 public function getIduvmatiere(){
		 return $this->iduvmatiere;
	 } 

	 public function getCodeuvmatiere(){
		 return $this->codeuvmatiere;
	 } 

	 public function getLibelle_fr_uvmatiere(){
		 return $this->libelle_fr_uvmatiere;
	 } 

	 public function getLibelle_en_uvmatiere(){
		 return $this->libelle_en_uvmatiere;
	 } 

	 public function getNcredis(){
		 return $this->ncredis;
	 } 

	 public function getNotevaliduvmatiere(){
		 return $this->notevaliduvmatiere;
	 } 

	 public function getNoteelimuvmatiere(){
		 return $this->noteelimuvmatiere;
	 }

     /**
      * @return mixed
      */
     public function getVlmhoraire()
     {
         return $this->vlmhoraire;
     }

	 public function setIduvmatiere($iduvmatiere){
		 $this->iduvmatiere = $iduvmatiere;
	 } 

	 public function setCodeuvmatiere($codeuvmatiere){
		 $this->codeuvmatiere = $codeuvmatiere;
	 } 

	 public function setLibelle_fr_uvmatiere($libelle_fr_uvmatiere){
		 $this->libelle_fr_uvmatiere = $libelle_fr_uvmatiere;
	 } 

	 public function setLibelle_en_uvmatiere($libelle_en_uvmatiere){
		 $this->libelle_en_uvmatiere = $libelle_en_uvmatiere;
	 } 

	 public function setNcredis($ncredis){
		 $this->ncredis = $ncredis;
	 } 

	 public function setNotevaliduvmatiere($notevaliduvmatiere){
		 $this->notevaliduvmatiere = $notevaliduvmatiere;
	 } 

	 public function setNoteelimuvmatiere($noteelimuvmatiere){
		 $this->noteelimuvmatiere = $noteelimuvmatiere;
	 }

     /**
      * @param mixed $vlmhoraire
      */
     public function setVlmhoraire($vlmhoraire)
     {
         $this->vlmhoraire = $vlmhoraire;
     }

 }