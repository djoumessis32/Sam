<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/20/18
 * Time: 2:24 AM
 */
if(isset($_POST['codegroupe'])&& isset($_POST['libellegroupe'])){
   // print_r($_POST);
    $data = array(
        'idgroupeutilisateur'=>'',
        'codegroupeutilisateur'=>$_POST['codegroupe'],
        'libellegroupeutilisateur'=>$_POST['libellegroupe'],
        'etatgroupe'=>$_POST['etatgroupe']
    );
    $Objet = new Groupeutilisateur($data);
    $ObjetManager=new GroupeutilisateurManager($bdd);
    $statut =$ObjetManager->Add($Objet);
    $req_id="SELECT max(idgroupeutilisateur) FROM groupeutilisateur";
    $rep_id=$db->query($req_id);
    $id=$rep_id->fetch();
    $req="SELECT idmenu FROM menu WHERE idfils=2";
    $rep=$db->query($req);
    while($droit=$rep->fetch()){
        $req_insert="insert into groupeutilisateurmenu(idgroupeutilisateur, idmenu, dateattribution, nivauaccess)
values ($id[0],$droit[0],NOW(),0)";
        $rep_insert=$db->exec($req_insert);
    }
    if($statut==1){
        echo"<script> alert('Ajout effectuer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec Ajout !')</script>";
    }

}
?>
<form target="" method="post"  class="form-horizontal" action=""  name="" id="formUser" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                <td>Code groupe utiliateur</td>
                <td><input class="" type="text" name="codegroupe" id="codegroupe" value="" required=""></td>
            </tr>
            <tr>
                <td>Nom du groupe utilisateur</td>
                <td><input class="" type="text" name="libellegroupe" id="libellegroupe" value="" required=""></td>
            </tr>
            <tr>
                <td>Etat groupe utilisateur</td>
                <td>
                    <select class="span12" name="etatgroupe" id="etatgroupe" required="">
                        <option selected value="-1">--------------------</option>
                        <option value="0">Desactif</option>
                        <option value="1">Actif</option>
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