<?php
        /*----GeneratorClass
        ---
        --- Classe         :classesemestrelmd
        --- date Generation: Tue, 20 Nov 2018 01:53:00 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  ClassesemestrelmdManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($classesemestrelmd){
		 
		  $q = $this->db->prepare('INSERT INTO classesemestrelmd(idclasselmd,idsemestre,ordreclassesemestrelmd) VALUES(:idclasselmd,:idsemestre,:ordreclassesemestrelmd)');
		  $q->bindValue(':idclasselmd',$classesemestrelmd->getIdclasselmd());
		  $q->bindValue(':idsemestre',$classesemestrelmd->getIdsemestre());
		  $q->bindValue(':ordreclassesemestrelmd',$classesemestrelmd->getOrdreclassesemestrelmd());
		  $q->execute();  

 		 $classesemestrelmd->hydrate(array('idclassesemestrelmd'=>$this->db->lastInsertId()));

	 } 

	 public function Update($classesemestrelmd){
		 
		  $q = $this->db->prepare('UPDATE classesemestrelmd SET	idclasselmd = :idclasselmd,	idsemestre = :idsemestre,	ordreclassesemestrelmd = :ordreclassesemestrelmd WHERE 	idclassesemestrelmd = :idclassesemestrelmd');
		  $q->bindValue(':idclassesemestrelmd',$classesemestrelmd->getIdclassesemestrelmd());
		  $q->bindValue(':idclasselmd',$classesemestrelmd->getIdclasselmd());
		  $q->bindValue(':idsemestre',$classesemestrelmd->getIdsemestre());
		  $q->bindValue(':ordreclassesemestrelmd',$classesemestrelmd->getOrdreclassesemestrelmd());
		  $q->execute();

	 } 

	 public function Delete($idclassesemestrelmd){
		 
		 $this->db->exec('DELETE FROM classesemestrelmd WHERE 	idclassesemestrelmd = $idclassesemestrelmd');

	 } 

	 public function GetUniqueClassesemestrelmd($idclassesemestrelmd){
		 
		 $q = $this->db->query('SELECT * FROM classesemestrelmd   WHERE 	idclassesemestrelmd = '.$idclassesemestrelmd);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListClassesemestrelmd($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM classesemestrelmd';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listclassesemestrelmd = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listclassesemestrelmd[] = $data;

		}
		 return $Listclassesemestrelmd;

	 } 

	 public function GetListMultiKeysClassesemestrelmd($idclasselmd,$idsemestre){
		 
		 $req = 'SELECT * 
			 FROM classesemestrelmd , classelmd , semestrelmd
			 WHERE 	classesemestrelmd.idclasselmd = classelmd.idclasselmd
			 AND classesemestrelmd.idsemestre = semestrelmd.idsemestrelmd
			 AND 	idclasselmd = '.$idclasselmd.'
			 AND 	idsemestre = '.$idsemestre.'';
		 $q = $this->db->query($req);
		 $Listclassesemestrelmd = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listclassesemestrelmd[] = $data;

		}
		 return $Listclassesemestrelmd;

	 } 

	 public function CountClassesemestrelmd(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM classesemestrelmd')->fetchColumn();

	 } 
 }