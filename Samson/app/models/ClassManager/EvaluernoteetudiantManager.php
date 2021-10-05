<?php
        /*----GeneratorClass
        ---
        --- Classe         :evaluernoteetudiant
        --- date Generation: Tue, 20 Nov 2018 01:54:29 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  EvaluernoteetudiantManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($evaluernoteetudiant){
		 
		  $q = $this->db->prepare('INSERT INTO evaluernoteetudiant(idsemestre,idsession,idepreueve,idspecialite,idetudiant,cc,examen,anonymat,notefinale,pq,mention,grade,is_acquis) VALUES(:idsemestre,:idsession,:idepreueve,:idspecialite,:idetudiant,:cc,:examen,:anonymat,:notefinale,:pq,:mention,:grade,:is_acquis)');
		  $q->bindValue(':idsemestre',$evaluernoteetudiant->getIdsemestre());
		  $q->bindValue(':idsession',$evaluernoteetudiant->getIdsession());
		  $q->bindValue(':idepreueve',$evaluernoteetudiant->getIdepreueve());
		  $q->bindValue(':idspecialite',$evaluernoteetudiant->getIdspecialite());
		  $q->bindValue(':idetudiant',$evaluernoteetudiant->getIdetudiant());
		  $q->bindValue(':cc',$evaluernoteetudiant->getCc());
		  $q->bindValue(':examen',$evaluernoteetudiant->getExamen());
		  $q->bindValue(':anonymat',$evaluernoteetudiant->getAnonymat());
		  $q->bindValue(':notefinale',$evaluernoteetudiant->getNotefinale());
		  $q->bindValue(':pq',$evaluernoteetudiant->getPq());
		  $q->bindValue(':mention',$evaluernoteetudiant->getMention());
		  $q->bindValue(':grade',$evaluernoteetudiant->getGrade());
		  $q->bindValue(':is_acquis',$evaluernoteetudiant->getIs_acquis());
		  $q->execute();  

 		 $evaluernoteetudiant->hydrate(array('idevaluernoteetudiant'=>$this->db->lastInsertId()));

	 } 

	 public function Update($evaluernoteetudiant){
		 
		  $q = $this->db->prepare('UPDATE evaluernoteetudiant SET	idsemestre = :idsemestre,	idsession = :idsession,	idepreueve = :idepreueve,	idspecialite = :idspecialite,	idetudiant = :idetudiant,	cc = :cc,	examen = :examen,	anonymat = :anonymat,	notefinale = :notefinale,	pq = :pq,	mention = :mention,	grade = :grade,	is_acquis = :is_acquis WHERE 	idevaluernoteetudiant = :idevaluernoteetudiant');
		  $q->bindValue(':idevaluernoteetudiant',$evaluernoteetudiant->getIdevaluernoteetudiant());
		  $q->bindValue(':idsemestre',$evaluernoteetudiant->getIdsemestre());
		  $q->bindValue(':idsession',$evaluernoteetudiant->getIdsession());
		  $q->bindValue(':idepreueve',$evaluernoteetudiant->getIdepreueve());
		  $q->bindValue(':idspecialite',$evaluernoteetudiant->getIdspecialite());
		  $q->bindValue(':idetudiant',$evaluernoteetudiant->getIdetudiant());
		  $q->bindValue(':cc',$evaluernoteetudiant->getCc());
		  $q->bindValue(':examen',$evaluernoteetudiant->getExamen());
		  $q->bindValue(':anonymat',$evaluernoteetudiant->getAnonymat());
		  $q->bindValue(':notefinale',$evaluernoteetudiant->getNotefinale());
		  $q->bindValue(':pq',$evaluernoteetudiant->getPq());
		  $q->bindValue(':mention',$evaluernoteetudiant->getMention());
		  $q->bindValue(':grade',$evaluernoteetudiant->getGrade());
		  $q->bindValue(':is_acquis',$evaluernoteetudiant->getIs_acquis());
		  $q->execute();

	 } 

	 public function Delete($idevaluernoteetudiant){
		 
		 $this->db->exec('DELETE FROM evaluernoteetudiant WHERE 	idevaluernoteetudiant = $idevaluernoteetudiant');

	 } 

	 public function GetUniqueEvaluernoteetudiant($idevaluernoteetudiant){
		 
		 $q = $this->db->query('SELECT * FROM evaluernoteetudiant   WHERE 	idevaluernoteetudiant = '.$idevaluernoteetudiant);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListEvaluernoteetudiant($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM evaluernoteetudiant';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listevaluernoteetudiant = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listevaluernoteetudiant[] = $data;

		}
		 return $Listevaluernoteetudiant;

	 } 

	 public function GetListMultiKeysEvaluernoteetudiant(){
		 
		 $req = 'SELECT * 
			 FROM evaluernoteetudiant';
		 $q = $this->db->query($req);
		 $Listevaluernoteetudiant = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listevaluernoteetudiant[] = $data;

		}
		 return $Listevaluernoteetudiant;

	 } 

	 public function CountEvaluernoteetudiant(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM evaluernoteetudiant')->fetchColumn();

	 } 
 }