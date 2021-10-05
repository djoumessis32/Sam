<?php
        /*----GeneratorClass
        ---
        --- Classe         :ue_uv
        --- date Generation: Tue, 20 Nov 2018 01:58:59 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Ue_uv{ 
	 protected $idue_uv;
	 protected $idue;
	 protected $iduv;

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

	 public function getIdue_uv(){
		 return $this->idue_uv;
	 } 

	 public function getIdue(){
		 return $this->idue;
	 } 

	 public function getIduv(){
		 return $this->iduv;
	 } 

	 public function setIdue_uv($idue_uv){
		 $this->idue_uv = $idue_uv;
	 } 

	 public function setIdue($idue){
		 $this->idue = $idue;
	 } 

	 public function setIduv($iduv){
		 $this->iduv = $iduv;
	 } 
 }