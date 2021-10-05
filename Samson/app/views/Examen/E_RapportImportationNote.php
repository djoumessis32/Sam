<link href="../../../assets/css/style.css" rel="stylesheet" media="all"> 
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
    $semestreAcad = $_POST['semestreAcad'];
    $sessioncad = $_POST['sessioncad'];
	$matiereAcad = $_POST['matiereAcad'];
	$specialite = $_POST['specialite'];
	$general = $_POST['general'];
    $entete=array();
    $data=array();
    $chaine_entete=$_POST['data1'];
    $chaine_data=$_POST['data'];
    $entete=explode(';',$chaine_entete);
    $data=explode('&',$chaine_data);
	$reqmat="select libelle_fr_uvmatiere from uvmatiere where iduvmatiere = $matiereAcad ";
		$valider=$con->query($reqmat);
		while($resultat=$valider->fetch()){$libellefr=$resultat['libelle_fr_uvmatiere']; }
		//echo $libellefr;
		//echo $general;
	// Affichage tableau rapport en fonction du type importation
	if ($general == 1){
		echo"<script language=\"javascript\"> alert('Rapport Importation Note de CC : $libellefr');</script>";
	echo '<html>
	<hr width="95%" height="4px">
<center><h1><u>Rapport d\'importation Notes CC '.$libellefr.'</u></h1></center>
<center><table border="1">
<tr style="background-color:rgba(82, 109, 255, 0.52);color:white;">
<td width="3%">N°</td>
<td width="15%">Matricule</td>
<td width="5%">CC</td>
<td td width="15%">Etat</td>
</tr>
';
	}
	
	elseif($general==2){
		echo"<script language=\"javascript\"> alert('Rapport Importation Note de CC : $libellefr');</script>";
	echo '<html>
	<hr width="95%" height="4px">
<center><h1><u>Rapport d\'importation Notes CC-Examen '.$resultat['libelle_fr_uvmatiere'].'</u></h1></center>
<center><table border="1">
<tr style="background-color:rgba(82, 109, 255, 0.52);color:white;">
<td width="3%">N°</td>
<td width="15%">Matricule</td>
<td width="5%">CC</td>
<td width="5%">Examen</td>
<td td width="15%">Etat</td>
</tr>
';
	}
	else{
			echo"<script language=\"javascript\"> alert('Rapport Importation Note Examen : $libellefr');</script>";
	echo '<html>
	<hr width="95%" height="4px">
<center><h1><u>Rapport d\'importation Notes Examen '.$resultat['libelle_fr_uvmatiere'].'</u></h1></center>
<center><table border="1">
<tr style="background-color:rgba(82, 109, 255, 0.52);color:white;">
<td width="3%">N°</td>
<td width="15%">Matricule</td>
<td width="5%">Examen</td>
<td td width="15%">Etat</td>
</tr>
';
	}
	echo '<center><h4><u> '.$libellefr.'</u></h4></center>';
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
		$idetudiantevaluernote= null;
        $datafin=explode(';',$ligne);
		//print_r($datafin);
		// Recupère id des étudiants correspondant au matricule du fichier csv
		$req="select id from etudiant where matriculeEt='$datafin[0]'";
		$valider=$con->query($req);
		while($resultat=$valider->fetch()){$idetudiant=$resultat['id']; }
		// Vérification de existance de id de etudiant récuperer plus haut ( en fonction de la matière et session)
		$req2="select idetudiant from evaluernoteetudiant where idetudiant = $idetudiant and iduvmatiere = $matiereAcad and idsession = $sessioncad";
		$valider=$con->query($req2);
		while($resultat=$valider->fetch()){$idetudiantevaluernote=$resultat['idetudiant']; }
		//echo $idetudiantevaluernote;
		// Si $idetudiantevaluernote est vide on insert la note de étudiant
		if($idetudiantevaluernote==""){
			if($general==1){
			$reqinsert="INSERT INTO evaluernoteetudiant (idsemestre,idsession,iduvmatiere,idspecialite,idetudiant,cc) values ($semestreAcad,$sessioncad,$matiereAcad,$specialite,$idetudiant,".$datafin[2].")";
			$test=$con->exec($reqinsert);
			if($test==true){
					echo"<tr style='background-color:aqua;'><td>".$b."</td><td >".$datafin[0]."</td><td>".$datafin[2]."</td></td><td>Importer avec Succès !!</td></tr>";
					$b++;;
				}else{
					echo"<tr style='background-color:red;'><td>".$b."</td><td>".$ligne."</td><td>Echec</td></tr>";
					$echec++;
				}}
			elseif($general==2)
			{
				$reqinsert="INSERT INTO evaluernoteetudiant (idsemestre,idsession,iduvmatiere,idspecialite,idetudiant,cc,examen) values ($semestreAcad,$sessioncad,$matiereAcad,$specialite,$idetudiant,".$datafin[2].",".$datafin[3].")";
				$test=$con->exec($reqinsert);
			if($test==true){
					echo"<tr style='background-color:aqua;'><td>".$b."</td><td >".$datafin[0]."</td><td>".$datafin[2]."</td><td>".$datafin[3]."</td></td><td>Importer avec Succès !!</td></tr>";
					$b++;;
				}else{
					echo"<tr style='background-color:red;'><td>".$b."</td><td>".$ligne."</td><td>Echec</td></tr>";
					$echec++;
				}}
				else{
					$reqinsert="INSERT INTO evaluernoteetudiant (idsemestre,idsession,iduvmatiere,idspecialite,idetudiant,examen) values ($semestreAcad,$sessioncad,$matiereAcad,$specialite,$idetudiant,".$datafin[2].")";
				$test=$con->exec($reqinsert);
			if($test==true){
					echo"<tr style='background-color:aqua;'><td>".$b."</td><td >".$datafin[0]."</td><td>".$datafin[2]."</td></td><td>Importer avec Succès !!</td></tr>";
					$b++;;
				}else{
					echo"<tr style='background-color:red;'><td>".$b."</td><td>".$ligne."</td><td>Echec</td></tr>";
					$echec++;
				}
					
			}
		}
			//echo "INSERT INTO evaluernoteetudiant (idsemestre,idsession,iduvmatiere,idspecialite,idetudiant,cc,examen,anonymat) values ($semestreAcad,$sessioncad,$matiereAcad,$specialite,$idetudiant,".$datafin[3].",".$datafin[4].",".$datafin[2].")";
		else{
			if($general==1){
				$requpdate = "update evaluernoteetudiant set cc = ".$datafin[2]." where idetudiant = $idetudiantevaluernote";
				$testupdate=$con->exec($requpdate);
				echo"<tr style='background-color:aqua;'><td>".$b."</td><td >".$datafin[0]."</td><td>".$datafin[2]."</td></td><td>Maj avec Succès !!</td></tr>";
					$b++;;
			}
			elseif ($general==2){
				$requpdate = "update evaluernoteetudiant set cc = ".$datafin[2].", examen = ".$datafin[3]." where idetudiant = $idetudiantevaluernote";
				$testupdate=$con->exec($requpdate);
				echo"<tr style='background-color:aqua;'><td>".$b."</td><td >".$datafin[0]."</td><td>".$datafin[2]."</td><td>".$datafin[3]."</td><td>Maj avec Succès !!</td></tr>";
					$b++;;
				
			}
			else{
				$requpdate = "update evaluernoteetudiant set examen = ".$datafin[2]." where idetudiant = $idetudiantevaluernote";
				$testupdate=$con->exec($requpdate);
				echo"<tr style='background-color:aqua;'><td>".$b."</td><td >".$datafin[0]."</td><td>".$datafin[2]."</td></td><td>Maj avec Succès !!</td></tr>";
					$b++;;
			}
		}	
		}
	}

	