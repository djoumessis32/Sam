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

function getLastIdSession($ide,$idm,$com){
    $idS=null;
    $req="select idsession from evaluernoteetudiant
  where idetudiant=$ide and iduvmatiere=$$idm ORDER BY idevaluernoteetudiant DESC limit 1;";
    $rep=$com->query($req);
    $s=$rep->fetchAll();
    $idS=$s[0][0];
    return $idS;
}
function getAnneeEncours($ide,$idc,$com){

    $req="select max(distinct idannee),nomAC from preinscription
    inner join annee_academique on annee_academique.id=preinscription.idannee
inner join classesemestrelmd on classesemestrelmd.idsemestre=preinscription.idsemestre
inner join classelmd on classelmd.idclasselmd=classesemestrelmd.idclasselmd
where idetudiant=$ide and classelmd.idclasselmd=$idc";
    $rep=$com->query($req);
    $s=$rep->fetchAll();
    $anAcad=$s[0][1];
    return $anAcad;
}

function getLastInfoNoteMatiere($ide,$idm,$com){
    $matiere=array();
    $idLS=getLastIdSession($ide,$idm,$com);
    $req="select evaluernoteetudiant.notefinale,evaluernoteetudiant.pq,evaluernoteetudiant.grade,evaluernoteetudiant.mention,session.codesession,uvmatiere.ncredis,evaluernoteetudiant.is_valid,evaluernoteetudiant.iduvmatiere
from evaluernoteetudiant
  inner join session on session.idsession=evaluernoteetudiant.idsession
  inner join uvmatiere on uvmatiere.iduvmatiere=evaluernoteetudiant.iduvmatiere
  where evaluernoteetudiant.idetudiant=$ide
  and evaluernoteetudiant.iduvmatiere=$idm
  and evaluernoteetudiant.idsession=$idLS";
    $rep=$com->query($req);
    $s=$rep->fetchAll();
    $matiere[0]=$s[0][0];
    $matiere[1]=$s[0][1];
    $matiere[2]=$s[0][2];
    $matiere[3]=$s[0][3];
    $matiere[4]=$s[0][4];
    $matiere[5]=$s[0][5];
    $matiere[6]=$s[0][6];
    return $matiere;
}

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

function MoyenneModule($a){
$i=0;
$moy=0;
$ttpod=0;
$tcredit=0;
}
function sommeCreditAcquis($id,$ide,$com){
    $sommet=0;
    $somme=0;
    $uv=array();
    $infouv=array();
    $i=0;
    $req="select evaluernoteetudiant.notefinale,evaluernoteetudiant.pq,evaluernoteetudiant.grade,evaluernoteetudiant.mention,session.codesession,uvmatiere.ncredis,evaluernoteetudiant.is_valid,uvmatiere.codeuvmatiere,uniteenseignement.iduniteenseignement,evaluernoteetudiant.iduvmatiere
from evaluernoteetudiant
  inner join session on session.idsession=evaluernoteetudiant.idsession
  inner join uvmatiere on uvmatiere.iduvmatiere=evaluernoteetudiant.iduvmatiere
  inner join ue_uv on ue_uv.iduv=evaluernoteetudiant.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  inner join programmeue on programmeue.idue=ue_uv.idue
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
where evaluernoteetudiant.idetudiant=$ide
and uniteenseignement.iduniteenseignement=$id
and evaluernoteetudiant.is_valid <> 0
and evaluernoteetudiant.idsession in (
   select idsession from evaluernoteetudiant
  inner join uvmatiere on uvmatiere.iduvmatiere=evaluernoteetudiant.iduvmatiere
  inner join ue_uv on ue_uv.iduv=evaluernoteetudiant.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  where evaluernoteetudiant.idetudiant=$ide
  and uniteenseignement.iduniteenseignement=$id order by idevaluernoteetudiant desc)";
  //  echo$req;
    $rep=$com->query($req);
    $sommet=0;
    $sommetf=0;
    $sommetcr=0;
    $infouv=array();
    while($l=$rep->fetch()){

        $uv=getValidUV($ide,$l[9],$com);
      //  print_r($uv);
        if(($l[9]==$uv[0][0][0])&&($uv[0][0][1]!=0)){
            $sommetcr +=$l[0]*$l[5];
            $sommet +=$uv[0][0][2];
            $sommetf=$sommet;
        }
    }

        if($sommet!=0){
        $somme=$sommetcr/$sommet;
    }
    if($somme>10){
        $infouv[0]=$somme;
        $infouv[1]=$sommetf;
        $infouv[2]=getPtQlt($somme);
        $infouv[3]=getGrade($somme);
        $infouv[4]=getMention($somme);
    }else{
        $infouv[0]='';
        $infouv[1]='';
        $infouv[2]='';
        $infouv[3]='';
        $infouv[4]='';
    }
    return $infouv;
}

