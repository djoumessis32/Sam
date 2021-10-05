
<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/26/18
 * Time: 8:00 PM
 */
session_start();
?>

<link href="../../../assets/css/style.css" rel="stylesheet" type="text/css" />

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
$manager = new UvmatiereManager($db);
$epreuv = $manager->GetUniqueUvmatiere($idmatiere);
$an= new Annee_academiqueManager($db);
$sesssion = new SessionManager($db);

//print_r($epreuv);



$reqGroupe1="select * from utilisateur WHERE idutilisateur=".$iduser."";
$repUser=$db->query($reqGroupe1);
while($InfoUser=$repUser->fetch()){
    $ideuser=$InfoUser[0];
    $codeuser=$InfoUser[1];
    $nomuser=$InfoUser[6];
    $prenomuser=$InfoUser[7];
}
include'entete.php';
enteteEtat($idannneeAcad,$idfiliereAcad,$idspecaliteAcad,$idsemestreAcad,'',$con);

$requete2 = ("");

$result = $db->query($requete2);

echo '<div id="">
<table  border="1" id="tableauform1" align="center">
<center><h2 style="text-align-last:center;color:red; "><strong>Proces verbal controle continu</strong></h2></center>
<caption><h3 style=""><strong>'.$epreuv['codeuvmatiere'].'==>'.$epreuv['libelle_fr_uvmatiere'].'</strong></h3></caption>
<tr id="titrerubrique">
     <td Height="" width="5%">#</td>
     <td Height="" width="10%">Matricule</td>
     <td Height="" width="15%">Nom(s) & prenom(s)</td>
    <td>CC/20</td>
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
    $anonymat='';
    $cc=null;
    $exam=null;
    $notef=null;
    $desc=null;
    if($ligne['anonymat']!='@'){$anonymat=$ligne['anonymat'];}
    if($ligne['cc']!=-1){$cc=$ligne['cc'];}
    if($ligne['examen']!=-1){$exam=$ligne['examen'];}
    if($ligne['notefinale']!=-1){$notef=$ligne['notefinale'];}
    if($ligne['is_valid']==2){$desc='VA';}elseif($ligne['is_valid']==1){$desc='NV';}else{$desc='EL';}
    echo '<div>
                  <tr class="row_' . $idetudiant . '">
                                   <td id="tr2" width="1%">' . ($i + 1) . '</td>
                                   <td id="tr2" width="10%"><b>' . $ligne['matriculeEt'] . '</b></td>
                                   <td id="tr2" width="25%"><b>' . strtoupper($ligne['nomEt']) . ' ' . ucfirst($ligne['prenomEt']) . '</b></td>
    <td id="tr" width="5%">'.$cc.'</td>
    </tr>
    </div>';
    $i++;
}
echo '
        </table>';
?>

<script src="../../../assets/js/jquery-1.10.2.js" type="text/javascript"></script>

