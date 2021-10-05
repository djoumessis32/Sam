<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
?>
<?php 
    if(isset($_POST['codeuniteenseignement']) &&  isset($_POST['libelleuniteenseignement'])){
        $data = array('iduniteenseignement'=>'' ,
                    'codeuniteenseignement'=>$_POST['codeuniteenseignement'],
                    'libelleuniteenseignement'=>$_POST['libelleuniteenseignement'],
                    'nbcreditsue' =>$_POST['nbcreditsue'],
                    'notevalidationue'=>$_POST['notevalidationue'],
                    'noteeleminerue'=>$_POST['noteeleminerue']
     );
     $Objet = new Uniteenseignement($data);
    $ObjetManager=new UniteenseignementManager($bdd);
    $statut =$ObjetManager->Add($Objet);
    if($statut==1){
        echo"<script> alert('Ajout effectuer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec Ajout !')</script>";
    }
    }


?>>



<form target="" method="post"  class="form-horizontal" action=""  name="" id="formUser" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                <td>Code UE</td>
                <td><input class="" type="text" name="codeuniteenseignement" id="codeuniteenseignement" value="" required=""></td>
            </tr>
            <tr>
                <td>Libelle UE</td>
                <td><input class="" type="text" name="libelleuniteenseignement" id="libelleuniteenseignement" value="" required=""></td>
            </tr>
            <tr>
                <td>Nombre Credit UE</td>
                <td>
                    <input class="" type="text" name="nbcreditsue" id="nbcreditsue" value="" required="">    
                </td>
            </tr>
            <tr>
                <td>Note De Validation UE</td>
                <td>
                     <input class="" type="text" name="notevalidationue" id="notevalidationue" value="" required="">
                </td>
            </tr>
            <tr>
                <td>Note Eliminatoire UE</td>
                <td>
                <input class="" type="text" name="noteeleminerue" id="noteeleminerue" value="" required="">
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