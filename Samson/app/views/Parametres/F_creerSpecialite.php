<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
?>
<?php 
    if(isset($_POST['codeSP']) &&  isset($_POST['nomSP'])){
        $data = array(
            'id'=>'' ,
            'codeSP'=>$_POST['codeSP'],
            'nomSP'=>$_POST['nomSP'],
            'etat' =>$_POST['etatspecialite'],
            'id_filiere' =>$_POST['filiereAcad'],
     );
     $Objet = new  Specialite($data);
    $ObjetManager=new  SpecialiteManager($bdd);
    $statut =$ObjetManager->Add($Objet);

    if($statut==1 ){
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
                <td>Filiere</td>
                <td>
                    <?php
                    echo $function->GetListeFiliere();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Code Specialité</td>
                <td><input class="" type="text" name="codeSP" id="codeSP" value="" required=""></td>
            </tr>
            <tr>
                <td>Nom Specialité</td>
                <td><input class="" type="text" name="nomSP" id="nomSP" value="" required=""></td>
            </tr>

            <tr>
                <td> Etat</td>
                <td>
                     <select class="" name="etatspecialite" id="etatspecialite" required="">
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