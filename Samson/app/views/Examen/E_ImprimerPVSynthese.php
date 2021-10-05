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
$an= new Annee_academiqueManager($db);
$sesssion = new SessionManager($db);

//print_r($_POST);



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
<center><h2 style="text-align-last:center;color:red; ">
            <strong>Proces verbal de systhese</strong>
         </h2>
</center>
<table width="100%" border="1" id="tableauform" align="center">
';
$nbmm=2;
$reqUE="select distinct iduniteenseignement, codeuniteenseignement,libelleuniteenseignement,nbcreditsue,notevalidationue,noteeleminerue from uniteenseignement
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
  inner join specialite on specialite.id=specialiteclasselmd.idspecialite
  inner join preinscription on preinscription.idspecialite=specialite.id
where programmadopte.idsemestre=$idsemestreAcad
and specialite.id=$idspecaliteAcad ORDER BY codeuniteenseignement ASC";
    $repUE=$db->query($reqUE);
    $repUE1=$db->query($reqUE);

//echo($reqUE);
echo '<tr id="titrerubrique">
    <td rowspan="2" width="3%">#</td>
    <td rowspan="2" width="12%">Matricule</td>
    <td rowspan="2" width="25%">Nom(s) et prenom(s)</td>';
//$nbm=count($repUE->fetchAll());
while($ue=$repUE->fetch()) {
    $reqUV1 = "select distinct iduvmatiere,codeuvmatiere,libelle_fr_uvmatiere,libelle_en_uvmatiere,ncredis,notevaliduvmatiere,noteelimuvmatiere
  from uvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  where ue_uv.idue=$ue[0] ORDER BY codeuvmatiere ASC";
//echo $reqUV;
    $repUV1 = $db->query($reqUV1);
    $nbm=count($repUV1->fetchAll());

    echo '<td width="3%" colspan="'.$nbm.'"><center>' . $ue[1] . '</center></td>
           <td rowspan="2">moy.UE</td>';
}
echo '<td rowspan="2" width="3%">Nb.Cred</td><td rowspan="2">Moy.Sem</td></tr>';

echo '<tr id="titrerubriqueUE">';
    while($ue1=$repUE1->fetch()) {
    $reqUV = "select distinct iduvmatiere,codeuvmatiere,libelle_fr_uvmatiere,libelle_en_uvmatiere,ncredis,notevaliduvmatiere,noteelimuvmatiere
  from uvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  where ue_uv.idue=$ue1[0] ORDER BY codeuvmatiere ASC";
    //echo $reqUV;
    $repUV = $db->query($reqUV);
    while ($uv = $repUV->fetch()) {
      //  print_r($uv);
        echo '<td width="4%">'.$uv[1].'</td>';
        $nbmm++;
    }
        $nbmm++;
}
echo '</tr>';
$listeetudiant = "SELECT * FROM preinscription P
  inner join semestrelmd S on S.idsemestrelmd=P.idsemestre
  inner join classesemestrelmd CLS on CLS.idsemestre=S.idsemestrelmd
  inner join classelmd CL on CL.idclasselmd=CLS.idclasselmd
  inner join specialite SP on SP.id=P.idspecialite
  inner join etudiant E on E.id=P.idetudiant
  where P.idannee=".$idannneeAcad."
  and   S.idsemestrelmd=".$idsemestreAcad."
  and   SP.id=".$idspecaliteAcad."
  order by nomEt ASC";
$result=$db->query($listeetudiant);
$e=1;
while ($ligne = $result->fetch()) {
   // print_r($ligne);
    echo '<tr>';
    echo '<td>'.$e.'</td>';
    echo '<td>'.$ligne[30].'</td>';
    echo '<td>'.strtoupper($ligne[32]).' '.ucfirst($ligne[33]).'</td>';
    for ($r=0;$r<$nbmm;$r++){

        echo '<td></td>';
    }

    $e++;
    echo '</tr>';
}

?>
</tbody>
</table>
</div>

<script src="../../../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
