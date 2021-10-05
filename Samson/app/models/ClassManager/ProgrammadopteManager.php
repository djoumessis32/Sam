<?php
        /*----GeneratorClass
        ---
        --- Classe         :programmadopte
        --- date Generation: Tue, 20 Nov 2018 01:56:41 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  ProgrammadopteManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($programmadopte){
		 try{
		  $q = $this->db->prepare('INSERT INTO programmadopte(idprogramme,idanneeacademique,idspecialiteclasse,idsemestre) VALUES(:idprogramme,:idanneeacademique,:idspecialiteclasse,:idsemestre)');
		  $q->bindValue(':idprogramme',$programmadopte->getIdprogramme());
		  $q->bindValue(':idanneeacademique',$programmadopte->getIdanneeacademique());
		  $q->bindValue(':idspecialiteclasse',$programmadopte->getIdspecialiteclasse());
		  $q->bindValue(':idsemestre',$programmadopte->getIdsemestre());
		  $q->execute();
 		 $programmadopte->hydrate(array('idprogrammadopte'=>$this->db->lastInsertId()));
             return 1;
         }catch (Exception $e){
             return 0;
         }
	 } 

	 public function Update($programmadopte){
		 
		  $q = $this->db->prepare('UPDATE programmadopte SET	idprogramme = :idprogramme,	idanneeacademique = :idanneeacademique,	idspecialiteclasse = :idspecialiteclasse WHERE 	idprogrammadopte = :idprogrammadopte');
		  $q->bindValue(':idprogrammadopte',$programmadopte->getIdprogrammadopte());
		  $q->bindValue(':idprogramme',$programmadopte->getIdprogramme());
		  $q->bindValue(':idanneeacademique',$programmadopte->getIdanneeacademique());
		  $q->bindValue(':idspecialiteclasse',$programmadopte->getIdspecialiteclasse());
		  $q->execute();

	 } 

	 public function Delete($idprogrammadopte){
		 
		 $this->db->exec('DELETE FROM programmadopte WHERE 	idprogrammadopte = $idprogrammadopte');

	 } 

	 public function GetUniqueProgrammadopte($idprogrammadopte){
		 
		 $q = $this->db->query('SELECT * FROM programmadopte   WHERE 	idprogrammadopte = '.$idprogrammadopte);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListProgrammadopte($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM programmadopte';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listprogrammadopte = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listprogrammadopte[] = $data;

		}
		 return $Listprogrammadopte;

	 } 

	 public function GetListMultiKeysProgrammadopte($idprogramme,$idanneeacademique,$idspecialiteclasse){
		 
		 $req = 'SELECT * 
			 FROM programmadopte , programmeannuel , annee_academique , specialiteclasselmd
			 WHERE 	programmadopte.idprogramme = programmeannuel.idprogrammeannuel
			 AND programmadopte.idanneeacademique = annee_academique.id
			 AND programmadopte.idspecialiteclasse = specialiteclasselmd.idspecialiteclasselmd
			 AND 	idprogramme = '.$idprogramme.'
			 AND 	idanneeacademique = '.$idanneeacademique.'
			 AND 	idspecialiteclasse = '.$idspecialiteclasse.'';
		 $q = $this->db->query($req);
		 $Listprogrammadopte = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listprogrammadopte[] = $data;

		}
		 return $Listprogrammadopte;

	 } 

	 public function CountProgrammadopte(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM programmadopte')->fetchColumn();

	 } 
 }