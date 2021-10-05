<?php
        /*----GeneratorClass
        ---
        --- Classe         :config
        --- date Generation: Tue, 20 Nov 2018 01:53:15 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  ConfigManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($config){
		 
		  $q = $this->db->prepare('INSERT INTO config(login_pass,jury,date_jury,date_enreg,etat) VALUES(:login_pass,:jury,:date_jury,:date_enreg,:etat)');
		  $q->bindValue(':login_pass',$config->getLogin_pass());
		  $q->bindValue(':jury',$config->getJury());
		  $q->bindValue(':date_jury',$config->getDate_jury());
		  $q->bindValue(':date_enreg',$config->getDate_enreg());
		  $q->bindValue(':etat',$config->getEtat());
		  $q->execute();  

 		 $config->hydrate(array('id'=>$this->db->lastInsertId()));

	 } 

	 public function Update($config){
		 
		  $q = $this->db->prepare('UPDATE config SET	login_pass = :login_pass,	jury = :jury,	date_jury = :date_jury,	date_enreg = :date_enreg,	etat = :etat WHERE 	id = :id');
		  $q->bindValue(':id',$config->getId());
		  $q->bindValue(':login_pass',$config->getLogin_pass());
		  $q->bindValue(':jury',$config->getJury());
		  $q->bindValue(':date_jury',$config->getDate_jury());
		  $q->bindValue(':date_enreg',$config->getDate_enreg());
		  $q->bindValue(':etat',$config->getEtat());
		  $q->execute();

	 } 

	 public function Delete($id){
		 
		 $this->db->exec('DELETE FROM config WHERE 	id = $id');

	 } 

	 public function GetUniqueConfig($id){
		 
		 $q = $this->db->query('SELECT * FROM config   WHERE 	id = '.$id);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListConfig($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM config';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listconfig = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listconfig[] = $data;

		}
		 return $Listconfig;

	 } 

	 public function GetListMultiKeysConfig(){
		 
		 $req = 'SELECT * 
			 FROM config';
		 $q = $this->db->query($req);
		 $Listconfig = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listconfig[] = $data;

		}
		 return $Listconfig;

	 } 

	 public function CountConfig(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM config')->fetchColumn();

	 } 
 }