<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/20/18
 * Time: 3:09 AM
 */
if((isset($_POST['ListUser']))&& (isset($_POST['etatcopte']))){

        $pass_old=$_POST['groupeUsr'];
        $pass1=$_POST['ListUser'];
        $pass2=$_POST['etatcopte'];

        $req="select * from utilisateur
                where idutilisateur=".$pass1." and idgroupeutilisateur=".$pass_old."";
        // echo($req);
        $rep=$bdd->query($req);
        $nb=$rep->fetchAll(PDO::FETCH_ASSOC);
        if(count($nb)>0 ){
            $reqinsert="update utilisateur set etatcopte='".$pass2."' where idutilisateur=".$pass1." and idgroupeutilisateur=".$pass_old."";
            //    echo$reqinsert;
            $repinsert=$bdd->exec($reqinsert);
            if($repinsert==1){
                echo"<script> alert('Mise a jour effectuer avec succes!')</script>";
            }else{
                echo"<script> alert('Echec Mise a jour!')</script>";
            }

        }
}

?>


<form target="" method="post"  class="form-horizontal" action=""  name="ajouteruser" id="formUser" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                <td >Groupe utilisateur</td>
                <td colspan="2">
                    <?php
                    echo $function->GetListeGroupeUtlisateur();
                    ?>
                </td>
            </tr>

            <tr>
                <td>Utilisateur</td>
                <td id="infoPersonnel">
                    <select name="nameUsr" id="nameUsr" required="" class="">
                        <option value="-1" selected>=====================</option>
                    </select>
                </td>
                <td id="etatcompte"></td>
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

