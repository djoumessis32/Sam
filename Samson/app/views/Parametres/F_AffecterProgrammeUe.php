<?php
if(isset($_POST['programme']) && isset($_POST['UniteEnseignement'])) {
    $data = array(
        'idprogrammeue' => '',
        'idprogramme' => $_POST['programme'],
        'idue' => $_POST['UniteEnseignement']
    );
    $tmp = new ProgrammeueManager($bdd);
    $nb = count($tmp->GetListMultiKeysProgrammeue($_POST['programme'], $_POST['UniteEnseignement']));
    if ($nb == 0) {
        $Objet = new Programmeue($data);
        $ObjetManager = new ProgrammeueManager($bdd);
        $statut = $ObjetManager->Add($Objet);
        if ($statut == 1) {
            echo "<script> alert('Ajout effectuer avec succes!')</script>";
        } else {
            echo "<script> alert('Echec Ajout !')</script>";
        }

    } else {
        echo "<script> alert('UE deja affecter!')</script>";
    }
}

?>


<form target="" method="post"  class="form-horizontal" action=""  name="affecterprogrammeue" id="affecterprogrammeue" enctype="multipart/form-data">
    <center>
        <table style="width: 70%">

            <tr>
                 <td>Programme</td>
                    <td colspan="2">
                        <?php
                        echo $function->GetListeProgramme();
                        ?>
                    </td>
            </tr>
            <tr>
                <td>Unite d enseignement</td>
                    <td colspan="2">
                        <?php
                        echo $function->GetListeUniteEnsiegnement();
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