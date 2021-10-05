<?php
        /*----GeneratorClass
        ---
        --- Classe         :programmeannuel
        --- date Generation: Tue, 20 Nov 2018 01:57:00 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  ProgrammeannuelManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($programmeannuel){
		 try{
		  $q = $this->db->prepare('INSERT INTO programmeannuel(codeprogrammeannuel,libelleprogrammeannuel) VALUES(:codeprogrammeannuel,:libelleprogrammeannuel)');
		  $q->bindValue(':codeprogrammeannuel',$programmeannuel->getCodeprogrammeannuel());
		  $q->bindValue(':libelleprogrammeannuel',$programmeannuel->getLibelleprogrammeannuel());
		  $q->execute();  

 		 $programmeannuel->hydrate(array('idprogrammeannuel'=>$this->db->lastInsertId()));
         return 1;
             }catch (Exception $e){
         return 0;
         }
	 } 

	 public function Update($programmeannuel){

		try{
		 
		  $q = $this->db->prepare('UPDATE programmeannuel SET	codeprogrammeannuel = :codeprogrammeannuel,	libelleprogrammeannuel = :libelleprogrammeannuel WHERE 	idprogrammeannuel = :idprogrammeannuel');
		  $q->bindValue(':idprogrammeannuel',$programmeannuel->getIdprogrammeannuel());
		  $q->bindValue(':codeprogrammeannuel',$programmeannuel->getCodeprogrammeannuel());
		  $q->bindValue(':libelleprogrammeannuel',$programmeannuel->getLibelleprogrammeannuel());
		  $q->execute();

		  return 1;
             }catch (Exception $e){
         return 0;
         }

	 } 

	 public function Delete($idprogrammeannuel){
		 
		 $this->db->exec('DELETE FROM programmeannuel WHERE 	idprogrammeannuel = $idprogrammeannuel');

	 } 

	 public function GetUniqueProgrammeannuel($idprogrammeannuel){
		 
		 $q = $this->db->query('SELECT * FROM programmeannuel   WHERE 	idprogrammeannuel = '.$idprogrammeannuel);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListProgrammeannuel($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM programmeannuel';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listprogrammeannuel = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listprogrammeannuel[] = $data;

		}
		 return $Listprogrammeannuel;

	 } 

	 public function GetListMultiKeysProgrammeannuel(){
		 
		 $req = 'SELECT * 
			 FROM programmeannuel';
		 $q = $this->db->query($req);
		 $Listprogrammeannuel = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listprogrammeannuel[] = $data;

		}
		 return $Listprogrammeannuel;

	 } 

	 public function CountProgrammeannuel(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM programmeannuel')->fetchColumn();

	 } 
 }