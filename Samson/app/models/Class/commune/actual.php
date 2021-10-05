<?php
    //class controleur
    
   try {
    error_reporting(0);
    
    include_once 'administration/modele/commune/actual.php';
    include_once 'administration/commune/security/securite.php';
    
    include_once 'modele/commune/actual.php';
    include_once 'controleur/security/securite.php';
    
    include_once '../../../modele/commune/actual.php';
    include_once '../../../controleur/security/securite.php';
    
    
    
} catch (Exception $ex) {
    
}
    
    class actual
    {
		
		//fonction ajouter
		public function actual_aj($nom,$image,$contenu)
		{
                $object= new actual_m();
	
				try
				{
                                    
					$result=$object->actual_aj(securite::filtre($nom),securite::filtre($image),securite::filtre($contenu));
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
                
        public function actual_mod($nom,$image,$contenu,$id)
		{
               $object= new actual_m();
	
				try
				{
					
					$result=$object->actual_mod(securite::filtre($nom),securite::filtre($image),securite::filtre($contenu),securite::filtre($id));
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
                
        public function actual_sup($id)
		{
               $object= new actual_m();
	
				try
				{
					
					$result=$object->actual_sup(securite::filtre($id));
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
		
		 public function actual_suppression_total($id)
		{
                $object= new actual_m();
	
				try
				{
					
					$result=$object->actual_suppresion_total(securite::filtre($id));
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
        
        public function actual_liste_abc()
		{
               $object= new actual_m();
	
				try
				{
					
					$result=$object->actual_liste_abc();
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
        
        public function actual_liste_asc()
		{
                  $object= new actual_m();
	
				try
				{
					
					$result=$object->actual_liste_asc();
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
        
        public function actual_liste_desc()
		{
                  $object= new actual_m();
	
				try
				{
					
					$result=$object->actual_liste_desc();
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
        
        public function actual_liste_un($id)
		{
                $object= new actual_m();
	
				try
				{
					
					$result=$object->actual_liste_un(securite::filtre($id));
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
		
		public function actual_liste_nom($id)
		{
                $object= new actual_m();
	
				try
				{
					
					$result=$object->actual_liste_nom(securite::filtre($id));
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
	
		public function actual_ll()
		{ 
                    $object= new actual_m();
	
                    try
                    {
					
			$result=$object->actual_ll();
                        
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

		public function actual_lll($id)
		{
                     $object= new actual_m();
	
                    try
                    {
					
			$result=$object->actual_lll(securite::filtre($id));
                        
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
		
		public function actual_count()
		{
                  $object= new actual_m();
	
				try
				{
					
					$result=$object->actual_count();
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
                
                public function actual_liste_limit($suite)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new actual_m();
	
                                    try
                                    {

                                        $result=$object->actual_liste_limit(securite::filtre($suite));

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
                
                 public function actual_suite($suite,$rub)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new actual_m();
	
                                    try
                                    {

                                        $result=$object->actual_suite(securite::filtre($suite),securite::filtre($rub));

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