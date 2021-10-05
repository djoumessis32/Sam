<?php
        /*----GeneratorClass
        ---
        --- Classe         :uniteenseignement
        --- date Generation: Tue, 20 Nov 2018 01:59:29 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Uniteenseignement{ 
	 protected $iduniteenseignement;
	 protected $codeuniteenseignement;
	 protected $libelleuniteenseignement;
	 protected $nbcreditsue;
	 protected $notevalidationue;
	 protected $noteeleminerue;

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

	 public function getIduniteenseignement(){
		 return $this->iduniteenseignement;
	 } 

	 public function getCodeuniteenseignement(){
		 return $this->codeuniteenseignement;
	 } 

	 public function getLibelleuniteenseignement(){
		 return $this->libelleuniteenseignement;
	 } 

	 public function getNbcreditsue(){
		 return $this->nbcreditsue;
	 } 

	 public function getNotevalidationue(){
		 return $this->notevalidationue;
	 } 

	 public function getNoteeleminerue(){
		 return $this->noteeleminerue;
	 } 

	 public function setIduniteenseignement($iduniteenseignement){
		 $this->iduniteenseignement = $iduniteenseignement;
	 } 

	 public function setCodeuniteenseignement($codeuniteenseignement){
		 $this->codeuniteenseignement = $codeuniteenseignement;
	 } 

	 public function setLibelleuniteenseignement($libelleuniteenseignement){
		 $this->libelleuniteenseignement = $libelleuniteenseignement;
	 } 

	 public function setNbcreditsue($nbcreditsue){
		 $this->nbcreditsue = $nbcreditsue;
	 } 

	 public function setNotevalidationue($notevalidationue){
		 $this->notevalidationue = $notevalidationue;
	 } 

	 public function setNoteeleminerue($noteeleminerue){
		 $this->noteeleminerue = $noteeleminerue;
	 } 
 }