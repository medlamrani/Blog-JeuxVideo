<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/projet5/src/public/css/style.css">
        <link rel="stylesheet" type="text/css" href="/projet5/src/public/css/bootstrap.css">
        <title>Se connecter</title>
    </head>
    <body>
        <div class="login-bloc text-center">
            <div class="container form-game">
                <form action="http://localhost/projet5/admin/addadmin" method="post" class="form-signin bloc-form">
                    <img class="mb-4" src="src/public/image/user.png" width="72" height="72">
                    <h1 class="h3 mb-3 font-weight-normal">Ajouter un admin</h1>

                    <input type="text" id="username" name="username" class="form-control mb-4" value="Pseudo"/>

                    <input type="text" id="name" name="name" class="form-control mb-4" value="Prenom"/>

                    <input type="text" id="lastname" name="lastname" class="form-control mb-4" value="Nom"/>

                    <input type="email" id="email" name="email" class="form-control mb-4" value="Email"/>

                    <input type="password" id="password" name="password" class="form-control mb-4" value="Mot de passe"/>
                    
                    

                    <input type="submit" value="Ajouter" name="addAdmin" class="btn btn-lg btn-primary btn-block mt-3"/>
                </form>
            </div>
        </div>
    </body>
</html>    


