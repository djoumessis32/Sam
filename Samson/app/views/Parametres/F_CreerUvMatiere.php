<?php
if(isset($_POST['codeuvmatiere']) && isset($_POST['ncredis'])){
    $data = array(
        'iduvmatiere'=>'',
        'codeuvmatiere'=>$_POST['codeuvmatiere'],
        'libelle_fr_uvmatiere'=>$_POST['libelle_fr_uvmatiere'],
        'libelle_en_uvmatiere'=>$_POST['libelle_en_uvmatiere'],
        'ncredis'=>$_POST['ncredis'],
        'notevaliduvmatiere'=>$_POST['notevaliduvmatiere'],
        'noteelimuvmatiere'=>$_POST['noteelimuvmatiere'],
        'vlmhoraire'=>$_POST['vlmhoraire']
    );
    $Objet = new Uvmatiere($data);
    $ObjetManager=new UvmatiereManager($bdd);
    $statut =$ObjetManager->Add($Objet);
    if($statut==1){
        echo"<script> alert('Ajout effectuer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec Ajout !')</script>";
    }
}
?>

<form target="" method="post"  class="form-horizontal" action=""  name="" id="formUvMatiere" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                <td>Code UV</td>
                <td><input class="" type="text" name="codeuvmatiere" id="codeuvmatiere" value="" required=""></td>
            </tr>
            <tr>
                <td>Libelle En Francais UV</td>
                <td><input class="" type="text" name="libelle_fr_uvmatiere" id="libelle_fr_uvmatiere" value="" required=""></td>
            </tr>
            <tr>
                <td>Libelle En Anglais UV</td>
                <td><input class="" type="text" name="libelle_en_uvmatiere" id="libelle_en_uvmatiere" value="" required=""></td>
            </tr>
            <tr>
                <td>Nombre Credit UV</td>
                <td>
                    <input class="" type="number" name="ncredis" id="ncredis" value="" required="">    
                </td>
            </tr>
            <tr>
                <td>Note De Validation UV</td>
                <td>
                     <input class="" type="number" name="notevaliduvmatiere" id="notevaliduvmatiere" value="" required="">
                </td>
            </tr>
            <tr>
                <td>Note Eliminatoire UV</td>
                <td>
                <input class="" type="number" name="noteelimuvmatiere" id="noteelimuvmatiere" value="" required="">
                </td>
            </tr>
            <tr>
                <td>Volume Horaire</td>
                <td>
                    <input class="" type="number" name="vlmhoraire" id="vlmhoraire" value="" required="">
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