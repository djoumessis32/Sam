<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/23/18
 * Time: 3:48 PM
 */

?>
<form target="t" method="post"  class="form-horizontal" action="app/views/Examen/E_imprimeReleves.php"  name="ajouteruser" id="formUser">
    <center>

        <table style="width: 55%">
            <tr>
                <td><b>Matricule / Nom(s) / Prenom(s)</b></td>
                <td >
                    <input type="text" name="etudiant" id="etudiant"  value="" class="" onkeyup="alert(this.val())">
                </td>
            </tr>
        </table>
        <hr>
        <div id="listeetudiantdoc">

        </div>
        <table style="width: 55%">
            <tr>
                <td>
                    <button class="btn btn-success" id="send">
                        Generer <span class=' icon-arrow-right'></span>
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