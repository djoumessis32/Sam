<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/23/18
 * Time: 3:46 PM
 */

?>

<form target="e" method="post"  class="form-horizontal" action="app/views/Examen/E_ImprimerPVSemestre.php"  name="ajouteruser" id="formUser">
    <center>

        <table style="width: 55%">
            <tr>
                <td >Annee Academique</td>
                <td >
                    <?php
                    echo $function->GetListeAnneeAcad();
                    ?>
                </td>
            </tr>


            <tr>
                <td>Filiere</td>
                <td id="filiere">
                    <?php
                    echo $function->GetListeFiliere();
                    ?>
                </td>
            <tr>
            <tr>
                <td>Specialite</td>
                <td id="specialit">
                    <label for="specialite"></label><select class="" name="specialite" id="specialite">
                        <option selected value="-1">-------------------------</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Session</td>
                <td id="session">
                    <select class="" name="sessioncad" id="sessioncad" required>
                        <option selected value="-1">-------------------------</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Semestre</td>
                <td id="semestes">
                    <?php
                    echo $function->GetSemestre();
                    ?>
                </td>
            </tr>
        </table>
        <hr>
        <table style="width: 55%" id="formepreuve">

        </table>
        <table style="width: 55%">
            <tr>
                <td>
                    <button class="btn btn-success" id="send">
                        Visualiser <span class=' icon-print'></span>
                    </button>
                </td>
                <td>
                    <button type="reset" class="btn btn-danger">
                        Annuler <span class='icon-remove'></span>
                    </button>
                </td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
            <tr></tr>
        </table>
    </center>
</form>