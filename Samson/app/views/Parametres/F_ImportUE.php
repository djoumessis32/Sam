<?php
$l=1;
$chaine="";
if(isset($_FILES['fichier'])){
	 $extension=$_POST['idextension'];
	 $fichier=$_FILES['fichier']['tmp_name'];
	 //$programme = $_POST['programme'];
	 //echo $idprogramme;
    // print_r($_FILES['fichier']);
	 $table="unieteenseignement";
	 $h=0;
        $tableau = array();
        foreach(file($fichier) as $ligne):
            //On parse en utilisant le ";"
            if($h==0){
                $ligne0=$ligne;
            }else{
				$tableau[]	= $ligne;
				if($h==1){
					$chaine=$ligne;
				}else{
					$chaine.="&".$ligne;
				}
                
                
            }
            $h++;
        endforeach;
		
		 //print_r($tableau);
        //echo"<br/>";
        //echo$chaine;
        $begin_corres=0;


?>
<div class="row-fluid">
            <!-- .span12 -->
            <div class="span12">
                <div class="box">
                    <header>
                        <h5>Correspondance des colonnes</h5>
                        <div class="toolbar">
                            <a href="#optionalTable" data-toggle="collapse" class="accordion-toggle minimize-box">
                                <i class="icon-chevron-up"></i>
                            </a>
                        </div>
                    </header>
					<form name="imporForm" id="imporForm" target="_blank" action="app/views/Parametres/E_RapportImportationUE.php" method="post">
                            <table class="table responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Entête fichier CSV</th>
                                    <th> <i style="font-size: 22px;" class="icon-exchange"></i></th>
                                    <th>Tables <b id="tables_label"></b></th>
                                </tr>
                                </thead> <tbody>
								<tr hidden>
								
                                    </td>
                                </tr>
								<?php
								$champs = explode(';',$ligne0);
                                $ordre = 0;
								foreach ($champs as $champ) {
									if(($l%2)==1){
										?>
										<tr class="success">
                                            <td><?php echo $l;?></td>
                                            <td><input type="text" value="<?php echo strtolower($champ); ?>" name="Colonne<?php echo $ordre; ?>" size="40" />
                                            </td>
                                            <td><i style="font-size: 22px;" class="icon-exchange"></i></td>
                                            <td id="selectIdTr">
											
									<?php
                                                    echo$function->getListAttributUniteEnseignement($champ);
                                                ?>
												 </td>
                                        </tr>
										 <?php
                                    }
									else{

                                        ?> <tr class="info">
                                            <td><?php echo $l;?></td>
                                            <td><input type="text" value="<?php echo $champ; ?>" name="Colonne<?php echo $ordre; ?>" size="40" /></td>
                                            <td><i style="font-size: 22px;" class="icon-exchange"></i></td>
                                            <td id="selectIdTr">
                                                <?php
                                                    echo$function->getListAttributUniteEnseignement($champ);
                                                ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    $l++;
                                    $ordre++;
                                }
									 ?>
								<tr hidden>
                                    <td colspan="2"><input type="array" name="data" value="<?php echo$chaine;?>"/></td> 
                                    <td ><input type="text" name="data1" value="<?php echo$ligne0;?>"/></td>
                                    <td ><input type="text" name="table" value="<?php echo$table;?>"/></td>
                                </tr>
                                </tbody>
								<tfoot>
                                <tr class="primary">
                                    <td colspan="2"><center><button id="btn_save_csv" class="btn btn-success" type="submit"><i class="icon icon-check-sign"></i> Importer</button></center></td>
                                    <td colspan="2" align="center"><a href="" class="btn btn-warning" type="button"><i class="icon icon-remove-circle"></i> Retour</a></td>
                                </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
									 
 <?php
    }

?>



<form method="post" enctype="multipart/form-data" class="form-horizontal" action=""  name="importsql" id="importsql">
    <center>

        <table style="width: 55%">
            
            
        </table>
        <hr>
        <table style="width: 55%" >
         <tr>
                               
                                <td hidden colspan="2" style="padding-top: 10px;"></td>
                            </tr>
							<tr>
                                <td colspan="2"><b id="file_label" style="color: red;">Fichier à importer</b><span><font color="red">*</font></span></td>
                                <td colspan="2" >
                                    <div class="control-group">
                                        <div class="controls"><input required type="file" name="fichier" id="fichier" /></div>
                                    </div>
                                </td>
                            </tr>
        </table>
        <table style="width: 55%">
        <tr>
                <td>
                    <button class="btn btn-success" type="submit" id="send">
                        Lancer Importation <span class=' icon-arrow-right'></span>
						 <td hidden colspan="2" style="padding-top: 10px;"><input name="idextension" id="idextension"></td>
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


<script type="text/javascript">

$("#send").click(function(){
        var fichier=$("#fichier").val();
         alert(fichier);
        var tabextension=fichier.split('.');
        var extension=tabextension[1];
           // alert(extension);
        $("#idextension").val(extension);
    });
   

</script>