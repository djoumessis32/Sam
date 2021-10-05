<?php
        /*----GeneratorClass
        ---
        --- Classe         :groupeutilisateur
        --- date Generation: Tue, 20 Nov 2018 01:54:58 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Groupeutilisateur{ 
	 protected $idgroupeutilisateur;
	 protected $codegroupeutilisateur;
	 protected $libellegroupeutilisateur;
	 protected $etatgroupe;

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

	 public function getIdgroupeutilisateur(){
		 return $this->idgroupeutilisateur;
	 } 

	 public function getCodegroupeutilisateur(){
		 return $this->codegroupeutilisateur;
	 } 

	 public function getLibellegroupeutilisateur(){
		 return $this->libellegroupeutilisateur;
	 } 

	 public function getEtatgroupe(){
		 return $this->etatgroupe;
	 } 

	 public function setIdgroupeutilisateur($idgroupeutilisateur){
		 $this->idgroupeutilisateur = $idgroupeutilisateur;
	 } 

	 public function setCodegroupeutilisateur($codegroupeutilisateur){
		 $this->codegroupeutilisateur = $codegroupeutilisateur;
	 } 

	 public function setLibellegroupeutilisateur($libellegroupeutilisateur){
		 $this->libellegroupeutilisateur = $libellegroupeutilisateur;
	 } 

	 public function setEtatgroupe($etatgroupe){
		 $this->etatgroupe = $etatgroupe;
	 } 
 }