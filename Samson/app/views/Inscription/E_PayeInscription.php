
<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 11/21/18
 * Time: 1:12 AM
 */
 
require_once'../../config.php';
$idannneeAcad=$_POST['anneeAcad'];
$idfiliereAcad=$_POST['filiereAcad'];
$specialite=$_POST['specialite'];
$classelmd=$_POST['classelmd'];
include 'entete.php';
enteteEtat($idannneeAcad,$idfiliereAcad,$specialite,$classelmd,'',$con);

//fonction de test du payement 
    function checkPaye($idetudiant,$con,$idtranche){
        $nb = null;
        //$sqldata=mysql_query("SELECT * FROM validepaye where idetudiant='$idetudiant' AND confirmepaye='1'");
		$sqldata="SELECT * FROM validepaye where idetudiant='$idetudiant' AND confirmepaye='1' and idtranche=$idtranche";
		//echo $sqldata;
		$rep=$con->query($sqldata);
		while($ligne=$rep->fetch()){
         $nb=$ligne[6];
    }
	//echo $nb;
	if($nb==0){return '<p style="color:red;">Insolvable</p>';} else{return 'Solvable';}
     }
	 
//selection du nombre de tranches
$sql="SELECT nombretranche FROM nbtranche where idanneeacademique='$idannneeAcad'";
$rep=$con->query($sql);
while($ligne=$rep->fetch()){
         $nbtr=$ligne[0];
    }
//selection des différentes tranches
$sqltranche="SELECT idtranche FROM validepaye where idanneeacademique='$idannneeAcad' LIMIT  $nbtr";
$rep=$con->query($sqltranche);
while($ligne=$rep->fetch()){
		 $tabtranche[]=$ligne['idtranche'];
    }
	

$req="SELECT * FROM preinscription P
  inner join semestrelmd S on S.idsemestrelmd=P.idsemestre
  inner join classesemestrelmd CLS on CLS.idsemestre=S.idsemestrelmd
  inner join classelmd CL on CL.idclasselmd=CLS.idclasselmd
  inner join specialite SP on SP.id=P.idspecialite
  inner join etudiant E on E.id=P.idetudiant
WHERE P.idannee = $idannneeAcad
AND P.idspecialite = $specialite
AND CL.idclasselmd = $classelmd
GROUP BY E.id
ORDER BY E.nomEt, E.prenomEt";
$rep=$con->query($req);
//echo $req;
 ?>
 
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="SysIpes">
    <meta name="author" content="Divine Soft">
    <meta name="keywords" content="SysIpes">

    <!-- Title Page-->
    <title>Samson</title>
    <!-- assets/vendor CSS-->
    <link href="../../../assets/css/style.css" rel="stylesheet" media="all">
	
</head>
<body>
<div class="card card-body">
     <br><br> <center><strong>ETAT PAIEMENT</strong><br>
	  <?php
	 echo ' <div >Print on/<i>Imprime le</i> '. date("d-m-Y") . '<br></div>';
//------fin fontion entete enteteStat NEW------------
?>
            <small></small></center>
</div>
 
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table border="1" width="100%" id="tableauform">
                <thead class="">
                <tr id="titrerubrique">
                    <th>#</th>
                    <th>Matricule</th>
                    <th>Nom(s) & Prenom(s)</th>
                    <th>Date et Lieu naissance</th>
                    <?php
					for($i=0;$i<$nbtr;$i++){
                  ?>
                 <th align="center" id="tr"  width="8%">Tranche <?php echo ($i+1); ?></th>
                 <?php
                   }
			    
               ?>
					
                <tr>
                </thead>
                <tbody class="">	
<?php
$i=1;
while($ligne=$rep->fetch()){
    if($i%4==0)echo"<tr class='trcouleur1'>";
    else echo"<tr class='trcouleur2' id='tr'>";
                echo '<td id="tr" width="2%">'.$i.'</td>
                    <td id="tr" width="15%">'.$ligne['matriculeEt'].'</td>
                    <td id="tr" width="20%">'.strtoupper($ligne['nomEt']).' '.ucfirst($ligne['prenomEt']).'</td>
                    <td id="tr" width="17%">'.str_replace('/','-',$ligne['dateNaissEt']).' à '.$ligne['lieuNaissEt'].'</td>';
					for($j=0;$j<$nbtr;$j++){
                    $idetudiant=$ligne['id'];
					$idtranche=$tabtranche[$j];
					?>
					<td id="tr"><?php echo checkPaye($idetudiant,$con,$idtranche) ; ?></td>
					<?php
					}
                   echo'
                </tr>';
    $i++;
}

?>
        </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
</body>
</html>	