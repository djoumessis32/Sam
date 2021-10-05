<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/21/18
 * Time: 1:12 AM
 */

	
require_once'../../config.php';
include 'entete.php';
$idannneeAcad=$_POST['anneeAcad'];
$choixTypeStat=$_POST['choixTypeStat'];
enteteEtat($idannneeAcad,0,0,0,'',$con);
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SysIpes">
    <meta name="author" content="Divine Soft">
    <meta name="keywords" content="SysIpes">

    <!-- Title Page-->
    <title>Samson</title>
    <!-- assets/vendor CSS-->
    <link href="../../../assets/css/style.css" rel="stylesheet" media="all">
	
</head>
<body>
<div class="card card-body">
<?php
if($choixTypeStat==1)
{
echo ' <br><br> <center><strong>Statistiques sur les Etudiants Inscrits par Région d\'origine-Sexe et par Classe</strong><br>';}
else echo ' <br><br> <center><strong>Statistiques sur les Etudiants Pre-Inscrits par Région d\'origine-Sexe et par Classe</strong><br>';
	 ?>
	  <?php
	 echo ' <br><div >Print on/<i>Imprime le</i> '. date("d-m-Y") . '<br></div>';
//------fin fontion entete enteteStat NEW------------
?>
            <small></small></center>
</div>

<?php


//----------------- Récupération des ID des classes LMD ---------------------------------- //

$req1="SELECT idclasselmd from classelmd where codeclasselmd = 'L1'";
$rep=$con->query($req1);
while($resultat=$rep->fetch()){
		$idclasse1=$resultat['idclasselmd']; 
		}
		
		$req2="SELECT idclasselmd from classelmd where codeclasselmd = 'L2'";
$rep=$con->query($req2);
while($resultat=$rep->fetch()){
		$idclasse2=$resultat['idclasselmd']; 
		}
		//echo $idclasse2;
//echo $idannneeAcad;
$req3="SELECT idclasselmd from classelmd where codeclasselmd = 'L3'";
$rep=$con->query($req3);
while($resultat=$rep->fetch()){
		$idclasse3=$resultat['idclasselmd']; 
		}
		
		$req4="SELECT idclasselmd from classelmd where codeclasselmd = 'M1'";
$rep=$con->query($req4);
while($resultat=$rep->fetch()){
		$idclasse4=$resultat['idclasselmd']; 
		}
		
		
			$req5="SELECT idclasselmd from classelmd where codeclasselmd = 'M2'";
$rep=$con->query($req5);
while($resultat=$rep->fetch()){
		$idclasse5=$resultat['idclasselmd']; 
		}

//----------------- Récupération des ID des spécialités---------------------------------- //
$reqSpecialClass1=("SELECT idspecialite FROM specialiteclasselmd where idclasselmd = $idclasse1");
$specialite=$bdd->query($reqSpecialClass1);
$specialite1=array();
$r=0;
while($ligneR = $specialite->fetch()){
    $specialite1[$r]['idspecialite']=$ligneR[0];
    $r++;
}
$nbrespecialite1=count($specialite1);

//echo $nbrespecialite1;

//-------------Recupération de la liste des régions ***************************
$reqRegion=("select distinct idregion,coderegion from region order by coderegion ");
$region=$bdd->query($reqRegion);
$regionT=array();
$r=0;
while($ligneR = $region->fetch()){
    $regionT[$r]['idregion']=$ligneR[0];
    $regionT[$r]['coderegion']=$ligneR[1];
    $r++;
}
$nbregion=count($regionT);



echo '<table width="90%" border="1" id="tableauform" align="center">
<tr class="trcouleur3">
<th rowspan="1" scope="col">R&eacute;gion d\'origine</th>
<th colspan="1" scope="col">L1</th>
<th colspan="1" scope="col">L2</th>
<th colspan="1" scope="col">L3</th>
<th colspan="1" scope="col">M1</th>
<th colspan="1" scope="col">M2</th>
 </tr>
 <tr>';
