<?php
/**
 * Created by PhpStorm.
 * User: DevineSoft
 * Date: 29/08/14
 * Time: 08:49
 */
require_once'../../config.php';
@$listeetudiant=explode(";",$_POST["listeetudiant"]);
$n=count($listeetudiant);
for($i=0;$i<$n;$i++){
    $idetudiant=$listeetudiant[$i];
    if(isset($idetudiant)and $idetudiant!=""){
        $idetud=$_POST['id'.$idetudiant];
		$semestresuivant = $_POST['semestresuivant'];
		$anneeAcad = $_POST['anneeAcad'];
        $filiereAcad = $_POST['filiereAcad'];
        $specialite = $_POST['specialite'];
        $semestreAcad = $_POST['semestreAcad'];
        $datejour = date("Y-m-d");	
		
$req="SELECT idpreinscription FROM etudiant E INNER JOIN preinscription P ON P.idetudiant = E.id
INNER JOIN semestrelmd S ON  S.idsemestrelmd = P.idsemestre
INNER JOIN specialite SP ON SP.id = P.idspecialite
WHERE P.idannee = $anneeAcad
AND P.idspecialite = $specialite 
AND P.idsemestre = $semestreAcad
AND is_inscrit = 1 AND pass = 1
and idetudiant = $idetud";
$valider=$con->query($req);
while($ligne=$valider->fetch()){$idpreinscription=$ligne['idpreinscription']; }
//echo $idpreinscription;
$Req_UpdateMoyCand="update preinscription SET pass = 0 where idetudiant=$idetud;";
$req = $con->query($Req_UpdateMoyCand);
$tes2=$con->exec("INSERT INTO preinscription(idetudiant,idsemestre,idspecialite,pass,idannee,is_inscrit,dateinscription)VALUES($idetudiant,$semestresuivant,$specialite,1,$anneeAcad,1,'$datejour');");

}
}
if($req==true and $tes2==true ){
             echo '<script language="javascript">alert("Passage effectué Avec Success!"); </script>';
				}else {
        echo '<script language="javascript">alert("Passage non Enregistrer !!"); </script>';

    }
?>