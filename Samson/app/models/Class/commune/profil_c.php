<?php
    //class controleur
	
    include_once '../../../modele/connexion/profil_c.php';
    include_once '../../../controleur/security/securite.php';
    
    
    class profil_c
    {
		
		//fonction connexion
		public function profil_login($login,$pwd)
		{
                    $object= new profil();

                        try
                        {
                            $result=$object->profil_login(securite::filtre($login),securite::filtre($pwd));
                            return $result; 
                        }
                        catch(Exception $e)
                        {
                            die('Erreur : '.$e->getMessage());
                        }
		}
		
		
		
}
?>