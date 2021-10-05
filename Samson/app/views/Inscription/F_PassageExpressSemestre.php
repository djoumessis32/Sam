<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
?>
<?php
if(isset($_POST['anneeAcad'])){
  $anneeAcad = $_POST['anneeAcad'];
  $filiereAcad = $_POST['filiereAcad'];
  $specialite = $_POST['specialite'];
  $semestreAcad = $_POST['semestreAcad'];
  $semestresuivant = $semestreAcad +1;
  //echo $semestresuivant;
  $req="SELECT * FROM etudiant E INNER JOIN preinscription P ON P.idetudiant = E.id
INNER JOIN semestrelmd S ON  S.idsemestrelmd = P.idsemestre
INNER JOIN specialite SP ON SP.id = P.idspecialite
WHERE P.idannee = $anneeAcad
AND P.idspecialite = $specialite 
AND P.idsemestre = $semestreAcad
AND pass = 1 GROUP BY E.id
ORDER BY E.nomEt, E.prenomEt";
//echo $req;
$rep=$con->query($req);

  ?>
  <div class="card card-body">
     <h3><center><strong>Passage Express Semestre Supérieur</strong><br></h3>
	 
            <small></small></center>
</div>

<div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered ">
                    <thead>
                        <tr>
						<th>#</th>
						     <th>Matricule</th>
                            <th>Noms & Prenoms</th>
                            <th>Date Lieu Naissance</th>
							<th>Sélectionner</th>
												
<?php
$i=0;$listeetudiant="";
while($ligne=$rep->fetch()){
	$idetudiant=$ligne["idetudiant"];
    $listeetudiant.=$idetudiant;
	echo'<form method="POST" action="app/views/Inscription/ValidePassageGlobal.php" target="new" name="form">
	<tr style="display:none"><td><input type="text" name="id'.$idetudiant.'"  value='.$ligne[0].'></td></tr>
	<tr class="row_'.$idetudiant.'" id="tr">
	<td id="tr" width="2%">'.($i+1).'</td>
	<td id="tr" width="20%">'.$ligne['matriculeEt'].'</td>
	<td id="tr" width="25%">'.$ligne['nomEt'].' '.$ligne['prenomEt'].'</td>
	<td id="tr" width="25%">'.str_replace('/','-',$ligne['dateNaissEt']).' à '.$ligne['lieuNaissEt'].'</td> ';
	if($ligne['pass']==1){
        echo '<td bgcolor="#006666"><input type="checkbox" checked  name="pass'.@$idpreinscription.'" value= 1> </td>';
    }else{
     echo '<td bgcolor="#006666"><input type="checkbox" class="select"  name="pass'.$idpreinscription.'" value= 1> </td>
      </td>';
 }
 echo '</tr> ';
    $i++;
    $listeetudiant.=";";
	
}
echo'     <tr>
        <input type="hidden" name="semestresuivant" value="'.$semestresuivant.'">
        <input type="hidden" name="filiereAcad" value="'.$filiereAcad.'">
        <input type="hidden" name="anneeAcad" value="'.$anneeAcad.'">
        <input type="hidden" name="specialite" value="'.$specialite.'">
        <input type="hidden" name="semestreAcad" value="'.$semestreAcad.'">
        <input type="hidden" name="listeetudiant" value="'.$listeetudiant.'">
            <td></td><td><button type="submit" name="enregistrer" class="btn-primary">Enregistrer</button>
        </tr></form></table>';
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
<?php
}

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
                    <button type="submit" class="btn btn-success" id="send">
                        Effectuer Passage<span class='icon-ok'></span>
                    </button>
                </td>
                <td>
                    <button type="reset" class="btn btn-danger">
                        Annuler <span class='icon-remove'></span>
                    </button>
                </td>
            </tr>
        </table>
    </center>
</form>