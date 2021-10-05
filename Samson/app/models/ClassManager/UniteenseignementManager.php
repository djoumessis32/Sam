<?php
        /*----GeneratorClass
        ---
        --- Classe         :uniteenseignement
        --- date Generation: Tue, 20 Nov 2018 01:59:29 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  UniteenseignementManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($uniteenseignement){
		 try{

		  $q = $this->db->prepare('INSERT INTO uniteenseignement(codeuniteenseignement,libelleuniteenseignement,nbcreditsue,notevalidationue,noteeleminerue) VALUES(:codeuniteenseignement,:libelleuniteenseignement,:nbcreditsue,:notevalidationue,:noteeleminerue)');
		  $q->bindValue(':codeuniteenseignement',$uniteenseignement->getCodeuniteenseignement());
		  $q->bindValue(':libelleuniteenseignement',$uniteenseignement->getLibelleuniteenseignement());
		  $q->bindValue(':nbcreditsue',$uniteenseignement->getNbcreditsue());
		  $q->bindValue(':notevalidationue',$uniteenseignement->getNotevalidationue());
		  $q->bindValue(':noteeleminerue',$uniteenseignement->getNoteeleminerue());
		  $q->execute();  

 		 $uniteenseignement->hydrate(array('iduniteenseignement'=>$this->db->lastInsertId()));
             return 1;
         }catch (Exception $e){
             return 0;
         }
	 } 

	 public function Update($uniteenseignement){
		try{
		 
		  $q = $this->db->prepare('UPDATE uniteenseignement SET	codeuniteenseignement = :codeuniteenseignement,	libelleuniteenseignement = :libelleuniteenseignement,	nbcreditsue = :nbcreditsue,	notevalidationue = :notevalidationue,	noteeleminerue = :noteeleminerue WHERE 	iduniteenseignement = :iduniteenseignement');
		  $q->bindValue(':iduniteenseignement',$uniteenseignement->getIduniteenseignement());
		  $q->bindValue(':codeuniteenseignement',$uniteenseignement->getCodeuniteenseignement());
		  $q->bindValue(':libelleuniteenseignement',$uniteenseignement->getLibelleuniteenseignement());
		  $q->bindValue(':nbcreditsue',$uniteenseignement->getNbcreditsue());
		  $q->bindValue(':notevalidationue',$uniteenseignement->getNotevalidationue());
		  $q->bindValue(':noteeleminerue',$uniteenseignement->getNoteeleminerue());
		  $q->execute();
		  return 1;
		}catch (Exception $e){
			return 0;
		}

	 } 

	 public function Delete($iduniteenseignement){

		try{
			$q =  $this->db->prepare('DELETE FROM uniteenseignement WHERE 	iduniteenseignement = :iduniteenseignement');
			$q->bindValue(':iduniteenseignement',$iduniteenseignement);
			$q->execute();
   
			 return 1;
			}catch (Exception $e){
				return 0;
			}
   
	 } 

	 public function GetListUeProgramme($idProgramme)
	 {
		$req ='select iduniteenseignement,codeuniteenseignement,libelleuniteenseignement,nbcreditsue,notevalidationue,noteeleminerue  from uniteenseignement
		inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement 
		where idprogramme= '.$idProgramme;
		$q = $this->db->query($req);
		 $Listunite_enseignement= array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listunite_enseignement[] = $data;

		}
		 return $Listunite_enseignement;
	 }

	 public function GetUniqueUniteenseignement($iduniteenseignement){
		 
		 $q = $this->db->query('SELECT * FROM uniteenseignement   WHERE 	iduniteenseignement = '.$iduniteenseignement);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListUniteenseignement($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM uniteenseignement';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listuniteenseignement = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listuniteenseignement[] = $data;

		}
		 return $Listuniteenseignement;

	 } 

	 public function GetListMultiKeysUniteenseignement(){
		 
		 $req = 'SELECT * 
			 FROM uniteenseignement';
		 $q = $this->db->query($req);
		 $Listuniteenseignement = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listuniteenseignement[] = $data;

		}
		 return $Listuniteenseignement;

	 } 

	 public function CountUniteenseignement(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM uniteenseignement')->fetchColumn();

	 } 
 }