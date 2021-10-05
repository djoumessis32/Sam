<?php
        /*----GeneratorClass
        ---
        --- Classe         :uvmatiere
        --- date Generation: Tue, 20 Nov 2018 01:59:57 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  UvmatiereManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($uvmatiere){
		 try{


		  $q = $this->db->prepare('INSERT INTO uvmatiere(codeuvmatiere,libelle_fr_uvmatiere,libelle_en_uvmatiere,ncredis,notevaliduvmatiere,noteelimuvmatiere,vlmhoraire) VALUES(:codeuvmatiere,:libelle_fr_uvmatiere,:libelle_en_uvmatiere,:ncredis,:notevaliduvmatiere,:noteelimuvmatiere,:vlmhoraire)');
		  $q->bindValue(':codeuvmatiere',$uvmatiere->getCodeuvmatiere());
		  $q->bindValue(':libelle_fr_uvmatiere',$uvmatiere->getLibelle_fr_uvmatiere());
		  $q->bindValue(':libelle_en_uvmatiere',$uvmatiere->getLibelle_en_uvmatiere());
		  $q->bindValue(':ncredis',$uvmatiere->getNcredis());
		  $q->bindValue(':notevaliduvmatiere',$uvmatiere->getNotevaliduvmatiere());
		  $q->bindValue(':noteelimuvmatiere',$uvmatiere->getNoteelimuvmatiere());
		  $q->bindValue(':vlmhoraire',$uvmatiere->getVlmhoraire());
		  $q->execute();

 		 $uvmatiere->hydrate(array('iduvmatiere'=>$this->db->lastInsertId()));
            return 1;
         }catch (Exception $e){
             return 0;
         }
	 } 

	 public function Update($uvmatiere){

		try{
		 
		  $q = $this->db->prepare('UPDATE uvmatiere SET	codeuvmatiere = :codeuvmatiere,	libelle_fr_uvmatiere = :libelle_fr_uvmatiere,	libelle_en_uvmatiere = :libelle_en_uvmatiere,	ncredis = :ncredis,	notevaliduvmatiere = :notevaliduvmatiere,	noteelimuvmatiere = :noteelimuvmatiere, vlmhoraire=:vlmhoraire WHERE 	iduvmatiere = :iduvmatiere');
		  $q->bindValue(':iduvmatiere',$uvmatiere->getIduvmatiere());
		  $q->bindValue(':codeuvmatiere',$uvmatiere->getCodeuvmatiere());
		  $q->bindValue(':libelle_fr_uvmatiere',$uvmatiere->getLibelle_fr_uvmatiere());
		  $q->bindValue(':libelle_en_uvmatiere',$uvmatiere->getLibelle_en_uvmatiere());
		  $q->bindValue(':ncredis',$uvmatiere->getNcredis());
		  $q->bindValue(':notevaliduvmatiere',$uvmatiere->getNotevaliduvmatiere());
		  $q->bindValue(':noteelimuvmatiere',$uvmatiere->getNoteelimuvmatiere());
          $q->bindValue(':vlmhoraire',$uvmatiere->getVlmhoraire());

		 $q->execute();
		 
		 $q->execute();
		  return 1;
		}catch (Exception $e){
			return 0;
		}
	

	 } 

	 public function GetListUe_uv($idue)
	 {
		$req ='select iduvmatiere,codeuvmatiere,libelle_fr_uvmatiere,ncredis,notevaliduvmatiere,noteelimuvmatiere,vlmhoraire  from uvmatiere
		inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere 
		where idue=  '.$idue;
		$q = $this->db->query($req);
		 $Listuvmatiere= array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listuvmatiere[] = $data;

		}
		 return $Listuvmatiere;
	 }



	 public function Updateuv($uvmatiere){
		try{
		  $q = $this->db->prepare('UPDATE unite_enseignement SET	codeUE = :codeUE,	nomUE = :nomUE,	credit = :credit,	date_enreg = :date_enreg,	etat = :etat WHERE 	id = :id');
		  $q->bindValue(':iduvmatiere',$uvmatiere->getIduvmatiere());
		  $q->bindValue(':codeuvmatiere',$uvmatiere->getCodeuvmatiere());
		  $q->bindValue(':libelle_fr_uvmatiere',$uvmatiere->getLibelle_fr_uvmatiere());
		  $q->bindValue(':libelle_en_uvmatiere',$uvmatiere->getLibelle_en_uvmatiere());
		  $q->bindValue(':ncredis',$uvmatiere->getNcredis());
		  $q->bindValue(':notevaliduvmatiere',$uvmatiere->getNotevaliduvmatiere());
		  $q->bindValue(':noteelimuvmatiere',$uvmatiere->getNoteelimuvmatiere());
          $q->bindValue(':vlmhoraire',$uvmatiere->getVlmhoraire());
		 
		  $q->execute();
		  return 1;
		}catch (Exception $e){
			return 0;
		}
	
	 } 

	 public function Delete($iduvmatiere){
		 try{
	 			
		 
			$q = $this->db->prepare('DELETE FROM uvmatiere WHERE 	iduvmatiere = :iduvmatiere');
			$q->bindValue(':iduvmatiere',$iduvmatiere);
			$q->execute();
   
			 return 1;
			}catch (Exception $e){
				return 0;
			}

	 } 

	 public function GetUniqueUvmatiere($iduvmatiere){
		 
		 $q = $this->db->query('SELECT * FROM uvmatiere   WHERE 	iduvmatiere = '.$iduvmatiere);
		 return $q->fetch(PDO::FETCH_ASSOC);

	 } 

	 public function GetListUvmatiere($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM uvmatiere';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listuvmatiere = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listuvmatiere[] = $data;

		}
		 return $Listuvmatiere;

	 } 

	 public function GetListMultiKeysUvmatiere(){
		 
		 $req = 'SELECT * 
			 FROM uvmatiere';
		 $q = $this->db->query($req);
		 $Listuvmatiere = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listuvmatiere[] = $data;

		}
		 return $Listuvmatiere;

	 } 

	 public function CountUvmatiere(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM uvmatiere')->fetchColumn();

	 } 
 }