<?php
if(isset($_POST['groupeUsr']) && isset($_POST['loginUsr'])){
    $data = array(
        'idutilisateur'=>'',
        'idgroupeutilisateur'=>$_POST['groupeUsr'],
        'codeutilisateur'=>'',
        'login'=>$_POST['loginUsr'],
        'password'=>$_POST['passwordUsr'],
        'sexe'=>$_POST['sexeUsr'],
        'nom'=>$_POST['nameUsr'],
        'prenom'=>$_POST['surnameUsr'],
        'etatcopte'=>$_POST['etatcopte'],
        'civilite'=>$_POST['civiliteUsr'],
        'email'=>$_POST['emailUsr']
    );
    $Objet = new Utilisateur($data);
    $ObjetManager=new UtilisateurManager($bdd);
    $statut =$ObjetManager->Add($Objet);
    if($statut==1){
        echo"<script> alert('Ajout effectuer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec Ajout !')</script>";
    }
}
?>


    <form target="" method="post"  class="form-horizontal" action=""  name="ajouteruser" id="formUser">
        <center>
            <table style="width: 95%">
                <tr>
                    <td>Groupe utilisateur</td>
                    <td colspan="2">
                        <?php
                        echo $function->GetListeGroupeUtlisateur();
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Noms</td>
                    <td><input class="" type="text" name="nameUsr" id="nameUsr" value="" required=""></td>
                    <td>Prenom</td>
                    <td><input class="" type="text" name="surnameUsr" id="surnameUsr" value="" required=""></td>

                </tr>
                <tr>
                    <td>Sexe</td>
                    <td>
                        <select class="" name="sexeUsr" id="sexeUsr" required="">
                            <option selected value="-1">-------------------------</option>
                            <option value="M">Masculin</option>
                            <option value="F">Feminin</option>
                        </select>
                    </td>
                    <td>Email</td>
                    <td><input class="" type="text" name="emailUsr" id="emailUsr" value="" required=""></td>
                </tr>
                <tr>
                    <td>Telephone</td>
                    <td><input class="" type="text" name="telUsr" id="telUsr" value="" required=""></td>
                    <td>Civilite</td>
                    <td>
                        <select class="" name="civiliteUsr" id="civiliteUsr" required>
                            <option selected value="-1">-------------------------</option>
                            <option value="Monsieur">M.</option>
                            <option value="Madame">Mme.</option>
                            <option value="Mademoiselle">Mlle.</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Login</td>
                    <td><input class="" type="text" name="loginUsr" id="loginUsr" value="" required=""></td>
                    <td>Mot de passe</td>
                    <td><input class="" type="password" name="passwordUsr" id="passwordUsr" value="" required=""></td>
                </tr>
                <tr>
                    <td>Etat du compte</td>
                    <td>
                        <select class="" name="etatcopte" id="etatcopte" required>
                            <option selected value="-1">-----------------------------</option>
                            <option value="1">Actif</option>
                            <option value="0">Desactif</option>
                        </select>
                    </td>
                    <td>Re-saisir le mot de passe</td>
                    <td><input class="" type="password" name="passwordUsr1" id="passwordUsr1" value="" required=""></td>
                </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-success" id="send">
                        Enregistrer <span class=' icon-ok'></span>
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
if(isset($_SESSION['message']))
{
    echo '<script>alert('.$_SESSION['message'].');</script>';
    unset($_SESSION['message']);
}
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