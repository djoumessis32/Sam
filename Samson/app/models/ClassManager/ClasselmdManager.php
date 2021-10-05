<?php
        /*----GeneratorClass
        ---
        --- Classe         :classelmd
        --- date Generation: Tue, 20 Nov 2018 01:52:44 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  ClasselmdManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($classelmd){
		 
		  $q = $this->db->prepare('INSERT INTO classelmd(codeclasselmd,libelleclasselmd) VALUES(:codeclasselmd,:libelleclasselmd)');
		  $q->bindValue(':codeclasselmd',$classelmd->getCodeclasselmd());
		  $q->bindValue(':libelleclasselmd',$classelmd->getLibelleclasselmd());
		  $q->execute();  

 		 $classelmd->hydrate(array('idclasselmd'=>$this->db->lastInsertId()));

	 } 

	 public function Update($classelmd){
		 
		  $q = $this->db->prepare('UPDATE classelmd SET	codeclasselmd = :codeclasselmd,	libelleclasselmd = :libelleclasselmd WHERE 	idclasselmd = :idclasselmd');
		  $q->bindValue(':idclasselmd',$classelmd->getIdclasselmd());
		  $q->bindValue(':codeclasselmd',$classelmd->getCodeclasselmd());
		  $q->bindValue(':libelleclasselmd',$classelmd->getLibelleclasselmd());
		  $q->execute();

	 } 

	 public function Delete($idclasselmd){
		 
		 $this->db->exec('DELETE FROM classelmd WHERE 	idclasselmd = $idclasselmd');

	 } 

	 public function GetUniqueClasselmd($idclasselmd){
		 
		 $q = $this->db->query('SELECT * FROM classelmd   WHERE 	idclasselmd = '.$idclasselmd);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListClasselmd($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM classelmd';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listclasselmd = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listclasselmd[] = $data;

		}
		 return $Listclasselmd;

	 } 

	 public function GetListMultiKeysClasselmd(){
		 
		 $req = 'SELECT * 
			 FROM classelmd';
		 $q = $this->db->query($req);
		 $Listclasselmd = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listclasselmd[] = $data;

		}
		 return $Listclasselmd;

	 } 

	 public function CountClasselmd(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM classelmd')->fetchColumn();

	 } 
 }