function getNoteUV($ide,$id,$com){
    $uv=array();
    $i=0;
    $req="select evaluernoteetudiant.notefinale,evaluernoteetudiant.pq,evaluernoteetudiant.grade,evaluernoteetudiant.mention,session.codesession,evaluernoteetudiant.is_valid,evaluernoteetudiant.iduvmatiere,uvmatiere.ncredis from evaluernoteetudiant
        inner join uvmatiere on uvmatiere.iduvmatiere=evaluernoteetudiant.iduvmatiere
        inner join session on session.idsession=evaluernoteetudiant.idsession
        where evaluernoteetudiant.iduvmatiere=$id
        and evaluernoteetudiant.idetudiant=$ide
        and evaluernoteetudiant.idsession
        in(select MAX(idsession)
            from evaluernoteetudiant
            where iduvmatiere=$id and idetudiant=$ide order by idsession DESC);";
      //  echo($req);
    $rep=$com->query($req);
    $l=$rep->fetchAll();
        $uv[]=$l;
    //print_r($uv);
    return$uv;
}
function getInfosValid($ide,$id,$com){
    $req="select evaluernoteetudiant.notefinale,evaluernoteetudiant.pq,evaluernoteetudiant.grade,evaluernoteetudiant.mention,session.codesession,evaluernoteetudiant.is_valid,evaluernoteetudiant.iduvmatiere,uvmatiere.ncredis
from evaluernoteetudiant
  inner join uvmatiere on uvmatiere.iduvmatiere=evaluernoteetudiant.iduvmatiere
  inner join session on session.idsession=evaluernoteetudiant.idsession
where evaluernoteetudiant.iduvmatiere=$id
      and evaluernoteetudiant.idetudiant=$ide
      and evaluernoteetudiant.idsession
          in
          (select MAX(idsession)
           from evaluernoteetudiant
           where iduvmatiere=$id
                 and idetudiant=$ide
           order by idsession DESC
          );";
    $rep=$com->query($req);
    $r=$rep->fetchAll();
    return$r;

}
function getValidUV($ide,$id,$com){
    $uv=array();
    $i=0;
    $req="select distinct evaluernoteetudiant.iduvmatiere,evaluernoteetudiant.is_valid,uvmatiere.ncredis from evaluernoteetudiant
        inner join uvmatiere on uvmatiere.iduvmatiere=evaluernoteetudiant.iduvmatiere
        inner join session on session.idsession=evaluernoteetudiant.idsession
        where evaluernoteetudiant.iduvmatiere=$id
        and evaluernoteetudiant.idetudiant=$ide
        and evaluernoteetudiant.idsession=(select MAX(idsession)
            from evaluernoteetudiant
            where iduvmatiere=$id and idetudiant=$ide) limit 1;";
      //  echo($req);
    $rep=$com->query($req);
    $l=$rep->fetchAll();
        $uv[]=$l;
    //print_r($uv);
    return$uv;
}
function getValidUE($ide,$id,$com){
        $uv=array();
        $i=0;
        $req="select distinct iduniteenseignement, codeuniteenseignement,libelleuniteenseignement,nbcreditsue,notevalidationue,noteeleminerue
from uniteenseignement
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
  inner join specialite on specialite.id=specialiteclasselmd.idspecialite
  inner join preinscription on preinscription.idspecialite=specialite.id
where preinscription.idetudiant=$ide
      and programmadopte.idsemestre=$id";
        //   echo($req);
        $rep=$com->query($req);
        while($l=$rep->fetch()){
            $req1="select distinct evaluernoteetudiant.iduvmatiere, evaluernoteetudiant.notefinale,evaluernoteetudiant.pq,evaluernoteetudiant.grade,evaluernoteetudiant.mention,session.codesession,uvmatiere.ncredis,evaluernoteetudiant.is_valid,uvmatiere.codeuvmatiere,uniteenseignement.iduniteenseignement,evaluernoteetudiant.iduvmatiere
from evaluernoteetudiant
  inner join session on session.idsession=evaluernoteetudiant.idsession
  inner join uvmatiere on uvmatiere.iduvmatiere=evaluernoteetudiant.iduvmatiere
  inner join ue_uv on ue_uv.iduv=evaluernoteetudiant.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  inner join programmeue on programmeue.idue=ue_uv.idue
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
where evaluernoteetudiant.idetudiant=$ide
      and evaluernoteetudiant.is_valid=2
      and evaluernoteetudiant.idsession in (select max(session.idsession) from evaluernoteetudiant
  inner join session on session.idsession=evaluernoteetudiant.idsession
  inner join ue_uv on ue_uv.idue_uv=evaluernoteetudiant.iduvmatiere
where evaluernoteetudiant.idetudiant=$ide
      and evaluernoteetudiant.is_valid=2
      and ue_uv.idue=$l[0])";
            $rep1=$com->query($req1);
            while($b=$rep1->fetch()){
                $uv=getInfosValid($ide,$b[0],$com);
               // print_r($uv);
                if($uv[0][5]==2){
                    $i+=$uv[0][7];
                }
                //if()
            }
        }
        return$i;
    }
