<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/projet5/src/public/css/style.css">
        <link rel="stylesheet" type="text/css" href="/projet5/src/public/css/bootstrap.css">
        <title><?= $title ?></title>
    </head>
    <body>  
        <nav class="mb-5 navbar navbar-expand-lg navbar-light bg-light fixed-top justify-content-between">
            <a class="navbar-brand">
                <img src="/projet5/src/public/image/controller.png" width="40" height="40" alt="" loading="lazy">
                Administration
            </a>
            <div class="collapse navbar-collapse ml-5" id="navbarTogglerDemo02">
                <a class="nav-link" href="http://localhost/projet5/admin/administration">Home</a>
                <a class="nav-link" href="http://localhost/projet5/admin/addgame">Ajouter un jeu</a>   
                <a class="nav-link" href="http://localhost/projet5/admin/addnews">Ajouter une actu</a>  
                <a class="nav-link" href="http://localhost/projet5/admin/addadmin">Ajouter un  Admin</a>   
                <a class="nav-link" href="http://localhost/projet5/admin/logout">Se deconnecter</a>            
            </div>
        </nav>  

        <?php if(isset($_SESSION['message'])) : ?> 
            <div class="mt-5 alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $_SESSION['message'] ;?></strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        
        <?= $header ?>   
    
        <div class="main">
            <?= $content ?>
        </div>

    </body>
</html>