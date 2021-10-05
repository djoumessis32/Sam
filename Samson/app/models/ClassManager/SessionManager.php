<?php
        /*----GeneratorClass
        ---
        --- Classe         :session
        --- date Generation: Tue, 20 Nov 2018 01:58:00 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  SessionManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($session){
		 try{

		  $q = $this->db->prepare('INSERT INTO session(codesession,libellesession,idsessionrattache,idtypesession,idanneeacademique) VALUES(:codesession,:libellesession,:idsessionrattache,:idtypesession,:idanneeacademique)');
		  $q->bindValue(':codesession',$session->getCodesession());
		  $q->bindValue(':libellesession',$session->getLibellesession());
		  $q->bindValue(':idsessionrattache',$session->getIdsessionrattache());
		  $q->bindValue(':idtypesession',$session->getIdtypesession());
		  $q->bindValue(':idanneeacademique',$session->getIdanneeacademique());
		  $q->execute();  

 		 $session->hydrate(array('idsession'=>$this->db->lastInsertId()));
             return 1;
         }catch (Exception $e){
             return 0;

         }
	 } 

	 public function Update($session){
		 
		  $q = $this->db->prepare('UPDATE session SET	codesession = :codesession,	libellesession = :libellesession,	idsessionrattache = :idsessionrattache,	idtypesession = :idtypesession,	idanneeacademique = :idanneeacademique WHERE 	idsession = :idsession');
		  $q->bindValue(':idsession',$session->getIdsession());
		  $q->bindValue(':codesession',$session->getCodesession());
		  $q->bindValue(':libellesession',$session->getLibellesession());
		  $q->bindValue(':idsessionrattache',$session->getIdsessionrattache());
		  $q->bindValue(':idtypesession',$session->getIdtypesession());
		  $q->bindValue(':idanneeacademique',$session->getIdanneeacademique());
		  $q->execute();

	 } 

	 public function Delete($idsession){
		 
		 $this->db->exec('DELETE FROM session WHERE 	idsession = $idsession');

	 } 

	 public function GetUniqueSession($idsession){
		 
		 $q = $this->db->query('SELECT * FROM session   WHERE 	idsession = '.$idsession);
		 return $q->fetch();

	 } 

	 public function GetListSession($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM session';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listsession = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listsession[] = $data;

		}
		 return $Listsession;

	 } 

	 public function GetListMultiKeysSession($idtypesession,$idanneeacademique){
		 
		 $req = 'SELECT * 
			 FROM session , annee_academique , tlisttypesession
			 WHERE 	session.idanneeacademique = annee_academique.id
			 AND session.idtypesession = tlisttypesession.idtlisttypesession
			 AND 	idtypesession = '.$idtypesession.'
			 AND 	idanneeacademique = '.$idanneeacademique.'';
		 $q = $this->db->query($req);
		 $Listsession = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listsession[] = $data;

		}
		 return $Listsession;

	 } 

	 public function CountSession(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM session')->fetchColumn();

	 } 
 }