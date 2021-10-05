<?php
        /*----GeneratorClass
        ---
        --- Classe         :specialiteclasselmd
        --- date Generation: Tue, 20 Nov 2018 01:58:30 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  SpecialiteclasselmdManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($specialiteclasselmd){
		 
		  $q = $this->db->prepare('INSERT INTO specialiteclasselmd(idspecialite,idclasselmd) VALUES(:idspecialite,:idclasselmd)');
		  $q->bindValue(':idspecialite',$specialiteclasselmd->getIdspecialite());
		  $q->bindValue(':idclasselmd',$specialiteclasselmd->getIdclasselmd());
		  $q->execute();  

 		 $specialiteclasselmd->hydrate(array('idspecialiteclasselmd'=>$this->db->lastInsertId()));
            return 1;
	 } 

	 public function Update($specialiteclasselmd){
		 
		  $q = $this->db->prepare('UPDATE specialiteclasselmd SET	idspecialite = :idspecialite,	idclasselmd = :idclasselmd WHERE 	idspecialiteclasselmd = :idspecialiteclasselmd');
		  $q->bindValue(':idspecialiteclasselmd',$specialiteclasselmd->getIdspecialiteclasselmd());
		  $q->bindValue(':idspecialite',$specialiteclasselmd->getIdspecialite());
		  $q->bindValue(':idclasselmd',$specialiteclasselmd->getIdclasselmd());
		  $q->execute();

	 } 

	 public function Delete($idspecialiteclasselmd){
		 
		 $this->db->exec('DELETE FROM specialiteclasselmd WHERE 	idspecialiteclasselmd = $idspecialiteclasselmd');

	 } 

	 public function GetUniqueSpecialiteclasselmd($idspecialiteclasselmd){
		 
		 $q = $this->db->query('SELECT * FROM specialiteclasselmd   WHERE 	idspecialiteclasselmd = '.$idspecialiteclasselmd);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 }

     public function GetUniqueSpecialiteclasselmdByspecialte($ids,$idspecialite){

         $q = $this->db->query('select idspecialiteclasselmd from specialiteclasselmd
inner join classelmd on classelmd.idclasselmd=specialiteclasselmd.idclasselmd
inner join classesemestrelmd on classesemestrelmd.idclasselmd=classelmd.idclasselmd
inner join semestrelmd on semestrelmd.idsemestrelmd=classesemestrelmd.idsemestre
WHERE 	semestrelmd.idsemestrelmd='.$ids.' and specialiteclasselmd.idspecialite= '.$idspecialite);
         return $q->fetchALL();

     }

     public function GetListSpecialiteclasselmd($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM specialiteclasselmd';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listspecialiteclasselmd = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listspecialiteclasselmd[] = $data;

		}
		 return $Listspecialiteclasselmd;

	 } 

	 public function GetListMultiKeysSpecialiteclasselmd(){
		 
		 $req = 'SELECT * 
			 FROM specialiteclasselmd';
		 $q = $this->db->query($req);
		 $Listspecialiteclasselmd = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listspecialiteclasselmd[] = $data;

		}
		 return $Listspecialiteclasselmd;

	 } 

	 public function CountSpecialiteclasselmd(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM specialiteclasselmd')->fetchColumn();

	 } 
 }