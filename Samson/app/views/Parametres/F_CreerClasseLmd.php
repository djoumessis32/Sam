<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
?>
<?php 
    if(isset($_POST['codeclasselmd']) &&  isset($_POST['libelleclasselmd'])){
        $data = array('idclasselmd'=>'' ,
                    'codeclasselmd'=>$_POST['codeclasselmd'],
                    'libelleclasselmd'=>$_POST['libelleclasselmd']
     );
     $Objet = new Classelmd($data);
    $ObjetManager=new ClasselmdManager($bdd);
    $statut =$ObjetManager->Add($Objet);
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
                <td>Code classe LMD</td>
                <td><input class="" type="text" name="codeclasselmd" id="codeclasselmd" value="" required=""></td>
            </tr>
            <tr>
                <td>Libelle classe LMD</td>
                <td><input class="" type="text" name="libelleclasselmd" id="libelleclasselmd" value="" required=""></td>
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
                        Enregistrer<span class='icon-ok'></span>
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