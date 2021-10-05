<?php
        /*----GeneratorClass
        ---
        --- Classe         :utilisateur
        --- date Generation: Tue, 20 Nov 2018 01:59:43 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  UtilisateurManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($utilisateur){
         try{

         $q = $this->db->prepare('INSERT INTO utilisateur(idgroupeutilisateur,codeutilisateur,login,password,sexe,nom,prenom,etatcopte,civilite,avatar,email) VALUES(:idgroupeutilisateur,:codeutilisateur,:login,:password,:sexe,:nom,:prenom,:etatcopte,:civilite,:avatar,:email)');
         $q->bindValue(':idgroupeutilisateur',$utilisateur->getIdgroupeutilisateur());
         $q->bindValue(':codeutilisateur',$utilisateur->getCodeutilisateur());
         $q->bindValue(':login',$utilisateur->getLogin());
         $q->bindValue(':password',md5(md5('Samson@2018'.$utilisateur->getPassword())));
         $q->bindValue(':sexe',$utilisateur->getSexe());
         $q->bindValue(':nom',$utilisateur->getNom());
		  $q->bindValue(':prenom',$utilisateur->getPrenom());
		  $q->bindValue(':etatcopte',$utilisateur->getEtatcopte());
		  $q->bindValue(':civilite',$utilisateur->getCivilite());
		  $q->bindValue(':avatar',$utilisateur->getAvatar());
		  $q->bindValue(':email',$utilisateur->getEmail());
		  $q->execute();  

 		 $utilisateur->hydrate(array('idutilisateur'=>$this->db->lastInsertId()));
            return 1;
         }catch (Exception $e){
             return 0;
         }

	 } 

	 public function Update($utilisateur){
		 
		  $q = $this->db->prepare('UPDATE utilisateur SET	idgroupeutilisateur = :idgroupeutilisateur,	codeutilisateur = :codeutilisateur,	login = :login,	password = :password,	sexe = :sexe,	nom = :nom,	prenom = :prenom,	etatcopte = :etatcopte,	civilite = :civilite,	avatar = :avatar,	email = :email WHERE 	idutilisateur = :idutilisateur');
		  $q->bindValue(':idutilisateur',$utilisateur->getIdutilisateur());
		  $q->bindValue(':idgroupeutilisateur',$utilisateur->getIdgroupeutilisateur());
		  $q->bindValue(':codeutilisateur',$utilisateur->getCodeutilisateur());
		  $q->bindValue(':login',$utilisateur->getLogin());
		  $q->bindValue(':password',$utilisateur->getPassword());
		  $q->bindValue(':sexe',$utilisateur->getSexe());
		  $q->bindValue(':nom',$utilisateur->getNom());
		  $q->bindValue(':prenom',$utilisateur->getPrenom());
		  $q->bindValue(':etatcopte',$utilisateur->getEtatcopte());
		  $q->bindValue(':civilite',$utilisateur->getCivilite());
		  $q->bindValue(':avatar',$utilisateur->getAvatar());
		  $q->bindValue(':email',$utilisateur->getEmail());
		  $q->execute();

	 } 

	 public function Delete($idutilisateur){
		 
		 $this->db->exec('DELETE FROM utilisateur WHERE 	idutilisateur = $idutilisateur');

	 } 

	 public function GetUniqueUtilisateur($idutilisateur){
		 
		 $q = $this->db->query('SELECT * FROM utilisateur   WHERE 	idutilisateur = '.$idutilisateur);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListUtilisateur($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM utilisateur';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listutilisateur = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listutilisateur[] = $data;

		}
		 return $Listutilisateur;

	 } 

	 public function GetListMultiKeysUtilisateur($idgroupeutilisateur){
		 
		 $req = 'SELECT * 
			 FROM utilisateur';
		 $q = $this->db->query($req);
		 $Listutilisateur = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listutilisateur[] = $data;

		}
		 return $Listutilisateur;

	 } 

	 public function CountUtilisateur(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM utilisateur')->fetchColumn();

	 } 
 }