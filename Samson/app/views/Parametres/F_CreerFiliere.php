<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
?>
<?php 
    if(isset($_POST['codeFil']) &&  isset($_POST['nomFil'])){
        $data = array('id'=>'' ,
                    'codeFil'=>$_POST['codeFil'],
                    'nomFil'=>$_POST['nomFil'],
                    'cycle' =>$_POST['cycle'],
                    'cursus' =>$_POST['idcursus'],
                    'idcampus' =>$_POST['campusAcad'],
                    'etat' =>$_POST['etatfiliere']
     );
     $Objet = new Filiere($data);
    $ObjetManager=new FiliereManager($bdd);
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
                <td>Campus</td>
                <td>
                    <?php
                    echo $function->GetListeCampus();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Cursus</td>
                <td>
                    <?php
                    echo $function->GetListeCursus();
                    ?>
                </td>
            </tr>
            <tr>
                <td>Code Filiere</td>
                <td><input class="" type="text" name="codeFil" id="codeFil" value="" required=""></td>
            </tr>
            <tr>
                <td>Nom Filiere</td>
                <td><input class="" type="text" name="nomFil" id="nomFil" value="" required=""></td>
            </tr>
            <tr>
                <td>Cycle</td>
                <td>
                    <input class="" type="text" name="cycle" id="cycle" value="" required="">    
                </td>
            </tr>
            <tr>
                <td> Etat</td>
                <td>
                     <select class="" name="etatfiliere" id="etatfiliere" required="">
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