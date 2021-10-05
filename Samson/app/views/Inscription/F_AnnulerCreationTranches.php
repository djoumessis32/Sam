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
if(isset($_POST['anneeAcad']) &&  isset($_POST['anneeAcad'])){
	$idannneeAcad=$_POST['anneeAcad'];
	//$tranche=$_POST['TrancheForm'];
	//print_r($_POST);
$req="SELECT * FROM etudiant E INNER JOIN preinscription P ON P.idetudiant = E.id
INNER JOIN semestrelmd S ON  S.idsemestrelmd = P.idsemestre
WHERE P.idannee = $idannneeAcad
AND P.exist = 1
GROUP BY E.id
ORDER BY E.id";
//echo $req;
$rep=$con->query($req);

$i=0;$listeetudiant="";
while($ligne=$rep->fetch()){
    $idetudiant=$ligne["idetudiant"];
    $listeetudiant.=$idetudiant;
    // echo $ligne[14];
    echo'<form method="POST" action="app/views/Inscription/ConfirmationAnnulTranche.php" target="new" name="form">
     <tr style="display:none"><td><input type="text" name="id'.$idetudiant.'"  value='.$ligne[0].'></td></tr>

</tr>
    ';
    $i++;$listeetudiant.=";";
    
}
echo'    <tr>
        <input type="hidden" name="listeetudiant" value="'.$listeetudiant.'">
		<input type="hidden" name="idannneeAcad" value="'.$idannneeAcad.'">
		
            <td></td><td><button type="submit" name="enregistrer" class="btn" id="effet2">Annuler Création Tranche</button>
        </tr></form></table>';
}
?>