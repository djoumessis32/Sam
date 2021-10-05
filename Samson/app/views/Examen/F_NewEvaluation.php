<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/26/18
 * Time: 10:28 PM
 */
if(isset($_POST['anneeAcad'])){
   // print_r($_POST);
    $idAn=$_POST['anneeAcad'];
    $idSess=$_POST['sessioncad'];
    $idfiliere=$_POST['filiereAcad'];
    $idspecialite=$_POST['specialite'];
    $idsemestre=$_POST['semestreAcad'];
    $idmatiere=$_POST['matiereAcad'];
    $nbe=null;
    $repinsert=null;
    $reqinsert=null;
    $reqe=null;
    $repe=null;
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
   //echo$req;
    $rep=$db->query($req);
    while($etudiant=$rep->fetch(PDO::FETCH_NUM)){
        $reqe="select count(idetudiant) from evaluernoteetudiant
  where idetudiant=".$etudiant[0]." and iduvmatiere=".$idmatiere." and idsession=".$idSess." and idsemestre=".$idsemestre."";
        $repe=$db->query($reqe);
        $nbe=$repe->fetchAll();
        if($nbe[0][0]<1){
     //       echo $etudiant[0]."->ok.<br>";
              $reqinsert="insert into evaluernoteetudiant(idsemestre, idsession, iduvmatiere, idspecialite, idetudiant) values ($idsemestre,$idSess,$idmatiere,$idspecialite,$etudiant[0]);";
              $reqinsert1="insert into evaluernoteetudiantpondere(idsemestre, idsession, iduvmatiere, idspecialite, idetudiant) values ($idsemestre,$idSess,$idmatiere,$idspecialite,$etudiant[0]);";
              $repinsert=$db->exec($reqinsert);
              $repinsert1=$db->exec($reqinsert1);
              $st=$repinsert;
              $st1=$repinsert1;
        }

    }
    if($st==1){
        echo"<script> alert('Evaluation creer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec creation ou evaluation existante!')</script>";
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
        <table style="width: 45%" id="formepreuve">

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
            <tr>
                <td colspan="2">
                    <button class="btn btn-success" id="sendall">
                        Creer toute Evaluation<span class=' icon-arrow-right'></span>
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