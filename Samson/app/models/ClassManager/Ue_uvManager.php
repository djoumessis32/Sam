<?php
        /*----GeneratorClass
        ---
        --- Classe         :ue_uv
        --- date Generation: Tue, 20 Nov 2018 01:58:59 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Ue_uvManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($ue_uv){
		 try{
		  $q = $this->db->prepare('INSERT INTO ue_uv(idue,iduv) VALUES(:idue,:iduv)');
		  $q->bindValue(':idue',$ue_uv->getIdue());
		  $q->bindValue(':iduv',$ue_uv->getIduv());
		  $q->execute();  

 		 $ue_uv->hydrate(array('idue_uv'=>$this->db->lastInsertId()));
         return 1;
         }catch (Exception $e){
            return 0;
        }
	 } 

	 public function Update($ue_uv){
		 
		  $q = $this->db->prepare('UPDATE ue_uv SET	idue = :idue,	iduv = :iduv WHERE 	idue_uv = :idue_uv');
		  $q->bindValue(':idue_uv',$ue_uv->getIdue_uv());
		  $q->bindValue(':idue',$ue_uv->getIdue());
		  $q->bindValue(':iduv',$ue_uv->getIduv());
		  $q->execute();

	 } 

	 public function Delete($iduv,$idue){
		try{
		 $q = $this->db->prepare('DELETE FROM ue_uv WHERE 	idue = :idue AND iduv = :iduv');
		 $q->bindValue(':idue',$idue);
		 $q->bindValue(':iduv',$iduv);
		 $q->execute();

		  return 1;
		 }catch (Exception $e){
			 return 0;
		 }
	 } 

	 public function GetUniqueUe_uv($idue_uv){
		 
		 $q = $this->db->query('SELECT * FROM ue_uv   WHERE 	idue_uv = '.$idue_uv);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListUe_uv($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM ue_uv';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listue_uv = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listue_uv[] = $data;

		}
		 return $Listue_uv;

	 } 

	 public function GetListMultiKeysUe_uv($idue,$iduv){
		 
		 $req = 'SELECT * 
			 FROM ue_uv , uniteenseignement , uvmatiere
			 WHERE 	ue_uv.idue = uniteenseignement.iduniteenseignement
			 AND ue_uv.iduv = uvmatiere.iduvmatiere
			 AND 	idue = '.$idue.'
			 AND 	iduv = '.$iduv.'';
		 $q = $this->db->query($req);
		 $Listue_uv = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listue_uv[] = $data;

		}
		 return $Listue_uv;

	 } 

	 public function CountUe_uv(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM ue_uv')->fetchColumn();

	 } 
 }