<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
?>


<form target="" method="post"  class="form-horizontal" action=""  name="" id="formUser" enctype="multipart/form-data">
    <center>

        <table style="width: 55%">
            <tr>
                <td ><b>Annee Academique</b></td>
                <td >
                    <?php
                    echo $function->GetListeAnneeAcad();
                    ?>
                </td>
            </tr>
       
		
		   <tr>
                <td class="labelselect"><b>Définition Tranche*</b></td>
                <td class="inputselect">
                    <select id="TrancheForm" name="TrancheForm" onblur="check_select('nbcandidatForm','Choisir','Vous devez choisir une épreuve',listeCandidat,1,'non_remplie4')" class="input-xlarge" onchange="" required>
                        <option value="Choisir">Choisir Nombre Tranches</option>
                        <option value="1">1-->Tranche</option>
                        <option value="2">2-->Tranche</option>
                        <option value="3">3-->Tranche</option>
                        <option value="4">4-->Tranche</option>
                       
                    </select>
                    <img class="etatselect" src="" alt="" width="35" name="non_remplie4" border="0" id="non_remplie4"  />
                </td>
            </tr>
		</table>
        <hr>
        <table style="width: 55%">
        <tr>
                <td>
                    <button class="btn btn-success" id="send">
                       Simulation <span class=' icon-arrow-right'></span>
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
if(isset($_POST['TrancheForm']) &&  isset($_POST['anneeAcad'])){
	$idannneeAcad=$_POST['anneeAcad'];
	$tranche=$_POST['TrancheForm'];
	//print_r($_POST);
$req="SELECT * FROM etudiant E INNER JOIN preinscription P ON P.idetudiant = E.id
INNER JOIN semestrelmd S ON  S.idsemestrelmd = P.idsemestre
WHERE P.idannee = $idannneeAcad
AND P.exist = 0
AND P.is_inscrit = 1
GROUP BY E.id
ORDER BY E.id";
//echo $req;
$rep=$con->query($req);

$i=0;$listeetudiant="";
while($ligne=$rep->fetch()){
    $idetudiant=$ligne["idetudiant"];
    $listeetudiant.=$idetudiant;
    // echo $ligne[14];
    echo'<form method="POST" action="app/views/Parametres/ConfirmationTranche.php" target="new" name="form">
     <tr style="display:none"><td><input type="text" name="id'.$idetudiant.'"  value='.$ligne[0].'></td></tr>

</tr>
    ';
    $i++;$listeetudiant.=";";
    
}
echo'    <tr>
        <input type="hidden" name="listeetudiant" value="'.$listeetudiant.'">
		<input type="hidden" name="idannneeAcad" value="'.$idannneeAcad.'">
		<input type="hidden" name="tranche" value="'.$tranche.'">
            <td></td><td><button type="submit" name="enregistrer" class="btn" id="effet2">Validation</button>
        </tr></form></table>';
}
?>