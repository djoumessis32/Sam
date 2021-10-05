<?php
    //class controleur
    
   try {
    error_reporting(0);
    
    include_once 'administration/modele/commune/annee_academique.php';
    include_once 'administration/commune/security/securite.php';
    
    include_once 'modele/commune/annee_academique.php';
    include_once 'controleur/security/securite.php';
    
    include_once '../../../modele/commune/annee_academique.php';
    include_once '../../../controleur/security/securite.php';
    
    
    
} catch (Exception $ex) {
    
}
    
    class annee_academique
    {
		
		//fonction ajouter
		public function annee_academique_aj($nomAC,$statut)
		{
                $object= new annee_academique_m();
	
				try
				{
                                    
					$result=$object->annee_academique_aj(securite::filtre($nomAC),securite::filtre($statut));
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
                
        public function annee_academique_mod($nomAC,$statut,$id)
		{
               $object= new annee_academique_m();
	
				try
				{
					
					$result=$object->annee_academique_mod(securite::filtre($nomAC),securite::filtre($statut),securite::filtre($id));
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
                
        public function annee_academique_sup($id)
		{
               $object= new annee_academique_m();
	
				try
				{
					
					$result=$object->annee_academique_sup(securite::filtre($id));
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
		
		 public function annee_academique_suppression_total($id)
		{
                $object= new annee_academique_m();
	
				try
				{
					
					$result=$object->annee_academique_suppresion_total(securite::filtre($id));
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
        
        public function annee_academique_liste_abc()
		{
               $object= new annee_academique_m();
	
				try
				{
					
					$result=$object->annee_academique_liste_abc();
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
        
        public function annee_academique_liste_asc()
		{
                  $object= new annee_academique_m();
	
				try
				{
					
					$result=$object->annee_academique_liste_asc();
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
        
        public function annee_academique_liste_desc()
		{
                  $object= new annee_academique_m();
	
				try
				{
					
					$result=$object->annee_academique_liste_desc();
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
        
        public function annee_academique_liste_un($id)
		{
                $object= new annee_academique_m();
	
				try
				{
					
					$result=$object->annee_academique_liste_un(securite::filtre($id));
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
		
		public function annee_academique_liste_nom($id)
		{
                $object= new annee_academique_m();
	
				try
				{
					
					$result=$object->annee_academique_liste_nom(securite::filtre($id));
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
	
		public function annee_academique_ll()
		{ 
                    $object= new annee_academique_m();
	
                    try
                    {
					
			$result=$object->annee_academique_ll();
                        
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

		public function annee_academique_lll($id)
		{
                     $object= new annee_academique_m();
	
                    try
                    {
					
			$result=$object->annee_academique_lll(securite::filtre($id));
                        
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
		
		public function annee_academique_count()
		{
                  $object= new annee_academique_m();
	
				try
				{
					
					$result=$object->annee_academique_count();
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
                
                public function annee_academique_liste_limit($suite)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new annee_academique_m();
	
                                    try
                                    {

                                        $result=$object->annee_academique_liste_limit(securite::filtre($suite));

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
                
                 public function annee_academique_suite($suite,$rub)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new annee_academique_m();
	
                                    try
                                    {

                                        $result=$object->annee_academique_suite(securite::filtre($suite),securite::filtre($rub));

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