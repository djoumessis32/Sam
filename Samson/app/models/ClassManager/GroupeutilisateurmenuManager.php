<?php
        /*----GeneratorClass
        ---
        --- Classe         :groupeutilisateurmenu
        --- date Generation: Tue, 20 Nov 2018 01:55:13 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  GroupeutilisateurmenuManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($groupeutilisateurmenu){
		 
		  $q = $this->db->prepare('INSERT INTO groupeutilisateurmenu(idgroupeutilisateur,idmenu,dateattribution,nivauaccess) VALUES(:idgroupeutilisateur,:idmenu,:dateattribution,:nivauaccess)');
		  $q->bindValue(':idgroupeutilisateur',$groupeutilisateurmenu->getIdgroupeutilisateur());
		  $q->bindValue(':idmenu',$groupeutilisateurmenu->getIdmenu());
		  $q->bindValue(':dateattribution',$groupeutilisateurmenu->getDateattribution());
		  $q->bindValue(':nivauaccess',$groupeutilisateurmenu->getNivauaccess());
		  $q->execute();  

 		 $groupeutilisateurmenu->hydrate(array('idgroupeutilisateurmenu'=>$this->db->lastInsertId()));

	 } 

	 public function Update($groupeutilisateurmenu){
		 
		  $q = $this->db->prepare('UPDATE groupeutilisateurmenu SET	idgroupeutilisateur = :idgroupeutilisateur,	idmenu = :idmenu,	dateattribution = :dateattribution,	nivauaccess = :nivauaccess WHERE 	idgroupeutilisateurmenu = :idgroupeutilisateurmenu');
		  $q->bindValue(':idgroupeutilisateur',$groupeutilisateurmenu->getIdgroupeutilisateur());
		  $q->bindValue(':idmenu',$groupeutilisateurmenu->getIdmenu());
		  $q->bindValue(':dateattribution',$groupeutilisateurmenu->getDateattribution());
		  $q->bindValue(':nivauaccess',$groupeutilisateurmenu->getNivauaccess());
		  $q->bindValue(':idgroupeutilisateurmenu',$groupeutilisateurmenu->getIdgroupeutilisateurmenu());
		  $q->execute();

	 } 

	 public function Delete($idgroupeutilisateurmenu){
		 
		 $this->db->exec('DELETE FROM groupeutilisateurmenu WHERE 	idgroupeutilisateurmenu = $idgroupeutilisateurmenu');

	 } 

	 public function GetUniqueGroupeutilisateurmenu($idgroupeutilisateurmenu){
		 
		 $q = $this->db->query('SELECT * FROM groupeutilisateurmenu   WHERE 	idgroupeutilisateurmenu = '.$idgroupeutilisateurmenu);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListGroupeutilisateurmenu($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM groupeutilisateurmenu';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listgroupeutilisateurmenu = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listgroupeutilisateurmenu[] = $data;

		}
		 return $Listgroupeutilisateurmenu;

	 } 

	 public function GetListMultiKeysGroupeutilisateurmenu($idgroupeutilisateur,$idmenu){
		 
		 $req = 'SELECT * 
			 FROM groupeutilisateurmenu , menu , groupeutilisateur
			 WHERE 	groupeutilisateurmenu.idmenu = menu.idmenu
			 AND groupeutilisateurmenu.idgroupeutilisateur = groupeutilisateur.idgroupeutilisateur
			 AND 	idgroupeutilisateur = '.$idgroupeutilisateur.'
			 AND 	idmenu = '.$idmenu.'';
		 $q = $this->db->query($req);
		 $Listgroupeutilisateurmenu = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listgroupeutilisateurmenu[] = $data;

		}
		 return $Listgroupeutilisateurmenu;

	 } 

	 public function CountGroupeutilisateurmenu(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM groupeutilisateurmenu')->fetchColumn();

	 } 
 }