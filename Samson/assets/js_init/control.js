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

            
            function verifpwd() {
                var pwd = document.getElementById('pwd');
                var cpwd = document.getElementById('cpwd');
                if (pwd.value != cpwd.value)
                {
                    cpwd.style.backgroundColor = 'rgba(255,0,0,0.5)';
                    document.getElementById('textpwd').hidden = false;
                    return false;
                }
                else {
                    cpwd.style.backgroundColor = 'white';
                    document.getElementById('textpwd').hidden = true;
                    return true;
                }
            }
			
			
            function sup() {


                if (confirm('Voulez-vous vraiment supprimer cet élément?')) {
                    return true;
                }
                else
                {
                    return false;
                }
            }
            