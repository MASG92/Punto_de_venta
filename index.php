<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar  navbar-dark fixed-top " style="background-color: #563d7c;">
            <a class="navbar-brand" href="#">Login POS</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <br><br> <br> <br>
        <main class="col-6 " role="main">
            <form style="text-align: left;" method="post" action="<?php echo htmlspecialchars('core/validate.php');?>">
                <div class="form-group">
                    <label for="luser">Usuario</label>
                    <input type="text" class="form-control" name="luser" placeholder="Usuario" autofocus required>
                </div>
                <div class="form-group">
                    <label for="lpwd">Password</label>
                    <input type="password" class="form-control" name="lpwd" placeholder="Password" required>
                </div>
                <div id="msg"><?php require('server/msg.php');?></div>
                <button type="submit" id="log" class="btn btn-outline-primary btn-block">Acceder</button>
            </form>
           
        </main>
    </div>
   
</body>
</html>