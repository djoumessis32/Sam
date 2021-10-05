<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/26/18
 * Time: 8:00 PM
 */
session_start();
?>

<link href="../../../assets/css/style_New1.css" rel="stylesheet" type="text/css" />

<?php
//print_r($_SESSION);
//print_r($_POST);
require_once'../../models/autoload.php';
require_once'../../config.php';
$idgroup=$_SESSION['idgroupeutilisateur'];
$iduser=$_SESSION['idutilisateur'];
$st=0;
$idannneeAcad=$_POST['anneeAcad'];
$idsessionAcad=$_POST['sessioncad'];
$idfiliereAcad=$_POST['filiereAcad'];
$idspecaliteAcad=$_POST['specialite'];
$idsemestreAcad=$_POST['semestreAcad'];
$idmatiere=$_POST['matiereAcad'];
$poidsexam=$_POST['poidsexamen'];
$poidscc=$_POST['poidscc'];

$manager = new UvmatiereManager($db);
$epreuv = $manager->GetUniqueUvmatiere($idmatiere);

//print_r($epreuv);


function getGrade($note){
    $gr=null;
    if($note>=18){
        $gr='A+';
    }elseif(($note>=16)&&($note<18)){
        $gr='A';
    }elseif(($note>=15)&&($note<16)){
        $gr='A-';
    }elseif(($note>=14)&&($note<15)){
        $gr='B+';
    }elseif(($note>=13)&&($note<14)){
        $gr='B';
    }elseif(($note>=12)&&($note<13)){
        $gr='B-';
    }elseif(($note>=11)&&($note<12)){
        $gr='C+';
    }elseif(($note>=10)&&($note<11)){
        $gr='C';
    }elseif(($note>=9)&&($note<10)){
        $gr='C-';
    }elseif(($note>=8)&&($note<9)){
        $gr='D+';
    }elseif(($note>=7)&&($note<8)){
        $gr='D';
    }elseif(($note>=6)&&($note<7)){
        $gr='E';
    }else{
        $gr='F';
    }

    return $gr;
}
function getPtQlt($note){
    $gr=null;
    if($note>=18){
        $gr='4';
    }elseif(($note>=16)&&($note<18)){
        $gr='3.9';
    }elseif(($note>=15)&&($note<16)){
        $gr='3.7';
    }elseif(($note>=14)&&($note<15)){
        $gr='3.3';
    }elseif(($note>=13)&&($note<14)){
        $gr='3';
    }elseif(($note>=12)&&($note<13)){
        $gr='2.7';
    }elseif(($note>=11)&&($note<12)){
        $gr='2.3';
    }elseif(($note>=10)&&($note<11)){
        $gr='2';
    }elseif(($note>=9)&&($note<10)){
        $gr='1.6';
    }elseif(($note>=8)&&($note<9)){
        $gr='1.2';
    }elseif(($note>=7)&&($note<8)){
        $gr='0.8';
    }elseif(($note>=6)&&($note<7)){
        $gr='0.4';
    }else{
        $gr='0';
    }

    return $gr;
}
function getMention($note){
    $gr=null;
    if($note>=18){
        $gr='EX';
    }elseif(($note>=16)&&($note<18)){
        $gr='EX';
    }elseif(($note>=15)&&($note<16)){
        $gr='TB';
    }elseif(($note>=14)&&($note<15)){
        $gr='B';
    }elseif(($note>=13)&&($note<14)){
        $gr='AB';
    }elseif(($note>=12)&&($note<13)){
        $gr='AB';
    }elseif(($note>=11)&&($note<12)){
        $gr='P';
    }elseif(($note>=10)&&($note<11)){
        $gr='P';
    }elseif(($note>=9)&&($note<10)){
        $gr='M';
    }elseif(($note>=8)&&($note<9)){
        $gr='M';
    }elseif(($note>=7)&&($note<8)){
        $gr='M';
    }elseif(($note>=6)&&($note<7)){
        $gr='Ma';
    }else{
        $gr='Ma';
    }
    return $gr;
}

$reqGroupe1="select * from utilisateur WHERE idutilisateur=".$iduser."";
$repUser=$db->query($reqGroupe1);
while($InfoUser=$repUser->fetch()){
    $ideuser=$InfoUser[0];
    $codeuser=$InfoUser[1];
    $nomuser=$InfoUser[6];
    $prenomuser=$InfoUser[7];
}

echo"<center style='margin-top: 2%'>
    <table border='1'id='tableauform12' style='height: 10%;'>
    <caption id='titrerubrique' style='height: 15px;' >Information sur l'épreuve</caption>
    <tr class='titrerubrique'>
    <td>Utilisateur</td>
    <td>Epreuve</td>
    <td>Nb Credit</td>
</tr>
<tr class='trcouleur1'>
<td>".$prenomuser." ".$nomuser."</td>
<td>".$epreuv[0]['libelle_fr_uvmatiere']." / ".$epreuv[0]['libelle_en_uvmatiere']."</td>
<td>".$epreuv[0]['ncredis']."</td>
</tr>
</table>
</center>";

