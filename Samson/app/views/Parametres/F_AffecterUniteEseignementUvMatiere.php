<?php
if(isset($_POST['UvMatiere']) && isset($_POST['UvMatiere'])){
    $data = array(
        'idue_ev'=>'',
        'iduv'=>$_POST['UvMatiere'],
        'idue'=>$_POST['UniteEnseignement']
    );
$tmp = new Ue_uvManager($bdd);
$nb = count($tmp->GetListMultiKeysUe_uv($_POST['UniteEnseignement'],$_POST['UvMatiere']));
if ($nb == 0) {
    $Objet = new Ue_uv($data);
    $ObjetManager=new Ue_uvManager($bdd);
    $statut =$ObjetManager->Add($Objet);
    if($statut==1){
        echo"<script> alert('Ajout effectuer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec Ajout !')</script>";
    }
} else {
    echo "<script> alert('UV deja affecter!')</script>";
}
}
?>


<form target="" method="post"  class="form-horizontal" action=""  name="affecterprogrammeue" id="affecterprogrammeue" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                <td>Unite d enseignement</td>
                    <td colspan="2">
                        <?php
                        echo $function->GetListeUniteEnsiegnement();
                        ?>
                    </td>
            </tr>
            <tr>
                <td>Unite de valeur</td>
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