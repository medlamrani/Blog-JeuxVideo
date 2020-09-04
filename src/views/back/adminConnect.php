<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
        <title>Se connecter</title>
    </head>
    <body>    
        <div class="login-bloc text-center">
            <form action="?action=login" method="post" class="login">
                <img class="mb-4" src="public/images/booki.png" alt="" width="72" height="72">

                <h1 class="h3 mb-3 font-weight-normal">Connectez-vous</h1>

                <label for="username" class="sr-only">Peudo : </label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Pseudo" required="" autofocus="">

                <label for="password" class="sr-only">Mot de passe :</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Mot de passe" required="">

                <input type="submit" value="Se connecter" name="login" class="btn btn-lg btn-primary btn-block" />
                
            </form>
        </div>    
    </body>
</html>