<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 12/2/18
 * Time: 12:52 PM
 */

session_start();
require_once'../../config.php';
require_once'../../models/autoload.php';

$idsession=$_POST['sessioncad'];
$idsemestre=$_POST['semestreAcad'];
//print_r($_POST);
$reqi="
select distinct preinscription.idetudiant,etudiant.matriculeEt,etudiant.nomEt,etudiant.prenomEt from etudiant
  inner join preinscription on preinscription.idetudiant=etudiant.id
  inner join specialite on specialite.id=preinscription.idspecialite
  inner join specialiteclasselmd on specialiteclasselmd.idspecialite=specialite.id
  inner join annee_academique on annee_academique.id=preinscription.idannee
  where specialite.id=".$_POST['specialite']." and annee_academique.id=".$_POST['anneeAcad']."";
$repi=$db->query($reqi);
$session=new SessionManager($db);
$datasession=$session->GetUniqueSession($idsession);
while($indiv=$repi->fetch()){
    $post=$indiv[0]."_inscrit";
    if(isset($_POST[$post])){
        ?>

        <!DOCTYPE>
        <html xmlns="http://www.w3.org/1999/html">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>r&eacute;lev&eacute;</title>
        </head>
        <style>
            @page
            {
                margin:0px;
                padding:30px;
            }
            body
            {
                background-color: transparent;

                background: url(assets/images_init/separateur.png);
                font-family: arial,'Source Sans Pro', sans-serif;
            }
            #bloc_page
            {

                margin:auto;
                padding: 10px;
                border-style: double;

            }

            #en_tete
            {
                margin-top:30px;

            }
            #cameroun
            {
                margin-top: -15px;
                margin-left: 5px;
                font-size:0.8em;
            }
            #camer
            {
                margin-top: -110px;
                text-align: center;
                /*background: url(separateur.png) repeat-x bottom;*/
            }

            #cameroon
            {
                margin-top: -275px;
                /*text-align:right;*/
                margin-left: 675px;
                font-size:0.8em;

            }
            #infos
            {
                margin-top:-1%;
                text-align:left;
                font-size:0.8em;
                /*background: url(separateur.png) repeat-x bottom;*/
            }
            #infos1
            {
                margin-top: -110px;
                font-size:0.8em;
                /*text-align:right;*/
                margin-left: 590px;
            }
            #infos_
            {
                font-size:0.8em;
                text-align:left;
                /*background: url(separateur.png) repeat-x bottom;
            */}
            #infos_1
            {
                font-size:0.8em;
                margin-top: -175px;
                /*text-align:right;*/
                margin-left: 530px;

            }

            .table-responsive
            {
                min-height: .01%;
                overflow-x: auto;
            }
            table
            {
                border-collapse: collapse;
                /*margin-left: 300px;*/
                border-spacing: 0;
                width: 100%;
            }
            tbody
            {
                box-sizing: border-box;
            }
            td, th /* Mettre une bordure sur les td ET les th */
	{
                border: 1px solid black ;
                padding: 2px;
                line-height: 1;
                text-align:left;
            }
            table th{
                background-color: transparent;
                color: #000;
            }

            #infos_01
            {
                font-size:0.9em;
                margin-top: 90px;
                text-align:left;
                /*background: url(separateur.png) repeat-x bottom;*/
            }

            #infos_11
            {
                font-size:0.9em;
                margin-top: -130px;
                /*text-align:right;*/
                margin-left: 650px;

            }

            .sep{
                background: url(separateur.png) repeat-x bottom;
            }
        </style>
        <body>
        <div id="bloc_page">
        <?php
        $etudaint = new EtudiantManager($db);
        $dataetudiant=$etudaint->GetUniqueEtudiant($indiv[0]);
        $idetudiant= $dataetudiant['id'];
        $reqinfosacad="select * from preinscription
  inner join annee_academique on annee_academique.id=preinscription.idannee
  inner join specialite on specialite.id=preinscription.idspecialite
  inner join specialiteclasselmd on specialiteclasselmd.idspecialite=specialite.id
  inner join classelmd on classelmd.idclasselmd=specialiteclasselmd.idclasselmd
  inner join filiere on filiere.id=specialite.id_filiere
  inner join cursus on cursus.idcursus=filiere.idcursus
  where idetudiant=".$idetudiant."";
        //echo($reqinfosacad);
        $repinfosacad=$db->query($reqinfosacad);
        $infoacad=$repinfosacad->fetchAll();
      //  print_r($infoacad);
        ?>
        <div>
            <div id="infos">
                <p><strong >&nbsp;Noms et Pr&eacute;noms de l'&eacute;tudiant: <?php echo '<span style="font-style: italic; font-size: 1.2em; color:black;">'.strtoupper($dataetudiant["nomEt"]).'&ensp;'.ucfirst($dataetudiant["prenomEt"]).'</span>';?></strong>  <br/>
                    <em style="font-size:1em">&nbsp;Last and First name: </em><br/>
                    <strong>&nbsp;Matricule: <?php echo '<span style="font-style: italic; font-size: 1.2em; color:black;">'.$dataetudiant["matriculeEt"].'</span>';?></strong>  <br/>
                    <em style="font-size:1em">&nbsp;Registration number:  </em><br/>
                </p><br/>
            </div>

        </div>
        <div style="">
            <table style="margin-left: 0.25%;">
                <tbody style="font-size:0.8em;">
                <tr style="background-color: #dfdfdf;"><b>
                        <th style="width:7%">Code UE</th>
                        <th style="width:10%">Code Cours</th>
                        <th style="width:30%">Intitul&eacute; UE/Cours</th>
                        <th style="width:5%">Cr&eacute;dits pr&eacute;vus</th>
                        <th style="width:15%">Note Avant Delib Note/20</th>
                        <th style="width:15%">Note Apres Delib Note/20</th>
                        <th style="width:5%">Session</th></b>
                </tr>
                <?php
                $sommes1=0;
                $sommes2=0;
                $sommesT=0;
                $req="select distinct semestrelmd.idsemestrelmd,semestrelmd.codesemestrelmd,semestrelmd.libellesemestrelmd
from preinscription
  inner join specialite on specialite.id=preinscription.idspecialite
  inner join specialiteclasselmd on specialiteclasselmd.idspecialite=specialite.id
  inner join classelmd on classelmd.idclasselmd=specialiteclasselmd.idclasselmd
  inner join classesemestrelmd on classesemestrelmd.idclasselmd=classelmd.idclasselmd
  inner join semestrelmd on semestrelmd.idsemestrelmd=classesemestrelmd.idsemestre
  where preinscription.idetudiant=".$idetudiant."
        and preinscription.idannee=".$infoacad[0]['idannee']."
        and semestrelmd.idsemestrelmd=$idsemestre";
                //echo($req);
                $rep=$db->query($req);
                while($prgm=$rep->fetch()){
                    echo'
        <tr style="background-color: rgba(104, 71, 252, 0.56);"> <td colspan="12" style="text-align: left">'.$prgm['libellesemestrelmd'].'</td></tr>';

                    $reqUE="select distinct iduniteenseignement, codeuniteenseignement,libelleuniteenseignement,nbcreditsue,notevalidationue,noteeleminerue from uniteenseignement
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
  inner join specialite on specialite.id=specialiteclasselmd.idspecialite
  inner join preinscription on preinscription.idspecialite=specialite.id
   where preinscription.idetudiant=".$idetudiant." and programmadopte.idsemestre=".$prgm[0]."";
                    $repUE=$db->query($reqUE);
                   // echo($reqUE);
                    while($ue=$repUE->fetch()){
                        echo'
                <tr style="background-color: rgba(58, 215, 136, 0.56);">
                    <td><b>'.$ue[1].'</b></td>
                    <td>>>></td>
                    <td><b>'.$ue[2].'</b></td>
                    <td>'.$ue[3].'</td>
                    <td></td>
                    <td></td>
                    <td></td>


                </tr>
                ';
                        $reqUV="select distinct uvmatiere.iduvmatiere,evaluernoteetudiant.notefinale,codeuvmatiere,libelle_fr_uvmatiere,libelle_en_uvmatiere,ncredis,notevaliduvmatiere,noteelimuvmatiere,evaluernoteetudiant.cc,evaluernoteetudiant.examen,evaluernoteetudiant.idsession
from uvmatiere
   inner join evaluernoteetudiant on evaluernoteetudiant.iduvmatiere=uvmatiere.iduvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
where evaluernoteetudiant.idetudiant=$idetudiant
      and uniteenseignement.iduniteenseignement=$ue[0]";
                       // echo($reqUV);
                        $repUV=$db->query($reqUV);
                        while($uv=$repUV->fetch()){
                            echo'
                            <form target="_blank" action="delinIndiv.php" method="POST" name="updatedelib">
                        <tr style="font-size:1em;font-style: italic;" >
                            <td></td>
                            <td hidden> <input name="uvmatiere" id="uvmatiere" value="'.$uv[0].'"/></td>
                            <td hidden> <input name="idetudiant" id="idetudiant" value="'.$idetudiant.'"/></td>
                            <td hidden> <input name="cc" id="cc" value="'.$uv[8].'"/></td>
                            <td hidden> <input name="examen" id="examen" value="'.$uv[9].'"/></td>
                            <td hidden> <input name="session" id="session" value="'.$uv[10].'"/></td>
                            <td>'.$uv[2].'</td>
                            <td>'.$uv[3].'</td>
                            <td>'.$uv[5].'</td>
                            <td>'.$uv['notefinale'].'</td>
                             <td>
                                <input name="noteDilb" id="noteDilb" value=""/>
                            </td>
                            <td><button type="submit">Valider</button></td>

                        </tr>
                        </form>
                    ';
                        }
                        $sommes1+=$ue[3];
                    }




                }
                ?>
                </tbody>
            </table>
        </div>
        </div>
        </body>
        </html>
    <?php
    }

}

