<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <title>Samson -> Page de connexion</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets\css\bootstrap.min.css" />
    <link rel="stylesheet" href="assets\css\bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="assets\css\matrix-login.css" />
    <link href="assets\font-awesome\css\font-awesome.css" rel="stylesheet" />
    <link href='assets\css_init\font-googlr.css' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox" >
    <form id="loginform" class="form-vertical" action="app\controllers\CheckLogin.php" method="post">
        <div class="control-group normal_text"> <h3>Samson &trade;</h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="login" placeholder="Username" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="pwd" placeholder="Password" />
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-right"><button type="submit" class="btn btn-success" /> Login</button></span>
        </div>
    </form>

</div>

<script src="assets\js\jquery.min.js"></script>
<script src="assets\js\matrix.login.js"></script>
</body>

</html>
