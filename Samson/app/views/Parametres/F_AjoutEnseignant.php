<?php
if(isset($_POST['prenomEns']) && isset($_POST['matriculeEns'])){
    $data = array(
        'id'=>'',
        'matriculeEns'=>$_POST['matriculeEns'],
        'nomEns'=>$_POST['nomEns'],
        'prenomEns'=>$_POST['prenomEns'],
        'sexeEns'=>$_POST['sexeEns'],
        'domaineEns'=>$_POST['domaineEns'],
        'nationaliteEns'=>$_POST['nationaliteEns'],
        'dateNaissEns'=>$_POST['dateNaissEns'],
        'lieuNaissEns'=>$_POST['lieuNaissEns'],
        'adresseEns'=>$_POST['adresseEns'],
        'telephoneEns'=>$_POST['telephoneEns'],
        'etat'=>$_POST['etat'],
        'photoEns'=>$function->SaveFile('assets/img/enseignant/','photoEns')
    );
    $Objet = new Enseignant($data);
    $ObjetManager=new EnseignantManager($bdd);
    $statut =$ObjetManager->Add($Objet);
    if($statut==1){
        echo"<script> alert('Ajout effectuer avec succes!')</script>";
    }else{
        echo"<script> alert('Echec Ajout !')</script>";
    }
}
?>
<script type="text/javascript">
    function changestyle()
{
    var pp = document.getElementById('bphotoEns');
    var ppE = document.getElementById('photoEns');

    if(ppE.value!="")
    {
        pp.value=ppE.value;
    }else
    {
        pp.value='ajouter une photo';
    }
}
</script>

    <form target="" method="post"  class="form-horizontal" action=""  name="ajouteruser" id="formUser" enctype="multipart/form-data">
        <center>
            <table style="width: 95%">
                <tr>
                    <td>Matricule</td>
                    <td>
                       <input class="" type="text" name="matriculeEns" id="matriculeEns" value="" required="">
                    </td>
                    <td>Photo</td>
                    <td>
                        <input type="file" name="photoEns" id="photoEns" value="" required=""  style="position: absolute;opacity: 0;" onchange="changestyle();">
                        <input class="btn btn-success" type="button" name="" value="ajouter une photo" id="bphotoEns">
                    </td>
                </tr>
                <tr>
                    <td>Noms</td>
                    <td><input class="" type="text" name="nomEns" id="nomEns" value="" required=""></td>
                    <td>Prenom</td>
                    <td><input class="" type="text" name="prenomEns" id="prenomEns" value="" required=""></td>

                </tr>
                <tr>
                    <td>Sexe</td>
                    <td>
                        <select class="" name="sexeEns" id="sexeEns" required="">
                            <option selected value="-1">----------------------------------------</option>
                            <option value="M">Masculin</option>
                            <option value="F">Feminin</option>
                        </select>
                    </td>
                    <td>Nationalite</td>
                    <td><input class="" type="text" name="nationaliteEns" id="nationaliteEns" value="" required=""></td>
                </tr>
                <tr>
                    <td>Date de naissance</td>
                    <td>
                        <input type="date" name="dateNaissEns" id="dateNaissEns" value="" required="">
                    </td>
                     <td>lieu de naissance</td>
                    <td><input class="" type="text" name="lieuNaissEns" id="lieuNaissEns" value="" required=""></td>
                </tr>
                 <tr>
                    <td>Telephone</td>
                    <td><input class="" type="number" name="telephoneEns" id="telephoneEns" value="" required=""></td>
                    <td>Adresse </td>
                    <td>
                       <input type="text" name="adresseEns" id="adresseEns" value="" required="">
                    </td>
                </tr>
                <tr>
                    <td>Domaine</td>
                    <td><input class="" type="text" name="domaineEns" id="domaineEns" value="" required=""></td>
                    <td>Etat </td>
                    <td>
                        <select class="" name="etat" id="etat" required>
                            <option selected value="-1">----------------------------------------</option>
                            <option value="1">Actif</option>
                            <option value="0">Desactif</option>
                        </select>
                    </td>
                   
                </tr>
               
            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td colspan="2"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-success" id="send">
                        Enregistrer <span class=' icon-ok'></span>
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
     <?php
            echo $function->GetListeEnseignantParam();
        ?>
