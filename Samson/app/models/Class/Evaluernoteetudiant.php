<?php
        /*----GeneratorClass
        ---
        --- Classe         :evaluernoteetudiant
        --- date Generation: Tue, 20 Nov 2018 01:54:29 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Evaluernoteetudiant{ 
	 protected $idevaluernoteetudiant;
	 protected $idsemestre;
	 protected $idsession;
	 protected $idepreueve;
	 protected $idspecialite;
	 protected $idetudiant;
	 protected $cc;
	 protected $examen;
	 protected $anonymat;
	 protected $notefinale;
	 protected $pq;
	 protected $mention;
	 protected $grade;
	 protected $is_acquis;

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

	 public function getIdevaluernoteetudiant(){
		 return $this->idevaluernoteetudiant;
	 } 

	 public function getIdsemestre(){
		 return $this->idsemestre;
	 } 

	 public function getIdsession(){
		 return $this->idsession;
	 } 

	 public function getIdepreueve(){
		 return $this->idepreueve;
	 } 

	 public function getIdspecialite(){
		 return $this->idspecialite;
	 } 

	 public function getIdetudiant(){
		 return $this->idetudiant;
	 } 

	 public function getCc(){
		 return $this->cc;
	 } 

	 public function getExamen(){
		 return $this->examen;
	 } 

	 public function getAnonymat(){
		 return $this->anonymat;
	 } 

	 public function getNotefinale(){
		 return $this->notefinale;
	 } 

	 public function getPq(){
		 return $this->pq;
	 } 

	 public function getMention(){
		 return $this->mention;
	 } 

	 public function getGrade(){
		 return $this->grade;
	 } 

	 public function getIs_acquis(){
		 return $this->is_acquis;
	 } 

	 public function setIdevaluernoteetudiant($idevaluernoteetudiant){
		 $this->idevaluernoteetudiant = $idevaluernoteetudiant;
	 } 

	 public function setIdsemestre($idsemestre){
		 $this->idsemestre = $idsemestre;
	 } 

	 public function setIdsession($idsession){
		 $this->idsession = $idsession;
	 } 

	 public function setIdepreueve($idepreueve){
		 $this->idepreueve = $idepreueve;
	 } 

	 public function setIdspecialite($idspecialite){
		 $this->idspecialite = $idspecialite;
	 } 

	 public function setIdetudiant($idetudiant){
		 $this->idetudiant = $idetudiant;
	 } 

	 public function setCc($cc){
		 $this->cc = $cc;
	 } 

	 public function setExamen($examen){
		 $this->examen = $examen;
	 } 

	 public function setAnonymat($anonymat){
		 $this->anonymat = $anonymat;
	 } 

	 public function setNotefinale($notefinale){
		 $this->notefinale = $notefinale;
	 } 

	 public function setPq($pq){
		 $this->pq = $pq;
	 } 

	 public function setMention($mention){
		 $this->mention = $mention;
	 } 

	 public function setGrade($grade){
		 $this->grade = $grade;
	 } 

	 public function setIs_acquis($is_acquis){
		 $this->is_acquis = $is_acquis;
	 } 
 }