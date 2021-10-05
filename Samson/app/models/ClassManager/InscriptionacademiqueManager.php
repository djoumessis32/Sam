<?php
        /*----GeneratorClass
        ---
        --- Classe         :inscriptionacademique
        --- date Generation: Tue, 20 Nov 2018 01:55:28 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  InscriptionacademiqueManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($inscriptionacademique){
		 
		  $q = $this->db->prepare('INSERT INTO inscriptionacademique(idetudiant,idcspecialiteclasse,dateinscription,datepreinscription,is_inscrit) VALUES(:idetudiant,:idcspecialiteclasse,:dateinscription,:datepreinscription,:is_inscrit)');
		  $q->bindValue(':idetudiant',$inscriptionacademique->getIdetudiant());
		  $q->bindValue(':idcspecialiteclasse',$inscriptionacademique->getIdcspecialiteclasse());
		  $q->bindValue(':dateinscription',$inscriptionacademique->getDateinscription());
		  $q->bindValue(':datepreinscription',$inscriptionacademique->getDatepreinscription());
		  $q->bindValue(':is_inscrit',$inscriptionacademique->getIs_inscrit());
		  $q->execute();  

 		 $inscriptionacademique->hydrate(array('idinscriptionacademique'=>$this->db->lastInsertId()));

	 } 

	 public function Update($inscriptionacademique){
		 
		  $q = $this->db->prepare('UPDATE inscriptionacademique SET	idetudiant = :idetudiant,	idcspecialiteclasse = :idcspecialiteclasse,	dateinscription = :dateinscription,	datepreinscription = :datepreinscription,	is_inscrit = :is_inscrit WHERE 	idinscriptionacademique = :idinscriptionacademique');
		  $q->bindValue(':idinscriptionacademique',$inscriptionacademique->getIdinscriptionacademique());
		  $q->bindValue(':idetudiant',$inscriptionacademique->getIdetudiant());
		  $q->bindValue(':idcspecialiteclasse',$inscriptionacademique->getIdcspecialiteclasse());
		  $q->bindValue(':dateinscription',$inscriptionacademique->getDateinscription());
		  $q->bindValue(':datepreinscription',$inscriptionacademique->getDatepreinscription());
		  $q->bindValue(':is_inscrit',$inscriptionacademique->getIs_inscrit());
		  $q->execute();

	 } 

	 public function Delete($idinscriptionacademique){
		 
		 $this->db->exec('DELETE FROM inscriptionacademique WHERE 	idinscriptionacademique = $idinscriptionacademique');

	 } 

	 public function GetUniqueInscriptionacademique($idinscriptionacademique){
		 
		 $q = $this->db->query('SELECT * FROM inscriptionacademique   WHERE 	idinscriptionacademique = '.$idinscriptionacademique);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListInscriptionacademique($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM inscriptionacademique';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listinscriptionacademique = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listinscriptionacademique[] = $data;

		}
		 return $Listinscriptionacademique;

	 } 

	 public function GetListMultiKeysInscriptionacademique($idetudiant,$idcspecialiteclasse){
		 
		 $req = 'SELECT * 
			 FROM inscriptionacademique , specialiteclasselmd , etudiant
			 WHERE 	inscriptionacademique.idcspecialiteclasse = specialiteclasselmd.idspecialiteclasselmd
			 AND inscriptionacademique.idetudiant = etudiant.id
			 AND 	idetudiant = '.$idetudiant.'
			 AND 	idcspecialiteclasse = '.$idcspecialiteclasse.'';
		 $q = $this->db->query($req);
		 $Listinscriptionacademique = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listinscriptionacademique[] = $data;

		}
		 return $Listinscriptionacademique;

	 } 

	 public function CountInscriptionacademique(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM inscriptionacademique')->fetchColumn();

	 } 
 }