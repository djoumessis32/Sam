<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/26/18
 * Time: 10:28 PM
 */
if(isset($_POST['anneeAcad'])){
//     print_r($_POST);
    $idAn=$_POST['anneeAcad'];
    $idSess=$_POST['sessioncad'];
    $idfiliere=$_POST['filiereAcad'];
    $idspecialite=$_POST['specialite'];
    $idsemestre=$_POST['semestreAcad'];
//    $idmatiere=$_POST['matiereAcad'];
    $nbe=null;
    $repinsert=null;
    $reqinsert=null;
    $reqe=null;
    $repe=null;
    $requete = "select distinct iduvmatiere,codeuvmatiere,libelle_fr_uvmatiere from uvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
  inner join semestrelmd on semestrelmd.idsemestrelmd=programmadopte.idsemestre
  where semestrelmd.idsemestrelmd =$idsemestre and specialiteclasselmd.idspecialite=$idspecialite
  order by codeuvmatiere ASC;";
//    echo $requete;
$rep = $db->query($requete);
$idma="mat_";
$idmatiere=null;
    while ($data = $rep->fetch(PDO::FETCH_ASSOC)) {
        $idmatiere=null;
        $idma="mat_".$data['iduvmatiere']."";
//        echo $idma;
        if (isset($_POST[$idma])){
            if ($idma=="on"){
             $idmatiere=$data['iduvmatiere'];
         }
//         echo $idmatiere;
            $req="select * from etudiant
  inner join preinscription on preinscription.idetudiant=etudiant.id
  inner join specialite on specialite.id=preinscription.idspecialite
  inner join specialiteclasselmd on specialiteclasselmd.idspecialite=specialite.id
  inner join classelmd on classelmd.idclasselmd=specialiteclasselmd.idclasselmd
  inner join classesemestrelmd on classesemestrelmd.idclasselmd=classelmd.idclasselmd
  inner join semestrelmd on semestrelmd.idsemestrelmd=classesemestrelmd.idsemestre
where preinscription.idspecialite=$idspecialite
      and   preinscription.idsemestre=$idsemestre
      and preinscription.idannee=$idAn";
            $st=0;
            $st1=0;
//            echo$req;
            $rep=$db->query($req);
            while($etudiant=$rep->fetch(PDO::FETCH_NUM)){
                $reqes="select count(idetudiant) from evaluernoteetudiant
  where idetudiant=".$etudiant[0]." and iduvmatiere=".$data['iduvmatiere']." and idsession=".$idSess." and idsemestre=".$idsemestre." ";
//                echo $reqes;
                $repe=$db->query($reqes);
                $nbe=$repe->fetchAll();
//                print_r($nbe);
                if($nbe[0][0]<1){
//                    echo $etudiant[0]."->ok.<br>";
                    $reqinsert="insert into evaluernoteetudiant(idsemestre, idsession, iduvmatiere, idspecialite, idetudiant) values ($idsemestre,$idSess,".$data['iduvmatiere'].",$idspecialite,$etudiant[0]);";
                    $reqinsert1="insert into evaluernoteetudiantpondere(idsemestre, idsession, iduvmatiere, idspecialite, idetudiant) values ($idsemestre,$idSess,".$data['iduvmatiere'].",$idspecialite,$etudiant[0]);";
//                    echo $reqinsert;
//                    echo "<br>";
//                    echo $reqinsert1;
//                    echo "<br>";
                    $repinsert=$db->exec($reqinsert);
                    $repinsert1=$db->exec($reqinsert1);
                    $st=$repinsert;
                    $st1=$repinsert1;
                }

            }
        }
    }


    if($st==1){
        echo"<script> alert(' Programmation  effectuer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec Programmation ou Programmation existante!')</script>";
    }
}
?>

<form target="" method="post"  class="form-horizontal" action=""  name="ajouteruser" id="formUser">
    <center>

        <table style="width: 55%">
            <tr>
                <td >Annee Academique</td>
                <td >
                    <?php
                    echo $function->GetListeAnneeAcad();
                    ?>
                </td>
            </tr>


            <tr>
                <td>Filiere</td>
                <td id="filiere">
                    <?php
                    echo $function->GetListeFiliere();
                    ?>
                </td>
            <tr>
            <tr>
                <td>Specialite</td>
                <td id="specialit">
                    <label for="specialite"></label><select class="" name="specialite" id="specialite">
                        <option selected value="-1">-------------------------</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Session</td>
                <td id="session">
                    <select class="" name="sessioncad" id="sessioncad" required>
                        <option selected value="-1">-------------------------</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Semestre</td>
                <td id="semestes">
                    <?php
                    echo $function->GetSemestre();
                    ?>
                </td>
            </tr>
        </table>
        <hr>
        <hr>
        <table style="background-color: darkgrey;width: 45%; table-border-color-light: #01BDE3" id="formepreuve22">

        </table>
        <table style="width: 55%">
            <tr>
                <td>
                    <button class="btn btn-success" id="send">
                        Creer Evaluation<span class=' icon-arrow-right'></span>
                    </button>
                </td>
                <td>
                    <button type="reset" class="btn btn-danger">
                        Annuler <span class='icon-remove'></span>
                    </button>
                </td>
            </tr>
          <tr></tr>
        </table>
    </center>
</form>