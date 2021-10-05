<?php
$data=null;
$post=null;
$Req_final=null;
$Rep_final=null;
$t=0;
//print_r($_POST);
if(isset($_POST['groupeU'])){
    $idgroupeuser=$_POST['groupeU'];
    $Req_final1 = "UPDATE groupeutilisateurmenu SET nivauaccess=0 WHERE idgroupeutilisateur=" . $idgroupeuser . " ";
    $Rep_final1=$db->exec($Req_final1);
    $idgroupeuser=$_POST['groupeU'];
    $Res_max="SELECT idmenu FROM menu WHERE (idfils=2 or idfils=7) ";
    $Res_jou="SELECT idmenu FROM groupeutilisateurmenu WHERE idgroupeutilisateur='$idgroupeuser'";
    $Rep_max=$db->query($Res_max);
    $Rep_jou=$db->query($Res_jou);


    $r1 = "SELECT * FROM menu WHERE (idfils=2 or idfils=7) ORDER  BY libelle_fr ASC ";
    $p1=$db->query($r1);
    $l=0;
    while($me1=$p1->fetch()) {
        $post = "droit_" . $me1[0];
        if(isset($_POST[$post])){
            $data = $_POST[$post];
            if ($data==="on") {
                $Req_final = "UPDATE groupeutilisateurmenu SET nivauaccess=1 WHERE idmenu=" . $me1[0] . " AND idgroupeutilisateur=" . $idgroupeuser . " ";
            }
            $Rep_final = $db->exec($Req_final);

        }
        $l++;

    }



    if($Rep_final==true){

        echo '<script language="javascript">alert("Affectation Effectuer avec Success!"); </script>';
    }
    else {
        echo '<script language="javascript">alert("Affectation non Effectuer!"); </script>';
    }

}
?>


<form target="" method="post"  class="form-horizontal" action=""  name="ajouteruser" id="formUser">
    <center>
        <table style="width: 70%">
            <tr>
                <td colspan="2">Groupe utilisateur</td>
                <td colspan="2">
                    <?php
                    echo $function->GetListeGroupeUtlisateur();
                    ?>
                </td>
            </tr>
            <tr class="">
                <td colspan="">Que voulez-vous faire?</td>
                <td><button class="btn btn-primary" type="button" name="refreshAll" id="refreshAll"><span class="glyphicon glyphicon-check"></span>Tout Cocher</button></td>
                <td><button class="btn btn-danger" type="button" name="NotrefreshAll" id="NotrefreshAll"><span class="glyphicon glyphicon-unchecked"></span>Tout Decocher</button></td>
                <td style="padding-left: 100px;">
                    <button type="submit" class="btn btn-success"><span class=" glyphicon glyphicon-copy"></span>&nbsp;Affecter</button>
                </td>
            </tr>
        </table>
    </center>
   <div id="infosdroit">

   </div>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 18/11/16
 * Time: 23:37
 */
if(isset($_SESSION['message']))
{
    echo '<script>alert('.$_SESSION['message'].');</script>';
    unset($_SESSION['message']);
}
?>
