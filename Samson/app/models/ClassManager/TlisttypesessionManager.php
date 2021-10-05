<?php
        /*----GeneratorClass
        ---
        --- Classe         :tlisttypesession
        --- date Generation: Tue, 20 Nov 2018 01:58:44 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  TlisttypesessionManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($tlisttypesession){
		 
		  $q = $this->db->prepare('INSERT INTO tlisttypesession(libelletlisttypesession) VALUES(:libelletlisttypesession)');
		  $q->bindValue(':libelletlisttypesession',$tlisttypesession->getLibelletlisttypesession());
		  $q->execute();  

 		 $tlisttypesession->hydrate(array('idtlisttypesession'=>$this->db->lastInsertId()));

	 } 

	 public function Update($tlisttypesession){
		 
		  $q = $this->db->prepare('UPDATE tlisttypesession SET	libelletlisttypesession = :libelletlisttypesession WHERE 	idtlisttypesession = :idtlisttypesession');
		  $q->bindValue(':idtlisttypesession',$tlisttypesession->getIdtlisttypesession());
		  $q->bindValue(':libelletlisttypesession',$tlisttypesession->getLibelletlisttypesession());
		  $q->execute();

	 } 

	 public function Delete($idtlisttypesession){
		 
		 $this->db->exec('DELETE FROM tlisttypesession WHERE 	idtlisttypesession = $idtlisttypesession');

	 } 

	 public function GetUniqueTlisttypesession($idtlisttypesession){
		 
		 $q = $this->db->query('SELECT * FROM tlisttypesession   WHERE 	idtlisttypesession = '.$idtlisttypesession);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListTlisttypesession($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM tlisttypesession';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listtlisttypesession = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listtlisttypesession[] = $data;

		}
		 return $Listtlisttypesession;

	 } 

	 public function GetListMultiKeysTlisttypesession(){
		 
		 $req = 'SELECT * 
			 FROM tlisttypesession';
		 $q = $this->db->query($req);
		 $Listtlisttypesession = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listtlisttypesession[] = $data;

		}
		 return $Listtlisttypesession;

	 } 

	 public function CountTlisttypesession(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM tlisttypesession')->fetchColumn();

	 } 
 }