$requete2 = ("");

$result = $db->query($requete2);

echo '<div id="">
<table  border="1" id="tableauform121" align="center">
<caption><h2 style="text-align-last:center;color:red; "><strong>Grille de modification du poids des evaluations d\'une matiere</strong></h2></caption>
<tr id="titrerubrique">
     <td Height="" width="5%">#</td>
     <td Height="" width="25%">#Matricule</td>
     <td>Nom(s) et prenom(s) Etudiant</td>
    <td>CC/20</td>
    <td>Exam/20</td>
    <td>Notefinal/20</td>
       </tr>';
$i = 0;
$listeetudiant = "select * from etudiant
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
  and   uvmatiere.iduvmatiere=".$idmatiere."
  order by nomEt ASC";
$result=$db->query($listeetudiant);
while ($ligne = $result->fetch()) {
    $idetudiant = $ligne[0];
    echo '<div>
                  <tr class="row_' . $idetudiant . '">
                                   <td id="tr2" width="1%">' . ($i + 1) . '</td>
                                   <td id="tr2" width="25%"><b>' . $ligne[1] . '</b></td>
                                   <td id="tr2" width="25%"><b>' . strtoupper($ligne[3]) . ' ' . ucfirst($ligne[4])  . '</b></td>

    <td id="tr" width="10%">';if($ligne['cc']!=-1){echo $ligne['cc'];} echo'</td>
    <td id="tr" width="10%">';if($ligne['examen']!=-1){echo $ligne['examen'];} echo'</td>
    <td id="tr" width="20%">';if(($ligne['examen']!=-1)&&($ligne['cc']!=-1)){echo(($ligne['cc']*($poidscc/100))+($ligne['examen']*($poidsexam/100)));} echo'</td>
    </tr></div>';
    $statut=null;
    $notefinale=($ligne['cc']*($poidscc/100))+($ligne['examen']*($poidsexam/100));
    $grade=getGrade($notefinale);
    $pq=getPtQlt($notefinale);
    $rq=getMention($notefinale);
    //echo$pq;
    if($notefinale>=10){
        $statut=2;
    }
    if(($notefinale<10)&&($notefinale>=8)){
        $statut=1;
    }
    if(($notefinale<8)){
        $statut=0;
    }
    $nof=(($ligne['cc']*($poidscc/100))+($ligne['examen']*($poidsexam/100)));
    $req2="REPLACE into evaluernoteetudiantpondere(idsemestre, idsession, iduvmatiere, idspecialite, idetudiant, cc, examen, anonymat, notefinale, pq, mention, grade, is_acquis)
    values ('$idsemestreAcad','$idsessionAcad','$idmatiere','$idspecaliteAcad','$idetudiant',".$ligne['cc'].",".$ligne['examen'].",".$ligne['cc'].",)";
    $req="update evaluernoteetudiant set notefinale=".$notefinale." where idetudiant=".$idetudiant." and iduvmatiere=".$idmatiere."";
    $req1="update evaluernoteetudiant set is_valid=$statut,grade='$grade',pq='$pq',mention='$rq' where idetudiant=".$idetudiant." and iduvmatiere=".$idmatiere."";
    $req2="update evaluernoteetudiantpondere set notefinale=".$notefinale." where idetudiant=".$idetudiant." and iduvmatiere=".$idmatiere."";
    $req3="update evaluernoteetudiantpondere set is_valid=$statut,grade='$grade',pq='$pq',mention='$rq' where idetudiant=".$idetudiant." and iduvmatiere=".$idmatiere."";
    //$req1=" evaluernoteetudiantpondere set notefinale=".$nof.",cc=".$ligne['cc'].",axamen=".$ligne['examen']." where idetudiant=".$idetudiant." and iduvmatiere=".$idmatiere."";
    $st=$db->exec($req);
    $st1=$db->exec($req1);
    $st2=$db->exec($req2);
    $st3=$db->exec($req3);
    //$st2=$db->exec($req2);
  /*  if($st1==0){
      //  $reqinsert1="insert into evaluernoteetudiantpondere(idsemestre, idsession, iduvmatiere, idspecialite, idetudiant) values ($idsemestreAcad,$idsessionAcad,$idmatiere,$idspecaliteAcad,$idetudiant);";
        //$repinsert1=$db->exec($reqinsert1);
        $req1="update evaluernoteetudiantpondere set notefinale=".(($ligne['cc']*($poidscc/100))+($ligne['examen']*($poidsexam/100))).",cc=".$ligne['cc'].",axamen=".$ligne['examen']." where idetudiant=".$idetudiant." and iduvmatiere=".$idmatiere."";
        $st1=$db->exec($req1);
    }*/
    $i++;
}
echo '
        </table>';
?>

<script src="../../../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
