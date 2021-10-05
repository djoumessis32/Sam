<?php
        /*----GeneratorClass
        ---
        --- Classe         :note
        --- date Generation: Tue, 20 Nov 2018 01:56:11 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Note{ 
	 protected $id;
	 protected $controle_continu;
	 protected $examen;
	 protected $rattrapage;
	 protected $id_etudiant;
	 protected $id_unite_enseignement;
	 protected $id_annee_academique;
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

	 public function getControle_continu(){
		 return $this->controle_continu;
	 } 

	 public function getExamen(){
		 return $this->examen;
	 } 

	 public function getRattrapage(){
		 return $this->rattrapage;
	 } 

	 public function getId_etudiant(){
		 return $this->id_etudiant;
	 } 

	 public function getId_unite_enseignement(){
		 return $this->id_unite_enseignement;
	 } 

	 public function getId_annee_academique(){
		 return $this->id_annee_academique;
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

	 public function setControle_continu($controle_continu){
		 $this->controle_continu = $controle_continu;
	 } 

	 public function setExamen($examen){
		 $this->examen = $examen;
	 } 

	 public function setRattrapage($rattrapage){
		 $this->rattrapage = $rattrapage;
	 } 

	 public function setId_etudiant($id_etudiant){
		 $this->id_etudiant = $id_etudiant;
	 } 

	 public function setId_unite_enseignement($id_unite_enseignement){
		 $this->id_unite_enseignement = $id_unite_enseignement;
	 } 

	 public function setId_annee_academique($id_annee_academique){
		 $this->id_annee_academique = $id_annee_academique;
	 } 

	 public function setDate_enreg($date_enreg){
		 $this->date_enreg = $date_enreg;
	 } 

	 public function setEtat($etat){
		 $this->etat = $etat;
	 } 
 }