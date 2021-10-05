<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/21/18
 * Time: 1:12 AM
 */

//print_r($_POST);
if(isset($_POST['anneeAcad'])) {
    $idsemestre = $_POST['semestreAcad'];
    $idsession = $_POST['sessioncad'];
    $idAn = $_POST['anneeAcad'];
    $st = 0;
    $st1 = 0;
    $reqq = "SELECT distinct idetudiant from preinscription 
			WHERE idannee=$idAn
			and idsemestre=$idsemestre";

    $req = "select distinct iduvmatiere,codeuvmatiere,libelle_fr_uvmatiere,specialiteclasselmd.idspecialite from uvmatiere
  inner join ue_uv on ue_uv.iduv=uvmatiere.iduvmatiere
  inner join uniteenseignement on uniteenseignement.iduniteenseignement=ue_uv.idue
  inner join programmeue on programmeue.idue=uniteenseignement.iduniteenseignement
  inner join programmeannuel on programmeannuel.idprogrammeannuel=programmeue.idprogramme
  inner join programmadopte on programmadopte.idprogramme=programmeannuel.idprogrammeannuel
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=programmadopte.idspecialiteclasse
  inner join semestrelmd on semestrelmd.idsemestrelmd=programmadopte.idsemestre
  where 
        semestrelmd.idsemestrelmd = $idsemestre   order by codeuvmatiere ASC";

//echo $req;

    $rep = $db->query($req);
    while ($mat = $rep->fetch(PDO::FETCH_NUM)) {
        $repp = $db->query($reqq);
        while ($etudiant = $repp->fetch(PDO::FETCH_NUM)) {
            $reqe = "select count(idetudiant) from evaluernoteetudiant
  where idetudiant=" . $etudiant[0] . " and iduvmatiere=" . $mat[0] . " and idsession=" . $idsession . " and idsemestre=" . $idsemestre . " ";
            $repe = $db->query($reqe);
            $nbe = $repe->fetchAll();
            if ($nbe[0][0] < 1) {
            //echo $etudiant[0]."->   ok  ->".$mat[0]."<br>";
               $req_inser = "REPLACE INTO `evaluernoteetudiant` (`idsemestre`,`idsession`,`iduvmatiere`,`idspecialite`,`idetudiant`) VALUES ($idsemestre,$idsession,$mat[0],$mat[3],$etudiant[0])";
              //     echo $req_inser."->   ok  <br>";
                $req_inser1 = "REPLACE INTO `evaluernoteetudiantpondere` (`idsemestre`,`idsession`,`iduvmatiere`,`idspecialite`,`idetudiant`) VALUES ($idsemestre,$idsession,$mat[0],$mat[3],$etudiant[0])";
                 //echo $req_inser1."->   ok  <br>";

                $repinsert = $db->exec($req_inser);
                $repinsert1 = $db->exec($req_inser1);
                $st = $repinsert;
                $st1 = $repinsert1;

            }

        }


    }
    if ($st == 1) {
        echo "<script> alert('Matiere Programmer avec succes!')</script>";
    } else {
        echo "<script> alert('Echec Programmation ou existante!')</script>";
    }
}
?>

<form method="post"  class="form-horizontal" action=""  id="formUser">
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
        <table style="width: 55%">
            <tr>
                <td>
                    <button class="btn btn-success" id="send">
                        Programmer Matiere <span class=' icon-check'></span>
                    </button>
                </td>
                <td>
                    <button type="reset" class="btn btn-danger">
                        Annuler <span class='icon-remove'></span>
                    </button>
                </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
        </table>
    </center>
</form>