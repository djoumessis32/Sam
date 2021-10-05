<?php
/**
 * Created by PhpStorm.
 * User: Befah
 * Date: 3/22/2020
 * Time: 4:10 PM
 */

?>
<form target="" method="post"  class="form-horizontal" action=""  name="" id="formUser" enctype="multipart/form-data">

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
        <table style="width: 55%" id="formepreuve">

        </table>

        <hr>
        <div>
            <center>
                <table>
                    <tr>
                        <td><h3>Action     </h3></td>
                        <td>
                            <select required name="actionform" class="select2-active">
                                <option value="-1" selected>============</option>
                                <option value="inscrit" >Inscription</option>
                                <option value="deinscrit" >Deinscription</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </center>
        </div>
        <table style="width: 55%">
            <tr>
                <td>
                    <button type="submit" class="btn btn-success" id="send">
                        Afficher Les Etudiants<span class='icon-ok'></span>
                    </button>
                </td>
                <td>
                    <button type="reset" class="btn btn-danger">
                        Annuler <span class='icon-remove'></span>
                    </button>
                </td>
            </tr>
        </table>
        <hr>
    </center>
</form>

<?php
if(isset($_POST['anneeAcad'])){
    $anneeAcad = $_POST['anneeAcad'];
    $filiereAcad = $_POST['filiereAcad'];
    $specialite = $_POST['specialite'];
    $sessionlmd=$_POST['sessioncad'];
    $semestrelmd=$_POST['semestreAcad'];
    $matiereacad=$_POST['matiereAcad'];
    $actionf=$_POST['actionform'];
  //  print_r($_POST);
    //echo $classelmd;
    //echo $classesuivant;
    //echo $anneeAcadsuivant;
    $req="SELECT * FROM preinscription P 
          inner join semestrelmd S on S.idsemestrelmd=P.idsemestre
          inner join specialite SP on SP.id=P.idspecialite 
          inner join etudiant E on E.id=P.idetudiant 
          WHERE P.idannee = $anneeAcad 
            AND P.idspecialite = $specialite 
            AND P.idsemestre = $semestrelmd 
            AND passclass = 0
          GROUP BY E.id 
          ORDER BY E.nomEt, E.prenomEt";
    $rep=$con->query($req);
//echo $idsemestre;
//echo $reqsemestre;

    ?>
    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered ">
            <thead>
            <tr>
                <th>#</th>
                <th>Matricule</th>
                <th>Noms & Prenoms</th>

                <th>Choisir</th>
    </div>

    <?php
    $i=0;$listeetudiant="";
    while($ligne=$rep->fetch()){
        $idetudiant=$ligne["idetudiant"];
        $listeetudiant.=$idetudiant;
        echo'<form method="POST" action=""  name="form">
	<tr style="display:none"><td><input type="text" name="id'.$idetudiant.'"  value='.$ligne['id'].'></td></tr>
	
	<tr class="row_'.$idetudiant.'" id="tr">
	<td id="tr" width="2%">'.($i+1).'</td>
	<td id="tr" width="35%">'.$ligne['matriculeEt'].'</td>
	<td id="tr" width="45%">'.$ligne['nomEt'].' '.$ligne['prenomEt'].'</td> ';
        if($ligne['passclass']==1){
            echo '<td bgcolor="#006666"><input type="checkbox" checked  name="passclass'.@$idetudiant.'" value= 1> </td>';
        }else{
            echo '<td bgcolor="#006666"><input type="checkbox" class="select"  name="passclass'.$idetudiant.'" value= 1> </td>
      </td>';
        }
        echo '</tr> ';
        $i++;
        $listeetudiant.=";";

    }
    echo'     <tr>
        <input type="hidden" name="specialite" value="'.$specialite.'">
        <input type="hidden" name="matiereacad" value="'.$matiereacad.'">
        <input type="hidden" name="sessionacad" value="'.$sessionlmd.'">
        <input type="hidden" name="idsemestre" value="'.$semestrelmd.'">
        <input type="hidden" name="actionform" value="'.$actionf.'">
        <input type="hidden" name="listeetudiant" value="'.$listeetudiant.'">
            <td></td><td><button type="submit" name="enregistrer" class="btn-primary">Valider</button>
        </tr></form></table>';
}
?>

<?php

//require_once'../../config.php';
if(isset($_POST['listeetudiant'])){
    @$listeetudiant=explode(";",$_POST["listeetudiant"]);

//    print_r($_POST);
    $n=count($listeetudiant);
    for($i=0;$i<$n;$i++){
        $idetudiant=$listeetudiant[$i];
        if ($_POST['actionform']==="inscrit"){
            if(isset($idetudiant)and $idetudiant!=""){
                $idetud=$_POST['id'.$idetudiant];
                @$p5=$_POST['passclass'.$idetudiant];
                if($p5==1){
                    $Req_Suppression="INSERT INTO evaluernoteetudiant (idsemestre, idsession, iduvmatiere, idspecialite, idetudiant) 
                                  VALUES (".$_POST['idsemestre'].",".$_POST['sessionacad'].",".$_POST['matiereacad'].",".$_POST['specialite'].",$idetud)";
//                    echo $Req_Suppression;
                    $req = $con->query($Req_Suppression);
                }
            }

        }elseif($_POST['actionform']==="deinscrit"){
            if(isset($idetudiant)and $idetudiant!=""){
                $idetud=$_POST['id'.$idetudiant];
                @$p5=$_POST['passclass'.$idetudiant];
                if($p5==1){
                    $Req_Suppression="DELETE FROM evaluernoteetudiant 
                                        WHERE idsemestre =".$_POST['idsemestre']."
                                        AND idsession = ".$_POST['sessionacad']."
                                        AND iduvmatiere = ".$_POST['matiereacad']."
                                        AND idspecialite =".$_POST['specialite']."
                                        AND idetudiant= $idetud ;";
//                    echo $Req_Suppression;
                    $req = $con->query($Req_Suppression);
                }
            }


        }
    }
    if($req ==true ){
        echo '<script language="javascript">alert("Inscription effectuer Avec Success!"); </script>';
    }else {
        echo '<script language="javascript">alert("Inscription non effectuer !!"); </script>';

    }
}

?>


<script src="../../../assets/js/jquery.js"></script>
<script type="text/javascript">
    function checkAll(){
        var form =$("#frm");
        var elts = document.getElementsByClassName('select');

        for(var i=0;i<elts.length;i++){
            if(elts[i].type == 'checkbox'){
                if(elts[i].checked == true){
                    elts[i].checked = false;
                }else{
                    elts[i].checked = true;
                }
            }
        }
    }

</script>