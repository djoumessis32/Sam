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
echo ' <br><br> <center><strong>Statistiques sur les Etudiants Inscrits par Région d\'origine et par Classe</strong><br>';}
else echo ' <br><br> <center><strong>Statistiques sur les Etudiants Pre-Inscrits par Région d\'origine et par Classe</strong><br>';
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

//-------------Recupération de la liste des sexes ************************
$sexe=("select distinct sexeEt from etudiant");
$sexecan=$bdd->query($sexe);
$sexeTab=array();
$s=0;
while($ligneSex = $sexecan->fetch()){
    $sexeTab[$s]=$ligneSex[0]; $s++;
}
$sexeTab2=array();
$sexeTab2[0]=$sexeTab[0];
$sexeTab2[1]=$sexeTab[1];
$nbsexe=count($sexeTab2);
$sexeTab=$sexeTab2;

echo '<table width="90%" border="1" id="tableauform" align="center">
<tr class="trcouleur3">
<th rowspan="2" scope="col">R&eacute;gion d\'origine</th>
<th colspan="2" scope="col">L1</th>
<th colspan="2" scope="col">L2</th>
<th colspan="2" scope="col">L3</th>
<th colspan="2" scope="col">M1</th>
<th colspan="2" scope="col">M2</th>
 </tr>
 <tr>';
  for($r=0;$r<$nbregion-5;$r++){
    for($s=0;$s<$nbsexe;$s++){
        echo '<td align="center">'.strtoupper($sexeTab[$s]{0}).'</td>';
        $NbreCandM[$r]=0;
        $NbreCandF[$r]=0;
    }
}
echo '</tr>';



for($r=0;$r<$nbregion;$r++){
    $coderegion=$regionT[$r]['coderegion'];
    $idregion=$regionT[$r]['idregion'];
  echo '<tr>';
  echo '<td id="tr2">'.$regionT[$r]['coderegion'].'</td>';
  
  
  
    for($s=0;$s<$nbsexe;$s++){
  $NbreCandM[$r]=0;
  $NbreCandF[$r]=0;

    /*********************************************8Requette qui recupere le nombre des candidats par region**********************************************8*/
            $Req_NbreEtudiantL1="SELECT distinct count(*) from etudiant as ET,preinscription as PR,specialite as SP, specialiteclasselmd SPL, classelmd as CL
                                              where ET.id = PR.idetudiant and PR.idspecialite = SP.id and SPL.idspecialite = SP.id and SPL.idclasselmd = CL.idclasselmd
                                              and CL.codeclasselmd like '%L1%' AND PR.is_inscrit = 1
                                              and ET.idregion = '$idregion' and ET.sexeEt = '".$sexeTab[$s]."' ";
                                             $Res_NbreEtudiantReg=$bdd->query($Req_NbreEtudiantL1);
                                              $EtudiantReg= $Res_NbreEtudiantReg->fetch();
                                               $nbreetudiant=$EtudiantReg[0];
                                               echo '<td align="center" >'.$nbreetudiant.'</td>';
											   if($s==0){$NbreCandM[$r]+=$nbreetudiant; $TM+=$nbreetudiant;}
                                               else if($s==1){$NbreCandF[$r]+=$nbreetudiant;$TF+=$nbreetudiant;}
									           echo $Req_NbreEtudiantL1;		
                                               
                                               
  }	
  
  
}

?>