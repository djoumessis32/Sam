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
<table  border="1" id="tableauform" align="center">
<center><h2 style="text-align-last:center;color:red; "><strong>Proces verbal avant deliberation</strong></h2></center>
<caption><h3 style=""><strong>'.$epreuv[0]['codeuvmatiere'].'==>'.$epreuv[0]['libelle_fr_uvmatiere'].'</strong></h3></caption>
<tr id="titrerubrique">
     <td Height="" width="5%">#</td>
     <td Height="" width="25%">Matricule</td>
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
    $anonymat='';
    $cc=null;
    $exam=null;
    $notef=null;
    if($ligne['cc']!=-1){$cc=$ligne['cc'];}
    if($ligne['examen']!=-1){$exam=$ligne['examen'];}
    if($ligne['notefinale']!=-1){$notef=$ligne['notefinale'];}
    echo '<div>
                  <tr class="row_' . $idetudiant . '">
                                   <td id="tr2" width="1%">' . ($i + 1) . '</td>
                                   <td id="tr2" width="25%"><b>' .$ligne['matriculeEt']. '</b></td>
    <td id="tr" width="10%">'.$cc.'</td>
    <td id="tr" width="10%">'.$exam.'</td>
    <td id="tr" width="20%">'.$notef.'</td>
    </tr></div>';
    $i++;
}
echo '
        </table>';
?>

<script src="../../../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        $(".save").on('click',function(){
            var parentClass = $(this).attr('class');
            var idetudiant = parentClass.split(' ')[1].split('_')[1];
            //  var idevaluernotecandidat = parentClass.split(' ')[1].split('_')[1];

            //alert(idetudiant);
            var cc_etudiant = $(".ccetudiant1_"+idetudiant).val();
            var idccetudiant = $(".idccetudiant_"+idetudiant).val();
            var idmatiere = $(".iduvmatiere_"+idetudiant).val();

            $.post(
                "../Etats/viewsEtats/ModelAnonymeEpreuve2.php",
                {
                    cc_etudiant : ""+cc_etudiant+"",
                    idmatiere : ""+idmatiere+"",
                    ccetudiant : ""+idccetudiant+"",
                    idetudiant : ""+idetudiant+""
                },
                function(data){

                    if(data === "on"){
                        $('.row_'+idetudiant).fadeOut(1000);
                   }else{
                        alert("Mauvaise note saisie!");
                        $(".ccetudiant1_"+idetudiant).focus();

                    }
                }
            );
        });



    });

</script>
<script>
    $(document).ready(function(){
        $(".save").on('click',function(){
            var parentClass = $(this).attr('class');
            var idetudiant1 = parentClass.split(' ')[1].split('_')[1];
            //salert(idetudiant);
            var note1 = $(".note1specialitecandidat_"+idetudiant1).val();
            var idpreuve = $(".iduvmatiere").val();
            var noteSpecial = $(".idevaluernotecandidat_"+idetudiant1).val();
            //    alert(note1);
            $.post(
                "../Etats/viewsEtats/ModeltraitementNoteClair.php",
                {
                    iduvmatiere : ""+idpreuve+"",
                    note1 : ""+note1+"",
                    noteSpecial : ""+noteSpecial+"",
                    idetudiant1 : ""+idetudiant1+""
                },
                function(data){
                    //      alert(data);
                    if(data ==1){
                        $('.row_'+idetudiant1).fadeOut(1000);
                    }else{
                        alert(data);
                        // $(".note1specialitecandidat_"+idetudiant1).val('');
                        $(".note1specialitecandidat_"+idetudiant1).focus();
                    }
                }
            );
        });
    });
</script>