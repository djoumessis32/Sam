<?php
        /*----GeneratorClass
        ---
        --- Classe         :unite_enseignement
        --- date Generation: Tue, 20 Nov 2018 01:59:14 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Unite_enseignement{ 
	 protected $id;
	 protected $codeUE;
	 protected $nomUE;
	 protected $credit;
	 protected $date_enreg;
	 protected $etat;
	 protected $id_enseignant;
	 protected $id_module;

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

	 public function getCodeUE(){
		 return $this->codeUE;
	 } 

	 public function getNomUE(){
		 return $this->nomUE;
	 } 

	 public function getCredit(){
		 return $this->credit;
	 } 

	 public function getDate_enreg(){
		 return $this->date_enreg;
	 } 

	 public function getEtat(){
		 return $this->etat;
	 } 

	 public function getId_enseignant(){
		 return $this->id_enseignant;
	 } 

	 public function getId_module(){
		 return $this->id_module;
	 } 

	 public function setId($id){
		 $this->id = $id;
	 } 

	 public function setCodeUE($codeUE){
		 $this->codeUE = $codeUE;
	 } 

	 public function setNomUE($nomUE){
		 $this->nomUE = $nomUE;
	 } 

	 public function setCredit($credit){
		 $this->credit = $credit;
	 } 

	 public function setDate_enreg($date_enreg){
		 $this->date_enreg = $date_enreg;
	 } 

	 public function setEtat($etat){
		 $this->etat = $etat;
	 } 

	 public function setId_enseignant($id_enseignant){
		 $this->id_enseignant = $id_enseignant;
	 } 

	 public function setId_module($id_module){
		 $this->id_module = $id_module;
	 } 
 }