<?php
/**
 * Created by PhpStorm.
 * User: Befah
 * Date: 9/27/2019
 * Time: 1:19 AM
 */
if(isset($_POST['iduser'])){


//print_r($_POST);
$id=$_POST['iduser'];
$password='0123456@azerty';
$pass=md5(md5('Samson@2018'.$password));
$req='UPDATE utilisateur set password="'.$pass.'" where idutilisateur='.$id.'';
//echo $req;
$rep=$con->exec($req);
if($rep==1){
    echo"<script> alert('Compte utilisateur Reinitialiser avec succes!')</script>";
}else{
    echo"<script> alert('Echec Reinitialisation!')</script>";
}
}
?>


<form target="" method="post"  class="form-horizontal" action=""  name="ajouteruser" id="formUser">
    <center>
        <table id="iduser" style="width: 70%" class="table-bordered table">
            <thead style="background-color: #a9a9a9">
			            <tr>
                <td colspan="4"><center><span style="color:red"><marqueu> Mot de passe par defaut de reinitialisation: </marqueu><b>0123456@azerty</b></span></center></td>
                </tr>
            <tr>
                <td><center>Groupe utilisateur</center></td>
                <td><center>Nom(s) et prenom(s)</center></td>
                <td><center>Login</center></td>
                <td><center>Action</center></td>
            </tr>

            </thead>
            <?php $function->GetListeUser();?>
        </table>
    </center>
</form>
