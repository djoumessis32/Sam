<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/21/18
 * Time: 1:12 AM
 */
?>

<form target="_blank" method="post"  class="form-horizontal" action="app/views/Inscription/E_ModelListeInscritGlobal.php"  name="inscription" id="formUser">
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
        </table>
        <hr>
        <table style="width: 55%" id="formepreuve">

        </table>
        <table style="width: 55%">
        <tr>
                <td>
                    <button class="btn btn-success" id="send">
                       Imprimer <span class=' icon-arrow-right'></span>
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