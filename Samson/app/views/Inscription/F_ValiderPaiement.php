
<head>

<script src="../../../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../../../assets/js/controlegeneral.js" type="text/javascript"></script>
<script language="javascript" type="text/javascript">

 	 		function getXhr(){
                                var xhr = null; 
				if(window.XMLHttpRequest) // Firefox et autres
				   xhr = new XMLHttpRequest(); 
				else if(window.ActiveXObject){ // Internet Explorer 
				   try {
			                xhr = new ActiveXObject("Msxml2.XMLHTTP");
			            } catch (e) {
			                xhr = new ActiveXObject("Microsoft.XMLHTTP");
			            }
				}
				else { // XMLHttpRequest non supporté par le navigateur 
				   alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest..."); 
				   xhr = false; 
				} 
              return xhr
			}
//*******************************************************************************************************
//------------fonction de recherche globale des etudiants ----------------------------------------
function rechercheEtudiants()
{ 
//alert("salut");
			 var xhr = getXhr();			
				// On défini ce qu'on va faire quand on aura la réponse
				xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						texte = xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste	
						document.getElementById("contentForm3").innerHTML = "";
                        document.getElementById("contentForm1").innerHTML = texte;						
					}
				}				 
                 				  
							
				var eltcles = document.getElementById('clerecherche').value;	
		        var idanneeAcad = document.getElementById('idanneeAcad').value;
				               				
			    xhr.open("GET","app/views/Ajaxviews/E_ListePaye.php?eltcles="+eltcles+"&idanneeAcad="+idanneeAcad,true);
				
				// Ici on va voir comment faire du post
				// ne pas oublier ça pour le post
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				xhr.send(null);
                                
}

//----------
//------------fonction de recherche globale des etudiants ----------------------------------------
function chargeValeurPaye(idetudiant)
{ 
//alert("salut");
			 var xhr = getXhr();			
				// On défini ce qu'on va faire quand on aura la réponse
				xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						texte = xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste	
						  var tabTr = document.getElementsByTagName('td');
							var string = "";
							 for (var i=0;i<tabTr.length;i++)
   							 {							     							    
	   							if(tabTr[i].id.substr(0,3) == 'td_') {	
									if(tabTr[i].id != "td_"+idetudiant) {							
										document.getElementById(tabTr[i].id).innerHTML = "";								 									
									}
								}
   							 }
						
                        document.getElementById("td_"+idetudiant).innerHTML = texte;						
					}
				}				 
                 				  
				var chainepaye = 1;	
				var idanneeAcad = document.getElementById('idanneeAcad').value;               				
			    xhr.open("GET","app/views/Ajaxviews/E_ListePaye.php?chainepaye="+chainepaye+"&idetudiant="+idetudiant+"&idanneeAcad="+idanneeAcad,true);
				
				// Ici on va voir comment faire du post
				// ne pas oublier ça pour le post
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				xhr.send(null);
                 
               
}
//------------fonction de recherche globale des etudiants ----------------------------------------
function validerPaye(chaineIdpaye,idetudiant)
{ 	
//alert("salut");
			 var xhr = getXhr();			
				// On défini ce qu'on va faire quand on aura la réponse
				xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						texte = xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste	
						
                        document.getElementById("td_"+idetudiant).innerHTML = texte;						
					}
				}				 
               
				var chaineTab=chaineIdpaye.split("/");				 
                var chaineIdpayeFinal="";
				var chaineIdpayeRecu="";
 				var eltChaine=0;
 
 				for (var i=0;i<chaineTab.length;i++){
        			if(document.getElementById(chaineTab[i]).value!=""){
           			 if(eltChaine==0){
               			chaineIdpayeFinal=chaineTab[i];
						chaineIdpayeRecu=document.getElementById(chaineTab[i]).value;
               			eltChaine=1;               
            		}else{
               		 chaineIdpayeFinal=chaineIdpayeFinal+"/"+chaineTab[i];
					 chaineIdpayeRecu=chaineIdpayeRecu+"/"+document.getElementById(chaineTab[i]).value;
           			 }
        		  }            
   			  }
                          // var idbanque=document.getElementById('idbanque').value;
                           
                xhr.open("GET","app/views/Ajaxviews/E_ListePaye.php?chaineIdpaye="+chaineIdpayeFinal+"&chaineIdpayeRecu="+chaineIdpayeRecu,true);   
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				xhr.send(null);
               
}
//--------------------------------fin des fonctions--------------------------------------------------
</script>
</head>
<table align="center" width="60%" bgcolor="#FFFFFF">
  <tr>
    <td><!-- ****************************************   Partie supérieure standard  ****************************************************    -->
      
      
      <div id="element-box">
      
      <div class="t">
        <div class="t">
          <div class="t"></div>
        </div>
      </div>
      <div class="m"> 
       <table width="100%">
		<tr>
		  <td width="100%">
  
<!--******************************************************************************************************************************  -->
<form id="idform1" name="form_validepaye" method="get" action="">
<br />
<fieldset class="admintable">
      <legend>Initialisation</legend>
       <table  border='0' class="admintable" width="100%">
         <tr> 
           <td width="60%" class="key">  
             Annee academique : <font color="#FF0000">*</font>  
           </td>
           <td align="left">
           	<select name="idanneeAcad" id="idanneeAcad">
		    <option value='-1'>------Toutes les Annees------</option>
             <?php
             $sqlAnnee="SELECT id,nomAc FROM annee_academique";
			 $rep=$db->query($sqlAnnee);
             while($row=$rep->fetch())
			 {
			  echo'<option value="'.$row["id"].'">'.$row["nomAc"].'</option>';
			 }
            ?>
            </select>           	
           </td> 
         </tr>         
    </table> 
</fieldset> 

<fieldset class="admintable">
  <legend>Rechercher des etudiants</legend>   
   <!-- affichage des etudaints -->	 
    <table border='0' class="admintable" width="100%">
        <tr>
         	<td width="60%" class="key">Matricule/Noms/Prenoms:</td>
			<td><input type="text" name="clerecherche" id="clerecherche" value="" onkeyup="rechercheEtudiants();"/></td>		 
       </tr>
     </table>	
	 <hr>
	 <hr>
  <!-- fin affichage -->	
 </fieldset>           
  <div id="contentForm1"> </div>
  <div id="contentForm2"></div>
  <div id="contentForm3"></div>            
 <!--Suite de l'Affichage-->  
</form>
 <!-- ****************************************   Partie inférieure standard  ****************************************************    --> 
      </td></tr></table>
      </div>
      <div class="b">
        <div class="b">
          <div class="b">
          </div>
        </div>
      </div>
      </div>
      
      <!--******************************************************************************************************************************  -->
      </td>
  </tr>
</table>