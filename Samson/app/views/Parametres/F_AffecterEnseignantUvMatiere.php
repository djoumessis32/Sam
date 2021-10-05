<?php
if(isset($_POST['enseignant']) && isset($_POST['UvMatiere'])){
    $data = array(
        'idenseignantuvmatiere'=>'',
        'idenseignant'=>$_POST['enseignant'],
        'iduvmatiere'=>$_POST['UvMatiere']
    );
    $Objet = new Enseignantuvmatiere($data);
    $ObjetManager=new EnseignantuvmatiereManager($bdd);
    $statut =$ObjetManager->Add($Objet);
    if($statut==1){
        echo"<script> alert('Ajout effectuer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec Ajout !')</script>";
    }
}
?>


<form target="" method="post"  class="form-horizontal" action=""  name="affecterprogrammeue" id="affecterprogrammeue" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                 <td>Enseignant</td>
                    <td colspan="2">
                        <?php
                        echo $function->GetListeEnseignant();
                        ?>
                    </td>
            </tr>
            <tr>
                <td>Unite de Valeur / Cours</td>
                    <td colspan="2">
                        <?php
                        echo $function->GetListeUvMatiere();
                        ?>
                    </td>
            </tr>
            <tr>
                
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