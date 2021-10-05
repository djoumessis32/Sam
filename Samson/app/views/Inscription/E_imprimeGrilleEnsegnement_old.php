<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 2/9/19
 * Time: 7:30 PM
 */

require_once'../../config.php';
include 'entete.php';
//print_r($_POST);
$idannneeAcad=$_POST['anneeAcad'];
$idfiliereAcad=$_POST['filiereAcad'];
$specialite=$_POST['specialite'];
$classelmd=$_POST['classelmd'];
$idsemestre=$_POST['semestreAcad'];
enteteEtat($idannneeAcad,$idfiliereAcad,$specialite,$classelmd,$idsemestre,$con);
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
     <center><strong><h2>Programme Academique des enseignements</h2></strong><br>

<small></small></center>
    <br>
    <br>
    <br>
</div>
<div style="margin-top:-5px;">
    <table id="tableform" style="margin-left: 0.25%;">
        <tbody style="font-size:1.2em;">
        <tr style="background-color: #0a73b1;"><b>
                <th style="width:6%">Code UE</th>
                <th style="width:4%">Cr&eacute;dits UE</th>
                <th style="width:4%">Type UE</th>
                <th style="width:30%">Intitul&eacute; UE</th>
                <th style="width:10%">Code Matiere</th>
                <th style="width:50%">Intitul&eacute; Matiere</th>
                <th style="width:3%">Type Matiere</th>
                <th style="width:4%">Volume horaire</th>
                <th style="width:4%">Cr&eacute;dits pr&eacute;vus</th>
        </tr>
        <?php
        $reqPgrm="select distinct idprogrammeannuel from programmeannuel
  inner join programmeue on programmeue.idprogramme=programmeannuel.idprogrammeannuel
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
  inner join specialite on specialite.id=specialiteclasselmd.idspecialite
where programmadopte.idsemestre=$idsemestre
and specialiteclasselmd.idspecialite=$specialite";
          //  echo($reqPgrm);
        $repPrgm=$db->query($reqPgrm);
        while($prog=$repPrgm->fetch()){
            $sommeStre=0;
            $reqUE="select distinct iduniteenseignement, codeuniteenseignement,libelleuniteenseignement,nbcreditsue,notevalidationue,noteeleminerue from uniteenseignement
inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
inner join specialite on specialite.id=specialiteclasselmd.idspecialite
where programmeannuel.idprogrammeannuel=$prog[0]
    and specialiteclasselmd.idspecialite=$specialite ORDER BY codeuniteenseignement ASC";
            $repUE=$db->query($reqUE);
            while($ue=$repUE->fetch()){
            echo'  <tr style="background-color: rgba(58, 215, 210, 0.56);">
                    <td><b>'.$ue[1].'</b></td>
                    <td><b><center>'.$ue[3].'</center></b></td>
                    <td><b>OB</b></td>
                    <td><b>'.$ue[2].'</b></td>
                    <td colspan="5"></td>
                </tr>';

            $sommeStre+=$ue[3];
                $reqUV="select distinct iduvmatiere,codeuvmatiere,libelle_fr_uvmatiere,libelle_en_uvmatiere,ncredis,notevaliduvmatiere,noteelimuvmatiere,vlmhoraire
from uvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
  where uniteenseignement.iduniteenseignement=$ue[0]";
                //  echo$reqUV;
                $repUV=$db->query($reqUV);
                while($uv=$repUV->fetch()){

                    echo'
                        <tr style="font-size:1em;" >
                            <td colspan="4"></td>
                            <td>'.$uv[1].'</td>
                            <td>'.$uv[2].'</td>
                            <td>OB</td>
                            <td><center>'.$uv[7].'</center></td>
                            <td><center>'.$uv[4].'</center></td>
                        </tr>
                    ';
                }
            }
            echo'<tr style="background-color: #ebc980;">
                          	  <td style="font-weight:bold;" colspan="7" >Total</td>
                                <td style="font-weight:bold;"><span></span></td>
                                <td style="font-weight:bold;"><span>'.$sommeStre.'</span></td>
                                </tr>
    ';

        }

        ?>
        </tbody>
    </table>
</div>

<?php
?>
<!--

$reqUE="select *
from programmeannuel
inner join programmeue on programmeue.idprogramme=programmeannuel.idprogrammeannuel
inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
inner join specialite on specialite.id=specialiteclasselmd.idspecialite
where programmadopte.idsemestre=$prgm[0]
and specialiteclasselmd.idspecialiteclasselmd=$specialite";
$repPrgm=$db->query($reqUE);
while($prog=$repPrgm->fetch()){

$reqUE="select distinct iduniteenseignement, codeuniteenseignement,libelleuniteenseignement,nbcreditsue,notevalidationue,noteeleminerue from uniteenseignement
inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
inner join specialite on specialite.id=specialiteclasselmd.idspecialite
where   programmadopte.idsemestre=".$prog[0]."";
$repUE=$db->query($reqUE);
//echo($reqUE);
while($ue=$repUE->fetch()){
$reqUV="select distinct iduvmatiere,codeuvmatiere,libelle_fr_uvmatiere,libelle_en_uvmatiere,ncredis,notevaliduvmatiere,noteelimuvmatiere
from uvmatiere
inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
inner join preinscription on preinscription.idspecialite=specialiteclasselmd.idspecialite
where uniteenseignement.iduniteenseignement=$ue[0]";
//  echo$reqUV;
$repUV=$db->query($reqUV);
while($uv=$repUV->fetch()){

echo'
<tr style="font-size:1em;font-style:italic;" >
    <td></td>
    <td>'.$uv[1].'</td>
    <td>'.$uv[2].'/'.$uv[3].'</td>
    <td>OB</td>
    <td><center>'.$uv[4].'</center></td>
    <td><center>'.number_format($data[0][0][0], 2, '.', '').'</center></td>
    <td><center>'.$data[0][0][1].'</center></td>
    <td><center>'.$nbcrvalld.'</center></td>
    <td><center>'.$data[0][0][2].'</center></td>
    <td><center>'.$data[0][0][3].'</center></td>
    <td>'.$data[0][0][4].'</td>
</tr>
';



}
$sommes1+=$ue[3];
echo'
<tr style="background-color: rgba(58, 215, 210, 0.56);">
    <td><b>'.$ue[1].'</b></td>
    <td>>>></td>
    <td><b>'.$ue[2].'</b></td>
    <td>OB</td>
    <td><center>'.$ue[3].'</center></td>
</tr>
';
}

-->