<?php
    //class controleur
    
   try {
    error_reporting(0);
    
    include_once 'administration/modele/commune/note.php';
    include_once 'administration/commune/security/securite.php';
    
    include_once 'modele/commune/note.php';
    include_once 'controleur/security/securite.php';
    
    include_once '../../../modele/commune/note.php';
    include_once '../../../controleur/security/securite.php';
    
    
    
} catch (Exception $ex) {
    
}
    
    class note
    {
		
		//fonction ajouter
		public function note_aj($controle_continu,$id_etudiant,$id_unite_enseignement,$id_annee_academique)
		{
                $object= new note_m();
	
				try
				{
                                    
					$result=$object->note_aj(securite::filtre($controle_continu),securite::filtre($id_etudiant),securite::filtre($id_unite_enseignement),securite::filtre($id_annee_academique));
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
                
        public function note_cc($note,$id_etudiant,$id_unite_enseignement,$id_annee_academique)
		{
               $object= new note_m();
	
				try
				{
					
					$result=$object->note_cc(securite::filtre($note),securite::filtre($id_etudiant),securite::filtre($id_unite_enseignement),securite::filtre($id_annee_academique));
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
        public function note_ex($note,$session,$id_etudiant,$id_unite_enseignement,$id_annee_academique)
		{
               $object= new note_m();
	
				try
				{
					
					$result=$object->note_ex(securite::filtre($note),securite::filtre($session),securite::filtre($id_etudiant),securite::filtre($id_unite_enseignement),securite::filtre($id_annee_academique));
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
	public function note_rt($note,$session,$id_etudiant,$id_unite_enseignement,$id_annee_academique)
		{
               $object= new note_m();
	
				try
				{
					
				   	   $result=$object->note_rt(securite::filtre($note),securite::filtre($session),securite::filtre($id_etudiant),securite::filtre($id_unite_enseignement),securite::filtre($id_annee_academique));

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
                
        public function note_sup($id)
		{
               $object= new note_m();
	
				try
				{
					
					$result=$object->note_sup(securite::filtre($id));
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
		
		 public function note_suppression_total($id)
		{
                $object= new note_m();
	
				try
				{
					
					$result=$object->note_suppresion_total(securite::filtre($id));
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
        
        public function note_liste_abc()
		{
               $object= new note_m();
	
				try
				{
					
					$result=$object->note_liste_abc();
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
        
        public function note_liste_asc()
		{
                  $object= new note_m();
	
				try
				{
					
					$result=$object->note_liste_asc();
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
        
        public function note_liste_desc()
		{
                  $object= new note_m();
	
				try
				{
					
					$result=$object->note_liste_desc();
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
        
        public function note_liste_un($id)
		{
                $object= new note_m();
	
				try
				{
					
					$result=$object->note_liste_un(securite::filtre($id));
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
		
		public function note_liste_controle_continu($id)
		{
                $object= new note_m();
	
				try
				{
					
					$result=$object->note_liste_controle_continu(securite::filtre($id));
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
                
                public function note_liste_examen($id)
		{
                $object= new note_m();
	
				try
				{
					
					$result=$object->note_liste_examen(securite::filtre($id));
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
                
                public function note_liste_rattrapage($id)
		{
                $object= new note_m();
	
				try
				{
					
					$result=$object->note_liste_rattrapage(securite::filtre($id));
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
                 public function note_liste_session($id)
		{
                $object= new note_m();
	
				try
				{
					
					$result=$object->note_liste_session(securite::filtre($id));
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
	
		public function note_ll()
		{ 
                    $object= new note_m();
	
                    try
                    {
					
			$result=$object->note_ll();
                        
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

		public function note_lll($id)
		{
                     $object= new note_m();
	
                    try
                    {
					
			$result=$object->note_lll(securite::filtre($id));
                        
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
		
		public function note_count()
		{
                  $object= new note_m();
	
				try
				{
					
					$result=$object->note_count();
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
                
                public function note_liste_limit($suite)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new note_m();
	
                                    try
                                    {

                                        $result=$object->note_liste_limit(securite::filtre($suite));

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
                
                 public function note_suite($suite,$rub)
		{
                                    $suite=securite::filtre($suite);
                    
				    $object= new note_m();
	
                                    try
                                    {

                                        $result=$object->note_suite(securite::filtre($suite),securite::filtre($rub));

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
		
           public function note_liste_etudiant($id_etudiant,$id_unite_enseignement,$id_annee_academique)
		{
                $object= new note_m();
	
				try
				{
					
					$result=$object->note_liste_etudiant(securite::filtre($id_etudiant),securite::filtre($id_unite_enseignement),securite::filtre($id_annee_academique));
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
        public function note_liste_etudiant_count($id_etudiant,$id_unite_enseignement,$id_annee_academique)
		{
                $object= new note_m();
	
				try
				{
					
					$result=$object->note_liste_etudiant_count(securite::filtre($id_etudiant),securite::filtre($id_unite_enseignement),securite::filtre($id_annee_academique));
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
        public function note_liste_etudiant_ue($id_unite_enseignement,$id_annee_academique)
		{
                $object= new note_m();
	
				try
				{
					
					$result=$object->note_liste_etudiant_ue(securite::filtre($id_unite_enseignement),securite::filtre($id_annee_academique));
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
        public function note_liste_etudiant_count_ue($id_unite_enseignement,$id_annee_academique)
		{
                $object= new note_m();
	
				try
				{
					
					$result=$object->note_liste_etudiant_count_ue(securite::filtre($id_unite_enseignement),securite::filtre($id_annee_academique));
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