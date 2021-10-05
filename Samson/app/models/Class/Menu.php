<?php
        /*----GeneratorClass
        ---
        --- Classe         :menu
        --- date Generation: Tue, 20 Nov 2018 01:55:43 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Menu{ 
	 protected $idmenu;
	 protected $idparent;
	 protected $idfils;
	 protected $libelle_fr;
	 protected $libelle_en;
	 protected $icon;
	 protected $lien;
	 protected $idlien;
	 protected $fichierrequete;
	 protected $fichierassocier;
	 protected $dossierviews;

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

	 public function getIdmenu(){
		 return $this->idmenu;
	 } 

	 public function getIdparent(){
		 return $this->idparent;
	 } 

	 public function getIdfils(){
		 return $this->idfils;
	 } 

	 public function getLibelle_fr(){
		 return $this->libelle_fr;
	 } 

	 public function getLibelle_en(){
		 return $this->libelle_en;
	 } 

	 public function getIcon(){
		 return $this->icon;
	 } 

	 public function getLien(){
		 return $this->lien;
	 } 

	 public function getIdlien(){
		 return $this->idlien;
	 } 

	 public function getFichierrequete(){
		 return $this->fichierrequete;
	 } 

	 public function getFichierassocier(){
		 return $this->fichierassocier;
	 } 

	 public function getDossierviews(){
		 return $this->dossierviews;
	 } 

	 public function setIdmenu($idmenu){
		 $this->idmenu = $idmenu;
	 } 

	 public function setIdparent($idparent){
		 $this->idparent = $idparent;
	 } 

	 public function setIdfils($idfils){
		 $this->idfils = $idfils;
	 } 

	 public function setLibelle_fr($libelle_fr){
		 $this->libelle_fr = $libelle_fr;
	 } 

	 public function setLibelle_en($libelle_en){
		 $this->libelle_en = $libelle_en;
	 } 

	 public function setIcon($icon){
		 $this->icon = $icon;
	 } 

	 public function setLien($lien){
		 $this->lien = $lien;
	 } 

	 public function setIdlien($idlien){
		 $this->idlien = $idlien;
	 } 

	 public function setFichierrequete($fichierrequete){
		 $this->fichierrequete = $fichierrequete;
	 } 

	 public function setFichierassocier($fichierassocier){
		 $this->fichierassocier = $fichierassocier;
	 } 

	 public function setDossierviews($dossierviews){
		 $this->dossierviews = $dossierviews;
	 } 
 }