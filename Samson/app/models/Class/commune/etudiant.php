<?php
    //class controleur
    
   try {
    error_reporting(0);
    
   include_once 'administration/modele/commune/etudiant.php';
    include_once 'administration/commune/security/securite.php';
    
    include_once 'modele/commune/etudiant.php';
    include_once 'controleur/security/securite.php';
    
    include_once '../../../modele/commune/etudiant.php';
    include_once '../../../controleur/security/securite.php';
    
    
    
    
} catch (Exception $ex) {
    
}
    
    class etudiant
    {
		
		//fonction ajouter
		public function etudiant_aj($matriculeEt,$photoEt,$nomEt,$prenomEt,$nationaliteEt,$sexeEt,$dateNaissEt,$lieuNaissEt,$adresseEt,$telephoneEt,$nom_parent_tuteur,$telephone_parent_tuteur,$id_filiere,$id_annee_academique)
		{
                $object= new etudiant_m();
	
				try
				{
                                    
					$result=$object->etudiant_aj(securite::filtre($matriculeEt),securite::filtre($photoEt),securite::filtre($nomEt),securite::filtre($prenomEt),securite::filtre($nationaliteEt),securite::filtre($sexeEt),securite::filtre($dateNaissEt),securite::filtre($lieuNaissEt),securite::filtre($adresseEt),securite::filtre($telephoneEt),securite::filtre($nom_parent_tuteur),securite::filtre($telephone_parent_tuteur),securite::filtre($id_filiere),securite::filtre($id_annee_academique));
				   	if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
					
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
		
		//fonction modifier
                
        public function etudiant_mod($matriculeEt,$photoEt,$nomEt,$prenomEt,$nationaliteEt,$sexeEt,$dateNaissEt,$lieuNaissEt,$adresseEt,$telephoneEt,$nom_parent_tuteur,$telephone_parent_tuteur,$id_filiere,$id_annee_academique,$id)
		{
               $object= new etudiant_m();
	
				try
				{
					
					$result=$object->etudiant_mod(securite::filtre($matriculeEt),securite::filtre($photoEt),securite::filtre($nomEt),securite::filtre($prenomEt),securite::filtre($sexeEt),securite::filtre($nationaliteEt),securite::filtre($dateNaissEt),securite::filtre($lieuNaissEt),securite::filtre($adresseEt),securite::filtre($telephoneEt),securite::filtre($nom_parent_tuteur),securite::filtre($telephone_parent_tuteur),securite::filtre($id_filiere),securite::filtre($id_annee_academique),securite::filtre($id));
				   	if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
		
		
		//fonction supprimer de la liste
                
        public function etudiant_sup($id)
		{
               $object= new etudiant_m();
	
				try
				{
					
					$result=$object->etudiant_sup(securite::filtre($id));
				   	if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
					
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
		
		//fonction supprimer de la base de donnée
		
		 public function etudiant_suppression_total($id)
		{
                $object= new etudiant_m();
	
				try
				{
					
					$result=$object->etudiant_suppresion_total(securite::filtre($id));
				   	if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
					
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
		
         //fonction liste par ordre alphabetique
        
        public function etudiant_liste_abc()
		{
               $object= new etudiant_m();
	
				try
				{
					
					$result=$object->etudiant_liste_abc();
				   	if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
					
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
		
		//fonction liste par ordre croissant
        
        public function etudiant_liste_asc()
		{
                  $object= new etudiant_m();
	
				try
				{
					
					$result=$object->etudiant_liste_asc();
				   	if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
                }
                catch(Exception $e)
                {
					die('Erreur : '.$e->getMessage());
                }
		}
		
		//fonction liste par ordre decroissant
        
        public function etudiant_liste_desc()
		{
                  $object= new etudiant_m();
	
				try
				{
					
					$result=$object->etudiant_liste_desc();
				   	if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
		
		//fonction retourne un objet par identifiant
        
        public function etudiant_liste_un($id)
		{
                $object= new etudiant_m();
	
				try
				{
					
					$result=$object->etudiant_liste_un(securite::filtre($id));
				   	if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
		
		//fonction retourne le nom d'un objet par identifiant
		
		public function etudiant_liste_nom($id)
		{
                $object= new etudiant_m();
	
				try
				{
					
					$result=$object->etudiant_liste_nom(securite::filtre($id));
				   	if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}

	//fonction combo box ajouter
	
		public function etudiant_ll()
		{ 
                    $object= new etudiant_m();
	
                    try
                    {
					
			$result=$object->etudiant_ll();
                        
                        if(empty($result))
                        {
                            return '0';
                        }
                        else 
                        {
                           return $result; 
                        }
			
                    }
                    catch(Exception $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }
		}
		
		
		//fonction combo box modifier		

		public function etudiant_lll($id)
		{
                     $object= new etudiant_m();
	
                    try
                    {
					
			$result=$object->etudiant_lll(securite::filtre($id));
                        
                        if(empty($result))
                        {
                            return '0';
                        }
                        else 
                        {
                           return $result; 
                        }
                        
                    }
                    catch(Exception $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }
		}
		
		public function etudiant_count($annee)
		{
                  $object= new etudiant_m();
	
				try
				{
					
					$result=$object->etudiant_count(securite::filtre($annee));
				   	if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
                
                public function etudiant_liste_limit($suite,$rub,$annee)
		{
                                    $object= new etudiant_m();
	
                                    try
                                    {

                                        $result=$object->etudiant_liste_limit(securite::filtre($suite),securite::filtre($rub),securite::filtre($annee));

                                        if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
                                    }
                                catch(Exception $e)
                                   {
                                      die('Erreur : '.$e->getMessage());
                                   }
		}
                
                 public function etudiant_suite($suite,$rub)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new etudiant_m();
	
                                    try
                                    {

                                        $result=$object->etudiant_suite(securite::filtre($suite),securite::filtre($rub));

                                        if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
                                    }
                                catch(Exception $e)
                                   {
                                      die('Erreur : '.$e->getMessage());
                                   }
		}
                public function etudiant_liste_specialite($annee,$id)
		{
                $object= new etudiant_m();
	
				try
				{
					
					$result=$object->etudiant_liste_specialite(securite::filtre($annee),securite::filtre($id));
				   	if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
                
                 public function etudiant_count_specialite($annee,$id)
		{
                $object= new etudiant_m();
	
				try
				{
					
					$result=$object->etudiant_count_specialite(securite::filtre($annee),securite::filtre($id));
				   	if(empty($result))
                                        {
                                            return '0';
                                        }
                                        else 
                                        {
                                           return $result; 
                                        }
                        
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
		
}
?>