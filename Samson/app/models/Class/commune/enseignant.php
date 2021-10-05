<?php
    //class controleur
    
   try {
    error_reporting(0);
    
    include_once 'administration/modele/commune/enseignant.php';
    include_once 'administration/commune/security/securite.php';
    
    include_once 'modele/commune/enseignant.php';
    include_once 'controleur/security/securite.php';
    
    include_once '../../../modele/commune/enseignant.php';
    include_once '../../../controleur/security/securite.php';
    
    
    
} catch (Exception $ex) {
    
}
    
    class enseignant
    {
		
		//fonction ajouter
		public function enseignant_aj($matriculeEns,$photoEns,$nomEns,$prenomEns,$sexeEns,$domaineEns,$diplome_eleve,$nationaliteEns,$dateNaissEns,$lieuNaissEns,$adresseEns,$telephoneEns)
		{
                $object= new enseignant_m();
	
				try
				{
                                    
					$result=$object->enseignant_aj(securite::filtre($matriculeEns),securite::filtre($photoEns),securite::filtre($nomEns),securite::filtre($prenomEns),securite::filtre($sexeEns),securite::filtre($domaineEns),securite::filtre($diplome_eleve),securite::filtre($nationaliteEns),securite::filtre($dateNaissEns),securite::filtre($lieuNaissEns),securite::filtre($adresseEns),securite::filtre($telephoneEns));
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
                
        public function enseignant_mod($matriculeEns,$photoEns,$nomEns,$prenomEns,$sexeEns,$domaineEns,$diplome_eleve,$nationaliteEns,$dateNaissEns,$lieuNaissEns,$adresseEns,$telephoneEns,$id)
		{
               $object= new enseignant_m();
	
				try
				{
					
					$result=$object->enseignant_mod(securite::filtre($matriculeEns),securite::filtre($photoEns),securite::filtre($nomEns),securite::filtre($prenomEns),securite::filtre($sexeEns),securite::filtre($domaineEns),securite::filtre($diplome_eleve),securite::filtre($nationaliteEns),securite::filtre($dateNaissEns),securite::filtre($lieuNaissEns),securite::filtre($adresseEns),securite::filtre($telephoneEns),securite::filtre($id));
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
                
        public function enseignant_sup($id)
		{
               $object= new enseignant_m();
	
				try
				{
					
					$result=$object->enseignant_sup(securite::filtre($id));
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
		
		 public function enseignant_suppression_total($id)
		{
                $object= new enseignant_m();
	
				try
				{
					
					$result=$object->enseignant_suppresion_total(securite::filtre($id));
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
        
        public function enseignant_liste_abc()
		{
               $object= new enseignant_m();
	
				try
				{
					
					$result=$object->enseignant_liste_abc();
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
        
        public function enseignant_liste_asc()
		{
                  $object= new enseignant_m();
	
				try
				{
					
					$result=$object->enseignant_liste_asc();
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
        
        public function enseignant_liste_desc()
		{
                  $object= new enseignant_m();
	
				try
				{
					
					$result=$object->enseignant_liste_desc();
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
        
        public function enseignant_liste_un($id)
		{
                $object= new enseignant_m();
	
				try
				{
					
					$result=$object->enseignant_liste_un(securite::filtre($id));
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
		
		public function enseignant_liste_nom($id)
		{
                $object= new enseignant_m();
	
				try
				{
					
					$result=$object->enseignant_liste_nom(securite::filtre($id));
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
	
		public function enseignant_ll()
		{ 
                    $object= new enseignant_m();
	
                    try
                    {
					
			$result=$object->enseignant_ll();
                        
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

		public function enseignant_lll($id)
		{
                     $object= new enseignant_m();
	
                    try
                    {
					
			$result=$object->enseignant_lll(securite::filtre($id));
                        
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
		
		public function enseignant_count()
		{
                  $object= new enseignant_m();
	
				try
				{
					
					$result=$object->enseignant_count();
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
                
                public function enseignant_liste_limit($suite)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new enseignant_m();
	
                                    try
                                    {

                                        $result=$object->enseignant_liste_limit(securite::filtre($suite));

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
                
                 public function enseignant_suite($suite,$rub)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new enseignant_m();
	
                                    try
                                    {

                                        $result=$object->enseignant_suite(securite::filtre($suite),securite::filtre($rub));

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