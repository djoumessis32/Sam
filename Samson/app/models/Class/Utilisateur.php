<?php
        /*----GeneratorClass
        ---
        --- Classe         :utilisateur
        --- date Generation: Tue, 20 Nov 2018 01:59:43 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  Utilisateur{ 
	 protected $idutilisateur;
	 protected $idgroupeutilisateur;
	 protected $codeutilisateur;
	 protected $login;
	 protected $password;
	 protected $sexe;
	 protected $nom;
	 protected $prenom;
	 protected $etatcopte;
	 protected $civilite;
	 protected $avatar;
	 protected $email;

	 public function __construct($data){
		 
		  $this->hydrate($data);
	 } 

	 public function hydrate($data){
		  foreach($data AS $key=>$value){
		    $method = 'set'.ucfirst($key);
		    if(method_exists($this,$method)){
			     $this->$method ($value); 
		}  
	}
	 } 

	 public function getIdutilisateur(){
		 return $this->idutilisateur;
	 } 

	 public function getIdgroupeutilisateur(){
		 return $this->idgroupeutilisateur;
	 } 

	 public function getCodeutilisateur(){
		 return $this->codeutilisateur;
	 } 

	 public function getLogin(){
		 return $this->login;
	 } 

	 public function getPassword(){
		 return $this->password;
	 } 

	 public function getSexe(){
		 return $this->sexe;
	 } 

	 public function getNom(){
		 return $this->nom;
	 } 

	 public function getPrenom(){
		 return $this->prenom;
	 } 

	 public function getEtatcopte(){
		 return $this->etatcopte;
	 } 

	 public function getCivilite(){
		 return $this->civilite;
	 } 

	 public function getAvatar(){
		 return $this->avatar;
	 } 

	 public function getEmail(){
		 return $this->email;
	 } 

	 public function setIdutilisateur($idutilisateur){
		 $this->idutilisateur = $idutilisateur;
	 } 

	 public function setIdgroupeutilisateur($idgroupeutilisateur){
		 $this->idgroupeutilisateur = $idgroupeutilisateur;
	 } 

	 public function setCodeutilisateur($codeutilisateur){
		 $this->codeutilisateur = $codeutilisateur;
	 } 

	 public function setLogin($login){
		 $this->login = $login;
	 } 

	 public function setPassword($password){
		 $this->password = $password;
	 } 

	 public function setSexe($sexe){
		 $this->sexe = $sexe;
	 } 

	 public function setNom($nom){
		 $this->nom = $nom;
	 } 

	 public function setPrenom($prenom){
		 $this->prenom = $prenom;
	 } 

	 public function setEtatcopte($etatcopte){
		 $this->etatcopte = $etatcopte;
	 } 

	 public function setCivilite($civilite){
		 $this->civilite = $civilite;
	 } 

	 public function setAvatar($avatar){
		 $this->avatar = $avatar;
	 } 

	 public function setEmail($email){
		 $this->email = $email;
	 } 
 }