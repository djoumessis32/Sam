<?php
        /*----GeneratorClass
        ---
        --- Classe         :filiere
        --- date Generation: Tue, 20 Nov 2018 01:54:43 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  FiliereManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($filiere){

         try{

         $q = $this->db->prepare('INSERT INTO filiere(codeFil,nomFil,cycle,idcursus,date_enreg,etat,idcampus) VALUES(:codeFil,:nomFil,:cycle,:idcursus,:date_enreg,:etat,:idcampus)');
		  $q->bindValue(':codeFil',$filiere->getCodeFil());
		  $q->bindValue(':nomFil',$filiere->getNomFil());
		  $q->bindValue(':cycle',$filiere->getCycle());
		  $q->bindValue(':idcursus',$filiere->getCursus());
		  $q->bindValue(':date_enreg',$filiere->getDate_enreg());
		  $q->bindValue(':etat',$filiere->getEtat());
		  $q->bindValue(':idcampus',$filiere->getIdcampus());
		  $q->execute();

 		 $filiere->hydrate(array('id'=>$this->db->lastInsertId()));
 		 return 1;
         }catch (Exception $e){

             return 0;
         }


	 } 

	 public function Update($filiere){

		try{
		 
		  $q = $this->db->prepare('UPDATE filiere SET	codeFil = :codeFil,	nomFil = :nomFil,	cycle = :cycle,	date_enreg = :date_enreg,	etat = :etat, idcursus = :cursus WHERE 	id = :id');
		  $q->bindValue(':id',$filiere->getId());
		  $q->bindValue(':codeFil',$filiere->getCodeFil());
		  $q->bindValue(':nomFil',$filiere->getNomFil());
		  $q->bindValue(':cycle',$filiere->getCycle());
		  $q->bindValue(':date_enreg',$filiere->getDate_enreg());
		  $q->bindValue(':etat',$filiere->getEtat());
		  $q->bindValue(':cursus',$filiere->getCursus());
		  $q->execute();

		  return 1;
	}catch (Exception $e){
		return 0;
	}

	 } 

	 public function Delete($id){
		 
		 $this->db->exec('DELETE FROM filiere WHERE 	id = $id');

	 } 

	 public function GetUniqueFiliere($id){
		 
		 $q = $this->db->query('SELECT * FROM filiere   WHERE 	id = '.$id);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListFiliere($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM filiere';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listfiliere = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listfiliere[] = $data;

		}
		 return $Listfiliere;

	 } 

	 public function GetListMultiKeysFiliere(){
		 
		 $req = 'SELECT * 
			 FROM filiere';
		 $q = $this->db->query($req);
		 $Listfiliere = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listfiliere[] = $data;

		}
		 return $Listfiliere;

	 } 

	 public function CountFiliere(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM filiere')->fetchColumn();

	 } 
 }