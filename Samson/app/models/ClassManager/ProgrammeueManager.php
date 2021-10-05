<?php
        /*----GeneratorClass
        ---
        --- Classe         :programmeue
        --- date Generation: Tue, 20 Nov 2018 01:57:15 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  ProgrammeueManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($programmeue){
		 try{
		  $q = $this->db->prepare('INSERT INTO programmeue(idprogramme,idue) VALUES(:idprogramme,:idue)');
		  $q->bindValue(':idprogramme',$programmeue->getIdprogramme());
		  $q->bindValue(':idue',$programmeue->getIdue());
		  $q->execute();  

 		 $programmeue->hydrate(array('idprogrammeue'=>$this->db->lastInsertId()));
         return 1;
             }catch (Exception $e){
         return 0;
         }
	 } 

	 public function Update($programmeue){
		 
		  $q = $this->db->prepare('UPDATE programmeue SET	idprogramme = :idprogramme,	idue = :idue WHERE 	idprogrammeue = :idprogrammeue');
		  $q->bindValue(':idprogrammeue',$programmeue->getIdprogrammeue());
		  $q->bindValue(':idprogramme',$programmeue->getIdprogramme());
		  $q->bindValue(':idue',$programmeue->getIdue());
		  $q->execute();

	 } 

	 public function Delete($idprogramme,$idue){
		 try{
			$q = $this->db->prepare('DELETE FROM programmeue WHERE 	idprogramme = :idprogramme AND idue = :idue');
			$q->bindValue(':idprogramme',$idprogramme);
			$q->bindValue(':idue',$idue);
			$q->execute();
   
			 return 1;
			}catch (Exception $e){
				return 0;
			}
	 } 

	 public function GetUniqueProgrammeue($idprogrammeue){
		 
		 $q = $this->db->query('SELECT * FROM programmeue   WHERE 	idprogrammeue = '.$idprogrammeue);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListProgrammeue($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM programmeue';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listprogrammeue = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listprogrammeue[] = $data;

		}
		 return $Listprogrammeue;

	 } 

	 public function GetListMultiKeysProgrammeue($idprogramme,$idue){
		 
		 $req = 'SELECT * 
			 FROM programmeue , programmeannuel , uniteenseignement
			 WHERE 	programmeue.idprogramme = programmeannuel.idprogrammeannuel
			 AND programmeue.idue = uniteenseignement.iduniteenseignement
			 AND 	idprogramme = '.$idprogramme.'
			 AND 	idue = '.$idue.'';
		 $q = $this->db->query($req);
		 $Listprogrammeue = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listprogrammeue[] = $data;

		}
		 return $Listprogrammeue;

	 } 

	 public function CountProgrammeue(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM programmeue')->fetchColumn();

	 } 
 }