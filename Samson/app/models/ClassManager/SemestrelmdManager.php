<?php
        /*----GeneratorClass
        ---
        --- Classe         :semestrelmd
        --- date Generation: Tue, 20 Nov 2018 01:57:45 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  SemestrelmdManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($semestrelmd){
		 
		  $q = $this->db->prepare('INSERT INTO semestrelmd(codesemestrelmd,libellesemestrelmd) VALUES(:codesemestrelmd,:libellesemestrelmd)');
		  $q->bindValue(':codesemestrelmd',$semestrelmd->getCodesemestrelmd());
		  $q->bindValue(':libellesemestrelmd',$semestrelmd->getLibellesemestrelmd());
		  $q->execute();  

 		 $semestrelmd->hydrate(array('idsemestrelmd'=>$this->db->lastInsertId()));

	 } 

	 public function Update($semestrelmd){
		 
		  $q = $this->db->prepare('UPDATE semestrelmd SET	codesemestrelmd = :codesemestrelmd,	libellesemestrelmd = :libellesemestrelmd WHERE 	idsemestrelmd = :idsemestrelmd');
		  $q->bindValue(':idsemestrelmd',$semestrelmd->getIdsemestrelmd());
		  $q->bindValue(':codesemestrelmd',$semestrelmd->getCodesemestrelmd());
		  $q->bindValue(':libellesemestrelmd',$semestrelmd->getLibellesemestrelmd());
		  $q->execute();

	 } 

	 public function Delete($idsemestrelmd){
		 
		 $this->db->exec('DELETE FROM semestrelmd WHERE 	idsemestrelmd = $idsemestrelmd');

	 } 

	 public function GetUniqueSemestrelmd($idsemestrelmd){
		 
		 $q = $this->db->query('SELECT * FROM semestrelmd   WHERE 	idsemestrelmd = '.$idsemestrelmd);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListSemestrelmd($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM semestrelmd';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listsemestrelmd = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listsemestrelmd[] = $data;

		}
		 return $Listsemestrelmd;

	 } 

	 public function GetListMultiKeysSemestrelmd(){
		 
		 $req = 'SELECT * 
			 FROM semestrelmd';
		 $q = $this->db->query($req);
		 $Listsemestrelmd = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listsemestrelmd[] = $data;

		}
		 return $Listsemestrelmd;

	 } 

	 public function CountSemestrelmd(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM semestrelmd')->fetchColumn();

	 } 
 }