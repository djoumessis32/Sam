

<?php

require_once'../../config.php';
if(isset($_POST['listeetudiant'])){
	$anneeAcad = $_POST['idannneeAcad'];
	//echo $anneeAcad ;
/**************************** Debut de la fonction *****************/
		function generematricule($idetudiant,$con)
   {
	$matricule = null;
	$codePays ='CM';
	//echo $codePays;
	@$R_selectcodeannee="SELECT E.codeetablissement
	FROM etablissement E ";
	$rep=$con->query($R_selectcodeannee);
	while($resultat=$rep->fetch()){
		$codeetab=$resultat['codeetablissement']; 
		}
	@$R_selectcodeannee="SELECT a.codeannee,a.id
	FROM annee_academique a
	WHERE a.statut=1";
	$rep=$con->query($R_selectcodeannee);
	while($resultat=$rep->fetch()){
		$idannee=$resultat['id']; 
		$codeannee=$resultat['codeannee']; 
		}
		
    @$R_verifienumserie="SELECT g.numserie
	FROM generer_matricule g, annee_academique a
	WHERE g.idanneeacad='$idannee' 
	AND g.idanneeacad=a.id";
	//echo $R_verifienumserie;
	$nbr = null;
	$repverif=$con->query($R_verifienumserie);
	while($resultat=$repverif->fetch()){$nbr=$resultat['numserie']; }
	$NumSerie = (int) $nbr + 1;
	$updategenere=$con->exec("UPDATE generer_matricule SET numserie = numserie + 1 WHERE idanneeacad='$idannee'");
	if($NumSerie < 10)  $NumSerie = '000'.$NumSerie;
	elseif($NumSerie < 100)  $NumSerie = '00'.$NumSerie;
	elseif($NumSerie < 1000)  $NumSerie = '0'.$NumSerie;	
	else $NumSerie = $NumSerie;
	$matricule .=  strtoupper($codePays . '-' .$codeetab . '-' .$codeannee.$NumSerie);
	//echo $matricule;
	$updateetudiant=$con->exec("UPDATE etudiant SET matriculeEt = '$matricule' WHERE id='$idetudiant'");
	if($updateetudiant==true){
             echo '<script language="javascript">alert("Matricule Generer Avec Success"); </script>';
				}
	//$nummatricul .=  strtoupper($code.$NumSerie);
   }
/***************************** Fin de la fonction **************/

	@$listeetudiant=explode(";",$_POST["listeetudiant"]);
	$n=count($listeetudiant);
	for($i=0;$i<$n;$i++){
    $idetudiant=$listeetudiant[$i];
	if(isset($idetudiant)and $idetudiant!=""){
		generematricule($idetudiant,$con);
	}
	}
}
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/21/18
 * Time: 1:12 AM
 */
//print_r($_POST);
	
require_once'../../config.php';
include 'entete.php';
if(isset($_POST['anneeAcad'])){
$idannneeAcad=$_POST['anneeAcad'];
//$idfiliereAcad=$_POST['filiereAcad'];
//$specialite=$_POST['specialite'];
//$classelmd=$_POST['classelmd'];
enteteEtat($idannneeAcad,'','','','',$con);
/*$req="SELECT * FROM etudiant E INNER JOIN preinscription P ON P.idetudiant = E.id
INNER JOIN semestrelmd S ON  S.idsemestrelmd = P.idsemestre
INNER JOIN specialite SP ON SP.id = P.idspecialite
INNER JOIN specialiteclasselmd SPC ON SPC.idspecialite = SP.id
WHERE P.idannee = $idannneeAcad
AND P.idspecialite = $specialite
AND SPC.idclasselmd = $classelmd

AND is_inscrit = 1 GROUP BY E.id
ORDER BY E.nomEt, E.prenomEt";
$rep=$con->query($req);*/
$req="SELECT * FROM preinscription P
  inner join semestrelmd S on S.idsemestrelmd=P.idsemestre
  inner join classesemestrelmd CLS on CLS.idsemestre=S.idsemestrelmd
  inner join classelmd CL on CL.idclasselmd=CLS.idclasselmd
  inner join specialite SP on SP.id=P.idspecialite
  inner join etudiant E on E.id=P.idetudiant
WHERE P.idannee = $idannneeAcad
AND is_inscrit = 1
AND E.matriculeEt =''
GROUP BY E.id
ORDER BY E.nomEt, E.prenomEt";
$rep=$con->query($req);
//echo $req;
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
     <br><br> <center><strong>Generer Matricule</strong><br>
	  <?php
	 echo ' <div >Print on/<i>Imprime le</i> '. date("d-m-Y") . '<br></div>';
//------fin fontion entete enteteStat NEW------------
?>
            <small></small></center>
</div>
 
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table border="1" width="100%" id="tableauform">
                <thead class="">
                <tr id="titrerubrique">
                    <th>#</th>
                    <th>Matricule</th>
                    <th>N° Compte</th>
                    <th>Nom(s) & Prenom(s)</th>
                    <th>Date et Lieu naissance</th>
                    <th>Date Inscription </th>
                </tr>
                </thead>
                <tbody class="">	
<?php
$i=1;$listeetudiant="";
while($ligne=$rep->fetch()){
	$idetudiant=$ligne[2];
	//echo $idetudiant;
	$listeetudiant.=$idetudiant;
	echo ' <form method="POST" action="">
	<tr style="display:none"><td><input type="text" name="id'.$idetudiant.'"  value='.$ligne[2].'></td></tr>';
	
    if($i%2==0)echo"<tr class='trcouleur1'>";
    else echo"<tr class='trcouleur2' id='tr'>";
                echo '<td id="tr" width="2%">'.$i.'</td>
                    <td id="tr" width="15%">'.$ligne['matriculeEt'].'</td>
                    <td id="tr" width="15%">'.$ligne['infosage'].'</td>
                    <td id="tr" width="20%">'.$ligne['nomEt'].' '.$ligne['prenomEt'].'</td>
                    <td id="tr" width="17%">'.str_replace('/','-',$ligne['dateNaissEt']).' à '.$ligne['lieuNaissEt'].'</td>
                    <td id="tr" width="15%">'.$ligne['dateinscription'].'</td>
                </tr>';
    $listeetudiant.=";"; $i=$i+1;
}
echo'     <tr>
        <input type="hidden" name="listeetudiant" value="'.$listeetudiant.'">
        <input type="hidden" name="idannneeAcad" value="'.$idannneeAcad.'">
            <td><input type="submit" name="enregistrer" value="G&eacute;n&eacute;rer Matricule"</td>
        </tr></form></table>';
?>
        </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
</body>
</html>	

<?php
}

?>