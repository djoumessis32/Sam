<?php
if(isset($_POST['niveau'])){
    $data = array(
        'idtlisttypesession'=>'',
        'libelletlisttypesession'=>$_POST['niveau'],
    );
    $Objet = new Tlisttypesession($data);
    $ObjetManager=new TlisttypesessionManager($bdd);
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
                <td>libelle type session </td>
                 <td colspan="2">
                    <?php
                        echo $function->GetListeNiveau();
                    ?>
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