<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/21/18
 * Time: 1:12 AM
 */
if(isset($_POST['anneeAcad'])){
    //  print_r($_POST);
    $idAn=$_POST['anneeAcad'];
    $idSess=$_POST['sessioncad'];
    $idfiliere=$_POST['filiereAcad'];
    $idspecialite=$_POST['specialite'];
    $idsemestre=$_POST['semestreAcad'];
    $idmatiere=$_POST['matiereAcad'];
    $nbe=null;
    $post=null;
    $repinsert=null;
    $reqinsert=null;
    $reqe=null;
    $repe=null;
    $req="select * from etudiant
  inner join inscriptionacademique on inscriptionacademique.idetudiant=etudiant.id
  inner join specialiteclasselmd on specialiteclasselmd.idspecialiteclasselmd=inscriptionacademique.idcspecialiteclasse
  inner join specialite on specialite.id=specialiteclasselmd.idspecialite
  inner join annee_academique on annee_academique.id=inscriptionacademique.idanneeacademique
  where specialite.id=$idspecialite and annee_academique.id=$idAn";
    $st=0;
    $st1=0;
    $rep=$db->query($req);
    while($etudiant=$rep->fetch(PDO::FETCH_NUM)){
        $post=$etudiant[0].'_inscrit';
        if(isset($_POST[$post])){

            $reqinsert="insert into requette(idsemestre, idsession, iduvmatiere, idetudiant,statutrequette,daterequette) values ($idsemestre,$idSess,$idmatiere,$etudiant[0],'NON TRAITE',Now());";
            $repinsert=$db->exec($reqinsert);
            $st=$repinsert;
        }
    }
    if($st==1){
        echo"<script> alert('Requette generer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec creation!')</script>";
    }
}
?>
<form target="" method="post"  class="form-horizontal" action=""  name="ajouteruser" id="formUser">
    <center>

        <table style="width: 55%">
            <tr>
                <td>Annee Academique</td>
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
        <div id="listeetudiantrequete">

        </div>
        <table style="width: 55%">
            <tr>
                <td>
                    <button class="btn btn-success" id="send">
                        Traitement <span class=' icon-arrow-right'></span>
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