<?php
/**
 * Created by PhpStorm.
 * User: Befah
 * Date: 8/11/2019
 * Time: 4:02 PM
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
    $anonymatsf=rand(0,9);//time du système
    //echo$req;
    $rep=$db->query($req);
    while($etudiant=$rep->fetch(PDO::FETCH_NUM)){
        $reqe="select anonymat from evaluernoteetudiant
  where anonymat='@' and idetudiant=".$etudiant[0]." and iduvmatiere=".$idmatiere." and idsession=".$idSess." and idsemestre=".$idsemestre."";
        $repe=$db->query($reqe);
        $nbe=$repe->fetchAll();
        if($nbe[0][0]='@'){
            if($anonymatsf<10){
                $req_gene="UPDATE evaluernoteetudiant set anonymat='000".$anonymatsf."' where idsemestre=$idsemestre and idsession=$idSess and idspecialite=$idspecialite and idetudiant=$etudiant[0];";
            }elseif($anonymatsf<100){
                $req_gene="UPDATE evaluernoteetudiant set anonymat='00".$anonymatsf."' where idsemestre=$idsemestre and idsession=$idSess and idspecialite=$idspecialite and idetudiant=$etudiant[0];";
            }elseif($anonymatsf<1000){
                $req_gene="UPDATE evaluernoteetudiant set anonymat='0".$anonymatsf."' where idsemestre=$idsemestre and idsession=$idSess and idspecialite=$idspecialite and idetudiant=$etudiant[0];";
            }else{
                $req_gene="UPDATE evaluernoteetudiant set anonymat='".$anonymatsf."' where idsemestre=$idsemestre and idsession=$idSess and idspecialite=$idspecialite and idetudiant=$etudiant[0];";
            }
            $sauts=rand(1,3);
            $anonymatsf+=$sauts;

        }

//        print_r($nbe);
  //                 echo "<br>".$etudiant[0]."->ok<br>";
//            $reqinsert="update evaluernoteetudiant set anonymat='".$nbe[0][0]."' where idsemestre=$idsemestre and idsession=$idSess and iduvmatiere=$idmatiere and idspecialite=$idspecialite and idetudiant=$etudiant[0])";
//           echo $req_gene;
            $repinsert=$db->exec($req_gene);
            $st=$repinsert;


    }
    if($st==1){
        echo"<script> alert('Anonymat generer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec generation anonymat!')</script>";
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
                        Generer Anonymat<span class=' icon-arrow-right'></span>
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