function getUV($ide,$idue,$db){
    $reqUV="select distinct iduvmatiere,codeuvmatiere,libelle_fr_uvmatiere,libelle_en_uvmatiere,ncredis,notevaliduvmatiere,notevaliduvmatiere from uvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialite on specialite.id=programmadopte.idspecialiteclasse
  inner join specialiteclasselmd on specialiteclasselmd.idspecialite=specialite.id
  inner join semestrelmd on semestrelmd.idsemestrelmd=programmadopte.idsemestre
  inner join inscriptionacademique on inscriptionacademique.idcspecialiteclasse=specialiteclasselmd.idspecialiteclasselmd
  inner join classelmd on classelmd.idclasselmd=specialiteclasselmd.idclasselmd
  inner join classesemestrelmd on classesemestrelmd.idclasselmd=classelmd.idclasselmd
  inner join etudiant on etudiant.id=inscriptionacademique.idetudiant
   where etudiant.id=$ide and uniteenseignement.iduniteenseignement=$idue";
    $repUV=$db->query($reqUV);
    while($uv=$repUV->fetch()){

    }
}
function getUE($ide,$ids,$db){
    $reqUE="select distinct iduniteenseignement, codeuniteenseignement,libelleuniteenseignement,nbcreditsue,notevalidationue,noteeleminerue from uniteenseignement
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialite on specialite.id=programmadopte.idspecialiteclasse
  inner join specialiteclasselmd on specialiteclasselmd.idspecialite=specialite.id
  inner join semestrelmd on semestrelmd.idsemestrelmd=programmadopte.idsemestre
  inner join inscriptionacademique on inscriptionacademique.idcspecialiteclasse=specialiteclasselmd.idspecialiteclasselmd
  inner join classelmd on classelmd.idclasselmd=specialiteclasselmd.idclasselmd
  inner join classesemestrelmd on classesemestrelmd.idclasselmd=classelmd.idclasselmd
  inner join etudiant on etudiant.id=inscriptionacademique.idetudiant
   where etudiant.id=$ide and semestrelmd.idsemestrelmd=$ids";
    $repUE=$db->query($reqUE);
    while($ue=$rep->fetch()){

    }
}

function getProgramme($ide,$idAn,$db){
    $req="select distinct idprogrammadopte,semestrelmd.idsemestrelmd,semestrelmd.libellesemestrelmd from programmadopte
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmadopte.idprogramme
  inner join annee_academique on annee_academique.id=programmadopte.idanneeacademique
  inner join specialite on specialite.id=programmadopte.idspecialiteclasse
  inner join specialiteclasselmd on specialiteclasselmd.idspecialite=specialite.id
  inner join inscriptionacademique on inscriptionacademique.idcspecialiteclasse=specialiteclasselmd.idspecialiteclasselmd
  inner join classelmd on classelmd.idclasselmd=specialiteclasselmd.idclasselmd
  inner join classesemestrelmd on classesemestrelmd.idclasselmd=classelmd.idclasselmd
  inner join semestrelmd on semestrelmd.idsemestrelmd=programmadopte.idsemestre
  inner join etudiant on etudiant.id=inscriptionacademique.idetudiant
  where etudiant.id=$ide and annee_academique.id=$idAn";
    $rep=$db->query($req);
    while($prgm=$rep->fetch()){
    echo'
        <tr> <td colspan="12" style="text-align: left">'.$prgm['libellesemestrelmd'].'</td></tr>
    ';
    }

}
?>
