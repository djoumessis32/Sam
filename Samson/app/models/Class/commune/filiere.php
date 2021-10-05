<?php
    //class controleur
    
   try {
    error_reporting(0);
    
    include_once 'administration/modele/commune/filiere.php';
    include_once 'administration/commune/security/securite.php';
    
    include_once 'modele/commune/filiere.php';
    include_once 'controleur/security/securite.php';
    
    include_once '../../../modele/commune/filiere.php';
    include_once '../../../controleur/security/securite.php';
    
    
    
} catch (Exception $ex) {
    
}
    
    class filiere
    {
		
		//fonction ajouter
		public function filiere_aj($codeFil,$nomFil,$cycle)
		{
                $object= new filiere_m();
	
				try
				{
                                    
					$result=$object->filiere_aj(securite::filtre($codeFil),securite::filtre($nomFil),securite::filtre($cycle));
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
                
        public function filiere_mod($codeFil,$nomFil,$cycle,$id)
		{
               $object= new filiere_m();
	
				try
				{
					
					$result=$object->filiere_mod(securite::filtre($codeFil),securite::filtre($nomFil),securite::filtre($cycle),securite::filtre($id));
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
                
        public function filiere_sup($id)
		{
               $object= new filiere_m();
	
				try
				{
					
					$result=$object->filiere_sup(securite::filtre($id));
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
		
		 public function filiere_suppression_total($id)
		{
                $object= new filiere_m();
	
				try
				{
					
					$result=$object->filiere_suppresion_total(securite::filtre($id));
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
        
        public function filiere_liste_abc()
		{
               $object= new filiere_m();
	
				try
				{
					
					$result=$object->filiere_liste_abc();
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
        
        public function filiere_liste_asc()
		{
                  $object= new filiere_m();
	
				try
				{
					
					$result=$object->filiere_liste_asc();
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
        
        public function filiere_liste_desc()
		{
                  $object= new filiere_m();
	
				try
				{
					
					$result=$object->filiere_liste_desc();
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
        
        public function filiere_liste_un($id)
		{
                $object= new filiere_m();
	
				try
				{
					
					$result=$object->filiere_liste_un(securite::filtre($id));
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
		
		public function filiere_liste_nom($id)
		{
                $object= new filiere_m();
	
				try
				{
					
					$result=$object->filiere_liste_nom(securite::filtre($id));
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
                
                public function filiere_liste_code($id)
		{
                $object= new filiere_m();
	
				try
				{
					
					$result=$object->filiere_liste_code(securite::filtre($id));
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
	
		public function filiere_ll()
		{ 
                    $object= new filiere_m();
	
                    try
                    {
					
			$result=$object->filiere_ll();
                        
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

		public function filiere_lll($id)
		{
                     $object= new filiere_m();
	
                    try
                    {
					
			$result=$object->filiere_lll(securite::filtre($id));
                        
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
		
		public function filiere_count()
		{
                  $object= new filiere_m();
	
				try
				{
					
					$result=$object->filiere_count();
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
                
                public function filiere_liste_limit($suite)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new filiere_m();
	
                                    try
                                    {

                                        $result=$object->filiere_liste_limit(securite::filtre($suite));

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
                
                 public function filiere_suite($suite,$rub)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new filiere_m();
	
                                    try
                                    {

                                        $result=$object->filiere_suite(securite::filtre($suite),securite::filtre($rub));

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
                
                public function filiere_liste_cycle($id)
		{
                $object= new filiere_m();
	
				try
				{
					
					$result=$object->filiere_liste_cycle(securite::filtre($id));
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