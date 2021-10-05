<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 1/26/19
 * Time: 10:07 PM
 */

require_once'../../config.php';
@$listeetudiant=explode(";",$_POST["listeetudiant"]);
$n=count($listeetudiant);
$req=null;
for($i=0;$i<$n;$i++){
    $idetudiant=$listeetudiant[$i];
    if(isset($idetudiant)and $idetudiant!=""){
        $idetud=$_POST['id'.$idetudiant];
        $anneeAcad = $_POST['anneeAcad'];
        $specialite = $_POST['specialite'];
        $specialitef = $_POST['specialitef'];
        @$p5=$_POST['passclass'.$idetudiant];

        //$anneeAcadav = $anneeAcad-1;
        //echo $p5;
        /*$reqsemestre="select min(idsemestre) from classesemestrelmd where idclasselmd = $classelmd";
        $valider=$con->query($reqsemestre);
        while($resultat=$valider->fetch()){$idsemestremin=$resultat['min(idsemestre)']; }

        $reqsemestre="select max(idsemestre) from classesemestrelmd where idclasselmd = $classelmd";
        $valider=$con->query($reqsemestre);
        while($resultat=$valider->fetch()){$idsemestremax=$resultat['max(idsemestre)']; }*/




        if($p5==1){
            $Req_UpdatePreinscription="update preinscription SET idspecialite = $specialitef  where idetudiant=$idetud and idannee=$anneeAcad and idspecialite=$specialite";
            $req = $con->exec($Req_UpdatePreinscription);
            }
    }
}
if($req==true){
    echo '<script language="javascript">alert("Modification effectué Avec Success!"); </script>';
}else {
    echo '<script language="javascript">alert("Modification non Effectuer!!"); </script>';

}
?>