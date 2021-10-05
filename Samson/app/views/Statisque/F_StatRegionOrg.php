<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/21/18
 * Time: 1:12 AM
 */
?>

<form target="_blank" method="post"  class="form-horizontal" action="app/views/Statistique/E_StatRegionOrgEtab.php"  name="statistique" id="formUser">
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
                
               <td width="40%" class="key">Votre Choix : </td>
       <td>
        <select name="choixTypeStat" id="choixTypeStat">
		   <option value='1' selected="selected">Statistiques sur les inscrits</option>
           <option value='2'>Statistiques sur les Preinscrits</option>
		</select> 
       </td>
            </tr>
           
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