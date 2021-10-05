<?php
/**
 * Created by PhpStorm.
 * User: Befah
 * Date: 8/20/2019
 * Time: 12:54 AM
 */
?>

<link href="../../../assets/css/style.css" rel="stylesheet" type="text/css" />
<?php
//print_r($_SESSION);
//print_r($_POST);
require_once'../../models/autoload.php';
require_once'../../config.php';
$st=0;
$idannneeAcad=$_POST['anneeAcad'];
$idsessionAcad=$_POST['sessioncad'];
$idfiliereAcad=$_POST['filiereAcad'];
$idspecaliteAcad=$_POST['specialite'];
$idsemestreAcad=$_POST['semestreAcad'];
$an= new Annee_academiqueManager($db);
$sesssion = new SessionManager($db);

//print_r($epreuv);

include'entete.php';
enteteEtat($idannneeAcad,$idfiliereAcad,$idspecaliteAcad,$idsemestreAcad,'',$con);

$requete2 = ("");
$ss=array();
$ss=$sesssion->GetUniqueSession($idsessionAcad);
//print_r($ss);
$result = $db->query($requete2);
echo '<div id="">
<br>
<center><span style="font-size: x-large"><strong>Session: '.$ss[2].'</strong></span></center><br>
<table  width="100%" border="2" style="border-style: double" id="tableauform1" align="center">
<tr style="margin-left: 30%;font-size: x-large;background-color: #0d2ae7;color: white">
     <td Height="" width="4%">#</td>
     <td Height=" width="10%">Matricule</td>
     <td Height="" width="45%">Noms et prenoms</td>
     <td Height="" width="10%">Anonymat</td>
       </tr>';
$listeetudiant = "select DISTINCT evaluernoteetudiant.anonymat,etudiant.matriculeEt,etudiant.nomEt,etudiant.prenomEt from etudiant
  inner join evaluernoteetudiant on evaluernoteetudiant.idetudiant=etudiant.id
  inner join uvmatiere on uvmatiere.iduvmatiere=evaluernoteetudiant.iduvmatiere
  inner join session on session.idsession=evaluernoteetudiant.idsession
  inner join specialite on specialite.id=evaluernoteetudiant.idspecialite
  inner join semestrelmd on semestrelmd.idsemestrelmd=evaluernoteetudiant.idsemestre
  inner join annee_academique on annee_academique.id=session.idanneeacademique

  where annee_academique.id=".$idannneeAcad."
  and   session.idsession=".$idsessionAcad."
  and   semestrelmd.idsemestrelmd=".$idsemestreAcad."
  and   specialite.id=".$idspecaliteAcad."
  and anonymat <>'@'
  order by anonymat ASC";
//echo $listeetudiant;
$i = 0;
$result=$db->query($listeetudiant);
while ($ligne = $result->fetch()) {
echo '<tr class="">
                                   <td width=""><b><span style="font-size: large">' . ($i + 1) . '</span></b></td>
                                   <td width=""><b><span style="font-size: large">' . $ligne['matriculeEt'] . '</span></b></td>
                                   <td width=""><b><span style="font-size: large">' . $ligne['nomEt'] . ' ' . $ligne['prenomEt'] . '</span></b></td>
                                   <td width=""><b><span style="font-size: large">' . $ligne['anonymat'] . '</span></b></td>
                                  </tr>';
$i++;
}



?>
