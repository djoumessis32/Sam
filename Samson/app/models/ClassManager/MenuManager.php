<?php
        /*----GeneratorClass
        ---
        --- Classe         :menu
        --- date Generation: Tue, 20 Nov 2018 01:55:43 +0100
        --- Auteur         : Erick KONGNE FAH
        --- php version    : 5.5.15*/

 class  MenuManager {
	 protected $db ;

	 public function __construct($db){
		 
		  $this->db = $db;

	 } 

	 public function Add($menu){
		 
		  $q = $this->db->prepare('INSERT INTO menu(idparent,idfils,libelle_fr,libelle_en,icon,lien,idlien,fichierrequete,fichierassocier,dossierviews) VALUES(:idparent,:idfils,:libelle_fr,:libelle_en,:icon,:lien,:idlien,:fichierrequete,:fichierassocier,:dossierviews)');
		  $q->bindValue(':idparent',$menu->getIdparent());
		  $q->bindValue(':idfils',$menu->getIdfils());
		  $q->bindValue(':libelle_fr',$menu->getLibelle_fr());
		  $q->bindValue(':libelle_en',$menu->getLibelle_en());
		  $q->bindValue(':icon',$menu->getIcon());
		  $q->bindValue(':lien',$menu->getLien());
		  $q->bindValue(':idlien',$menu->getIdlien());
		  $q->bindValue(':fichierrequete',$menu->getFichierrequete());
		  $q->bindValue(':fichierassocier',$menu->getFichierassocier());
		  $q->bindValue(':dossierviews',$menu->getDossierviews());
		  $q->execute();  

 		 $menu->hydrate(array('idmenu'=>$this->db->lastInsertId()));

	 } 

	 public function Update($menu){
		 
		  $q = $this->db->prepare('UPDATE menu SET	idparent = :idparent,	idfils = :idfils,	libelle_fr = :libelle_fr,	libelle_en = :libelle_en,	icon = :icon,	lien = :lien,	idlien = :idlien,	fichierrequete = :fichierrequete,	fichierassocier = :fichierassocier,	dossierviews = :dossierviews WHERE 	idmenu = :idmenu');
		  $q->bindValue(':idmenu',$menu->getIdmenu());
		  $q->bindValue(':idparent',$menu->getIdparent());
		  $q->bindValue(':idfils',$menu->getIdfils());
		  $q->bindValue(':libelle_fr',$menu->getLibelle_fr());
		  $q->bindValue(':libelle_en',$menu->getLibelle_en());
		  $q->bindValue(':icon',$menu->getIcon());
		  $q->bindValue(':lien',$menu->getLien());
		  $q->bindValue(':idlien',$menu->getIdlien());
		  $q->bindValue(':fichierrequete',$menu->getFichierrequete());
		  $q->bindValue(':fichierassocier',$menu->getFichierassocier());
		  $q->bindValue(':dossierviews',$menu->getDossierviews());
		  $q->execute();

	 } 

	 public function Delete($idmenu){
		 
		 $this->db->exec('DELETE FROM menu WHERE 	idmenu = $idmenu');

	 } 

	 public function GetUniqueMenu($idmenu){
		 
		 $q = $this->db->query('SELECT * FROM menu   WHERE 	idmenu = '.$idmenu);
		 return $q->fetch(PDO::FETCH_ASSOC); 

	 } 

	 public function GetListMenu($min=-1,$max=-1){
		 
		 $req = 'SELECT * FROM menu';

		 if($min != $max){  

			 $req .=' LIMIT '.(int)$min.' OFFSET '.(int)$max ;

		 }
		 $q = $this->db->query($req);
		 $Listmenu = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listmenu[] = $data;

		}
		 return $Listmenu;

	 } 

	 public function GetListMultiKeysMenu(){
		 
		 $req = 'SELECT * 
			 FROM menu';
		 $q = $this->db->query($req);
		 $Listmenu = array();

		 while($data = $q->fetch(PDO::FETCH_ASSOC)){

			 $Listmenu[] = $data;

		}
		 return $Listmenu;

	 } 

	 public function CountMenu(){
		 
		  return $this->db->query('SELECT COUNT(*) FROM menu')->fetchColumn();

	 } 
 }