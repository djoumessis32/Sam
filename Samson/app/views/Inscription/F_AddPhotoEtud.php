<?php
/**
 * Created by dialo.
 * User: Carion_root
 * Date: 11/24/18
 * Time: 3:14 PM
 */
?>
<form target="" method="post"  class="form-horizontal" action=""  name="" id="formUser" enctype="multipart/form-data">

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
                <td>Classe</td>
                <td id="semestes">
                    <?php
                    echo $function->GetSClasse();
                    ?>
                </td>
            </tr>
        </table>
        <hr>
        <table style="width: 55%">
            <tr>
                <td>
                    <button type="submit" class="btn btn-success" id="send">
                        Afficher Les Etudiants<span class='icon-ok'></span>
                    </button>
                </td>
                <td>
                    <button type="reset" class="btn btn-danger">
                        Annuler <span class='icon-remove'></span>
                    </button>
                </td>
            </tr>
        </table>
        <hr>
    </center>
</form>

<?php
if(isset($_POST['anneeAcad'])){
    $anneeAcad = $_POST['anneeAcad'];
    $filiereAcad = $_POST['filiereAcad'];
    $specialite = $_POST['specialite'];
    $classelmd=$_POST['classelmd'];

    //echo $classelmd;
    //echo $classesuivant;
    //echo $anneeAcadsuivant;
    $req="SELECT * FROM preinscription P
  inner join semestrelmd S on S.idsemestrelmd=P.idsemestre
  inner join classesemestrelmd CLS on CLS.idsemestre=S.idsemestrelmd
  inner join classelmd CL on CL.idclasselmd=CLS.idclasselmd
  inner join specialite SP on SP.id=P.idspecialite
  inner join etudiant E on E.id=P.idetudiant
WHERE P.idannee = $anneeAcad
AND P.idspecialite = $specialite
AND CL.idclasselmd = $classelmd
GROUP BY E.id
ORDER BY E.nomEt, E.prenomEt";
    $rep=$con->query($req);

    ?>
    <div class="card card-body">
        <h4><center><strong>Modifier photo etudiant</strong><br></h4>
      </center>
    </div>

    <div class="table-responsive">
        <table id="zero_config" class="table table-striped table-bordered ">
            <thead>
            <tr>
                <th>#</th>
                <th>Matricule</th>
                <th>Noms & Prenoms</th>
                <th>Photo</th>
                <th>Action</th>
    </div>

    <?php
    $i=0;$listeetudiant="";
    while($ligne=$rep->fetch()){
        $idetudiant=$ligne["idetudiant"];
        $listeetudiant.=$idetudiant;
        echo'
	<tr ><td></td></tr>
	
	<tr class="row_'.$idetudiant.'" id="tr">
	<td id="tr" width="2%">'.($i+1).'</td>
	<td id="tr" width="15%">'.$ligne['matriculeEt'].'</td>
	<td id="tr" width="30%">'.strtoupper($ligne['nomEt']).' '.ucfirst($ligne['prenomEt']).'</td>';
        if(empty($ligne['photoEt'])||$ligne['photoEt']==null){
        echo '<td id="tr" width="10%"><center><img width="50px" src="assets/img/etudiant/admin.jpg"></center></td> ';
        }else{
            echo '<td id="tr" width="10%"><img width="50px" src="assets/img/etudiant/' .$ligne['photoEt'].'"></td> ';
        }
        echo '<td width="35%">
                <form method="POST" action=""  name="form" enctype="multipart/form-data" class="form-horizontal" action="">
                <input type="file" name="loadphoto" id="loadphoto"/>
                <input style="display:none" type="text" name="id"  value='.$ligne['id'].'>
                <button class="btn btn-success" type="submit"><i class="icon icon-upload"></i> Modifier</button>
                </form>
                </td>
                </tr> ';
        $i++;

    }
    echo'    </table>';
}
?>

<?php

//require_once'../../config.php';
//print_r($_POST);
if (isset($_FILES['loadphoto'])){

 //   print_r($_FILES);
    $statusMsg = '';

// File upload path
    $targetDir = "assets/img/etudiant/";
    $fileName = basename($_FILES["loadphoto"]["name"]);
    $target_file = $targetDir . $fileName;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    if(isset($_POST["id"])) {
        $check = getimagesize($_FILES["loadphoto"]["tmp_name"]);
        if($check !== false) {
           // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
          //  echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
       // echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["loadphoto"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["loadphoto"]["tmp_name"], $target_file)) {
            $req='UPDATE etudiant SET photoEt = "'.$_FILES['loadphoto']['name'].'" WHERE etudiant.id='.$_POST['id'].'';

            echo $req;
            $rep=$bdd->exec($req);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if($rep ==true){
        echo '<script language="javascript">alert("Suppression Avec Success!"); </script>';
    }else {
        echo '<script language="javascript">alert("Passage non Enregistrer !!"); </script>';

    }
}
/*if(isset($_POST[])){

   
}*/

?>


<script src="../../../assets/js/jquery.js"></script>
<script type="text/javascript">
    function checkAll(){
        var form =$("#frm");
        var elts = document.getElementsByClassName('select');

        for(var i=0;i<elts.length;i++){
            if(elts[i].type == 'checkbox'){
                if(elts[i].checked == true){
                    elts[i].checked = false;
                }else{
                    elts[i].checked = true;
                }
            }
        }
    }

</script>