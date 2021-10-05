<?php
        /*----GeneratorClass
        ---
        --- Classe         :annee_academique
        --- date Generation: Tue, 20 Nov 2018 01:52:16 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Annee_academiqueManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 
	 // desactive tous les status 
	 public function UpdateStatut($typeupdate)
	 {
	 		# code...
	 		$q = $this->db->prepare('UPDATE annee_academique SET	statut = :statut, encours = :statut WHERE 	statut = :typestatut');

		 	$q->bindValue(':statut',"0");
		 	$q->bindValue(':typestatut',"1");
		 	$q->execute();
	 	if ($typeupdate=="active") {
	 		# code...
	 		$q = $this->db->prepare('UPDATE annee_academique SET	statut = :statut, encours = :statut WHERE 	id = :id');

		 	$q->bindValue(':statut',"1");
		 	$q->bindValue(':id',$_POST['activeaneeacad']);
		 	$q->execute();

	 	}
	 	
	 }

	 public function Add($annee_academique){
	 	try{

	 	  $this->UpdateStatut('');
		 
		  $q = $this->db->prepare('INSERT INTO annee_academique(nomAC,statut,date_enreg,ordre,encours) VALUES(:nomAC,:statut,:date_enreg,:ordre,:statut)');
		  $q->bindValue(':nomAC',$annee_academique->getNomAC());
		  $q->bindValue(':statut',$annee_academique->getStatut());
		  $q->bindValue(':date_enreg',$annee_academique->getDate_enreg());
		  $q->bindValue(':ordre',$annee_academique->getOrdre());
          $q->bindValue(':encours',$annee_academique->getStatut());
          $q->execute();

 		 $annee_academique->hydrate(array('id'=>$this->db->lastInsertId()));

 		      return 1;
         }catch (Exception $e){
             return 0;
         }
	 } 

	 public function Update($annee_academique){
		 
		  $q = $this->db->prepare('UPDATE annee_academique SET	nomAC = :nomAC,	statut = :statut,	date_enreg = :date_enreg,	ordre = :ordre WHERE 	id = :id');
		  $q->bindValue(':id',$annee_academique->getId());
		  $q->bindValue(':nomAC',$annee_academique->getNomAC());
		  $q->bindValue(':statut',$annee_academique->getStatut());
		  $q->bindValue(':date_enreg',$annee_academique->getDate_enreg());
		  $q->bindValue(':ordre',$annee_academique->getOrdre());
		  $q->execute();

	 } 

	 public function Delete($id){
		 
		 $this->db->exec('DELETE FROM annee_academique WHERE 	id = $id');

	 } 

	 public function GetUniqueAnnee_academique($id){
		 
		 $q = $this->db->query('SELECT * FROM annee_academique   WHERE 	id = '.$id);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 }


/*     public function GetMaxAnnee_academique(){

         $q = $this->db->query('SELECT max(id) FROM annee_academique WHERE statut=1');
         $p=$q->fetch(PDO::FETCH_ASSOC);
         return $p['id'];
     }*/

     public function GetListAnnee_academique($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM annee_academique';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listannee_academique = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listannee_academique[] = $data;

		}
		 return $Listannee_academique;

	 } 

	 public function GetListMultiKeysAnnee_academique(){
		 
		 $req = 'SELECT * 
			 FROM annee_academique';
		 $q = $this->db->query($req);
		 $Listannee_academique = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listannee_academique[] = $data;

		}
		 return $Listannee_academique;

	 } 

	 public function CountAnnee_academique(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM annee_academique')->fetchColumn();

	 } 
 }