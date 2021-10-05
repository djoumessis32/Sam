<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
?>
<?php
//print_r($_POST);
    if(isset($_POST['codecampus']) &&  isset($_POST['libellecampus'])){
        $data = array(
            'idcampus'=>'' ,
            'codecampus'=>$_POST['codecampus'],
            'libellecampus_fr'=>$_POST['libellecampus'],
            'libellecampus_en'=>$_POST['libellecampus2']
     );
     $Objet = new Campus($data);
     $ObjetManager=new CampusManager($bdd);
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
                <td>Code Campus</td>
                <td><input class="" type="text" name="codecampus" id="codecampus" value="" required=""></td>
            </tr>
            <tr>
                <td>libelle Campus Fr</td>
                <td><input class="" type="text" name="libellecampus" id="libellecampus" value="" required=""></td>
            </tr>
            <tr>
                <td>libelle Campus En</td>
                <td><input class="" type="text" name="libellecampus2" id="libellecampus2" value="" required=""></td>
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