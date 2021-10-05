<?php
    //class controleur
    
   try {
    error_reporting(0);
    
    include_once 'administration/modele/commune/config.php';
    include_once 'administration/commune/security/securite.php';
    
    include_once 'modele/commune/config.php';
    include_once 'controleur/security/securite.php';
    
    include_once '../../../modele/commune/config.php';
    include_once '../../../controleur/security/securite.php';
    
    
    
} catch (Exception $ex) {
    
}
    
    class config
    {
		
		//fonction ajouter
		public function config_aj($login_pass,$jury,$date_jury)
		{
                $object= new config_m();
	
				try
				{
                                    
					$result=$object->config_aj(securite::filtre($login_pass),securite::filtre($jury),securite::filtre($date_jury));
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
                
        public function config_mod($login_pass,$jury,$date_jury,$id)
		{
               $object= new config_m();
	
				try
				{
					
					$result=$object->config_mod(securite::filtre($login_pass),securite::filtre($jury),securite::filtre($date_jury),securite::filtre($id));
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
                
        public function config_sup($id)
		{
               $object= new config_m();
	
				try
				{
					
					$result=$object->config_sup(securite::filtre($id));
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
		
		 public function config_suppression_total($id)
		{
                $object= new config_m();
	
				try
				{
					
					$result=$object->config_suppresion_total(securite::filtre($id));
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
        
        public function config_liste_abc()
		{
               $object= new config_m();
	
				try
				{
					
					$result=$object->config_liste_abc();
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
        
        public function config_liste_asc()
		{
                  $object= new config_m();
	
				try
				{
					
					$result=$object->config_liste_asc();
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
        
        public function config_liste_desc()
		{
                  $object= new config_m();
	
				try
				{
					
					$result=$object->config_liste_desc();
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
        
        public function config_liste_un($id)
		{
                $object= new config_m();
	
				try
				{
					
					$result=$object->config_liste_un(securite::filtre($id));
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
		
		public function config_liste_nom($id)
		{
                $object= new config_m();
	
				try
				{
					
					$result=$object->config_liste_nom(securite::filtre($id));
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
	
		public function config_ll()
		{ 
                    $object= new config_m();
	
                    try
                    {
					
			$result=$object->config_ll();
                        
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

		public function config_lll($id)
		{
                     $object= new config_m();
	
                    try
                    {
					
			$result=$object->config_lll(securite::filtre($id));
                        
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
		
		public function config_count()
		{
                  $object= new config_m();
	
				try
				{
					
					$result=$object->config_count();
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
                
                public function config_liste_limit($suite)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new config_m();
	
                                    try
                                    {

                                        $result=$object->config_liste_limit(securite::filtre($suite));

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
                
                 public function config_suite($suite,$rub)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new config_m();
	
                                    try
                                    {

                                        $result=$object->config_suite(securite::filtre($suite),securite::filtre($rub));

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