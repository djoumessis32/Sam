<?php
        /*----GeneratorClass
        ---
        --- Manager         :periode
        --- date Generation: Sun, 09 Aug 2020 23:00:44 +0200
        --- Auteur         : Erick KONGNE FAH
        --- mysql version  : 5.6.21
        --- php version    : 5.6.3*/

 class  PeriodeManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($periode){
		 try{

			  $q = $this->db->prepare('INSERT INTO periode(idtype_operation,date_debut,date_fin,actif,idannee,idsession) VALUES(:idtype_operation,:date_debut,:date_fin,:actif,:idannee,:idsession)');
			  $q->bindValue(':idtype_operation',$periode->getIdtype_operation());
			  $q->bindValue(':date_debut',$periode->getDate_debut());
			  $q->bindValue(':date_fin',$periode->getDate_fin());
			  $q->bindValue(':actif',$periode->getActif());
			  $q->bindValue(':idannee',$periode->getIdannee());
			  $q->bindValue(':idsession',$periode->getIdsession());
			  $q->execute();  

 		 $periode->hydrate(array('idperiode'=>$this->db->lastInsertId()));
			  return 1;
		}catch(Exception $exception){
		 return 0;
		}

	 } 

	 public function Update($periode){
		 
		  $q = $this->db->prepare('UPDATE periode SET	idtype_operation = :idtype_operation,	date_debut = :date_debut,	date_fin = :date_fin,	actif = :actif,	idannee = :idannee,	idsession = :idsession WHERE 	idperiode = :idperiode');
		  $q->bindValue(':idperiode',$periode->getIdperiode());
		  $q->bindValue(':idtype_operation',$periode->getIdtype_operation());
		  $q->bindValue(':date_debut',$periode->getDate_debut());
		  $q->bindValue(':date_fin',$periode->getDate_fin());
		  $q->bindValue(':actif',$periode->getActif());
		  $q->bindValue(':idannee',$periode->getIdannee());
		  $q->bindValue(':idsession',$periode->getIdsession());
		  $q->execute();

	 } 

	 public function Delete($idperiode){
		 
		 $this->db->exec('DELETE FROM periode WHERE 	idperiode = $idperiode');

	 } 

	 public function GetUniquePeriode($idperiode){
		 
		 $q = $this->db->query('SELECT * FROM periode   WHERE 	idperiode = '.$idperiode);
		 return $q->fetch(\PDO::FETCH_ASSOC); 

	 } 

	 public function GetListPeriode($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM periode';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listperiode = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listperiode[] = $data;

		}
		 return $Listperiode;

	 } 

	 public function GetListMultiKeysPeriode(){
		 
		 $req = 'SELECT * 
			 FROM periode';
		 $q = $this->db->query($req);
		 $Listperiode = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listperiode[] = $data;

		}
		 return $Listperiode;

	 } 

	 public function CountPeriode(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM periode')->fetchColumn();

	 } 

	 public function MAXPeriode(){
		 
		  return $this->db->query('SELECT MAX(idperiode) FROM periode')->fetchColumn();

	 }

	 public function GetPeriode(){
         $q = $this->db->query('SELECT * FROM periode   WHERE 	idperiode = '.$idperiode.'');
         return $q->fetch(\PDO::FETCH_ASSOC);
     }
 }