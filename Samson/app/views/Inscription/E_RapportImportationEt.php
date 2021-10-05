<?php
header('Content-Type: text/html; charset=UTF-8');
require_once('../../config.php');
/**
 * Created by PhpStorm.
 * Date: 08/12/16
 * Time: 12:37
 */

if(isset($_POST['data'])){
//print_r($_POST);
    $specialite = $_POST['specialite'];
    $semestreAcad = $_POST['semestreAcad'];
	$anneeAcad = $_POST['anneeAcad'];
    $entete=array();
    $data=array();
    $chaine_entete=$_POST['data1'];
    $chaine_data=$_POST['data'];
    $entete=explode(';',$chaine_entete);
    $data=explode('&',$chaine_data);
	
    
	
	echo '<html>
	<hr width="95%" height="4px">
<center><h1><u>Rapport d\'importation Fichier CSV: Etudiants</u></h1></center>
<center><table border="1">
<tr style="background-color:rgba(82, 109, 255, 0.52);color:white;">
<td >N°</td>
<td >Matricule</td>
<td >Noms</td>
<td >Prenoms</td>
<td >Nationalite</td>
<td >Sexe</td>
<td >Date Naissance</td>
<td >Lieu Naissance</td>
<td >Handicape</td>
<td >N°CNI</td>
<td >ID Region</td>
<td>Etat</td>
</tr>
';
 $nbattri=count($entete);
 $nbligne=count($data);

    $datafin=null;
    $d=1;
    
    $p=0;
    $bon=0;
    $echec=0;	
	$b=1;
	foreach($data as $ligne)
	{
		$z=1;
		
        $datafin=explode(';',$ligne);
		
		$req="select matriculeEt from etudiant where matriculeEt LIKE '%".$datafin[0]."%'";
		//echo $req;
		$valider=$con->query($req);
		//echo ($valider->rowCount()."<br>");
		if($valider->rowCount()==0)
		{
			//echo "ok";
			$req="INSERT INTO etudiant(";
			foreach($entete as $t)
			{
				if($z<$nbattri){
					$req.="".strtolower($t).",";
				}else{
					$req.="".strtolower($t)."";
				}
				$z++;

			}
			$req.=")values(";
			
				$req_f=$req;
				$datafin=explode(';',$ligne);

				$d=1;
				foreach($datafin as $u)
				{

					if($d<$nbattri){
						$req_f.="'".($u)."',";
					}else{
						$req_f.="'".($u)."'";
					}
					$d++;
				}
				$req_f.=")";
				//echo $req_f;
				$test=$con->exec($req_f);
				
				if($test==true){
					echo"<tr style='background-color:aqua;'><td>".$b."</td><td>".$datafin[0]."</td><td>".$datafin[1]."</td><td>".$datafin[2]."</td><td>".$datafin[3]."</td>
	<td>".$datafin[4]."</td><td>".$datafin[5]."</td><td>".$datafin[6]."</td><td>".$datafin[7]."</td><td>".$datafin[8]."</td><td>".$datafin[9]."</td><td>Importer avec Succès !!</td></tr>";
					$bon++;
				}else{
					echo"<tr style='background-color:red;'><td>".$b."</td><td>".$datafin[0]."</td><td>".$datafin[1]."</td><td>Echec</td></tr>";
					$echec++;
				}
				echo //$req_f."<br/>";
				$req_f="";
				
			$req2="select id from etudiant";
			//echo $req2;
	        $valider=$con->query($req2);  
       while($ligne=$valider->fetch()){$idetudiant=$ligne['id']; }
	   //echo "INSERT INTO preinscription(idetudiant,idsemestre,idspecialite,pass,idannee)VALUES($idetudiant,$semestreAcad,$specialite,1,$anneeAcad);";
	   $tes2=$con->exec("INSERT INTO preinscription(idetudiant,idsemestre,idspecialite,pass,idannee)VALUES($idetudiant,$semestreAcad,$specialite,1,$anneeAcad);");
	    if($test==true and $tes2==true ){
             echo '<script language="javascript">alert("Dossier Enregistrer Avec Success!"); </script>';
				}
	
	} else {echo"<tr style='background-color:red;'><td>".$b."</td><td>".$datafin[0]."</td><td>".$datafin[1]."</td><td>".$datafin[2]."</td><td>".$datafin[3]."</td>
	<td>".$datafin[4]."</td><td>".$datafin[5]."</td><td>".$datafin[6]."</td><td>".$datafin[7]."</td><td>".$datafin[8]."</td><td>".$datafin[9]."</td>
	<td>Déjà Importer</td></tr>";
					$echec++;}	$b++;
	}
	echo"<tr>
<td colspan='2'>Total</td>
<td><center> <b>Succès :</b> ".$bon." / <b> Echec : </b>".$echec."</center></td>
</tr>
</table></center>";
	}