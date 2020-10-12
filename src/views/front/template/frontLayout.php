<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/projet5/src/public/css/style.css">
        <link rel="stylesheet" type="text/css" href="/projet5/src/public/css/bootstrap.css">
        <title><?= $title ?></title>
    </head>
    <body>  
    <div class="bloc-home">
        <nav class="mynav navbar navbar-expand-lg navbar-light bg-light fixed-top justify-content-between">
            
            <a class="navbar-brand">
                <img src="/projet5/src/public/image/controller.png" width="40" height="40" alt="" loading="lazy">
                Jeux Videos
            </a>
              
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>  

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://localhost/projet5/Controller/Home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/projet5/Controller/ListOfGames">Games</a>   
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/projet5/Controller/ListOfNews">Actualites</a>   
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/projet5/Controller/TopGames">Top 5</a>     
                    </li>
                    <?php
                    if(empty($_SESSION['id']))
                    {
                    ?>
                        <a class="nav-link" href="http://localhost/projet5/Controller/inscription">Inscription</a>
                        <a class="nav-link" href="http://localhost/projet5/Controller/connect">Se Connecter</a> 
                    <?php      
                    }
                    else
                    {
                    ?>     
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="http://localhost/projet5/Controller/monprofil"><?php echo 'Bonjour '. $_SESSION['username'];?></a>
                            <a class="dropdown-item" href="http://localhost/projet5/Controller/logout">
                                <img src="/projet5/src/public/image/logout.png" width="30" height="30" alt="" loading="lazy"> 
                            </a>
                        </div>
                    </li>
                    <?php    
                    }          
                    ?> 
                </ul>
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



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script src="/projet5/src/public/js/rating.js"></script>
    <script src="/projet5/src/public/js/main.js"></script>
    </body>
</html>