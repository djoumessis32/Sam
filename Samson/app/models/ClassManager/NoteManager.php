<?php
        /*----GeneratorClass
        ---
        --- Classe         :note
        --- date Generation: Tue, 20 Nov 2018 01:56:11 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  NoteManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($note){
		 
		  $q = $this->db->prepare('INSERT INTO note(controle_continu,examen,rattrapage,id_etudiant,id_unite_enseignement,id_annee_academique,date_enreg,etat) VALUES(:controle_continu,:examen,:rattrapage,:id_etudiant,:id_unite_enseignement,:id_annee_academique,:date_enreg,:etat)');
		  $q->bindValue(':controle_continu',$note->getControle_continu());
		  $q->bindValue(':examen',$note->getExamen());
		  $q->bindValue(':rattrapage',$note->getRattrapage());
		  $q->bindValue(':id_etudiant',$note->getId_etudiant());
		  $q->bindValue(':id_unite_enseignement',$note->getId_unite_enseignement());
		  $q->bindValue(':id_annee_academique',$note->getId_annee_academique());
		  $q->bindValue(':date_enreg',$note->getDate_enreg());
		  $q->bindValue(':etat',$note->getEtat());
		  $q->execute();  

 		 $note->hydrate(array('id'=>$this->db->lastInsertId()));

	 } 

	 public function Update($note){
		 
		  $q = $this->db->prepare('UPDATE note SET	controle_continu = :controle_continu,	examen = :examen,	rattrapage = :rattrapage,	id_etudiant = :id_etudiant,	id_unite_enseignement = :id_unite_enseignement,	id_annee_academique = :id_annee_academique,	date_enreg = :date_enreg,	etat = :etat WHERE 	id = :id');
		  $q->bindValue(':id',$note->getId());
		  $q->bindValue(':controle_continu',$note->getControle_continu());
		  $q->bindValue(':examen',$note->getExamen());
		  $q->bindValue(':rattrapage',$note->getRattrapage());
		  $q->bindValue(':id_etudiant',$note->getId_etudiant());
		  $q->bindValue(':id_unite_enseignement',$note->getId_unite_enseignement());
		  $q->bindValue(':id_annee_academique',$note->getId_annee_academique());
		  $q->bindValue(':date_enreg',$note->getDate_enreg());
		  $q->bindValue(':etat',$note->getEtat());
		  $q->execute();

	 } 

	 public function Delete($id){
		 
		 $this->db->exec('DELETE FROM note WHERE 	id = $id');

	 } 

	 public function GetUniqueNote($id){
		 
		 $q = $this->db->query('SELECT * FROM note   WHERE 	id = '.$id);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListNote($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM note';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listnote = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listnote[] = $data;

		}
		 return $Listnote;

	 } 

	 public function GetListMultiKeysNote(){
		 
		 $req = 'SELECT * 
			 FROM note';
		 $q = $this->db->query($req);
		 $Listnote = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listnote[] = $data;

		}
		 return $Listnote;

	 } 

	 public function CountNote(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM note')->fetchColumn();

	 } 
 }