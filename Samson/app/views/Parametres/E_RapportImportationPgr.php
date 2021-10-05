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
    
    $entete=array();
    $data=array();
    $chaine_entete=$_POST['data1'];
    $chaine_data=$_POST['data'];
    $entete=explode(';',$chaine_entete);
    $data=explode('&',$chaine_data);
		//echo $libellefr;
		//echo $general;
	// Affichage tableau rapport en fonction du type importation
	
		echo"<script language=\"javascript\"> alert('Rapport Importation Programme);</script>";
	echo '<html>
	<hr width="95%" height="4px">
<center><h1><u>Rapport d\'importation des Programmes </u></h1></center>
<center><table border="1">
<tr style="background-color:rgba(82, 109, 255, 0.52);color:white;">
<td width="3%">N°</td>
<td width="15%">Code Programme</td>
<td width="15%">Libelle Programme</td>
<td td width="5%">Etat</td>
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
		//print_r($datafin);
			$reqinsert="INSERT INTO programmeannuel (codeprogrammeannuel,libelleprogrammeannuel) values ('".$datafin[0]."','".$datafin[1]."')";
			//echo $reqinsert;
			$test=$con->exec($reqinsert);
			if($test==true){
					echo"<tr style='background-color:aqua;'><td>".$b."</td><td >".$datafin[0]."</td><td>".$datafin[1]."</td></td><td>Importer avec Succès !!</td></tr>";
					$b++;;
				}else{
					echo"<tr style='background-color:red;'><td>".$b."</td><td>".$ligne."</td><td>Echec</td></tr>";
					$echec++;
				}}
			
	}

	