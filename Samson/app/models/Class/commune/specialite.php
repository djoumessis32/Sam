<?php
    //class controleur
    
   try {
    error_reporting(0);
    
    include_once 'administration/modele/commune/specialite.php';
    include_once 'administration/commune/security/securite.php';
    
    include_once 'modele/commune/specialite.php';
    include_once 'controleur/security/securite.php';
    
    include_once '../../../modele/commune/specialite.php';
    include_once '../../../controleur/security/securite.php';
    
    
    
} catch (Exception $ex) {
    
}
    
    class specialite
    {
		
		//fonction ajouter
		public function specialite_aj($codeSP,$nomSP,$niveau,$id_filiere)
		{
                $object= new specialite_m();
	
				try
				{
                                    
					$result=$object->specialite_aj(securite::filtre($codeSP),securite::filtre($nomSP),securite::filtre($niveau),securite::filtre($id_filiere));
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
                
        public function specialite_mod($codeSP,$nomSP,$niveau,$id_filiere,$id)
		{
               $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_mod(securite::filtre($codeSP),securite::filtre($nomSP),securite::filtre($niveau),securite::filtre($id_filiere),securite::filtre($id));
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
                
        public function specialite_sup($id)
		{
               $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_sup(securite::filtre($id));
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
		
		 public function specialite_suppression_total($id)
		{
                $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_suppresion_total(securite::filtre($id));
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
        
        public function specialite_liste_abc()
		{
               $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_liste_abc();
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
        
        public function specialite_liste_asc()
		{
                  $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_liste_asc();
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
        
        public function specialite_liste_desc()
		{
                  $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_liste_desc();
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
        
        public function specialite_liste_un($id)
		{
                $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_liste_un(securite::filtre($id));
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
		
		public function specialite_liste_nom($id)
		{
                $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_liste_nom(securite::filtre($id));
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
                
                public function specialite_liste_code($id)
		{
                $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_liste_code(securite::filtre($id));
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
                
                public function specialite_liste_id($id)
		{
                $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_liste_id(securite::filtre($id));
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
                
                public function specialite_liste_niveau($id)
		{
                $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_liste_niveau(securite::filtre($id));
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
	
		public function specialite_ll()
		{ 
                    $object= new specialite_m();
	
                    try
                    {
					
			$result=$object->specialite_ll();
                        
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

		public function specialite_lll($id)
		{
                     $object= new specialite_m();
	
                    try
                    {
					
			$result=$object->specialite_lll(securite::filtre($id));
                        
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
		
		public function specialite_count()
		{
                  $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_count();
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
                
                public function specialite_liste_limit($suite)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new specialite_m();
	
                                    try
                                    {

                                        $result=$object->specialite_liste_limit(securite::filtre($suite));

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
                
                 public function specialite_suite($suite,$rub)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new specialite_m();
	
                                    try
                                    {

                                        $result=$object->specialite_suite(securite::filtre($suite),securite::filtre($rub));

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
		
                public function specialite_liste_filiere($id)
		{
                $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_liste_filiere(securite::filtre($id));
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
                public function specialite_liste_precedent($filiere,$niveau)
		{
                $object= new specialite_m();
	
				try
				{
					
					$result=$object->specialite_liste_precedent(securite::filtre($filiere),securite::filtre($niveau));
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