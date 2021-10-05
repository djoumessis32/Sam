<?php
    //class controleur
    
   try {
    error_reporting(0);
    
    include_once 'administration/modele/connexion/profil.php';
    include_once 'administration/controleur/security/securite.php';
    
    include_once 'modele/connexion/profil.php';
    include_once 'controleur/security/securite.php';
    
    include_once '../../../modele/connexion/profil.php';
    include_once '../../../controleur/security/securite.php';
    
    
    
} catch (Exception $ex) {
    
}
    
    class profil
    {
		
		//fonction ajouter
		public function profil_aj($login,$pwd,$email,$type,$enregistrement)
		{
                $object= new profil_m();
	
				try
				{
                                    
					$result=$object->profil_aj(securite::filtre($login),securite::filtre($pwd),securite::filtre($email),securite::filtre($type),securite::filtre($enregistrement));
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
                
        public function profil_mod($login,$pwd,$email,$type,$enregistrement,$id)
		{
               $object= new profil_m();
	
				try
				{
					
					$result=$object->profil_mod(securite::filtre($login),securite::filtre($pwd),securite::filtre($email),securite::filtre($type),securite::filtre($enregistrement),securite::filtre($id));
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
                
        public function profil_sup($id)
		{
               $object= new profil_m();
	
				try
				{
					
					$result=$object->profil_sup(securite::filtre($id));
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
		
		 public function profil_suppression_total($id)
		{
                $object= new profil_m();
	
				try
				{
					
					$result=$object->profil_suppresion_total(securite::filtre($id));
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
        
        public function profil_liste_abc()
		{
               $object= new profil_m();
	
				try
				{
					
					$result=$object->profil_liste_abc();
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
        
        public function profil_liste_asc()
		{
                  $object= new profil_m();
	
				try
				{
					
					$result=$object->profil_liste_asc();
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
        
        public function profil_liste_desc()
		{
                  $object= new profil_m();
	
				try
				{
					
					$result=$object->profil_liste_desc();
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
        
        public function profil_liste_un($id)
		{
                $object= new profil_m();
	
				try
				{
					
					$result=$object->profil_liste_un(securite::filtre($id));
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
		
		public function profil_liste_nom($id)
		{
                $object= new profil_m();
	
				try
				{
					
					$result=$object->profil_liste_nom(securite::filtre($id));
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
	
		public function profil_ll()
		{ 
                    $object= new profil_m();
	
                    try
                    {
					
			$result=$object->profil_ll();
                        
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

		public function profil_lll($id)
		{
                     $object= new profil_m();
	
                    try
                    {
					
			$result=$object->profil_lll(securite::filtre($id));
                        
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
		
		public function profil_count()
		{
                  $object= new profil_m();
	
				try
				{
					
					$result=$object->profil_count();
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
                
                public function profil_liste_limit($suite)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new profil_m();
	
                                    try
                                    {

                                        $result=$object->profil_liste_limit(securite::filtre($suite));

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
                
                 public function profil_suite($suite,$rub)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new profil_m();
	
                                    try
                                    {

                                        $result=$object->profil_suite(securite::filtre($suite),securite::filtre($rub));

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