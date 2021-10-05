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
		$semestresuivant = $_POST['idsemestre'];
		$anneeAcad = $_POST['anneeAcadsuivant'];
        $specialite = $_POST['specialite'];
        $classelmd = $_POST['classelmd'];
		@$p5=$_POST['passclass'.$idetudiant];
		$datejour = date("Y-m-d");
		//$anneeAcadav = $anneeAcad-1;
		//echo $p5;
/*$reqsemestre="select min(idsemestre) from classesemestrelmd where idclasselmd = $classelmd";
$valider=$con->query($reqsemestre);
while($resultat=$valider->fetch()){$idsemestremin=$resultat['min(idsemestre)']; }	

$reqsemestre="select max(idsemestre) from classesemestrelmd where idclasselmd = $classelmd";
$valider=$con->query($reqsemestre);
while($resultat=$valider->fetch()){$idsemestremax=$resultat['max(idsemestre)']; }*/	



		
if($p5==1){
        $Req_UpdatePreinscription="update preinscription SET passclass = 1 where idetudiant=$idetud ;";
		$req = $con->query($Req_UpdatePreinscription);
        $tes2=$con->exec("INSERT INTO preinscription(idetudiant,idsemestre,idspecialite,pass,idannee,is_inscrit,datepreinscription)VALUES($idetudiant,$semestresuivant,$specialite,1,$anneeAcad,0,'$datejour');");
}
}
}
if($tes2==true ){
             echo '<script language="javascript">alert("Passage effectué Avec Success!"); </script>';
				}else {
        echo '<script language="javascript">alert("Passage non Enregistrer !!"); </script>';

    }
?>