for($r=0;$r<$nbregion;$r++){
    $coderegion=$regionT[$r]['coderegion'];
    $idregion=$regionT[$r]['idregion'];
  echo '<tr>';
  echo '<td id="tr2">'.$regionT[$r]['coderegion'].'</td>';

    /*********************************************Stattistiques etudiant niveau 1 **********************************************8*/
if($choixTypeStat==1){
            $Req_NbreEtudiantL1="SELECT count(*) FROM preinscription P inner join semestrelmd S on S.idsemestrelmd=P.idsemestre
			inner join classesemestrelmd CLS on CLS.idsemestre=S.idsemestrelmd inner join classelmd CL on CL.idclasselmd=CLS.idclasselmd
			inner join specialite SP on SP.id=P.idspecialite    inner join etudiant E on E.id=P.idetudiant WHERE P.idannee = $idannneeAcad
	        AND CL.idclasselmd = '$idclasse1' AND P.is_inscrit = 1 and E.idregion = '$idregion'"; }
			
			else if($choixTypeStat==2){ $Req_NbreEtudiantL1="SELECT count(*) FROM preinscription P inner join semestrelmd S on S.idsemestrelmd=P.idsemestre
			inner join classesemestrelmd CLS on CLS.idsemestre=S.idsemestrelmd inner join classelmd CL on CL.idclasselmd=CLS.idclasselmd
			inner join specialite SP on SP.id=P.idspecialite    inner join etudiant E on E.id=P.idetudiant WHERE P.idannee = $idannneeAcad
	        AND CL.idclasselmd = '$idclasse1' and E.idregion = '$idregion'";}	
			
			$Res_NbreEtudiantReg=$bdd->query($Req_NbreEtudiantL1);
                                              $EtudiantReg= $Res_NbreEtudiantReg->fetch();
                                               $nbreetudiant=$EtudiantReg[0];
                                               echo '<td align="center" >'.$nbreetudiant.'</td>';
											   
											       /*********************************************Stattistiques etudiant niveau 2 **********************************************8*/
if($choixTypeStat==1){
            $Req_NbreEtudiantL2="SELECT count(*) FROM preinscription P inner join semestrelmd S on S.idsemestrelmd=P.idsemestre
			inner join classesemestrelmd CLS on CLS.idsemestre=S.idsemestrelmd inner join classelmd CL on CL.idclasselmd=CLS.idclasselmd
			inner join specialite SP on SP.id=P.idspecialite    inner join etudiant E on E.id=P.idetudiant WHERE P.idannee = $idannneeAcad
	        AND CL.idclasselmd = '$idclasse2' AND P.is_inscrit = 1 and E.idregion = '$idregion'"; }
			
			else if($choixTypeStat==2){ $Req_NbreEtudiantL2="SELECT count(*) FROM preinscription P inner join semestrelmd S on S.idsemestrelmd=P.idsemestre
			inner join classesemestrelmd CLS on CLS.idsemestre=S.idsemestrelmd inner join classelmd CL on CL.idclasselmd=CLS.idclasselmd
			inner join specialite SP on SP.id=P.idspecialite    inner join etudiant E on E.id=P.idetudiant WHERE P.idannee = $idannneeAcad
	        AND CL.idclasselmd = '$idclasse2' and E.idregion = '$idregion'";}	
			
			$Res_NbreEtudiantReg=$bdd->query($Req_NbreEtudiantL2);
                                              $EtudiantReg= $Res_NbreEtudiantReg->fetch();
                                               $nbreetudiant=$EtudiantReg[0];
                                               echo '<td align="center" >'.$nbreetudiant.'</td>';
											   
								         // echo $Req_NbreEtudiantL1;	
											   
								         // echo $Req_NbreEtudiantL1;


if($choixTypeStat==1){
            $Req_NbreEtudiantL3="SELECT count(*) FROM preinscription P inner join semestrelmd S on S.idsemestrelmd=P.idsemestre
			inner join classesemestrelmd CLS on CLS.idsemestre=S.idsemestrelmd inner join classelmd CL on CL.idclasselmd=CLS.idclasselmd
			inner join specialite SP on SP.id=P.idspecialite    inner join etudiant E on E.id=P.idetudiant WHERE P.idannee = $idannneeAcad
	        AND CL.idclasselmd = '$idclasse3' AND P.is_inscrit = 1 and E.idregion = '$idregion'"; }
			
			else if($choixTypeStat==2){ $Req_NbreEtudiantL3="SELECT count(*) FROM preinscription P inner join semestrelmd S on S.idsemestrelmd=P.idsemestre
			inner join classesemestrelmd CLS on CLS.idsemestre=S.idsemestrelmd inner join classelmd CL on CL.idclasselmd=CLS.idclasselmd
			inner join specialite SP on SP.id=P.idspecialite    inner join etudiant E on E.id=P.idetudiant WHERE P.idannee = $idannneeAcad
	        AND CL.idclasselmd = '$idclasse3' and E.idregion = '$idregion'";}	
			
			$Res_NbreEtudiantReg=$bdd->query($Req_NbreEtudiantL3);
                                              $EtudiantReg= $Res_NbreEtudiantReg->fetch();
                                               $nbreetudiant=$EtudiantReg[0];
                                               echo '<td align="center" >'.$nbreetudiant.'</td>';
											   
								         // echo $Req_NbreEtudiantL1;	
											   
								         // echo $Req_NbreEtudiantL1;										 
										 }	
?>