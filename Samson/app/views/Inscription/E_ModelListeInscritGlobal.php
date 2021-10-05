<?php

/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/21/18
 * Time: 1:12 AM
 */
//print_r($_POST);
	
require_once'../../config.php';
include 'entete.php';
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
     <br><br> <center><strong>LISTE DES ETUDIANTS INSCRITS ETABLISSEMENT</strong><br>
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
$i=1;
while($ligne=$rep->fetch()){
    if($i%2==0)echo"<tr class='trcouleur1'>";
    else echo"<tr class='trcouleur2' id='tr'>";
                echo '<td id="tr" width="2%">'.$i.'</td>
                    <td id="tr" width="15%">'.$ligne['matriculeEt'].'</td>
                    <td id="tr" width="15%">'.$ligne['infosage'].'</td>
                    <td id="tr" width="20%">'.$ligne['nomEt'].' '.$ligne['prenomEt'].'</td>
                    <td id="tr" width="17%">'.str_replace('/','-',$ligne['dateNaissEt']).' à '.$ligne['lieuNaissEt'].'</td>
                    <td id="tr" width="15%">'.$ligne['dateinscription'].'</td>
                </tr>';
    $i++;
}

?>
        </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
</body>
</html>	