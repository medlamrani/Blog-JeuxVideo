<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="src/public/css/style.css">
        <link rel="stylesheet" type="text/css" href="src/public/css/bootstrap.css">
        <title><?= $title ?></title>
    </head>
    <body>  
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top justify-content-between">
            <a class="navbar-brand">
                <img src="src/public/image/controller.png" width="40" height="40" alt="" loading="lazy">
                Administration
            </a>
            <div class="collapse navbar-collapse ml-5" id="navbarTogglerDemo02">
                <a class="navlink" href="index.php?action=administration">Home</a>
                <a class="navlink" href="index.php?action=addGame">Add Game</a>   
                <a class="navlink" href="index.php?action=addNews">Add News</a>  
                <a class="navlink" href="index.php?action=addAdmin">Add Admin</a>               
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

    </body>
</html>