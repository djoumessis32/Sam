<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>r&eacute;lev&eacute;</title>
    <link href="../../../assets/css/style.css" rel="stylesheet" media="all">
</head>
<body>
    <form target="_blank" method="post"  class="form-horizontal" action=""  name="saisiedoc" id="saisiedoc" enctype="multipart/form-data">
    <center>

        <table style="width: 60%">
            <tr>
                <td >Annee Academique<font color="#FF0000">*</font></td>
                <td >
                    <?php
                  //  echo $function->GetListeAnneeAcad();
                    ?>
                </td>
                <td width="200"></td>
                <td>Filiere<font color="#FF0000">*</font></td>
                <td id="filiere">
                    <?php
                    //echo $function->GetListeFiliere();
                    ?>
                </td>

                 <td></td>
                    <td>
                        Photo
                    </td>
                    <td>
                      <input type="file"  id="photoEt"  name="photoEt" value="" required="">
                        
                    </td>
            </tr>
            <tr>
                <td>Specialite<font color="#FF0000">*</font></td>
                <td id="specialit">
                    <label for="specialite"></label><select class="" name="specialite" id="specialite">
                        <option selected value="-1">-------------------------</option>
                    </select>
                </td>
                <td width="200"></td>
                <td>Semestre<font color="#FF0000">*</font></td>
                <td id="semestes">
                    <?php
                   // echo $function->GetSemestre();
                    ?>
                </td>
            </tr>
             <tr>
                <td><span>Matricule<font color="red">*</font></span></td>
                <td><input type="text" class="form-control" id="matriculetud" name="matriculetud" autofocus required="required"></td>
                <td width="200"></td>
                <td>Nom(s)<span><font color="red">*</font></span></td>
                <td><input type="text" id="nometud" class="form-control" name="nometud" required="required"></td>
                </tr>
                 <tr>
                <td><span>Prénom(s)<font color="red">*</font></span></td>
                <td><input type="text" class="form-control" id="prenometud" name="prenometud" autofocus required="required"></td>
                <td width="200"></td>
                <td><span>Date de naissance<font color="red">*</font></span></td>
                <td><input type="date" name="journersaisi" style="height: 30px;" id="joursais" autofocus required="required"></td>
                </tr>
                <tr>
                <td><span>Lieu de naissance<font color="red">*</font></span></td>
                <td><input type="text" class="form-control" id="lieunais" name="lieunais" autofocus required="required"></td>
                <td width="200"></td>
                <td>Nationalité<span></span></td>
              <td ><select name="nationaliteetud" size="1" id="nationaliteetud" autofocus required="required">
              <option value="" selected="selected">--Choisir une nationalité--</option>
              <?php
          @$R_selectsectionetab="select libelle_fr from nationalite";
          $resultat=$con->query($R_selectsectionetab);
          while($res=$resultat->fetch())
                {
                
                 echo "<option value='$res[0]'> $res[0] </option>";
                 
                }    
        ?>
                </select>
                </td>
                </tr>
                <tr>
                <td>Région<font color="red">*</font><span></span></td>
              <td ><select name="region" size="1" id="region" autofocus required="required">
              <option value="" selected="selected">--Choisir une région--</option>
              <?php
          @$R_selectsectionetab="select libelleregion from region";
          $resultat=$con->query($R_selectsectionetab);
          while($res=$resultat->fetch())
                {
                
                 echo "<option value='$res[0]'> $res[0] </option>";
                 
                }    
        ?>
                </select>
                </td>
                 <td width="200"></td>
                <td>Sexe<font color="red">*</font><span></span></td>
              <td ><select name="sexe" size="1" id="sexe" autofocus required="required">
              <option value="" selected="selected">--Choisir une sexe--</option>
              <?php
          @$R_selectsectionetab="select libellesexelngune from liste_sexe";
          $resultat=$con->query($R_selectsectionetab);
          while($res=$resultat->fetch())
                {
                
                 echo "<option value='$res[0]'> $res[0] </option>";
                 
                }    
        ?>
                </select>
                </td>
                </tr>
                <tr>
                <td><span>Numéro CNI</span></td>
                <td><input type="text" class="form-control" id="numcni" name="numcni" ></td>
                <td width="200"></td>
                <td id="t3">Handicapé<span class="Style2"><font color="red">*</font></span></td>
                                <td >
                            <select name="handicape" id="handicape" class="requis">

                                <option value="" selected="selected">Choisir</option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>

                            </select>
                            </td>
                </tr>
                <tr>
                <td>Telephone<span></span></td>
                <td><input type="text" id="telephone" class="form-control" name="telephone" ></td>
                <td width="200"></td>
                <td>Adresse<span></span></td>
                <td><input type="text" id="adresse" class="form-control" name="adresse" ></td>
                </tr>
                 <tr>
        </table>
        <hr>
       
        <table style="width: 55%">
        <tr>
                <td>
                    <button class="btn btn-success" type="submit" id="send">
                        Enregistrer <span class=' icon-arrow-right'></span>
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
</body>
</html>