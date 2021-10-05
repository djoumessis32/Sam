<?php
    //class controleur
    
   try {
    error_reporting(0);
    
    include_once 'administration/modele/commune/module.php';
    include_once 'administration/commune/security/securite.php';
    
    include_once 'modele/commune/module.php';
    include_once 'controleur/security/securite.php';
    
    include_once '../../../modele/commune/module.php';
    include_once '../../../controleur/security/securite.php';
    
    
    
} catch (Exception $ex) {
    
}
    
    class module
    {
		
		//fonction ajouter
		public function module_aj($code,$nom,$semestre,$id_specialite)
		{
                $object= new module_m();
	
				try
				{
                                    
					$result=$object->module_aj(securite::filtre($code),securite::filtre($nom),securite::filtre($semestre),securite::filtre($id_specialite));
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
                
        public function module_mod($code,$nom,$semestre,$id_specialite,$id)
		{
               $object= new module_m();
	
				try
				{
					
					$result=$object->module_mod(securite::filtre($code),securite::filtre($nom),securite::filtre($semestre),securite::filtre($id_specialite),securite::filtre($id));
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
                
        public function module_sup($id)
		{
               $object= new module_m();
	
				try
				{
					
					$result=$object->module_sup(securite::filtre($id));
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
		
		 public function module_suppression_total($id)
		{
                $object= new module_m();
	
				try
				{
					
					$result=$object->module_suppresion_total(securite::filtre($id));
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
        
        public function module_liste_abc()
		{
               $object= new module_m();
	
				try
				{
					
					$result=$object->module_liste_abc();
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
        
        public function module_liste_asc()
		{
                  $object= new module_m();
	
				try
				{
					
					$result=$object->module_liste_asc();
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
        
        public function module_liste_desc()
		{
                  $object= new module_m();
	
				try
				{
					
					$result=$object->module_liste_desc();
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
        
        public function module_liste_un($id)
		{
                $object= new module_m();
	
				try
				{
					
					$result=$object->module_liste_un(securite::filtre($id));
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
		
		public function module_liste_nom($id)
		{
                $object= new module_m();
	
				try
				{
					
					$result=$object->module_liste_nom(securite::filtre($id));
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
                public function module_liste_code($id)
		{
                $object= new module_m();
	
				try
				{
					
					$result=$object->module_liste_code(securite::filtre($id));
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
	
		public function module_ll()
		{ 
                    $object= new module_m();
	
                    try
                    {
					
			$result=$object->module_ll();
                        
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

		public function module_lll($id)
		{
                     $object= new module_m();
	
                    try
                    {
					
			$result=$object->module_lll(securite::filtre($id));
                        
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
		
		public function module_count()
		{
                  $object= new module_m();
	
				try
				{
					
					$result=$object->module_count();
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
                
                public function module_liste_limit($suite)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new module_m();
	
                                    try
                                    {

                                        $result=$object->module_liste_limit(securite::filtre($suite));

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
                
                 public function module_suite($suite,$rub)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new module_m();
	
                                    try
                                    {

                                        $result=$object->module_suite(securite::filtre($suite),securite::filtre($rub));

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
		public function module_liste_semestre($semestre,$id_specialite)
		{
               $object= new module_m();
	
				try
				{
					
					$result=$object->module_liste_semestre(securite::filtre($semestre),securite::filtre($id_specialite));
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
                public function module_liste_semestre_count($semestre,$id_specialite)
		{
               $object= new module_m();
	
				try
				{
					
					$result=$object->module_liste_semestre_count(securite::filtre($semestre),securite::filtre($id_specialite));
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