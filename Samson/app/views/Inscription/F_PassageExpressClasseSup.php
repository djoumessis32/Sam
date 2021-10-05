<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
?>
<form target="" method="post"  class="form-horizontal" action=""  name="" id="formUser" enctype="multipart/form-data">
<h4><center><strong>Choix des Paramètres Inscription de Départ</strong><br></h4>
          <hr>
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
                <td>Classe</td>
                <td id="semestes">
                    <?php
                    echo $function->GetSClasse();
                    ?>
                </td>
            </tr>
			</table>
        <hr>
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
  $classelmd=$_POST['classelmd'];
  $classesuivant = $classelmd+1;
  $anneeAcadsuivant = $anneeAcad+1;
  //echo $classelmd;
  //echo $classesuivant;
  //echo $anneeAcadsuivant;
 $req="SELECT * FROM preinscription P inner join semestrelmd S on S.idsemestrelmd=P.idsemestre inner join classesemestrelmd CLS 
on CLS.idsemestre=S.idsemestrelmd inner join classelmd CL on CL.idclasselmd=CLS.idclasselmd inner join specialite SP 
on SP.id=P.idspecialite inner join etudiant E on E.id=P.idetudiant WHERE P.idannee = $anneeAcad AND P.idspecialite = $specialite AND CL.idclasselmd = $classelmd AND is_inscrit = 1
and passclass = 0 AND is_inscrit = 1
 GROUP BY E.id ORDER BY E.nomEt, E.prenomEt";
$rep=$con->query($req);

$reqsemestre="select min(idsemestre) from classesemestrelmd where idclasselmd = $classesuivant";
$valider=$con->query($reqsemestre);
while($resultat=$valider->fetch()){$idsemestre=$resultat['min(idsemestre)']; }
//echo $idsemestre;
//echo $reqsemestre;
echo ' <h5><strong>Nombre de Crédit Exigible</strong><br></h5>';
if($classelmd==1)//On affiche uniquement la colonne de L1
  {
    echo '<td class="key">Nbre Credit L1:</td>
          <td align="left"><input type="text" name="nbrecreditL1" id="nbrecreditL1" value="45" /></td>';
  }
 else if($classelmd==2)//On affiche la colonne de L1 et L2
   {
    echo '<td class="key">Nbre Credit L1:</td>
          <td align="left"><input type="text" name="nbrecreditL1" id="nbrecreditL1" value="60" /></td>';
    echo ' <td class="key">Nbre Credit L2:</td>
           <td align="left"><input type="text" name="nbrecreditL2" id="nbrecreditL2" value="60" /></td>';
   }
   else if($classelmd==3)//On affiche la colonne de L1,L2 et L3
    {
      echo '<td class="key">Nbre Credit L1:</td>
          <td align="left"><input type="text" name="nbrecreditL1" id="nbrecreditL1" value="60" /></td>';
      echo ' <td class="key">Nbre Credit L2:</td>
             <td align="left"><input type="text" name="nbrecreditL2" id="nbrecreditL2" value="60" /></td>';
	  echo '<td class="key">Nbre Credit L3:</td>
            <td align="left"><input type="text" name="nbrecreditL3" id="nbrecreditL3" value="60" /></td>';
    }
  ?>
  <hr>
  <div class="card card-body">
     <h3><center><strong>Passage Express Classe Supérieur</strong><br></h3>
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
	echo'<form method="POST" action="app/views/Inscription/ValidePassageClasseSup.php" target="new" name="form">
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
        <input type="hidden" name="classelmd" value="'.$classelmd.'">
        <input type="hidden" name="idsemestre" value="'.$idsemestre.'">
        <input type="hidden" name="anneeAcadsuivant" value="'.$anneeAcadsuivant.'">
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