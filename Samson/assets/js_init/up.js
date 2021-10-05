function date_heure(id)
{
        date = new Date;
        annee = date.getFullYear();
        moi = date.getMonth();
        mois = new Array('Janvier', 'F&eacute;vrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Ao&ucirc;t', 'Septembre', 'Octobre', 'Novembre', 'D&eacute;cembre');
        j = date.getDate();
        jour = date.getDay();
        jours = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        h = date.getHours();
        if(h<10)
        {
                h = "0"+h;
        }
        m = date.getMinutes();
        if(m<10)
        {
                m = "0"+m;
        }
        s = date.getSeconds();
        if(s<10)
        {
                s = "0"+s;
        }
        resultat = '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;'+jours[jour]+' '+j+' '+mois[moi]+' '+annee+'&emsp;&emsp;|&emsp;&emsp; '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = resultat;
        setTimeout('date_heure("'+id+'");','1000');
        return true;
}

function _(el) {
                return document.getElementById(el);
            }


            function enProgression1(e) {
                var pourcentage = Math.round((e.loaded * 100) / e.total);
                _("barreProgress1").style.width = pourcentage + "%";

            }
            function enProgression2(e) {
                var pourcentage = Math.round((e.loaded * 100) / e.total);
                _("barreProgress2").style.width = pourcentage + "%";
            }
            function enProgression3(e) {
                var pourcentage = Math.round((e.loaded * 100) / e.total);
                _("barreProgress3").style.width = pourcentage + "%";
            }
            function enProgression4(e) {
                var pourcentage = Math.round((e.loaded * 100) / e.total);
                _("barreProgress4").style.width = pourcentage + "%";
            }

            function actionTerminee(e) {
                _("status").innerHTML = e.target.responseText;
            }

            function enErreur(e) {
                _("status").innerHTML = "Upload Failed";
            }

            function operationAnnulee(e) {
                _("status").innerHTML = "Upload Aborted";
            }

            function uploadimage1() {

                var fichier = _("image").files[0];
                var formdata = new FormData();
                formdata.append("fichier", fichier);
                var ajax = new XMLHttpRequest();
                ajax.addEventListener("load", actionTerminee, false);
                ajax.addEventListener("error", enErreur, false);
                ajax.addEventListener("abort", operationAnnulee, false);
                ajax.upload.addEventListener("progress", enProgression1, false);

                ajax.open("POST", "vue/upload/uploadimage1.php");
                ajax.send(formdata);
                var valide = document.getElementById('valide').value = 1;
            }
            
            
            function valide() {

                var valide = document.getElementById('valide');
                if (valide.value !== 1)
                {
                    return false;
                }
                else {
                    return true;
                }
            }