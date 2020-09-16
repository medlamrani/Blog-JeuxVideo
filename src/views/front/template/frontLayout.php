<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="src/public/css/style.css">
        <link rel="stylesheet" type="text/css" href="src/public/css/bootstrap.css">
        <title><?= $title ?></title>
    </head>
    <body>  
    <div class="bloc-home">
        <nav class="mynav navbar navbar-expand-lg navbar-light bg-light fixed-top justify-content-between">
            <div class="collapse navbar-collapse ml-4">
                <a class="navbar-brand">
                    <img src="src/public/image/controller.png" width="40" height="40" alt="" loading="lazy">
                    Jeux Videos
                </a>
            </div>    
            <div class="collapse navbar-collapse ml-5" id="navbarTogglerDemo02">
                <a class="navlink" href="index.php">Accueil</a>
                <a class="navlink" href="index.php?action=games">Games</a>   
                <a class="navlink" href="index.php?action=actualites">Actualites</a>   
                <a class="navlink" href="index.php?action=">Top 5</a>             
            </div>
            <div class="collapse navbar-collapse ml-5" >
            <?php
            if(empty($_SESSION['id']))
            {
            ?>
                <a class="navlink" href="index.php?action=inscription">Inscription</a>
                <a class="navlink" href="index.php?action=login">Se Connecter</a>  
            <?php      
            }
            else
            {
                ?>
                <a class="navlink" href="index.php?action=monprofil"><?php echo 'Bonjour '. $_SESSION['username'];?></a>
                <a class="navlink" href="index.php?action=logout">
                    <img src="src/public/image/logout.png" width="30" height="30" alt="" loading="lazy"> 
                </a>
            <?php    
            }
                
            ?>    
            </div>
        </nav>  

        <?php if(isset($_SESSION['message'])) : ?> 
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
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
    </div>
    </body>
</html>