<?php
        /*----GeneratorClass
        ---
        --- Classe         :epreuve
        --- date Generation: Tue, 20 Nov 2018 01:54:01 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Evaluation{
	 protected $idevaluation;
	 protected $idmatiereuv;
	 protected $poids;
	 protected $dateepreuve;

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

     /**
      * @return mixed
      */
     public function getIdevaluation()
     {
         return $this->idevaluation;
     }



	 public function getIdmatiereuv(){
		 return $this->idmatiereuv;
	 } 

	 public function getPoids(){
		 return $this->poids;
	 } 

	 public function getDateepreuve(){
		 return $this->dateepreuve;
	 }

     /**
      * @param mixed $idevaluation
      */
     public function setIdevaluation($idevaluation)
     {
         $this->idevaluation = $idevaluation;
     }


	 public function setIdmatiereuv($idmatiereuv){
		 $this->idmatiereuv = $idmatiereuv;
	 } 

	 public function setPoids($poids){
		 $this->poids = $poids;
	 } 

	 public function setDateepreuve($dateepreuve){
		 $this->dateepreuve = $dateepreuve;
	 } 
 }