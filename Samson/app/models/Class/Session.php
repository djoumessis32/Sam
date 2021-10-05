<?php
        /*----GeneratorClass
        ---
        --- Classe         :session
        --- date Generation: Tue, 20 Nov 2018 01:58:00 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Session{ 
	 protected $idsession;
	 protected $codesession;
	 protected $libellesession;
	 protected $idsessionrattache;
	 protected $idtypesession;
	 protected $idanneeacademique;

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

	 public function getIdsession(){
		 return $this->idsession;
	 } 

	 public function getCodesession(){
		 return $this->codesession;
	 } 

	 public function getLibellesession(){
		 return $this->libellesession;
	 } 

	 public function getIdsessionrattache(){
		 return $this->idsessionrattache;
	 } 

	 public function getIdtypesession(){
		 return $this->idtypesession;
	 } 

	 public function getIdanneeacademique(){
		 return $this->idanneeacademique;
	 } 

	 public function setIdsession($idsession){
		 $this->idsession = $idsession;
	 } 

	 public function setCodesession($codesession){
		 $this->codesession = $codesession;
	 } 

	 public function setLibellesession($libellesession){
		 $this->libellesession = $libellesession;
	 } 

	 public function setIdsessionrattache($idsessionrattache){
		 $this->idsessionrattache = $idsessionrattache;
	 } 

	 public function setIdtypesession($idtypesession){
		 $this->idtypesession = $idtypesession;
	 } 

	 public function setIdanneeacademique($idanneeacademique){
		 $this->idanneeacademique = $idanneeacademique;
	 } 
 }