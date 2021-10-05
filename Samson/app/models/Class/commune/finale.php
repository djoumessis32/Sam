<?php
    //class controleur
    
   try {
    error_reporting(0);
    
    include_once 'administration/modele/commune/finale.php';
    include_once 'administration/commune/security/securite.php';
    
    include_once 'modele/commune/finale.php';
    include_once 'controleur/security/securite.php';
    
    include_once '../../../modele/commune/finale.php';
    include_once '../../../controleur/security/securite.php';
    
    
    
} catch (Exception $ex) {
    
}
    
    class finale
    {
		
		public function finale_update1($id_etudiant,$s1,$etat)
		{
                $object= new finale_m();
	
				try
				{
                                    
					$result=$object->finale_update1(securite::filtre($id_etudiant),securite::filtre($s1),securite::filtre($etat));
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
                public function finale_update2($id_etudiant,$s1,$etat)
		{
                $object= new finale_m();
	
				try
				{
                                    
					$result=$object->finale_update2(securite::filtre($id_etudiant),securite::filtre($s1),securite::filtre($etat));
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
		
		public function finale_exit($id_etudiant)
		{
                $object= new finale_m();
	
				try
				{
                                    
					$result=$object->finale_exit(securite::filtre($id_etudiant));
				   	return $result; 
                                        
                        
					
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
		
                public function finale_liste_s1($id_etudiant)
		{
                $object= new finale_m();
	
				try
				{
                                    
					$result=$object->finale_liste_s1(securite::filtre($id_etudiant));
				   	return $result; 
                                        
                        
					
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
                
                public function finale_liste_s2($id_etudiant)
		{
                $object= new finale_m();
	
				try
				{
                                    
					$result=$object->finale_liste_s2(securite::filtre($id_etudiant));
				   	return $result; 
                                        
                        
					
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }
		}
}
?>