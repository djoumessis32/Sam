<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 12/15/18
 * Time: 10:57 PM
 */

?>
<form target="t" method="post"  class="form-horizontal" action="app/views/Inscription/E_imprimeCertificatScolarite.php"  name="ajouteruser" id="formUser">
    <center>

        <table style="width: 55%">
            <tr>
                <td><b>Matricule / Nom(s) / Prenom(s)</b></td>
                <td >
                    <input type="text" name="etudiant" id="etudiant"  value="" class="" onkeydown="alert(this.val())">
                </td>
            </tr>
        </table>
        <hr>
        <div id="listeetudiantdocscol">

        </div>

    </center>
</form>