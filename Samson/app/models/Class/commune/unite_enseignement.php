<?php
    //class controleur
    
   try {
    error_reporting(0);
    
    include_once 'administration/modele/commune/unite_enseignement.php';
    include_once 'administration/commune/security/securite.php';
    
    include_once 'modele/commune/unite_enseignement.php';
    include_once 'controleur/security/securite.php';
    
    include_once '../../../modele/commune/unite_enseignement.php';
    include_once '../../../controleur/security/securite.php';
    
    
    
} catch (Exception $ex) {
    
}
    
    class unite_enseignement
    {
		
		//fonction ajouter
		public function unite_enseignement_aj($codeUE,$nomUE,$credit,$id_enseignant,$id_module)
		{
                $object= new unite_enseignement_m();
	
				try
				{
                                    
					$result=$object->unite_enseignement_aj(securite::filtre($codeUE),securite::filtre($nomUE),securite::filtre($credit),securite::filtre($id_enseignant),securite::filtre($id_module));
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
                
        public function unite_enseignement_mod($codeUE,$nomUE,$credit,$id_enseignant,$id_module,$id)
		{
               $object= new unite_enseignement_m();
	
				try
				{
					
					$result=$object->unite_enseignement_mod(securite::filtre($codeUE),securite::filtre($nomUE),securite::filtre($credit),securite::filtre($id_enseignant),securite::filtre($id_module),securite::filtre($id));
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
                
        public function unite_enseignement_sup($id)
		{
               $object= new unite_enseignement_m();
	
				try
				{
					
					$result=$object->unite_enseignement_sup(securite::filtre($id));
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
		
		 public function unite_enseignement_suppression_total($id)
		{
                $object= new unite_enseignement_m();
	
				try
				{
					
					$result=$object->unite_enseignement_suppresion_total(securite::filtre($id));
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
        
        public function unite_enseignement_liste_abc()
		{
               $object= new unite_enseignement_m();
	
				try
				{
					
					$result=$object->unite_enseignement_liste_abc();
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
        
        public function unite_enseignement_liste_asc()
		{
                  $object= new unite_enseignement_m();
	
				try
				{
					
					$result=$object->unite_enseignement_liste_asc();
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
        
        public function unite_enseignement_liste_desc()
		{
                  $object= new unite_enseignement_m();
	
				try
				{
					
					$result=$object->unite_enseignement_liste_desc();
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
        
        public function unite_enseignement_liste_un($id)
		{
                $object= new unite_enseignement_m();
	
				try
				{
					
					$result=$object->unite_enseignement_liste_un(securite::filtre($id));
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
		
		public function unite_enseignement_liste_nom($id)
		{
                $object= new unite_enseignement_m();
	
				try
				{
					
					$result=$object->unite_enseignement_liste_nom(securite::filtre($id));
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
	
		public function unite_enseignement_ll()
		{ 
                    $object= new unite_enseignement_m();
	
                    try
                    {
					
			$result=$object->unite_enseignement_ll();
                        
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

		public function unite_enseignement_lll($id)
		{
                     $object= new unite_enseignement_m();
	
                    try
                    {
					
			$result=$object->unite_enseignement_lll(securite::filtre($id));
                        
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
		
		public function unite_enseignement_count()
		{
                  $object= new unite_enseignement_m();
	
				try
				{
					
					$result=$object->unite_enseignement_count();
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
                
                public function unite_enseignement_liste_limit($suite)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new unite_enseignement_m();
	
                                    try
                                    {

                                        $result=$object->unite_enseignement_liste_limit(securite::filtre($suite));

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
                
                 public function unite_enseignement_suite($suite,$rub)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new unite_enseignement_m();
	
                                    try
                                    {

                                        $result=$object->unite_enseignement_suite(securite::filtre($suite),securite::filtre($rub));

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
		 public function unite_enseignement_liste_module($module)
		{
                $object= new unite_enseignement_m();
	
				try
				{
					
					$result=$object->unite_enseignement_liste_module(securite::filtre($module));
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
                 public function unite_enseignement_liste_module_count($module)
		{
                $object= new unite_enseignement_m();
	
				try
				{
					
					$result=$object->unite_enseignement_liste_module_count(securite::filtre($module));
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