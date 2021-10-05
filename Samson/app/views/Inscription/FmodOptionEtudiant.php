<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
?>
<form method="post"  class="form-horizontal" action=""  name="inscription" id="formUser">
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
                <td>Specialite depart</td>
                <td id="specialit">
                    <label for="specialite"></label><select class="" name="specialite" id="specialite">
                        <option selected value="-1">-------------------------</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Semestre</td>
                <td id="semestes">
                    <?php
                    echo $function->GetSemestreE();
                    ?>
                </td>
            </tr>
        </table>
        <hr>
        <table style="width: 55%">
 <tr>
                <td>Filiere</td>
                <td id="filiere">
                    <?php
                    echo $function->GetListeFiliere1();
                    ?>
                </td>
            <tr>
            <tr>
                <td>Specialite d'arrivee</td>
                <td id="specialitfin">
                    <label for="specialitefin"></label><select class="" name="specialitefin" id="specialitefin">
                        <option selected value="-1">-------------------------</option>
                    </select>
                </td>
            </tr>

        </table>
        <hr>
        <table style="width: 55%">
            <tr>
                <td>
                    <button class="btn btn-success" id="send">
                        Modifier <span class=' icon-arrow-right'></span>
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

<?php
if(isset($_POST['anneeAcad'])){
    $anneeAcad = $_POST['anneeAcad'];
    $filiereAcad = $_POST['filiereAcad'];
    $specialite = $_POST['specialite'];
    $idspf=$_POST['specialitefin'];
    $classelmd=$_POST['semestreAcad11'];
    //echo $classelmd;
    //echo $classesuivant;
    //echo $anneeAcadsuivant;
    $req="SELECT * FROM preinscription P
  inner join specialite SP on SP.id=P.idspecialite
  inner join specialiteclasselmd SPC on SPC.idspecialite=SP.id
  inner join etudiant E on E.id=P.idetudiant
   WHERE P.idannee = $anneeAcad
   AND P.idspecialite = $specialite
   AND P.idsemestre = $classelmd
   GROUP BY E.id ORDER BY E.nomEt, E.prenomEt";
   // echo($req);
    $rep=$con->query($req);
    ?>
    <hr>
    <div class="card card-body">
        <h3><center><strong>Modifier specialite etudiant</strong><br></h3>
        <div class="card card-body" style="color:orangered" align="center"><input type="checkbox" id="tout" onclick="checkAll();">Sélectionner tout<br></div>
        <small></small></center>
    </div>
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
        echo'<form method="POST" action="app/views/Inscription/FUpdateOptionsEtudiant.php" target="new" name="form">
		<tr style="display:none"><td><input type="text" name="id'.$idetudiant.'"  value='.$ligne['id'].'></td></tr>
		
		<tr class="row_'.$idetudiant.'" id="tr">
		<td id="tr" width="2%">'.($i+1).'</td>
		<td id="tr" width="35%">'.$ligne['matriculeEt'].'</td>
		<td id="tr" width="45%">'.$ligne['nomEt'].' '.$ligne['prenomEt'].'</td> ';
        echo '<td bgcolor="#006666"><input type="checkbox" name="passclass'.@$idetudiant.'" value=1> </td>';
        echo '</tr> ';
        $i++;
        $listeetudiant.=";";

    }
    echo'     <tr>
        <input type="hidden" name="anneeAcad" value="'.$anneeAcad.'">
        <input type="hidden" name="specialite" value="'.$specialite.'">
        <input type="hidden" name="specialitef" value="'.$idspf.'">
        <input type="hidden" name="listeetudiant" value="'.$listeetudiant.'">
            <td></td><td><button type="submit" name="enregistrer" class="btn-primary">Enregistrer</button>
        </tr></form></table>';
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