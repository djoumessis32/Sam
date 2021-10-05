<?php
        /*----GeneratorClass
        ---
        --- Classe         :unite_enseignement
        --- date Generation: Tue, 20 Nov 2018 01:59:14 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Unite_enseignementManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($unite_enseignement){
		 
		  $q = $this->db->prepare('INSERT INTO unite_enseignement(codeUE,nomUE,credit,date_enreg,etat,id_enseignant,id_module) VALUES(:codeUE,:nomUE,:credit,:date_enreg,:etat,:id_enseignant,:id_module)');
		  $q->bindValue(':codeUE',$unite_enseignement->getCodeUE());
		  $q->bindValue(':nomUE',$unite_enseignement->getNomUE());
		  $q->bindValue(':credit',$unite_enseignement->getCredit());
		  $q->bindValue(':date_enreg',$unite_enseignement->getDate_enreg());
		  $q->bindValue(':etat',$unite_enseignement->getEtat());
		  $q->bindValue(':id_enseignant',$unite_enseignement->getId_enseignant());
		  $q->bindValue(':id_module',$unite_enseignement->getId_module());
		  $q->execute();  

 		 $unite_enseignement->hydrate(array('id'=>$this->db->lastInsertId()));

	 } 

	 public function Update($unite_enseignement){
		 
		  $q = $this->db->prepare('UPDATE unite_enseignement SET	codeUE = :codeUE,	nomUE = :nomUE,	credit = :credit,	date_enreg = :date_enreg,	etat = :etat,	id_enseignant = :id_enseignant,	id_module = :id_module WHERE 	id = :id');
		  $q->bindValue(':id',$unite_enseignement->getId());
		  $q->bindValue(':codeUE',$unite_enseignement->getCodeUE());
		  $q->bindValue(':nomUE',$unite_enseignement->getNomUE());
		  $q->bindValue(':credit',$unite_enseignement->getCredit());
		  $q->bindValue(':date_enreg',$unite_enseignement->getDate_enreg());
		  $q->bindValue(':etat',$unite_enseignement->getEtat());
		  $q->bindValue(':id_enseignant',$unite_enseignement->getId_enseignant());
		  $q->bindValue(':id_module',$unite_enseignement->getId_module());
		  $q->execute();

	 } 


	 public function Updateue($unite_enseignement){
		try{
		  $q = $this->db->prepare('UPDATE unite_enseignement SET	codeUE = :codeUE,	nomUE = :nomUE,	credit = :credit,	date_enreg = :date_enreg,	etat = :etat WHERE 	id = :id');
		  $q->bindValue(':id',$unite_enseignement->getId());
		  $q->bindValue(':codeUE',$unite_enseignement->getCodeUE());
		  $q->bindValue(':nomUE',$unite_enseignement->getNomUE());
		  $q->bindValue(':credit',$unite_enseignement->getCredit());
		  $q->bindValue(':date_enreg',$unite_enseignement->getDate_enreg());
		  $q->bindValue(':etat',$unite_enseignement->getEtat());
		 
		  $q->execute();
		  return 1;
		}catch (Exception $e){
			return 0;
		}
	
	 } 

	 public function Delete($id){
		 
		 $this->db->exec('DELETE FROM unite_enseignement WHERE 	id = $id');

	 } 

	 public function GetUniqueUnite_enseignement($id){
		 
		 $q = $this->db->query('SELECT * FROM unite_enseignement   WHERE 	id = '.$id);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListUnite_enseignement($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM unite_enseignement';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listunite_enseignement = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listunite_enseignement[] = $data;

		}
		 return $Listunite_enseignement;

	 } 

	 
	 public function GetListUeProgramme($idProgramme)
	 {
		$req ='select idue,codeUE,nomUE,credit,unite_enseignement.etat  from unite_enseignement
		inner join programmeue on programmeue.idue=unite_enseignement.id
		inner join enseignant on enseignant.id = unite_enseignement.id_enseignant
		inner join module on module.id = unite_enseignement.id_module
		where idprogramme ='.$idProgramme;
		$q = $this->db->query($req);
		 $Listunite_enseignement= array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listunite_enseignement[] = $data;

		}
		 return $Listunite_enseignement;
	 }

	 public function GetListMultiKeysUnite_enseignement(){
		 
		 $req = 'SELECT * 
			 FROM unite_enseignement';
		 $q = $this->db->query($req);
		 $Listunite_enseignement = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listunite_enseignement[] = $data;

		}
		 return $Listunite_enseignement;

	 } 

	 public function CountUnite_enseignement(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM unite_enseignement')->fetchColumn();

	 } 
 }