function getmoyUE($ide,$id,$com){
    $ue=array();
    $somme=0;
    $grade='';
    $rq='';
    $pq='';
    $pq='';
    $i=0;
    $req="select distinct iduniteenseignement, codeuniteenseignement,libelleuniteenseignement,nbcreditsue,notevalidationue,noteeleminerue,
evaluernoteetudiant.notefinale,evaluernoteetudiant.pq,evaluernoteetudiant.grade,evaluernoteetudiant.mention,session.codesession from evaluernoteetudiant
  inner join session on session.idsession=evaluernoteetudiant.idsession
  inner join uvmatiere on uvmatiere.iduvmatiere=evaluernoteetudiant.iduvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
 where evaluernoteetudiant.idetudiant=$ide);";
    //echo($req);
    $rep=$com->query($req);
    while($l=$rep->fetchAll()){

        $uv[]=$l;
    }

    return$ue;
}
function getListSession($ide,$ida,$com){
    $req="select distinct session.codesession from evaluernoteetudiant
  inner join session on session.idsession=evaluernoteetudiant.idsession
where evaluernoteetudiant.idetudiant=$ide
      and session.idanneeacademique=$ida";
    $rep=$com->query($req);
    while($se=$rep->fetch()){
        echo" ".$se[0]." ";
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
    while($ue=$repUE->fetch()){

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
<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>r&eacute;lev&eacute;</title>
    <link href="../../../assets/css/style.css" rel="stylesheet" media="all">
</head>
<style>

    #infos
    {
        text-align:left;
        font-size:0.8em;
        margin-left: 1%;
    }
    #infos1
    {
        margin-top: -110px;
        font-size:0.8em;
        text-align:left;
        float: right;
        margin-right:11%;
    }
    #infos_
    {
        font-size:0.8em;
        text-align:left;
        margin-left: 1%;
        /*background: url(separateur.png) repeat-x bottom;
    */}
    #infos_1
    {
        margin-top: -12%;
        font-size:0.8em;
        float: right;
        text-align:left;
        margin-right: 15%;

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


    #infos_11
    {
        font-size:0.9em;
        margin-top: -130px;
        /*text-align:right;*/
        margin-left: 650px;

    }

    .sep{
        background: url(../../../assets/images_init/separateur.png) repeat-x bottom;
    }
</style>
<body style="border-style: double;border-color: #22aa6b;padding-top: 20px;">
<?php
$req="SELECT * FROM etablissement WHERE etabproprietaire=1";
$rep=$con->query($req);

while($etab1=$rep->fetch()){
    $school1=$etab1;
}
?>
<div id="">
<?php
include'enteteDoc.php';
$etudaint = new EtudiantManager($db);
$dataetudiant=$etudaint->GetUniqueEtudiant($_GET['idetud']);
$idetudiant= $dataetudiant['id'];
$idclasse=$_GET['c'];
$reqinfosacad="select distinct preinscription.idetudiant,semestrelmd.idsemestrelmd, semestrelmd.libellesemestrelmd,annee_academique.nomAC,cursus.libellecursus,filiere.nomFil, specialite.nomSP,specialite.nomSP,classelmd.libelleclasselmd,specialite.id,annee_academique.id
from preinscription
  inner join specialite on specialite.id=preinscription.idspecialite
  inner join specialiteclasselmd on specialiteclasselmd.idspecialite=specialite.id
  inner join classelmd on classelmd.idclasselmd=specialiteclasselmd.idclasselmd
  inner join classesemestrelmd on classesemestrelmd.idclasselmd=classelmd.idclasselmd
  inner join semestrelmd on semestrelmd.idsemestrelmd=classesemestrelmd.idsemestre
  inner join annee_academique on annee_academique.id=preinscription.idannee
  inner join filiere on filiere.id=specialite.id_filiere
  inner join cursus on cursus.idcursus=filiere.idcursus
where preinscription.idetudiant=$idetudiant and classelmd.idclasselmd=$idclasse order by preinscription.idpreinscription DESC limit 2";
//echo$reqinfosacad;
$repinfosacad=$db->query($reqinfosacad);
$infoacad=$repinfosacad->fetchAll();
//print_r($infoacad);
enteteEtatDoc($db);
?>
<center>
    <p style="text-transform:uppercase; font-size:1em; font-weight:bold">releve annnuel / <em style="text-transform:uppercase; font-weight:100">year marks transcript</em></p>
    <p>
        <span style="color:red;"><b>ID N&deg;_<?php echo '<span style="text-transform:uppercase;">00'.$idetudiant.'/'.date("Y").'</b></span>';?></span>/<?php echo $school1[1]?>
    </p>
</center>
<div>
    <div id="infos">
        <p><strong >&nbsp;Noms et Pr&eacute;noms de l'&eacute;tudiant: <?php echo '<span style="font-style: italic; font-size: 1.2em; color:black;">'.strtoupper($dataetudiant["nomEt"]).'&ensp;'.ucfirst($dataetudiant["prenomEt"]).'</span>';?></strong>  <br/>
            <em style="font-size:1em">&nbsp;Last and First name: </em><br/>
            <strong>&nbsp;Date et lieu de Naissance: <?php echo '<span style="font-style: italic; font-size: 1.2em; color:black;">'.$dataetudiant["dateNaissEt"].'</span>';?> &agrave; <?php echo '<span style="font-style: italic; font-size: 1.2em; color:black;">'.$dataetudiant["lieuNaissEt"].'</span>';?></strong>  <br/>
            <em style="font-size:1em">&nbsp;Date and Place of birth: </em> <br/>
        </p><br/>
    </div>
    <div id="infos1">
        <p style="margin-left: -60px;"><strong>&nbsp;Matricule: <?php echo '<span style="font-style: italic; font-size: 1.2em; color:black;">'.$dataetudiant["matriculeEt"].'</span>';?></strong>  <br/>
            <em style="font-size:1em">&nbsp;Registration number:  </em><br/>
        </p><p></p><br/>
    </div>
</div>
<div>
    <hr style="margin-top: -2%;">
    <div id="infos_">

        <p><strong>&nbsp;Ann&eacute;e Acad&eacute;mique: <?php echo '<span style="font-style: italic; font-size: 1em; color:black;">'.getAnneeEncours($idetudiant,$idclasse,$db).'</span>';?></strong>  <br/>
            <em style="font-size:0.9em">&nbsp;Academic year: </em><br/>
           <strong>Cursus: <?php echo '<span style="font-style: italic; font-size: 1em; color:black;">'.$infoacad[0][4].'</span>';?></strong>  <br/>
            <em style="font-size:0.9em">Level degree: </em><br/>
            <strong>&nbsp;Domaine: <?php echo '<span style="font-style: italic; font-size: 1em; color:black;">'.$infoacad[0]['nomFil'].'</span>';?></strong>  <br/>
            <em style="font-size:0.9em">&nbsp;Domain of study: </em><br/>
            <strong>&nbsp;Sessions d'examens d&eacute;j&agrave; subis: <?php echo '<span style="font-style: italic; font-size: 1em; color:black;">';
                getListSession($idetudiant,$infoacad[0][10],$db);?>
            </strong>  <br/>
            <em style="font-size:1em">&nbsp;Exams sessions list:</em><br/>
        </p><br/>
    </div>
    <div id="infos_1">
        <p><!-- <strong>&nbsp;Finalit&eacute / voie:</strong>  <br/>
                       <em style="font-size:0.5em">&nbsp;Finality / Vocation:  </em><br/> -->
            <strong>&nbsp;Niveau: <?php echo '<span style="font-style: italic; font-size: 1em; color:black;">'.$infoacad[0]['libelleclasselmd'].'</span>';?></strong>  <br/>
            <em style="font-size:0.9em">&nbsp;Level:  </em><br/>

            <strong>&nbsp;Mention: <?php echo '<span style="font-style: italic; font-size: 1em; color:black;">./</span>';?></strong>  <br/>
            <em style="font-size:0.9em">&nbsp;Field of Study:  </em><br/>
            <strong>&nbsp;Parcours: <?php echo '<span style="font-style: italic; font-size: 1em; color:black;">Professionnel</span>';?></strong>  <br/>
            <em style="font-size:0.9em">&nbsp;Course:  </em><br/>
            <strong>&nbsp;Option: <?php echo '<span style="font-style: italic; font-size: 1em; color:black;">'.$infoacad[0]["nomSP"].'</span>';?></strong>  <br/>
            <em style="font-size:0.9em">&nbsp;Learning Option:  &ccedil;</em><br/>
        </p><p></p>
    </div>
</div>
<div style="margin-top: -3%">
<p style="font-weight:600;font-size:0.9em"> &nbsp;Vu le proc&egrave;s verbal du jury N&deg;<?php echo '<span style="font-style: italic; font-size: 1em; color:black;"></span>';?> , Date: <?php echo ' <span style="font-style: italic; font-size: 1em; color:black;"></span>';?><br/>
    <em style="font-weight:100;font-size:0.8em">&nbsp;Based on a report of jury</em>
</p>
</div>
    <div style="margin-top:-5px;">
        <table style="margin-left: 0.25%;">
            <tbody style="font-size:1.2em;">
            <tr style="background-color: #3ad788;"><b>
                <th style="width:7%">Code UE</th>
                <th style="width:10%">Code Cours</th>
                <th style="width:50%">Intitul&eacute; UE/Cours</th>
                <th style="width:3%">Type</th>
                <th style="width:4%">Cr&eacute;dits pr&eacute;vus</th>
                <th style="width:4%">Note/20</th>
                <th style="width:3%">PQ/4</th>
                <th style="width:4%">Cr&eacute;dits acquis</th>
                <th style="width:3%">Grade</th>
                <th style="width:3%">RQ.</th>
                <th style="width:4%">Dern.ses.Exam.</th></b>
            </tr>
            <?php
            $sommes1smt=0;
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
      and preinscription.idannee=".$infoacad[0][10]."
      and specialiteclasselmd.idclasselmd=$idclasse";
            $rep=$db->query($req);
          // echo($req);
            while($prgm=$rep->fetch()){


                $reqUE="select distinct iduniteenseignement, codeuniteenseignement,libelleuniteenseignement,nbcreditsue,notevalidationue,noteeleminerue from uniteenseignement
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
  inner join specialite on specialite.id=specialiteclasselmd.idspecialite
  inner join preinscription on preinscription.idspecialite=specialite.id
where preinscription.idetudiant=".$idetudiant."
      and programmadopte.idsemestre=".$prgm[0]."";
                $repUE=$db->query($reqUE);
//echo($reqUE);
                while($ue=$repUE->fetch()){

                    $nbcrdue=sommeCreditAcquis($ue[0],$idetudiant,$db);
                    $cdt=null;
                    $moy=null;
               //     print_r($nbcrdue);
                    if($nbcrdue[0]>=10){
                        $cdt=$ue[3];
                        $moy=number_format($nbcrdue[0], 2, '.', '');
                    }else{
                        $cdt=$nbcrdue[1];
                        $moy='';
                    }

                    $reqUV="select distinct iduvmatiere,codeuvmatiere,libelle_fr_uvmatiere,libelle_en_uvmatiere,ncredis,notevaliduvmatiere,noteelimuvmatiere
from uvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
  inner join preinscription on preinscription.idspecialite=specialiteclasselmd.idspecialite
  where preinscription.idetudiant=$idetudiant
      and uniteenseignement.iduniteenseignement=$ue[0]";
                  //  echo$reqUV;
                    $repUV=$db->query($reqUV);
                    while($uv=$repUV->fetch()){
                        $data=getNoteUV($idetudiant,$uv[0],$db);
                        $nbcrvalld=0;
                        // print_r($data);
                        if(count($data[0])>0){
                        if($cdt==$ue[3]){
                            $nbcrvalld=$uv[4];
                            $sommes1smt +=$nbcrvalld;
                            //  echo$nbcrvalld;
                        }
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

                        }else{
                            echo'
                        <tr style="font-size:1em;font-style:italic;" >
                            <td></td>
                            <td>'.$uv[1].'</td>
                            <td>'.$uv[2].'</td>
                            <td>OB</td>
                            <td><center>'.$uv[4].'</center></td>
                            <td><center></center></td>
                            <td><center></center></td>
                            <td><center></center></td>
                            <td></td>
                            <td><center></center></td>
                            <td></td>
                        </tr>
                    ';
                        }


                    }
                    $sommes1+=$ue[3];
                    echo'
                <tr style="background-color: rgba(58, 215, 210, 0.56);">
                    <td><b>'.$ue[1].'</b></td>
                    <td>>>></td>
                    <td><b>'.$ue[2].'</b></td>
                    <td>OB</td>
                    <td><center>'.$ue[3].'</center></td>
                    <td><center>'.$moy.'</center></td>
                    <td><center>'.$nbcrdue[2].'</center></td>
                    <td><center>'.$cdt.'</center></td>
                    <td><center>'.$nbcrdue[3].'</center></td>
                    <td><center>'.$nbcrdue[4].'</center></td>
                    <td></td>
                </tr>
                ';
                }




        echo'<tr style="background-color: #ebc980;">
                          	  <td style="font-weight:bold;"  colspan="3">Total/Moyenne '.$prgm['libellesemestrelmd'].' / TOTAL/AVERAGE '.$prgm['libellesemestrelmd'].'</td>
                                <td style="font-weight:bold;"></td>
                                <td style="font-weight:bold;"><span>'.$sommes1.'</span></td>
                                <td style="font-weight:bold;"></td>
                                <td style="font-weight:bold;"></td>
                                <td style="font-weight:bold;">'.$sommes1smt.'</td>
                                <td style="font-weight:bold;"></td>
                                <td style="font-weight:bold;"></td>
                                <td style="font-weight:bold;"></td>
                                </tr>
    ';
                $sommesT+=$sommes1;
                $sommes1=0;
                $sommes1smt=0;
            }
            echo '<tr style="background-color: rgba(104, 71, 252, 0.56);">
                          	  <td style="font-weight:bold;"  colspan="3">Total/Moyenne annuelle</td>
                                <td style="font-weight:bold;"></td>
                                <td style="font-weight:bold;"><span>'.$sommesT.'</span></td>
                                <td style="font-weight:bold;"></td>
                                <td style="font-weight:bold;"></td>
                                <td style="font-weight:bold;"></td>
                                <td style="font-weight:bold;"></td>
                                <td style="font-weight:bold;"></td>
                                <td style="font-weight:bold;"></td>
                                </tr>
                                ';
            ?>
            </tbody>
            </table>
        </div>

<div style="margin-top: 2.5%">
    <div>
        <p><strong><?php echo $school1[55]?></strong>  <br/>
<!--        <p><strong>&nbsp;Directeur des Affaires Acad&eacute;miques</strong>  <br/>
-->
            <em style="font-size:0.9em"><?php echo  $school1[56]?></em><br/>
<!--            <em style="font-size:0.9em">&nbsp;Director of Academics Things </em><br/>
-->        </p><br/><br/><br/><br/><br/>
        <center>
            <?php
            if(($dataetudiant['photoEt']=='')||($dataetudiant['photoEt']==null)||(empty($dataetudiant['photoEt'])==true)){
                ?>
                <img style="margin-top: -12%" class="img-rounded" src="../../../assets/img/etudiant/admin.jpg" height="75px">
            <?php
            }else{
                echo'<img style="margin-top: -12%" class="img-rounded" src="../../../assets/img/etudiant/'.$dataetudiant['photoEt'].'" height="75px">';
            }
            ?>
        </center>
    </div>

    <div>
        <p style="margin-left: 65%;margin-top: -10%"><strong>&nbsp;Fait &agrave; <?php echo  $school1[57]?>, le<span><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></span></strong>  <br/>
            <em style="font-size:0.9em;">&nbsp;Done in <?php echo  $school1[57]?>, on  </em><br/><br/>
            <strong>&nbsp;<?php echo $school1[28]?></strong>  <br/>
            <em style="font-size:0.9em">&nbsp;<?php echo $school1[29]?></em><br/>
        </p>
    </div>
</div><br/>
<div style="margin-top:40px;">
    <hr>
    <center><p style="font-size: 14px;color: red;"><b>AUTORISATION N°18-10316/MINESUP/SG/DDES/SDA/OPC</b></p></center>
    <center><p style="font-size: 13px;color: red;"><b>ARRETE DE CREATION N° 16-0838/MINESUP/SG/DDES/ESUP   ARRETE D'OUVERTURE N° 17/00015/MINESUP</b></p></center>
    <p style="font-size:0.65em;"><center>&nbsp;Il n'est d&eacute;livr&eacute;, qu'un seul exemplaire de relev&eacute; de notes. Le titulaire peut &eacute;tablir et faire certifier des copies conformes.<br/>
        <em style="font-size:0.9em; font-weight: 800;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Only one copy of the marks transcript is issued. The holder can reproduce and obtain certified copies.</em>
    </center></p>
</div>
</div>
</body>
</html>
