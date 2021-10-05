<?php
if((isset($_POST['Password1']))&& (isset($_POST['Password2']))){

    if((isset($_POST['Password_old']) )&& (isset($_POST['Password1']))&& (isset($_POST['Password2']))){
        $pass_old=$_POST['Password_old'];
        $pass1=$_POST['Password1'];
        $pass2=$_POST['Password2'];
        $crup=$pass_old;
        $scrup=md5(md5('Samson@2018'.$pass1));

        $req="select * from utilisateur
                where idutilisateur=".$_SESSION['idutilisateur']." and idgroupeutilisateur=".$_SESSION['idgroupeutilisateur']."";
       // echo($req);
        $rep=$bdd->query($req);
        $nb=$rep->fetchAll(PDO::FETCH_ASSOC);
        if(count($nb)>0 ){
            $reqinsert="update utilisateur set password='".$scrup."' where idutilisateur=".$_SESSION['idutilisateur']." and idgroupeutilisateur=".$_SESSION['idgroupeutilisateur']."";
            //    echo$reqinsert;
            $repinsert=$bdd->exec($reqinsert);
            if($repinsert==1){
                echo"<script> alert('Mise a jour effectuer avec succes!')</script>";
            }else{
                echo"<script> alert('Echec Mise a jour!')</script>";
            }

        }

    }
    $_SESSION['message']="Resaisie invalide";
    echo '<script>alert('.$_SESSION['message'].');</script>';
}

?>


<form target="" method="post"  class="form-horizontal" action=""  name="ajouteruser" id="formUser" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                <td>Ancien mot de passe</td>
                <td><input class="" type="password" name="Password_old" id="Password_old" value="" required=""></td>
            </tr>
            <tr>
                <td>Nouveau mot de passe</td>
                <td><input class="" type="password" name="Password1" id="Password1" value="" required=""></td>
            </tr>
            <tr>
                <td>re-saisir mot de passe</td>
                <td><input class="" type="password" name="Password2" id="Password2" value="" required=""></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-success" id="send">
                        Enregistrer<span class=' icon-ok'></span>
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
<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 18/11/16
 * Time: 23:37
 */

?>
<script>
    $("#personnelU").change(function () {
        var id=$(this).val();
        $.ajax({
            url: '/HEPIC/app/controllers/ControlleurAjax.php',
            type: 'POST',
            dataType: 'html',
            data: {
                action:'getformUser',
                id:id
            },
            success: function (data) {
                //alert(data);
                $("#infoPersonnel").html(data);

            },
            error: function (resultat, statut, erreur) {
                //html(resultat);
                alert('resultat=' + erreur + statut + resultat);
            }

        })

    });
</script>