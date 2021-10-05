<?php
        /*----GeneratorClass
        ---
        --- Manager         :type_operation
        --- date Generation: Sun, 09 Aug 2020 23:01:22 +0200
        --- Auteur         : Erick KONGNE FAH
        --- mysql version  : 5.6.21
        --- php version    : 5.6.3*/

 class  Type_operationManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($type_operation){
		 try{

			  $q = $this->db->prepare('INSERT INTO type_operation(libelletype_operation) VALUES(:libelletype_operation)');
			  $q->bindValue(':libelletype_operation',$type_operation->getLibelletype_operation());
			  $q->execute();  

 		 $type_operation->hydrate(array('idtype_operation'=>$this->db->lastInsertId()));
			  return 1;
		}catch(Exception $exception){
		 return 0;
		}

	 } 

	 public function Update($type_operation){
		 
		  $q = $this->db->prepare('UPDATE type_operation SET	libelletype_operation = :libelletype_operation WHERE 	idtype_operation = :idtype_operation');
		  $q->bindValue(':idtype_operation',$type_operation->getIdtype_operation());
		  $q->bindValue(':libelletype_operation',$type_operation->getLibelletype_operation());
		  $q->execute();

	 } 

	 public function Delete($idtype_operation){
		 
		 $this->db->exec('DELETE FROM type_operation WHERE 	idtype_operation = $idtype_operation');

	 } 

	 public function GetUniqueType_operation($idtype_operation){
		 
		 $q = $this->db->query('SELECT * FROM type_operation   WHERE 	idtype_operation = '.$idtype_operation);
		 return $q->fetch(\PDO::FETCH_ASSOC); 

	 } 

	 public function GetListType_operation($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM type_operation';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listtype_operation = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listtype_operation[] = $data;

		}
		 return $Listtype_operation;

	 } 

	 public function GetListMultiKeysType_operation(){
		 
		 $req = 'SELECT * 
			 FROM type_operation';
		 $q = $this->db->query($req);
		 $Listtype_operation = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listtype_operation[] = $data;

		}
		 return $Listtype_operation;

	 } 

	 public function CountType_operation(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM type_operation')->fetchColumn();

	 } 

	 public function MAXType_operation(){
		 
		  return $this->db->query('SELECT MAX(idtype_operation) FROM type_operation')->fetchColumn();

	 } 
 }