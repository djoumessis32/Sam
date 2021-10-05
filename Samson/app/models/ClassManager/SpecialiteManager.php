<?php
        /*----GeneratorClass
        ---
        --- Classe         :specialite
        --- date Generation: Tue, 20 Nov 2018 01:58:15 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  SpecialiteManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($specialite){
		 
		  $q = $this->db->prepare('INSERT INTO specialite(codeSP,nomSP,date_enreg,etat,id_filiere) VALUES(:codeSP,:nomSP,:date_enreg,:etat,:id_filiere)');
		  $q->bindValue(':codeSP',$specialite->getCodeSP());
		  $q->bindValue(':nomSP',$specialite->getNomSP());
		  $q->bindValue(':date_enreg',$specialite->getDate_enreg());
		  $q->bindValue(':etat',$specialite->getEtat());
		  $q->bindValue(':id_filiere',$specialite->getId_filiere());
		  $q->execute();  

 		 $specialite->hydrate(array('id'=>$this->db->lastInsertId()));
return 1;
	 } 

	 public function Update($specialite){
		 
		  $q = $this->db->prepare('UPDATE specialite SET	codeSP = :codeSP,	nomSP = :nomSP,	niveau = :niveau,	date_enreg = :date_enreg,	etat = :etat,	id_filiere = :id_filiere WHERE 	id = :id');
		  $q->bindValue(':id',$specialite->getId());
		  $q->bindValue(':codeSP',$specialite->getCodeSP());
		  $q->bindValue(':nomSP',$specialite->getNomSP());
		  $q->bindValue(':niveau',$specialite->getNiveau());
		  $q->bindValue(':date_enreg',$specialite->getDate_enreg());
		  $q->bindValue(':etat',$specialite->getEtat());
		  $q->bindValue(':id_filiere',$specialite->getId_filiere());
		  $q->execute();

	 } 

	 public function Delete($id){
		 
		 $this->db->exec('DELETE FROM specialite WHERE 	id = $id');

	 } 

	 public function GetUniqueSpecialite($id){
		 
		 $q = $this->db->query('SELECT * FROM specialite   WHERE 	id = '.$id);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListSpecialite($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM specialite';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listspecialite = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listspecialite[] = $data;

		}
		 return $Listspecialite;

	 } 

	 public function GetListMultiKeysSpecialite(){
		 
		 $req = 'SELECT * 
			 FROM specialite';
		 $q = $this->db->query($req);
		 $Listspecialite = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listspecialite[] = $data;

		}
		 return $Listspecialite;

	 } 

	 public function CountSpecialite(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM specialite')->fetchColumn();

	 } 
 }