<?php
        /*----GeneratorClass
        ---
        --- Classe         :groupeutilisateur
        --- date Generation: Tue, 20 Nov 2018 01:54:58 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  GroupeutilisateurManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($groupeutilisateur){
		 
		  $q = $this->db->prepare('INSERT INTO groupeutilisateur(codegroupeutilisateur,libellegroupeutilisateur,etatgroupe) VALUES(:codegroupeutilisateur,:libellegroupeutilisateur,:etatgroupe)');
		  $q->bindValue(':codegroupeutilisateur',$groupeutilisateur->getCodegroupeutilisateur());
		  $q->bindValue(':libellegroupeutilisateur',$groupeutilisateur->getLibellegroupeutilisateur());
		  $q->bindValue(':etatgroupe',$groupeutilisateur->getEtatgroupe());
		  $q->execute();  

 		 $groupeutilisateur->hydrate(array('idgroupeutilisateur'=>$this->db->lastInsertId()));
            return 1;
	 } 

	 public function Update($groupeutilisateur){
		 
		  $q = $this->db->prepare('UPDATE groupeutilisateur SET	codegroupeutilisateur = :codegroupeutilisateur,	libellegroupeutilisateur = :libellegroupeutilisateur,	etatgroupe = :etatgroupe WHERE 	idgroupeutilisateur = :idgroupeutilisateur');
		  $q->bindValue(':idgroupeutilisateur',$groupeutilisateur->getIdgroupeutilisateur());
		  $q->bindValue(':codegroupeutilisateur',$groupeutilisateur->getCodegroupeutilisateur());
		  $q->bindValue(':libellegroupeutilisateur',$groupeutilisateur->getLibellegroupeutilisateur());
		  $q->bindValue(':etatgroupe',$groupeutilisateur->getEtatgroupe());
		  $q->execute();

	 } 

	 public function Delete($idgroupeutilisateur){
		 
		 $this->db->exec('DELETE FROM groupeutilisateur WHERE 	idgroupeutilisateur = $idgroupeutilisateur');

	 } 

	 public function GetUniqueGroupeutilisateur($idgroupeutilisateur){
		 
		 $q = $this->db->query('SELECT * FROM groupeutilisateur   WHERE 	idgroupeutilisateur = '.$idgroupeutilisateur);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListGroupeutilisateur($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM groupeutilisateur';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listgroupeutilisateur = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listgroupeutilisateur[] = $data;

		}
		 return $Listgroupeutilisateur;

	 } 

	 public function GetListMultiKeysGroupeutilisateur(){
		 
		 $req = 'SELECT * 
			 FROM groupeutilisateur';
		 $q = $this->db->query($req);
		 $Listgroupeutilisateur = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listgroupeutilisateur[] = $data;

		}
		 return $Listgroupeutilisateur;

	 } 

	 public function CountGroupeutilisateur(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM groupeutilisateur')->fetchColumn();

	 } 
 }